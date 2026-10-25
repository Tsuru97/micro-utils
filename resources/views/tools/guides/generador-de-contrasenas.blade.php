<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3"><i class="ri-lock-password-line me-2 align-middle"></i>Guía de Seguridad: ¿Cómo Generar Contraseñas Realmente Fuertes?</h4>
            
            <p class="text-muted">El <strong>Generador de Contraseñas Seguras</strong> de MicroUtils es una herramienta de grado criptográfico diseñada para proteger tus identidades digitales. Te permite crear claves aleatorias robustas y personalizables para evitar ataques de fuerza bruta y hackeos en tus cuentas de redes sociales, banca, correos y servidores.</p>
            
            <h5 class="text-dark mt-4">¿Qué hace fuerte a una contraseña moderna?</h5>
            <p class="text-muted">Los piratas informáticos emplean sistemas automatizados capaces de probar miles de millones de combinaciones por segundo. Para mantener tus datos a salvo, sigue las siguientes recomendaciones:</p>
            <ul class="text-muted ps-3 mb-4">
                <li><strong>Longitud Extensa:</strong> La longitud es el factor de seguridad más determinante. Una clave de 16 caracteres es exponencialmente más difícil de romper que una de 8 caracteres, incluso si esta última contiene caracteres especiales. Recomendamos un mínimo de 12-16 caracteres.</li>
                <li><strong>Variedad de Caracteres:</strong> Combina siempre letras mayúsculas, minúsculas, dígitos numéricos y símbolos especiales (como `@`, `#`, `$`, `%`, etc.).</li>
                <li><strong>Sin Patrones Predecibles:</strong> Evita fechas de cumpleaños, nombres de mascotas, palabras de diccionario o secuencias de teclado comunes (como `123456` o `qwerty`).</li>
            </ul>

            <h5 class="text-dark">Generación Criptográfica y Cero Almacenamiento</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-4">
                <i class="ri-shield-keyhole-line label-icon align-middle fs-18 me-2"></i>
                <strong>Generador Local con Criptografía de API:</strong> Nuestra utilidad utiliza la API nativa de criptografía del navegador web (`window.crypto.getRandomValues`). Esto garantiza una aleatoriedad matemáticamente pura en lugar de algoritmos predecibles. Y lo más importante: las contraseñas se generan de forma local en tu memoria RAM. **Ninguna clave es enviada a servidores o guardada en bases de datos**, siendo imposible que sea interceptada.
            </div>

            <h5 class="text-dark">Pasos para Crear tus Contraseñas</h5>
            <ol class="text-muted ps-3 mb-0">
                <li>Ajusta el control deslizante para elegir la longitud deseada (recomendamos 16 caracteres para una seguridad estándar y 24 o más para accesos críticos).</li>
                <li>Selecciona los conjuntos de caracteres que desees incluir en la mezcla mediante las casillas de verificación (Mayúsculas, Minúsculas, Números, Símbolos).</li>
                <li>Haz clic en el botón de regenerar tantas veces como desees, copia la clave resultante y guárdala inmediatamente en tu gestor de contraseñas de confianza.</li>
            </ol>
        @else
            <h4 class="text-primary mb-3"><i class="ri-lock-password-line me-2 align-middle"></i>Security Guide: Creating Truly Strong and Unbreakable Passwords</h4>
            
            <p class="text-muted">The MicroUtils <strong>Secure Password Generator</strong> is a cryptographic-grade utility created to safeguard your digital identities. It enables the creation of highly randomized, custom keys to prevent dictionary attacks, brute-force exploits, and unauthorized access to your emails, financial sites, and servers.</p>
            
            <h5 class="text-dark mt-4">The Science Behind Strong Passwords</h5>
            <p class="text-muted">Cybercriminals employ advanced, automated cluster computers capable of testing billions of combinations per second. To stay protected, design your credentials around these key standards:</p>
            <ul class="text-muted ps-3 mb-4">
                <li><strong>Prioritize Length:</strong> Length is the single most critical factor in password entropy. A 16-character password is exponentially harder to crack than an 8-character one, even if the shorter one has symbols. We strongly suggest 12-16 characters minimum.</li>
                <li><strong>Vary Character Families:</strong> Ensure you include a balanced mix of uppercase letters, lowercase letters, numbers, and special symbols (such as `@`, `&`, `!`, `*`, `?`).</li>
                <li><strong>Eliminate Patterns:</strong> Never include dictionary words, names, birthdays, sequential numbers, or keyboard configurations (like `12345` or `password`).</li>
            </ul>

            <h5 class="text-dark">Cryptographically Secure Engine (Zero Log Policy)</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-4">
                <i class="ri-shield-keyhole-line label-icon align-middle fs-18 me-2"></i>
                <strong>Secure Web Crypto API Engine:</strong> Our password generator utilizes the browser's official, underlying `window.crypto.getRandomValues` interface. This leverages physical system noise to guarantee mathematically perfect randomness. Because execution is 100% local, **no generated values are ever transmitted to databases or external clouds**, eliminating interception risks.
            </div>

            <h5 class="text-dark">How to Generate Your Secure Key?</h5>
            <ol class="text-muted ps-3 mb-0">
                <li>Use the length slider to set your password size (we recommend 16 characters for accounts and 24+ for servers or critical databases).</li>
                <li>Mark the checkboxes to configure your included character families (Uppercase, Lowercase, Digits, Symbols).</li>
                <li>Click the regenerate button as many times as you like, copy the resulting string, and instantly secure it in your trusted password manager.</li>
            </ol>
        @endif
    </div>
</div>
