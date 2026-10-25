<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Generador de Texto Lorem Ipsum
            </h4>
            <p class="text-muted">
                El texto **Lorem Ipsum** es el estándar de la industria del diseño gráfico, editorial y desarrollo web para representar texto de relleno o simulado. Se utiliza comúnmente antes de que el contenido final esté disponible, permitiendo a los diseñadores concentrarse en la disposición de los elementos visuales, tipografías y el flujo general de la página sin distraerse por el significado de las palabras.
            </p>
            <p class="text-muted">
                Nuestra herramienta te permite generar texto simulado a medida de manera instantánea y flexible. Ya sea que necesites unos pocos párrafos estructurados para maquetar un artículo, oraciones específicas para probar subtítulos o simplemente una lista de palabras aleatorias para rellenar elementos de navegación, el generador te provee del contenido necesario en segundos.
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo utilizar este generador en línea?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Introduce la **cantidad** deseada de elementos usando el campo numérico o el control deslizante.</li>
                <li>Selecciona la **unidad de medida** en el selector desplegable: Párrafos, Oraciones o Palabras.</li>
                <li>Activa la opción **"Comenzar con Lorem ipsum..."** si necesitas la estructura inicial tradicional.</li>
                <li>Si estás maquetando directamente en código, puedes activar **"Generar con etiquetas HTML"** para envolver automáticamente el texto en bloques <code>&lt;p&gt;</code>.</li>
                <li>Haz clic en **"Generar Texto"** y copia el resultado al portapapeles o descárgalo como archivo <code>.txt</code>.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Garantizamos la privacidad de tus datos. Todo el procesamiento de generación se realiza en tu navegador web localmente a través de JavaScript de manera inmediata. Ningún dato es transmitido ni almacenado en nuestros servidores, haciendo el proceso 100% privado y seguro.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Lorem Ipsum Placeholder Text Generator
            </h4>
            <p class="text-muted">
                **Lorem Ipsum** is the industry standard placeholder text used in graphic design, print layout, and web development. It is widely used before the final copy is available, enabling designers and developers to focus on visual layout, typography, and page structure without being distracted by readable content.
            </p>
            <p class="text-muted">
                Our advanced generator helps you construct tailor-made dummy text instantly. Whether you require structured paragraphs to lay out a comprehensive article, specific sentences to test subheadings, or a collection of random words to fill navbars, this tool delivers precisely configured mock content in seconds.
            </p>
            
            <h5 class="text-dark mt-4">How to use this online dummy text generator?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Enter the desired **quantity** of items using the numeric field or the range slider.</li>
                <li>Choose the **unit type** from the dropdown selector: Paragraphs, Sentences, or Words.</li>
                <li>Enable the **"Start with Lorem ipsum..."** option if you require the traditional beginning structure.</li>
                <li>If you are working directly with web templates, toggle **"Generate with HTML tags"** to wrap the generated output in <code>&lt;p&gt;</code> elements automatically.</li>
                <li>Click **"Generate Text"** to compute, then copy the result to your clipboard or download it as a plain <code>.txt</code> file.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local Execution:</strong> We care deeply about your privacy. All generator computation is performed entirely on your device via client-side JavaScript. Your interactions never touch our servers, ensuring 100% security and privacy.
            </div>
        @endif
    </div>
</div>
