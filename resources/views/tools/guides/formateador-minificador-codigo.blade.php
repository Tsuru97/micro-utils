<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Optimización de Código con Formateador y Minificador
            </h4>
            <p class="text-muted">
                La velocidad y el rendimiento técnico son dos pilares fundamentales del desarrollo web moderno. Para que un sitio web cargue de forma ultra-rápida y obtenga una excelente puntuación en auditorías de Google PageSpeed o Core Web Vitals, es vital minimizar el peso de los recursos que se envían al navegador. Aquí es donde entra en juego la **minificación de código** (HTML, CSS y JavaScript).
            </p>
            <p class="text-muted">
                El proceso de minificación analiza el código fuente y remueve por completo los comentarios de los desarrolladores, saltos de línea y espacios en blanco innecesarios, compactando todo el script en el menor número de líneas posible. Esto disminuye radicalmente el peso del archivo (en ocasiones reduciendo más del 50% de su tamaño original), ahorrando ancho de banda y acelerando el tiempo de respuesta visual de la web.
            </p>
            <p class="text-muted">
                Por el contrario, cuando necesitas depurar, analizar o estudiar un script o estilo que ya se encuentra compactado, la lectura de una sola línea kilométrica es impracticable. En este caso, el **embellecedor de código (Beautifier)** toma el código comprimido y le inyecta una indentación jerárquica limpia con saltos de línea ordenados, facilitando enormemente su comprensión y edición.
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo utilizar este formateador y minificador en línea?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Selecciona el **Lenguaje de Programación** correspondiente: HTML, CSS o JavaScript.</li>
                <li>Pega el código desordenado o comprimido en el panel de la izquierda.</li>
                <li>Haz clic en **"Embellecer Código"** si necesitas restaurar su estructura jerárquica limpia y formateada para lectura.</li>
                <li>Haz clic en **"Minificar Código"** si buscas compactar el script o estilo al máximo para integrarlo en tu servidor de producción de forma veloz.</li>
                <li>Copia el resultado instantáneamente usando el botón verde **"Copiar texto"**.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Garantizamos la privacidad de tu código. Todo el procesamiento de formateo e hilado binario de expresiones regulares ocurre directamente en tu navegador web de forma inmediata utilizando JavaScript. Tus códigos fuente y scripts confidenciales **nunca se cargan en nuestros servidores**, haciendo el proceso 100% privado y seguro.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Optimizing Web Performance with Code Beautifier & Minifier
            </h4>
            <p class="text-muted">
                Loading speed and technical architecture represent the twin pillars of modern search engine optimization and user experience. To ensure a website ranks optimally and loads instantly on mobile devices, minimizing the bandwidth required to transfer styling and scripting assets to the browser is a necessity. This process is known as **code minification** (specifically for HTML, CSS, and JavaScript).
            </p>
            <p class="text-muted">
                Minification parses the source strings and strips away developer-oriented block comments, inline commentary, redundant carriage returns, and spaces, consolidating the code into a single condensed stream. This dramatically shrinks target file sizes (often reducing overhead by over 50%), accelerating the time to first paint (TTFP) and conserving bandwidth for mobile users.
            </p>
            <p class="text-muted">
                Conversely, when you need to inspect, debug, or audit an already minified script or style, reading an unending single line of compressed characters is practically impossible. In this scenario, the **code beautifier** parses the dense markup and injects clean indentation and structural line feeds, restoring immediate human legibility.
            </p>
            
            <h5 class="text-dark mt-4">How to utilize this online code optimizer?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Select the correct **Programming Language**: HTML, CSS, or JavaScript.</li>
                <li>Paste your raw, messy, or compressed text block inside the input area on the left.</li>
                <li>Click **"Beautify Code"** to restore hierarchical structures and standard indentation for easy debugging.</li>
                <li>Click **"Minify Code"** to compress variables and remove whitespace to optimize your file for live server production.</li>
                <li>Instantly copy the computed output to your clipboard using the green **"Copy text"** button.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local Execution:</strong> We care deeply about your privacy. All minifying regex operations and formatting passes occur strictly in your browser using local client-side JavaScript. Your proprietary scripts and styling algorithms **never touch our servers**, ensuring 100% security and privacy.
            </div>
        @endif
    </div>
</div>
