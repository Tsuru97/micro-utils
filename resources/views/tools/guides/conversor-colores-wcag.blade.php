<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Contraste de Color y Accesibilidad Web (WCAG 2.1)
            </h4>
            <p class="text-muted">
                La accesibilidad web asegura que todas las personas, incluyendo a aquellas con discapacidades visuales, daltonismo o baja visión, puedan percibir, comprender y navegar de forma efectiva en internet. Uno de los factores críticos de la accesibilidad es el **contraste de color** entre el texto (primer plano) y su fondo.
            </p>
            <p class="text-muted">
                El consorcio W3C define las **Pautas de Accesibilidad para el Contenido Web (WCAG 2.1)** que establecen fórmulas matemáticas estrictas para evaluar la relación de contraste (Contrast Ratio). La escala de contraste va desde **1:1** (ningún contraste, por ejemplo, texto blanco sobre fondo blanco) hasta **21:1** (contraste máximo absoluto, texto negro sobre fondo blanco).
            </p>
            
            <h5 class="text-dark mt-4">Niveles de Conformidad WCAG</h5>
            <ul class="text-muted ps-3 mb-4">
                <li><strong>Texto Normal (Menor a 18pt o 14pt negrita / aprox. 24px):</strong>
                    <ul class="ps-3 mt-1">
                        <li><strong>Nivel AA:</strong> Requiere una relación de contraste mínima de <strong>4.5:1</strong>.</li>
                        <li><strong>Nivel AAA (Óptimo):</strong> Requiere una relación de contraste mínima de <strong>7.0:1</strong>.</li>
                    </ul>
                </li>
                <li class="mt-2"><strong>Texto Grande (Igual o mayor a 18pt o 14pt negrita / aprox. 24px):</strong>
                    <ul class="ps-3 mt-1">
                        <li><strong>Nivel AA:</strong> Requiere una relación de contraste mínima de <strong>3.0:1</strong>.</li>
                        <li><strong>Nivel AAA (Óptimo):</strong> Requiere una relación de contraste mínima de <strong>4.5:1</strong>.</li>
                    </ul>
                </li>
            </ul>

            <h5 class="text-dark">¿Cómo utilizar este evaluador de contraste?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Ingresa el **Color del Texto** en formato hexadecimal (por ejemplo, `#1E293B`) o selecciónalo mediante el selector visual de color.</li>
                <li>Ingresa el **Color de Fondo** (por ejemplo, `#FFFFFF`).</li>
                <li>Visualiza de forma instantánea el desglose de contrastes en el panel derecho y comprueba si tu combinación aprueba los estándares **AA** y **AAA**.</li>
                <li>Examina la **Vista Previa de Componentes** para ver en tiempo real cómo se lee el texto en tamaños normales, grandes y dentro de elementos como botones con los colores seleccionados.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> La privacidad y el diseño seguro son nuestra prioridad. Todo el análisis cromático, conversiones HEX/RGB/HSL y fórmulas matemáticas de luminancia se ejecutan de manera privada e instantánea en tu dispositivo mediante JavaScript. No se envía ningún dato a servidores externos.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Color Contrast & Web Accessibility (WCAG 2.1)
            </h4>
            <p class="text-muted">
                Web accessibility ensures that all users, including individuals with color blindness, visual impairments, or aging eyes, can consume online content effectively. One of the core pillars of readable design is the **contrast ratio** between textual information (foreground) and its background container.
            </p>
            <p class="text-muted">
                The W3C consortium establishes the **Web Content Accessibility Guidelines (WCAG 2.1)**, laying down strict mathematical formulas based on relative luminance to calculate readability contrast. Contrast scores range from **1:1** (zero contrast, e.g., white on white) up to **21:1** (maximum possible contrast, e.g., black on white).
            </p>
            
            <h5 class="text-dark mt-4">WCAG Contrast Requirements</h5>
            <ul class="text-muted ps-3 mb-4">
                <li><strong>Normal Text (Under 18pt or 14pt bold / approx. 24px):</strong>
                    <ul class="ps-3 mt-1">
                        <li><strong>Level AA (Standard):</strong> Requires a minimum contrast ratio of <strong>4.5:1</strong>.</li>
                        <li><strong>Level AAA (Enhanced):</strong> Requires a minimum contrast ratio of <strong>7.0:1</strong>.</li>
                    </ul>
                </li>
                <li class="mt-2"><strong>Large Text (18pt or 14pt bold and above / approx. 24px):</strong>
                    <ul class="ps-3 mt-1">
                        <li><strong>Level AA (Standard):</strong> Requires a minimum contrast ratio of <strong>3.0:1</strong>.</li>
                        <li><strong>Level AAA (Enhanced):</strong> Requires a minimum contrast ratio of <strong>4.5:1</strong>.</li>
                    </ul>
                </li>
            </ul>

            <h5 class="text-dark">How to use this Contrast Evaluation Tool</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Set the **Text Color** via hex codes (e.g., `#000000`) or select it using the native system color picker.</li>
                <li>Set the **Background Color** (e.g., `#FFFFFF`).</li>
                <li>Observe the real-time contrast calculations on the right pane to instantly confirm compliance with standard **AA** and premium **AAA** scales.</li>
                <li>Inspect the **Component Preview Panel** to evaluate how normal prose, large headers, and mock interaction buttons render under the loaded color pair.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>100% Offline Processing:</strong> We keep your design assets safe. All color parsing, HEX-to-RGB, RGB-to-HSL math, and relative luminance calculations run entirely client-side inside your browser sandbox. No telemetry or styling data is sent over the network, providing absolute privacy.
            </div>
        @endif
    </div>
</div>
