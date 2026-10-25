<div class="url-encoder-decoder-wrapper">
    <div class="row g-4">
        <!-- Input Textarea -->
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm bg-light h-100">
                <div class="card-body p-4 d-flex flex-column h-100">
                    <label for="url-input" class="form-label fw-bold">@lang('tools.url_input')</label>
                    <div class="flex-grow-1 mb-3">
                        <textarea class="form-control bg-white border-0 shadow-none fs-14 text-monospace" id="url-input" rows="12" placeholder="@lang('tools.url_placeholder')" style="resize: vertical; font-family: monospace;"></textarea>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-primary w-100" id="btn-url-encode">
                            <i class="ri-lock-line align-middle me-1"></i> @lang('tools.url_encode')
                        </button>
                        <button type="button" class="btn btn-soft-info w-100" id="btn-url-decode">
                            <i class="ri-lock-unlock-line align-middle me-1"></i> @lang('tools.url_decode')
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Output Textarea -->
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex flex-column h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0 fw-bold text-muted">@lang('tools.url_output')</h6>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-soft-danger btn-sm" id="btn-url-clear">
                                <i class="ri-delete-bin-line align-middle me-1"></i> @lang('tools.clear')
                            </button>
                            <button type="button" class="btn btn-success btn-sm" id="btn-url-copy">
                                <i class="ri-file-copy-line align-middle me-1"></i> @lang('tools.copy_text')
                            </button>
                        </div>
                    </div>
                    
                    <div class="flex-grow-1 position-relative">
                        <textarea class="form-control bg-light border-0 shadow-none fs-14 text-monospace h-100" id="url-output" rows="12" readonly style="resize: vertical; font-family: monospace;"></textarea>
                    </div>
                    <div class="alert alert-danger border-0 shadow-none bg-danger-subtle mt-3 mb-0 d-none" id="url-error-box">
                        <i class="ri-error-warning-line label-icon align-middle fs-16 me-2"></i>
                        <span id="url-error-msg">@lang('tools.url_error')</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const elInput = document.getElementById('url-input');
    const elOutput = document.getElementById('url-output');
    const errorBox = document.getElementById('url-error-box');
    const btnEncode = document.getElementById('btn-url-encode');
    const btnDecode = document.getElementById('btn-url-decode');
    const btnClear = document.getElementById('btn-url-clear');
    const btnCopy = document.getElementById('btn-url-copy');

    function processURL(action) {
        const rawValue = elInput.value;
        errorBox.classList.add('d-none');
        elOutput.value = '';

        if (!rawValue) return;

        try {
            let result = '';
            if (action === 'encode') {
                result = encodeURIComponent(rawValue).replace(/[!'()*]/g, function(c) {
                    return '%' + c.charCodeAt(0).toString(16).toUpperCase();
                });
            } else if (action === 'decode') {
                result = decodeURIComponent(rawValue.replace(/\+/g, ' '));
            }
            elOutput.value = result;
        } catch (e) {
            errorBox.classList.remove('d-none');
        }
    }

    btnEncode.addEventListener('click', function(e) {
        e.preventDefault();
        processURL('encode');
    });

    btnDecode.addEventListener('click', function(e) {
        e.preventDefault();
        processURL('decode');
    });

    btnClear.addEventListener('click', function(e) {
        e.preventDefault();
        elInput.value = '';
        elOutput.value = '';
        errorBox.classList.add('d-none');
        elInput.focus();
    });

    btnCopy.addEventListener('click', function(e) {
        e.preventDefault();
        const content = elOutput.value;
        if (content) {
            navigator.clipboard.writeText(content).then(function() {
                const originalHTML = btnCopy.innerHTML;
                btnCopy.innerHTML = '<i class="ri-check-line align-middle me-1"></i> Copied!';
                setTimeout(() => {
                    btnCopy.innerHTML = originalHTML;
                }, 2000);
            });
        }
    });
});
</script>
