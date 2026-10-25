<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Probador de Expresiones Regulares (Regex Tester)
            </h4>
            <p class="text-muted">
                Una **expresión regular** (abreviada como *regex* o *regexp*) es una secuencia de caracteres que conforma un patrón de búsqueda. Se utiliza principalmente en el desarrollo de software y administración de sistemas para la validación de campos de entrada (como correos electrónicos o números telefónicos), búsqueda y reemplazo de texto complejo, y análisis de logs o archivos masivos.
            </p>
            <p class="text-muted">
                Nuestra herramienta interactiva de pruebas de Regex te permite escribir patrones de expresiones regulares basados en el motor nativo de JavaScript, configurar banderas modificadoras comunes y probarlos en tiempo real contra cualquier bloque de texto de prueba. La herramienta resaltará visualmente todas las coincidencias y desglosará de manera estructurada los grupos de captura capturados, facilitando la depuración y desarrollo de tus patrones de búsqueda.
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo probar expresiones regulares en línea?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Escribe o pega tu patrón de búsqueda en el campo **Expresión Regular (Patrón)**. No incluyes las barras inclinadas inicial y final `/`, ya que la interfaz las gestiona automáticamente.</li>
                <li>Activa las **Banderas (Flags)** de tu interés:
                    <ul class="ps-3 mt-1">
                        <li>**g (global):** Busca todas las coincidencias posibles en el texto en lugar de detenerse después de la primera coincidencia.</li>
                        <li>**i (case-insensitive):** Ignora diferencias entre mayúsculas y minúsculas al validar.</li>
                        <li>**m (multiline):** Hace que los delimitadores de inicio `^` y fin `$` afecten a cada línea individual en lugar de a todo el texto completo.</li>
                    </ul>
                </li>
                <li>Escribe o pega el texto en el panel de **Texto de Prueba**.</li>
                <li>Observa de forma instantánea el resaltado en colores en el panel de resultados. Cada coincidencia consecutiva se resalta en un tono diferente (azul y verde alternados) para diferenciarlas claramente.</li>
                <li>Revisa el panel de **Grupos de Captura** para inspeccionar qué subcadenas específicas fueron aisladas por tus paréntesis de captura `(...)` en cada coincidencia.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Garantizamos la seguridad absoluta de tus datos y patrones. Todo el procesamiento de expresiones regulares se realiza en tiempo real localmente en tu dispositivo mediante el motor nativo `RegExp` de tu navegador. Ningún texto de prueba ni patrón es enviado a internet o guardado en el servidor.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Regular Expression Tester (Regex Matcher)
            </h4>
            <p class="text-muted">
                A **regular expression** (commonly known as *regex* or *regexp*) is a specialized sequence of character tokens forming search patterns. Developers, data analysts, and sysadmins widely employ regex for input forms validation (e.g. scanning emails, postal codes, or URLs), structural parsing, advanced search-and-replace routines, and parsing raw log files.
            </p>
            <p class="text-muted">
                Our free interactive Regex testing utility allows you to compose patterns using the JavaScript native engine, toggle common execution modifiers (flags), and instantly validate them against custom test strings. The editor automatically highlights matched substrings and parses captures into an organized groups tree, facilitating painless troubleshooting.
            </p>
            
            <h5 class="text-dark mt-4">How to test regular expressions online?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Input your pattern in the **Regular Expression (Pattern)** field. Do not include leading or trailing slashes `/`, as the editor formats them dynamically.</li>
                <li>Toggle your required active **Flags**:
                    <ul class="ps-3 mt-1">
                        <li>**g (global):** Find all occurrences instead of halting at the first successful match.</li>
                        <li>**i (case-insensitive):** Ignore case differences (makes `a-z` match `A-Z`).</li>
                        <li>**m (multiline):** Restructure anchor assertions `^` and `$` to match the start/end of individual lines instead of the total block.</li>
                    </ul>
                </li>
                <li>Fill the **Test Text** box with your test inputs.</li>
                <li>Instantly inspect the colorful matches in the preview card. Successive matches toggle between blue and green highlights for easy debugging.</li>
                <li>Analyze the **Capture Groups** list below to see precise sub-expressions separated by parenthesis `(...)` blocks along with their start indexes.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local Execution:</strong> We care deeply about your privacy. All pattern testing and string evaluations run entirely in your local browser sandbox via JavaScript's `RegExp` API. Your confidential strings never leave your device.
            </div>
        @endif
    </div>
</div>
