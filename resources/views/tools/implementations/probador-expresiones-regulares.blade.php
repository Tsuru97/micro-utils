<div class="regex-tester-wrapper">
    <div class="row g-4">
        <!-- Input & Configuration Panel -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm bg-light h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4 text-primary">
                        <i class="ri-code-line align-middle me-1"></i> @lang('tools.mi_campo_entrada')
                    </h5>

                    <!-- Regex Pattern Input -->
                    <div class="mb-3">
                        <label for="regex-pattern" class="form-label fw-bold">@lang('tools.regex_pattern')</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-muted">/</span>
                            <input type="text" class="form-control border-start-0 border-end-0 shadow-none font-monospace" id="regex-pattern" placeholder="([a-zA-Z0-9._-]+)@([a-zA-Z0-9.-]+)" value="([a-zA-Z0-9._-]+)@([a-zA-Z0-9.-]+)" style="font-family: monospace;">
                            <span class="input-group-text bg-white border-start-0 text-muted" id="regex-flags-slash">/</span>
                        </div>
                        <div class="text-danger fs-12 mt-1 d-none" id="regex-error"></div>
                    </div>

                    <!-- Flags Checkboxes -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">@lang('tools.regex_flags')</label>
                        <div class="d-flex flex-wrap gap-3 p-3 bg-white rounded border border-light">
                            <div class="form-check">
                                <input class="form-check-input shadow-none" type="checkbox" id="flag-g" checked>
                                <label class="form-check-label" for="flag-g" title="@lang('tools.regex_flags_global')"><strong>g</strong> (global)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input shadow-none" type="checkbox" id="flag-i" checked>
                                <label class="form-check-label" for="flag-i" title="@lang('tools.regex_flags_insensitive')"><strong>i</strong> (insensitive)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input shadow-none" type="checkbox" id="flag-m">
                                <label class="form-check-label" for="flag-m" title="@lang('tools.regex_flags_multiline')"><strong>m</strong> (multiline)</label>
                            </div>
                        </div>
                    </div>

                    <!-- Test Text Area -->
                    <div class="mb-0">
                        <label for="regex-text" class="form-label fw-bold">@lang('tools.regex_test_text')</label>
                        <textarea class="form-control shadow-none font-monospace" id="regex-text" rows="8" placeholder="Escribe tu texto de prueba aquí para analizar..." style="font-family: monospace;">Hola, puedes contactar al soporte de MicroUtils en support@microutils.com o escribir directamente a info@example.org. ¡Gracias!</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Highlight & Matches Results Panel -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-3 text-primary">
                            <i class="ri-eye-line align-middle me-1"></i> @lang('tools.regex_matches')
                        </h5>

                        <!-- Match Highlight Box -->
                        <label class="form-label fw-bold text-muted fs-13">Visualización y Resaltado</label>
                        <div id="regex-highlight-view" class="form-control bg-light border-0 shadow-inner mb-4 overflow-auto font-monospace" style="height: 180px; white-space: pre-wrap; font-family: monospace; line-height: 1.5;"></div>

                        <!-- Match Details / Groups -->
                        <label class="form-label fw-bold text-muted fs-13">@lang('tools.regex_groups')</label>
                        <div id="regex-matches-list" class="overflow-auto border border-light rounded-3 bg-white mb-0" style="height: 200px; max-height: 200px;">
                            <!-- Swatches / Lists injected here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.regex-tester-wrapper mark.regex-match {
    background-color: rgba(13, 110, 253, 0.25) !important;
    border-bottom: 2px solid #0d6efd !important;
    color: inherit !important;
    padding: 1px 2px !important;
    border-radius: 2px !important;
}
.regex-tester-wrapper mark.regex-match:nth-of-type(even) {
    background-color: rgba(25, 135, 84, 0.25) !important;
    border-bottom-color: #198754 !important;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const elPattern = document.getElementById('regex-pattern');
    const flagG = document.getElementById('flag-g');
    const flagI = document.getElementById('flag-i');
    const flagM = document.getElementById('flag-m');
    const elText = document.getElementById('regex-text');
    const elError = document.getElementById('regex-error');
    const flagSlash = document.getElementById('regex-flags-slash');

    const outHighlight = document.getElementById('regex-highlight-view');
    const outMatches = document.getElementById('regex-matches-list');

    function escapeHtml(text) {
        return text
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    function runRegex() {
        const pattern = elPattern.value;
        const textVal = elText.value;
        
        // Assemble flags
        let flags = '';
        if (flagG.checked) flags += 'g';
        if (flagI.checked) flags += 'i';
        if (flagM.checked) flags += 'm';

        flagSlash.textContent = '/' + flags;
        elError.classList.add('d-none');
        elError.textContent = '';

        if (!pattern) {
            outHighlight.textContent = textVal;
            outMatches.innerHTML = `<div class="text-center text-muted p-4"><i class="ri-edit-line d-block fs-24 opacity-50 mb-2"></i>@lang('tools.regex_no_matches')</div>`;
            return;
        }

        try {
            const regex = new RegExp(pattern, flags);
            
            // Perform match highlights
            let htmlHighlight = '';
            let matchesFound = [];

            if (flags.includes('g')) {
                let match;
                let lastIndex = 0;
                
                // Safety logic to prevent infinite loop on zero-width match expressions (like /a*/)
                let iterations = 0;
                const maxIterations = 5000;

                while ((match = regex.exec(textVal)) !== null && iterations < maxIterations) {
                    iterations++;

                    const start = match.index;
                    const end = regex.lastIndex;

                    // Append skipped text
                    htmlHighlight += escapeHtml(textVal.substring(lastIndex, start));

                    // Append wrapped match
                    const matchText = textVal.substring(start, end);
                    htmlHighlight += `<mark class="regex-match" data-index="${matchesFound.length}">${escapeHtml(matchText)}</mark>`;
                    
                    matchesFound.push({
                        text: matchText,
                        index: start,
                        groups: match.slice(1)
                    });

                    lastIndex = end;

                    // Prevent infinite loops if regex doesn't progress (zero-width match)
                    if (match.index === regex.lastIndex) {
                        regex.lastIndex++;
                    }
                }
                
                // Append remaining text
                htmlHighlight += escapeHtml(textVal.substring(lastIndex));
            } else {
                // Non-global execution
                const match = regex.exec(textVal);
                if (match) {
                    const start = match.index;
                    const end = start + match[0].length;
                    
                    htmlHighlight = escapeHtml(textVal.substring(0, start)) + 
                                    `<mark class="regex-match" data-index="0">${escapeHtml(match[0])}</mark>` + 
                                    escapeHtml(textVal.substring(end));
                    
                    matchesFound.push({
                        text: match[0],
                        index: start,
                        groups: match.slice(1)
                    });
                } else {
                    htmlHighlight = escapeHtml(textVal);
                }
            }

            outHighlight.innerHTML = htmlHighlight;

            // Render details/groups list
            if (matchesFound.length === 0) {
                outMatches.innerHTML = `<div class="text-center text-muted p-4"><i class="ri-close-circle-line d-block fs-24 opacity-50 mb-2"></i>@lang('tools.regex_no_matches')</div>`;
            } else {
                let htmlList = '<div class="list-group list-group-flush">';
                matchesFound.forEach((match, index) => {
                    let groupsStr = '';
                    if (match.groups && match.groups.length > 0) {
                        groupsStr = '<div class="mt-2 fs-12">';
                        match.groups.forEach((g, gIdx) => {
                            const cleanG = g ? escapeHtml(g) : '<span class="text-muted italic">undefined</span>';
                            groupsStr += `<div><span class="badge bg-secondary-subtle text-secondary me-1">Grupo ${gIdx + 1}:</span> <code>${cleanG}</code></div>`;
                        });
                        groupsStr += '</div>';
                    }

                    htmlList += `
                        <div class="list-group-item p-3 border-light">
                            <div class="d-flex justify-content-between align-items-start">
                                <span class="badge bg-primary text-white">Coincidencia ${index + 1}</span>
                                <span class="fs-11 text-muted fw-bold">Índice: ${match.index}</span>
                            </div>
                            <div class="mt-1 font-monospace text-dark bg-light p-2 rounded mt-2 border border-light" style="font-family: monospace; white-space: pre-wrap; font-size: 13px;">${escapeHtml(match.text)}</div>
                            ${groupsStr}
                        </div>
                    `;
                });
                htmlList += '</div>';
                outMatches.innerHTML = htmlList;
            }

        } catch (err) {
            elError.classList.remove('d-none');
            elError.textContent = "@lang('tools.regex_invalid')" + err.message;
            outHighlight.innerHTML = escapeHtml(textVal);
            outMatches.innerHTML = `<div class="text-center text-danger p-4"><i class="ri-alert-line d-block fs-24 mb-2"></i>@lang('tools.regex_invalid') ${escapeHtml(err.message)}</div>`;
        }
    }

    // Attach listeners
    [elPattern, elText].forEach(el => el.addEventListener('input', runRegex));
    [flagG, flagI, flagM].forEach(el => el.addEventListener('change', runRegex));

    // Run once at start
    runRegex();
});
</script>
