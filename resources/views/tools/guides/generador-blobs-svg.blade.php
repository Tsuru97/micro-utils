<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Blobs SVG Orgánicos y su rol en el Diseño Moderno
            </h4>
            <p class="text-muted">
                En el diseño de interfaces de usuario (UI) y diseño web contemporáneo, las formas geométricas rígidas de ángulos rectos han cedido paso a las **formas orgánicas, suaves y asimétricas**, comúnmente llamadas **Blobs** o gotas. Estas formas rompen la monotonía de las rejillas de diseño tradicionales, inyectando dinamismo, frescura y una estética natural al fondo de las secciones de aterrizaje (Landing Pages), detrás de imágenes destacadas o como máscaras de componentes visuales.
            </p>
            <p class="text-muted">
                Los archivos **SVG (Scalable Vector Graphics)** son perfectos para estas formas. Al ser ecuaciones matemáticas puras y no píxeles rasterizados como los PNG o JPG, son infinitamente escalables (no pierden definición en pantallas de alta resolución como Retina) y su peso en kilobytes es prácticamente nulo (menos de 1 KB), lo que mejora drásticamente el rendimiento de carga y velocidad del sitio, un factor de alta relevancia para el posicionamiento SEO.
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo utilizar este generador y qué parámetros ajustar?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li><strong>Complejidad (Puntos):</strong> Determina el número de anclajes o vértices invisibles en el plano radial. Entre 3 y 5 puntos generará gotas fluidas y minimalistas; de 6 a 12 puntos creará formas más estrelladas y complejas.</li>
                <li><strong>Suavidad / Curvatura:</strong> Ajusta el factor de tensión de las curvas Bezier cúbicas. Un valor bajo (0.2) creará formas más angulares y poligonales; valores altos (1.0 - 1.5) darán una fluidez total.</li>
                <li><strong>Relleno (Fill Style):</strong> Elige entre un color sólido clásico, un **Degradado Moderno** con ángulo de proyección ajustable en 360°, o el estilo minimalista de **Solo Contorno (Outline)** ideal para líneas de decoración.</li>
                <li><strong>Muta la forma:</strong> Haz clic en **"Mutar Forma SVG"** para generar una variación geométrica única de forma aleatoria manteniendo tus ajustes de color.</li>
                <li><strong>Copia o Descarga:</strong> Copia el tag `<svg>` e inyéctalo directamente en tu código HTML/CSS, o descarga el archivo `.svg` listo para importar en herramientas de diseño como Figma, Sketch o Illustrator.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Tu privacidad y creatividad están protegidas. Todo el cálculo de splines, interpolaciones de curvas Bézier y renderizado del gráfico vectorial ocurre de forma instantánea y local en tu navegador mediante JavaScript. Ningún dato sobre tus diseños, colores o archivos finales se envía al servidor, garantizando confidencialidad absoluta.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Organic SVG Blobs in Modern Web Design
            </h4>
            <p class="text-muted">
                In modern user interface (UI) and web design, stiff geometric boxes have increasingly been complemented by **fluid, organic, and asymmetrical shapes** known as **Blobs**. These natural vector shapes soften landing page structures, add visual depth, and create beautiful modern accents behind call-to-actions (CTAs), illustrations, or photography masks.
            </p>
            <p class="text-muted">
                Using **SVG (Scalable Vector Graphics)** for these shapes is the gold standard. Since SVGs are computed mathematically rather than compiled from static pixels (like PNGs or JPEGs), they scale infinitely without loss of clarity on high-DPI displays. Best of all, their file size is exceptionally lightweight (typically under 1 KB), drastically improving page speed metrics, which is crucial for Google Core Web Vitals and SEO rankings.
            </p>
            
            <h5 class="text-dark mt-4">Tuning Your SVG Blob Layout</h5>
            <ol class="text-muted ps-3 mb-4">
                <li><strong>Complexity (Points):</strong> Sets the number of radial anchor points in the math spline. A range of 3 to 5 nodes yields clean, minimal organic bubbles. Going up to 8 or 12 points generates jagged, starburst shapes.</li>
                <li><strong>Sharpness / Curvatura:</strong> Toggles the tension factor of the cubic Bezier curves. Low values (0.2) create rigid, triangular polygons; high parameters (1.0 to 1.5) output highly smooth, floating vectors.</li>
                <li><strong>Fill Style:</strong> Select between a solid hex color, a **Modern Gradient** with custom start/end colors and a 360-degree linear path angle, or a clean **Outline Only** style perfect for line art patterns.</li>
                <li><strong>Mutate Shape:</strong> Click **"Mutate SVG Blob"** to instantly shuffle radial point offsets to generate a brand new asymmetrical shape while preserving color presets.</li>
                <li><strong>Exporting:</strong> Click **"Copy SVG Code"** to copy the clean XML tag to paste directly into your HTML, or click **"Download SVG File"** to download the vector to import straight into vector tools like Figma or Adobe Illustrator.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>100% Client-Side Sandbox:</strong> Your visual assets and designs remain entirely yours. All cubic Bezier calculations, gradient matrices, and XML assembly run instantly inside your browser memory via native JavaScript. Zero server requests are executed, making this utility private and safe.
            </div>
        @endif
    </div>
</div>
