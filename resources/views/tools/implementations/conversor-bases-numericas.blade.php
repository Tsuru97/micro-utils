<div class="base-converter-wrapper">
    <div class="row g-4">
        <!-- Input Panel -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm bg-light h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4 text-primary">
                        <i class="ri-edit-line align-middle me-1"></i> @lang('tools.mi_campo_entrada')
                    </h5>

                    <!-- Input Base Selection -->
                    <div class="mb-3">
                        <label for="base-source" class="form-label fw-bold">@lang('tools.base_input_val')</label>
                        <select class="form-select shadow-none" id="base-source">
                            <option value="2">@lang('tools.base_bin')</option>
                            <option value="8">@lang('tools.base_oct')</option>
                            <option value="10" selected>@lang('tools.base_dec')</option>
                            <option value="16">@lang('tools.base_hex')</option>
                        </select>
                    </div>

                    <!-- Input Number -->
                    <div class="mb-0">
                        <label for="base-input-number" class="form-label fw-bold">@lang('tools.base_input')</label>
                        <input type="text" class="form-control shadow-none font-monospace fs-16 py-2.5" id="base-input-number" value="255" placeholder="Ingresa un número..." required style="font-family: monospace;">
                        <div class="text-danger fs-12 mt-1 d-none" id="base-error">
                            <i class="ri-alert-line me-1 align-middle"></i> @lang('tools.base_invalid_char')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Output Panel -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-4 text-primary">
                            <i class="ri-eye-line align-middle me-1"></i> @lang('tools.mi_campo_salida')
                        </h5>

                        <div class="d-flex flex-column gap-3" id="output-cards-container">
                            <!-- Binary Card -->
                            <div class="card border-0 bg-light p-3 position-relative" data-base="2">
                                <span class="badge bg-primary text-white position-absolute top-2 start-2" style="top: 8px; left: 8px;">@lang('tools.base_bin')</span>
                                <button type="button" class="btn btn-sm btn-light border-0 position-absolute top-2 end-2 py-1 px-2 btn-copy-base" style="top: 8px; right: 8px;">
                                    <i class="ri-file-copy-line"></i>
                                </button>
                                <div class="mt-3 font-monospace fs-16 fw-bold text-dark text-break out-value" style="font-family: monospace; min-height: 24px;"></div>
                            </div>

                            <!-- Octal Card -->
                            <div class="card border-0 bg-light p-3 position-relative" data-base="8">
                                <span class="badge bg-success text-white position-absolute top-2 start-2" style="top: 8px; left: 8px;">@lang('tools.base_oct')</span>
                                <button type="button" class="btn btn-sm btn-light border-0 position-absolute top-2 end-2 py-1 px-2 btn-copy-base" style="top: 8px; right: 8px;">
                                    <i class="ri-file-copy-line"></i>
                                </button>
                                <div class="mt-3 font-monospace fs-16 fw-bold text-dark text-break out-value" style="font-family: monospace; min-height: 24px;"></div>
                            </div>

                            <!-- Decimal Card -->
                            <div class="card border-0 bg-light p-3 position-relative" data-base="10">
                                <span class="badge bg-warning text-dark position-absolute top-2 start-2" style="top: 8px; left: 8px;">@lang('tools.base_dec')</span>
                                <button type="button" class="btn btn-sm btn-light border-0 position-absolute top-2 end-2 py-1 px-2 btn-copy-base" style="top: 8px; right: 8px;">
                                    <i class="ri-file-copy-line"></i>
                                </button>
                                <div class="mt-3 font-monospace fs-16 fw-bold text-dark text-break out-value" style="font-family: monospace; min-height: 24px;"></div>
                            </div>

                            <!-- Hexadecimal Card -->
                            <div class="card border-0 bg-light p-3 position-relative" data-base="16">
                                <span class="badge bg-info text-white position-absolute top-2 start-2" style="top: 8px; left: 8px;">@lang('tools.base_hex')</span>
                                <button type="button" class="btn btn-sm btn-light border-0 position-absolute top-2 end-2 py-1 px-2 btn-copy-base" style="top: 8px; right: 8px;">
                                    <i class="ri-file-copy-line"></i>
                                </button>
                                <div class="mt-3 font-monospace fs-16 fw-bold text-dark text-break out-value" style="font-family: monospace; min-height: 24px;">el-hex</div>
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
    const elSource = document.getElementById('base-source');
    const elInput = document.getElementById('base-input-number');
    const elError = document.getElementById('base-error');
    const cards = document.querySelectorAll('#output-cards-container [data-base]');

    function getBaseRegex(base) {
        if (base === 2) return /^[01]+$/;
        if (base === 8) return /^[0-7]+$/;
        if (base === 10) return /^[0-9]+$/;
        if (base === 16) return /^[0-9a-fA-F]+$/;
        return null;
    }

    function convert() {
        const val = elInput.value.trim();
        const srcBase = parseInt(elSource.value);

        elError.classList.add('d-none');
        
        if (!val) {
            cards.forEach(card => {
                card.querySelector('.out-value').textContent = '';
            });
            return;
        }

        // Validate character set matching selected base
        const regex = getBaseRegex(srcBase);
        if (regex && !regex.test(val)) {
            elError.classList.remove('d-none');
            cards.forEach(card => {
                card.querySelector('.out-value').textContent = '';
            });
            return;
        }

        try {
            // Convert to base 10 integer first (safe parsing)
            const decValue = parseInt(val, srcBase);
            
            if (isNaN(decValue)) {
                throw new Error("Conversión fallida");
            }

            cards.forEach(card => {
                const targetBase = parseInt(card.getAttribute('data-base'));
                
                // Show output
                const outStr = decValue.toString(targetBase).toUpperCase();
                card.querySelector('.out-value').textContent = outStr;
            });
        } catch (e) {
            elError.classList.remove('d-none');
            cards.forEach(card => {
                card.querySelector('.out-value').textContent = '';
            });
        }
    }

    // Input listening
    elSource.addEventListener('change', function() {
        // Clear value when base changes to avoid mismatched characters block, or convert if valid
        convert();
    });
    elInput.addEventListener('input', convert);

    // Setup Copy features
    cards.forEach(card => {
        const btn = card.querySelector('.btn-copy-base');
        const textDiv = card.querySelector('.out-value');
        
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const text = textDiv.textContent;
            if (text) {
                navigator.clipboard.writeText(text).then(function() {
                    const originalHTML = btn.innerHTML;
                    btn.innerHTML = '<i class="ri-check-line text-success"></i>';
                    setTimeout(() => {
                        btn.innerHTML = originalHTML;
                    }, 1500);
                });
            }
        });
    });

    // Run once at load
    convert();
});
</script>
