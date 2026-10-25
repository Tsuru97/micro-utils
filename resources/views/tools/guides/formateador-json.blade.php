<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3"><i class="ri-code-line me-2 align-middle"></i>Formateador y Validador JSON: Guía Completa de Uso y Buenas Prácticas</h4>
            
            <p class="text-muted">El <strong>Formateador y Validador JSON</strong> de MicroUtils es una herramienta esencial para desarrolladores de software, analistas de datos e ingenieros de sistemas. Te permite embellecer (beautify), compactar (minify) y verificar la sintaxis de tus datos estructurados en formato JSON al instante.</p>
            
            <h5 class="text-dark mt-4">¿Qué es JSON y por qué es tan relevante?</h5>
            <p class="text-muted"><strong>JSON</strong> (JavaScript Object Notation) es el estándar de intercambio de datos ligero y más utilizado en la web actual. Es la base de las APIs RESTful, bases de datos no relacionales (como MongoDB) y configuraciones de sistemas modernos. Sin embargo, al ser un formato estricto, cualquier pequeño error de carácter puede impedir que un sistema funcione.</p>

            <h5 class="text-dark">Errores Sintácticos Comunes en JSON</h5>
            <p class="text-muted">Nuestra herramienta incluye un depurador que localiza automáticamente la línea exacta de falla si tu JSON no es válido. Los errores más recurrentes son:</p>
            <ul class="text-muted ps-3 mb-4">
                <li><strong>Comillas Simples:</strong> JSON solo acepta comillas dobles (`"`) para delimitar claves y cadenas. El uso de comillas simples (`'`) producirá un error sintáctico inmediato.</li>
                <li><strong>Comas Colgadas (Trailing Commas):</strong> A diferencia de JavaScript estándar, el último elemento de un objeto o arreglo en JSON <em>no</em> debe tener una coma final antes del cierre.</li>
                <li><strong>Llaves o Corchetes sin Cerrar:</strong> La omisión de un corchete `]` o llave `}` al final de payloads complejos suele corromper la estructura.</li>
            </ul>

            <h5 class="text-dark">Seguridad de Datos de Producción (Cumplimiento GDPR)</h5>
            <div class="alert alert-warning border-0 shadow-none bg-warning-subtle mb-4">
                <i class="ri-git-repository-private-line label-icon align-middle fs-18 me-2"></i>
                <strong>Procesamiento Local:</strong> Muchos formateadores en línea envían tus datos estructurados a sus servidores. Si estás trabajando con registros reales de usuarios, credenciales o API keys de producción, esto puede constituir una brecha grave de seguridad. En MicroUtils, todo el procesamiento se realiza en local en tu navegador. Tus datos jamás tocan internet.
            </div>

            <h5 class="text-dark">Instrucciones de Operación</h5>
            <ol class="text-muted ps-3 mb-0">
                <li>Pega el código JSON desordenado o en miniatura en el editor de texto superior.</li>
                <li>El formateador analizará de inmediato el texto y lo organizará con sangrías claras de 4 espacios.</li>
                <li>Si existe algún error, el indicador te marcará visualmente el problema exacto para corregirlo. Puedes cambiar entre las pestañas para ver las variantes formateadas o compactas según lo requieras.</li>
            </ol>
        @else
            <h4 class="text-primary mb-3"><i class="ri-code-line me-2 align-middle"></i>JSON Formatter and Validator: Complete Developer Guide</h4>
            
            <p class="text-muted">The MicroUtils <strong>JSON Formatter and Validator</strong> is an indispensable utility built for software engineers, data analysts, and system administrators. It allows you to beautify, minify, and syntactically validate structured data payloads instantly.</p>
            
            <h5 class="text-dark mt-4">Understanding JSON and Its Importance</h5>
            <p class="text-muted"><strong>JSON</strong> (JavaScript Object Notation) is the dominant open standard format for structured data exchange across modern computer networks. It powers RESTful web APIs, NoSQL document databases (like MongoDB), and system configurations. Because it is highly rigorous, even a minor syntax error will crash application connections.</p>

            <h5 class="text-dark">Common Syntactical Mistakes in JSON</h5>
            <p class="text-muted">Our validator acts as an interactive debugging tool by highlighting the specific lines where errors occur. Common errors include:</p>
            <ul class="text-muted ps-3 mb-4">
                <li><strong>Single Quote Usage:</strong> The JSON specification strictly enforces the use of double quotes (`"`) for keys and string values. Single quotes (`'`) will fail parsing immediately.</li>
                <li><strong>Trailing Commas:</strong> Unlike modern JavaScript arrays, the final item inside a JSON object or array must <em>not</em> have a trailing comma before closures.</li>
                <li><strong>Mismatched Brackets:</strong> Forgetting to close nested braces (`}`) or brackets (`]`) inside large nested structures corrupts document integrity.</li>
            </ul>

            <h5 class="text-dark">GDPR Compliance & Production Data Security</h5>
            <div class="alert alert-warning border-0 shadow-none bg-warning-subtle mb-4">
                <i class="ri-git-repository-private-line label-icon align-middle fs-18 me-2"></i>
                <strong>Private Client-Side Processing:</strong> Traditional web tools transmit your raw JSON data to external servers. If you paste customer lists, password hashes, or confidential API keys, this can trigger massive compliance breaches. MicroUtils executes all validation locally on your browser. Your data is 100% secure.
            </div>

            <h5 class="text-dark">How to Use the JSON Formatter?</h5>
            <ol class="text-muted ps-3 mb-0">
                <li>Paste your compact, minified, or unformatted JSON text inside the primary workspace block.</li>
                <li>The system will automatically parse and output cleanly tabbed objects with 4-space indentations.</li>
                <li>If syntax issues are present, read the real-time feedback label to resolve the error location, copy the optimized code, or toggle between pretty/minify tabs as needed.</li>
            </ol>
        @endif
    </div>
</div>
