<div class="lorem-generator-wrapper">
    <div class="row g-4">
        <!-- Controls -->
        <div class="col-12 col-md-5">
            <div class="card border-0 shadow-sm bg-light h-100">
                <div class="card-body p-4">
                    <!-- Type Selector -->
                    <div class="mb-3">
                        <label for="lorem-type" class="form-label fw-bold">@lang('tools.lorem_num')</label>
                        <div class="input-group">
                            <input type="number" class="form-control shadow-none" id="lorem-count" min="1" max="100" value="5" aria-label="Quantity">
                            <select class="form-select shadow-none" id="lorem-type" style="max-width: 150px;">
                                <option value="paragraphs" selected>@lang('tools.lorem_paragraphs')</option>
                                <option value="sentences">@lang('tools.lorem_sentences')</option>
                                <option value="words">@lang('tools.lorem_words')</option>
                            </select>
                        </div>
                    </div>

                    <!-- Range Slider for fun visualization -->
                    <div class="mb-4">
                        <input type="range" class="form-range" id="lorem-slider" min="1" max="50" value="5">
                    </div>

                    <!-- Options Switches -->
                    <div class="mb-4">
                        <div class="form-check form-switch form-switch-lg mb-3">
                            <input class="form-check-input" type="checkbox" id="lorem-start-standard" checked>
                            <label class="form-check-label" for="lorem-start-standard">@lang('tools.lorem_start')</label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" id="lorem-html-tags">
                            <label class="form-check-label" for="lorem-html-tags">@lang('tools.lorem_html')</label>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary w-100" id="btn-lorem-generate">
                        <i class="ri-refresh-line align-middle me-1"></i> @lang('tools.lorem_generate')
                    </button>
                </div>
            </div>
        </div>

        <!-- Output -->
        <div class="col-12 col-md-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex flex-column h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0 fw-bold text-muted">@lang('tools.url_output')</h6>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-soft-danger btn-sm" id="btn-lorem-clear">
                                <i class="ri-delete-bin-line align-middle me-1"></i> @lang('tools.clear')
                            </button>
                            <button type="button" class="btn btn-success btn-sm" id="btn-lorem-copy">
                                <i class="ri-file-copy-line align-middle me-1"></i> @lang('tools.copy_text')
                            </button>
                            <button type="button" class="btn btn-soft-success btn-sm" id="btn-lorem-download">
                                <i class="ri-download-line align-middle me-1"></i> @lang('tools.download_txt')
                            </button>
                        </div>
                    </div>
                    <div class="flex-grow-1 bg-light rounded p-3 overflow-auto" style="min-height: 250px; max-height: 400px;">
                        <div id="lorem-output" class="text-muted fs-14" style="white-space: pre-wrap; line-height: 1.6;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const elCount = document.getElementById('lorem-count');
    const elSlider = document.getElementById('lorem-slider');
    const elType = document.getElementById('lorem-type');
    const elStartStandard = document.getElementById('lorem-start-standard');
    const elHtmlTags = document.getElementById('lorem-html-tags');
    const elOutput = document.getElementById('lorem-output');
    const btnGenerate = document.getElementById('btn-lorem-generate');
    const btnClear = document.getElementById('btn-lorem-clear');
    const btnCopy = document.getElementById('btn-lorem-copy');
    const btnDownload = document.getElementById('btn-lorem-download');

    // Words vocabulary pool for random generation
    const loremWords = [
        "lorem", "ipsum", "dolor", "sit", "amet", "consectetur", "adipiscing", "elit", 
        "sed", "do", "eiusmod", "tempor", "incididunt", "ut", "labore", "et", "dolore", 
        "magna", "aliqua", "ut", "enim", "ad", "minim", "veniam", "quis", "nostrud", 
        "exercitation", "ullamco", "laboris", "nisi", "ut", "aliquip", "ex", "ea", 
        "commodo", "consequat", "duis", "aute", "irure", "dolor", "in", "reprehenderit", 
        "in", "voluptate", "velit", "esse", "cillum", "dolore", "eu", "fugiat", "nulla", 
        "pariatur", "excepteur", "sint", "occaecat", "cupidatat", "non", "proident", 
        "sunt", "in", "culpa", "qui", "officia", "deserunt", "mollit", "anim", "id", "est", "laborum",
        "quisque", "rutrum", "aenean", "imperdiet", "etiam", "ultricies", "nisi", "vel", 
        "augue", "curabitur", "ullamcorper", "ultricies", "nisi", "nam", "eget", "dui", 
        "etiam", "rhoncus", "maecenas", "tempus", "tellus", "eget", "condimentum", "rhoncus", 
        "sem", "quam", "semper", "libero", "sit", "amet", "adipiscing", "sem", "neque", 
        "sed", "ipsum", "nam", "quam", "nunc", "sollicitudin", "eget", "patria", "fringe", 
        "porttitor", "leo", "a", "diam", "in", "arcu", "cursus", "luctus", "metus", "commodo"
    ];

    const standardStart = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";

    function generateWord() {
        return loremWords[Math.floor(Math.random() * loremWords.length)];
    }

    function generateSentence() {
        let sentenceLen = Math.floor(Math.random() * 8) + 6; // 6 to 13 words
        let sentenceWords = [];
        for (let i = 0; i < sentenceLen; i++) {
            sentenceWords.push(generateWord());
        }
        let sentenceStr = sentenceWords.join(" ");
        return sentenceStr.charAt(0).toUpperCase() + sentenceStr.slice(1) + ".";
    }

    function generateParagraph() {
        let numSentences = Math.floor(Math.random() * 4) + 4; // 4 to 7 sentences
        let sentences = [];
        for (let i = 0; i < numSentences; i++) {
            sentences.push(generateSentence());
        }
        return sentences.join(" ");
    }

    function generateLorem() {
        let count = parseInt(elCount.value) || 5;
        if (count < 1) count = 1;
        if (count > 200) count = 200; // soft cap
        elCount.value = count;

        let type = elType.value;
        let withHtml = elHtmlTags.checked;
        let startWithStandard = elStartStandard.checked;

        let outputText = "";
        let elements = [];

        if (type === "words") {
            if (startWithStandard) {
                let stdWords = standardStart.replace(/[,.]/g, "").split(" ");
                for (let i = 0; i < count; i++) {
                    if (i < stdWords.length) {
                        elements.push(stdWords[i]);
                    } else {
                        elements.push(generateWord());
                    }
                }
            } else {
                for (let i = 0; i < count; i++) {
                    elements.push(generateWord());
                }
            }
            let text = elements.join(" ");
            outputText = text.charAt(0).toUpperCase() + text.slice(1) + ".";
            if (withHtml) {
                outputText = `<p>${outputText}</p>`;
            }
        } else if (type === "sentences") {
            if (startWithStandard) {
                elements.push(standardStart);
                for (let i = 1; i < count; i++) {
                    elements.push(generateSentence());
                }
            } else {
                for (let i = 0; i < count; i++) {
                    elements.push(generateSentence());
                }
            }
            
            if (withHtml) {
                outputText = elements.map(s => `<p>${s}</p>`).join("\n");
            } else {
                outputText = elements.join(" ");
            }
        } else if (type === "paragraphs") {
            if (startWithStandard) {
                elements.push(standardStart + " " + generateParagraph());
                for (let i = 1; i < count; i++) {
                    elements.push(generateParagraph());
                }
            } else {
                for (let i = 0; i < count; i++) {
                    elements.push(generateParagraph());
                }
            }

            if (withHtml) {
                outputText = elements.map(p => `<p>${p}</p>`).join("\n\n");
            } else {
                outputText = elements.join("\n\n");
            }
        }

        elOutput.textContent = outputText;
    }

    // Sync input range slider and number field
    elSlider.addEventListener('input', function() {
        elCount.value = this.value;
        generateLorem();
    });

    elCount.addEventListener('input', function() {
        elSlider.value = this.value;
        generateLorem();
    });

    elType.addEventListener('change', function() {
        // Adjust slider limits for words vs paragraphs
        if (this.value === 'words') {
            elSlider.min = 10;
            elSlider.max = 500;
            elSlider.value = 100;
            elCount.value = 100;
        } else if (this.value === 'sentences') {
            elSlider.min = 2;
            elSlider.max = 50;
            elSlider.value = 10;
            elCount.value = 10;
        } else {
            elSlider.min = 1;
            elSlider.max = 50;
            elSlider.value = 5;
            elCount.value = 5;
        }
        generateLorem();
    });

    btnGenerate.addEventListener('click', function(e) {
        e.preventDefault();
        generateLorem();
    });

    btnClear.addEventListener('click', function(e) {
        e.preventDefault();
        elOutput.textContent = "";
    });

    btnCopy.addEventListener('click', function(e) {
        e.preventDefault();
        const content = elOutput.textContent;
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

    btnDownload.addEventListener('click', function(e) {
        e.preventDefault();
        const content = elOutput.textContent;
        if (!content) return;

        const blob = new Blob([content], { type: "text/plain;charset=utf-8" });
        const url = URL.createObjectURL(blob);
        const a = document.createElement("a");
        a.href = url;
        a.download = `lorem-ipsum-${elCount.value}-${elType.value}.txt`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    });

    // Run initial generation
    generateLorem();
});
</script>
