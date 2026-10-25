<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: ¿Qué es un JSON Web Token (JWT) y cómo decodificarlo de forma segura?
            </h4>
            <p class="text-muted">
                Un **JSON Web Token (JWT)** es un estándar abierto (RFC 7519) sumamente popular que define una forma compacta y autónoma de transmitir información entre partes como un objeto JSON de forma segura. Se utiliza principalmente en el desarrollo de software y APIs modernas para la autenticación y autorización de usuarios.
            </p>
            <p class="text-muted">
                La estructura básica de un JWT consta de tres partes separadas por puntos (<code class="fs-12 text-primary font-monospace">.</code>):
            </p>
            <ul class="text-muted ps-3 mb-4">
                <li class="mb-2"><strong>Cabecera (Header):</strong> Contiene metadatos como el tipo de token y el algoritmo de firma utilizado (por ejemplo, HMAC SHA256 o RSA).</li>
                <li class="mb-2"><strong>Carga Útil (Payload):</strong> Contiene los reclamos (Claims) o datos útiles, como el ID del usuario, su nombre, roles y fechas de vigencia.</li>
                <li><strong>Firma (Signature):</strong> Se genera combinando la cabecera y la carga útil codificadas en Base64Url con una clave secreta a través del algoritmo especificado, permitiendo verificar que el remitente es auténtico y que el mensaje no ha sido alterado.</li>
            </ul>

            <h5 class="text-dark">Recomendación Crítica de Seguridad</h5>
            <div class="alert alert-warning border-0 bg-warning-subtle mb-4">
                <i class="ri-alert-line label-icon align-middle fs-18 me-2 text-warning"></i>
                <strong>Atención:</strong> Las dos primeras partes de un JWT (Header y Payload) están simplemente codificadas en **Base64Url** y **NO están encriptadas**. Esto significa que cualquiera que tenga acceso al token puede decodificarlo y leer su contenido de forma inmediata. **Por seguridad, nunca debes almacenar contraseñas, claves privadas ni datos altamente sensibles dentro del Payload de un JWT.**
            </div>

            <h5 class="text-dark">¿Cómo utilizar este decodificador fuera de línea?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Pega tu JWT completo en la casilla de entrada del panel izquierdo.</li>
                <li>Visualiza de manera instantánea el desglose de los segmentos decodificados a la derecha con un formato de color limpio (Rojo para Header, Púrpura para Payload y Azul para Firma).</li>
                <li>Consulta la sección de estado en la parte inferior izquierda para validar de inmediato la fecha de expiración (<code class="fs-12 text-primary font-monospace">exp</code>) y ver si el token sigue activo o ya ha expirado.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>100% Seguro y Offline:</strong> Decodificar tokens que contienen datos de autenticación sensibles en sitios externos representa un riesgo crítico de seguridad. Nuestra herramienta se ejecuta de forma **100% local en tu navegador mediante JavaScript**. Ningún token, cabecera ni payload es enviado a internet o guardado en nuestros servidores, haciendo el proceso completamente privado y seguro.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Understanding and Securely Decoding JSON Web Tokens (JWT)
            </h4>
            <p class="text-muted">
                A **JSON Web Token (JWT)** is a widely-used open standard (RFC 7519) that defines a compact, self-contained mechanism for securely transmitting assertions or data claims between systems as a JSON object. JWTs are the industry standard for securing modern RESTful APIs and microservices during client authentication and single sign-on (SSO).
            </p>
            <p class="text-muted">
                A JSON Web Token consists of three distinct segments delimited by periods (<code class="fs-12 text-primary font-monospace">.</code>):
            </p>
            <ul class="text-muted ps-3 mb-4">
                <li class="mb-2"><strong>Header:</strong> Specifies metadata about the token, such as token type and cryptographic signing algorithm (e.g., HMAC SHA256 or RSA).</li>
                <li class="mb-2"><strong>Payload:</strong> Encodes claims or context information (such as user ID, role scopes, and lifespan boundaries).</li>
                <li><strong>Signature:</strong> Combines the encoded header and payload segments with a server secret using the specified algorithm to verify message integrity and sender identity.</li>
            </ul>

            <h5 class="text-dark">Critical Security Best Practice</h5>
            <div class="alert alert-warning border-0 bg-warning-subtle mb-4">
                <i class="ri-alert-line label-icon align-middle fs-18 me-2 text-warning"></i>
                <strong>Notice:</strong> The first two segments (Header & Payload) of a JWT are only **Base64Url encoded**, not encrypted. Anyone who intercepts a token can reconstruct the underlying JSON object effortlessly. **Consequently, never place sensitive credentials, credit card details, or private keys inside a JWT claim set.**
            </div>

            <h5 class="text-dark">How to use this Offline JWT Parser</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Paste your complete JWT into the input field on the left card.</li>
                <li>Instantly inspect the decoded sections on the right card, color-coded for fast readability (Red for Header, Purple for Payload, and Blue for Signature).</li>
                <li>Check the status panel on the lower left to view formatted expiration timestamps (<code class="fs-12 text-primary font-monospace">exp</code>) and determine if the token is active or expired.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>100% Offline-First Sandbox:</strong> Pasting live bearer tokens into internet decoders can lead to account hijackings or credential leaks. Our utility performs all Base64Url parsing **strictly client-side in your local browser sandbox**. No token data leaves your device, keeping your production tokens completely private.
            </div>
        @endif
    </div>
</div>
