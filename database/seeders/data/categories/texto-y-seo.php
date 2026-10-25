<?php

return [
    'slug' => 'texto-y-seo',
    'name' => ['es' => 'Texto y SEO', 'en' => 'Text and SEO'],
    'icon' => 'ri-file-text-line',
    'order' => 1,
    'tools' => [
        [
            'slug' => 'contador-de-palabras',
            'name' => ['es' => 'Contador de Palabras', 'en' => 'Word Counter'],
            'description' => [
                'es' => '<p>Una herramienta sencilla para contar palabras y caracteres en tiempo real. Muy útil para redactores y especialistas SEO.</p>',
                'en' => '<p>A simple tool to count words and characters in real time. Very useful for writers and SEO specialists.</p>'
            ],
            'blade_view_name' => 'tools.implementations.word-counter',
            'is_active' => true,
            'order' => 1,
            'seo' => [
                'title' => ['es' => 'Contador de Palabras y Caracteres Gratis', 'en' => 'Free Word and Character Counter'],
                'description' => ['es' => 'Cuenta las palabras y caracteres de tus textos al instante. Optimiza tus contenidos para SEO sin límites.', 'en' => 'Count words and characters of your texts instantly. Optimize your content for SEO without limits.'],
                'keywords' => ['es' => 'contador de palabras, contar caracteres, SEO', 'en' => 'word counter, count characters, SEO']
            ]
        ],
        [
            'slug' => 'generador-enlaces-whatsapp',
            'name' => ['es' => 'Generador de Enlaces de WhatsApp', 'en' => 'WhatsApp Link Generator'],
            'description' => [
                'es' => '<p>Crea enlaces directos a tu WhatsApp con mensajes personalizados y genera un Código QR al instante para compartir con tus clientes.</p>',
                'en' => '<p>Create direct links to your WhatsApp with personalized messages and instantly generate a QR Code to share with your clients.</p>'
            ],
            'blade_view_name' => 'tools.implementations.whatsapp-link-generator',
            'is_active' => true,
            'order' => 2,
            'seo' => [
                'title' => ['es' => 'Generador de Enlaces y QR de WhatsApp Gratis', 'en' => 'Free WhatsApp Link and QR Generator'],
                'description' => ['es' => 'Crea un enlace directo a tu WhatsApp con un mensaje predeterminado. Generador de código QR gratuito.', 'en' => 'Create a direct link to your WhatsApp with a default message. Free QR code generator.'],
                'keywords' => ['es' => 'enlace whatsapp, qr whatsapp, generador link wa.me', 'en' => 'whatsapp link, whatsapp qr, wa.me link generator']
            ]
        ],
        [
            'slug' => 'generador-lorem-ipsum',
            'name' => ['es' => 'Generador de Lorem Ipsum', 'en' => 'Lorem Ipsum Generator'],
            'description' => [
                'es' => '<p>Genera texto de relleno Lorem Ipsum personalizado al instante. Configura párrafos, oraciones o palabras en formato HTML o texto plano.</p>',
                'en' => '<p>Instantly generate custom Lorem Ipsum placeholder text. Configure paragraphs, sentences, or words in HTML or plain text formats.</p>'
            ],
            'blade_view_name' => 'tools.implementations.generador-lorem-ipsum',
            'is_active' => true,
            'order' => 3,
            'seo' => [
                'title' => ['es' => 'Generador de Lorem Ipsum Gratis en Línea | MicroUtils', 'en' => 'Free Online Lorem Ipsum Generator | MicroUtils'],
                'description' => ['es' => 'Crea texto simulado Lorem Ipsum a medida. Elige número de párrafos, palabras o caracteres. Soporta HTML y texto plano. Gratis.', 'en' => 'Create tailor-made Lorem Ipsum dummy text. Choose the number of paragraphs, words, or characters. Supports HTML and plain text. Free.'],
                'keywords' => ['es' => 'generador lorem ipsum, texto simulado, texto dummy, lorem ipsum html', 'en' => 'lorem ipsum generator, dummy text generator, placeholder text, lorem ipsum html']
            ]
        ],
        [
            'slug' => 'generador-de-slugs',
            'name' => ['es' => 'Generador de Slugs / Enlaces Amigables', 'en' => 'SEO URL Slug Generator'],
            'description' => [
                'es' => '<p>Convierte títulos, encabezados o nombres de productos en slugs optimizados para SEO de forma instantánea. Soporta normalización Unicode, guiones personalizados y remoción de stop-words.</p>',
                'en' => '<p>Convert headings, article titles, or product names into SEO-friendly URLs instantly. Supports Unicode normalization, custom separators, and stop-words removal.</p>'
            ],
            'blade_view_name' => 'tools.implementations.generador-de-slugs',
            'is_active' => true,
            'order' => 4,
            'seo' => [
                'title' => ['es' => 'Generador de Slugs y Enlaces SEO Gratis en Línea | MicroUtils', 'en' => 'Free Online SEO URL Slug Generator | MicroUtils'],
                'description' => ['es' => 'Crea URLs amigables limpias para tus artículos o categorías. Elimina tildes, stop-words, caracteres especiales y emojis al instante. 100% gratuito.', 'en' => 'Create clean, friendly URLs for your blog posts or online store. Strips accents, stop-words, special symbols, and emojis. 100% free.'],
                'keywords' => ['es' => 'generador slugs, crear url amigable, quitar acentos url, slug seo, formatear enlaces gratis', 'en' => 'slug generator, create friendly url, strip accents url, seo slug maker, format links online']
            ]
        ],
        [
            'slug' => 'analizador-legibilidad',
            'name' => ['es' => 'Analizador de Legibilidad de Textos', 'en' => 'Text Readability Analyzer'],
            'description' => [
                'es' => '<p>Evalúa el nivel educativo y la complejidad de tus textos en tiempo real con las fórmulas Fernández-Huerta, Szigriszt-Pazos y Flesch-Kincaid.</p>',
                'en' => '<p>Evaluate the educational level and complexity of your text in real time using the Fernandez-Huerta, Szigriszt-Pazos, and Flesch-Kincaid formulas.</p>'
            ],
            'blade_view_name' => 'tools.implementations.analizador-legibilidad',
            'is_active' => true,
            'order' => 5,
            'seo' => [
                'title' => ['es' => 'Analizador de Legibilidad de Textos Gratis en Línea', 'en' => 'Free Online Text Readability & Comprehension Analyzer'],
                'description' => ['es' => 'Mide la legibilidad y facilidad de lectura de tus textos en español e inglés. Obtén puntuaciones automáticas de comprensión y nivel académico gratis.', 'en' => 'Measure the readability and reading ease of your texts in Spanish and English. Get automatic comprehension and academic grade scores for free.'],
                'keywords' => ['es' => 'analizador de legibilidad, facilidad de lectura, indice fernandez huerta, szigriszt pazos, flesch kincaid espanol, complejidad texto', 'en' => 'readability analyzer, flesch kincaid grade level, reading ease score, text complexity checker, readability formulas spanish']
            ]
        ],
        [
            'slug' => 'editor-markdown',
            'name' => ['es' => 'Editor Markdown e Inspección HTML', 'en' => 'Markdown Editor & HTML Live Inspector'],
            'description' => [
                'es' => '<p>Escribe en Markdown con vista previa en tiempo real, tabla de contenidos interactiva autogenerada y depuración de código HTML limpio. 100% offline.</p>',
                'en' => '<p>Write in Markdown with real-time preview, autogenerated interactive table of contents, and clean HTML code debugging. 100% offline.</p>'
            ],
            'blade_view_name' => 'tools.implementations.editor-markdown',
            'is_active' => true,
            'order' => 6,
            'seo' => [
                'title' => ['es' => 'Editor Markdown e Inspección HTML Gratis en Línea', 'en' => 'Free Online Markdown Editor & HTML Live Inspector'],
                'description' => ['es' => 'Escribe en Markdown y obtén el código HTML limpio al instante. Incluye barra de formato, contador de palabras y tabla de contenidos automática.', 'en' => 'Write in Markdown and get clean HTML code instantly. Includes formatting toolbar, word counter, and automatic table of contents.'],
                'keywords' => ['es' => 'editor markdown, previsualizar markdown, markdown a html, visor markdown en vivo, html limpio gratis', 'en' => 'markdown editor, markdown preview, markdown to html, live markdown viewer, clean html export']
            ]
        ]
    ]
];
