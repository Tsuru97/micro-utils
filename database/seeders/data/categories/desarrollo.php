<?php

return [
    'slug' => 'desarrollo',
    'name' => ['es' => 'Desarrollo', 'en' => 'Development'],
    'icon' => 'ri-code-s-slash-line',
    'order' => 2,
    'tools' => [
        [
            'slug' => 'formateador-json',
            'name' => ['es' => 'Formateador JSON', 'en' => 'JSON Formatter'],
            'description' => ['es' => 'Formatea JSON validando su sintaxis.', 'en' => 'Format JSON by validating its syntax.'],
            'blade_view_name' => 'tools.implementations.json-formatter',
            'is_active' => true,
            'order' => 1,
            'seo' => [
                'title' => ['es' => 'Formateador y Validador JSON Gratis', 'en' => 'Free JSON Formatter and Validator'],
                'description' => ['es' => 'Formatea, embellece y valida código JSON al instante. Todo el procesamiento se hace localmente.', 'en' => 'Format, beautify and validate JSON code instantly. All processing is done locally.'],
                'keywords' => ['es' => 'formateador json, validador json, embellecedor json', 'en' => 'json formatter, json validator, json beautifier']
            ]
        ],
        [
            'slug' => 'generador-de-contrasenas',
            'name' => ['es' => 'Generador de Contraseñas', 'en' => 'Password Generator'],
            'description' => ['es' => 'Genera contraseñas seguras y aleatorias localmente en tu navegador.', 'en' => 'Generate secure and random passwords locally in your browser.'],
            'blade_view_name' => 'tools.implementations.password-generator',
            'is_active' => true,
            'order' => 2,
            'seo' => [
                'title' => ['es' => 'Generador de Contraseñas Seguras Gratis', 'en' => 'Free Secure Password Generator'],
                'description' => ['es' => 'Crea contraseñas fuertes y seguras al instante. Todo el procesamiento se hace en tu dispositivo.', 'en' => 'Create strong and secure passwords instantly. All processing is done on your device.'],
                'keywords' => ['es' => 'generador contraseñas, password generator, seguridad', 'en' => 'password generator, strong passwords, security']
            ]
        ],
        [
            'slug' => 'codificador-decodificador-url',
            'name' => ['es' => 'Codificador / Decodificador URL', 'en' => 'URL Encoder / Decoder'],
            'description' => ['es' => 'Codifica o decodifica cadenas de texto para URLs de forma rápida y segura.', 'en' => 'Encode or decode text strings for URLs quickly and securely.'],
            'blade_view_name' => 'tools.implementations.codificador-decodificador-url',
            'is_active' => true,
            'order' => 3,
            'seo' => [
                'title' => ['es' => 'Codificador y Decodificador URL Gratis en Línea | MicroUtils', 'en' => 'Free Online URL Encoder and Decoder | MicroUtils'],
                'description' => ['es' => 'Codifica y decodifica parámetros de URL de forma segura. Cumple con el estándar de codificación RFC 3986. 100% local.', 'en' => 'Encode and decode URL parameters securely. Conforms to RFC 3986 encoding standard. 100% local.'],
                'keywords' => ['es' => 'url encoder, url decoder, codificar url, decodificar url, rfc 3986', 'en' => 'url encoder, url decoder, encode url, decode url, rfc 3986']
            ]
        ],
        [
            'slug' => 'conversor-json-csv',
            'name' => ['es' => 'Conversor JSON a CSV / CSV a JSON', 'en' => 'JSON to CSV / CSV to JSON Converter'],
            'description' => ['es' => 'Convierte tus datos bidireccionalmente entre formatos JSON y CSV de forma instantánea y con vista previa interactiva.', 'en' => 'Convert your data bidirectionally between JSON and CSV formats instantly and with an interactive preview.'],
            'blade_view_name' => 'tools.implementations.conversor-json-csv',
            'is_active' => true,
            'order' => 4,
            'seo' => [
                'title' => ['es' => 'Conversor de JSON a CSV y CSV a JSON Gratis en Línea', 'en' => 'Free Online JSON to CSV and CSV to JSON Converter'],
                'description' => ['es' => 'Convierte listas JSON en archivos CSV tabulares o traduce CSV a JSON estructurado. Vista previa interactiva, procesado local y seguro.', 'en' => 'Convert JSON lists to tabular CSV files or translate CSV to structured JSON. Interactive preview, local-only secure processing.'],
                'keywords' => ['es' => 'json a csv, csv a json, conversor json csv, pasar json a excel, parsear csv', 'en' => 'json to csv, csv to json, convert json to csv, convert csv to json, parse csv online']
            ]
        ],
        [
            'slug' => 'formateador-minificador-codigo',
            'name' => ['es' => 'Formateador y Minificador de Código', 'en' => 'Code Beautifier & Minifier'],
            'description' => ['es' => 'Embellece o minifica código HTML, CSS y JavaScript localmente de forma rápida.', 'en' => 'Beautify or minify HTML, CSS, and JavaScript code locally and quickly.'],
            'blade_view_name' => 'tools.implementations.formateador-minificador-codigo',
            'is_active' => true,
            'order' => 5,
            'seo' => [
                'title' => ['es' => 'Formateador y Minificador de HTML, CSS y JS Gratis', 'en' => 'Free HTML, CSS and JS Beautifier and Minifier'],
                'description' => ['es' => 'Optimiza el tamaño de tus scripts y estilos minificándolos, o dales formato limpio para lectura. 100% en cliente, rápido y privado.', 'en' => 'Optimize script and style sizes by minifying, or format them cleanly for readability. 100% client-side, fast, and private.'],
                'keywords' => ['es' => 'minificador html, minificar css, formateador javascript, beautify js, compilar codigo', 'en' => 'html minifier, minify css, javascript formatter, js beautifier, code minifier']
            ]
        ],
        [
            'slug' => 'probador-expresiones-regulares',
            'name' => ['es' => 'Probador y Validador de Expresiones Regulares (Regex)', 'en' => 'Regex Tester & Matcher'],
            'description' => [
                'es' => '<p>Prueba, analiza y valida expresiones regulares en tiempo real. Resalta las coincidencias de texto al instante y desglosa los grupos de captura de forma interactiva.</p>',
                'en' => '<p>Test, analyze, and validate regular expressions in real time. Highlights matches instantly and breaks down capture groups interactively.</p>'
            ],
            'blade_view_name' => 'tools.implementations.probador-expresiones-regulares',
            'is_active' => true,
            'order' => 6,
            'seo' => [
                'title' => ['es' => 'Probador de Expresiones Regulares Regex Gratis en Línea', 'en' => 'Free Online Regex Tester and Matcher Tool'],
                'description' => ['es' => 'Comprueba tus patrones de expresiones regulares en tu navegador web. Resaltado interactivo de coincidencias, soporte para grupos de captura y banderas g, i, m. 100% seguro.', 'en' => 'Test your regular expression patterns in your web browser. Features interactive matches highlights, capture groups inspection, and g, i, m flags. 100% secure.'],
                'keywords' => ['es' => 'probador regex, comprobar expresion regular, validador regex, regex matcher, regex tester online', 'en' => 'regex tester, test regular expression, regex validator, regex matcher, regex tester online']
            ]
        ],
        [
            'slug' => 'decodificador-jwt',
            'name' => ['es' => 'Decodificador JWT Offline', 'en' => 'Offline JWT Decoder'],
            'description' => [
                'es' => '<p>Decodifica Tokens Web JSON (JWT) de forma 100% local y segura. Desglosa cabeceras, payload, firmas y comprueba fechas de expiración en tiempo real.</p>',
                'en' => '<p>Decode JSON Web Tokens (JWT) 100% locally and securely. Breaks down headers, payload, signatures, and checks expiration timestamps in real time.</p>'
            ],
            'blade_view_name' => 'tools.implementations.decodificador-jwt',
            'is_active' => true,
            'order' => 7,
            'seo' => [
                'title' => ['es' => 'Decodificador JWT Gratis y Offline | MicroUtils', 'en' => 'Free Offline JWT Decoder Tool | MicroUtils'],
                'description' => ['es' => 'Decodifica JSON Web Tokens en tu navegador sin enviar datos a ningún servidor. Desglose formateado de Header, Payload y fecha de expiración en vivo.', 'en' => 'Decode JSON Web Tokens in your browser without transmitting any data to external servers. Beautifully formatted breakdown of Header, Payload, and expiration status.'],
                'keywords' => ['es' => 'decodificador jwt, jwt decoder, decodificar token, leer jwt offline, json web token parser', 'en' => 'jwt decoder, decode json web token, jwt parser, offline jwt decoder, decode token browser']
            ]
        ],
        [
            'slug' => 'generador-cron',
            'name' => ['es' => 'Generador e Intérprete de Expresiones Cron', 'en' => 'Cron Expression Generator & Parser'],
            'description' => [
                'es' => '<p>Genera expresiones cron de 5 campos visualmente con cuadrículas interactivas. Traduce expresiones complejas a descripciones entendibles en lenguaje natural y simula ejecuciones futuras al instante.</p>',
                'en' => '<p>Generate 5-field cron expressions visually with interactive grids. Translates complex expressions to human-readable natural language and simulates future run dates instantly.</p>'
            ],
            'blade_view_name' => 'tools.implementations.generador-cron',
            'is_active' => true,
            'order' => 8,
            'seo' => [
                'title' => ['es' => 'Generador e Intérprete de Expresiones Cron Gratis en Línea', 'en' => 'Free Online Visual Cron Expression Generator & Parser'],
                'description' => ['es' => 'Construye expresiones cron fácilmente con nuestro editor visual interactivo. Traducción en lenguaje natural bilingüe y cálculo exacto de próximas ejecuciones. Decodificación inversa offline.', 'en' => 'Build cron expressions easily with our visual interactive builder. Natural language bilingual translations and exact simulated run calendar. 100% offline reverse decoder.'],
                'keywords' => ['es' => 'generador cron, cron expression generator, programar tareas cron, interpretar cron, descifrar cron online, cron job format', 'en' => 'cron generator, cron expression generator, visual cron builder, parse cron job, simulate cron online, crontab scheduler']
            ]
        ]
    ]
];
