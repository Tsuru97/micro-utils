<div class="pomodoro-timer-wrapper py-3">
    <style>
        .pomodoro-container {
            position: relative;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 24px;
            transition: all 0.5s ease;
        }
        .pomodoro-circle-container {
            position: relative;
            width: 280px;
            height: 280px;
            margin: 0 auto;
        }
        .pomodoro-svg {
            transform: rotate(-90deg);
            width: 100%;
            height: 100%;
        }
        .pomodoro-bg-circle {
            fill: none;
            stroke: rgba(220, 225, 235, 0.3);
            stroke-width: 8;
        }
        .pomodoro-progress-circle {
            fill: none;
            stroke-width: 10;
            stroke-linecap: round;
            transition: stroke-dashoffset 0.1s linear, stroke 0.5s ease;
            filter: drop-shadow(0 0 8px var(--state-color));
        }
        .timer-display {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            width: 100%;
        }
        .timer-time {
            font-size: 3.5rem;
            font-weight: 800;
            font-family: 'Outfit', 'Inter', system-ui, -apple-system, sans-serif;
            letter-spacing: -2px;
            line-height: 1;
            transition: color 0.5s ease;
        }
        .timer-label {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 600;
            opacity: 0.8;
            margin-top: 5px;
            transition: color 0.5s ease;
        }
        .pomodoro-btn-preset {
            border: none;
            padding: 10px 18px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(230, 235, 245, 0.4);
            color: #4b5563;
        }
        .pomodoro-btn-preset.active {
            color: #ffffff !important;
            background-color: var(--state-color) !important;
            box-shadow: 0 4px 14px var(--state-glow);
            transform: translateY(-2px);
        }
        .pomodoro-btn-preset:hover:not(.active) {
            background: rgba(220, 225, 235, 0.6);
            transform: translateY(-1px);
        }
        .pomodoro-control-btn {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            border: none;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }
        .pomodoro-control-btn:hover {
            transform: scale(1.1);
        }
        .btn-play-pause {
            background-color: var(--state-color);
            color: white;
            box-shadow: 0 6px 20px var(--state-glow);
        }
        .btn-play-pause:hover {
            box-shadow: 0 8px 24px var(--state-glow);
        }
        .btn-reset {
            background-color: rgba(230, 235, 245, 0.5);
            color: #4b5563;
        }
        .btn-reset:hover {
            background-color: rgba(220, 225, 235, 0.8);
        }
        /* Custom styles based on active pomodoro state */
        :root {
            --pomo-red: #ef4444;
            --pomo-red-glow: rgba(239, 68, 68, 0.4);
            --pomo-green: #10b981;
            --pomo-green-glow: rgba(16, 185, 129, 0.4);
            --pomo-blue: #3b82f6;
            --pomo-blue-glow: rgba(59, 130, 246, 0.4);
            
            --state-color: var(--pomo-red);
            --state-glow: var(--pomo-red-glow);
        }
        
        .pomo-work-theme {
            --state-color: var(--pomo-red);
            --state-glow: var(--pomo-red-glow);
        }
        .pomo-short-theme {
            --state-color: var(--pomo-green);
            --state-glow: var(--pomo-green-glow);
        }
        .pomo-long-theme {
            --state-color: var(--pomo-blue);
            --state-glow: var(--pomo-blue-glow);
        }
        
        .theme-text-color {
            color: var(--state-color) !important;
        }
        
        /* Glass card overrides */
        .glass-card-adjust {
            background: rgba(255, 255, 255, 0.6) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.8);
        }
        
        [data-bs-theme="dark"] .glass-card-adjust {
            background: rgba(30, 41, 59, 0.4) !important;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        [data-bs-theme="dark"] .pomodoro-btn-preset {
            background: rgba(255, 255, 255, 0.05);
            color: #cbd5e1;
        }
        [data-bs-theme="dark"] .pomodoro-btn-preset:hover:not(.active) {
            background: rgba(255, 255, 255, 0.1);
        }
        [data-bs-theme="dark"] .btn-reset {
            background: rgba(255, 255, 255, 0.05);
            color: #cbd5e1;
        }
        [data-bs-theme="dark"] .btn-reset:hover {
            background: rgba(255, 255, 255, 0.1);
        }
    </style>

    <div class="row g-4" id="pomodoro-app-container">
        <!-- Panel Izquierdo: El Temporizador -->
        <div class="col-12 col-lg-7 d-flex align-items-center justify-content-center">
            <div class="card border-0 shadow-sm w-100 glass-card-adjust pomodoro-container p-4 p-md-5">
                <div class="d-flex flex-wrap gap-2 justify-content-center mb-5">
                    <button class="pomodoro-btn-preset active" data-state="work" id="btn-pomo-work">
                        <i class="ri-fire-line align-middle me-1"></i> @lang('tools.pomo_work')
                    </button>
                    <button class="pomodoro-btn-preset" data-state="short" id="btn-pomo-short">
                        <i class="ri-cup-line align-middle me-1"></i> @lang('tools.pomo_short')
                    </button>
                    <button class="pomodoro-btn-preset" data-state="long" id="btn-pomo-long">
                        <i class="ri-zzz-line align-middle me-1"></i> @lang('tools.pomo_long')
                    </button>
                </div>

                <!-- Círculo de Progreso -->
                <div class="pomodoro-circle-container mb-5">
                    <svg class="pomodoro-svg">
                        <circle class="pomodoro-bg-circle" cx="140" cy="140" r="125"></circle>
                        <circle class="pomodoro-progress-circle" cx="140" cy="140" r="125" id="pomo-circle" stroke="var(--state-color)"></circle>
                    </svg>
                    <div class="timer-display">
                        <div class="timer-time theme-text-color" id="timer-text">25:00</div>
                        <div class="timer-label text-muted" id="timer-state-label">@lang('tools.pomo_work')</div>
                    </div>
                </div>

                <!-- Controles -->
                <div class="d-flex justify-content-center align-items-center gap-4">
                    <button class="pomodoro-control-btn btn-reset" id="btn-pomo-reset" title="Reset">
                        <i class="ri-restart-line"></i>
                    </button>
                    <button class="pomodoro-control-btn btn-play-pause" id="btn-pomo-play" title="Play">
                        <i class="ri-play-fill" id="play-icon"></i>
                    </button>
                    <!-- Selector de sonido para silenciar/activar -->
                    <button class="pomodoro-control-btn btn-reset" id="btn-pomo-mute" title="Mute/Unmute">
                        <i class="ri-volume-up-line" id="mute-icon"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Panel Derecho: Ajustes y Estadísticas -->
        <div class="col-12 col-lg-5">
            <div class="card border-0 shadow-sm glass-card-adjust h-100">
                <div class="card-body p-4 p-md-5 d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="fw-bold mb-4 d-flex align-items-center text-dark">
                            <i class="ri-settings-4-line text-primary me-2"></i> @lang('tools.mi_campo_entrada')
                        </h4>
                        
                        <!-- Ajustes de Intervalos -->
                        <div class="mb-4">
                            <label for="input-work" class="form-label fw-semibold fs-14 d-flex justify-content-between">
                                <span>@lang('tools.pomo_work')</span>
                                <span class="theme-text-color" id="val-work">25 min</span>
                            </label>
                            <input type="range" class="form-range" id="input-work" min="1" max="60" value="25">
                        </div>

                        <div class="mb-4">
                            <label for="input-short" class="form-label fw-semibold fs-14 d-flex justify-content-between">
                                <span>@lang('tools.pomo_short')</span>
                                <span class="text-success" id="val-short">5 min</span>
                            </label>
                            <input type="range" class="form-range" id="input-short" min="1" max="30" value="5">
                        </div>

                        <div class="mb-4">
                            <label for="input-long" class="form-label fw-semibold fs-14 d-flex justify-content-between">
                                <span>@lang('tools.pomo_long')</span>
                                <span class="text-info" id="val-long">15 min</span>
                            </label>
                            <input type="range" class="form-range" id="input-long" min="1" max="60" value="15">
                        </div>

                        <!-- Auto-iniciar ciclos -->
                        <div class="form-check form-switch mb-4">
                            <input class="form-check-input" type="checkbox" role="switch" id="switch-auto-start">
                            <label class="form-check-label fw-semibold fs-14 text-dark" for="switch-auto-start">
                                @if(app()->getLocale() == 'es')
                                    Auto-iniciar siguiente ciclo
                                @else
                                    Auto-start next session
                                @endif
                            </label>
                        </div>

                        <!-- Selector de Sonido -->
                        <div class="mb-4">
                            <label for="select-sound" class="form-label fw-semibold fs-14 text-dark">
                                @if(app()->getLocale() == 'es')
                                    Sonido de Alerta
                                @else
                                    Alert Sound
                                @endif
                            </label>
                            <div class="input-group">
                                <select class="form-select shadow-none fs-13" id="select-sound">
                                    @if(app()->getLocale() == 'es')
                                        <option value="zen">Campana Zen (Suave)</option>
                                        <option value="digital">Alarma Digital (Pulsante)</option>
                                        <option value="retro">Campanas Retro (Doble Tono)</option>
                                        <option value="beep">Beep Clásico (Corto)</option>
                                    @else
                                        <option value="zen">Zen Chime (Soft)</option>
                                        <option value="digital">Digital Alarm (Pulsing)</option>
                                        <option value="retro">Retro Bells (Dual Tone)</option>
                                        <option value="beep">Classic Beep (Short)</option>
                                    @endif
                                </select>
                                <button class="btn btn-outline-primary" type="button" id="btn-test-sound" title="Test Sound">
                                    <i class="ri-play-mini-line align-middle"></i>
                                    @if(app()->getLocale() == 'es') Probar @else Test @endif
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Panel de sesiones completadas -->
                    <div class="bg-light p-4 rounded-4 mt-4 border border-white-50 shadow-sm">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="text-muted mb-1 fs-12 uppercase-tracking">@lang('tools.pomo_session')</h6>
                                <h3 class="fw-bold mb-0 text-dark" id="pomo-session-count">0</h3>
                            </div>
                            <div class="rounded-circle bg-white shadow-sm p-3 d-flex align-items-center justify-content-center" style="width: 52px; height: 52px;">
                                <i class="ri-trophy-line fs-24 theme-text-color"></i>
                            </div>
                        </div>
                        <div id="pomo-celebrate" class="mt-3 text-success fs-13 fw-semibold d-none">
                            <i class="ri-checkbox-circle-fill align-middle me-1"></i> @lang('tools.pomo_completed')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const pomoCircle = document.getElementById('pomo-circle');
    const timerText = document.getElementById('timer-text');
    const stateLabel = document.getElementById('timer-state-label');
    const btnPlay = document.getElementById('btn-pomo-play');
    const playIcon = document.getElementById('play-icon');
    const btnReset = document.getElementById('btn-pomo-reset');
    const btnMute = document.getElementById('btn-pomo-mute');
    const muteIcon = document.getElementById('mute-icon');
    const sessionCountText = document.getElementById('pomo-session-count');
    const celebrateAlert = document.getElementById('pomo-celebrate');
    const appContainer = document.getElementById('pomodoro-app-container');

    // Preset buttons
    const btnWork = document.getElementById('btn-pomo-work');
    const btnShort = document.getElementById('btn-pomo-short');
    const btnLong = document.getElementById('btn-pomo-long');
    const presetBtns = [btnWork, btnShort, btnLong];

    // Range Inputs
    const inputWork = document.getElementById('input-work');
    const inputShort = document.getElementById('input-short');
    const inputLong = document.getElementById('input-long');
    const valWork = document.getElementById('val-work');
    const valShort = document.getElementById('val-short');
    const valLong = document.getElementById('val-long');
    
    // New controls
    const switchAutoStart = document.getElementById('switch-auto-start');
    const selectSound = document.getElementById('select-sound');
    const btnTestSound = document.getElementById('btn-test-sound');

    // Circle properties
    const radius = pomoCircle.r.baseVal.value;
    const circumference = 2 * Math.PI * radius;
    
    // SVG Dash Array setup
    pomoCircle.style.strokeDasharray = `${circumference} ${circumference}`;
    pomoCircle.style.strokeDashoffset = 0;

    // State Variables
    let isRunning = false;
    let timerInterval = null;
    let activeState = 'work'; // work, short, long
    let totalSeconds = 25 * 60;
    let secondsLeft = totalSeconds;
    let completedSessions = 0;
    let isMuted = false;

    // Session states config
    const timeConfigs = {
        work: 25 * 60,
        short: 5 * 60,
        long: 15 * 60
    };

    // Update display values from inputs
    function syncDurations() {
        timeConfigs.work = parseInt(inputWork.value) * 60;
        timeConfigs.short = parseInt(inputShort.value) * 60;
        timeConfigs.long = parseInt(inputLong.value) * 60;
        
        valWork.textContent = `${inputWork.value} min`;
        valShort.textContent = `${inputShort.value} min`;
        valLong.textContent = `${inputLong.value} min`;

        if (!isRunning) {
            resetTimer(false); // reset without checking complete
        }
    }

    inputWork.addEventListener('input', syncDurations);
    inputShort.addEventListener('input', syncDurations);
    inputLong.addEventListener('input', syncDurations);

    function updateTheme() {
        appContainer.classList.remove('pomo-work-theme', 'pomo-short-theme', 'pomo-long-theme');
        if (activeState === 'work') {
            appContainer.classList.add('pomo-work-theme');
            stateLabel.textContent = "{{ __('tools.pomo_work') }}";
        } else if (activeState === 'short') {
            appContainer.classList.add('pomo-short-theme');
            stateLabel.textContent = "{{ __('tools.pomo_short') }}";
        } else {
            appContainer.classList.add('pomo-long-theme');
            stateLabel.textContent = "{{ __('tools.pomo_long') }}";
        }
    }

    function formatTime(secs) {
        const m = Math.floor(secs / 60);
        const s = secs % 60;
        return `${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;
    }

    function updateUI() {
        timerText.textContent = formatTime(secondsLeft);
        
        // Círculo
        const progress = secondsLeft / totalSeconds;
        const offset = circumference - (progress * circumference);
        pomoCircle.style.strokeDashoffset = offset;

        // Title update
        const stateChar = activeState === 'work' ? '🔥' : (activeState === 'short' ? '🍵' : '💤');
        document.title = `[${formatTime(secondsLeft)}] ${stateChar} Pomodoro Timer`;
    }

    function playBeep(soundType = null) {
        if (isMuted) return;
        
        // Use selected sound if not specified
        if (!soundType) {
            soundType = selectSound ? selectSound.value : 'zen';
        }

        try {
            const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
            
            // Resume AudioContext if suspended (browser security autoplay policies)
            if (audioCtx.state === 'suspended') {
                audioCtx.resume();
            }

            if (soundType === 'zen') {
                // Campana Zen (Dual tones 523.25Hz [C5] + 659.25Hz [E5] with soft fade out)
                const osc1 = audioCtx.createOscillator();
                const osc2 = audioCtx.createOscillator();
                const gainNode = audioCtx.createGain();

                osc1.type = 'sine';
                osc1.frequency.setValueAtTime(523.25, audioCtx.currentTime);
                osc2.type = 'sine';
                osc2.frequency.setValueAtTime(659.25, audioCtx.currentTime);

                gainNode.gain.setValueAtTime(0.3, audioCtx.currentTime);
                gainNode.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 1.2);

                osc1.connect(gainNode);
                osc2.connect(gainNode);
                gainNode.connect(audioCtx.destination);

                osc1.start();
                osc2.start();
                osc1.stop(audioCtx.currentTime + 1.2);
                osc2.stop(audioCtx.currentTime + 1.2);
            } 
            else if (soundType === 'digital') {
                // Alarma Digital (Pulsing high-pitched digital beeps)
                const playPulse = (startTime) => {
                    const osc = audioCtx.createOscillator();
                    const gainNode = audioCtx.createGain();
                    osc.type = 'square';
                    osc.frequency.setValueAtTime(987.77, startTime); // B5
                    
                    gainNode.gain.setValueAtTime(0.2, startTime);
                    gainNode.gain.setValueAtTime(0.2, startTime + 0.12);
                    gainNode.gain.exponentialRampToValueAtTime(0.001, startTime + 0.15);

                    osc.connect(gainNode);
                    gainNode.connect(audioCtx.destination);
                    
                    osc.start(startTime);
                    osc.stop(startTime + 0.15);
                };

                // Play 3 pulses
                playPulse(audioCtx.currentTime);
                playPulse(audioCtx.currentTime + 0.25);
                playPulse(audioCtx.currentTime + 0.50);
            } 
            else if (soundType === 'retro') {
                // Campanas Retro (Classic dual ring bells)
                const playRing = (startTime, freq) => {
                    const osc = audioCtx.createOscillator();
                    const gainNode = audioCtx.createGain();
                    osc.type = 'triangle';
                    osc.frequency.setValueAtTime(freq, startTime);
                    
                    gainNode.gain.setValueAtTime(0.3, startTime);
                    gainNode.gain.exponentialRampToValueAtTime(0.001, startTime + 0.4);

                    osc.connect(gainNode);
                    gainNode.connect(audioCtx.destination);
                    
                    osc.start(startTime);
                    osc.stop(startTime + 0.4);
                };

                playRing(audioCtx.currentTime, 880); // A5
                playRing(audioCtx.currentTime + 0.15, 1046.5); // C6
                playRing(audioCtx.currentTime + 0.35, 880);
                playRing(audioCtx.currentTime + 0.50, 1046.5);
            } 
            else if (soundType === 'beep') {
                // Classic standard quick beep
                const osc = audioCtx.createOscillator();
                const gainNode = audioCtx.createGain();
                osc.type = 'sine';
                osc.frequency.setValueAtTime(800, audioCtx.currentTime);
                
                gainNode.gain.setValueAtTime(0.25, audioCtx.currentTime);
                gainNode.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 0.2);

                osc.connect(gainNode);
                gainNode.connect(audioCtx.destination);
                
                osc.start();
                osc.stop(audioCtx.currentTime + 0.2);
            }
        } catch (e) {
            console.error('AudioContext error playing Pomodoro alert sound.', e);
        }
    }

    function startTimer() {
        if (isRunning) return;
        isRunning = true;
        playIcon.classList.replace('ri-play-fill', 'ri-pause-fill');
        btnPlay.classList.add('active');

        timerInterval = setInterval(() => {
            if (secondsLeft > 0) {
                secondsLeft--;
                updateUI();
            } else {
                clearInterval(timerInterval);
                isRunning = false;
                playIcon.classList.replace('ri-pause-fill', 'ri-play-fill');
                btnPlay.classList.remove('active');
                
                playBeep();

                const shouldAutoStartNext = switchAutoStart && switchAutoStart.checked;

                if (activeState === 'work') {
                    completedSessions++;
                    sessionCountText.textContent = completedSessions;
                    celebrateAlert.classList.remove('d-none');
                    setTimeout(() => celebrateAlert.classList.add('d-none'), 8000);
                    
                    // Auto transition to short break as standard
                    setActiveState('short');
                } else {
                    setActiveState('work');
                }

                if (shouldAutoStartNext) {
                    // Small delay to let browser process state change and give a breath
                    setTimeout(() => {
                        startTimer();
                    }, 600);
                }
            }
        }, 1000);
    }

    function pauseTimer() {
        if (!isRunning) return;
        isRunning = false;
        clearInterval(timerInterval);
        playIcon.classList.replace('ri-pause-fill', 'ri-play-fill');
        btnPlay.classList.remove('active');
    }

    function resetTimer(resetTotal = true) {
        pauseTimer();
        if (resetTotal) {
            totalSeconds = timeConfigs[activeState];
        }
        secondsLeft = totalSeconds;
        updateUI();
    }

    function setActiveState(state) {
        activeState = state;
        presetBtns.forEach(btn => {
            if (btn.getAttribute('data-state') === state) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });
        updateTheme();
        totalSeconds = timeConfigs[state];
        secondsLeft = totalSeconds;
        resetTimer(true);
    }

    // Preset button click handlers
    presetBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            setActiveState(this.getAttribute('data-state'));
        });
    });

    // Control buttons handlers
    btnPlay.addEventListener('click', function() {
        if (isRunning) {
            pauseTimer();
        } else {
            startTimer();
        }
    });

    btnReset.addEventListener('click', function() {
        resetTimer(true);
    });

    btnMute.addEventListener('click', function() {
        isMuted = !isMuted;
        if (isMuted) {
            muteIcon.classList.replace('ri-volume-up-line', 'ri-volume-mute-line');
            btnMute.classList.add('active');
        } else {
            muteIcon.classList.replace('ri-volume-mute-line', 'ri-volume-up-line');
            btnMute.classList.remove('active');
        }
    });

    // Test sound button handler
    btnTestSound.addEventListener('click', function(e) {
        e.preventDefault();
        const originalMute = isMuted;
        isMuted = false; // Bypass mute for explicit test play
        playBeep(selectSound.value);
        isMuted = originalMute;
        
        // Button response feedback
        const originalHTML = btnTestSound.innerHTML;
        btnTestSound.innerHTML = '<i class="ri-volume-up-line align-middle"></i>';
        btnTestSound.classList.replace('btn-outline-primary', 'btn-success');
        setTimeout(() => {
            btnTestSound.innerHTML = originalHTML;
            btnTestSound.classList.replace('btn-success', 'btn-outline-primary');
        }, 1200);
    });

    // Initialize UI
    setActiveState('work');
});
</script>
