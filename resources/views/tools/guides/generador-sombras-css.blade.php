<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Generador de Sombras CSS (Box Shadow)
            </h4>
            <p class="text-muted">
                La propiedad **`box-shadow`** de CSS permite aplicar una o más sombras alrededor del marco de un elemento HTML. El uso adecuado de las sombras en el diseño web es clave para crear profundidad visual (eje Z), diferenciar elementos superpuestos (como diálogos emergentes, barras de navegación o tarjetas) y lograr una estética moderna y premium de tipo Glassmorphism o Neumorphism.
            </p>
            <p class="text-muted">
                Esta herramienta interactiva te ayuda a diseñar de forma visual e intuitiva sombras perfectas. Puedes ajustar todas las variables soportadas por el estándar CSS (desplazamientos horizontal y vertical, desenfoque, propagación, color, opacidad y el modo interno `inset`), observar los cambios en tiempo real en una tarjeta interactiva, y copiar el código final optimizado con prefijos de compatibilidad cruzada (`-webkit-box-shadow`, `-moz-box-shadow`).
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo utilizar este generador de sombras en línea?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Usa los controles deslizantes para ajustar el **Desplazamiento Horizontal (H)** y el **Desplazamiento Vertical (V)** de la sombra. Valores positivos desplazan la sombra a la derecha y hacia abajo; valores negativos a la izquierda y hacia arriba.</li>
                <li>Modifica el **Radio de Desenfoque (Blur)** para hacer la sombra más suave o más nítida, y el **Radio de Propagación (Spread)** para expandir o contraer el tamaño total de la sombra.</li>
                <li>Selecciona el **Color** y la **Opacidad** de la sombra. Te recomendamos utilizar opacidades bajas (entre 0.05 y 0.20) para lograr sombras suaves, elegantes y profesionales.</li>
                <li>Ajusta los colores del **Objeto (Caja)** y del **Fondo** para previsualizar exactamente cómo interactuará la sombra en tu interfaz final.</li>
                <li>Activa el interruptor de **Sombra Interna (Inset)** si necesitas que la sombra se proyecte hacia dentro del elemento en lugar de hacia fuera.</li>
                <li>Copia el bloque de código generado y pégalo directamente en tus archivos de estilos CSS.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Tu privacidad es nuestra prioridad. Todos los cálculos cromáticos y de coordenadas de las sombras se ejecutan instantáneamente en tu navegador a través de JavaScript. No recopilamos ni registramos ninguna actividad ni código en nuestros servidores.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: CSS Box Shadow Generator
            </h4>
            <p class="text-muted">
                The **`box-shadow`** CSS property applies shadow effects around an element's frame. Selecting realistic shadows is a key step in modern user interface design, as it introduces visual depth, creates hierarchical layers (like floating headers, alert cards, or modal layers), and forms clean skeuomorphic, flat, or glassmorphic styling effects.
            </p>
            <p class="text-muted">
                Our dynamic CSS Box Shadow generator provides a responsive canvas where you can build shadows visually without manual coordinates guessing. Tweak displacement offsets, blur radius, size spread, coloring, opacity, and the inset switch. View updates instantly on an interactive card preview, and grab cross-browser compatible CSS declarations (`-webkit-box-shadow`, `-moz-box-shadow`) in one single tap.
            </p>
            
            <h5 class="text-dark mt-4">How to use this online box shadow generator?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Drag the sliders to adjust the **Horizontal Offset (H)** and **Vertical Offset (V)** parameters. Positive numbers project shadows right and down; negative inputs go left and up.</li>
                <li>Modify **Blur Radius** to control softness levels (larger inputs create diffused shadows), and **Spread Radius** to configure the absolute dimension scale of the shadow boundary.</li>
                <li>Set your **Shadow Color** and **Opacity**. For elegant layouts, keeping opacity values low (between 0.05 and 0.20) guarantees modern and soft results.</li>
                <li>Configure the **Box Color** and **Background Color** controls to replicate your targeted interface theme styling accurately.</li>
                <li>Toggle the **Inset Shadow** switch to cast internal shadows, ideal for recessed fields or modern neumorphic buttons.</li>
                <li>Click **"Copy CSS Code"** to instantly add the computed styles to your clipboard.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local Computation:</strong> Security is built-in. Every slider change and CSS code output is computed 100% locally on your machine via JavaScript. No tracking, cookies, or data uploads are executed.
            </div>
        @endif
    </div>
</div>
