<div class="shadow-generator-wrapper">
    <div class="row g-4">
        <!-- Controls Panel -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm bg-light h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4 text-primary">
                        <i class="ri-settings-line align-middle me-1"></i> @lang('tools.shadow_preview')
                    </h5>

                    <!-- Horizontal Offset -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <label for="shadow-h" class="form-label fw-bold mb-0">@lang('tools.shadow_h_offset')</label>
                            <span class="fw-bold text-primary" id="lbl-shadow-h">0px</span>
                        </div>
                        <input type="range" class="form-range" id="shadow-h" min="-50" max="50" value="0">
                    </div>

                    <!-- Vertical Offset -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <label for="shadow-v" class="form-label fw-bold mb-0">@lang('tools.shadow_v_offset')</label>
                            <span class="fw-bold text-primary" id="lbl-shadow-v">8px</span>
                        </div>
                        <input type="range" class="form-range" id="shadow-v" min="-50" max="50" value="8">
                    </div>

                    <!-- Blur Radius -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <label for="shadow-blur" class="form-label fw-bold mb-0">@lang('tools.shadow_blur')</label>
                            <span class="fw-bold text-primary" id="lbl-shadow-blur">16px</span>
                        </div>
                        <input type="range" class="form-range" id="shadow-blur" min="0" max="100" value="16">
                    </div>

                    <!-- Spread Radius -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <label for="shadow-spread" class="form-label fw-bold mb-0">@lang('tools.shadow_spread')</label>
                            <span class="fw-bold text-primary" id="lbl-shadow-spread">0px</span>
                        </div>
                        <input type="range" class="form-range" id="shadow-spread" min="-50" max="50" value="0">
                    </div>

                    <!-- Shadow Color & Opacity in one row -->
                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label for="shadow-color" class="form-label fw-bold">@lang('tools.shadow_color')</label>
                            <input type="color" class="form-control form-control-color w-100 border-light p-1 shadow-none" id="shadow-color" value="#000000" style="height: 38px; cursor: pointer;">
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-between mb-1">
                                <label for="shadow-opacity" class="form-label fw-bold mb-0">@lang('tools.shadow_opacity')</label>
                                <span class="fw-bold text-primary" id="lbl-shadow-opacity">0.15</span>
                            </div>
                            <input type="range" class="form-range mt-2" id="shadow-opacity" min="0" max="1" step="0.01" value="0.15">
                        </div>
                    </div>

                    <!-- Colors: Box & Background in one row -->
                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label for="box-color" class="form-label fw-bold">@lang('tools.shadow_box_color')</label>
                            <input type="color" class="form-control form-control-color w-100 border-light p-1 shadow-none" id="box-color" value="#ffffff" style="height: 38px; cursor: pointer;">
                        </div>
                        <div class="col-6">
                            <label for="bg-color" class="form-label fw-bold">@lang('tools.shadow_bg_color')</label>
                            <input type="color" class="form-control form-control-color w-100 border-light p-1 shadow-none" id="bg-color" value="#f8f9fa" style="height: 38px; cursor: pointer;">
                        </div>
                    </div>

                    <!-- Inset shadow -->
                    <div class="form-check form-switch mb-0">
                        <input class="form-check-input shadow-none" type="checkbox" id="shadow-inset" style="cursor: pointer;">
                        <label class="form-check-label fw-bold" for="shadow-inset" style="cursor: pointer;">@lang('tools.shadow_inset')</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Preview & Output Panel -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-3 text-primary">
                            <i class="ri-eye-line align-middle me-1"></i> @lang('tools.shadow_preview')
                        </h5>
                        
                        <!-- Visualizer Area -->
                        <div class="rounded-3 d-flex justify-content-center align-items-center mb-4 transition-all" id="preview-background" style="height: 250px; background-color: #f8f9fa; border: 1px solid rgba(0,0,0,0.05);">
                            <!-- The Box -->
                            <div class="rounded-3 transition-all" id="shadow-box" style="width: 130px; height: 130px; background-color: #ffffff;"></div>
                        </div>

                        <!-- Generated CSS Output -->
                        <label class="form-label fw-bold text-muted fs-13">@lang('tools.shadow_copy_css')</label>
                        <textarea class="form-control bg-dark text-white border-0 shadow-none fs-13 text-monospace mb-3" id="shadow-css" rows="4" readonly style="font-family: monospace; resize: none;"></textarea>
                    </div>

                    <button type="button" class="btn btn-success w-100 py-2.5" id="btn-copy-shadow">
                        <i class="ri-file-copy-line align-middle me-1"></i> @lang('tools.shadow_copy_css')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const elH = document.getElementById('shadow-h');
    const elV = document.getElementById('shadow-v');
    const elBlur = document.getElementById('shadow-blur');
    const elSpread = document.getElementById('shadow-spread');
    const elColor = document.getElementById('shadow-color');
    const elOpacity = document.getElementById('shadow-opacity');
    const elBoxColor = document.getElementById('box-color');
    const elBgColor = document.getElementById('bg-color');
    const elInset = document.getElementById('shadow-inset');

    const lblH = document.getElementById('lbl-shadow-h');
    const lblV = document.getElementById('lbl-shadow-v');
    const lblBlur = document.getElementById('lbl-shadow-blur');
    const lblSpread = document.getElementById('lbl-shadow-spread');
    const lblOpacity = document.getElementById('lbl-shadow-opacity');

    const previewBg = document.getElementById('preview-background');
    const previewBox = document.getElementById('shadow-box');
    const outCss = document.getElementById('shadow-css');
    const btnCopy = document.getElementById('btn-copy-shadow');

    function hexToRgba(hex, opacity) {
        const r = parseInt(hex.slice(1, 3), 16);
        const g = parseInt(hex.slice(3, 5), 16);
        const b = parseInt(hex.slice(5, 7), 16);
        return `rgba(${r}, ${g}, ${b}, ${opacity})`;
    }

    function updateShadow() {
        const hVal = elH.value;
        const vVal = elV.value;
        const blurVal = elBlur.value;
        const spreadVal = elSpread.value;
        const colorVal = elColor.value;
        const opacityVal = elOpacity.value;
        const boxVal = elBoxColor.value;
        const bgVal = elBgColor.value;
        const insetVal = elInset.checked ? 'inset' : '';

        // Update slider labels
        lblH.textContent = hVal + 'px';
        lblV.textContent = vVal + 'px';
        lblBlur.textContent = blurVal + 'px';
        lblSpread.textContent = spreadVal + 'px';
        lblOpacity.textContent = opacityVal;

        const rgbaColor = hexToRgba(colorVal, opacityVal);
        
        // Build style strings
        const shadowStyle = `${insetVal ? 'inset ' : ''}${hVal}px ${vVal}px ${blurVal}px ${spreadVal}px ${rgbaColor}`;
        
        // Apply styling to visual preview
        previewBg.style.backgroundColor = bgVal;
        previewBox.style.backgroundColor = boxVal;
        previewBox.style.boxShadow = shadowStyle;

        // Output complete cross-browser and standard CSS rules
        const fullCss = `box-shadow: ${shadowStyle};\n-webkit-box-shadow: ${shadowStyle};\n-moz-box-shadow: ${shadowStyle};`;
        outCss.value = fullCss;
    }

    // Attach listeners
    const inputs = [elH, elV, elBlur, elSpread, elColor, elOpacity, elBoxColor, elBgColor, elInset];
    inputs.forEach(input => {
        input.addEventListener('input', updateShadow);
        input.addEventListener('change', updateShadow);
    });

    btnCopy.addEventListener('click', function(e) {
        e.preventDefault();
        if (outCss.value) {
            navigator.clipboard.writeText(outCss.value).then(function() {
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

    // Run once initially
    updateShadow();
});
</script>
