<div class="json-csv-converter-wrapper">
    <!-- Navigation Tabs -->
    <ul class="nav nav-tabs nav-tabs-custom nav-success mb-4" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#json-to-csv-tab" role="tab" id="tab-json-csv">
                <i class="ri-file-code-line align-middle me-1"></i> @lang('tools.conv_tab_json_csv')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#csv-to-json-tab" role="tab" id="tab-csv-json">
                <i class="ri-file-list-line align-middle me-1"></i> @lang('tools.conv_tab_csv_json')
            </a>
        </li>
    </ul>

    <div class="tab-content text-muted">
        <!-- JSON to CSV Tab -->
        <div class="tab-pane active" id="json-to-csv-tab" role="tabpanel">
            <div class="row g-4">
                <div class="col-12 col-lg-6">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0 fw-bold text-muted">Entrada JSON</h6>
                        <button type="button" class="btn btn-soft-danger btn-sm" id="btn-j2c-clear">
                            <i class="ri-delete-bin-line align-middle me-1"></i> @lang('tools.clear')
                        </button>
                    </div>
                    <textarea class="form-control bg-light border-0 shadow-none fs-13 text-monospace mb-3" id="json-input-area" rows="14" placeholder="@lang('tools.conv_json_placeholder')" style="font-family: monospace; resize: vertical;"></textarea>
                    
                    <button type="button" class="btn btn-primary w-100" id="btn-convert-j2c">
                        <i class="ri-arrow-right-left-line align-middle me-1"></i> Convertir a CSV
                    </button>
                    <div class="alert alert-danger border-0 shadow-none bg-danger-subtle mt-3 mb-0 d-none" id="j2c-error-box">
                        <i class="ri-error-warning-line label-icon align-middle fs-16 me-2"></i>
                        <span>@lang('tools.conv_invalid_json')</span>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0 fw-bold text-muted">Salida CSV</h6>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-success btn-sm" id="btn-j2c-copy">
                                <i class="ri-file-copy-line align-middle me-1"></i> @lang('tools.copy_text')
                            </button>
                            <button type="button" class="btn btn-soft-success btn-sm" id="btn-j2c-download">
                                <i class="ri-download-line align-middle me-1"></i> Descargar
                            </button>
                        </div>
                    </div>
                    <textarea class="form-control bg-dark text-white border-0 shadow-none fs-13 text-monospace mb-3" id="csv-output-area" rows="14" readonly style="font-family: monospace; resize: vertical;"></textarea>

                    <!-- Preview area -->
                    <div class="d-none" id="preview-container">
                        <h6 class="fw-bold text-muted mb-2"><i class="ri-table-2 me-1 align-middle text-primary"></i> @lang('tools.conv_preview') (Primeros 5 registros)</h6>
                        <div class="table-responsive bg-light rounded p-2" style="max-height: 200px;">
                            <table class="table table-sm table-striped table-bordered mb-0 bg-white fs-12" id="preview-table"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CSV to JSON Tab -->
        <div class="tab-pane" id="csv-to-json-tab" role="tabpanel">
            <div class="row g-4">
                <div class="col-12 col-lg-6">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0 fw-bold text-muted">Entrada CSV</h6>
                        <button type="button" class="btn btn-soft-danger btn-sm" id="btn-c2j-clear">
                            <i class="ri-delete-bin-line align-middle me-1"></i> @lang('tools.clear')
                        </button>
                    </div>
                    <textarea class="form-control bg-light border-0 shadow-none fs-13 text-monospace mb-3" id="csv-input-area" rows="14" placeholder="@lang('tools.conv_csv_placeholder')" style="font-family: monospace; resize: vertical;"></textarea>

                    <div class="row g-2">
                        <div class="col-6">
                            <select class="form-select shadow-none" id="json-indentation">
                                <option value="2" selected>Indentar: 2 espacios</option>
                                <option value="4">Indentar: 4 espacios</option>
                                <option value="minify">Minificado (Línea única)</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-primary w-100" id="btn-convert-c2j">
                                <i class="ri-arrow-right-left-line align-middle me-1"></i> Convertir a JSON
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0 fw-bold text-muted">Salida JSON</h6>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-success btn-sm" id="btn-c2j-copy">
                                <i class="ri-file-copy-line align-middle me-1"></i> @lang('tools.copy_text')
                            </button>
                            <button type="button" class="btn btn-soft-success btn-sm" id="btn-c2j-download">
                                <i class="ri-download-line align-middle me-1"></i> Descargar
                            </button>
                        </div>
                    </div>
                    <textarea class="form-control bg-dark text-white border-0 shadow-none fs-13 text-monospace" id="json-output-area" rows="16" readonly style="font-family: monospace; resize: vertical;"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // JSON to CSV
    const inJson = document.getElementById('json-input-area');
    const outCsv = document.getElementById('csv-output-area');
    const errJ2C = document.getElementById('j2c-error-box');
    const btnJ2C = document.getElementById('btn-convert-j2c');
    const btnJ2CClear = document.getElementById('btn-j2c-clear');
    const btnJ2CCopy = document.getElementById('btn-j2c-copy');
    const btnJ2CDownload = document.getElementById('btn-j2c-download');
    const previewContainer = document.getElementById('preview-container');
    const previewTable = document.getElementById('preview-table');

    // CSV to JSON
    const inCsv = document.getElementById('csv-input-area');
    const outJson = document.getElementById('json-output-area');
    const btnC2J = document.getElementById('btn-convert-c2j');
    const btnC2JClear = document.getElementById('btn-c2j-clear');
    const btnC2JCopy = document.getElementById('btn-c2j-copy');
    const btnC2JDownload = document.getElementById('btn-c2j-download');
    const jsonIndent = document.getElementById('json-indentation');

    // Flat utility to support nested object keys (e.g. {user: {name: 'Ana'}} -> {'user.name': 'Ana'})
    function flattenObject(ob) {
        const toReturn = {};
        for (const i in ob) {
            if (!ob.hasOwnProperty(i)) continue;
            if ((typeof ob[i]) === 'object' && ob[i] !== null) {
                const flatObject = flattenObject(ob[i]);
                for (const x in flatObject) {
                    if (!flatObject.hasOwnProperty(x)) continue;
                    toReturn[i + '.' + x] = flatObject[x];
                }
            } else {
                toReturn[i] = ob[i];
            }
        }
        return toReturn;
    }

    // JSON to CSV conversion
    function processJSONtoCSV() {
        errJ2C.classList.add('d-none');
        previewContainer.classList.add('d-none');
        outCsv.value = '';
        const raw = inJson.value.trim();
        if (!raw) return;

        try {
            let parsed = JSON.parse(raw);
            if (!Array.isArray(parsed)) {
                // If it's a single object, wrap it in an array
                if (typeof parsed === 'object' && parsed !== null) {
                    parsed = [parsed];
                } else {
                    throw new Error("Must be an array");
                }
            }

            const flatArray = parsed.map(obj => flattenObject(obj));
            
            // Extract all unique headers
            const headerSet = new Set();
            flatArray.forEach(obj => {
                Object.keys(obj).forEach(h => headerSet.add(h));
            });
            const headers = Array.from(headerSet);

            // Construct CSV rows
            const csvRows = [];
            csvRows.push(headers.map(h => `"${h.replace(/"/g, '""')}"`).join(','));

            flatArray.forEach(obj => {
                const row = headers.map(h => {
                    const val = obj[h] !== undefined && obj[h] !== null ? String(obj[h]) : '';
                    return `"${val.replace(/"/g, '""')}"`;
                });
                csvRows.push(row.join(','));
            });

            const csvString = csvRows.join('\n');
            outCsv.value = csvString;

            // Generate Table Preview for the first 5 records
            generateTablePreview(headers, flatArray.slice(0, 5));
        } catch (e) {
            errJ2C.classList.remove('d-none');
        }
    }

    function generateTablePreview(headers, data) {
        previewTable.innerHTML = '';
        
        // Header
        const thead = document.createElement('thead');
        const trHead = document.createElement('tr');
        headers.forEach(h => {
            const th = document.createElement('th');
            th.textContent = h;
            trHead.appendChild(th);
        });
        thead.appendChild(trHead);
        previewTable.appendChild(thead);

        // Body
        const tbody = document.createElement('tbody');
        data.forEach(obj => {
            const tr = document.createElement('tr');
            headers.forEach(h => {
                const td = document.createElement('td');
                td.textContent = obj[h] !== undefined ? obj[h] : '';
                tr.appendChild(td);
            });
            tbody.appendChild(tr);
        });
        previewTable.appendChild(tbody);

        previewContainer.classList.remove('d-none');
    }

    // CSV to JSON Parser (RFC 4180 compliant)
    function parseCSV(text) {
        const lines = [];
        let row = [""];
        let inQuotes = false;

        for (let i = 0; i < text.length; i++) {
            const c = text[i];
            const next = text[i+1];

            if (c === '"') {
                if (inQuotes && next === '"') {
                    row[row.length - 1] += '"'; // escaped quote
                    i++;
                } else {
                    inQuotes = !inQuotes; // toggle quote state
                }
            } else if (c === ',') {
                if (inQuotes) {
                    row[row.length - 1] += c;
                } else {
                    row.push("");
                }
            } else if (c === '\r' || c === '\n') {
                if (inQuotes) {
                    row[row.length - 1] += c;
                } else {
                    if (c === '\r' && next === '\n') {
                        i++;
                    }
                    lines.push(row);
                    row = [""];
                }
            } else {
                row[row.length - 1] += c;
            }
        }
        if (row.length > 1 || row[0] !== "") {
            lines.push(row);
        }
        return lines;
    }

    function processCSVtoJSON() {
        outJson.value = '';
        const raw = inCsv.value.trim();
        if (!raw) return;

        try {
            const rows = parseCSV(raw);
            if (rows.length < 2) return;

            const headers = rows[0].map(h => h.trim());
            const jsonData = [];

            for (let i = 1; i < rows.length; i++) {
                const row = rows[i];
                if (row.length === 0 || (row.length === 1 && row[0] === "")) continue;

                const obj = {};
                headers.forEach((h, index) => {
                    const val = row[index] !== undefined ? row[index] : '';
                    
                    // Auto-parse numbers or booleans if applicable
                    if (val.toLowerCase() === 'true') {
                        obj[h] = true;
                    } else if (val.toLowerCase() === 'false') {
                        obj[h] = false;
                    } else if (!isNaN(val) && val.trim() !== '') {
                        obj[h] = Number(val);
                    } else {
                        obj[h] = val;
                    }
                });
                jsonData.push(obj);
            }

            const indent = jsonIndent.value;
            let result = '';
            if (indent === 'minify') {
                result = JSON.stringify(jsonData);
            } else {
                result = JSON.stringify(jsonData, null, parseInt(indent));
            }
            outJson.value = result;
        } catch (e) {
            outJson.value = "Error parsing CSV: " + e.message;
        }
    }

    // JSON to CSV Bindings
    btnJ2C.addEventListener('click', processJSONtoCSV);
    btnJ2CClear.addEventListener('click', function(e) {
        e.preventDefault();
        inJson.value = '';
        outCsv.value = '';
        errJ2C.classList.add('d-none');
        previewContainer.classList.add('d-none');
    });

    btnJ2CCopy.addEventListener('click', function(e) {
        e.preventDefault();
        if (outCsv.value) {
            navigator.clipboard.writeText(outCsv.value).then(function() {
                const originalHTML = btnJ2CCopy.innerHTML;
                btnJ2CCopy.innerHTML = '<i class="ri-check-line align-middle me-1"></i> Copied!';
                setTimeout(() => {
                    btnJ2CCopy.innerHTML = originalHTML;
                }, 2000);
            });
        }
    });

    btnJ2CDownload.addEventListener('click', function(e) {
        e.preventDefault();
        if (!outCsv.value) return;
        const blob = new Blob([outCsv.value], { type: "text/csv;charset=utf-8" });
        const url = URL.createObjectURL(blob);
        const a = document.createElement("a");
        a.href = url;
        a.download = "converted-data.csv";
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    });

    // CSV to JSON Bindings
    btnC2J.addEventListener('click', processCSVtoJSON);
    btnC2JClear.addEventListener('click', function(e) {
        e.preventDefault();
        inCsv.value = '';
        outJson.value = '';
    });

    btnC2JCopy.addEventListener('click', function(e) {
        e.preventDefault();
        if (outJson.value) {
            navigator.clipboard.writeText(outJson.value).then(function() {
                const originalHTML = btnC2JCopy.innerHTML;
                btnC2JCopy.innerHTML = '<i class="ri-check-line align-middle me-1"></i> Copied!';
                setTimeout(() => {
                    btnC2JCopy.innerHTML = originalHTML;
                }, 2000);
            });
        }
    });

    btnC2JDownload.addEventListener('click', function(e) {
        e.preventDefault();
        if (!outJson.value) return;
        const blob = new Blob([outJson.value], { type: "application/json;charset=utf-8" });
        const url = URL.createObjectURL(blob);
        const a = document.createElement("a");
        a.href = url;
        a.download = "converted-data.json";
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    });
});
</script>
