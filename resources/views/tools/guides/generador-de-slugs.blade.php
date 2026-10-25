<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Generador de Slugs (Enlaces Amigables para SEO)
            </h4>
            <p class="text-muted">
                Un **slug** (o enlace amigable) es la parte final de una dirección URL que identifica a una página específica de un sitio web con un formato legible para humanos y optimizado para rastreadores de motores de búsqueda. Por ejemplo, en lugar de tener un enlace críptico como `misitio.com/p=124`, un slug estructurado como `misitio.com/guia-creacion-sitio-web-exitoso` ayuda tanto al usuario como a Google a entender inmediatamente el contenido de la página.
            </p>
            <p class="text-muted">
                Este generador de slugs en línea procesa tus títulos o textos al instante para convertirlos en slugs listos para producción. Remueve tildes, signos de puntuación, emojis y caracteres especiales, normaliza la separación de palabras mediante guiones y ofrece un filtro avanzado para remover palabras de parada ("stop words") comunes, asegurando que tus URLs sean cortas, directas y con máxima densidad de palabras clave SEO.
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo generar un slug óptimo para SEO?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Escribe o pega el título de tu artículo, entrada de blog, producto o categoría en la caja de **Texto para Convertir**.</li>
                <li>Selecciona el **Separador de Palabras**: guion medio (`-`) recomendado por Google para la estructuración de URLs legibles, o guion bajo (`_`).</li>
                <li>Mantén activa la casilla de **Forzar Minúsculas** para cumplir con las mejores prácticas de servidores web, evitando duplicidad de enlaces por discrepancia de capitalización.</li>
                <li>Activa la casilla **Remover Stop Words** si deseas eliminar conectores, pronombres y preposiciones cortas comunes tanto en español (el, la, y, de, con, para...) como en inglés (the, an, of, during, under...). Esto reduce la longitud del slug y aumenta el peso semántico de las palabras clave principales.</li>
                <li>Visualiza el resultado en la caja oscura de salida y haz clic en **"Copiar Slug Amigable"** para guardarlo en tu portapapeles.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> La privacidad es absoluta. Todo el proceso de normalización Unicode, mapeo y remoción de stop words ocurre de forma inmediata en el cliente (tu navegador) mediante Javascript. Tus títulos y enlaces no son transmitidos ni almacenados en servidores externos.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: SEO Slug & URL Generator
            </h4>
            <p class="text-muted">
                A **slug** is the trailing part of a URL address that identifies a specific web page in an easy-to-read, search-engine friendly format. For instance, rather than deploying confusing links like `mywebsite.com/?id=987`, an optimal slug like `mywebsite.com/guide-successful-website-creation` guides both readers and web crawlers to establish context instantly.
            </p>
            <p class="text-muted">
                Our free Slug Maker processes titles, tags, and headlines into standardized slugs. It normalizes Unicode characters (strips accents and maps custom symbols like `ñ` to `n`), strips punctuation/emojis, formats word boundaries cleanly, and features optional stop-words filtering to deliver short, search-optimized URLs.
            </p>
            
            <h5 class="text-dark mt-4">How to create search-engine friendly slugs?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Type or paste your post heading, product title, or category name inside the **Text to Convert** input area.</li>
                <li>Choose your preferred **Word Separator**: hyphens (`-`) are highly endorsed by Google for clear crawlability, or underscores (`_`).</li>
                <li>Keep the **Force Lowercase** checkbox enabled to secure standard hosting configuration compatibility and avoid broken duplicate links.</li>
                <li>Enable the **Remove Stop Words** toggle to omit non-essential grammar connectors (like: the, an, a, of, and, in, with, de, la, por, para...). This creates punchier, keyword-dense URLs.</li>
                <li>Observe the finalized slug in the dark box, then click **"Copy Friendly Slug"** to immediately add it to your clipboard.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local Processing:</strong> Complete data confidentiality. The entire translation of Unicode diacritics, lowercase casting, and dictionary matching is computed instantly on your computer. Your search terms never travel across the internet.
            </div>
        @endif
    </div>
</div>
