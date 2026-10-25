<div class="cron-generator-wrapper py-3">
    <style>
        .cron-tab-btn {
            border: none;
            padding: 10px 16px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.2s ease;
            background: rgba(230, 235, 245, 0.4);
            color: #4b5563;
        }

        .cron-tab-btn.active {
            background-color: #3b82f6 !important;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.25);
        }

        [data-bs-theme="dark"] .cron-tab-btn {
            background: rgba(255, 255, 255, 0.05);
            color: #cbd5e1;
        }

        .cron-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(62px, 1fr));
            gap: 8px;
            max-height: 220px;
            overflow-y: auto;
            padding: 8px;
            border-radius: 12px;
            background: rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(0, 0, 0, 0.04);
        }

        [data-bs-theme="dark"] .cron-grid {
            background: rgba(255, 255, 255, 0.02);
            border-color: rgba(255, 255, 255, 0.05);
        }

        .cron-checkbox-wrapper {
            position: relative;
        }

        .cron-checkbox-input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .cron-checkbox-label {
            display: block;
            text-align: center;
            padding: 8px 4px;
            border-radius: 8px;
            background: #ffffff;
            border: 1px solid #dee2e6;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            user-select: none;
            color: #4b5563;
        }

        [data-bs-theme="dark"] .cron-checkbox-label {
            background: #1e293b;
            border-color: #334155;
            color: #cbd5e1;
        }

        .cron-checkbox-input:checked + .cron-checkbox-label {
            background-color: #3b82f6;
            border-color: #3b82f6;
            color: #ffffff;
            box-shadow: 0 2px 6px rgba(59, 130, 246, 0.2);
        }

        .cron-checkbox-input:focus + .cron-checkbox-label {
            border-color: #3b82f6;
        }

        .cron-output-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .cron-expression-display {
            font-family: 'Fira Code', 'Courier New', Courier, monospace;
            font-size: 2.2rem;
            font-weight: 800;
            letter-spacing: 2px;
            color: #3b82f6;
            line-height: 1.2;
            word-break: break-all;
        }

        .next-runs-list {
            background: rgba(0, 0, 0, 0.02);
            border-radius: 12px;
            padding: 12px 16px;
            border: 1px solid rgba(0, 0, 0, 0.04);
        }

        [data-bs-theme="dark"] .next-runs-list {
            background: rgba(255, 255, 255, 0.02);
            border-color: rgba(255, 255, 255, 0.05);
        }
    </style>

    <div class="row g-4">
        <!-- Panel Izquierdo: Constructor Visual -->
        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 p-md-5">
                    <h4 class="fw-bold mb-4 text-dark">
                        <i class="ri-settings-3-line text-primary me-2"></i> @lang('tools.mi_campo_entrada')
                    </h4>

                    <!-- Pestañas de campos de Cron -->
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <button class="cron-tab-btn active" data-tab="minutes">@lang('tools.cron_tab_minutes')</button>
                        <button class="cron-tab-btn" data-tab="hours">@lang('tools.cron_tab_hours')</button>
                        <button class="cron-tab-btn" data-tab="dom">@lang('tools.cron_tab_dom')</button>
                        <button class="cron-tab-btn" data-tab="months">@lang('tools.cron_tab_months')</button>
                        <button class="cron-tab-btn" data-tab="dow">@lang('tools.cron_tab_dow')</button>
                    </div>

                    <!-- Contenedores de pestañas -->
                    <div class="cron-tabs-content">
                        <!-- 1. Minutos -->
                        <div class="cron-tab-pane" id="pane-minutes">
                            <div class="mb-3">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="minutes-mode" id="min-all" value="*" checked>
                                    <label class="form-check-label fw-semibold text-dark" for="min-all">Todos los minutos (*)</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="minutes-mode" id="min-step" value="step">
                                    <label class="form-check-label fw-semibold text-dark" for="min-step">
                                        Cada <input type="number" class="form-control form-control-sm d-inline-block shadow-none mx-1 text-center" id="input-min-step" value="5" min="1" max="59" style="width: 54px;"> minutos (*/step)
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="minutes-mode" id="min-select" value="select">
                                    <label class="form-check-label fw-semibold text-dark" for="min-select">Seleccionar minutos específicos:</label>
                                </div>
                            </div>
                            <div class="cron-grid d-none" id="grid-minutes"></div>
                        </div>

                        <!-- 2. Horas -->
                        <div class="cron-tab-pane d-none" id="pane-hours">
                            <div class="mb-3">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="hours-mode" id="hour-all" value="*" checked>
                                    <label class="form-check-label fw-semibold text-dark" for="hour-all">Todas las horas (*)</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="hours-mode" id="hour-step" value="step">
                                    <label class="form-check-label fw-semibold text-dark" for="hour-step">
                                        Cada <input type="number" class="form-control form-control-sm d-inline-block shadow-none mx-1 text-center" id="input-hour-step" value="2" min="1" max="23" style="width: 54px;"> horas (*/step)
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="hours-mode" id="hour-select" value="select">
                                    <label class="form-check-label fw-semibold text-dark" for="hour-select">Seleccionar horas específicas:</label>
                                </div>
                            </div>
                            <div class="cron-grid d-none" id="grid-hours"></div>
                        </div>

                        <!-- 3. Días del Mes -->
                        <div class="cron-tab-pane d-none" id="pane-dom">
                            <div class="mb-3">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="dom-mode" id="dom-all" value="*" checked>
                                    <label class="form-check-label fw-semibold text-dark" for="dom-all">Todos los días del mes (*)</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="dom-mode" id="dom-select" value="select">
                                    <label class="form-check-label fw-semibold text-dark" for="dom-select">Seleccionar días específicos:</label>
                                </div>
                            </div>
                            <div class="cron-grid d-none" id="grid-dom"></div>
                        </div>

                        <!-- 4. Meses -->
                        <div class="cron-tab-pane d-none" id="pane-months">
                            <div class="mb-3">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="months-mode" id="month-all" value="*" checked>
                                    <label class="form-check-label fw-semibold text-dark" for="month-all">Todos los meses (*)</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="months-mode" id="month-select" value="select">
                                    <label class="form-check-label fw-semibold text-dark" for="month-select">Seleccionar meses específicos:</label>
                                </div>
                            </div>
                            <div class="cron-grid d-none" id="grid-months"></div>
                        </div>

                        <!-- 5. Días de la Semana -->
                        <div class="cron-tab-pane d-none" id="pane-dow">
                            <div class="mb-3">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="dow-mode" id="dow-all" value="*" checked>
                                    <label class="form-check-label fw-semibold text-dark" for="dow-all">Todos los días de la semana (*)</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="dow-mode" id="dow-select" value="select">
                                    <label class="form-check-label fw-semibold text-dark" for="dow-select">Seleccionar días de semana específicos:</label>
                                </div>
                            </div>
                            <div class="cron-grid d-none" id="grid-dow"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel Derecho: Expresión Generada y Traducción -->
        <div class="col-12 col-lg-5">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 p-md-5 d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="fw-bold mb-4 text-dark">
                            <i class="ri-code-line text-success me-2"></i> @lang('tools.mi_campo_salida')
                        </h4>

                        <!-- Expresión Cron final -->
                        <div class="text-center p-4 bg-light rounded-4 mb-4 border border-white-50 shadow-sm">
                            <small class="text-muted uppercase-tracking fs-11 fw-bold">@lang('tools.cron_expression')</small>
                            <div class="cron-expression-display my-2" id="cron-output">* * * * *</div>
                            
                            <!-- Input para decodificar manual -->
                            <div class="input-group input-group-sm mt-3 px-md-3">
                                <span class="input-group-text bg-white border-end-0 text-muted"><i class="ri-key-line"></i></span>
                                <input type="text" class="form-control border-start-0 font-monospace text-center" id="input-cron-decode" placeholder="Pegar expresión cron...">
                                <button class="btn btn-outline-primary fw-semibold" type="button" id="btn-cron-decode">Decodificar</button>
                            </div>
                        </div>

                        <!-- Traducción humana -->
                        <div class="mb-4">
                            <h6 class="fw-bold text-muted mb-2 fs-12 uppercase-tracking">@lang('tools.cron_meaning')</h6>
                            <div class="alert alert-info border-0 shadow-none fs-13 mb-0" id="cron-translation">
                                Ejecutar en cada minuto, cada hora, todos los días.
                            </div>
                        </div>

                        <!-- Próximas ejecuciones -->
                        <div>
                            <h6 class="fw-bold text-muted mb-2 fs-12 uppercase-tracking">@lang('tools.cron_next_runs')</h6>
                            <div class="next-runs-list">
                                <ul class="list-unstyled mb-0 fs-13 text-dark font-monospace" id="cron-next-list">
                                    <li>-</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de copiado -->
                    <button class="btn btn-primary w-100 py-2.5 mt-4" id="btn-copy-cron">
                        <i class="ri-file-copy-line me-1"></i> Copiar Expresión Cron
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const tabBtns = document.querySelectorAll('.cron-tab-btn');
    const panes = document.querySelectorAll('.cron-tab-pane');

    // Outputs
    const cronOutput = document.getElementById('cron-output');
    const cronTranslation = document.getElementById('cron-translation');
    const nextList = document.getElementById('cron-next-list');
    const btnCopy = document.getElementById('btn-copy-cron');

    // Decode elements
    const inputDecode = document.getElementById('input-cron-decode');
    const btnDecode = document.getElementById('btn-cron-decode');

    // State object for the 5 cron parts
    const cronState = {
        minutes: '*',
        hours: '*',
        dom: '*',
        months: '*',
        dow: '*'
    };

    // Prepopulate grids programmatically
    function buildGrid(elementId, max, start = 0, labelFormatter = null) {
        const grid = document.getElementById(elementId);
        grid.innerHTML = '';
        for (let i = start; i <= max; i++) {
            const labelText = labelFormatter ? labelFormatter(i) : i;
            const item = document.createElement('div');
            item.className = 'cron-checkbox-wrapper';
            item.innerHTML = `
                <input type="checkbox" class="cron-checkbox-input" id="chk-${elementId}-${i}" value="${i}">
                <label class="cron-checkbox-label" for="chk-${elementId}-${i}">${labelText}</label>
            `;
            grid.appendChild(item);
        }
    }

    // Build Minutes: 0 to 59
    buildGrid('grid-minutes', 59);
    // Build Hours: 0 to 23
    buildGrid('grid-hours', 23);
    // Build Days: 1 to 31
    buildGrid('grid-dom', 31, 1);
    
    // Build Months: Jan to Dec (1-12)
    const monthNames = {
        es: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        en: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    };
    const activeLang = "{{ app()->getLocale() }}" === 'es' ? 'es' : 'en';
    buildGrid('grid-months', 12, 1, (i) => monthNames[activeLang][i - 1]);
    
    // Build Days of Week: Sun to Sat (0-6)
    const dayNames = {
        es: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
        en: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
    };
    buildGrid('grid-dow', 6, 0, (i) => dayNames[activeLang][i]);

    // Handle Pane tabs switching
    tabBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            tabBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const tab = this.getAttribute('data-tab');
            panes.forEach(pane => {
                if (pane.id === 'pane-' + tab) {
                    pane.classList.remove('d-none');
                } else {
                    pane.classList.add('d-none');
                }
            });
        });
    });

    // Listen to selection modes and update grids
    function setupPaneListeners(field, gridId, modeName) {
        const radios = document.querySelectorAll(`input[name="${modeName}-mode"]`);
        const grid = document.getElementById(gridId);
        const stepInput = document.getElementById(`input-${field}-step`);

        radios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'select') {
                    grid.classList.remove('d-none');
                } else {
                    grid.classList.add('d-none');
                }
                updateState(field);
            });
        });

        if (stepInput) {
            stepInput.addEventListener('input', function() {
                // Ensure radio is checked on input modification
                document.getElementById(`${field}-step`).checked = true;
                grid.classList.add('d-none');
                updateState(field);
            });
        }

        // Listen to checkboxes updates inside grid
        grid.addEventListener('change', function() {
            updateState(field);
        });
    }

    setupPaneListeners('minutes', 'grid-minutes', 'minutes');
    setupPaneListeners('hours', 'grid-hours', 'hours');
    setupPaneListeners('dom', 'grid-dom', 'dom');
    setupPaneListeners('months', 'grid-months', 'months');
    setupPaneListeners('dow', 'grid-dow', 'dow');

    function updateState(field) {
        const mode = document.querySelector(`input[name="${field}-mode"]:checked`).value;

        if (mode === '*') {
            cronState[field] = '*';
        } 
        else if (mode === 'step') {
            const stepVal = parseInt(document.getElementById(`input-${field}-step`).value) || 1;
            cronState[field] = `*/${stepVal}`;
        } 
        else if (mode === 'select') {
            const gridId = 'grid-' + field;
            const checked = Array.from(document.querySelectorAll(`#${gridId} input:checked`)).map(c => c.value);
            if (checked.length === 0) {
                cronState[field] = '*';
            } else {
                cronState[field] = checked.join(',');
            }
        }

        renderCron();
    }

    function renderCron() {
        const expression = `${cronState.minutes} ${cronState.hours} ${cronState.dom} ${cronState.months} ${cronState.dow}`;
        cronOutput.textContent = expression;

        // Human Explanation translation
        cronTranslation.innerHTML = translateCron(cronState);

        // Next executions list
        calculateNextRuns(expression);
    }

    // Cron translator to friendly Spanish / English
    function translateCron(state) {
        let isEs = "{{ app()->getLocale() }}" === 'es';
        
        let minText = "", hourText = "", domText = "", monText = "", dowText = "";

        // Minutes
        if (state.minutes === '*') {
            minText = isEs ? "cada minuto" : "every minute";
        } else if (state.minutes.startsWith('*/')) {
            const val = state.minutes.split('/')[1];
            minText = isEs ? `cada ${val} minutos` : `every ${val} minutes`;
        } else {
            minText = isEs ? `en los minutos [${state.minutes}]` : `at minutes [${state.minutes}]`;
        }

        // Hours
        if (state.hours === '*') {
            hourText = isEs ? "cada hora" : "every hour";
        } else if (state.hours.startsWith('*/')) {
            const val = state.hours.split('/')[1];
            hourText = isEs ? `cada ${val} horas` : `every ${val} hours`;
        } else {
            hourText = isEs ? `a las horas [${state.hours}:00]` : `at hours [${state.hours}:00]`;
        }

        // Day of month
        if (state.dom === '*') {
            domText = isEs ? "todos los días del mes" : "every day of month";
        } else {
            domText = isEs ? `los días del mes [${state.dom}]` : `on days of month [${state.dom}]`;
        }

        // Month
        if (state.months === '*') {
            monText = isEs ? "todos los meses" : "every month";
        } else {
            const months = state.months.split(',').map(m => monthNames[activeLang][parseInt(m) - 1]).join(', ');
            monText = isEs ? `del mes de [${months}]` : `in months [${months}]`;
        }

        // Day of week
        if (state.dow === '*') {
            dowText = isEs ? "todos los días de la semana" : "every day of week";
        } else {
            const dows = state.dow.split(',').map(d => dayNames[activeLang][parseInt(d)]).join(', ');
            dowText = isEs ? `los [${dows}]` : `on [${dows}]`;
        }

        if (isEs) {
            return `<i class="ri-information-line me-1 fs-15 align-middle"></i> Ejecutar <strong>${minText}</strong>, <strong>${hourText}</strong>, <strong>${domText}</strong>, <strong>${monText}</strong>, <strong>${dowText}</strong>.`;
        } else {
            return `<i class="ri-information-line me-1 fs-15 align-middle"></i> Runs <strong>${minText}</strong>, <strong>${hourText}</strong>, <strong>${domText}</strong>, <strong>${monText}</strong>, <strong>${dowText}</strong>.`;
        }
    }

    // Cron date runs simulation logic
    function calculateNextRuns(cronExpr) {
        try {
            const parts = cronExpr.trim().split(/\s+/);
            if (parts.length !== 5) {
                nextList.innerHTML = '<li class="text-danger">Expresión cron no válida.</li>';
                return;
            }

            const parseField = (field, minVal, maxVal) => {
                const allowed = new Set();
                if (field === '*') {
                    for (let i = minVal; i <= maxVal; i++) allowed.add(i);
                } else if (field.includes('/')) {
                    const [range, step] = field.split('/');
                    const divisor = parseInt(step) || 1;
                    let start = minVal, end = maxVal;
                    if (range !== '*') {
                        const rangeParts = range.split('-');
                        start = parseInt(rangeParts[0]) || minVal;
                        end = rangeParts[1] ? parseInt(rangeParts[1]) : maxVal;
                    }
                    for (let i = start; i <= end; i += divisor) {
                        allowed.add(i);
                    }
                } else if (field.includes(',')) {
                    const elements = field.split(',');
                    elements.forEach(el => {
                        if (el.includes('-')) {
                            const [start, end] = el.split('-').map(Number);
                            for (let i = start; i <= end; i++) allowed.add(i);
                        } else {
                            allowed.add(Number(el));
                        }
                    });
                } else if (field.includes('-')) {
                    const [start, end] = field.split('-').map(Number);
                    for (let i = start; i <= end; i++) allowed.add(i);
                } else {
                    allowed.add(Number(field));
                }
                return allowed;
            };

            const allowedMinutes = parseField(parts[0], 0, 59);
            const allowedHours = parseField(parts[1], 0, 23);
            const allowedDom = parseField(parts[2], 1, 31);
            const allowedMonths = parseField(parts[3], 1, 12);
            const allowedDow = parseField(parts[4], 0, 7);

            const runs = [];
            let current = new Date();
            current.setSeconds(0);
            current.setMilliseconds(0);

            let safety = 0;
            while (runs.length < 5 && safety < 50000) {
                safety++;
                current.setMinutes(current.getMinutes() + 1);

                const min = current.getMinutes();
                const hr = current.getHours();
                const dom = current.getDate();
                const mon = current.getMonth() + 1;
                const dow = current.getDay(); // 0 is Sunday

                const matchesDow = allowedDow.has(dow) || (dow === 0 && allowedDow.has(7));

                if (allowedMinutes.has(min) && 
                    allowedHours.has(hr) && 
                    allowedDom.has(dom) && 
                    allowedMonths.has(mon) && 
                    matchesDow) {
                    runs.push(new Date(current.getTime()));
                }
            }

            if (runs.length === 0) {
                nextList.innerHTML = '<li class="text-warning">No se encontraron ejecuciones próximas en los siguientes meses.</li>';
            } else {
                nextList.innerHTML = runs.map(run => {
                    const formatted = run.toLocaleString(activeLang === 'es' ? 'es-MX' : 'en-US', {
                        weekday: 'short',
                        year: 'numeric',
                        month: 'short',
                        day: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit',
                        hour12: false
                    });
                    return `<li class="mb-1"><i class="ri-play-circle-line text-success align-middle me-1"></i> ${formatted}</li>`;
                }).join('');
            }
        } catch (e) {
            nextList.innerHTML = `<li class="text-danger">Error calculando fechas: ${e.message}</li>`;
        }
    }

    // Manual expression decoder
    function decodeCronString() {
        const token = inputDecode.value.trim();
        if (token === '') return;

        const parts = token.split(/\s+/);
        if (parts.length !== 5) {
            alert('Formato Cron no válido. Debe tener 5 campos (minuto, hora, día del mes, mes, día de la semana).');
            return;
        }

        // Apply decoded parts to state
        cronState.minutes = parts[0];
        cronState.hours = parts[1];
        cronState.dom = parts[2];
        cronState.months = parts[3];
        cronState.dow = parts[4];

        // Sincronizar UI de los paneles
        syncUIFromState('minutes', 'grid-minutes', 'minutes');
        syncUIFromState('hours', 'grid-hours', 'hours');
        syncUIFromState('dom', 'grid-dom', 'dom');
        syncUIFromState('months', 'grid-months', 'months');
        syncUIFromState('dow', 'grid-dow', 'dow');

        renderCron();
    }

    function syncUIFromState(field, gridId, modeName) {
        const stateVal = cronState[field];
        const grid = document.getElementById(gridId);

        // Reset check boxes
        document.querySelectorAll(`#${gridId} input`).forEach(c => c.checked = false);

        if (stateVal === '*') {
            document.getElementById(`${modeName}-all`).checked = true;
            grid.classList.add('d-none');
        } 
        else if (stateVal.startsWith('*/')) {
            document.getElementById(`${modeName}-step`).checked = true;
            document.getElementById(`input-${field}-step`).value = stateVal.split('/')[1];
            grid.classList.add('d-none');
        } 
        else {
            document.getElementById(`${modeName}-select`).checked = true;
            grid.classList.remove('d-none');
            
            // Parse and check matching checkboxes
            const vals = stateVal.split(',');
            vals.forEach(v => {
                const chk = document.getElementById(`chk-${gridId}-${v}`);
                if (chk) chk.checked = true;
            });
        }
    }

    btnDecode.addEventListener('click', decodeCronString);
    inputDecode.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') decodeCronString();
    });

    // Action handlers
    btnCopy.addEventListener('click', function(e) {
        e.preventDefault();
        const expr = cronOutput.textContent;
        navigator.clipboard.writeText(expr).then(() => {
            const origHTML = btnCopy.innerHTML;
            btnCopy.innerHTML = '<i class="ri-check-line"></i> ¡Copiado!';
            btnCopy.className = 'btn btn-success w-100 py-2.5 mt-4';
            setTimeout(() => {
                btnCopy.innerHTML = origHTML;
                btnCopy.className = 'btn btn-primary w-100 py-2.5 mt-4';
            }, 2000);
        });
    });

    // Initial render
    renderCron();
});
</script>
