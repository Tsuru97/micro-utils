<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3"><i class="ri-article-line me-2 align-middle"></i>Guía Completa: Contador de Palabras y Caracteres</h4>
            
            <p class="text-muted">El <strong>Contador de Palabras y Caracteres</strong> de MicroUtils es una utilidad en línea gratuita diseñada para redactores, editores, profesionales de SEO, estudiantes y creadores de contenido. Esta herramienta calcula al instante métricas clave de tus escritos para ayudarte a cumplir con los límites de longitud de forma profesional.</p>
            
            <h5 class="text-dark mt-4">¿Por qué es importante contar palabras y caracteres?</h5>
            <p class="text-muted">En el ecosistema digital, la longitud del contenido está sujeta a restricciones muy estrictas según la plataforma:</p>
            <ul class="text-muted ps-3 mb-4">
                <li><strong>SEO y Redacción Web:</strong> Los títulos en los resultados de Google (etiquetas Meta Title) deben mantenerse por debajo de los 60 caracteres y las meta-descripciones no deben superar los 155-160 caracteres para evitar ser truncados.</li>
                <li><strong>Redes Sociales:</strong> Twitter/X limita las publicaciones a 280 caracteres, mientras que plataformas como LinkedIn, Instagram y Facebook tienen diferentes longitudes ideales de lectura para maximizar el engagement.</li>
                <li><strong>Academia y Ensayos:</strong> Los trabajos académicos y los resúmenes de tesis suelen requerir un rango estricto de palabras que debe cumplirse rigurosamente.</li>
            </ul>

            <h5 class="text-dark">Seguridad y Privacidad Absoluta</h5>
            <div class="alert alert-info border-0 shadow-none bg-info-subtle mb-4">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2"></i>
                <strong>Procesamiento en Local:</strong> A diferencia de otros contadores web, en MicroUtils tu texto nunca se envía a un servidor web externo. Todo el análisis se realiza en tu propio navegador mediante JavaScript local, garantizando que tu contenido confidencial esté a salvo de miradas indiscretas.
            </div>

            <h5 class="text-dark">¿Cómo utilizar esta herramienta?</h5>
            <ol class="text-muted ps-3 mb-0">
                <li>Escribe directamente en la caja de texto o pega tu contenido copiado desde Word, Google Docs o cualquier otro editor.</li>
                <li>Visualiza los contadores de palabras y caracteres actualizándose en tiempo real mientras escribes.</li>
                <li>Copia tu texto finalizado haciendo clic en el botón de copiar para agilizar tu flujo de trabajo.</li>
            </ol>
        @else
            <h4 class="text-primary mb-3"><i class="ri-article-line me-2 align-middle"></i>Ultimate Guide: Word and Character Counter</h4>
            
            <p class="text-muted">The MicroUtils <strong>Word and Character Counter</strong> is a free, instant online utility developed for writers, editors, SEO specialists, students, and content creators. It computes crucial structural metrics of your writings in real-time, assisting you in meeting strict formatting standards efficiently.</p>
            
            <h5 class="text-dark mt-4">Why Should You Count Words and Characters?</h5>
            <p class="text-muted">In the modern digital landscape, content length is tightly regulated across platforms:</p>
            <ul class="text-muted ps-3 mb-4">
                <li><strong>SEO and Web Optimization:</strong> Google search results truncate Meta Titles over 60 characters and Meta Descriptions over 155-160 characters. Keeping within these limits is vital for search engine visibility.</li>
                <li><strong>Social Media Boundaries:</strong> Twitter/X restricts regular posts to 280 characters. Meanwhile, platforms like Instagram, LinkedIn, and Facebook favor distinct optimal word counts for ideal reader engagement.</li>
                <li><strong>Academic Standards:</strong> Academic essays, research abstracts, and application forms require highly precise word counts that candidates must satisfy strictly.</li>
            </ul>

            <h5 class="text-dark">Top-Tier Security and Total Privacy</h5>
            <div class="alert alert-info border-0 shadow-none bg-info-subtle mb-4">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2"></i>
                <strong>100% Client-Side Processing:</strong> Unlike typical web converters, MicroUtils executes entirely inside your web browser. No text data ever leaves your computer, providing secure data compliance for highly confidential business documents.
            </div>

            <h5 class="text-dark">How to Use the Word Counter?</h5>
            <ol class="text-muted ps-3 mb-0">
                <li>Type directly into the entry box or paste your pre-written paragraphs from Google Docs, MS Word, or other tools.</li>
                <li>Observe the word, character, and sentence counters incrementing instantly with each stroke.</li>
                <li>Copy your clean, checked text with the built-in clipboard actions to finish your writing tasks.</li>
            </ol>
        @endif
    </div>
</div>
