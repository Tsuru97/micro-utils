<div class="vat-calculator-wrapper">
    <div class="row g-4">
        <!-- Controls Panel -->
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm bg-light h-100">
                <div class="card-body p-4">
                    <!-- Direction Selector -->
                    <div class="mb-3">
                        <label class="form-label fw-bold d-block">@lang('tools.vat_direction')</label>
                        <div class="btn-group w-100" role="group">
                            <input type="radio" class="btn-check" name="vat-direction" id="vat-add" value="add" checked>
                            <label class="btn btn-outline-primary" for="vat-add">@lang('tools.vat_add')</label>
                            
                            <input type="radio" class="btn-check" name="vat-direction" id="vat-sub" value="sub">
                            <label class="btn btn-outline-primary" for="vat-sub">@lang('tools.vat_sub')</label>
                        </div>
                    </div>

                    <!-- Base Amount -->
                    <div class="mb-3">
                        <label for="vat-amount" class="form-label fw-bold">@lang('tools.vat_amount')</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white">$</span>
                            <input type="number" class="form-control shadow-none" id="vat-amount" placeholder="0.00" step="0.01" min="0" value="1000.00" aria-label="Amount">
                        </div>
                    </div>

                    <!-- VAT Tax Rate -->
                    <div class="mb-3">
                        <label for="vat-rate" class="form-label fw-bold">@lang('tools.vat_rate')</label>
                        <div class="input-group mb-2">
                            <input type="number" class="form-control shadow-none" id="vat-rate" min="0" max="100" value="16" step="0.1" aria-label="VAT Rate">
                            <span class="input-group-text bg-white">%</span>
                        </div>
                        <input type="range" class="form-range" id="vat-rate-slider" min="0" max="50" value="16" step="0.5">
                    </div>

                    <!-- Quick Preset Rates -->
                    <div class="mb-0">
                        <label class="form-label fw-bold d-block fs-13 text-muted">@lang('tools.vat_preset')</label>
                        <div class="d-flex flex-wrap gap-2" id="vat-presets">
                            <!-- ES/MX/LATAM -->
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-preset" data-rate="21">21% (ES)</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-preset" data-rate="16">16% (MX/ES)</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-preset" data-rate="19">19% (CL)</button>
                            <!-- US/UK/CA/AU -->
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-preset" data-rate="20">20% (UK)</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-preset" data-rate="15">15% (CA/NZ)</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-preset" data-rate="10">10% (AU)</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-preset" data-rate="8.25">8.25% (US)</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detailed Results Panel -->
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-4 text-primary">
                            <i class="ri-calculator-line align-middle me-1"></i> @lang('tools.url_output')
                        </h5>
                        
                        <!-- Neto -->
                        <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom border-light">
                            <span class="text-muted">@lang('tools.vat_result_net')</span>
                            <span class="fw-bold fs-16 text-dark" id="res-net">$0.00</span>
                        </div>
                        
                        <!-- IVA -->
                        <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom border-light">
                            <span class="text-muted" id="res-tax-label">@lang('tools.vat_result_tax')</span>
                            <span class="fw-bold fs-16 text-primary" id="res-tax">$0.00</span>
                        </div>

                        <!-- Total -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <span class="fw-bold text-dark fs-16">@lang('tools.vat_result_total')</span>
                            <span class="fw-bold fs-22 text-success" id="res-total">$0.00</span>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success w-100" id="btn-vat-copy">
                        <i class="ri-file-copy-line align-middle me-1"></i> @lang('tools.copy_text')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const elAmount = document.getElementById('vat-amount');
    const elRate = document.getElementById('vat-rate');
    const elRateSlider = document.getElementById('vat-rate-slider');
    const presetsContainer = document.getElementById('vat-presets');
    const resNet = document.getElementById('res-net');
    const resTax = document.getElementById('res-tax');
    const resTaxLabel = document.getElementById('res-tax-label');
    const resTotal = document.getElementById('res-total');
    const btnCopy = document.getElementById('btn-vat-copy');
    
    let direction = 'add';

    function formatCurrency(val) {
        return new Intl.NumberFormat(undefined, { style: 'currency', currency: 'USD' }).format(val);
    }

    function calculateVAT() {
        let amount = parseFloat(elAmount.value) || 0;
        let rate = parseFloat(elRate.value) || 0;
        
        if (amount < 0) amount = 0;
        if (rate < 0) rate = 0;
        if (rate > 100) rate = 100;

        let net = 0;
        let tax = 0;
        let total = 0;

        if (direction === 'add') {
            // Net is the entered amount
            net = amount;
            tax = net * (rate / 100);
            total = net + tax;
            
            resTaxLabel.textContent = `@lang('tools.vat_result_tax') (${rate}%)`;
        } else {
            // Total is the entered amount, calculate net and tax
            total = amount;
            net = total / (1 + (rate / 100));
            tax = total - net;
            
            resTaxLabel.textContent = `@lang('tools.vat_result_tax') (${rate}%)`;
        }

        resNet.textContent = formatCurrency(net);
        resTax.textContent = formatCurrency(tax);
        resTotal.textContent = formatCurrency(total);
    }

    // Event listeners
    document.querySelectorAll('input[name="vat-direction"]').forEach(radio => {
        radio.addEventListener('change', function() {
            direction = this.value;
            calculateVAT();
        });
    });

    elAmount.addEventListener('input', calculateVAT);

    elRate.addEventListener('input', function() {
        elRateSlider.value = this.value;
        calculateVAT();
    });

    elRateSlider.addEventListener('input', function() {
        elRate.value = this.value;
        calculateVAT();
    });

    presetsContainer.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-preset')) {
            const val = e.target.getAttribute('data-rate');
            elRate.value = val;
            elRateSlider.value = val;
            calculateVAT();
        }
    });

    btnCopy.addEventListener('click', function(e) {
        e.preventDefault();
        
        const summary = 
            `Net amount: ${resNet.textContent}\n` +
            `Tax rate: ${elRate.value}%\n` +
            `Tax amount: ${resTax.textContent}\n` +
            `Total: ${resTotal.textContent}`;
            
        navigator.clipboard.writeText(summary).then(function() {
            const originalHTML = btnCopy.innerHTML;
            btnCopy.innerHTML = '<i class="ri-check-line align-middle me-1"></i> Copied!';
            setTimeout(() => {
                btnCopy.innerHTML = originalHTML;
            }, 2000);
        });
    });

    // Run initial calculation
    calculateVAT();
});
</script>
