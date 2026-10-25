<?php

return [
    'slug' => 'diseno',
    'name' => ['es' => 'Diseño', 'en' => 'Design'],
    'icon' => 'ri-palette-line',
    'order' => 5,
    'tools' => [
        [
            'slug' => 'generador-gradientes-css',
            'name' => ['es' => 'Generador de Gradientes CSS', 'en' => 'CSS Gradient Generator'],
            'description' => [
                'es' => '<p>Crea gradientes CSS lineales y radiales de forma visual e interactiva. Agrega múltiples paradas de color, ajusta ángulos y opacidades, y copia el código al instante.</p>',
                'en' => '<p>Create linear and radial CSS gradients visually and interactively. Add multiple color stops, adjust angles and opacities, and copy the code instantly.</p>'
            ],
            'blade_view_name' => 'tools.implementations.generador-gradientes-css',
            'is_active' => true,
            'order' => 1,
            'seo' => [
                'title' => ['es' => 'Generador y Editor de Gradientes CSS Gratis en Línea', 'en' => 'Free Online CSS Gradient Generator and Editor'],
                'description' => ['es' => 'Diseña gradientes CSS hermosos y modernos con nuestra herramienta interactiva. Soporta gradientes lineales y radiales con colores ilimitados. Copia código gratis.', 'en' => 'Design beautiful and modern CSS gradients with our interactive tool. Supports linear and radial gradients with unlimited colors. Copy code for free.'],
                'keywords' => ['es' => 'generador gradientes css, degradados css, crear gradiente online, background css linear-gradient', 'en' => 'css gradient generator, css gradients, linear gradient maker, css background gradient']
            ]
        ],
        [
            'slug' => 'extractor-paleta-colores',
            'name' => ['es' => 'Extractor de Paletas de Color', 'en' => 'Image Color Palette Extractor'],
            'description' => [
                'es' => '<p>Extrae paletas de colores armónicas y dominantes de cualquier fotografía o imagen al instante. Muestra la cuantización de color en código Hex y RGB con peso porcentual.</p>',
                'en' => '<p>Extract harmonic and dominant color palettes from any photo or image instantly. Shows color quantization in Hex and RGB formats with percentage weights.</p>'
            ],
            'blade_view_name' => 'tools.implementations.extractor-paleta-colores',
            'is_active' => true,
            'order' => 2,
            'seo' => [
                'title' => ['es' => 'Extractor de Paletas de Color de Imágenes Gratis en Línea', 'en' => 'Free Online Image Color Palette Extractor Tool'],
                'description' => ['es' => 'Carga una imagen y extrae sus colores representativos automáticamente con nuestra herramienta local 100% segura. Copia códigos Hex y RGB de forma sencilla.', 'en' => 'Upload an image and automatically extract its representative color palette using our secure 100% local utility. Easily copy Hex and RGB codes.'],
                'keywords' => ['es' => 'extractor de colores, paleta de colores de imagen, sacar colores de foto, color palette generator, picker color de imagen', 'en' => 'image color picker, color palette from image, extract colors from photo, color palette generator, image palette extractor']
            ]
        ],
        [
            'slug' => 'generador-sombras-css',
            'name' => ['es' => 'Generador de Sombras CSS (Box Shadow)', 'en' => 'CSS Box Shadow Generator'],
            'description' => [
                'es' => '<p>Diseña sombras de caja (box-shadow) CSS de forma interactiva y visual. Ajusta desplazamientos, desenfoque, propagación, opacidades y copia el código cruzado de inmediato.</p>',
                'en' => '<p>Design CSS box-shadow effects interactively and visually. Tweak offsets, blur, spread, opacities, and copy cross-browser code instantly.</p>'
            ],
            'blade_view_name' => 'tools.implementations.generador-sombras-css',
            'is_active' => true,
            'order' => 3,
            'seo' => [
                'title' => ['es' => 'Generador y Editor Visual de Sombras CSS Gratis en Línea', 'en' => 'Free Online Interactive CSS Box Shadow Generator'],
                'description' => ['es' => 'Crea sombras CSS elegantes y realistas de forma visual. Controla el desenfoque, la propagación, el desplazamiento, el color y copia código limpio optimizado gratis.', 'en' => 'Create elegant and realistic CSS shadows visually. Control blur, spread, offsets, coloring, and grab optimized clean CSS code for free.'],
                'keywords' => ['es' => 'generador de sombras css, box shadow generator, crear sombras css online, editor visual de sombras css', 'en' => 'css shadow generator, box shadow maker, design css shadows online, interactive css shadow editor']
            ]
        ],
        [
            'slug' => 'conversor-colores-wcag',
            'name' => ['es' => 'Conversor de Color con Accesibilidad WCAG', 'en' => 'WCAG Color Converter & Contrast Checker'],
            'description' => [
                'es' => '<p>Convierte colores entre formatos HEX, RGB, HSL y comprueba el contraste de accesibilidad en tiempo real bajo los estándares de las directrices WCAG 2.1 (AA y AAA).</p>',
                'en' => '<p>Convert colors between HEX, RGB, HSL formats and check accessibility contrast in real time under the standards of WCAG 2.1 guidelines (AA and AAA).</p>'
            ],
            'blade_view_name' => 'tools.implementations.conversor-colores-wcag',
            'is_active' => true,
            'order' => 4,
            'seo' => [
                'title' => ['es' => 'Conversor de Color y Evaluador de Contraste WCAG Gratis en Línea', 'en' => 'Free Online WCAG Color Converter & Contrast Checker'],
                'description' => ['es' => 'Convierte tus colores entre HEX, RGB y HSL y evalúa al instante si cumplen con las pautas de accesibilidad web WCAG 2.1 (AA / AAA). Totalmente local y privado.', 'en' => 'Convert your colors between HEX, RGB, and HSL, and instantly evaluate if they comply with WCAG 2.1 (AA / AAA) web accessibility guidelines. Fully offline.'],
                'keywords' => ['es' => 'conversor de color, contraste wcag, comprobar accesibilidad web, color hex rgb hsl, validador contraste aa aaa, diseno inclusivo', 'en' => 'wcag contrast checker, color converter, color contrast checker online, hex to rgb to hsl, web accessibility contrast, inclusive design tool']
            ]
        ],
        [
            'slug' => 'generador-blobs-svg',
            'name' => ['es' => 'Generador de Blobs y Formas Orgánicas SVG', 'en' => 'SVG Blob & Organic Shapes Generator'],
            'description' => [
                'es' => '<p>Diseña y genera de forma visual e interactiva gotas vectoriales y formas orgánicas asimétricas en formato SVG. Personaliza rellenos de degradados y exporta el código al instante.</p>',
                'en' => '<p>Design and generate visual and interactive vector blobs and asymmetrical organic shapes in SVG format. Customize gradient fills and export clean code instantly.</p>'
            ],
            'blade_view_name' => 'tools.implementations.generador-blobs-svg',
            'is_active' => true,
            'order' => 5,
            'seo' => [
                'title' => ['es' => 'Generador de Blobs SVG Gratis en Línea | MicroUtils', 'en' => 'Free Online SVG Blob & Organic Shapes Generator | MicroUtils'],
                'description' => ['es' => 'Crea formas orgánicas e ilustraciones gotas vectoriales en formato SVG personalizables en segundos. Rellenos modernos de degradados, mutación aleatoria y código limpio exportable.', 'en' => 'Create customizable organic vector blobs and bubble shapes in SVG format in seconds. Modern gradient fills, randomized mutation, and clean exportable XML code.'],
                'keywords' => ['es' => 'generador de blobs, gotas svg, crear blob online, diseno organico web, vector blobs figma, formas fluidas svg', 'en' => 'svg blob generator, organic shapes maker, create svg blobs online, fluid vector shapes, vector blob editor, blob exporter']
            ]
        ]
    ]
];
