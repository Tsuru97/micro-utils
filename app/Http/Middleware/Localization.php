<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /* Set new lang with priority: query parameter, session, browser auto-detect */
        if ($request->has('lang')) {
            $lang = $request->query('lang');
            if (in_array($lang, ['en', 'es'])) {
                App::setLocale($lang);
                session()->put('lang', $lang);
            } elseif (session()->has('lang')) {
                App::setLocale(session()->get('lang'));
            }
        } elseif (session()->has('lang')) {
            App::setLocale(session()->get('lang'));
        } else {
            // Auto-detect from browser Accept-Language
            $browserLang = $request->getPreferredLanguage(['en', 'es']);
            
            if ($browserLang) {
                App::setLocale($browserLang);
                session()->put('lang', $browserLang);
            }
        }
        return $next($request);
    }
}
