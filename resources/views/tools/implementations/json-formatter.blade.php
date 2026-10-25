<div class="json-formatter-wrapper">
    <div class="row g-3">
        <!-- Entrada -->
        <div class="col-12 col-md-6">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="mb-0 fw-bold text-muted">@lang('tools.json_input')</h6>
                <button type="button" class="btn btn-soft-danger btn-sm" id="btn-json-clear">
                    <i class="ri-delete-bin-line align-middle me-1"></i> @lang('tools.clear')
                </button>
            </div>
            <textarea class="form-control bg-light border-0 shadow-none fs-14 text-monospace" id="json-input" rows="18" placeholder="{ &quot;key&quot;: &quot;value&quot; }" style="resize: vertical; font-family: monospace;"></textarea>
            <div class="mt-2 text-danger d-none fs-13" id="json-error-msg"></div>
            
            <div class="d-flex gap-2 mt-3">
                <button type="button" class="btn btn-primary w-100" id="btn-json-format">
                    <i class="ri-align-left align-middle me-1"></i> @lang('tools.json_format')
                </button>
                <button type="button" class="btn btn-soft-info w-100" id="btn-json-minify">
                    <i class="ri-skip-right-line align-middle me-1"></i> @lang('tools.json_minify')
                </button>
            </div>
        </div>

        <!-- Salida -->
        <div class="col-12 col-md-6">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="mb-0 fw-bold text-muted">@lang('tools.json_output')</h6>
                <button type="button" class="btn btn-success btn-sm" id="btn-json-copy">
                    <i class="ri-file-copy-line align-middle me-1"></i> @lang('tools.copy_text')
                </button>
            </div>
            <div class="bg-dark rounded p-3 h-100 overflow-auto" style="min-height: 400px; max-height: 500px;">
                <pre><code class="text-white fs-14" id="json-output" style="font-family: monospace;"></code></pre>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const inputArea = document.getElementById('json-input');
    const outputArea = document.getElementById('json-output');
    const errorMsg = document.getElementById('json-error-msg');
    const btnFormat = document.getElementById('btn-json-format');
    const btnMinify = document.getElementById('btn-json-minify');
    const btnClear = document.getElementById('btn-json-clear');
    const btnCopy = document.getElementById('btn-json-copy');

    function processJSON(action) {
        const rawValue = inputArea.value.trim();
        errorMsg.classList.add('d-none');
        errorMsg.textContent = '';
        outputArea.textContent = '';

        if (!rawValue) return;

        try {
            const parsed = JSON.parse(rawValue);
            let result = '';
            
            if (action === 'format') {
                result = JSON.stringify(parsed, null, 4);
            } else if (action === 'minify') {
                result = JSON.stringify(parsed);
            }
            
            outputArea.textContent = result;
        } catch (e) {
            errorMsg.textContent = "@lang('tools.json_error'): " + e.message;
            errorMsg.classList.remove('d-none');
            outputArea.textContent = 'Invalid JSON';
        }
    }

    btnFormat.addEventListener('click', function(e) {
        e.preventDefault();
        processJSON('format');
    });

    btnMinify.addEventListener('click', function(e) {
        e.preventDefault();
        processJSON('minify');
    });

    btnClear.addEventListener('click', function(e) {
        e.preventDefault();
        inputArea.value = '';
        outputArea.textContent = '';
        errorMsg.classList.add('d-none');
        inputArea.focus();
    });

    btnCopy.addEventListener('click', function(e) {
        e.preventDefault();
        const content = outputArea.textContent;
        if (content && content !== 'Invalid JSON') {
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
