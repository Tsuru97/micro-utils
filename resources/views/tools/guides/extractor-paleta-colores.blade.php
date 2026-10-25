<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Extractor de Paleta de Colores de Imágenes
            </h4>
            <p class="text-muted">
                Una **paleta de colores** es el conjunto coordinado de tonos seleccionados para una marca, sitio web o proyecto de diseño. Extraer los colores dominantes de una imagen o fotografía es una práctica excelente para creadores de contenido, diseñadores web y profesionales del marketing que desean inspirarse en imágenes reales o asegurar la consistencia visual en sus materiales gráficos y de interfaz de usuario.
            </p>
            <p class="text-muted">
                Esta micro-herramienta te permite cargar cualquier archivo de imagen (PNG, JPG, WebP o SVG) y escanear sus píxeles localmente en cuestión de milisegundos. Mediante un algoritmo avanzado de cuantización de color en el espacio tridimensional RGB, la herramienta agrupa los tonos similares y extrae las muestras más representativas y dominantes de la imagen junto con sus códigos Hexadecimales y RGB, listos para ser copiados y utilizados en tus hojas de estilo CSS o software de edición preferido.
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo extraer colores de tus fotos en línea?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Arrastra y suelta tu archivo de imagen dentro de la zona interactiva o haz clic para seleccionarlo de tu dispositivo.</li>
                <li>Establece el **Número de Colores** que deseas extraer de la paleta (puedes seleccionar entre 4, 6, 8 o 10 colores representativos).</li>
                <li>El sistema procesará la imagen de forma inmediata y renderizará una cuadrícula de tarjetas de colores con los tonos dominantes y su peso porcentual en la composición.</li>
                <li>Haz clic en el botón de **Copiar** individual en cada color para guardar su código Hex en el portapapeles, o haz clic en **"Copiar Todos los Colores"** para exportar la paleta completa separada por comas.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Garantizamos la privacidad absoluta de tus archivos. Todo el procesamiento de renderizado y cuantización cromática ocurre enteramente en tu navegador web utilizando la API HTML5 Canvas y Javascript en cliente. Tu imagen nunca es enviada, transmitida ni guardada en nuestros servidores.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Image Color Palette Extractor
            </h4>
            <p class="text-muted">
                A **color palette** represents a harmonized set of hues selected for brand identity, websites, or digital design templates. Extracting dominant color schemes from images is an excellent way for content creators, frontend developers, and graphics professionals to draw inspiration from real-world photos or maintain a flawless visual guidelines standard across interactive products.
            </p>
            <p class="text-muted">
                Our free palette extractor lets you upload any digital picture (PNG, JPG, WebP, SVG) and dissect its chromatic weight within milliseconds. Employing an advanced 3D RGB color clustering quantization algorithm, this utility classifies pixels into uniform color buckets and delivers the key dominant colors alongside their Hex and RGB strings, optimized for instant styling imports.
            </p>
            
            <h5 class="text-dark mt-4">How to extract colors from images online?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Drag and drop your graphics file into the interactive dropzone or click to select one directly from your files explorer.</li>
                <li>Adjust the **Number of Colors** dropdown to define how many swatches you want in the final scheme (select 4, 6, 8, or 10 elements).</li>
                <li>Review the dynamic palette layout containing the computed hex values and their structural frequency percentages immediately.</li>
                <li>Click the **Copy icon** inside any color box to copy a specific Hex code, or press **"Copy All Colors"** to capture the full scheme.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local Execution:</strong> We value your data security. Your graphic files are rendered and computed fully locally inside your device using standard HTML5 Canvas and client-side JavaScript. No images or file records ever leave your web browser.
            </div>
        @endif
    </div>
</div>
