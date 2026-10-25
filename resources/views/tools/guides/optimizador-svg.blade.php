<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Optimización de SVG Offline y Rendimiento Web
            </h4>
            <p class="text-muted">
                El formato **SVG (Scalable Vector Graphics)** es el estándar indiscutible para gráficos en la web moderna gracias a su capacidad de escalado ilimitado sin pérdida de definición. Sin embargo, los editores gráficos populares (como Adobe Illustrator, Inkscape o Figma) suelen exportar archivos SVG repletos de metadatos redundantes, código propietario, comentarios innecesarios y una precisión decimal excesiva que infla innecesariamente el peso del archivo.
            </p>
            <p class="text-muted">
                Este **Optimizador y Minificador SVG Offline** te permite limpiar y comprimir tus gráficos vectoriales de manera quirúrgica directamente en tu navegador. Al reducir el tamaño de tus archivos SVG, no solo ahorras ancho de banda, sino que aceleras drásticamente el renderizado del DOM en navegadores de dispositivos móviles y optimizas las métricas clave de rendimiento como **Largest Contentful Paint (LCP)**, mejorando directamente el posicionamiento SEO de tu sitio web.
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo optimizar tus archivos y qué ajustes aplicar?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li><strong>Arrastra o Pega tu código:</strong> Sube tu archivo `.svg` directamente al área de arrastre (Dropzone) o simplemente pega la etiqueta `<svg>` fuente directamente en la caja de texto de entrada.</li>
                <li><strong>Remover metadatos e información de editores:</strong> Elimina de forma segura las etiquetas de metadatos como `<desc>`, `<metadata>`, vistas guardadas de Inkscape y atributos de namespaces propietarios (`sodipodi:*`, `inkscape:*`, `illustrator:*`) que no aportan valor visual.</li>
                <li><strong>Eliminar comentarios XML:</strong> Remueve comentarios que solo agregan peso y que a menudo se autogeneran al exportar los archivos.</li>
                <li><strong>Redondear precisión decimal:</strong> Modifica la precisión de las coordenadas numéricas dentro de los trazados (`d="..."` de los paths). Los programas de diseño suelen exportar coordenadas con hasta 15 decimales, cuando en el 99% de los casos 2 decimales son suficientes para que no se perciba ninguna diferencia visual a simple vista.</li>
                <li><strong>Compara y descarga:</strong> Visualiza el peso original frente al optimizado y el porcentaje exacto de ahorro en tiempo real. Previsualiza la salida y copia el código XML minificado con un clic o descarga el archivo `.svg` optimizado.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad Garantizada</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local Extremo:</strong> La privacidad de tus diseños es nuestra máxima prioridad. La limpieza XML, el parseo del DOM mediante `DOMParser` y el redondeo de precisión de trazados ocurren enteramente en la memoria RAM de tu computadora. Tus imágenes vectoriales nunca viajan a nuestros servidores ni se recopila ningún tipo de información confidencial.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Offline SVG Optimization and Web Performance
            </h4>
            <p class="text-muted">
                The **SVG (Scalable Vector Graphics)** format is the gold standard for iconography and vector assets on the web. It scales infinitely to fit any resolution without degradation. However, graphic suites like Adobe Illustrator, Inkscape, or Figma generate SVGs containing extensive redundant XML markup, editor-specific namespaces, comments, and high-precision floats that increase file sizes.
            </p>
            <p class="text-muted">
                Our **Offline SVG Optimizer and Minifier** helps you clean and compress your vector code locally. Reducing SVG file sizes speeds up page rendering times on mobile devices, decreases page weight, and yields better **Largest Contentful Paint (LCP)** scores, contributing directly to higher search engine SEO rankings.
            </p>
            
            <h5 class="text-dark mt-4">Understanding the SVG Cleansing Options</h5>
            <ol class="text-muted ps-3 mb-4">
                <li><strong>Importing Vectors:</strong> Drop your `.svg` file directly into the dropzone container or paste the raw XML string inside the editor input box.</li>
                <li><strong>Remove Metadata & Editor Namespaces:</strong> Strip non-rendering namespaces like `sodipodi:*`, `inkscape:*`, `illustrator:*`, and metadata structures (`<metadata>`, `<desc>`) generated by design software.</li>
                <li><strong>Strip XML Comments:</strong> Remove descriptive comments that occupy unnecessary bytes within the file.</li>
                <li><strong>Round Numeric Precision:</strong> Restructure path coordinate float parameters. Graphics suites often export coordinates with up to 15 decimal places. Truncating to 2 or 3 decimals saves significant weight without causing visible shape distortions.</li>
                <li><strong>Preview, Copy & Download:</strong> Inspect real-time size metrics detailing the byte difference and the exact saving percentage. Review the live visual canvas, copy the minified inline markup, or download the optimized SVG vector.</li>
            </ol>

            <h5 class="text-dark">100% Client-Side Privacy</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Total Local Execution:</strong> Your proprietary graphic assets never leave your local workspace. All parsing via `DOMParser`, attribute cleaning, and float rounding calculations are handled in-browser using modern native JavaScript. No telemetry is collected, and no backend data transmission takes place.
            </div>
        @endif
    </div>
</div>
