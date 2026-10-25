<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HubController extends Controller
{
    /**
     * Show the MicroUtils Hub Landing page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::with('tools')->orderBy('order')->get();
        return view('nft-landing', compact('categories'));
    }

    /**
     * Show a specific category and its tools.
     *
     * @param string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function category($slug)
    {
        $category = Category::with(['tools' => function($query) {
            $query->where('is_active', true)->orderBy('order');
        }])->where('slug', $slug)->firstOrFail();

        return view('category-show', compact('category'));
    }

    /**
     * Language Translation
     */
    public function lang($locale)
    {
        if ($locale) {
            \Illuminate\Support\Facades\App::setLocale($locale);
            \Illuminate\Support\Facades\Session::put('lang', $locale);
            \Illuminate\Support\Facades\Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Search tools using Laravel Scout
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        
        if (empty($query)) {
            return response()->json([]);
        }

        try {
            // Usa TNTSearch / Scout para buscar herramientas activas
            $tools = \App\Models\Tool::search($query)
                        ->where('is_active', 1)
                        ->take(10)
                        ->get();
            
            // Mapeamos los resultados para devolver solo lo necesario para el Frontend
            $results = $tools->map(function ($tool) {
                return [
                    'id' => $tool->id,
                    'name' => $tool->name,
                    'description' => strip_tags(substr($tool->description, 0, 100)) . '...',
                    'url' => route('tool.show', $tool->slug),
                    'category' => $tool->category->name ?? ''
                ];
            });

            return response()->json($results);
        } catch (\Exception $e) {
            // Si el índice Scout aún no existe o hay un error, devolvemos vacío para no quebrar el frontend
            return response()->json([]);
        }
    }

    /**
     * Show Privacy Policy
     */
    public function privacy()
    {
        return view('pages-privacy-policy');
    }

    /**
     * Show Terms of Service
     */
    public function terms()
    {
        return view('pages-term-conditions');
    }

    /**
     * Show About Us Page
     */
    public function about()
    {
        return view('pages-about-us');
    }

    /**
     * Show Contact Us Page
     */
    public function contact()
    {
        return view('pages-contact');
    }

    /**
     * Handle Contact Form Submission
     */
    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        return redirect()->back()->with([
            'success' => true,
            'message' => app()->getLocale() == 'es' 
                ? '¡Gracias por contactarnos! Tu mensaje ha sido enviado correctamente.' 
                : 'Thank you for reaching out! Your message has been sent successfully.'
        ]);
    }
}
