<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Reloj Mundial y Planificación de Reuniones
            </h4>
            <p class="text-muted">
                En un mundo globalizado e hiperconectado, colaborar y planificar llamadas con equipos, clientes o familiares que se encuentran en diferentes partes de la Tierra es una tarea recurrente. Sin embargo, coordinar las diferencias horarias, el horario de verano (DST) y determinar si la hora propuesta coincide con horas de sueño o de trabajo en la otra región puede ser una pesadilla logística.
            </p>
            <p class="text-muted">
                Nuestra herramienta premium **Reloj Mundial e Interactivo de Zonas Horarias** soluciona este dilema a través de su innovador **Time Shifter (Deslizador de Tiempo)**. Con este control, puedes adelantar o retrasar las horas de forma simultánea en todas las ciudades mostradas en pantalla, lo que te permite simular cualquier momento del día y planificar reuniones impecables.
            </p>
            
            <h5 class="text-dark mt-4">Funciones Destacadas</h5>
            <ul class="text-muted ps-3 mb-4">
                <li><strong>Deslizador Interactivo (Time Shifter):</strong> Desliza hacia la izquierda o derecha para ver la hora equivalente de cada ciudad en cualquier instante (-12 a +12 horas del momento local actual).</li>
                <li><strong>Indicadores Dinámicos de Día y Noche:</strong> Las tarjetas cambian de color de borde de forma dinámica y muestran etiquetas de "Día" (6:00 AM a 6:00 PM) o "Noche" para evitar programar llamadas en horarios inoportunos.</li>
                <li><strong>Añadir Ciudades Personalizadas:</strong> Selecciona en el buscador cualquier zona horaria adicional (como Los Ángeles, Buenos Aires, París, Sídney o Singapur) para añadirla a tu panel de control personalizado. Los cambios se guardan localmente en tu navegador.</li>
            </ul>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> La hora es precisa y privada. Nuestra herramienta utiliza la API nativa de JavaScript `Intl.DateTimeFormat` integrada en todos los navegadores modernos para calcular las horas de forma local. Ningún dato sobre tus zonas horarias preferidas, tu hora local real ni tus desplazamientos se envía a nuestros servidores, garantizando la privacidad absoluta de tu geolocalización.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: World Clocks & Meeting Planner
            </h4>
            <p class="text-muted">
                In a highly interconnected world, scheduling online meetings, phone calls, or game sessions across different continents is a frequent necessity. Yet, factoring in diverse offsets, Daylight Saving Time (DST) changes, and calculating whether a proposed slot is convenient for everyone can be a logistical headache.
            </p>
            <p class="text-muted">
                Our premium **Interactive World Clock & Time Shifter** solves this issue by incorporating a high-end **Time Shifter (Range Slider)**. This control lets you simultaneously shift the hour of all rendered clock dials back and forth, allowing you to project hypothetical scenarios and find the ideal overlaps in seconds.
            </p>
            
            <h5 class="text-dark mt-4">Key Features</h5>
            <ul class="text-muted ps-3 mb-4">
                <li><strong>Interactive Time Shifter:</strong> Drag the slider left or right to sync all clocks relative to your current local time (-12 to +12 hours). Perfect for identifying optimal times across London, Tokyo, Mexico City, and New York.</li>
                <li><strong>Day & Night Visual Theme:</strong> City cards automatically toggle side highlights and render "Day" (6:00 AM to 6:00 PM) or "Night" badges to prevent you from scheduling meetings during sleeping hours.</li>
                <li><strong>Add Custom Cities:</strong> Effortlessly search and add extra international regions (e.g. Sydney, Paris, Los Angeles, Buenos Aires) to your active dashboard. Your selected dashboard layout persists locally.</li>
            </ul>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Secure Client-Side Execution:</strong> Your location and schedule remain strictly yours. We leverage the lightweight, built-in JavaScript `Intl.DateTimeFormat` engine to compute exact regional times directly on your CPU. We store zero preferences or geolocations on our servers, ensuring a 100% private, cookie-free experience.
            </div>
        @endif
    </div>
</div>
