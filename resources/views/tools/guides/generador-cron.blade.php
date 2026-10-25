<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Expresiones Cron y Automatización de Tareas (Cron Jobs)
            </h4>
            <p class="text-muted">
                En el desarrollo de software, la administración de servidores y la arquitectura de sistemas, la automatización es clave. Un **Cron Job** es una tarea en segundo plano ejecutada de forma automatizada por el sistema operativo Unix/Linux a intervalos regulares. Para definir cuándo se debe ejecutar esta tarea, se emplea un formato de texto compacto llamado **Expresión Cron**.
            </p>
            <p class="text-muted">
                Una expresión Cron estándar se compone de **5 campos obligatorios** separados por espacios en blanco:
            </p>
            <div class="bg-light p-3 rounded mb-4 font-monospace text-center text-dark fs-13 border">
                minuto &nbsp; hora &nbsp; día_del_mes &nbsp; mes &nbsp; día_de_la_semana
                <br>
                <span class="text-primary">(0-59) &nbsp; (0-23) &nbsp; &nbsp; &nbsp; &nbsp; (1-31) &nbsp; &nbsp; &nbsp; &nbsp; (1-12) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (0-6)</span>
            </div>
            
            <h5 class="text-dark mt-4">¿Cómo funciona y cómo interpretar los caracteres especiales?</h5>
            <ul class="text-muted ps-3 mb-4">
                <li class="mb-2"><strong>El Asterisco (<code class="fs-12 text-primary font-monospace">*</code>):</strong> Representa "todos". Un `*` en el campo de minutos significa "ejecutar cada minuto".</li>
                <li class="mb-2"><strong>La Barra Inclinada (<code class="fs-12 text-primary font-monospace">/</code>):</strong> Define incrementos o pasos. `*/5` en el campo de minutos significa "ejecutar cada 5 minutos".</li>
                <li class="mb-2"><strong>La Coma (<code class="fs-12 text-primary font-monospace">,</code>):</strong> Permite especificar listas de valores. `1,3,5` en el campo de día de semana significa "solo lunes, miércoles y viernes".</li>
                <li><strong>El Guion (<code class="fs-12 text-primary font-monospace">-</code>):</strong> Define rangos. `9-17` en el campo de horas representa "ejecutar cada hora entre las 9 AM y las 5 PM".</li>
            </ul>

            <h5 class="text-dark">¿Cómo utilizar este generador y decodificador?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Navega por las pestañas superiores para configurar los campos individuales (Minutos, Horas, etc.).</li>
                <li>Utiliza los selectores rápidos ("Cada 5 minutos", "Cada hora") o marca las casillas específicas para seleccionar valores exactos en la cuadrícula reactiva.</li>
                <li>Visualiza la expresión cron y lee su **Traducción Humana** en tiempo real a la derecha.</li>
                <li>Examina el listado de las **Próximas 5 Ejecuciones** simuladas para verificar con total certeza matemática si las fechas programadas coinciden con tus objetivos reales.</li>
                <li>**Decodificador Inverso:** Si ya tienes una expresión (ej: `0 8 * * 1-5`), pégala en la casilla inferior derecha y haz clic en "Decodificar" para ver la configuración visual de inmediato.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Respetamos tu privacidad técnica. Todo el parseo de campos, la lógica de simulación de fechas de ejecución y la traducción sintáctica de expresiones cron se procesa localmente en tu navegador web mediante JavaScript. No enviamos peticiones de red ni guardamos tus expresiones en servidores externos.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Understanding Cron Expressions & Job Scheduling
            </h4>
            <p class="text-muted">
                In system administration and software engineering, automation is the backbone of robust applications. A **Cron Job** is an automated background task scheduled to run at specific intervals on Unix/Linux servers. To configure these schedules precisely, developers utilize a compact text notation known as a **Cron Expression**.
            </p>
            <p class="text-muted">
                A standard Cron expression consists of **5 mandatory fields** separated by spaces:
            </p>
            <div class="bg-light p-3 rounded mb-4 font-monospace text-center text-dark fs-13 border">
                minute &nbsp; hour &nbsp; day_of_month &nbsp; month &nbsp; day_of_week
                <br>
                <span class="text-primary">(0-59) &nbsp; (0-23) &nbsp; &nbsp; &nbsp; &nbsp; (1-31) &nbsp; &nbsp; &nbsp; (1-12) &nbsp; &nbsp; &nbsp; &nbsp; (0-6)</span>
            </div>
            
            <h5 class="text-dark mt-4">Understanding Special Operators</h5>
            <ul class="text-muted ps-3 mb-4">
                <li class="mb-2"><strong>The Asterisk (<code class="fs-12 text-primary font-monospace">*</code>):</strong> Represents "all". An `*` in the minutes field means "execute every minute".</li>
                <li class="mb-2"><strong>The Slash (<code class="fs-12 text-primary font-monospace">/</code>):</strong> Represents step values. `*/15` in the minutes field means "run every 15 minutes".</li>
                <li class="mb-2"><strong>The Comma (<code class="fs-12 text-primary font-monospace">,</code>):</strong> Defines lists. `1,3,5` in the day-of-week field means "only run on Mondays, Wednesdays, and Fridays".</li>
                <li><strong>The Hyphen (<code class="fs-12 text-primary font-monospace">-</code>):</strong> Defines ranges. `9-17` in the hour field means "run every hour from 9:00 AM to 5:00 PM".</li>
            </ul>

            <h5 class="text-dark">How to use this Visual Cron Builder & Parser</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Toggle the tabs at the top to configure individual time parameters (Minutes, Hours, etc.).</li>
                <li>Choose between quick step options or check precise values on the programmatically created checkbox grids.</li>
                <li>Read the **Human Translation** of the resulting expression instantly on the right card.</li>
                <li>Validate your scheduling by checking the **Next 5 Scheduled Runs** calendar log.</li>
                <li>**Reverse Decoder:** Paste any existing 5-field cron string (e.g. `30 5 * * *`) and click "Decode" to immediately restore its visual configuration.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Secure Client-Side Sandbox:</strong> Your administrative configuration tasks remain private. The syntax tokenizer, cron interpreter, and future date calendar simulator operate entirely in-browser via JavaScript. No data is sent over the internet or saved to our databases.
            </div>
        @endif
    </div>
</div>
