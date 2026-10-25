<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tool;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate dynamic sitemap.xml.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Static URLs
        $staticUrls = [
            [
                'url' => route('home'),
                'priority' => '1.0',
                'changefreq' => 'daily'
            ],
            [
                'url' => route('privacy'),
                'priority' => '0.5',
                'changefreq' => 'monthly'
            ],
            [
                'url' => route('terms'),
                'priority' => '0.5',
                'changefreq' => 'monthly'
            ],
            [
                'url' => route('about'),
                'priority' => '0.7',
                'changefreq' => 'monthly'
            ],
            [
                'url' => route('contact'),
                'priority' => '0.7',
                'changefreq' => 'monthly'
            ],
        ];

        // Fetch active categories
        $categories = Category::whereHas('tools', function($query) {
            $query->where('is_active', true);
        })->get();

        // Fetch active tools
        $tools = Tool::where('is_active', true)->with('category')->get();

        // Build XML string directly to completely bypass Blade parsing and cache issues
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= "\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">';

        // Loop static URLs
        foreach ($staticUrls as $item) {
            foreach (['en', 'es'] as $lang) {
                $xml .= "\n    " . '<url>';
                $xml .= "\n        " . '<loc>' . htmlspecialchars($item['url'] . '?lang=' . $lang) . '</loc>';
                $xml .= "\n        " . '<xhtml:link rel="alternate" hreflang="en" href="' . htmlspecialchars($item['url'] . '?lang=en') . '" />';
                $xml .= "\n        " . '<xhtml:link rel="alternate" hreflang="es" href="' . htmlspecialchars($item['url'] . '?lang=es') . '" />';
                $xml .= "\n        " . '<xhtml:link rel="alternate" hreflang="x-default" href="' . htmlspecialchars($item['url']) . '" />';
                $xml .= "\n        " . '<lastmod>' . now()->startOfDay()->toAtomString() . '</lastmod>';
                $xml .= "\n        " . '<changefreq>' . $item['changefreq'] . '</changefreq>';
                $xml .= "\n        " . '<priority>' . $item['priority'] . '</priority>';
                $xml .= "\n    " . '</url>';
            }
        }

        // Loop categories
        foreach ($categories as $category) {
            $catUrl = route('category.show', $category->slug);
            $lastMod = $category->updated_at ? $category->updated_at->toAtomString() : now()->startOfDay()->toAtomString();
            foreach (['en', 'es'] as $lang) {
                $xml .= "\n    " . '<url>';
                $xml .= "\n        " . '<loc>' . htmlspecialchars($catUrl . '?lang=' . $lang) . '</loc>';
                $xml .= "\n        " . '<xhtml:link rel="alternate" hreflang="en" href="' . htmlspecialchars($catUrl . '?lang=en') . '" />';
                $xml .= "\n        " . '<xhtml:link rel="alternate" hreflang="es" href="' . htmlspecialchars($catUrl . '?lang=es') . '" />';
                $xml .= "\n        " . '<xhtml:link rel="alternate" hreflang="x-default" href="' . htmlspecialchars($catUrl) . '" />';
                $xml .= "\n        " . '<lastmod>' . $lastMod . '</lastmod>';
                $xml .= "\n        " . '<changefreq>weekly</changefreq>';
                $xml .= "\n        " . '<priority>0.8</priority>';
                $xml .= "\n    " . '</url>';
            }
        }

        // Loop tools
        foreach ($tools as $tool) {
            $toolUrl = route('tool.show', $tool->slug);
            $lastMod = $tool->updated_at ? $tool->updated_at->toAtomString() : now()->startOfDay()->toAtomString();
            foreach (['en', 'es'] as $lang) {
                $xml .= "\n    " . '<url>';
                $xml .= "\n        " . '<loc>' . htmlspecialchars($toolUrl . '?lang=' . $lang) . '</loc>';
                $xml .= "\n        " . '<xhtml:link rel="alternate" hreflang="en" href="' . htmlspecialchars($toolUrl . '?lang=en') . '" />';
                $xml .= "\n        " . '<xhtml:link rel="alternate" hreflang="es" href="' . htmlspecialchars($toolUrl . '?lang=es') . '" />';
                $xml .= "\n        " . '<xhtml:link rel="alternate" hreflang="x-default" href="' . htmlspecialchars($toolUrl) . '" />';
                $xml .= "\n        " . '<lastmod>' . $lastMod . '</lastmod>';
                $xml .= "\n        " . '<changefreq>weekly</changefreq>';
                $xml .= "\n        " . '<priority>0.9</priority>';
                $xml .= "\n    " . '</url>';
            }
        }

        $xml .= "\n" . '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'text/xml');
    }
}
