<div class="code-beautifier-minifier-wrapper">
    <div class="row g-4">
        <!-- Input & Settings -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm bg-light h-100">
                <div class="card-body p-4 d-flex flex-column justify-content-between h-100">
                    <div>
                        <!-- Select Language -->
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label for="code-lang" class="form-label fw-bold">@lang('tools.code_language')</label>
                                <select class="form-select shadow-none" id="code-lang">
                                    <option value="html" selected>HTML</option>
                                    <option value="css">CSS</option>
                                    <option value="js">JavaScript</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label type="button" class="btn btn-soft-danger btn-sm w-100 mt-4 text-center" id="btn-code-clear" style="height: 38px; display: flex; align-items: center; justify-content: center;">
                                    <i class="ri-delete-bin-line align-middle me-1"></i> @lang('tools.clear')
                                </label>
                            </div>
                        </div>

                        <!-- Input Area -->
                        <textarea class="form-control bg-white border-0 shadow-none fs-13 text-monospace" id="code-input" rows="14" placeholder="@lang('tools.code_placeholder')" style="font-family: monospace; resize: vertical;"></textarea>
                    </div>

                    <div class="row g-2 mt-3">
                        <div class="col-6">
                            <button type="button" class="btn btn-primary w-100" id="btn-code-beautify">
                                <i class="ri-align-justify align-middle me-1"></i> @lang('tools.code_beautify')
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-soft-primary w-100" id="btn-code-minify">
                                <i class="ri-skip-right-line align-middle me-1"></i> @lang('tools.code_minify')
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Output Area -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex flex-column h-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0 fw-bold text-muted">@lang('tools.url_output')</h6>
                        <button type="button" class="btn btn-success btn-sm" id="btn-code-copy">
                            <i class="ri-file-copy-line align-middle me-1"></i> @lang('tools.copy_text')
                        </button>
                    </div>
                    
                    <div class="flex-grow-1">
                        <textarea class="form-control bg-dark text-white border-0 shadow-none fs-13 text-monospace h-100" id="code-output" rows="16" readonly style="font-family: monospace; resize: vertical; min-height: 380px;"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const elLang = document.getElementById('code-lang');
    const elInput = document.getElementById('code-input');
    const elOutput = document.getElementById('code-output');
    
    const btnBeautify = document.getElementById('btn-code-beautify');
    const btnMinify = document.getElementById('btn-code-minify');
    const btnClear = document.getElementById('btn-code-clear');
    const btnCopy = document.getElementById('btn-code-copy');

    // Clean, robust client-side formatting logic
    function beautifyHTML(html) {
        let formatted = '';
        let indent = '';
        const tab = '    ';
        
        // Remove existing consecutive spaces/newlines inside tags and split
        const tokens = html.replace(/>\s*</g, '><').replace(/[\r\n]/g, '').split(/(?=<)|(?<=>)/g);
        
        tokens.forEach(token => {
            if (token.startsWith('</')) {
                // Closing tag
                indent = indent.substring(tab.length);
                formatted += indent + token + '\n';
            } else if (token.startsWith('<') && !token.endsWith('/>') && !token.startsWith('<!') && !token.startsWith('<img') && !token.startsWith('<input') && !token.startsWith('<br') && !token.startsWith('<hr') && !token.startsWith('<meta') && !token.startsWith('<link')) {
                // Opening tag (excluding self-closing & voids)
                formatted += indent + token + '\n';
                indent += tab;
            } else {
                // Text or self-closing/void tag
                formatted += indent + token + '\n';
            }
        });
        return formatted.trim();
    }

    function beautifyCSS(css) {
        let formatted = '';
        let indent = '';
        const tab = '    ';
        
        // Basic parser
        const tokens = css.replace(/\s+/g, ' ').split(/(?=\{)|(?<=\})|(?<=;)|(?<=\{)/g);
        
        tokens.forEach(token => {
            token = token.trim();
            if (!token) return;

            if (token.startsWith('}')) {
                indent = indent.substring(tab.length);
                formatted += indent + '}\n\n';
                
                // Add rest of token if any
                const rest = token.substring(1).trim();
                if (rest) {
                    formatted += indent + rest + '\n';
                }
            } else if (token.endsWith('{')) {
                formatted += indent + token + '\n';
                indent += tab;
            } else {
                formatted += indent + token + '\n';
            }
        });
        return formatted.trim();
    }

    function beautifyJS(js) {
        // Robust basic indentation scanning
        let formatted = '';
        let indent = '';
        const tab = '    ';
        
        // Tokenize around brackets and braces
        const tokens = js.replace(/[\r\n]+/g, '\n').split(/(?=\{)|(?<=\})|(?<=;)|(?<=\{)/g);
        
        tokens.forEach(token => {
            token = token.trim();
            if (!token) return;

            if (token.startsWith('}')) {
                indent = indent.substring(tab.length);
                formatted += indent + '}\n';
                
                const rest = token.substring(1).trim();
                if (rest) {
                    formatted += indent + rest + '\n';
                }
            } else if (token.endsWith('{')) {
                formatted += indent + token + '\n';
                indent += tab;
            } else {
                formatted += indent + token + '\n';
            }
        });
        return formatted.trim();
    }

    // Clean, robust client-side minifying logic
    function minifyHTML(html) {
        // Strip comments and redundant whitespaces
        return html
            .replace(/<!--[\s\S]*?-->/g, '') // strip comments
            .replace(/>\s+</g, '><')         // strip whitespaces between tags
            .replace(/\s+/g, ' ')            // consolidate multiple spaces
            .trim();
    }

    function minifyCSS(css) {
        return css
            .replace(/\/\*[\s\S]*?\*\//g, '') // strip comments
            .replace(/\s*([\{\}:;,])\s*/g, '$1') // strip whitespaces around markers
            .replace(/\s+/g, ' ')            // consolidate multiple spaces
            .trim();
    }

    function minifyJS(js) {
        return js
            .replace(/\/\*[\s\S]*?\*\//g, '') // strip block comments
            .replace(/\/\/.*/g, '')           // strip line comments
            .replace(/\s*([\{\}\(\):;,=\+\-\*\/])\s*/g, '$1') // strip whitespace around operators
            .replace(/\s+/g, ' ')            // consolidate multiple spaces
            .trim();
    }

    // Process Actions
    function processCode(action) {
        const lang = elLang.value;
        const code = elInput.value.trim();
        elOutput.value = '';

        if (!code) return;

        let result = '';
        if (action === 'beautify') {
            if (lang === 'html') result = beautifyHTML(code);
            else if (lang === 'css') result = beautifyCSS(code);
            else if (lang === 'js') result = beautifyJS(code);
        } else if (action === 'minify') {
            if (lang === 'html') result = minifyHTML(code);
            else if (lang === 'css') result = minifyCSS(code);
            else if (lang === 'js') result = minifyJS(code);
        }
        elOutput.value = result;
    }

    btnBeautify.addEventListener('click', function(e) {
        e.preventDefault();
        processCode('beautify');
    });

    btnMinify.addEventListener('click', function(e) {
        e.preventDefault();
        processCode('minify');
    });

    btnClear.addEventListener('click', function(e) {
        e.preventDefault();
        elInput.value = '';
        elOutput.value = '';
        elInput.focus();
    });

    btnCopy.addEventListener('click', function(e) {
        e.preventDefault();
        if (elOutput.value) {
            navigator.clipboard.writeText(elOutput.value).then(function() {
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
