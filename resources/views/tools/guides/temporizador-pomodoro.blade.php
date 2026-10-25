<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Técnica Pomodoro para Maximizar tu Productividad
            </h4>
            <p class="text-muted">
                La **Técnica Pomodoro** es un método de gestión del tiempo desarrollado por Francesco Cirillo a fines de la década de 1980. Consiste en dividir el trabajo en intervalos concentrados (tradicionalmente de 25 minutos), llamados "Pomodoros", separados por breves descansos. Este enfoque fomenta un estado mental hiperenfocado al limitar las distracciones y reducir la fatiga cognitiva mediante pausas regulares.
            </p>
            <p class="text-muted">
                Esta herramienta premium proporciona una interfaz interactiva y elegante para integrar este método en tu flujo de trabajo diario sin interrupciones. El temporizador circular visualiza la progresión del tiempo, facilitando de forma instintiva la noción del tiempo restante sin causar estrés.
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo funciona y cómo configurar los intervalos?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li><strong>Elige una Tarea:</strong> Identifica el proyecto o actividad que deseas realizar.</li>
                <li><strong>Inicia el Ciclo (Trabajo):</strong> Presiona el botón de reproducción con el modo "Trabajo" seleccionado. Mantén la concentración absoluta durante los 25 minutos establecidos por defecto.</li>
                <li><strong>Descanso Corto:</strong> Al sonar el aviso sonoro, toma un descanso de 5 minutos. Levántate, estírate o bebe agua.</li>
                <li><strong>Repite y Descansa Largo:</strong> Cada 4 sesiones de trabajo completadas, realiza un descanso extendido de 15 minutos (Descanso Largo) para reponer energía por completo.</li>
                <li><strong>Ajustes a tu Medida:</strong> Si prefieres trabajar con otros ritmos (como la regla 50/10), desliza los controles laterales para adaptar las duraciones en tiempo real.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Tu tiempo y concentración nos importan. Este temporizador se ejecuta íntegramente en tu navegador web de forma local utilizando el temporizador nativo del cliente y la síntesis de audio de la API Web Audio de HTML5. No guardamos información sobre tus tareas, rutinas ni tiempos en ningún servidor externo, asegurando una privacidad del 100%.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Maximizing Productivity with the Pomodoro Technique
            </h4>
            <p class="text-muted">
                The **Pomodoro Technique** is a time management philosophy invented by Francesco Cirillo in the late 1980s. It uses a timer to break down work sessions into focused intervals—conventionally 25 minutes in length—called "Pomodoros", separated by brief breaks. This cycle sustains a highly productive state, limits procrastination, and wards off mental fatigue by mandating frequent pauses.
            </p>
            <p class="text-muted">
                This premium tool provides an elegant, clutter-free dashboard to seamlessly integrate the technique into your workflow. The glowing circular path keeps you sub-consciously aware of your timing without inducing anxiety, and its background browser tab ticking keeps you on track even when multitasking.
            </p>
            
            <h5 class="text-dark mt-4">Workflow and Interval Customization</h5>
            <ol class="text-muted ps-3 mb-4">
                <li><strong>Pick a Task:</strong> Outline a specific assignment or goal you want to make headway on.</li>
                <li><strong>Start the Interval (Work):</strong> Click the Play button in the "Work" segment (defaults to 25 minutes). Commit to full, uninterrupted concentration.</li>
                <li><strong>Take a Short Break:</strong> Once the synthesized audio alert triggers, indulge in a 5-minute break. Walk around, stretch, or hydrate.</li>
                <li><strong>Long Break Reward:</strong> For every 4 completed sessions, earn a prolonged 15-minute break (Long Break) to completely recharge your cognitive capacity.</li>
                <li><strong>Personalize:</strong> If you thrive under alternative intervals (such as the 50/10 method), adjust the range sliders on the settings panel to change work and break lengths dynamically.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local-First Sandbox:</strong> Your schedule and habits remain entirely private. The countdown clocks and sound chimes operate fully inside your local browser tab using standard HTML5 Web Audio synthesis. Zero tracking, logging, or network traffic is sent to our servers, keeping your daily routines 100% private.
            </div>
        @endif
    </div>
</div>
