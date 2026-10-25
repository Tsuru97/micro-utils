<?php
 
return [
    'slug' => 'matematicas-y-educacion',
    'name' => ['es' => 'Matemáticas y Educación', 'en' => 'Mathematics & Education'],
    'icon' => 'ri-functions',
    'order' => 6,
    'tools' => [
        [
            'slug' => 'graficador-funciones-svg',
            'name' => ['es' => 'Graficador de Funciones Matemáticas', 'en' => 'Mathematical Function Grapher'],
            'description' => [
                'es' => '<p>Grafica funciones matemáticas y trigonométricas en tiempo real en un plano cartesiano interactivo. Soporta coordenadas X/Y dinámicas y visualización vectorial SVG sin límites.</p>',
                'en' => '<p>Plot algebraic and trigonometric functions in real time on an interactive Cartesian plane. Supports dynamic X/Y coordinate tracking and vector SVG rendering.</p>'
            ],
            'blade_view_name' => 'tools.implementations.graficador-funciones-svg',
            'is_active' => true,
            'order' => 1,
            'seo' => [
                'title' => ['es' => 'Graficador de Funciones Matemáticas Gratis en Línea | MicroUtils', 'en' => 'Free Online Mathematical Function Grapher & Plotter'],
                'description' => ['es' => 'Grafica ecuaciones de forma visual e interactiva. Plano cartesiano dinámico con cuadrícula, zoom de límites y seguimiento de coordenadas. 100% gratuito y seguro.', 'en' => 'Plot equations visually and interactively. Dynamic Cartesian plane with grids, boundary controls, and real-time mouse coordinate tracking. 100% free.'],
                'keywords' => ['es' => 'graficador de funciones, graficar ecuaciones online, plano cartesiano interactivo, graficadora matematica, graficar seno coseno', 'en' => 'function plotter, graph equations online, cartesian plane visualizer, math graph calculator, plot sine cosine']
            ]
        ],
        [
            'slug' => 'calculadora-matrices',
            'name' => ['es' => 'Calculadora de Matrices', 'en' => 'Matrix Calculator'],
            'description' => [
                'es' => '<p>Resuelve operaciones matriciales de forma visual. Soporta rejillas de 2x2 y 3x3 para sumas, restas, productos, determinantes y matrices inversas con control de singularidad.</p>',
                'en' => '<p>Solve matrix algebra operations visually. Supports 2x2 and 3x3 grids for addition, subtraction, multiplications, determinants, and matrix inverses.</p>'
            ],
            'blade_view_name' => 'tools.implementations.calculadora-matrices',
            'is_active' => true,
            'order' => 2,
            'seo' => [
                'title' => ['es' => 'Calculadora de Matrices y Determinantes en Línea | MicroUtils', 'en' => 'Free Online Matrix Algebra & Determinant Calculator'],
                'description' => ['es' => 'Resuelve álgebra lineal de matrices en tu navegador. Calcula el determinante, la matriz inversa, suma, resta y multiplicación de matrices 2x2 y 3x3 gratis.', 'en' => 'Solve linear matrix algebra in your web browser. Compute determinants, inverse matrices, additions, subtractions, and multiplications of 2x2 and 3x3 grids for free.'],
                'keywords' => ['es' => 'calculadora de matrices, determinante de matriz, matriz inversa, multiplicar matrices online, resolver algebra lineal', 'en' => 'matrix calculator, determinant of matrix, inverse matrix solver, multiply matrices online, linear algebra solver']
            ]
        ],
        [
            'slug' => 'conversor-bases-numericas',
            'name' => ['es' => 'Conversor de Bases Numéricas', 'en' => 'Number Bases Converter'],
            'description' => [
                'es' => '<p>Convierte números entre bases decimal, binaria, octal y hexadecimal de forma simultánea. Validador de caracteres en vivo y copiado rápido e individual.</p>',
                'en' => '<p>Convert numbers between decimal, binary, octal, and hexadecimal bases simultaneously. Features real-time input validation and quick copy actions.</p>'
            ],
            'blade_view_name' => 'tools.implementations.conversor-bases-numericas',
            'is_active' => true,
            'order' => 3,
            'seo' => [
                'title' => ['es' => 'Conversor de Bases Numéricas Binario, Decimal, Hexadecimal | MicroUtils', 'en' => 'Free Online Decimal, Binary, Octal & Hexadecimal Base Converter'],
                'description' => ['es' => 'Traduce números entre binario, octal, decimal y hexadecimal al instante. Validación de rango y caracteres de entrada en vivo, procesado local seguro.', 'en' => 'Translate numbers between binary, octal, decimal, and hexadecimal bases instantly. Real-time character constraints validation, secure local processing.'],
                'keywords' => ['es' => 'conversor de bases numericas, pasar de decimal a binario, hexadecimal a decimal, binario a hex online, tabla de bases', 'en' => 'number base converter, decimal to binary, hexadecimal to decimal, binary to hex online, base converter table']
            ]
        ]
    ]
];
