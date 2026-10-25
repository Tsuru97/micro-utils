<div class="image-compressor-wrapper">
    <div class="row g-4">
        <!-- Input & Controls -->
        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm bg-light h-100">
                <div class="card-body p-4">
                    <!-- Dropzone -->
                    <div class="border border-2 border-dashed border-primary rounded-3 p-4 text-center bg-white cursor-pointer position-relative mb-4" id="comp-drop-zone" style="cursor: pointer;">
                        <input type="file" id="comp-file-input" class="position-absolute top-0 start-0 w-100 h-100 opacity-0" accept="image/jpeg,image/png,image/webp" style="cursor: pointer;">
                        <i class="ri-file-image-line display-4 text-primary mb-2"></i>
                        <h6 class="fw-bold mb-1">@lang('tools.exif_dropzone')</h6>
                        <p class="text-muted small mb-0">JPEG, PNG, WebP. Max 15MB.</p>
                    </div>

                    <div id="comp-controls-area" class="d-none">
                        <!-- Quality Slider -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <label for="comp-quality-slider" class="form-label fw-bold mb-0">@lang('tools.comp_quality')</label>
                                <span class="badge bg-primary fs-14" id="comp-quality-val">80%</span>
                            </div>
                            <input type="range" class="form-range" id="comp-quality-slider" min="10" max="100" value="80">
                        </div>

                        <!-- Dimensions Inputs -->
                        <div class="mb-4">
                            <label class="form-label fw-bold mb-2">@lang('tools.comp_dimensions')</label>
                            <div class="row g-2 align-items-center">
                                <div class="col">
                                    <div class="input-group">
                                        <span class="input-group-text bg-white">W</span>
                                        <input type="number" class="form-control shadow-none" id="comp-width" min="10" placeholder="Width">
                                    </div>
                                </div>
                                <div class="col-auto text-muted">×</div>
                                <div class="col">
                                    <div class="input-group">
                                        <span class="input-group-text bg-white">H</span>
                                        <input type="number" class="form-control shadow-none" id="comp-height" min="10" placeholder="Height">
                                    </div>
                                </div>
                            </div>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" id="comp-lock-ratio" checked>
                                <label class="form-check-label text-muted fs-13" for="comp-lock-ratio">@lang('tools.comp_lock_ratio')</label>
                            </div>
                        </div>

                        <!-- Original Preview Card -->
                        <div class="card border border-light shadow-none bg-white">
                            <div class="card-body p-3">
                                <h6 class="fw-bold mb-2 text-muted">@lang('tools.comp_original')</h6>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-light rounded p-1" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                                        <img id="img-orig-preview" class="rounded img-fluid" style="max-height: 100%; object-fit: contain;">
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark text-truncate mb-1" id="orig-name" style="max-width: 250px;">---</div>
                                        <div class="text-muted small" id="orig-info">---</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Compressed Output -->
        <div class="col-12 col-lg-5">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-4 text-primary">
                            <i class="ri-shield-flash-line align-middle me-1"></i> @lang('tools.comp_compressed')
                        </h5>

                        <div id="comp-empty-state" class="text-center py-5 text-muted">
                            <i class="ri-image-2-line display-4 opacity-25"></i>
                            <p class="mt-2 mb-0">Sube una imagen para ver los resultados de compresión</p>
                        </div>

                        <div id="comp-result-area" class="d-none">
                            <!-- Image Canvas Preview -->
                            <div class="bg-light rounded p-2 text-center mb-4" style="height: 220px; display: flex; align-items: center; justify-content: center;">
                                <img id="img-comp-preview" class="rounded img-fluid" style="max-height: 100%; object-fit: contain;">
                            </div>

                            <!-- Details Table -->
                            <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom border-light">
                                <span class="text-muted">Tamaño Original</span>
                                <span class="fw-bold text-dark" id="orig-size-val">---</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom border-light">
                                <span class="text-muted">Tamaño Comprimido</span>
                                <span class="fw-bold text-success" id="comp-size-val">---</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Ahorro Estimado</span>
                                <span class="badge bg-success-subtle text-success fs-13" id="comp-savings-val">---</span>
                            </div>
                        </div>
                    </div>

                    <div id="comp-actions-area" class="d-none">
                        <button type="button" class="btn btn-success w-100" id="btn-comp-download">
                            <i class="ri-download-line align-middle me-1"></i> Descargar Imagen
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const dropZone = document.getElementById('comp-drop-zone');
    const fileInput = document.getElementById('comp-file-input');
    const controlsArea = document.getElementById('comp-controls-area');
    const emptyState = document.getElementById('comp-empty-state');
    const resultArea = document.getElementById('comp-result-area');
    const actionsArea = document.getElementById('comp-actions-area');

    const sliderQuality = document.getElementById('comp-quality-slider');
    const valQuality = document.getElementById('comp-quality-val');
    const elWidth = document.getElementById('comp-width');
    const elHeight = document.getElementById('comp-height');
    const elLock = document.getElementById('comp-lock-ratio');

    const imgOrig = document.getElementById('img-orig-preview');
    const imgComp = document.getElementById('img-comp-preview');
    const origName = document.getElementById('orig-name');
    const origInfo = document.getElementById('orig-info');

    const origSizeVal = document.getElementById('orig-size-val');
    const compSizeVal = document.getElementById('comp-size-val');
    const compSavingsVal = document.getElementById('comp-savings-val');
    const btnDownload = document.getElementById('btn-comp-download');

    let activeImage = null; // Image Object
    let activeFile = null; // File Object
    let originalAspectRatio = 1;
    let compressedBlob = null;

    // Visual Drag & Drop effects
    dropZone.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropZone.classList.add('border-primary', 'bg-light');
    });

    dropZone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        dropZone.classList.remove('border-primary', 'bg-light');
    });

    dropZone.addEventListener('drop', function(e) {
        e.preventDefault();
        dropZone.classList.remove('border-primary', 'bg-light');
        if (e.dataTransfer.files.length) {
            handleImage(e.dataTransfer.files[0]);
        }
    });

    fileInput.addEventListener('change', function() {
        if (fileInput.files.length) {
            handleImage(fileInput.files[0]);
        }
    });

    function formatBytes(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const dm = 2;
        const sizes = ['Bytes', 'KB', 'MB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
    }

    function handleImage(file) {
        if (!file.type.match('image/jpeg') && !file.type.match('image/png') && !file.type.match('image/webp')) {
            alert("@lang('tools.exif_invalid_file')");
            return;
        }

        activeFile = file;
        origName.textContent = file.name;
        origSizeVal.textContent = formatBytes(file.size);

        const reader = new FileReader();
        reader.onload = function(e) {
            activeImage = new Image();
            activeImage.onload = function() {
                originalAspectRatio = activeImage.width / activeImage.height;
                
                // Set default inputs
                elWidth.value = activeImage.width;
                elHeight.value = activeImage.height;
                
                origInfo.textContent = `${activeImage.width} × ${activeImage.height} px`;
                imgOrig.src = e.target.result;

                // Show UI
                controlsArea.classList.remove('d-none');
                emptyState.classList.add('d-none');
                resultArea.classList.remove('d-none');
                actionsArea.classList.remove('d-none');

                compress();
            };
            activeImage.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }

    function compress() {
        if (!activeImage) return;

        const targetW = parseInt(elWidth.value) || activeImage.width;
        const targetH = parseInt(elHeight.value) || activeImage.height;
        const quality = parseFloat(sliderQuality.value) / 100;

        const canvas = document.createElement('canvas');
        canvas.width = targetW;
        canvas.height = targetH;

        const ctx = canvas.getContext('2d');
        ctx.drawImage(activeImage, 0, 0, targetW, targetH);

        // Keep target format, default to JPEG
        let mimeType = activeFile.type;
        if (activeFile.type === 'image/png') {
            // PNG does not support lossy quality compression directly in Canvas,
            // we default to JPEG if user compresses quality, or preserve PNG for lossless resizing.
            if (quality < 0.95) {
                mimeType = 'image/jpeg';
            }
        }

        canvas.toBlob(function(blob) {
            compressedBlob = blob;
            imgComp.src = URL.createObjectURL(blob);
            compSizeVal.textContent = formatBytes(blob.size);

            const savings = ((activeFile.size - blob.size) / activeFile.size) * 100;
            if (savings > 0) {
                compSavingsVal.textContent = `-${savings.toFixed(1)}%`;
                compSavingsVal.className = 'badge bg-success-subtle text-success fs-13';
            } else {
                compSavingsVal.textContent = `+${Math.abs(savings).toFixed(1)}%`;
                compSavingsVal.className = 'badge bg-warning-subtle text-warning fs-13';
            }
        }, mimeType, quality);
    }

    // Dynamic Control Handlers
    sliderQuality.addEventListener('input', function() {
        valQuality.textContent = this.value + '%';
        compress();
    });

    elWidth.addEventListener('input', function() {
        if (elLock.checked && activeImage) {
            elHeight.value = Math.round(this.value / originalAspectRatio);
        }
        compress();
    });

    elHeight.addEventListener('input', function() {
        if (elLock.checked && activeImage) {
            elWidth.value = Math.round(this.value * originalAspectRatio);
        }
        compress();
    });

    btnDownload.addEventListener('click', function(e) {
        e.preventDefault();
        if (!compressedBlob) return;

        const url = URL.createObjectURL(compressedBlob);
        const a = document.createElement('a');
        a.href = url;
        
        // Match extension with the compressed type
        let extension = activeFile.name.split('.').pop();
        if (compressedBlob.type === 'image/jpeg' && extension !== 'jpg' && extension !== 'jpeg') {
            extension = 'jpg';
        }
        
        const cleanName = activeFile.name.substring(0, activeFile.name.lastIndexOf('.'));
        a.download = `optimized-${cleanName}.${extension}`;
        
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    });
});
</script>
