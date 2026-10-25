<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Codificador y Decodificador URL
            </h4>
            <p class="text-muted">
                La codificación URL, también conocida como **percent-encoding** (codificación por porcentaje), es un mecanismo utilizado para codificar información en un Uniform Resource Identifier (URI) bajo ciertas circunstancias. Aunque popularmente se le conoce como codificación URL, en realidad se aplica de manera más general dentro del conjunto global de caracteres de las URIs y URLs del protocolo HTTP.
            </p>
            <p class="text-muted">
                Ciertos caracteres especiales tienen significados reservados en las URLs (como <code>?</code>, <code>&</code>, <code>=</code>, <code>/</code>, <code>:</code>). Si necesitas pasar textos que contengan estos caracteres como parámetros de consulta (query parameters) en una URL sin romper su estructura sintáctica, debes convertirlos a sus representaciones seguras en formato de porcentaje. De igual manera, caracteres especiales e internacionales que no pertenezcan al estándar ASCII (como acentos o la letra ñ) deben ser codificados de forma segura.
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo utilizar esta herramienta en línea?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Escribe o pega el texto o URL que deseas procesar en el panel de **Texto de Entrada**.</li>
                <li>Haz clic en **"Codificar URL"** para convertir caracteres reservados y caracteres especiales a su formato seguro <code>%XX</code> (cumpliendo estrictamente con el estándar RFC 3986).</li>
                <li>Haz clic en **"Decodificar URL"** si tienes una cadena que contiene porcentajes (como un enlace copiado de tu barra de búsqueda) y necesitas traducirla de vuelta a texto legible en lenguaje natural.</li>
                <li>Copia el resultado instantáneamente usando el botón verde **"Copiar texto"**.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Garantizamos la privacidad de tus datos. Todo el procesamiento de conversión se realiza en tu navegador web localmente a través de JavaScript de manera inmediata. Ningún dato es transmitido ni almacenado en nuestros servidores, haciendo el proceso 100% privado y seguro.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: URL Encoder and Decoder
            </h4>
            <p class="text-muted">
                URL encoding, also referred to as **percent-encoding**, is a mechanism used to translate specific characters in a Uniform Resource Identifier (URI) under precise conditions. While commonly referred to as URL encoding, it is a broader standard defined for all URIs and URLs within the HTTP web protocol.
            </p>
            <p class="text-muted">
                Certain special characters have reserved meanings in URLs (such as <code>?</code>, <code>&</code>, <code>=</code>, <code>/</code>, <code>:</code>). If you need to transmit user inputs containing these characters inside query parameters without breaking the URL's syntactical structure, they must be converted into their percentage safe representations. Additionally, international characters outside the standard ASCII range (like accented letters or non-English symbols) require encoding to be parsed properly by servers and browsers.
            </p>
            
            <h5 class="text-dark mt-4">How to use this online encoding tool?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Type or paste the raw string or encoded link into the **Input Text** area on the left.</li>
                <li>Click **"Encode URL"** to convert reserved characters and special symbols into their secure <code>%XX</code> format (complying strictly with the RFC 3986 standard).</li>
                <li>Click **"Decode URL"** if you have an obfuscated URL containing percent codes and need to restore it to human-readable plain text.</li>
                <li>Instantly export the computed result using the green **"Copy text"** button.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local Execution:</strong> We care deeply about your privacy. All encoder and decoder operations are performed entirely on your device via client-side JavaScript. Your text never leaves your browser, ensuring 100% security and privacy.
            </div>
        @endif
    </div>
</div>
