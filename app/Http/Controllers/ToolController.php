<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tool;

class ToolController extends Controller
{
    /**
     * Display the specified tool.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Find the tool by slug, ensure it's active
        $tool = Tool::with('seoMeta')->where('slug', $slug)->where('is_active', true)->firstOrFail();

        // Pass tool and seometa to the view
        // Using a dynamic view path or a base view that includes the specific tool logic
        return view('tools.base', compact('tool'));
    }
}
