<?php

return [
    'slug' => 'productividad',
    'name' => ['es' => 'Productividad', 'en' => 'Productivity'],
    'icon' => 'ri-timer-line',
    'order' => 7,
    'tools' => [
        [
            'slug' => 'temporizador-pomodoro',
            'name' => ['es' => 'Temporizador Pomodoro Premium', 'en' => 'Premium Pomodoro Timer'],
            'description' => [
                'es' => '<p>Incrementa tu productividad estructurando tus sesiones de trabajo y descansos con el método Pomodoro. Con temporizador interactivo circular, alarmas integradas y control de ciclos.</p>',
                'en' => '<p>Boost your productivity by structuring your work sessions and breaks with the Pomodoro technique. Features a circular interactive timer, integrated alarms, and cycle counts.</p>'
            ],
            'blade_view_name' => 'tools.implementations.temporizador-pomodoro',
            'is_active' => true,
            'order' => 1,
            'seo' => [
                'title' => ['es' => 'Temporizador Pomodoro Premium en Línea | MicroUtils', 'en' => 'Free Premium Pomodoro Timer Online | MicroUtils'],
                'description' => ['es' => 'Estructura tus tareas y mantén la concentración con este temporizador Pomodoro premium. Alarma de audio, ciclos ajustables y cronómetro interactivo offline.', 'en' => 'Structure your tasks and stay focused with this premium Pomodoro timer. Audio alerts, adjustable intervals, and offline-first interactive clock.'],
                'keywords' => ['es' => 'temporizador pomodoro, pomodoro online, reloj de estudio, tecnica pomodoro, cronometro pomodoro, productividad gratis', 'en' => 'pomodoro timer, study clock, pomodoro technique, focus timer, online pomodoro, pomodoro study tool']
            ]
        ],
        [
            'slug' => 'reloj-mundial-zonas-horarias',
            'name' => ['es' => 'Reloj Mundial e Interactivo de Zonas Horarias', 'en' => 'Interactive World Clock & Time Shifter'],
            'description' => [
                'es' => '<p>Visualiza la hora actual en las principales ciudades del mundo y utiliza el deslizador interactivo (Time Shifter) para planificar reuniones coordinando diferentes zonas horarias al instante.</p>',
                'en' => '<p>Visualize current time across key global cities and use the interactive time shifting slider to coordinate international meetings and calls instantly.</p>'
            ],
            'blade_view_name' => 'tools.implementations.reloj-mundial-zonas-horarias',
            'is_active' => true,
            'order' => 2,
            'seo' => [
                'title' => ['es' => 'Reloj Mundial y Planificador de Reuniones Interactivo', 'en' => 'Interactive World Clock & Meeting Planner Online'],
                'description' => ['es' => 'Consulta la hora mundial en vivo y desliza las horas para coordinar reuniones globales. Conversor interactivo de husos horarios sin bibliotecas externas.', 'en' => 'Check live world time and shift hours to plan global meetings easily. Lightweight interactive timezone shifter with modern offline support.'],
                'keywords' => ['es' => 'reloj mundial, planificador de reuniones, conversor zona horaria, time shifter, husos horarios mundiales, reloj internacional', 'en' => 'world clock, meeting planner, timezone converter, time shifter, coordinate global meeting, world times interactive']
            ]
        ],
        [
            'slug' => 'mapas-mentales',
            'name' => ['es' => 'Creador de Mapas Mentales y Flujogramas', 'en' => 'Mind Map & Flowchart Creator'],
            'description' => [
                'es' => '<p>Crea mapas mentales y diagramas de flujo interactivos con anclajes automáticos, ramificación con un clic y exportación SVG impecable. 100% offline.</p>',
                'en' => '<p>Create interactive mind maps and flowcharts with automatic anchors, one-click branching, and flawless SVG exporting. 100% offline.</p>'
            ],
            'blade_view_name' => 'tools.implementations.mapas-mentales',
            'is_active' => true,
            'order' => 3,
            'seo' => [
                'title' => ['es' => 'Creador de Mapas Mentales y Flujogramas SVG Gratis', 'en' => 'Free SVG Mind Map & Flowchart Creator Online'],
                'description' => ['es' => 'Dibuja lluvias de ideas y diagramas interactivos en tu navegador. Añade nodos con doble clic, arrastra conceptos y descarga en formato vectorial.', 'en' => 'Draw interactive brainstorming maps and diagrams in your browser. Add nodes with double click, drag concepts, and download in vector format.'],
                'keywords' => ['es' => 'crear mapa mental, flujograma gratis, hacer organigrama, dibujar diagrama de flujo, mapa mental svg offline', 'en' => 'create mind map, free flowchart maker, diagram builder online, draw visual map, offline svg mindmap']
            ]
        ]
    ]
];
