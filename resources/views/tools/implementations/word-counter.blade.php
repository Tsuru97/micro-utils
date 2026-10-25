<div class="word-counter-wrapper">
    <!-- Top Stats Cards -->
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3 mb-4 text-center">
        <div class="col">
            <div class="card border border-primary shadow-none h-100">
                <div class="card-body py-3">
                    <h3 class="text-primary fw-bold mb-1" id="wc-words">0</h3>
                    <p class="text-muted mb-0 fs-13">@lang('tools.words_count')</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border border-success shadow-none h-100">
                <div class="card-body py-3">
                    <h3 class="text-success fw-bold mb-1" id="wc-chars">0</h3>
                    <p class="text-muted mb-0 fs-13">@lang('tools.characters_count')</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border border-warning shadow-none h-100">
                <div class="card-body py-3">
                    <h3 class="text-warning fw-bold mb-1" id="wc-chars-no-space">0</h3>
                    <p class="text-muted mb-0 fs-13">@lang('tools.chars_no_spaces')</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border border-info shadow-none h-100">
                <div class="card-body py-3">
                    <h3 class="text-info fw-bold mb-1" id="wc-reading-time">0 <span class="fs-14 fw-normal">min</span></h3>
                    <p class="text-muted mb-0 fs-13">@lang('tools.reading_time')</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border border-secondary shadow-none h-100">
                <div class="card-body py-3">
                    <h3 class="text-secondary fw-bold mb-1" id="wc-speaking-time">0 <span class="fs-14 fw-normal">min</span></h3>
                    <p class="text-muted mb-0 fs-13">@lang('tools.speaking_time')</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Transformation Toolbar -->
    <div class="d-flex flex-wrap gap-2 mb-2 bg-white p-2 rounded border border-light">
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-ghost-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="ri-text-wrap align-middle me-1"></i> @lang('tools.transform')
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" id="wc-btn-upper">@lang('tools.uppercase')</a></li>
                <li><a class="dropdown-item" href="#" id="wc-btn-lower">@lang('tools.lowercase')</a></li>
                <li><a class="dropdown-item" href="#" id="wc-btn-title">@lang('tools.title_case')</a></li>
                <li><a class="dropdown-item" href="#" id="wc-btn-sentence">@lang('tools.sentence_case')</a></li>
            </ul>
        </div>
        
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-ghost-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="ri-eraser-line align-middle me-1"></i> @lang('tools.clean')
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" id="wc-btn-clean-spaces">@lang('tools.remove_extra_spaces')</a></li>
                <li><a class="dropdown-item" href="#" id="wc-btn-clean-lines">@lang('tools.remove_line_breaks')</a></li>
                <li><a class="dropdown-item" href="#" id="wc-btn-clean-html">@lang('tools.remove_html')</a></li>
            </ul>
        </div>
    </div>

    <!-- Text Area -->
    <div class="mb-3">
        <textarea class="form-control bg-light border-0 shadow-none fs-15" id="wc-input" rows="12" placeholder="@lang('tools.type_or_paste_here')" style="resize: vertical;"></textarea>
    </div>

    <!-- Bottom Toolbar -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
            <span class="badge badge-soft-secondary fs-13"><span id="wc-sentences">0</span> @lang('tools.sentences')</span>
            <span class="badge badge-soft-secondary fs-13 ms-1"><span id="wc-paragraphs">0</span> @lang('tools.paragraphs')</span>
        </div>
        <div>
            <button type="button" class="btn btn-soft-danger btn-sm" id="wc-btn-clear">
                <i class="ri-delete-bin-line align-middle me-1"></i> @lang('tools.clear')
            </button>
            <button type="button" class="btn btn-primary btn-sm ms-2" id="wc-btn-copy">
                <i class="ri-file-copy-line align-middle me-1"></i> @lang('tools.copy_text')
            </button>
            <button type="button" class="btn btn-success btn-sm ms-2" id="wc-btn-download">
                <i class="ri-download-line align-middle me-1"></i> @lang('tools.download_txt')
            </button>
        </div>
    </div>

    <!-- Keyword Density Section -->
    <div class="mt-5 d-none" id="keyword-density-container">
        <h5 class="fs-15 fw-bold mb-3"><i class="ri-bar-chart-2-line text-primary align-middle me-1"></i> @lang('tools.keyword_density')</h5>
        
        <!-- Tabs -->
        <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#density-1" role="tab">
                    @lang('tools.1_word')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#density-2" role="tab">
                    @lang('tools.2_words')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#density-3" role="tab">
                    @lang('tools.3_words')
                </a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content text-muted">
            <!-- 1 Word -->
            <div class="tab-pane active" id="density-1" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-sm table-borderless align-middle mb-0">
                        <thead class="table-light text-muted">
                            <tr>
                                <th scope="col" style="width: 50%;">@lang('tools.word')</th>
                                <th scope="col" style="width: 25%;" class="text-center">@lang('tools.count')</th>
                                <th scope="col" style="width: 25%;" class="text-end">@lang('tools.percentage')</th>
                            </tr>
                        </thead>
                        <tbody id="wc-density-1-tbody"></tbody>
                    </table>
                </div>
            </div>
            <!-- 2 Words -->
            <div class="tab-pane" id="density-2" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-sm table-borderless align-middle mb-0">
                        <thead class="table-light text-muted">
                            <tr>
                                <th scope="col" style="width: 50%;">@lang('tools.word')</th>
                                <th scope="col" style="width: 25%;" class="text-center">@lang('tools.count')</th>
                                <th scope="col" style="width: 25%;" class="text-end">@lang('tools.percentage')</th>
                            </tr>
                        </thead>
                        <tbody id="wc-density-2-tbody"></tbody>
                    </table>
                </div>
            </div>
            <!-- 3 Words -->
            <div class="tab-pane" id="density-3" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-sm table-borderless align-middle mb-0">
                        <thead class="table-light text-muted">
                            <tr>
                                <th scope="col" style="width: 50%;">@lang('tools.word')</th>
                                <th scope="col" style="width: 25%;" class="text-center">@lang('tools.count')</th>
                                <th scope="col" style="width: 25%;" class="text-end">@lang('tools.percentage')</th>
                            </tr>
                        </thead>
                        <tbody id="wc-density-3-tbody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const textInput = document.getElementById('wc-input');
    const outWords = document.getElementById('wc-words');
    const outChars = document.getElementById('wc-chars');
    const outCharsNoSpace = document.getElementById('wc-chars-no-space');
    const outReadingTime = document.getElementById('wc-reading-time');
    const outSpeakingTime = document.getElementById('wc-speaking-time');
    const outSentences = document.getElementById('wc-sentences');
    const outParagraphs = document.getElementById('wc-paragraphs');
    
    const densityContainer = document.getElementById('keyword-density-container');
    const density1Tbody = document.getElementById('wc-density-1-tbody');
    const density2Tbody = document.getElementById('wc-density-2-tbody');
    const density3Tbody = document.getElementById('wc-density-3-tbody');

    const btnClear = document.getElementById('wc-btn-clear');
    const btnCopy = document.getElementById('wc-btn-copy');
    const btnDownload = document.getElementById('wc-btn-download');

    // Transformation Buttons
    document.getElementById('wc-btn-upper').addEventListener('click', e => { e.preventDefault(); textInput.value = textInput.value.toUpperCase(); updateStats(); });
    document.getElementById('wc-btn-lower').addEventListener('click', e => { e.preventDefault(); textInput.value = textInput.value.toLowerCase(); updateStats(); });
    document.getElementById('wc-btn-title').addEventListener('click', e => { 
        e.preventDefault(); 
        textInput.value = textInput.value.toLowerCase().replace(/(?:^|\s)\w/g, function(match) {
            return match.toUpperCase();
        });
        updateStats(); 
    });
    document.getElementById('wc-btn-sentence').addEventListener('click', e => { 
        e.preventDefault(); 
        textInput.value = textInput.value.toLowerCase().replace(/(^\s*\w|[\.\!\?]\s*\w)/g, function(c) {
            return c.toUpperCase();
        });
        updateStats(); 
    });

    // Clean Buttons
    document.getElementById('wc-btn-clean-spaces').addEventListener('click', e => { e.preventDefault(); textInput.value = textInput.value.replace(/ +/g, ' ').trim(); updateStats(); });
    document.getElementById('wc-btn-clean-lines').addEventListener('click', e => { e.preventDefault(); textInput.value = textInput.value.replace(/[\r\n]+/g, ' ').trim(); updateStats(); });
    document.getElementById('wc-btn-clean-html').addEventListener('click', e => { e.preventDefault(); textInput.value = textInput.value.replace(/<[^>]*>?/gm, ''); updateStats(); });

    // Stop Words
    const stopWords = new Set([
        'a', 'about', 'above', 'after', 'again', 'against', 'all', 'am', 'an', 'and', 'any', 'are', 'aren\'t', 'as', 'at', 'be', 'because', 'been', 'before', 'being', 'below', 'between', 'both', 'but', 'by', 'can\'t', 'cannot', 'could', 'couldn\'t', 'did', 'didn\'t', 'do', 'does', 'doesn\'t', 'doing', 'don\'t', 'down', 'during', 'each', 'few', 'for', 'from', 'further', 'had', 'hadn\'t', 'has', 'hasn\'t', 'have', 'haven\'t', 'having', 'he', 'he\'d', 'he\'ll', 'he\'s', 'her', 'here', 'here\'s', 'hers', 'herself', 'him', 'himself', 'his', 'how', 'how\'s', 'i', 'i\'d', 'i\'ll', 'i\'m', 'i\'ve', 'if', 'in', 'into', 'is', 'isn\'t', 'it', 'it\'s', 'its', 'itself', 'let\'s', 'me', 'more', 'most', 'mustn\'t', 'my', 'myself', 'no', 'nor', 'not', 'of', 'off', 'on', 'once', 'only', 'or', 'other', 'ought', 'our', 'ours', 'ourselves', 'out', 'over', 'own', 'same', 'shan\'t', 'she', 'she\'d', 'she\'ll', 'she\'s', 'should', 'shouldn\'t', 'so', 'some', 'such', 'than', 'that', 'that\'s', 'the', 'their', 'theirs', 'them', 'themselves', 'then', 'there', 'there\'s', 'these', 'they', 'they\'d', 'they\'ll', 'they\'re', 'they\'ve', 'this', 'those', 'through', 'to', 'too', 'under', 'until', 'up', 'very', 'was', 'wasn\'t', 'we', 'we\'d', 'we\'ll', 'we\'re', 'we\'ve', 'were', 'weren\'t', 'what', 'what\'s', 'when', 'when\'s', 'where', 'where\'s', 'which', 'while', 'who', 'who\'s', 'whom', 'why', 'why\'s', 'with', 'won\'t', 'would', 'wouldn\'t', 'you', 'you\'d', 'you\'ll', 'you\'re', 'you\'ve', 'your', 'yours', 'yourself', 'yourselves',
        'de', 'la', 'que', 'el', 'en', 'y', 'a', 'los', 'del', 'se', 'las', 'por', 'un', 'para', 'con', 'no', 'una', 'su', 'al', 'lo', 'como', 'más', 'pero', 'sus', 'le', 'ya', 'o', 'este', 'sí', 'porque', 'esta', 'entre', 'cuando', 'muy', 'sin', 'sobre', 'también', 'me', 'hasta', 'hay', 'donde', 'quien', 'desde', 'todo', 'nos', 'durante', 'todos', 'uno', 'les', 'ni', 'contra', 'otros', 'ese', 'eso', 'ante', 'ellos', 'e', 'esto', 'mí', 'antes', 'algunos', 'qué', 'unos', 'yo', 'otro', 'otras', 'otra', 'él', 'tanto', 'esa', 'estos', 'mucho', 'quienes', 'nada', 'muchos', 'cual', 'poco', 'ella', 'estar', 'estas', 'algunas', 'algo', 'nosotros', 'mi', 'mis', 'tú', 'te', 'ti', 'tu', 'tus', 'ellas', 'nosotras', 'vosotros', 'vosotras', 'os', 'mío', 'mía', 'míos', 'mías', 'tuyo', 'tuya', 'tuyos', 'tuyas', 'suyo', 'suya', 'suyos', 'suyas', 'nuestro', 'nuestra', 'nuestros', 'nuestras', 'vuestro', 'vuestra', 'vuestros', 'vuestras', 'esos', 'esas', 'aquel', 'aquella', 'aquellos', 'aquellas', 'esto', 'eso', 'aquello'
    ]);

    function cleanWord(word) {
        return word.toLowerCase().replace(/[^a-záéíóúüñ0-9]/g, '');
    }

    function getNGrams(wordsArray, n) {
        if(wordsArray.length < n) return [];
        let counts = {};
        
        for (let i = 0; i <= wordsArray.length - n; i++) {
            let gramWords = wordsArray.slice(i, i + n);
            let cleanedWords = gramWords.map(w => cleanWord(w));
            
            // Validate: ignore if first or last word is a stop word or very short
            if (n > 1) {
                if (stopWords.has(cleanedWords[0]) || stopWords.has(cleanedWords[n-1])) continue;
                if (cleanedWords[0].length < 2 || cleanedWords[n-1].length < 2) continue;
            } else {
                if (stopWords.has(cleanedWords[0]) || cleanedWords[0].length < 3) continue;
            }

            let gramStr = cleanedWords.join(' ');
            if (gramStr.trim() !== '') {
                counts[gramStr] = (counts[gramStr] || 0) + 1;
            }
        }

        let totalGrams = Object.values(counts).reduce((a, b) => a + b, 0) || 1;
        let sortable = [];
        for (let gram in counts) {
            sortable.push({ word: gram, count: counts[gram], percent: ((counts[gram] / totalGrams) * 100).toFixed(1) });
        }

        return sortable.sort((a, b) => b.count - a.count).slice(0, 10);
    }

    function renderTable(tbody, data) {
        tbody.innerHTML = '';
        if(data.length === 0) {
            tbody.innerHTML = '<tr><td colspan="3" class="text-center text-muted">No data</td></tr>';
            return;
        }
        data.forEach(item => {
            let tr = document.createElement('tr');
            tr.innerHTML = `
                <td class="fw-medium">${item.word}</td>
                <td class="text-center"><span class="badge text-bg-primary">${item.count}</span></td>
                <td class="text-end text-muted">${item.percent}%</td>
            `;
            tbody.appendChild(tr);
        });
    }

    function updateStats() {
        let text = textInput.value;
        
        // Characters
        let chars = text.length;
        let charsNoSpace = text.replace(/\s+/g, '').length;
        
        // Words (split by whitespace)
        let wordsArray = text.trim() === '' ? [] : text.trim().split(/\s+/);
        let words = text.trim() === '' ? 0 : wordsArray.length;
        
        // Sentences & Paragraphs
        let sentences = text.trim() === '' ? 0 : text.split(/[.!?]+/).filter(s => s.trim().length > 0).length;
        let paragraphs = text.trim() === '' ? 0 : text.split(/\n+/).filter(p => p.trim().length > 0).length;
        
        // Times
        let readingTime = Math.ceil(words / 225); // 225 wpm silent reading
        let speakingTime = Math.ceil(words / 150); // 150 wpm speaking aloud
        if(words === 0) { readingTime = 0; speakingTime = 0; }

        // Update DOM
        outWords.textContent = words;
        outChars.textContent = chars;
        outCharsNoSpace.textContent = charsNoSpace;
        outReadingTime.innerHTML = readingTime + ' <span class="fs-14 fw-normal">min</span>';
        outSpeakingTime.innerHTML = speakingTime + ' <span class="fs-14 fw-normal">min</span>';
        outSentences.textContent = sentences;
        outParagraphs.textContent = paragraphs;

        // Keyword Density
        if (words > 0) {
            densityContainer.classList.remove('d-none');
            renderTable(density1Tbody, getNGrams(wordsArray, 1));
            renderTable(density2Tbody, getNGrams(wordsArray, 2));
            renderTable(density3Tbody, getNGrams(wordsArray, 3));
        } else {
            densityContainer.classList.add('d-none');
        }
    }

    textInput.addEventListener('input', updateStats);

    btnClear.addEventListener('click', function() {
        textInput.value = '';
        updateStats();
        textInput.focus();
    });

    btnCopy.addEventListener('click', function() {
        if(textInput.value.length > 0) {
            navigator.clipboard.writeText(textInput.value).then(function() {
                let originalText = btnCopy.innerHTML;
                btnCopy.innerHTML = '<i class="ri-check-line align-middle me-1"></i> Copied!';
                btnCopy.classList.replace('btn-primary', 'btn-success');
                setTimeout(() => {
                    btnCopy.innerHTML = originalText;
                    btnCopy.classList.replace('btn-success', 'btn-primary');
                }, 2000);
            });
        }
    });

    btnDownload.addEventListener('click', function() {
        if(textInput.value.length > 0) {
            const blob = new Blob([textInput.value], { type: 'text/plain' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'microutils-text.txt';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }
    });

    // Initialize with 0
    updateStats();
});
</script>

