<div class="readability-analyzer-wrapper py-3">
    <style>
        .score-card {
            border-radius: 16px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        .score-value {
            font-size: 2.5rem;
            font-weight: 800;
            font-family: 'Outfit', 'Inter', sans-serif;
            letter-spacing: -1px;
            line-height: 1;
        }
        .score-level-badge {
            font-size: 0.75rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-block;
        }
        .level-very-easy {
            background-color: rgba(16, 185, 129, 0.12);
            color: #10b981;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }
        .level-easy {
            background-color: rgba(59, 130, 246, 0.12);
            color: #3b82f6;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }
        .level-normal {
            background-color: rgba(245, 158, 11, 0.12);
            color: #d97706;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }
        .level-hard {
            background-color: rgba(239, 68, 68, 0.12);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }
        
        .stat-value {
            font-size: 1.6rem;
            font-weight: 700;
            color: #1e293b;
            font-family: 'Outfit', 'Inter', sans-serif;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 14px;
            padding: 12px 16px;
        }
        
        [data-bs-theme="dark"] .stat-card {
            background: rgba(255, 255, 255, 0.02);
            border-color: rgba(255, 255, 255, 0.05);
        }
        [data-bs-theme="dark"] .stat-value {
            color: #f1f5f9;
        }
    </style>

    <div class="row g-4">
        <!-- Panel Izquierdo: Campo de texto -->
        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 p-md-5 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="fw-bold mb-0 text-dark">
                                <i class="ri-article-line text-primary me-2"></i> @lang('tools.mi_campo_entrada')
                            </h4>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-light border" id="btn-load-demo">
                                    <i class="ri-magic-line text-warning"></i> Cargar Ejemplo
                                </button>
                                <button class="btn btn-sm btn-outline-secondary" id="btn-clear-text">
                                    @lang('tools.clear')
                                </button>
                            </div>
                        </div>

                        <div class="mb-4">
                            <textarea class="form-control shadow-none font-monospace fs-14" id="analyzer-text" rows="12" placeholder="@lang('tools.type_or_paste_here')"></textarea>
                        </div>
                    </div>

                    <!-- Estadísticas de conteo base -->
                    <div class="row g-3">
                        <div class="col-4">
                            <div class="stat-card text-center">
                                <small class="text-muted d-block mb-1">@lang('tools.read_words')</small>
                                <span class="stat-value" id="count-words">0</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-card text-center">
                                <small class="text-muted d-block mb-1">@lang('tools.read_sentences')</small>
                                <span class="stat-value" id="count-sentences">0</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-card text-center">
                                <small class="text-muted d-block mb-1">@lang('tools.read_syllables')</small>
                                <span class="stat-value" id="count-syllables">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel Derecho: Resultados de legibilidad -->
        <div class="col-12 col-lg-5">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 p-md-5">
                    <h4 class="fw-bold mb-4 text-dark">
                        <i class="ri-bar-chart-box-line text-success me-2"></i> @lang('tools.mi_campo_salida')
                    </h4>

                    <!-- 1. Fernández-Huerta (Para Español) -->
                    <div class="score-card p-4 mb-4 bg-light border border-white-50 shadow-sm">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0 text-dark">@lang('tools.read_score_fh')</h6>
                            <span class="score-level-badge level-normal" id="badge-fh">Normal</span>
                        </div>
                        <div class="score-value text-primary mb-3" id="score-fh">0.00</div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-primary" id="progress-fh" role="progressbar" style="width: 0%"></div>
                        </div>
                        <small class="text-muted d-block" id="desc-fh">Fórmula adaptada al español de lectura.</small>
                    </div>

                    <!-- 2. Szigriszt-Pazos (Para Español) -->
                    <div class="score-card p-4 mb-4 bg-light border border-white-50 shadow-sm">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0 text-dark">@lang('tools.read_score_sp')</h6>
                            <span class="score-level-badge level-normal" id="badge-sp">Normal</span>
                        </div>
                        <div class="score-value text-success mb-3" id="score-sp">0.00</div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-success" id="progress-sp" role="progressbar" style="width: 0%"></div>
                        </div>
                        <small class="text-muted d-block" id="desc-sp">Mide la comprensibilidad y facilidad del lenguaje.</small>
                    </div>

                    <!-- 3. Flesch-Kincaid Grade Level (General/Inglés) -->
                    <div class="score-card p-4 bg-light border border-white-50 shadow-sm">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0 text-dark">@lang('tools.read_score_fk')</h6>
                            <span class="score-level-badge level-easy" id="badge-fk">Grado 8</span>
                        </div>
                        <div class="score-value text-info mb-3" id="score-fk">0.00</div>
                        <div class="progress mb-2" style="height: 6px;">
                            <div class="progress-bar bg-info" id="progress-fk" role="progressbar" style="width: 0%"></div>
                        </div>
                        <small class="text-muted d-block" id="desc-fk">Equivalente al nivel educativo requerido en años escolares.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const elText = document.getElementById('analyzer-text');
    const btnLoad = document.getElementById('btn-load-demo');
    const btnClear = document.getElementById('btn-clear-text');

    // Stats
    const countWords = document.getElementById('count-words');
    const countSentences = document.getElementById('count-sentences');
    const countSyllables = document.getElementById('count-syllables');

    // FH elements
    const scoreFh = document.getElementById('score-fh');
    const badgeFh = document.getElementById('badge-fh');
    const progressFh = document.getElementById('progress-fh');
    const descFh = document.getElementById('desc-fh');

    // SP elements
    const scoreSp = document.getElementById('score-sp');
    const badgeSp = document.getElementById('badge-sp');
    const progressSp = document.getElementById('progress-sp');
    const descSp = document.getElementById('desc-sp');

    // FK elements
    const scoreFk = document.getElementById('score-fk');
    const badgeFk = document.getElementById('badge-fk');
    const progressFk = document.getElementById('progress-fk');
    const descFk = document.getElementById('desc-fk');

    const demoText = `La accesibilidad web consiste en diseñar plataformas digitales que puedan ser utilizadas por cualquier persona, independientemente de sus capacidades físicas o cognitivas. Cuando creamos código limpio y estructurado de forma correcta, mejoramos enormemente la experiencia del usuario y optimizamos los tiempos de carga del sitio. Esto permite que personas que usan lectores de pantalla puedan entender perfectamente el contenido. ¡El diseño inclusivo es una responsabilidad de todos los desarrolladores modernos!`;

    // Pure JavaScript heuristic for syllable counting in Spanish
    // Based on diphthongs, triphthongs, open/closed vowels
    function countSyllablesSpanishWord(word) {
        word = word.toLowerCase().trim();
        // Remove trailing punctuation marks
        word = word.replace(/[^a-záéíóúüñ]/g, '');
        if (word.length === 0) return 0;
        if (word.length <= 2) return 1;

        // Vowels classification
        // Open/Strong: a, e, o, á, é, ó
        // Closed/Weak: i, u, ü, í, ú
        const isVowel = char => 'aeiouyáéíóúü'.includes(char);
        const isOpen = char => 'aeoáéó'.includes(char);
        const isClosedAccented = char => 'íú'.includes(char);

        let syllables = 0;
        let i = 0;
        const len = word.length;

        while (i < len) {
            if (isVowel(word[i])) {
                syllables++;
                // Handle diphthongs and triphthongs
                if (i + 1 < len && isVowel(word[i + 1])) {
                    const v1 = word[i];
                    const v2 = word[i + 1];

                    // Strong + Strong = Hiatus (creates new syllable, so we don't skip)
                    if (isOpen(v1) && isOpen(v2)) {
                        // separate syllables
                    } else if (isClosedAccented(v1) || isClosedAccented(v2)) {
                        // Hiatus due to accent on weak vowel
                        // separate syllables
                    } else {
                        // Diphthong (same syllable, skip the second vowel)
                        i++;

                        // Check for triphthong (e.g. iai, uei)
                        if (i + 1 < len && isVowel(word[i + 1])) {
                            const v3 = word[i + 1];
                            if (!isOpen(v3) && !isClosedAccented(v3)) {
                                i++; // Skip third vowel
                            }
                        }
                    }
                }
            }
            i++;
        }

        return syllables > 0 ? syllables : 1;
    }

    // Heuristic for English syllable count
    function countSyllablesEnglishWord(word) {
        word = word.toLowerCase().trim().replace(/[^a-z]/g, '');
        if (word.length === 0) return 0;
        if (word.length <= 3) return 1;
        
        // Remove silent 'e' at end
        if (word.endsWith('e')) {
            word = word.slice(0, -1);
        }
        
        // Count vowel groups
        const matches = word.match(/[aeiouy]+/g);
        let count = matches ? matches.length : 0;
        
        // Adjust common suffixes
        if (word.endsWith('ed') && !word.endsWith('ted') && !word.endsWith('ded')) {
            count--;
        }
        if (word.endsWith('es') && !word.endsWith('ces') && !word.endsWith('ses') && !word.endsWith('xes') && !word.endsWith('zes') && !word.endsWith('ches') && !word.endsWith('shes')) {
            count--;
        }
        
        return count > 0 ? count : 1;
    }

    function analyzeText() {
        const text = elText.value.trim();
        if (text === '') {
            resetStats();
            return;
        }

        // 1. Sentences count
        // Match sentence terminators (. ! ?)
        const sentencesMatches = text.match(/[^.!?]+([.!?]+|$)/g);
        const sentencesCount = sentencesMatches ? sentencesMatches.filter(s => s.trim().length > 2).length : 1;

        // 2. Words count
        // Filter out punctuation and empty strings
        const wordsArr = text.split(/\s+/).map(w => w.replace(/[^a-zA-Z0-9áéíóúüñÁÉÍÓÚÜÑ]/g, '')).filter(w => w.length > 0);
        const wordsCount = wordsArr.length;

        if (wordsCount === 0) {
            resetStats();
            return;
        }

        // Detect language simple heuristic (check common spanish words vs english words)
        const isSpanish = text.toLowerCase().match(/\b(el|la|los|las|de|en|y|o|un|una|que|con|por)\b/i) !== null;

        // 3. Syllables count
        let syllablesCount = 0;
        wordsArr.forEach(word => {
            if (isSpanish) {
                syllablesCount += countSyllablesSpanishWord(word);
            } else {
                syllablesCount += countSyllablesEnglishWord(word);
            }
        });

        // Set basic counts
        countWords.textContent = wordsCount;
        countSentences.textContent = sentencesCount;
        countSyllables.textContent = syllablesCount;

        // Averages
        const wordsPerSentence = wordsCount / sentencesCount;
        const syllablesPerWord = syllablesCount / wordsCount;
        const syllablesPer100Words = syllablesPerWord * 100;

        // Formulas
        // A. Fernandez-Huerta: 206.84 - (0.60 * P) - (1.02 * F)
        // where P = syllables per 100 words, F = words per sentence
        let fhVal = 206.84 - (0.60 * syllablesPer100Words) - (1.02 * wordsPerSentence);
        if (fhVal < 0) fhVal = 0;
        if (fhVal > 100) fhVal = 100;

        // B. Szigriszt-Pazos: 206.84 - 62.33 * (Syllables / Words) - (Words / Sentences)
        let spVal = 206.84 - 62.33 * (syllablesCount / wordsCount) - (wordsCount / sentencesCount);
        if (spVal < 0) spVal = 0;
        if (spVal > 100) spVal = 100;

        // C. Flesch-Kincaid Grade Level: 0.39 * (words/sentences) + 11.8 * (syllables/words) - 15.59
        let fkVal = 0.39 * wordsPerSentence + 11.8 * syllablesPerWord - 15.59;
        if (fkVal < 0) fkVal = 0;

        // Display results
        scoreFh.textContent = fhVal.toFixed(2);
        scoreSp.textContent = spVal.toFixed(2);
        scoreFk.textContent = fkVal.toFixed(1);

        progressFh.style.width = `${fhVal}%`;
        progressSp.style.width = `${spVal}%`;
        
        // Flesch Kincaid progress relative to grade 18
        let fkProgress = (fkVal / 18) * 100;
        if (fkProgress > 100) fkProgress = 100;
        progressFk.style.width = `${fkProgress}%`;

        // Classification
        // FH Levels
        if (fhVal >= 80) {
            badgeFh.className = 'score-level-badge level-very-easy';
            badgeFh.textContent = "{{ __('tools.read_difficulty_veasy') }}";
            descFh.textContent = "Lectura muy fluida, comprensible para niños de primaria.";
        } else if (fhVal >= 60) {
            badgeFh.className = 'score-level-badge level-easy';
            badgeFh.textContent = "{{ __('tools.read_difficulty_easy') }}";
            descFh.textContent = "Lectura fácil, estilo periodístico o narrativa ligera.";
        } else if (fhVal >= 50) {
            badgeFh.className = 'score-level-badge level-normal';
            badgeFh.textContent = "{{ __('tools.read_difficulty_normal') }}";
            descFh.textContent = "Lectura estándar, requiere educación secundaria media.";
        } else if (fhVal >= 30) {
            badgeFh.className = 'score-level-badge level-hard';
            badgeFh.textContent = "{{ __('tools.read_difficulty_hard') }}";
            descFh.textContent = "Lectura difícil, textos técnicos, académicos o especializados.";
        } else {
            badgeFh.className = 'score-level-badge level-hard';
            badgeFh.textContent = "{{ __('tools.read_difficulty_vhard') }}";
            descFh.textContent = "Lectura muy compleja, científica o de nivel universitario.";
        }

        // SP Levels
        if (spVal >= 85) {
            badgeSp.className = 'score-level-badge level-very-easy';
            badgeSp.textContent = "{{ __('tools.read_difficulty_veasy') }}";
            descSp.textContent = "Texto extremadamente simple, asimilable de inmediato.";
        } else if (spVal >= 70) {
            badgeSp.className = 'score-level-badge level-easy';
            badgeSp.textContent = "{{ __('tools.read_difficulty_easy') }}";
            descSp.textContent = "Texto fácil de comprender, apto para difusión masiva.";
        } else if (spVal >= 50) {
            badgeSp.className = 'score-level-badge level-normal';
            badgeSp.textContent = "{{ __('tools.read_difficulty_normal') }}";
            descSp.textContent = "Comprensión normal, estilo de noticias y blogs habituales.";
        } else if (spVal >= 35) {
            badgeSp.className = 'score-level-badge level-hard';
            badgeSp.textContent = "{{ __('tools.read_difficulty_hard') }}";
            descSp.textContent = "Complejidad media-alta. Recomendado para profesionales.";
        } else {
            badgeSp.className = 'score-level-badge level-hard';
            badgeSp.textContent = "{{ __('tools.read_difficulty_vhard') }}";
            descSp.textContent = "Complejo de asimilar. Prosa científica o legislativa densa.";
        }

        // FK Levels (Grades)
        if (fkVal <= 6) {
            badgeFk.className = 'score-level-badge level-very-easy';
            badgeFk.textContent = `Grado ${fkVal.toFixed(0)} (Básico)`;
            descFk.textContent = "Texto descifrable por alumnos de escuela elemental básica.";
        } else if (fkVal <= 10) {
            badgeFk.className = 'score-level-badge level-easy';
            badgeFk.textContent = `Grado ${fkVal.toFixed(0)} (Medio)`;
            descFk.textContent = "Adecuado para adolescentes de escuela secundaria estándar.";
        } else if (fkVal <= 14) {
            badgeFk.className = 'score-level-badge level-normal';
            badgeFk.textContent = `Grado ${fkVal.toFixed(0)} (Avanzado)`;
            descFk.textContent = "Texto propicio para estudiantes de preparatoria o técnicos.";
        } else {
            badgeFk.className = 'score-level-badge level-hard';
            badgeFk.textContent = `Grado ${fkVal.toFixed(0)}+ (Académico)`;
            descFk.textContent = "Prosa de alta complejidad, típica de literatura universitaria.";
        }
    }

    function resetStats() {
        countWords.textContent = '0';
        countSentences.textContent = '0';
        countSyllables.textContent = '0';
        scoreFh.textContent = '0.00';
        scoreSp.textContent = '0.00';
        scoreFk.textContent = '0.00';
        progressFh.style.width = '0%';
        progressSp.style.width = '0%';
        progressFk.style.width = '0%';
        badgeFh.className = 'score-level-badge level-normal';
        badgeFh.textContent = 'Normal';
        badgeSp.className = 'score-level-badge level-normal';
        badgeSp.textContent = 'Normal';
        badgeFk.className = 'score-level-badge level-easy';
        badgeFk.textContent = 'Grado 0';
        descFh.textContent = "Introduce texto para analizar.";
        descSp.textContent = "Introduce texto para analizar.";
        descFk.textContent = "Introduce texto para analizar.";
    }

    elText.addEventListener('input', analyzeText);

    btnLoad.addEventListener('click', function(e) {
        e.preventDefault();
        elText.value = demoText;
        analyzeText();
    });

    btnClear.addEventListener('click', function(e) {
        e.preventDefault();
        elText.value = '';
        resetStats();
    });
});
</script>
