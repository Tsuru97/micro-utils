<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Diseñando con Gradientes CSS Modernos
            </h4>
            <p class="text-muted">
                Un **gradiente CSS** (o degradado) es una transición suave entre dos o más colores que se aplica como fondo de un elemento web. En los inicios de la web, crear fondos con degradados requería cortar imágenes en Photoshop y cargarlas de forma repetida en mosaico, lo que ralentizaba la web considerablemente. Hoy en día, gracias a CSS3, podemos definir transiciones de color vectoriales ultra-ligeras de forma nativa en el código, logrando interfaces fluidas, modernas y de carga instantánea.
            </p>
            <p class="text-muted">
                Existen dos tipos principales de gradientes: los **lineales** (transiciones que viajan en línea recta siguiendo un ángulo de dirección específico) y los **radiales** (degradados que irradian desde un punto central hacia afuera en forma circular o elíptica). La clave para diseñar un gradiente premium y profesional radica en añadir paradas de color (color stops) con transiciones suaves, combinando tonalidades complementarias y jugando con la opacidad.
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo utilizar este editor visual de degradados?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Selecciona el **Tipo de Gradiente**: Lineal o Radial.</li>
                <li>Si elegiste lineal, ajusta la dirección usando el deslizador de **Ángulo** (de 0° a 360°).</li>
                <li>Administra tus **Paradas de Color**:
                    <ul>
                        <li>Haz clic en **"Añadir Color"** para añadir una nueva parada de color en la mezcla.</li>
                        <li>Utiliza el selector de color interactivo de cada parada para cambiar el tono cromático.</li>
                        <li>Escribe directamente el código Hexadecimal si tienes una paleta de diseño predefinida.</li>
                        <li>Ajusta la posición (0% al 100%) usando la barra deslizadora de cada parada para enfocar o suavizar la transición.</li>
                        <li>Elimina cualquier color sobrante haciendo clic en el icono del bote de basura (mínimo se requieren 2 colores).</li>
                    </ul>
                </li>
                <li>Visualiza el resultado en tiempo real en la tarjeta de previsualización e inyecta el código en tus hojas de estilo copiándolo con el botón verde **"Copiar Código CSS"**.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Garantizamos la privacidad de tus diseños. Todo el procesamiento visual de color, mezclas y generación de código ocurre localmente en tu navegador web utilizando JavaScript y hojas de estilo en cascada. Ningún dato sobre tus preferencias cromáticas o códigos de diseño es guardado ni transmitido a nuestros servidores, garantizando privacidad total del 100%.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Designing with Modern CSS Color Gradients
            </h4>
            <p class="text-muted">
                A **CSS gradient** represents a smooth transition between two or more colors rendered directly as a background asset. In the early days of web layouts, rendering color shifts required cutting heavy image strips in graphic programs and tiling them across containers, severely impacting load speeds. Thanks to modern CSS3 standards, browser engines generate vector transitions natively, yielding fluid, crisp, and high-performance backgrounds instantly.
            </p>
            <p class="text-muted">
                Two primary gradient structures exist: **linear gradients** (transitions traveling in a straight line along a defined angular direction) and **radial gradients** (transitions radiating outward from a central anchor point in circular or elliptical formations). Creating a professional, state-of-the-art gradient relies heavily on configuring multiple color stops, using cohesive palettes, and blending opacities smoothly.
            </p>
            
            <h5 class="text-dark mt-4">How to use this visual gradient editor?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Select your preferred **Gradient Type**: Linear or Radial.</li>
                <li>If using linear, adjust the flow direction using the **Angle** range slider (from 0° to 360°).</li>
                <li>Configure your custom **Color Stops**:
                    <ul>
                        <li>Click **"Add Color"** to append a new stop inside your gradient mix.</li>
                        <li>Click the interactive color picker box of any stop to visually choose a hue.</li>
                        <li>Enter precise Hexadecimal values directly if you are referencing a design system.</li>
                        <li>Slide the position slider (from 0% to 100%) to compress or expand the transition boundaries.</li>
                        <li>Strip away unwanted colors using the trash icon (a minimum of 2 stops is enforced).</li>
                    </ul>
                </li>
                <li>Review the live render in real-time inside the preview block, then click the green **"Copy CSS Code"** button to grab the fully compliant CSS syntax.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local Execution:</strong> We care deeply about your privacy. All color calculations, visual rendering, and code generation occur strictly on your device via client-side JavaScript. Your design aesthetics and styling palettes never touch our servers, guaranteeing 100% security and privacy.
            </div>
        @endif
    </div>
</div>
