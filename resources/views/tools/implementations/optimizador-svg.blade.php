<div class="svg-optimizer-wrapper py-3">
    <style>
        .svg-dropzone {
            border: 2px dashed rgba(59, 130, 246, 0.4);
            border-radius: 18px;
            background: rgba(59, 130, 246, 0.02);
            padding: 40px 24px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .svg-dropzone:hover, .svg-dropzone.dragover {
            border-color: #3b82f6;
            background: rgba(59, 130, 246, 0.06);
            transform: translateY(-2px);
        }

        .svg-preview-box {
            border-radius: 16px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            background: #ffffff;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
            overflow: hidden;
            box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.03);
            /* Grid background to verify transparency */
            background-image: 
                radial-gradient(rgba(0, 0, 0, 0.03) 1px, transparent 0),
                radial-gradient(rgba(0, 0, 0, 0.03) 1px, transparent 0);
            background-size: 20px 20px;
            background-position: 0 0, 10px 10px;
        }

        [data-bs-theme="dark"] .svg-preview-box {
            background-color: #1e293b;
            background-image: 
                radial-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 0),
                radial-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 0);
        }

        .svg-preview-box svg {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
        }

        .opt-stat-card {
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 16px;
            padding: 16px;
            text-align: center;
        }

        [data-bs-theme="dark"] .opt-stat-card {
            background: rgba(255, 255, 255, 0.02);
            border-color: rgba(255, 255, 255, 0.05);
        }

        .code-area {
            font-family: 'Fira Code', 'Courier New', Courier, monospace;
            font-size: 0.8rem;
            max-height: 200px;
        }
    </style>

    <div class="row g-4">
        <!-- Panel Izquierdo: Subida y Ajustes -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 p-md-5 d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="fw-bold mb-4 text-dark">
                            <i class="ri-upload-cloud-2-line text-primary me-2"></i> @lang('tools.mi_campo_entrada')
                        </h4>

                        <!-- Dropzone de Archivo -->
                        <div class="svg-dropzone mb-4" id="dropzone">
                            <input type="file" id="file-input" accept=".svg" class="d-none">
                            <i class="ri-file-code-line display-3 text-primary opacity-50 mb-3 d-block"></i>
                            <h6 class="fw-bold text-dark">@lang('tools.svg_dropzone')</h6>
                            <p class="text-muted small mb-0">Soporta arrastrar archivos o pegar código directamente abajo</p>
                        </div>

                        <!-- O pegar código directamente -->
                        <div class="mb-4">
                            <label for="textarea-raw-svg" class="form-label fw-semibold fs-14 text-dark">O pega el código fuente SVG:</label>
                            <textarea class="form-control code-area shadow-none" id="textarea-raw-svg" rows="5" placeholder="Pega tu tag <svg>...</svg> aquí para optimizar..."></textarea>
                        </div>

                        <!-- Ajustes de Optimización -->
                        <h6 class="fw-bold text-muted mb-3 fs-12 uppercase-tracking">Ajustes de Limpieza</h6>
                        
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" role="switch" id="opt-metadata" checked>
                            <label class="form-check-label text-dark fs-14" for="opt-metadata">Remover metadatos e información de editores</label>
                        </div>

                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" role="switch" id="opt-comments" checked>
                            <label class="form-check-label text-dark fs-14" for="opt-comments">Eliminar comentarios XML</label>
                        </div>

                        <div class="form-check form-switch mb-4">
                            <input class="form-check-input" type="checkbox" role="switch" id="opt-precision" checked>
                            <label class="form-check-label text-dark fs-14" for="opt-precision">
                                Redondear precisión decimal de paths a: 
                                <input type="number" class="form-control form-control-sm d-inline-block text-center shadow-none ms-1" id="input-precision" value="2" min="0" max="6" style="width: 46px;"> decimales
                            </label>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 py-2.5 mt-2" id="btn-optimize">
                        <i class="ri-magic-line align-middle me-1"></i> Optimizar SVG
                    </button>
                </div>
            </div>
        </div>

        <!-- Panel Derecho: Salida, Visor e Estadísticas -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 p-md-5 d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="fw-bold mb-4 text-dark">
                            <i class="ri-checkbox-circle-line text-success me-2"></i> @lang('tools.mi_campo_salida')
                        </h4>

                        <!-- Dashboard de Peso -->
                        <div class="row g-3 mb-4" id="stats-container" style="opacity: 0.45;">
                            <div class="col-4">
                                <div class="opt-stat-card">
                                    <small class="text-muted d-block mb-1">@lang('tools.svg_original_size')</small>
                                    <span class="fw-bold text-dark fs-15" id="size-original">0 B</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="opt-stat-card">
                                    <small class="text-muted d-block mb-1">@lang('tools.svg_optimized_size')</small>
                                    <span class="fw-bold text-success fs-15" id="size-optimized">0 B</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="opt-stat-card">
                                    <small class="text-muted d-block mb-1">@lang('tools.svg_saving')</small>
                                    <span class="fw-bold text-primary fs-15" id="size-percent">0%</span>
                                </div>
                            </div>
                        </div>

                        <!-- Previsualización -->
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted fs-12 uppercase-tracking">Vista Previa del SVG</label>
                            <div class="svg-preview-box" id="preview-box">
                                <span class="text-muted fs-13" id="preview-empty-text">El gráfico optimizado aparecerá aquí</span>
                            </div>
                        </div>

                        <!-- Código Optimizado -->
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted fs-12 uppercase-tracking">Código SVG Minificado</label>
                            <textarea class="form-control code-area shadow-none font-monospace" id="textarea-optimized-svg" rows="4" readonly></textarea>
                        </div>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="row g-3" id="actions-container" style="opacity: 0.45; pointer-events: none;">
                        <div class="col-6">
                            <button class="btn btn-outline-primary w-100" id="btn-copy-code">
                                <i class="ri-file-copy-line me-1"></i> Copiar Código
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-success w-100" id="btn-download-svg">
                                <i class="ri-download-2-line me-1"></i> Descargar SVG
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const dropzone = document.getElementById('dropzone');
    const fileInput = document.getElementById('file-input');
    const textareaRaw = document.getElementById('textarea-raw-svg');
    const textareaOptimized = document.getElementById('textarea-optimized-svg');

    // Toggles
    const optMetadata = document.getElementById('opt-metadata');
    const optComments = document.getElementById('opt-comments');
    const optPrecision = document.getElementById('opt-precision');
    const inputPrecision = document.getElementById('input-precision');

    const btnOptimize = document.getElementById('btn-optimize');

    // Stats
    const statsContainer = document.getElementById('stats-container');
    const sizeOriginal = document.getElementById('size-original');
    const sizeOptimized = document.getElementById('size-optimized');
    const sizePercent = document.getElementById('size-percent');

    // Preview
    const previewBox = document.getElementById('preview-box');
    const previewEmptyText = document.getElementById('preview-empty-text');

    // Action buttons
    const actionsContainer = document.getElementById('actions-container');
    const btnCopy = document.getElementById('btn-copy-code');
    const btnDownload = document.getElementById('btn-download-svg');

    // Trigger file select
    dropzone.addEventListener('click', () => fileInput.click());

    // Drag-over styling
    dropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone.classList.add('dragover');
    });

    dropzone.addEventListener('dragleave', () => {
        dropzone.classList.remove('dragover');
    });

    dropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone.classList.remove('dragover');
        const files = e.dataTransfer.files;
        if (files.length > 0 && files[0].name.endsWith('.svg')) {
            handleUploadedFile(files[0]);
        }
    });

    fileInput.addEventListener('change', () => {
        if (fileInput.files.length > 0) {
            handleUploadedFile(fileInput.files[0]);
        }
    });

    function handleUploadedFile(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            textareaRaw.value = e.target.result;
            optimizeSVG();
        };
        reader.readAsText(file);
    }

    function formatBytes(bytes) {
        if (bytes === 0) return '0 B';
        const k = 1024;
        const sizes = ['B', 'KB', 'MB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    function optimizeSVG() {
        const rawCode = textareaRaw.value.trim();
        if (rawCode === '') return;

        try {
            const parser = new DOMParser();
            const xmlDoc = parser.parseFromString(rawCode, 'image/svg+xml');

            // Verify parse errors
            const parserError = xmlDoc.querySelector('parsererror');
            if (parserError) {
                alert("{{ __('tools.svg_invalid') }}");
                return;
            }

            const svgElement = xmlDoc.querySelector('svg');
            if (!svgElement) {
                alert("{{ __('tools.svg_invalid') }}");
                return;
            }

            // --- 1. Clean Metadata and Editor properties ---
            if (optMetadata.checked) {
                // Remove metadata/desc tags
                const metadata = xmlDoc.querySelectorAll('metadata, desc, sodipodi\\:namedview');
                metadata.forEach(el => el.remove());

                // Remove namespaced custom attributes
                const removeCustomAttributes = (element) => {
                    const attrs = Array.from(element.attributes);
                    attrs.forEach(attr => {
                        const name = attr.name.toLowerCase();
                        if (name.startsWith('sodipodi:') || 
                            name.startsWith('inkscape:') || 
                            name.startsWith('illustrator:') ||
                            name.startsWith('xml:') ||
                            name.includes(':')) {
                            element.removeAttribute(attr.name);
                        }
                    });
                    
                    // Recurse children
                    Array.from(element.children).forEach(removeCustomAttributes);
                };
                removeCustomAttributes(svgElement);
            }

            // --- 2. Round path numeric coordinates precision ---
            if (optPrecision.checked) {
                const precision = parseInt(inputPrecision.value) || 2;
                const paths = xmlDoc.querySelectorAll('path');
                
                paths.forEach(path => {
                    const d = path.getAttribute('d');
                    if (d) {
                        // Match and round numbers inside path commands
                        // Tolerates floats, exponents, negatives
                        const roundedD = d.replace(/[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?/g, (match) => {
                            const val = parseFloat(match);
                            if (isNaN(val)) return match;
                            // Check if integer to avoid decimals if not needed
                            if (Number.isInteger(val)) return val.toString();
                            return val.toFixed(precision);
                        });
                        path.setAttribute('d', roundedD);
                    }
                });
            }

            // Serialize XML
            const serializer = new XMLSerializer();
            let optimizedCode = serializer.serializeToString(xmlDoc);

            // --- 3. Clean Comments ---
            if (optComments.checked) {
                optimizedCode = optimizedCode.replace(/<!--[\s\S]*?-->/g, '');
            }

            // Minify - collapse extra spaces and newlines
            optimizedCode = optimizedCode
                .replace(/\s+/g, ' ') // collapse multi-spaces
                .replace(/>\s+</g, '><') // collapse space between tags
                .trim();

            // Sincronizar UI
            textareaOptimized.value = optimizedCode;

            // Render Preview
            previewBox.innerHTML = '';
            // Insert code directly as element to render
            previewBox.insertAdjacentHTML('beforeend', optimizedCode);

            // Calculate Weight Savings
            const origLen = new Blob([rawCode]).size;
            const optLen = new Blob([optimizedCode]).size;
            const savings = origLen - optLen;
            const percent = origLen > 0 ? (savings / origLen) * 100 : 0;

            sizeOriginal.textContent = formatBytes(origLen);
            sizeOptimized.textContent = formatBytes(optLen);
            sizePercent.textContent = (percent > 0 ? percent.toFixed(1) : 0) + '%';

            // Activar visuales
            statsContainer.style.opacity = '1';
            actionsContainer.style.opacity = '1';
            actionsContainer.style.pointerEvents = 'auto';

        } catch (e) {
            console.error(e);
            alert('Error al optimizar el código vectorial SVG. Verifica que el archivo no esté dañado.');
        }
    }

    btnOptimize.addEventListener('click', optimizeSVG);

    // Sync input modification triggers
    optMetadata.addEventListener('change', optimizeSVG);
    optComments.addEventListener('change', optimizeSVG);
    optPrecision.addEventListener('change', optimizeSVG);
    inputPrecision.addEventListener('input', () => {
        optPrecision.checked = true;
        optimizeSVG();
    });

    // Copy handlers
    btnCopy.addEventListener('click', function(e) {
        e.preventDefault();
        const code = textareaOptimized.value;
        if (code) {
            navigator.clipboard.writeText(code).then(() => {
                const origHTML = btnCopy.innerHTML;
                btnCopy.innerHTML = '<i class="ri-check-line"></i> ¡Copiado!';
                btnCopy.className = 'btn btn-success w-100';
                setTimeout(() => {
                    btnCopy.innerHTML = origHTML;
                    btnCopy.className = 'btn btn-outline-primary w-100';
                }, 2000);
            });
        }
    });

    btnDownload.addEventListener('click', function(e) {
        e.preventDefault();
        const code = textareaOptimized.value;
        if (code) {
            const blob = new Blob([code], { type: 'image/svg+xml' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `optimized-vector-${Date.now()}.svg`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }
    });
});
</script>
