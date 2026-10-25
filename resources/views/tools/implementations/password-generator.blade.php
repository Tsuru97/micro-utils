<div class="password-generator-wrapper">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <!-- Salida de Contraseña -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4 text-center">
                    <h2 class="mb-3 text-break fw-bold text-primary text-monospace" id="pg-output" style="font-family: monospace; min-height: 48px;">
                        Click Generate
                    </h2>
                    <div class="progress mb-3" style="height: 6px;">
                        <div class="progress-bar bg-danger" id="pg-strength-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-center gap-2">
                        <button class="btn btn-success" id="btn-pg-copy">
                            <i class="ri-file-copy-line align-middle me-1"></i> @lang('tools.copy_text')
                        </button>
                        <button class="btn btn-primary" id="btn-pg-generate">
                            <i class="ri-refresh-line align-middle me-1"></i> @lang('tools.pass_generate')
                        </button>
                    </div>
                </div>
            </div>

            <!-- Controles -->
            <div class="card border-0 shadow-sm bg-light">
                <div class="card-body p-4">
                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <label for="pg-length" class="form-label fw-bold mb-0">@lang('tools.pass_length')</label>
                            <span class="badge bg-primary fs-14" id="pg-length-val">16</span>
                        </div>
                        <input type="range" class="form-range" id="pg-length" min="8" max="64" value="16">
                    </div>

                    <div class="row g-3">
                        <div class="col-6">
                            <div class="form-check form-switch form-switch-lg mb-3">
                                <input class="form-check-input" type="checkbox" id="pg-uppercase" checked>
                                <label class="form-check-label" for="pg-uppercase">@lang('tools.pass_uppercase') (A-Z)</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check form-switch form-switch-lg mb-3">
                                <input class="form-check-input" type="checkbox" id="pg-lowercase" checked>
                                <label class="form-check-label" for="pg-lowercase">@lang('tools.pass_lowercase') (a-z)</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check form-switch form-switch-lg mb-3">
                                <input class="form-check-input" type="checkbox" id="pg-numbers" checked>
                                <label class="form-check-label" for="pg-numbers">@lang('tools.pass_numbers') (0-9)</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check form-switch form-switch-lg mb-3">
                                <input class="form-check-input" type="checkbox" id="pg-symbols" checked>
                                <label class="form-check-label" for="pg-symbols">@lang('tools.pass_symbols') (!@#$)</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-danger d-none mt-2 fs-14" id="pg-error-msg"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const elOutput = document.getElementById('pg-output');
    const elLength = document.getElementById('pg-length');
    const elLengthVal = document.getElementById('pg-length-val');
    const elUpper = document.getElementById('pg-uppercase');
    const elLower = document.getElementById('pg-lowercase');
    const elNumbers = document.getElementById('pg-numbers');
    const elSymbols = document.getElementById('pg-symbols');
    const elError = document.getElementById('pg-error-msg');
    const btnGenerate = document.getElementById('btn-pg-generate');
    const btnCopy = document.getElementById('btn-pg-copy');
    const strengthBar = document.getElementById('pg-strength-bar');

    const chars = {
        upper: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        lower: 'abcdefghijklmnopqrstuvwxyz',
        numbers: '0123456789',
        symbols: '!@#$%^&*()_+~`|}{[]:;?><,./-='
    };

    function generatePassword() {
        let length = parseInt(elLength.value);
        let charset = '';
        
        if (elUpper.checked) charset += chars.upper;
        if (elLower.checked) charset += chars.lower;
        if (elNumbers.checked) charset += chars.numbers;
        if (elSymbols.checked) charset += chars.symbols;

        if (charset === '') {
            elError.textContent = "@lang('tools.pass_error_charset')";
            elError.classList.remove('d-none');
            elOutput.textContent = '---';
            updateStrength(0);
            return;
        }

        elError.classList.add('d-none');
        
        let password = '';
        const array = new Uint32Array(length);
        window.crypto.getRandomValues(array);
        
        for (let i = 0; i < length; i++) {
            password += charset[array[i] % charset.length];
        }

        elOutput.textContent = password;
        updateStrength(length, elUpper.checked, elLower.checked, elNumbers.checked, elSymbols.checked);
    }

    function updateStrength(length, u, l, n, s) {
        if (length === 0) {
            strengthBar.style.width = '0%';
            strengthBar.className = 'progress-bar bg-danger';
            return;
        }
        
        let score = 0;
        if (length > 8) score += 1;
        if (length > 12) score += 1;
        if (length >= 16) score += 1;
        
        let variety = 0;
        if (u) variety++;
        if (l) variety++;
        if (n) variety++;
        if (s) variety++;

        score += (variety - 1); // Up to 3 points for variety

        let percent = 20;
        let colorClass = 'bg-danger';

        if (score >= 5) {
            percent = 100;
            colorClass = 'bg-success';
        } else if (score >= 3) {
            percent = 66;
            colorClass = 'bg-warning';
        } else {
            percent = 33;
            colorClass = 'bg-danger';
        }

        strengthBar.style.width = percent + '%';
        strengthBar.className = 'progress-bar ' + colorClass;
    }

    elLength.addEventListener('input', function() {
        elLengthVal.textContent = this.value;
        generatePassword();
    });

    elUpper.addEventListener('change', generatePassword);
    elLower.addEventListener('change', generatePassword);
    elNumbers.addEventListener('change', generatePassword);
    elSymbols.addEventListener('change', generatePassword);

    btnGenerate.addEventListener('click', generatePassword);

    btnCopy.addEventListener('click', function(e) {
        e.preventDefault();
        const content = elOutput.textContent;
        if (content && content !== '---' && content !== 'Click Generate') {
            navigator.clipboard.writeText(content).then(function() {
                const originalHTML = btnCopy.innerHTML;
                btnCopy.innerHTML = '<i class="ri-check-line align-middle me-1"></i> Copied!';
                setTimeout(() => {
                    btnCopy.innerHTML = originalHTML;
                }, 2000);
            });
        }
    });

    // Initial generate
    generatePassword();
});
</script>
