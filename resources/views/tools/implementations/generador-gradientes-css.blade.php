<div class="gradient-generator-wrapper">
    <div class="row g-4">
        <!-- Controls Panel -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm bg-light h-100">
                <div class="card-body p-4">
                    <!-- Gradient Type -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">@lang('tools.grad_type')</label>
                        <div class="btn-group w-100" role="group">
                            <input type="radio" class="btn-check" name="grad-type" id="grad-linear" value="linear" checked>
                            <label class="btn btn-outline-primary" for="grad-linear">@lang('tools.grad_linear')</label>
                            
                            <input type="radio" class="btn-check" name="grad-type" id="grad-radial" value="radial">
                            <label class="btn btn-outline-primary" for="grad-radial">@lang('tools.grad_radial')</label>
                        </div>
                    </div>

                    <!-- Angle Slider (Linear only) -->
                    <div class="mb-4" id="angle-container">
                        <div class="d-flex justify-content-between mb-1">
                            <label for="grad-angle" class="form-label fw-bold mb-0">@lang('tools.grad_angle')</label>
                            <span class="fw-bold text-primary" id="lbl-angle">90°</span>
                        </div>
                        <input type="range" class="form-range" id="grad-angle" min="0" max="360" value="90">
                    </div>

                    <!-- Color Stops List -->
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <label class="form-label fw-bold mb-0">@lang('tools.grad_stops')</label>
                            <button type="button" class="btn btn-primary btn-sm" id="btn-add-stop">
                                <i class="ri-add-line align-middle me-1"></i> @lang('tools.grad_add_stop')
                            </button>
                        </div>
                        
                        <div class="d-flex flex-column gap-2" id="stops-list" style="max-height: 250px; overflow-y: auto;">
                            <!-- Stop items will be injected here dynamically -->
                        </div>
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
                            <i class="ri-palette-line align-middle me-1"></i> Vista Previa
                        </h5>
                        
                        <!-- Gradient Live Preview area -->
                        <div class="rounded-3 shadow-inner mb-4 position-relative" id="gradient-preview" style="height: 200px; background: linear-gradient(90deg, #0d6efd 0%, #198754 100%);">
                            <!-- Drag visualizer indicator (optionally simple) -->
                        </div>

                        <!-- Code Output -->
                        <label class="form-label fw-bold text-muted fs-13">Código CSS Generado</label>
                        <textarea class="form-control bg-dark text-white border-0 shadow-none fs-13 text-monospace mb-3" id="gradient-css" rows="3" readonly style="font-family: monospace; resize: none;"></textarea>
                    </div>

                    <button type="button" class="btn btn-success w-100" id="btn-copy-css">
                        <i class="ri-file-copy-line align-middle me-1"></i> @lang('tools.grad_copy_css')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const elLinear = document.getElementById('grad-linear');
    const elRadial = document.getElementById('grad-radial');
    const elAngle = document.getElementById('grad-angle');
    const lblAngle = document.getElementById('lbl-angle');
    const angleContainer = document.getElementById('angle-container');
    const stopsList = document.getElementById('stops-list');
    const btnAddStop = document.getElementById('btn-add-stop');
    const previewArea = document.getElementById('gradient-preview');
    const outCss = document.getElementById('gradient-css');
    const btnCopy = document.getElementById('btn-copy-css');

    // Default Stops
    let colorStops = [
        { color: '#0d6efd', position: 0 },
        { color: '#198754', position: 100 }
    ];

    let gradType = 'linear';

    function renderStops() {
        stopsList.innerHTML = '';
        
        // Sort stops by position to keep them logical
        colorStops.sort((a, b) => a.position - b.position);

        colorStops.forEach((stop, index) => {
            const item = document.createElement('div');
            item.className = 'd-flex align-items-center gap-2 bg-white p-2 rounded border border-light';
            item.innerHTML = `
                <input type="color" class="form-control form-control-color border-0 p-0 shadow-none" value="${stop.color}" data-index="${index}" style="width: 32px; height: 32px; cursor: pointer;">
                <input type="text" class="form-control form-control-sm text-monospace text-center fs-12 val-color" value="${stop.color.toUpperCase()}" data-index="${index}" style="width: 80px;" maxlength="7">
                <input type="range" class="form-range flex-grow-1 slider-pos" min="0" max="100" value="${stop.position}" data-index="${index}">
                <span class="fw-bold fs-12 text-muted text-center" style="width: 35px;">${stop.position}%</span>
                <button type="button" class="btn btn-sm btn-ghost-danger btn-delete-stop py-0 px-2 fs-15" data-index="${index}" ${colorStops.length <= 2 ? 'disabled' : ''}>
                    <i class="ri-delete-bin-line"></i>
                </button>
            `;
            stopsList.appendChild(item);
        });

        updateGradient();
    }

    function updateGradient() {
        const type = elLinear.checked ? 'linear' : 'radial';
        const angle = elAngle.value;
        
        lblAngle.textContent = angle + '°';

        const stopsStr = colorStops.map(s => `${s.color} ${s.position}%`).join(', ');
        let gradientStyle = '';

        if (type === 'linear') {
            angleContainer.classList.remove('d-none');
            gradientStyle = `linear-gradient(${angle}deg, ${stopsStr})`;
        } else {
            angleContainer.classList.add('d-none');
            gradientStyle = `radial-gradient(circle, ${stopsStr})`;
        }

        // Apply style to live preview
        previewArea.style.background = gradientStyle;
        
        // Output full CSS line
        outCss.value = `background: ${gradientStyle};`;
    }

    // Dynamic Color Stop Event Handlers
    stopsList.addEventListener('input', function(e) {
        const index = parseInt(e.target.getAttribute('data-index'));
        
        if (e.target.classList.contains('form-control-color')) {
            colorStops[index].color = e.target.value;
            // update companion input text
            e.target.nextElementSibling.value = e.target.value.toUpperCase();
            updateGradient();
        } else if (e.target.classList.contains('val-color')) {
            const val = e.target.value;
            if (/^#[0-9A-F]{6}$/i.test(val)) {
                colorStops[index].color = val;
                // update color picker
                e.target.previousElementSibling.value = val;
                updateGradient();
            }
        } else if (e.target.classList.contains('slider-pos')) {
            colorStops[index].position = parseInt(e.target.value);
            // sort and re-render stops on release to avoid jumps while dragging, or just update value
            e.target.nextElementSibling.textContent = e.target.value + '%';
            updateGradient();
        }
    });

    // Re-render when position changes completely to sort correctly
    stopsList.addEventListener('change', function(e) {
        if (e.target.classList.contains('slider-pos')) {
            renderStops();
        }
    });

    stopsList.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-delete-stop');
        if (btn) {
            const index = parseInt(btn.getAttribute('data-index'));
            if (colorStops.length > 2) {
                colorStops.splice(index, 1);
                renderStops();
            }
        }
    });

    btnAddStop.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Add stop in the middle with a random color
        const randomColor = '#' + Math.floor(Math.random()*16777215).toString(16).padStart(6, '0');
        const middlePos = Math.round(50);
        
        colorStops.push({ color: randomColor, position: middlePos });
        renderStops();
    });

    // Radio controls change
    elLinear.addEventListener('change', updateGradient);
    elRadial.addEventListener('change', updateGradient);
    elAngle.addEventListener('input', updateGradient);

    btnCopy.addEventListener('click', function(e) {
        e.preventDefault();
        if (outCss.value) {
            navigator.clipboard.writeText(outCss.value).then(function() {
                const originalHTML = btnCopy.innerHTML;
                btnCopy.innerHTML = '<i class="ri-check-line align-middle me-1"></i> Copied!';
                setTimeout(() => {
                    btnCopy.innerHTML = originalHTML;
                }, 2000);
            });
        }
    });

    // Initial render
    renderStops();
});
</script>
