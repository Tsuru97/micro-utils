# AI Agent Instructions: Adding a New Tool to MicroUtils

This document serves as an explicit, high-priority technical prompt for AI coding agents (or developers) tasked with adding new interactive tools to the MicroUtils Laravel platform. Follow this exact workflow to preserve the localized SEO, dynamic sitemaps, and Google AdSense compliance architecture.

---

## 1. Context & Architecture Overview
MicroUtils is built with **Laravel + Vite + Vanilla JS**. It supports bi-lingual translations (`en` and `es`) using the `Spatie/Translatable` package.

- **Routing:** Public tool pages are served dynamically via the `/tool/{slug}` route handled by `App\Http\Controllers\ToolController@show`.
- **View Layer:** `ToolController@show` returns `resources/views/tools/base.blade.php` injected with the tool's details.
- **Dynamic Injections:**
  - **Tool Logic:** `tools/base.blade.php` includes the interactive JS/HTML tool template defined in the database field `blade_view_name`.
  - **Premium SEO Guide:** `tools/base.blade.php` automatically attempts to include `resources/views/tools/guides/{slug}.blade.php` if it exists.
  - **Structured Data:** The HTML head dynamically yields `structured_data` containing `BreadcrumbList` and `SoftwareApplication` JSON-LD schemas.

---

## 2. Step-by-Step Blueprint for the AI Agent

### Step 2.1: Database Seeding / Record Insertion
You must create database entries for the new tool. Add the tool array inside the appropriate category seeder file under `database/seeders/data/categories/` (e.g., `desarrollo.php` or `texto-y-seo.php`).

Ensure the arrays conform exactly to the following Spatie translatable structure:

```php
[
    'slug' => 'new-tool-slug', // Unique, lowercase, hyphenated URL identifier
    'name' => [
        'es' => 'Nombre en Español de la Herramienta',
        'en' => 'English Name of the Tool'
    ],
    'description' => [
        'es' => '<p>Breve descripción interactiva en español.</p>',
        'en' => '<p>Short interactive description in English.</p>'
    ],
    'blade_view_name' => 'tools.implementations.new-tool-slug', // Path to interactive UI blade view
    'is_active' => true,
    'order' => 10, // Sort order integer
    'seo' => [
        'title' => [
            'es' => 'Título SEO de la Herramienta | Gratis',
            'en' => 'SEO Title of the Tool | Free'
        ],
        'description' => [
            'es' => 'Meta descripción concisa de hasta 155 caracteres para el snippet de Google.',
            'en' => 'Concise meta description under 155 characters for the Google snippet.'
        ],
        'keywords' => [
            'es' => 'palabra clave, herramienta, utilidad',
            'en' => 'keyword, tool, utility'
        ]
    ]
]
```

### Step 2.2: Create the Tool UI Component (Blade & Vanilla JS)
Create the core interactive UI blade file at `resources/views/tools/implementations/{new-tool-slug}.blade.php`.
- Build the HTML elements (inputs, outputs, buttons) using standard Bootstrap 5 utility classes.
- Implement the utility logic using **pure client-side Vanilla JavaScript** inside a `<script>` tag.
- Ensure all DOM strings and alerts are fully localized checking `app()->getLocale()`.

### Step 2.3: Create the Rich SEO Help Guide (Crucial for AdSense)
To prevent "Thin Content" rejections from Google AdSense, you **MUST** create a comprehensive localized guide file.
- **Target File Path:** `resources/views/tools/guides/{new-tool-slug}.blade.php`
- **Minimum Word Count:** 300 - 500 words.
- **Language Checks:** Use `@if(app()->getLocale() == 'es') ... @else ... @endif` to divide localized copy.
- **Structure:** Use HTML tags (`<h4>`, `<h5>`, `<ul>`, `<ol>`) for readability.

#### Guide Template:
```html
<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3"><i class="ri-article-line me-2 align-middle"></i>Guía de Uso: [Nombre de la Herramienta]</h4>
            <p class="text-muted">Escribe una introducción exhaustiva de al menos dos párrafos sobre el propósito de la herramienta...</p>
            
            <h5 class="text-dark mt-4">¿Por qué usar esta herramienta?</h5>
            <p class="text-muted">Explica detalladamente la utilidad en el día a día y los beneficios clave...</p>

            <h5 class="text-dark">Seguridad y Privacidad Garantizada</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-4">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2"></i>
                <strong>Cómputo en Local:</strong> Explica cómo el motor JavaScript procesa el contenido localmente en el navegador del cliente sin transmitir información privada a servidores.
            </div>

            <h5 class="text-dark">Instrucciones Paso a Paso</h5>
            <ol class="text-muted ps-3 mb-0">
                <li>Primer paso de interacción...</li>
                <li>Segundo paso de procesamiento...</li>
                <li>Tercer paso y descarga de resultados...</li>
            </ol>
        @else
            <h4 class="text-primary mb-3"><i class="ri-article-line me-2 align-middle"></i>User Guide: [Tool Name]</h4>
            <p class="text-muted">Write a thorough two-paragraph introduction explaining the utility's purpose...</p>
            
            <h5 class="text-dark mt-4">Why is this tool essential?</h5>
            <p class="text-muted">Elaborate on real-world use cases, productivity benefits, and practical value...</p>

            <h5 class="text-dark">100% Data Privacy Assurance</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-4">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2"></i>
                <strong>Client-Side Engine:</strong> Explain how client-side JS ensures data operations occur fully on the user device, keeping confidential strings secure.
            </div>

            <h5 class="text-dark">Step-by-Step Instructions</h5>
            <ol class="text-muted ps-3 mb-0">
                <li>First interaction steps...</li>
                <li>Second formatting or computing steps...</li>
                <li>Third copying or exporting actions...</li>
            </ol>
        @endif
    </div>
</div>
```

---

## 3. Strict Rules for AI Coding Agents

- **DO NOT** modify `SitemapController.php` or `sitemap.blade.php`. The dynamic sitemap queries active records and will register your new tool automatically.
- **DO NOT** write custom JSON-LD schemas inside your newly created blade files. The `tools/base.blade.php` layout automatically generates robust `BreadcrumbList` and `SoftwareApplication` (complete with 4.9 dynamic rating stars) JSON-LD scripts for your tool.
- **DO NOT** modify `Localization.php` middleware or `routes/web.php` routes for the new tool. Everything is dynamically handled.
- **DO** verify that the seeder runs correctly by executing the seeders (or statically checking the arrays).
- **DO** verify that your guide file path matches the database `slug` exactly.
