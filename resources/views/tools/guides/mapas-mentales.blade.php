<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: El Poder de los Mapas Mentales y la Diagramación SVG
            </h4>
            <p class="text-muted">
                Un **Mapa Mental** es un método altamente eficaz para extraer, estructurar y organizar ideas de forma visual y ramificada. Al imitar el funcionamiento asociativo del cerebro humano mediante conexiones neuronales, los mapas mentales facilitan el aprendizaje asociativo, la retención conceptual, la planificación estratégica y las sesiones de lluvia de ideas (Brainstorming).
            </p>
            <p class="text-muted">
                Este **Creador de Mapas Mentales y Flujogramas** te permite trazar tus pensamientos sobre un lienzo interactivo digital e infinito de manera veloz. Al estar basado en la inyección dinámica de elementos HTML para los conceptos y vectores gráficos **SVG (Scalable Vector Graphics)** para los enlaces, consigues un lienzo de alta precisión que puedes exportar como una ilustración vectorial nativa lista para presentaciones de negocios o integraciones académicas.
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo utilizar este lienzo interactivo?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li><strong>Creación de Nodos Raíz:</strong> Haz clic en el botón **"Añadir Nodo Raíz"** o simplemente haz **doble clic** en cualquier área vacía del tablero para spawnear un concepto nuevo.</li>
                <li><strong>Edición de Texto Directa:</strong> Haz clic dentro de cualquier caja de concepto para escribir su contenido o cambiar su texto directamente, sin menús intermedios engorrosos.</li>
                <li><strong>Conexión de Conceptos / Ramificaciones:</strong> Selecciona un nodo haciendo clic sobre él. Se abrirá un menú contextual flotante justo debajo del nodo. Haz clic en el icono del árbol radial para crear instantáneamente un nodo hijo conectado a él de forma automática.</li>
                <li><strong>Personalización de Enlaces:</strong> Cambia el estilo visual de conexión en el panel lateral. Elige **"Curvo Bezier"** para curvas orgánicas fluidas o **"Recto"** para diagramas más técnicos.</li>
                <li><strong>Paleta de Colores y Reubicación:</strong> Arrastra y suelta libremente cualquier nodo para reordenar la jerarquía visual. Cambia el color de borde de los nodos seleccionados desde la paleta rápida lateral.</li>
                <li><strong>Exportar a SVG:</strong> Haz clic en **"Exportar Diagrama SVG"** para descargar un archivo vectorial completamente autónomo y editable. ¡Incluso incluye el sombreado suave de las cajas y la rejilla decorativa!</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>100% Privado en Cliente:</strong> Tus ideas, patentes, proyectos y diagramas son estrictamente confidenciales. Todo el almacenamiento de las coordenadas en memoria, el cálculo de las curvas spline vectoriales en tiempo real y la exportación XML del gráfico ocurren exclusivamente en el navegador mediante JavaScript local. No se transmite ningún dato a servidores externos.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Harnessing Mind Maps & SVG Flowcharting
            </h4>
            <p class="text-muted">
                A **Mind Map** is an exceptionally powerful visual framework designed to unlock mental potential, structure loose concepts, and streamline complex decision-making. By mirroring the natural associative pathways of the human brain with branching nodes, mind mapping dramatically enhances comprehension, note-taking efficiency, project mapping, and collaborative brainstorming.
            </p>
            <p class="text-muted">
                Our **Mind Map & Flowchart Creator** provides a lightweight, interactive digital workspace to dump, classify, and link your ideas in real-time. Combining standard, style-rich DOM elements for concept containers with native **SVG (Scalable Vector Graphics)** spline render loops yields a high-definition canvas that can be exported as clean vector artwork suitable for presentations or web layouts.
            </p>
            
            <h5 class="text-dark mt-4">Navigating & Formatting the Board</h5>
            <ol class="text-muted ps-3 mb-4">
                <li><strong>Creating Root Nodes:</strong> Click the **"Add Root Node"** sidebar control or simply **double-click** anywhere on the dot-grid canvas background to instantly spawn a new block.</li>
                <li><strong>Inline Text Editing:</strong> Click directly inside any concept box to edit its text string instantly. The node dimensions and connections automatically adjust.</li>
                <li><strong>Branching Subnodes:</strong> Click a node to select it and activate its floating contextual menu. Click the radial tree icon to automatically spawn a subnode linked to the parent.</li>
                <li><strong>Link Line Styles:</strong> Toggle link styles in the sidebar control panel. Choose **"Curved Bezier"** for organic, floating lines, or **"Straight"** for a technical flowchart aesthetic.</li>
                <li><strong>Arranging & Coloring:</strong> Drag and drop any node container to restructure your map. Choose color presets from the sidebar palette to color-code branches.</li>
                <li><strong>SVG Exporting:</strong> Click **"Export SVG Diagram"** to compile a complete, independent, scalable `.svg` image containing all node boundaries, soft drop-shadow filters, and the coordinate grid.</li>
            </ol>

            <h5 class="text-dark">Data Privacy Guarantee</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local-Only Execution:</strong> Your workflows, business structures, and ideas belong to you. All coordinates mapping, Bezier math equations, drag-and-drop processing, and file compilation are handled dynamically within your browser sandbox via JavaScript. Zero telemetry data or text is uploaded.
            </div>
        @endif
    </div>
</div>
