<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3"><i class="ri-whatsapp-line me-2 align-middle"></i>Guía: Cómo Utilizar Enlaces y Códigos QR de WhatsApp en tu Negocio</h4>
            
            <p class="text-muted">El <strong>Generador de Enlaces y Códigos QR de WhatsApp</strong> de MicroUtils es una herramienta potente y gratuita para acelerar los embudos de ventas. Permite a tus prospectos y clientes iniciar una conversación de chat con tu número de teléfono con un solo clic o escaneo, eliminando la molesta necesidad de agendarte en sus contactos primero.</p>
            
            <h5 class="text-dark mt-4">¿Cómo funciona la API de Click-to-Chat de WhatsApp?</h5>
            <p class="text-muted">WhatsApp ofrece un protocolo de comunicación oficial (a menudo llamado enlaces `wa.me`). Esta herramienta automatiza la creación de estas URLs codificando el número en formato internacional e inyectando un mensaje predefinido mediante parámetros de consulta seguros. La estructura del enlace resultante sigue el formato estándar:</p>
            <code class="d-block bg-light p-2 mb-3 rounded text-primary">https://wa.me/telefono?text=mensaje_codificado</code>

            <h5 class="text-dark">Beneficios Clave para tu Estrategia Digital</h5>
            <div class="row text-muted mb-4">
                <div class="col-md-6 mb-3 mb-md-0">
                    <h6 class="text-dark"><i class="ri-links-line text-success me-2"></i>Enlaces para Canales Digitales</h6>
                    <p class="fs-13 mb-0">Coloca tu enlace personalizado en el "Enlace en Bio" de Instagram, TikTok o Facebook, o añádelo como un botón de soporte directo en tu sitio web. Esto reduce drásticamente las fricciones y aumenta la tasa de conversión de clientes potenciales.</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-qr-code-line text-success me-2"><i class="ri-qr-code-line text-success me-2"></i>Códigos QR para Canales Físicos</h6>
                    <p class="fs-13 mb-0">Los códigos QR generados son perfectos para materiales impresos: tarjetas de presentación, cartas o menús de restaurantes, folletos publicitarios y empaques de productos. Tus clientes solo necesitan apuntar la cámara de su móvil para contactarte al instante.</p>
                </div>
            </div>

            <h5 class="text-dark">Instrucciones de Uso Rápido</h5>
            <ol class="text-muted ps-3 mb-0">
                <li>Selecciona el código de país de tu número telefónico e ingresa tu número sin espacios ni guiones.</li>
                <li>Escribe un mensaje de bienvenida predeterminado (ej: <em>"Hola, me interesa solicitar información sobre sus servicios..."</em>) para que el usuario no tenga que redactar nada desde cero.</li>
                <li>Haz clic en generar para obtener tu enlace directo y el archivo de Código QR de alta resolución listo para descargar e imprimir.</li>
            </ol>
        @else
            <h4 class="text-primary mb-3"><i class="ri-whatsapp-line me-2 align-middle"></i>Guide: Using WhatsApp Links and QR Codes for Higher Conversions</h4>
            
            <p class="text-muted">The MicroUtils <strong>WhatsApp Link and QR Code Generator</strong> is a highly converting utility created to streamline customer outreach. By providing a direct path to chat with your business phone number in a single click or scan, you completely bypass the friction of saving numbers manually in phone books.</p>
            
            <h5 class="text-dark mt-4">How Does the WhatsApp Click-to-Chat API Function?</h5>
            <p class="text-muted">WhatsApp supports an official connection protocol commonly referred to as `wa.me` links. Our utility automates the creation of these specialized links by sanitizing your international phone number and URL-encoding your customized greeting message. The structure of the generated web link is:</p>
            <code class="d-block bg-light p-2 mb-3 rounded text-primary">https://wa.me/phone?text=encoded_message</code>

            <h5 class="text-dark">Core Marketing Benefits for Your Business</h5>
            <div class="row text-muted mb-4">
                <div class="col-md-6 mb-3 mb-md-0">
                    <h6 class="text-dark"><i class="ri-links-line text-success me-2"></i>Link in Bio for Social Accounts</h6>
                    <p class="fs-13 mb-0">Integrate your direct chat link into your Instagram, TikTok, or Twitter "Link in Bio" spaces, or deploy it as a direct floating help button. This increases inbound customer query rates substantially by making contact painless.</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-dark"><i class="ri-qr-code-line text-success me-2"></i>QR Codes for Physical Collaterals</h6>
                    <p class="fs-13 mb-0">Downloadable high-contrast QR codes are highly effective on print elements: business cards, menus, shop windows, and packaging. Offline audiences simply scan to connect with your support desks immediately.</p>
                </div>
            </div>

            <h5 class="text-dark">How to Generate Your Link?</h5>
            <ol class="text-muted ps-3 mb-0">
                <li>Input your country code followed by your active WhatsApp number (omit local leading zeros, spaces, or dashes).</li>
                <li>Compose a friendly introductory template message (e.g., <em>"Hi, I would like to receive a custom quote for your products..."</em>) to help your clients start conversations effortlessly.</li>
                <li>Click generate to immediately copy your link and export a print-ready, high-fidelity QR Code image.</li>
            </ol>
        @endif
    </div>
</div>
