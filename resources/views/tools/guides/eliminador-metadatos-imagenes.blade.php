<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Eliminador de Metadatos de Imágenes
            </h4>
            <p class="text-muted">
                Cada vez que tomas una foto con tu teléfono celular o cámara digital, el dispositivo guarda automáticamente información técnica incrustada dentro de la imagen. A estos datos ocultos se les conoce como metadatos **EXIF** (Exchangeable Image File Format) en archivos JPEG, o bloques de texto descriptivo y perfiles en archivos PNG.
            </p>
            <p class="text-muted">
                Aunque esta información es útil para fotógrafos profesionales, representa un **grave riesgo de privacidad** al compartir las fotos en redes sociales, foros o plataformas en línea. Los metadatos EXIF a menudo contienen:
            </p>
            <ul class="text-muted ps-3 mb-4">
                <li>**Coordenadas GPS exactas** del lugar donde se tomó la foto (geolocalización).</li>
                <li>La marca y el modelo del dispositivo móvil o cámara.</li>
                <li>La fecha y hora exacta del disparo.</li>
                <li>Parámetros de configuración técnica (apertura, ISO, velocidad de obturación).</li>
            </ul>
            <p class="text-muted">
                Nuestra herramienta procesa el archivo de imagen de manera binaria eliminando por completo los bloques EXIF (`APP1`), IPTC (`APP13`), perfiles de color (`iCCP`) y chunks de texto descriptivo (`tEXt`, `zTXt`, `iTXt`), garantizando que tu foto esté completamente limpia y sea anónima.
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo utilizar este limpiador EXIF en línea?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Arrastra y suelta tu imagen JPG o PNG en la zona de carga o haz clic para seleccionarla.</li>
                <li>El sistema analizará binariamente el archivo y te mostrará los detalles del archivo y las advertencias de metadatos detectados (como GPS o modelo de cámara).</li>
                <li>Haz clic en el botón **"Eliminar Metadatos y Descargar"**.</li>
                <li>JavaScript procesará la imagen localmente en milisegundos y descargará una versión limpia del archivo en tu carpeta de descargas de forma automática.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Garantizamos la privacidad de tus datos de forma absoluta. Todo el procesamiento de análisis y limpieza binaria se realiza directamente en tu navegador web local a través de JavaScript de manera inmediata. Tus imágenes **nunca se transmiten ni se guardan en nuestros servidores**, garantizando privacidad absoluta del 100%.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Image Metadata & EXIF Stripper
            </h4>
            <p class="text-muted">
                Whenever you capture a photograph with your smartphone or digital camera, the device automatically inserts technical data directly inside the file structure. These hidden attributes are known as **EXIF** (Exchangeable Image File Format) metadata in JPEGs, or descriptive text strings and profile data in PNG files.
            </p>
            <p class="text-muted">
                While useful for professional editing software, this hidden information presents a **severe privacy and security risk** when shared online. EXIF blocks frequently leak:
            </p>
            <ul class="text-muted ps-3 mb-4">
                <li>**Exact GPS coordinates** pinpointing the exact location where the photo was shot.</li>
                <li>The brand and specific model of your phone or camera.</li>
                <li>The exact date and time the image was captured.</li>
                <li>Detailed technical camera settings (aperture, focal length, ISO speed).</li>
            </ul>
            <p class="text-muted">
                Our utility scans the binary structure of your uploaded image and strips away all metadata segments, including EXIF markers (`APP1`), Photoshop/IPTC data (`APP13`), color profiles (`iCCP`), and PNG metadata chunks (`tEXt`, `zTXt`, `iTXt`), providing you with a completely anonymous, metadata-free image.
            </p>
            
            <h5 class="text-dark mt-4">How to use this online EXIF cleaner?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Drag and drop your JPG or PNG image into the upload dropzone, or click to browse files.</li>
                <li>The client-side engine will inspect the file structure and display file details alongside identified metadata warnings (such as GPS leaks or camera model details).</li>
                <li>Click **"Remove Metadata & Download"**.</li>
                <li>The system will process the file in a fraction of a second and trigger an automatic download of the clean, metadata-free copy.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local Execution:</strong> We care deeply about your privacy. All metadata scanning and binary restructuring operations are processed entirely on your device via client-side JavaScript. Your images **never leave your device or touch our servers**, ensuring 100% absolute privacy.
            </div>
        @endif
    </div>
</div>
