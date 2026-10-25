<div class="slug-generator-wrapper">
    <div class="row g-4">
        <!-- Input Panel -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm bg-light h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4 text-primary">
                        <i class="ri-edit-line align-middle me-1"></i> @lang('tools.slug_input')
                    </h5>

                    <!-- Input String -->
                    <div class="mb-4">
                        <label for="slug-text" class="form-label fw-bold">@lang('tools.type_or_paste_here')</label>
                        <textarea class="form-control shadow-none" id="slug-text" rows="6" placeholder="Escribe un título de artículo, noticia o encabezado...">¿Cómo Crear un Sitio Web Exitoso en 2026? Guía Paso a Paso para Principiantes</textarea>
                    </div>

                    <!-- Config / Separator -->
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <label for="slug-sep" class="form-label fw-bold">@lang('tools.slug_separator')</label>
                            <select class="form-select shadow-none" id="slug-sep">
                                <option value="-">@lang('tools.slug_hyphen')</option>
                                <option value="_">@lang('tools.slug_underscore')</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 d-flex flex-column justify-content-end pb-1">
                            <div class="form-check mb-2">
                                <input class="form-check-input shadow-none" type="checkbox" id="slug-lower" checked>
                                <label class="form-check-label fw-semibold" for="slug-lower">@lang('tools.slug_lowercase')</label>
                            </div>
                            <div class="form-check mb-1">
                                <input class="form-check-input shadow-none" type="checkbox" id="slug-stop-words" checked>
                                <label class="form-check-label fw-semibold" for="slug-stop-words" title="Filtra conectores como: el, la, y, de, the, a, an, of...">@lang('tools.slug_remove_stop_words')</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Output & Copy Panel -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-3 text-primary">
                            <i class="ri-link-m align-middle me-1"></i> @lang('tools.slug_output')
                        </h5>
                        
                        <!-- Slug Output Container -->
                        <div class="bg-dark text-white rounded-3 p-4 mb-4 font-monospace position-relative overflow-hidden" style="min-height: 120px; font-family: monospace; word-break: break-all; display: flex; align-items: center;">
                            <div id="slug-output" class="fs-15 text-success w-100" style="font-family: monospace;"></div>
                            <div class="position-absolute bottom-2 end-2 fs-10 text-muted opacity-50 px-2" style="bottom: 8px; right: 8px;">URL slug format</div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success w-100 py-2.5" id="btn-copy-slug">
                        <i class="ri-file-copy-line align-middle me-1"></i> @lang('tools.slug_copy')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const elText = document.getElementById('slug-text');
    const elSep = document.getElementById('slug-sep');
    const elLower = document.getElementById('slug-lower');
    const elStopWords = document.getElementById('slug-stop-words');
    const outSlug = document.getElementById('slug-output');
    const btnCopy = document.getElementById('btn-copy-slug');

    // List of common English & Spanish stop words to strip from clean slugs (improves SEO value density)
    const stopWords = new Set([
        // Spanish stop words
        'el', 'la', 'los', 'las', 'un', 'una', 'unos', 'unas', 'de', 'del', 'a', 'al', 'e', 'y', 'o', 'u', 'en', 'con', 'por', 'para', 'como', 'sin', 'sobre', 'este', 'esta', 'estos', 'estas', 'que', 'se', 'su', 'sus', 'es', 'son',
        // English stop words
        'a', 'an', 'the', 'and', 'or', 'but', 'is', 'are', 'was', 'were', 'be', 'been', 'being', 'in', 'on', 'at', 'to', 'for', 'of', 'with', 'by', 'about', 'against', 'between', 'into', 'through', 'during', 'before', 'after', 'above', 'below', 'from', 'up', 'down', 'out', 'off', 'over', 'under', 'again', 'further', 'then', 'once'
    ]);

    function generateSlug() {
        let text = elText.value.trim();
        if (!text) {
            outSlug.textContent = '';
            return;
        }

        const separator = elSep.value;
        const lowercase = elLower.checked;
        const removeStopWords = elStopWords.checked;

        // 1. Normalize Unicode characters: strip diacritics/accents
        // Decomposes characters (like á to a + ') and strips diacritics block
        let normalized = text.normalize("NFD").replace(/[\u0300-\u036f]/g, "");

        // 2. Map Spanish specific letters not covered by standard diacritics
        normalized = normalized
            .replace(/ñ/g, 'n')
            .replace(/Ñ/g, 'n')
            .replace(/[^a-zA-Z0-9\s_-]/g, ''); // strip any punctuation symbols left

        // 3. Lowercase if checked
        if (lowercase) {
            normalized = normalized.toLowerCase();
        }

        // 4. Split into words
        let words = normalized.split(/[\s_-]+/);

        // 5. Remove stop words if checked
        if (removeStopWords) {
            words = words.filter(w => {
                const checkWord = lowercase ? w : w.toLowerCase();
                return !stopWords.has(checkWord) && w !== '';
            });
        }

        // 6. Join back using custom separator
        let slug = words.join(separator);

        // Ensure we clean trailing/leading separators
        const escapedSep = separator.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
        const leadRegex = new RegExp('^' + escapedSep + '+');
        const trailRegex = new RegExp(escapedSep + '+$');
        slug = slug.replace(leadRegex, '').replace(trailRegex, '');

        outSlug.textContent = slug || 'slug';
    }

    // Attach event listeners
    [elText, elSep].forEach(el => el.addEventListener('input', generateSlug));
    [elLower, elStopWords].forEach(el => el.addEventListener('change', generateSlug));

    btnCopy.addEventListener('click', function(e) {
        e.preventDefault();
        const value = outSlug.textContent;
        if (value) {
            navigator.clipboard.writeText(value).then(function() {
                const originalHTML = btnCopy.innerHTML;
                btnCopy.innerHTML = '<i class="ri-check-line align-middle me-1"></i> Copied!';
                btnCopy.className = 'btn btn-success w-100 py-2.5';
                setTimeout(() => {
                    btnCopy.innerHTML = originalHTML;
                    btnCopy.className = 'btn btn-success w-100 py-2.5';
                }, 2000);
            });
        }
    });

    // Run initial generation
    generateSlug();
});
</script>
