<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Escritura Eficiente con Markdown y HTML en Vivo
            </h4>
            <p class="text-muted">
                **Markdown** es un lenguaje de marcado ligero que permite aplicar formato a un texto plano de manera sumamente rápida, intuitiva y legible. Creado por John Gruber en 2004, se ha convertido en el estándar indiscutible para redactores web, programadores y creadores de contenido técnico gracias a su compatibilidad universal y a que evita el uso de interfaces visuales complejas (WYSIWYG) que suelen inyectar código HTML sucio y pesado.
            </p>
            <p class="text-muted">
                Este **Editor Markdown e Inspección HTML en Vivo** combina la simplicidad de la escritura en texto plano con un potente motor de renderizado local. Podrás estructurar artículos, documentación técnica, READMEs para repositorios de código o notas estructuradas, observando de forma instantánea tanto el aspecto visual final como la estructura limpia del código HTML resultante en pestañas separadas.
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo sacarle el máximo provecho a este editor?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li><strong>Escribe o pega tu texto:</strong> Comienza a escribir en la sección izquierda del editor. Si no estás familiarizado con la sintaxis, utiliza la barra de herramientas superior para insertar negritas, cursivas, encabezados, listas, citas, código e imágenes.</li>
                <li><strong>Atajos de teclado rápidos:</strong> Usa los comandos tradicionales del teclado como <kbd>Ctrl + B</kbd> para negritas o <kbd>Ctrl + I</kbd> para itálicas directamente en la caja de texto del editor.</li>
                <li><strong>Tabla de Contenidos Automática (TOC):</strong> Al estructurar tu texto con encabezados (`#`, `##`, `###`), el sistema creará un índice dinámico interactivo en la parte superior derecha. Al hacer clic en cualquier sección, el visor se desplazará suavemente hasta ella.</li>
                <li><strong>Inspección HTML quirúrgica:</strong> Cambia a la pestaña **"Código HTML"** para ver las etiquetas HTML limpias autogeneradas. Es ideal para copiar el marcado directamente a tu sistema gestor de contenidos (CMS) como WordPress o Laravel sin hojas de estilo intrusivas.</li>
                <li><strong>Exportación instantánea:</strong> Descarga el archivo de texto fuente en formato `.md` o el documento web autónomo completo en `.html` listo para subir a un servidor o enviar por correo electrónico.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local Offline:</strong> Valoramos tu privacidad intelectual. Todo el parseado sintáctico de Markdown a HTML, el conteo de palabras en tiempo real, el mapa de encabezados de navegación y la exportación de archivos ocurren de manera aislada y local en tu navegador por medio de JavaScript. Ninguna palabra o carácter de tu texto es enviado al servidor, garantizando seguridad absoluta.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Seamless Writing with Markdown & Live HTML Inspection
            </h4>
            <p class="text-muted">
                **Markdown** is a lightweight markup language with plain-text formatting syntax designed to be easily converted to clean HTML. Invented by John Gruber in 2004, it has become the standard for technical writers, software developers, and bloggers. It allows you to maintain total focus on typing without being distracted by heavy Word-like toolbar menus that clutter source code with nesting inline styles.
            </p>
            <p class="text-muted">
                This **Markdown Editor & Live HTML Inspector** merges clean, plain-text typography with a high-performance in-browser rendering engine. Build blogs, technical manuals, GitHub repository READMEs, or structured notes. See changes update instantly on the visual preview tab, and audit the output structure inside the HTML inspection code pane.
            </p>
            
            <h5 class="text-dark mt-4">Editor Mechanics & Formatting Controls</h5>
            <ol class="text-muted ps-3 mb-4">
                <li><strong>Writing & Controls:</strong> Write directly in the left pane. If you need help with Markdown tags, use the rich top toolbar to quickly add bolding, headings, tables, blockquotes, lists, images, or link formats.</li>
                <li><strong>Quick Keyboard Commands:</strong> Speed up editing by using standard operating system keystrokes like <kbd>Ctrl + B</kbd> to bold highlighted text or <kbd>Ctrl + I</kbd> to apply italics.</li>
                <li><strong>Automated Table of Contents (TOC):</strong> When you write using standard heading styles (`#`, `##`, `###`), the utility auto-calculates and renders a clickable hierarchy table on the right side. Clicking any index item scrolls the preview viewport smoothly to that exact node.</li>
                <li><strong>Clean HTML Inspector:</strong> Select the **"HTML Code"** tab on the preview pane to instantly view and copy clean, semantic markup tags. It is perfect for transferring web copy straight into your CMS.</li>
                <li><strong>Downloading Formats:</strong> Click **"Download Markdown"** to save your raw `.md` file, or click **"Export as HTML"** to compile a complete, standalone responsive Web document `.html`.</li>
            </ol>

            <h5 class="text-dark">Complete Data Security Guarantee</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>100% Client-Side Sandbox:</strong> Your thoughts and articles are safe and secure. All Markdown compilation, word/character metrics tracking, TOC index generation, and file exporting run locally inside your browser memory. No data is sent over the internet or logged on any server.
            </div>
        @endif
    </div>
</div>
