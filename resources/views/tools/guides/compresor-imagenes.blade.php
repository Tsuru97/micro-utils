<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Compresor y Redimensionador de Imágenes
            </h4>
            <p class="text-muted">
                La optimización de imágenes es uno de los factores más importantes para mejorar el rendimiento de carga y el posicionamiento **SEO** de cualquier sitio web. Las imágenes que son demasiado pesadas ralentizan la experiencia del usuario, aumentan la tasa de rebote y perjudican tu puntuación en herramientas de auditoría como Google PageSpeed Insights.
            </p>
            <p class="text-muted">
                Nuestra herramienta te permite optimizar tus fotos de dos maneras simultáneas: **reducir el peso de archivo** (compresión de calidad) y **ajustar el tamaño en píxeles** (redimensionamiento). Esto es crucial, ya que subir una imagen directamente tomada por una cámara de celular (que puede tener 4000px de ancho y pesar 5MB) a una web donde solo se mostrará a 800px es un desperdicio enorme de ancho de banda.
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo utilizar este compresor en línea?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Arrastra y suelta tu archivo JPG, PNG o WebP, o haz clic para subirlo.</li>
                <li>Establece la **Calidad de Compresión** deseada usando el control deslizante (80% suele ser el balance óptimo entre fidelidad visual y peso reducido).</li>
                <li>Si lo necesitas, ajusta el **Ancho o Alto** en píxeles. Deja activada la opción **"Bloquear Relación de Aspecto"** para evitar deformar la imagen de forma desproporcionada.</li>
                <li>Compara instantáneamente los resultados en el panel derecho: verás el tamaño final del archivo, una previsualización de su calidad resultante y el porcentaje exacto de ahorro en peso.</li>
                <li>Haz clic en **"Descargar Imagen"** para guardar tu archivo optimizado en tu dispositivo.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Garantizamos la privacidad de tus datos. Todo el procesamiento de redimensionado y compresión de las imágenes se realiza directamente en tu navegador web de forma inmediata utilizando la API Canvas de HTML5. Tus imágenes **nunca se cargan en nuestros servidores**, haciendo el proceso 100% privado y seguro.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Image Compressor & Resizer
            </h4>
            <p class="text-muted">
                Image optimization is a cornerstone of web performance and modern search engine optimization (**SEO**). Files that are excessively large slow down page load times, degrade user experience, increase bounce rates, and negatively impact audit scores on tools like Google PageSpeed Insights.
            </p>
            <p class="text-muted">
                Our advanced utility enables you to optimize photos in two ways: **shrinking the file size** (lossy quality compression) and **adjusting the physical resolution** (pixel resizing). Doing both is vital; publishing a raw camera roll picture (often 4000px wide and exceeding 5MB) onto a layout where it only renders at 800px wastes immense amounts of bandwidth.
            </p>
            
            <h5 class="text-dark mt-4">How to use this online image optimizer?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Drag and drop your JPG, PNG, or WebP file, or click inside the upload box to browse.</li>
                <li>Adjust the target **Compression Quality** slider (80% typically offers the sweet spot between visual clarity and file size savings).</li>
                <li>If necessary, resize by changing **Width or Height** in pixels. Keep **"Lock Aspect Ratio"** active to prevent vertical or horizontal stretching.</li>
                <li>Compare results in real-time on the right card, detailing the estimated size, a render preview, and the exact bandwidth savings.</li>
                <li>Click **"Download Image"** to retrieve your optimized file instantly.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local Execution:</strong> We care deeply about your privacy. All resizing and compression calculations occur strictly in your browser using HTML5 Canvas APIs. Your original and optimized photos **never touch our servers**, ensuring 100% security and privacy.
            </div>
        @endif
    </div>
</div>
