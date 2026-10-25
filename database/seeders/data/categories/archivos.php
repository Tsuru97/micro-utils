<?php

return [
    'slug' => 'archivos',
    'name' => ['es' => 'Archivos', 'en' => 'Files'],
    'icon' => 'ri-folder-open-line',
    'order' => 3,
    'tools' => [
        [
            'slug' => 'eliminador-metadatos-imagenes',
            'name' => ['es' => 'Eliminador de Metadatos de Imágenes', 'en' => 'Image Metadata Remover'],
            'description' => ['es' => 'Elimina metadatos EXIF sensibles (GPS, cámara, fecha) de tus fotos JPG y PNG localmente.', 'en' => 'Remove sensitive EXIF metadata (GPS, camera, date) from your JPG and PNG photos locally.'],
            'blade_view_name' => 'tools.implementations.eliminador-metadatos-imagenes',
            'is_active' => true,
            'order' => 1,
            'seo' => [
                'title' => ['es' => 'Eliminador de Metadatos EXIF de Imágenes Gratis', 'en' => 'Free Image EXIF Metadata Remover'],
                'description' => ['es' => 'Limpia metadatos GPS, cámara y fecha de tus imágenes JPG y PNG antes de compartirlas en línea. 100% privado en cliente.', 'en' => 'Clean GPS, camera, and date metadata from your JPG and PNG images before sharing online. 100% client-side private.'],
                'keywords' => ['es' => 'eliminar metadatos, borrar exif, exif cleaner, metadata remover, limpiar gps foto', 'en' => 'remove metadata, strip exif, exif cleaner, metadata remover, clean photo gps']
            ]
        ],
        [
            'slug' => 'compresor-imagenes',
            'name' => ['es' => 'Compresor y Redimensionador de Imágenes', 'en' => 'Image Compressor & Resizer'],
            'description' => ['es' => 'Comprime y cambia el tamaño de tus fotos JPG, PNG y WebP al instante en tu navegador.', 'en' => 'Compress and resize your JPG, PNG, and WebP photos instantly in your browser.'],
            'blade_view_name' => 'tools.implementations.compresor-imagenes',
            'is_active' => true,
            'order' => 2,
            'seo' => [
                'title' => ['es' => 'Compresor y Redimensionador de Imágenes Gratis en Línea', 'en' => 'Free Online Image Compressor & Resizer'],
                'description' => ['es' => 'Reduce el tamaño de tus imágenes optimizando su calidad. Cambia el ancho y el alto en píxeles. 100% local y seguro.', 'en' => 'Reduce the size of your images by optimizing their quality. Change the width and height in pixels. 100% local and secure.'],
                'keywords' => ['es' => 'compresor imagenes, redimensionar fotos, optimizar jpg png webp, bajar peso de foto gratis', 'en' => 'image compressor, resize photo, optimize jpg png webp, reduce image size online']
            ]
        ],
        [
            'slug' => 'optimizador-svg',
            'name' => ['es' => 'Optimizador y Minificador SVG Offline', 'en' => 'Offline SVG Optimizer & Minifier'],
            'description' => ['es' => 'Optimiza, limpia y minifica tus archivos vectoriales SVG reduciendo su peso sin perder calidad visual. 100% privado.', 'en' => 'Optimize, clean, and minify your SVG vector files by reducing weight without losing visual quality. 100% private.'],
            'blade_view_name' => 'tools.implementations.optimizador-svg',
            'is_active' => true,
            'order' => 3,
            'seo' => [
                'title' => ['es' => 'Optimizador y Minificador SVG Offline Gratis', 'en' => 'Free Offline SVG Optimizer & Minifier'],
                'description' => ['es' => 'Limpia metadatos de editores, elimina comentarios y redondea la precisión decimal de tus archivos SVG para acelerar tu web.', 'en' => 'Clean editor metadata, strip comments, and round decimal precision on your SVG files to boost your website speed.'],
                'keywords' => ['es' => 'optimizar svg, minificar svg, limpiar svg, comprimir vector, reducir peso svg offline', 'en' => 'optimize svg, minify svg, clean svg, compress vector, reduce svg file size offline']
            ]
        ]
    ]
];
