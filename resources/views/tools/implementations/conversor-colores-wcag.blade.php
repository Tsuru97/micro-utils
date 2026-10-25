<div class="wcag-color-wrapper py-3">
    <style>
        .color-preview-box {
            border-radius: 16px;
            padding: 24px;
            text-align: center;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            min-height: 180px;
            display: flex;
            flex-column: column;
            justify-content: center;
            align-items: center;
            box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.03);
        }
        .contrast-badge {
            font-size: 0.8rem;
            font-weight: 700;
            padding: 6px 12px;
            border-radius: 20px;
            letter-spacing: 0.5px;
        }
        .badge-pass {
            background-color: rgba(16, 185, 129, 0.15);
            color: #10b981;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }
        .badge-fail {
            background-color: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }
        .contrast-score-display {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1;
            font-family: 'Outfit', 'Inter', sans-serif;
            letter-spacing: -2px;
        }
        .preset-color-dot {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            cursor: pointer;
            border: 2px solid #ffffff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease;
        }
        .preset-color-dot:hover {
            transform: scale(1.15) translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }
        .preset-color-dot.active {
            border-color: #3b82f6;
            transform: scale(1.1);
        }
        .color-picker-wrapper {
            position: relative;
            width: 48px;
            height: 38px;
            overflow: hidden;
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 0;
            cursor: pointer;
        }
        .color-picker-input {
            position: absolute;
            right: -8px;
            top: -8px;
            width: 64px;
            height: 54px;
            border: none;
            cursor: pointer;
            background: none;
        }
        .value-sync-card {
            background: rgba(255, 255, 255, 0.5);
            border-radius: 12px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            padding: 12px 16px;
        }
        [data-bs-theme="dark"] .value-sync-card {
            background: rgba(255, 255, 255, 0.03);
            border-color: rgba(255, 255, 255, 0.05);
        }
    </style>

    <div class="row g-4">
        <!-- Panel Izquierdo: Controles de Color -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 p-md-5">
                    <h4 class="fw-bold mb-4 text-dark">
                        <i class="ri-palette-line text-primary me-2"></i> @lang('tools.mi_campo_entrada')
                    </h4>

                    <!-- Color de Texto (Foreground) -->
                    <div class="mb-4">
                        <label class="form-label fw-bold d-flex justify-content-between">
                            <span>@lang('tools.color_fg')</span>
                            <span class="text-primary fw-normal fs-13" id="fg-hsl-text">hsl(0, 0%, 0%)</span>
                        </label>
                        <div class="d-flex gap-2">
                            <div class="color-picker-wrapper">
                                <input type="color" class="color-picker-input" id="picker-fg" value="#000000">
                            </div>
                            <input type="text" class="form-control uppercase" id="input-fg" value="#000000" placeholder="#000000" maxlength="7">
                        </div>
                        <div class="d-flex gap-2 flex-wrap mt-2" id="preset-fg-container">
                            <div class="preset-color-dot" style="background-color: #000000;" data-color="#000000"></div>
                            <div class="preset-color-dot" style="background-color: #ffffff;" data-color="#ffffff"></div>
                            <div class="preset-color-dot" style="background-color: #1e293b;" data-color="#1e293b"></div>
                            <div class="preset-color-dot" style="background-color: #3b82f6;" data-color="#3b82f6"></div>
                            <div class="preset-color-dot" style="background-color: #10b981;" data-color="#10b981"></div>
                            <div class="preset-color-dot" style="background-color: #f59e0b;" data-color="#f59e0b"></div>
                            <div class="preset-color-dot" style="background-color: #ef4444;" data-color="#ef4444"></div>
                        </div>
                    </div>

                    <!-- Color de Fondo (Background) -->
                    <div class="mb-4">
                        <label class="form-label fw-bold d-flex justify-content-between">
                            <span>@lang('tools.color_bg')</span>
                            <span class="text-primary fw-normal fs-13" id="bg-hsl-text">hsl(0, 0%, 100%)</span>
                        </label>
                        <div class="d-flex gap-2">
                            <div class="color-picker-wrapper">
                                <input type="color" class="color-picker-input" id="picker-bg" value="#ffffff">
                            </div>
                            <input type="text" class="form-control uppercase" id="input-bg" value="#ffffff" placeholder="#ffffff" maxlength="7">
                        </div>
                        <div class="d-flex gap-2 flex-wrap mt-2" id="preset-bg-container">
                            <div class="preset-color-dot" style="background-color: #ffffff;" data-color="#ffffff"></div>
                            <div class="preset-color-dot" style="background-color: #f8fafc;" data-color="#f8fafc"></div>
                            <div class="preset-color-dot" style="background-color: #f1f5f9;" data-color="#f1f5f9"></div>
                            <div class="preset-color-dot" style="background-color: #3b82f6;" data-color="#3b82f6"></div>
                            <div class="preset-color-dot" style="background-color: #1e293b;" data-color="#1e293b"></div>
                            <div class="preset-color-dot" style="background-color: #0f172a;" data-color="#0f172a"></div>
                            <div class="preset-color-dot" style="background-color: #000000;" data-color="#000000"></div>
                        </div>
                    </div>

                    <!-- Desglose de Valores -->
                    <div class="row g-3 mt-2">
                        <div class="col-6">
                            <div class="value-sync-card">
                                <small class="text-muted d-block mb-1">Text RGB</small>
                                <span class="fw-bold fs-14 text-dark" id="fg-rgb-text">rgb(0, 0, 0)</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="value-sync-card">
                                <small class="text-muted d-block mb-1">Background RGB</small>
                                <span class="fw-bold fs-14 text-dark" id="bg-rgb-text">rgb(255, 255, 255)</span>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-outline-primary w-100 mt-4" id="btn-swap-colors">
                        <i class="ri-arrow-up-down-line me-1"></i> Intercambiar Colores
                    </button>
                </div>
            </div>
        </div>

        <!-- Panel Derecho: Resultados WCAG e Vista Previa -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 p-md-5 d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="fw-bold mb-4 text-dark">
                            <i class="ri-check-double-line text-success me-2"></i> @lang('tools.mi_campo_salida')
                        </h4>

                        <!-- Puntuación de Contraste -->
                        <div class="text-center py-4 bg-light rounded-4 mb-4 border border-white-50 shadow-sm">
                            <small class="text-muted uppercase-tracking fs-11 fw-bold">@lang('tools.color_contrast')</small>
                            <div class="contrast-score-display my-2 text-dark" id="contrast-ratio">21.00:1</div>
                        </div>

                        <!-- Evaluación de Pautas -->
                        <div class="list-group list-group-flush mb-4">
                            <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0 py-3">
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark">@lang('tools.color_normal_text')</h6>
                                    <small class="text-muted">AA (req. 4.5:1) / AAA (req. 7.0:1)</small>
                                </div>
                                <div class="d-flex gap-2">
                                    <span class="contrast-badge" id="badge-normal-aa">AA: PASS</span>
                                    <span class="contrast-badge" id="badge-normal-aaa">AAA: PASS</span>
                                </div>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0 py-3">
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark">@lang('tools.color_large_text')</h6>
                                    <small class="text-muted">AA (req. 3.0:1) / AAA (req. 4.5:1)</small>
                                </div>
                                <div class="d-flex gap-2">
                                    <span class="contrast-badge" id="badge-large-aa">AA: PASS</span>
                                    <span class="contrast-badge" id="badge-large-aaa">AAA: PASS</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Vista Previa de Diseño -->
                    <div>
                        <h6 class="fw-bold text-muted mb-2 fs-12 uppercase-tracking">Vista Previa de Componentes</h6>
                        <div class="color-preview-box" id="preview-box">
                            <div class="w-100 text-center">
                                <h4 class="fw-bold mb-2" id="preview-large-text">Texto Grande de Muestra</h4>
                                <p class="mb-3 fs-14" id="preview-normal-text">Este es un párrafo de texto normal que demuestra la legibilidad con la combinación actual de colores de primer plano y fondo.</p>
                                <button type="button" class="btn px-4 py-2 fw-semibold border-0 fs-13" id="preview-btn" style="transition: opacity 0.2s;">
                                    Botón de Muestra
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const inputFg = document.getElementById('input-fg');
    const pickerFg = document.getElementById('picker-fg');
    const inputBg = document.getElementById('input-bg');
    const pickerBg = document.getElementById('picker-bg');
    const btnSwap = document.getElementById('btn-swap-colors');

    const contrastDisplay = document.getElementById('contrast-ratio');
    
    // badges
    const badgeNormalAA = document.getElementById('badge-normal-aa');
    const badgeNormalAAA = document.getElementById('badge-normal-aaa');
    const badgeLargeAA = document.getElementById('badge-large-aa');
    const badgeLargeAAA = document.getElementById('badge-large-aaa');

    // previews
    const previewBox = document.getElementById('preview-box');
    const previewLarge = document.getElementById('preview-large-text');
    const previewNormal = document.getElementById('preview-normal-text');
    const previewBtn = document.getElementById('preview-btn');

    // textual displays
    const fgHsl = document.getElementById('fg-hsl-text');
    const bgHsl = document.getElementById('bg-hsl-text');
    const fgRgb = document.getElementById('fg-rgb-text');
    const bgRgb = document.getElementById('bg-rgb-text');

    // color conversions helpers
    function hexToRgb(hex) {
        // Expand shorthand form (e.g. "03F") to full form (e.g. "0033FF")
        const shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
        hex = hex.replace(shorthandRegex, function(m, r, g, b) {
            return r + r + g + g + b + b;
        });

        const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        } : { r: 0, g: 0, b: 0 };
    }

    function rgbToHsl(r, g, b) {
        r /= 255, g /= 255, b /= 255;
        const max = Math.max(r, g, b), min = Math.min(r, g, b);
        let h, s, l = (max + min) / 2;

        if (max === min) {
            h = s = 0; // achromatic
        } else {
            const d = max - min;
            s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
            switch (max) {
                case r: h = (g - b) / d + (g < b ? 6 : 0); break;
                case g: h = (b - r) / d + 2; break;
                case b: h = (r - g) / d + 4; break;
            }
            h /= 6;
        }

        return {
            h: Math.round(h * 360),
            s: Math.round(s * 100),
            l: Math.round(l * 100)
        };
    }

    // Relative Luminance formula WCAG 2.1
    function getLuminance(r, g, b) {
        const a = [r, g, b].map(function (v) {
            v /= 255;
            return v <= 0.03928 ? v / 12.92 : Math.pow((v + 0.055) / 1.055, 2.4);
        });
        return a[0] * 0.2126 + a[1] * 0.7152 + a[2] * 0.0722;
    }

    function calculateContrast(hex1, hex2) {
        const rgb1 = hexToRgb(hex1);
        const rgb2 = hexToRgb(hex2);
        
        const l1 = getLuminance(rgb1.r, rgb1.g, rgb1.b);
        const l2 = getLuminance(rgb2.r, rgb2.g, rgb2.b);
        
        const lighter = Math.max(l1, l2);
        const darker = Math.min(l1, l2);
        
        return (lighter + 0.05) / (darker + 0.05);
    }

    function isValidHex(hex) {
        return /^#[0-9A-F]{6}$/i.test(hex);
    }

    function updateView() {
        let fgVal = inputFg.value.trim();
        let bgVal = inputBg.value.trim();

        if (fgVal[0] !== '#') fgVal = '#' + fgVal;
        if (bgVal[0] !== '#') bgVal = '#' + bgVal;

        if (!isValidHex(fgVal) || !isValidHex(bgVal)) {
            return;
        }

        // Sync Pickers
        pickerFg.value = fgVal;
        pickerBg.value = bgVal;

        // Calculate Contrast
        const contrast = calculateContrast(fgVal, bgVal);
        contrastDisplay.textContent = contrast.toFixed(2) + ':1';

        // Update Textual info
        const rgbFg = hexToRgb(fgVal);
        const hslFg = rgbToHsl(rgbFg.r, rgbFg.g, rgbFg.b);
        fgRgb.textContent = `rgb(${rgbFg.r}, ${rgbFg.g}, ${rgbFg.b})`;
        fgHsl.textContent = `hsl(${hslFg.h}, ${hslFg.s}%, ${hslFg.l}%)`;

        const rgbBg = hexToRgb(bgVal);
        const hslBg = rgbToHsl(rgbBg.r, rgbBg.g, rgbBg.b);
        bgRgb.textContent = `rgb(${rgbBg.r}, ${rgbBg.g}, ${rgbBg.b})`;
        bgHsl.textContent = `hsl(${hslBg.h}, ${hslBg.s}%, ${hslBg.l}%)`;

        // Evaluate Standards
        // Normal Text: AA >= 4.5, AAA >= 7
        // Large Text: AA >= 3, AAA >= 4.5
        updateBadge(badgeNormalAA, contrast >= 4.5, 'Normal AA');
        updateBadge(badgeNormalAAA, contrast >= 7.0, 'Normal AAA');
        updateBadge(badgeLargeAA, contrast >= 3.0, 'Large AA');
        updateBadge(badgeLargeAAA, contrast >= 4.5, 'Large AAA');

        // Update Preview Panel
        previewBox.style.backgroundColor = bgVal;
        previewLarge.style.color = fgVal;
        previewNormal.style.color = fgVal;
        
        // Button style preview
        previewBtn.style.backgroundColor = fgVal;
        previewBtn.style.color = bgVal;
    }

    function updateBadge(el, passes, textPrefix) {
        el.className = 'contrast-badge ' + (passes ? 'badge-pass' : 'badge-fail');
        el.innerHTML = `${textPrefix}: ${passes ? "<i class='ri-check-line align-middle'></i> APROBADO" : "<i class='ri-close-line align-middle'></i> REPROBADO"}`;
    }

    // Input handlers
    function handleFgChange() {
        let val = inputFg.value.trim();
        if (val[0] !== '#') val = '#' + val;
        if (isValidHex(val)) {
            updateView();
        }
    }

    function handleBgChange() {
        let val = inputBg.value.trim();
        if (val[0] !== '#') val = '#' + val;
        if (isValidHex(val)) {
            updateView();
        }
    }

    inputFg.addEventListener('input', handleFgChange);
    inputBg.addEventListener('input', handleBgChange);

    pickerFg.addEventListener('input', function() {
        inputFg.value = pickerFg.value.toUpperCase();
        updateView();
    });

    pickerBg.addEventListener('input', function() {
        inputBg.value = pickerBg.value.toUpperCase();
        updateView();
    });

    // Swapping foreground and background
    btnSwap.addEventListener('click', function() {
        const temp = inputFg.value;
        inputFg.value = inputBg.value;
        inputBg.value = temp;
        updateView();
    });

    // Presets handler
    document.querySelectorAll('#preset-fg-container .preset-color-dot').forEach(dot => {
        dot.addEventListener('click', function() {
            inputFg.value = this.getAttribute('data-color').toUpperCase();
            updateView();
        });
    });

    document.querySelectorAll('#preset-bg-container .preset-color-dot').forEach(dot => {
        dot.addEventListener('click', function() {
            inputBg.value = this.getAttribute('data-color').toUpperCase();
            updateView();
        });
    });

    // Initial load
    updateView();
});
</script>
