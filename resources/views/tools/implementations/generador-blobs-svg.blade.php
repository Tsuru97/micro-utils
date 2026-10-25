<div class="blob-generator-wrapper py-3">
    <style>
        .blob-display-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            min-height: 400px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            /* Premium transparent grid pattern background */
            background-image: 
                radial-gradient(rgba(0, 0, 0, 0.03) 1px, transparent 0),
                radial-gradient(rgba(0, 0, 0, 0.03) 1px, transparent 0);
            background-size: 24px 24px;
            background-position: 0 0, 12px 12px;
            box-shadow: inset 0 4px 20px rgba(0, 0, 0, 0.02);
            transition: all 0.5s ease;
        }

        [data-bs-theme="dark"] .blob-display-card {
            background-image: 
                radial-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 0),
                radial-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 0);
            border-color: rgba(255, 255, 255, 0.05);
        }

        .blob-svg-element {
            width: 320px;
            height: 320px;
            filter: drop-shadow(0 15px 30px rgba(0, 0, 0, 0.15));
            transition: all 0.5s ease;
        }

        .blob-control-panel {
            background: rgba(255, 255, 255, 0.6) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 20px;
        }

        [data-bs-theme="dark"] .blob-control-panel {
            background: rgba(30, 41, 59, 0.45) !important;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .fill-preset-btn {
            border: none;
            padding: 8px 14px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 600;
            background: rgba(230, 235, 245, 0.4);
            color: #4b5563;
            transition: all 0.2s ease;
        }

        .fill-preset-btn.active {
            background-color: #3b82f6 !important;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        [data-bs-theme="dark"] .fill-preset-btn {
            background: rgba(255, 255, 255, 0.05);
            color: #cbd5e1;
        }

        .blob-output-code {
            font-family: 'Fira Code', 'Courier New', Courier, monospace;
            font-size: 0.8rem;
            background: #0f172a;
            color: #38bdf8;
            padding: 16px;
            border-radius: 12px;
            max-height: 120px;
            overflow-y: auto;
            border: 1px solid rgba(255, 255, 255, 0.05);
            word-break: break-all;
            white-space: pre-wrap;
        }
    </style>

    <div class="row g-4">
        <!-- Panel Izquierdo: Controles de Diseño -->
        <div class="col-12 col-lg-5">
            <div class="card border-0 shadow-sm blob-control-panel h-100">
                <div class="card-body p-4 p-md-5 d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="fw-bold mb-4 text-dark">
                            <i class="ri-settings-5-line text-primary me-2"></i> @lang('tools.mi_campo_entrada')
                        </h4>

                        <!-- Complejidad (Puntos) -->
                        <div class="mb-4">
                            <label for="range-complexity" class="form-label fw-semibold fs-14 d-flex justify-content-between">
                                <span>@lang('tools.blob_complexity')</span>
                                <span class="text-primary font-monospace" id="val-complexity">5</span>
                            </label>
                            <input type="range" class="form-range" id="range-complexity" min="3" max="12" value="5">
                        </div>

                        <!-- Suavidad / Curvatura -->
                        <div class="mb-4">
                            <label for="range-sharpness" class="form-label fw-semibold fs-14 d-flex justify-content-between">
                                <span>@lang('tools.blob_sharpness')</span>
                                <span class="text-primary font-monospace" id="val-sharpness">0.8</span>
                            </label>
                            <input type="range" class="form-range" id="range-sharpness" min="0.2" max="1.5" step="0.1" value="0.8">
                        </div>

                        <!-- Estilo de Relleno -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold fs-14 text-dark mb-2">@lang('tools.blob_fill')</label>
                            <div class="d-flex gap-2 mb-3">
                                <button class="fill-preset-btn active" data-style="gradient" id="btn-fill-gradient">
                                    <i class="ri-gradienter-line me-1"></i> @lang('tools.blob_gradient')
                                </button>
                                <button class="fill-preset-btn" data-style="solid" id="btn-fill-solid">
                                    <i class="ri-palette-line me-1"></i> @lang('tools.blob_solid')
                                </button>
                                <button class="fill-preset-btn" data-style="outline" id="btn-fill-outline">
                                    <i class="ri-contrast-drop-line me-1"></i> @lang('tools.blob_outline')
                                </button>
                            </div>
                        </div>

                        <!-- Configuración del Color Sólido / Contorno (Ocultable) -->
                        <div class="mb-4 d-none" id="solid-color-container">
                            <label for="input-solid-color" class="form-label fw-semibold fs-14 text-dark">Color del Blob</label>
                            <div class="d-flex gap-2">
                                <input type="color" class="form-control form-control-color border-0 p-0 shadow-none" id="input-solid-color" value="#3b82f6" style="width: 48px; height: 38px; border-radius: 8px;">
                                <input type="text" class="form-control uppercase" id="text-solid-color" value="#3B82F6" placeholder="#3B82F6" maxlength="7">
                            </div>
                        </div>

                        <!-- Configuración de Degradado (Ocultable) -->
                        <div class="mb-4" id="gradient-color-container">
                            <div class="row g-3">
                                <div class="col-6">
                                    <label for="input-grad-start" class="form-label fw-semibold fs-14 text-dark">Color Inicio</label>
                                    <div class="d-flex gap-2">
                                        <input type="color" class="form-control form-control-color border-0 p-0 shadow-none" id="input-grad-start" value="#ef4444" style="width: 44px; height: 38px; border-radius: 8px;">
                                        <input type="text" class="form-control uppercase font-monospace fs-12 px-2" id="text-grad-start" value="#EF4444" maxlength="7">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="input-grad-end" class="form-label fw-semibold fs-14 text-dark">Color Fin</label>
                                    <div class="d-flex gap-2">
                                        <input type="color" class="form-control form-control-color border-0 p-0 shadow-none" id="input-grad-end" value="#3b82f6" style="width: 44px; height: 38px; border-radius: 8px;">
                                        <input type="text" class="form-control uppercase font-monospace fs-12 px-2" id="text-grad-end" value="#3B82F6" maxlength="7">
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="range-grad-angle" class="form-label fw-semibold fs-13 d-flex justify-content-between text-muted">
                                        <span>Ángulo del Degradado</span>
                                        <span id="val-grad-angle">135°</span>
                                    </label>
                                    <input type="range" class="form-range" id="range-grad-angle" min="0" max="360" value="135">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 py-2.5 mt-3" id="btn-mutate">
                        <i class="ri-refresh-line align-middle me-1"></i> @lang('tools.blob_generate')
                    </button>
                </div>
            </div>
        </div>

        <!-- Panel Derecho: Visor de Blob e Exportaciones -->
        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 p-md-5 d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="fw-bold mb-4 text-dark">
                            <i class="ri-shapes-line text-success me-2"></i> @lang('tools.mi_campo_salida')
                        </h4>

                        <!-- Círculo de previsualización -->
                        <div class="blob-display-card mb-4" id="blob-preview-box">
                            <svg viewBox="0 0 400 400" class="blob-svg-element" id="blob-svg">
                                <defs>
                                    <linearGradient id="blob-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" stop-color="#ef4444" id="grad-stop-start" />
                                        <stop offset="100%" stop-color="#3b82f6" id="grad-stop-end" />
                                    </linearGradient>
                                </defs>
                                <path id="blob-path" d="" fill="url(#blob-grad)" stroke="none" stroke-width="4" />
                            </svg>
                        </div>

                        <!-- Código de salida SVG -->
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted fs-12 uppercase-tracking">Código SVG del Vector</label>
                            <pre class="blob-output-code" id="svg-code-output"></pre>
                        </div>
                    </div>

                    <!-- Botones de Copiado/Descarga -->
                    <div class="row g-3">
                        <div class="col-6">
                            <button class="btn btn-outline-primary w-100" id="btn-copy-svg">
                                <i class="ri-file-copy-line me-1"></i> @lang('tools.blob_copy')
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-success w-100" id="btn-download-svg">
                                <i class="ri-download-2-line me-1"></i> @lang('tools.blob_download')
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
    const rangeComplexity = document.getElementById('range-complexity');
    const valComplexity = document.getElementById('val-complexity');
    const rangeSharpness = document.getElementById('range-sharpness');
    const valSharpness = document.getElementById('val-sharpness');

    const btnMutate = document.getElementById('btn-mutate');
    const btnFillGrad = document.getElementById('btn-fill-gradient');
    const btnFillSolid = document.getElementById('btn-fill-solid');
    const btnFillOutline = document.getElementById('btn-fill-outline');
    const fillBtns = [btnFillGrad, btnFillSolid, btnFillOutline];

    // Containers
    const solidContainer = document.getElementById('solid-color-container');
    const gradContainer = document.getElementById('gradient-color-container');

    // Solid Color controls
    const inputSolidColor = document.getElementById('input-solid-color');
    const textSolidColor = document.getElementById('text-solid-color');

    // Gradient controls
    const inputGradStart = document.getElementById('input-grad-start');
    const textGradStart = document.getElementById('text-grad-start');
    const inputGradEnd = document.getElementById('input-grad-end');
    const textGradEnd = document.getElementById('text-grad-end');
    const rangeGradAngle = document.getElementById('range-grad-angle');
    const valGradAngle = document.getElementById('val-grad-angle');

    // SVG elements
    const blobPath = document.getElementById('blob-path');
    const gradStopStart = document.getElementById('grad-stop-start');
    const gradStopEnd = document.getElementById('grad-stop-end');
    const linearGrad = document.getElementById('blob-grad');
    const svgCodeOutput = document.getElementById('svg-code-output');

    // Action buttons
    const btnCopy = document.getElementById('btn-copy-svg');
    const btnDownload = document.getElementById('btn-download-svg');

    // State Variables
    let activeFill = 'gradient'; // gradient, solid, outline
    let complexity = 5;
    let sharpness = 0.8;
    let points = [];

    function updateComplexity() {
        complexity = parseInt(rangeComplexity.value);
        valComplexity.textContent = complexity;
        generatePoints();
        drawBlob();
    }

    function updateSharpness() {
        sharpness = parseFloat(rangeSharpness.value);
        valSharpness.textContent = sharpness;
        drawBlob();
    }

    rangeComplexity.addEventListener('input', updateComplexity);
    rangeSharpness.addEventListener('input', updateSharpness);

    // Generate random radial points for the blob shape
    function generatePoints() {
        points = [];
        const center = 200; // center of 400x400 viewBox
        const baseRadius = 120;
        const maxOffset = 50;

        for (let i = 0; i < complexity; i++) {
            const angle = (i / complexity) * 2 * Math.PI;
            // Generate offset
            const offset = (Math.random() * 2 - 1) * maxOffset;
            const r = baseRadius + offset;

            const x = center + r * Math.cos(angle);
            const y = center + r * Math.sin(angle);
            points.push({ x, y });
        }
    }

    // Connect points smoothly using cubic Bezier interpolation (closed path)
    function createSmoothClosedPath(pts, smoothness) {
        if (pts.length < 3) return '';
        const n = pts.length;
        let d = `M ${pts[0].x.toFixed(1)} ${pts[0].y.toFixed(1)}`;

        for (let i = 0; i < n; i++) {
            const p0 = pts[(i - 1 + n) % n];
            const p1 = pts[i];
            const p2 = pts[(i + 1) % n];
            const p3 = pts[(i + 2) % n];

            // Tangent control points calculation for Catmull-Rom or cubic spline
            const cp1x = p1.x + (p2.x - p0.x) / 6 * smoothness;
            const cp1y = p1.y + (p2.y - p0.y) / 6 * smoothness;

            const cp2x = p2.x - (p3.x - p1.x) / 6 * smoothness;
            const cp2y = p2.y - (p3.y - p1.y) / 6 * smoothness;

            d += ` C ${cp1x.toFixed(1)} ${cp1y.toFixed(1)}, ${cp2x.toFixed(1)} ${cp2y.toFixed(1)}, ${p2.x.toFixed(1)} ${p2.y.toFixed(1)}`;
        }
        return d + ' Z';
    }

    function drawBlob() {
        const pathData = createSmoothClosedPath(points, sharpness);
        blobPath.setAttribute('d', pathData);

        // Apply style settings
        if (activeFill === 'gradient') {
            const startHex = inputGradStart.value;
            const endHex = inputGradEnd.value;
            const angle = parseInt(rangeGradAngle.value);

            gradStopStart.setAttribute('stop-color', startHex);
            gradStopEnd.setAttribute('stop-color', endHex);

            // Compute linear gradient angles coordinates
            const radians = (angle * Math.PI) / 180;
            const x1 = Math.round(50 - Math.cos(radians) * 50);
            const y1 = Math.round(50 - Math.sin(radians) * 50);
            const x2 = Math.round(50 + Math.cos(radians) * 50);
            const y2 = Math.round(50 + Math.sin(radians) * 50);

            linearGrad.setAttribute('x1', x1 + '%');
            linearGrad.setAttribute('y1', y1 + '%');
            linearGrad.setAttribute('x2', x2 + '%');
            linearGrad.setAttribute('y2', y2 + '%');

            blobPath.setAttribute('fill', 'url(#blob-grad)');
            blobPath.setAttribute('stroke', 'none');
        } 
        else if (activeFill === 'solid') {
            const hex = inputSolidColor.value;
            blobPath.setAttribute('fill', hex);
            blobPath.setAttribute('stroke', 'none');
        } 
        else if (activeFill === 'outline') {
            const hex = inputSolidColor.value;
            blobPath.setAttribute('fill', 'none');
            blobPath.setAttribute('stroke', hex);
        }

        updateCodeOutput();
    }

    function updateCodeOutput() {
        // Build clean string representation of the SVG XML structure
        let styleAttr = '';
        let defsHtml = '';

        if (activeFill === 'gradient') {
            const angle = parseInt(rangeGradAngle.value);
            const radians = (angle * Math.PI) / 180;
            const x1 = Math.round(50 - Math.cos(radians) * 50);
            const y1 = Math.round(50 - Math.sin(radians) * 50);
            const x2 = Math.round(50 + Math.cos(radians) * 50);
            const y2 = Math.round(50 + Math.sin(radians) * 50);

            defsHtml = `\n  <defs>\n    <linearGradient id="blob-gradient" x1="${x1}%" y1="${y1}%" x2="${x2}%" y2="${y2}%">\n      <stop offset="0%" stop-color="${inputGradStart.value}" />\n      <stop offset="100%" stop-color="${inputGradEnd.value}" />\n    </linearGradient>\n  </defs>`;
            styleAttr = 'fill="url(#blob-gradient)" stroke="none"';
        } 
        else if (activeFill === 'solid') {
            styleAttr = `fill="${inputSolidColor.value}" stroke="none"`;
        } 
        else if (activeFill === 'outline') {
            styleAttr = `fill="none" stroke="${inputSolidColor.value}" stroke-width="4"`;
        }

        const pathData = blobPath.getAttribute('d');
        const code = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400" width="100%" height="100%">${defsHtml}\n  <path d="${pathData}" ${styleAttr} />\n</svg>`;
        svgCodeOutput.textContent = code;
    }

    // Presets fill handlers
    fillBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            fillBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            activeFill = this.getAttribute('data-style');

            if (activeFill === 'gradient') {
                solidContainer.classList.add('d-none');
                gradContainer.classList.remove('d-none');
            } else {
                gradContainer.classList.add('d-none');
                solidContainer.classList.remove('d-none');
            }

            drawBlob();
        });
    });

    // Mutate click
    btnMutate.addEventListener('click', function(e) {
        e.preventDefault();
        generatePoints();
        drawBlob();
    });

    // Color Pickers sync
    inputSolidColor.addEventListener('input', function() {
        textSolidColor.value = this.value.toUpperCase();
        drawBlob();
    });

    textSolidColor.addEventListener('input', function() {
        let val = this.value.trim();
        if (val[0] !== '#') val = '#' + val;
        if (/^#[0-9A-F]{6}$/i.test(val)) {
            inputSolidColor.value = val;
            drawBlob();
        }
    });

    inputGradStart.addEventListener('input', function() {
        textGradStart.value = this.value.toUpperCase();
        drawBlob();
    });

    textGradStart.addEventListener('input', function() {
        let val = this.value.trim();
        if (val[0] !== '#') val = '#' + val;
        if (/^#[0-9A-F]{6}$/i.test(val)) {
            inputGradStart.value = val;
            drawBlob();
        }
    });

    inputGradEnd.addEventListener('input', function() {
        textGradEnd.value = this.value.toUpperCase();
        drawBlob();
    });

    textGradEnd.addEventListener('input', function() {
        let val = this.value.trim();
        if (val[0] !== '#') val = '#' + val;
        if (/^#[0-9A-F]{6}$/i.test(val)) {
            inputGradEnd.value = val;
            drawBlob();
        }
    });

    rangeGradAngle.addEventListener('input', function() {
        valGradAngle.textContent = this.value + '°';
        drawBlob();
    });

    // Action handlers
    btnCopy.addEventListener('click', function(e) {
        e.preventDefault();
        const code = svgCodeOutput.textContent;
        navigator.clipboard.writeText(code).then(() => {
            const origHTML = btnCopy.innerHTML;
            btnCopy.innerHTML = '<i class="ri-check-line"></i> ¡Copiado!';
            btnCopy.className = 'btn btn-success w-100';
            setTimeout(() => {
                btnCopy.innerHTML = origHTML;
                btnCopy.className = 'btn btn-outline-primary w-100';
            }, 2000);
        });
    });

    btnDownload.addEventListener('click', function(e) {
        e.preventDefault();
        const code = svgCodeOutput.textContent;
        const blob = new Blob([code], { type: 'image/svg+xml' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `blob-shape-${complexity}pts-${Date.now()}.svg`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    });

    // Initial load
    updateComplexity();
});
</script>
