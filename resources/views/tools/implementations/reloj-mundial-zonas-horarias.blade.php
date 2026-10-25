<div class="world-clock-wrapper py-3">
    <style>
        .clock-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.4));
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 20px;
            padding: 20px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
        }
        
        .clock-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .clock-time {
            font-size: 2.2rem;
            font-weight: 800;
            font-family: 'Outfit', 'Inter', sans-serif;
            letter-spacing: -1px;
            line-height: 1.1;
        }

        .clock-date {
            font-size: 0.85rem;
            opacity: 0.7;
            font-weight: 500;
        }

        .clock-city {
            font-size: 1.15rem;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .clock-tz {
            font-size: 0.75rem;
            opacity: 0.6;
            letter-spacing: 0.5px;
        }

        /* Day / Night gradients */
        .theme-day {
            border-left: 5px solid #f59e0b;
        }
        
        .theme-night {
            border-left: 5px solid #1e293b;
        }

        .theme-day::after {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.1) 0%, rgba(245, 158, 11, 0) 70%);
            pointer-events: none;
        }
        
        .theme-night::after {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, rgba(59, 130, 246, 0) 70%);
            pointer-events: none;
        }

        .day-badge {
            background-color: rgba(245, 158, 11, 0.12);
            color: #d97706;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 4px 8px;
            border-radius: 12px;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .night-badge {
            background-color: rgba(30, 41, 59, 0.12);
            color: #475569;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 4px 8px;
            border-radius: 12px;
            border: 1px solid rgba(30, 41, 59, 0.2);
        }

        /* Time Shifter Slider Customizations */
        .shifter-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.6));
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        }
        
        .time-slider-value {
            font-family: 'Outfit', 'Inter', sans-serif;
            font-weight: 700;
            font-size: 1.1rem;
            color: #3b82f6;
        }

        [data-bs-theme="dark"] .clock-card,
        [data-bs-theme="dark"] .shifter-card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.4), rgba(30, 41, 59, 0.2));
            border-color: rgba(255, 255, 255, 0.05);
        }
        [data-bs-theme="dark"] .night-badge {
            background-color: rgba(255, 255, 255, 0.05);
            color: #94a3b8;
            border-color: rgba(255, 255, 255, 0.1);
        }
    </style>

    <!-- Time Shifter (Planificador de Reuniones) -->
    <div class="card shifter-card border-0 p-4 mb-4">
        <div class="row align-items-center">
            <div class="col-12 col-md-4 mb-3 mb-md-0">
                <h5 class="fw-bold mb-1 text-dark">
                    <i class="ri-history-line text-primary align-middle me-1"></i> @lang('tools.clock_world')
                </h5>
                <p class="text-muted small mb-0">@lang('tools.clock_slider_help')</p>
            </div>
            <div class="col-12 col-md-5 mb-3 mb-md-0">
                <input type="range" class="form-range" id="time-shifter" min="-12" max="12" value="0" step="1">
                <div class="d-flex justify-content-between text-muted fs-11 mt-1">
                    <span>-12h</span>
                    <span class="fw-bold text-primary">Local Time (0)</span>
                    <span>+12h</span>
                </div>
            </div>
            <div class="col-12 col-md-3 text-md-end">
                <div class="d-inline-block bg-light px-3 py-2 rounded-3 border border-white-50 shadow-sm text-center w-100">
                    <small class="text-muted d-block fs-10 uppercase-tracking">Shift / Desplazamiento</small>
                    <span class="time-slider-value" id="shifter-value">0 horas</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Buscador y selector de zonas horarias -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm p-3">
                <div class="d-flex flex-wrap gap-2 align-items-center">
                    <span class="fw-semibold text-dark fs-14 me-2"><i class="ri-add-line text-success"></i> Añadir Ciudad / Timezone:</span>
                    <select class="form-select form-select-sm shadow-none w-auto flex-grow-1" id="select-timezone" style="max-width: 320px;">
                        <option value="">-- Selecciona una ciudad --</option>
                        <option value="America/Los_Angeles">Los Ángeles (PST/PDT)</option>
                        <option value="America/Bogota">Bogotá / Lima (EST)</option>
                        <option value="America/Argentina/Buenos_Aires">Buenos Aires (ART)</option>
                        <option value="America/Sao_Paulo">São Paulo (BRT)</option>
                        <option value="Europe/Paris">París / Roma (CET/CEST)</option>
                        <option value="Europe/Moscow">Moscú (MSK)</option>
                        <option value="Asia/Dubai">Dubái (GST)</option>
                        <option value="Asia/Singapore">Singapur (SGT)</option>
                        <option value="Australia/Sydney">Sídney (AEST/AEDT)</option>
                        <option value="Pacific/Auckland">Auckland (NZST/NZDT)</option>
                    </select>
                    <button class="btn btn-primary btn-sm px-3" id="btn-add-timezone">Agregar</button>
                    <button class="btn btn-outline-danger btn-sm px-3 ms-auto" id="btn-reset-clocks">Restablecer Relojes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Lista de Clocks -->
    <div class="row g-4" id="clocks-container">
        <!-- Relojes por defecto -->
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const timeShifter = document.getElementById('time-shifter');
    const shifterVal = document.getElementById('shifter-value');
    const clocksContainer = document.getElementById('clocks-container');
    const selectTz = document.getElementById('select-timezone');
    const btnAddTz = document.getElementById('btn-add-timezone');
    const btnResetClocks = document.getElementById('btn-reset-clocks');

    let shiftHours = 0;

    // Default Cities List
    let activeCities = [
        { id: 'local', name: 'Tu Hora Local', timezone: Intl.DateTimeFormat().resolvedOptions().timeZone, isDefault: true },
        { id: 'mx', name: 'Ciudad de México', timezone: 'America/Mexico_City', isDefault: true },
        { id: 'ny', name: 'Nueva York', timezone: 'America/New_York', isDefault: true },
        { id: 'lon', name: 'Londres', timezone: 'Europe/London', isDefault: true },
        { id: 'mad', name: 'Madrid', timezone: 'Europe/Madrid', isDefault: true },
        { id: 'tok', name: 'Tokio', timezone: 'Asia/Tokyo', isDefault: true }
    ];

    function saveCities() {
        localStorage.setItem('microutils_worldclocks', JSON.stringify(activeCities));
    }

    function loadCities() {
        const stored = localStorage.getItem('microutils_worldclocks');
        if (stored) {
            try {
                activeCities = JSON.parse(stored);
            } catch (e) {
                console.error(e);
            }
        }
    }

    function renderClocks() {
        clocksContainer.innerHTML = '';
        
        // Target base time offsetted by slider
        const baseDate = new Date();
        if (shiftHours !== 0) {
            baseDate.setHours(baseDate.getHours() + shiftHours);
        }

        activeCities.forEach((city, index) => {
            // Get local string for timezone
            try {
                // Formatting parts
                const formatterTime = new Intl.DateTimeFormat('es-MX', {
                    timeZone: city.timezone,
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: false
                });

                const formatterDate = new Intl.DateTimeFormat('es-MX', {
                    timeZone: city.timezone,
                    weekday: 'long',
                    day: 'numeric',
                    month: 'short'
                });

                const formattedTime = formatterTime.format(baseDate);
                const formattedDate = formatterDate.format(baseDate);

                // Determine Day / Night state based on hour
                const hourNum = parseInt(formattedTime.split(':')[0]);
                const isDay = hourNum >= 6 && hourNum < 18;
                const themeClass = isDay ? 'theme-day' : 'theme-night';
                const badgeHtml = isDay 
                    ? `<span class="day-badge"><i class="ri-sun-line align-middle me-1"></i> Día</span>` 
                    : `<span class="night-badge"><i class="ri-moon-line align-middle me-1"></i> Noche</span>`;

                // Calculate current absolute offset relative to UTC for display
                const tzFormatter = new Intl.DateTimeFormat('es-MX', {
                    timeZone: city.timezone,
                    timeZoneName: 'short'
                });
                const tzPart = tzFormatter.formatToParts(baseDate).find(p => p.type === 'timeZoneName');
                const tzName = tzPart ? tzPart.value : '';

                // Create Card element
                const col = document.createElement('div');
                col.className = 'col-12 col-md-6 col-lg-4';
                col.innerHTML = `
                    <div class="clock-card h-100 ${themeClass} d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <h5 class="clock-city text-dark mb-0">${city.name}</h5>
                                    <span class="clock-tz text-muted">${city.timezone}</span>
                                </div>
                                ${badgeHtml}
                            </div>
                            <div class="clock-time text-primary mb-2">${formattedTime}</div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-3 pt-3 border-top border-light">
                            <span class="clock-date text-muted text-capitalize">${formattedDate}</span>
                            <div class="d-flex gap-2">
                                <span class="badge bg-light text-dark border fs-10 font-monospace">${tzName}</span>
                                ${!city.isDefault ? `<button class="btn btn-link text-danger p-0 border-0 fs-14 btn-delete-city" data-index="${index}" title="Eliminar"><i class="ri-delete-bin-line"></i></button>` : ''}
                            </div>
                        </div>
                    </div>
                `;
                clocksContainer.appendChild(col);
            } catch (err) {
                console.error('Error formatting timezone: ' + city.timezone, err);
            }
        });

        // Set up delete events
        document.querySelectorAll('.btn-delete-city').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const idx = parseInt(this.getAttribute('data-index'));
                activeCities.splice(idx, 1);
                saveCities();
                renderClocks();
            });
        });
    }

    // Interval ticker to update clocks in real time if slider is at 0
    let clockTicker = setInterval(() => {
        if (shiftHours === 0) {
            renderClocks();
        }
    }, 1000);

    // Time slider shifter event
    timeShifter.addEventListener('input', function() {
        shiftHours = parseInt(this.value);
        if (shiftHours === 0) {
            shifterVal.textContent = 'Hora Local';
        } else {
            shifterVal.textContent = (shiftHours > 0 ? '+' : '') + shiftHours + ' horas';
        }
        renderClocks();
    });

    // Add new timezone
    btnAddTz.addEventListener('click', function(e) {
        e.preventDefault();
        const selectedTz = selectTz.value;
        if (!selectedTz) return;

        // Check if already exists
        const exists = activeCities.some(c => c.timezone === selectedTz);
        if (exists) return;

        // Get friendly city name from option
        const optText = selectTz.options[selectTz.selectedIndex].text;
        const cityName = optText.split(' (')[0];

        activeCities.push({
            id: 'custom_' + Date.now(),
            name: cityName,
            timezone: selectedTz,
            isDefault: false
        });

        saveCities();
        renderClocks();
        selectTz.value = '';
    });

    // Reset list to defaults
    btnResetClocks.addEventListener('click', function(e) {
        e.preventDefault();
        activeCities = [
            { id: 'local', name: 'Tu Hora Local', timezone: Intl.DateTimeFormat().resolvedOptions().timeZone, isDefault: true },
            { id: 'mx', name: 'Ciudad de México', timezone: 'America/Mexico_City', isDefault: true },
            { id: 'ny', name: 'Nueva York', timezone: 'America/New_York', isDefault: true },
            { id: 'lon', name: 'Londres', timezone: 'Europe/London', isDefault: true },
            { id: 'mad', name: 'Madrid', timezone: 'Europe/Madrid', isDefault: true },
            { id: 'tok', name: 'Tokio', timezone: 'Asia/Tokyo', isDefault: true }
        ];
        saveCities();
        shiftHours = 0;
        timeShifter.value = 0;
        shifterVal.textContent = 'Hora Local';
        renderClocks();
    });

    // Initial run
    loadCities();
    renderClocks();
});
</script>
