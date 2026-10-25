<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Conversor de JSON a CSV / CSV a JSON
            </h4>
            <p class="text-muted">
                En el ecosistema del desarrollo web y el análisis de datos, **JSON** (JavaScript Object Notation) y **CSV** (Comma-Separated Values) son dos de los formatos más utilizados para el almacenamiento, serialización e intercambio de información. JSON sobresale por su capacidad para representar estructuras jerárquicas complejas y objetos anidados, convirtiéndose en el formato rey de las APIs modernas. Por otro lado, CSV es el formato plano por excelencia para representar bases de datos tabulares, altamente compatible con software de hojas de cálculo como Microsoft Excel y Google Sheets.
            </p>
            <p class="text-muted">
                Nuestra utilidad bidireccional te permite convertir y traducir instantáneamente datos entre estos formatos. Si tienes una lista JSON de usuarios y necesitas abrirla en Excel para generar reportes, el conversor aplana automáticamente los objetos anidados (por ejemplo, convirtiendo <code>{"contacto": {"email": "ejemplo@web.com"}}</code> a la columna <code>contacto.email</code>) de forma transparente. Si cuentas con un CSV y necesitas alimentar tu base de datos o API, traduce tus columnas a colecciones JSON válidas y formateadas a tu gusto en segundos.
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo utilizar este conversor bidireccional?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Selecciona la pestaña superior correspondiente: **JSON a CSV** o **CSV a JSON**.</li>
                <li>Pega tus datos en el cuadro de texto del panel izquierdo.</li>
                <li>Si estás convirtiendo de CSV a JSON, puedes configurar el tamaño de la **identación del código de salida** (2 espacios, 4 espacios o minificado).</li>
                <li>Haz clic en el botón primario de conversión.</li>
                <li>En la pestaña de JSON a CSV, se generará una **vista previa tabular e interactiva** de tus primeros 5 registros para que verifiques la alineación de las columnas antes de exportar.</li>
                <li>Copia los resultados al portapapeles o descárgalos directamente como archivos <code>.csv</code> o <code>.json</code>.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Garantizamos la privacidad de tus datos. Todo el procesamiento de conversión y formateo de los archivos ocurre directamente en tu navegador web de forma inmediata utilizando JavaScript. Tus bases de datos e información sensible **nunca se cargan en nuestros servidores**, haciendo el proceso 100% privado y seguro.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Bidirectional JSON to CSV & CSV to JSON Converter
            </h4>
            <p class="text-muted">
                Within modern data analytics and web engineering, **JSON** (JavaScript Object Notation) and **CSV** (Comma-Separated Values) serve as two cornerstone formats for serialization, storage, and data exchange. JSON is highly favored for representing complex hierarchies and nested objects, serving as the default format for modern REST and GraphQL APIs. Conversely, CSV represents the most widely compatible tabular raw format, easily parsed by spreadsheets like Microsoft Excel and Google Sheets.
            </p>
            <p class="text-muted">
                Our responsive tool bridges the gap by offering zero-latency bidirectional conversions. If you hold a JSON list and need it in Excel for calculation, our engine automatically flattens multi-layer nested parameters (for example, mapping <code>{"contact": {"email": "hello@web.com"}}</code> into a clean header labeled <code>contact.email</code>). Conversely, translate CSV structures back into fully valid, indented JSON lists in seconds.
            </p>
            
            <h5 class="text-dark mt-4">How to utilize this online converter?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Choose the appropriate active tab: **JSON to CSV** or **CSV to JSON**.</li>
                <li>Paste your source text array inside the input textarea on the left.</li>
                <li>If translating from CSV to JSON, choose your target **JSON output indentation size** (2 spaces, 4 spaces, or minified single-line).</li>
                <li>Click the primary conversion button to trigger the client-side parser.</li>
                <li>When converting JSON to CSV, a **live tabular table preview** of your first 5 rows will render instantly to verify column alignments.</li>
                <li>Copy the resulting text to your clipboard or download it as a ready-to-use <code>.csv</code> or <code>.json</code> file.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local Execution:</strong> We care deeply about your privacy. All serialization, parsing, and formatting calculations occur strictly in your browser memory via client-side JavaScript. No datasets or personal database columns are ever sent to our servers, ensuring 100% privacy and security.
            </div>
        @endif
    </div>
</div>
