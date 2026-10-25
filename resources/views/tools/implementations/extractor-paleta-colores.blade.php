<div class="color-palette-extractor-wrapper">
    <div class="row g-4">
        <!-- Input & Preview Panel -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm bg-light h-100">
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="fw-bold mb-3 text-primary">
                        <i class="ri-image-add-line align-middle me-1"></i> @lang('tools.exif_info')
                    </h5>
                    
                    <!-- Dropzone -->
                    <div id="dropzone" class="border-2 border-dashed border-primary rounded-3 p-5 text-center bg-white cursor-pointer transition-all mb-4 position-relative" style="border-style: dashed !important; cursor: pointer; transition: all 0.2s ease;">
                        <input type="file" id="image-input" accept="image/png, image/jpeg, image/jpg, image/webp, image/svg+xml" class="position-absolute top-0 start-0 w-100 h-100 opacity-0" style="cursor: pointer;">
                        <div class="py-3" id="dropzone-content">
                            <i class="ri-palette-line text-primary display-4 mb-3 d-block"></i>
                            <span class="fs-15 fw-semibold text-dark">@lang('tools.palette_dropzone')</span>
                        </div>
                    </div>

                    <!-- Image Preview Area -->
                    <div id="preview-container" class="d-none flex-grow-1 d-flex flex-column justify-content-center align-items-center bg-white p-3 rounded-3 border border-light position-relative mb-4" style="min-height: 250px;">
                        <img id="image-preview" src="" alt="Preview" class="img-fluid rounded shadow-sm" style="max-height: 250px; object-fit: contain;">
                        <button type="button" class="btn btn-sm btn-danger position-absolute top-3 end-3 shadow-sm" id="btn-remove-image" style="top: 10px; right: 10px;">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>

                    <!-- Options -->
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="color-count" class="form-label fw-bold">@lang('tools.palette_color_count')</label>
                            <select class="form-select shadow-none" id="color-count">
                                <option value="4">4 @lang('tools.tools')</option>
                                <option value="6" selected>6 @lang('tools.tools')</option>
                                <option value="8">8 @lang('tools.tools')</option>
                                <option value="10">10 @lang('tools.tools')</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Palette Results Panel -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold text-primary mb-0">
                                <i class="ri-artboard-line align-middle me-1"></i> @lang('tools.palette_colors')
                            </h5>
                            <button type="button" class="btn btn-outline-primary btn-sm d-none" id="btn-copy-all">
                                <i class="ri-file-copy-line align-middle me-1"></i> @lang('tools.palette_copy_all')
                            </button>
                        </div>

                        <!-- Empty State -->
                        <div id="palette-empty" class="text-center py-5">
                            <i class="ri-palette-fill text-muted display-3 mb-3 d-block opacity-50"></i>
                            <p class="text-muted mb-0">@lang('tools.palette_no_image')</p>
                        </div>

                        <!-- Color Grid -->
                        <div class="row g-3 d-none" id="palette-grid">
                            <!-- Color Swatches injected here -->
                        </div>
                    </div>

                    <div id="palette-stats" class="d-none border-top pt-3 mt-4">
                        <div class="alert alert-success border-0 bg-success-subtle d-flex align-items-center mb-0 p-3">
                            <i class="ri-shield-check-line text-success fs-20 me-2"></i>
                            <span class="fs-13 text-success">@lang('tools.exif_success')</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
#dropzone:hover {
    background-color: var(--bs-primary-bg-subtle) !important;
    border-color: var(--bs-primary) !important;
    transform: translateY(-2px);
}
.color-swatch-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.color-swatch-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const fileInput = document.getElementById('image-input');
    const dropzone = document.getElementById('dropzone');
    const dropzoneContent = document.getElementById('dropzone-content');
    const previewContainer = document.getElementById('preview-container');
    const imagePreview = document.getElementById('image-preview');
    const btnRemoveImage = document.getElementById('btn-remove-image');
    const colorCountSelect = document.getElementById('color-count');
    const paletteGrid = document.getElementById('palette-grid');
    const paletteEmpty = document.getElementById('palette-empty');
    const btnCopyAll = document.getElementById('btn-copy-all');

    let loadedImage = null;

    // Handle Dropzone styles
    dropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone.classList.add('bg-primary-subtle');
    });

    dropzone.addEventListener('dragleave', () => {
        dropzone.classList.remove('bg-primary-subtle');
    });

    dropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone.classList.remove('bg-primary-subtle');
        const files = e.dataTransfer.files;
        if (files.length) {
            handleFile(files[0]);
        }
    });

    fileInput.addEventListener('change', function(e) {
        if (this.files.length) {
            handleFile(this.files[0]);
        }
    });

    btnRemoveImage.addEventListener('click', function(e) {
        e.preventDefault();
        resetTool();
    });

    colorCountSelect.addEventListener('change', function() {
        if (loadedImage) {
            extractPalette(loadedImage);
        }
    });

    function resetTool() {
        fileInput.value = '';
        loadedImage = null;
        imagePreview.src = '';
        previewContainer.classList.add('d-none');
        dropzone.classList.remove('d-none');
        paletteGrid.innerHTML = '';
        paletteGrid.classList.add('d-none');
        paletteEmpty.classList.remove('d-none');
        btnCopyAll.classList.add('d-none');
    }

    function handleFile(file) {
        if (!file.type.match('image.*')) {
            alert('Por favor, selecciona un archivo de imagen válido.');
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            const img = new Image();
            img.onload = function() {
                loadedImage = img;
                imagePreview.src = e.target.result;
                dropzone.classList.add('d-none');
                previewContainer.classList.remove('d-none');
                extractPalette(img);
            };
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }

    // Color quantization & extraction logic
    function extractPalette(img) {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        
        // Scan a small size for ultra-fast performance
        const scanWidth = 64;
        const scanHeight = Math.round(64 * (img.height / img.width));
        canvas.width = scanWidth;
        canvas.height = scanHeight;

        ctx.drawImage(img, 0, 0, scanWidth, scanHeight);
        const imgData = ctx.getImageData(0, 0, scanWidth, scanHeight).data;

        // Gather pixel colors
        const colors = [];
        for (let i = 0; i < imgData.length; i += 4) {
            const r = imgData[i];
            const g = imgData[i + 1];
            const b = imgData[i + 2];
            const a = imgData[i + 3];

            // Ignore overly transparent pixels
            if (a < 128) continue;

            colors.push({ r, g, b });
        }

        // Color quantization: Simple cluster algorithm
        const colorBuckets = [];
        const maxDistance = 45; // Euclidean distance threshold in RGB space to merge colors

        colors.forEach(pixel => {
            let matchedBucket = null;
            
            for (let bucket of colorBuckets) {
                const dist = Math.sqrt(
                    Math.pow(pixel.r - bucket.r, 2) +
                    Math.pow(pixel.g - bucket.g, 2) +
                    Math.pow(pixel.b - bucket.b, 2)
                );
                
                if (dist < maxDistance) {
                    matchedBucket = bucket;
                    break;
                }
            }

            if (matchedBucket) {
                // Update centroid (running average)
                matchedBucket.count++;
                matchedBucket.sumR += pixel.r;
                matchedBucket.sumG += pixel.g;
                matchedBucket.sumB += pixel.b;
                matchedBucket.r = Math.round(matchedBucket.sumR / matchedBucket.count);
                matchedBucket.g = Math.round(matchedBucket.sumG / matchedBucket.count);
                matchedBucket.b = Math.round(matchedBucket.sumB / matchedBucket.count);
            } else {
                colorBuckets.push({
                    r: pixel.r,
                    g: pixel.g,
                    b: pixel.b,
                    sumR: pixel.r,
                    sumG: pixel.g,
                    sumB: pixel.b,
                    count: 1
                });
            }
        });

        // Sort by frequency
        colorBuckets.sort((a, b) => b.count - a.count);

        // Get requested color count
        const limit = parseInt(colorCountSelect.value);
        const finalPalette = colorBuckets.slice(0, limit).map(bucket => {
            const hex = rgbToHex(bucket.r, bucket.g, bucket.b);
            const totalCount = colors.length;
            const percentage = Math.round((bucket.count / totalCount) * 100);
            return {
                hex: hex,
                r: bucket.r,
                g: bucket.g,
                b: bucket.b,
                percentage: percentage || 1
            };
        });

        renderPalette(finalPalette);
    }

    function rgbToHex(r, g, b) {
        return "#" + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1).toUpperCase();
    }

    function renderPalette(palette) {
        paletteGrid.innerHTML = '';
        
        palette.forEach((item, index) => {
            // Determine text color based on contrast
            const brightness = (item.r * 299 + item.g * 587 + item.b * 114) / 1000;
            const textColorClass = brightness > 125 ? 'text-dark' : 'text-white';

            const col = document.createElement('div');
            col.className = 'col-6 col-sm-4';
            col.innerHTML = `
                <div class="card border-0 color-swatch-card shadow-sm h-100 overflow-hidden">
                    <div class="d-flex flex-column justify-content-end p-3 position-relative" style="background-color: ${item.hex}; height: 110px; cursor: pointer;">
                        <button type="button" class="btn btn-sm btn-light border-0 position-absolute top-2 end-2 py-1 px-2 btn-copy-color opacity-75 hover-opacity-100" data-hex="${item.hex}" style="top: 8px; right: 8px;">
                            <i class="ri-file-copy-line"></i>
                        </button>
                        <span class="fs-12 fw-bold text-monospace ${textColorClass}">${item.hex}</span>
                        <span class="fs-11 ${textColorClass} opacity-75">rgb(${item.r}, ${item.g}, ${item.b})</span>
                    </div>
                    <div class="card-body p-2 bg-white d-flex justify-content-between align-items-center border-top">
                        <small class="text-muted fw-bold">Porcentaje</small>
                        <span class="badge bg-secondary-subtle text-secondary fw-bold rounded-pill">${item.percentage}%</span>
                    </div>
                </div>
            `;

            // Click swatch or copy button to copy color
            col.querySelector('.btn-copy-color').addEventListener('click', function(e) {
                e.stopPropagation();
                copyToClipboard(item.hex, this);
            });

            col.querySelector('.d-flex').addEventListener('click', function() {
                const btn = col.querySelector('.btn-copy-color');
                copyToClipboard(item.hex, btn);
            });

            paletteGrid.appendChild(col);
        });

        paletteEmpty.classList.add('d-none');
        paletteGrid.classList.remove('d-none');
        btnCopyAll.classList.remove('d-none');

        // Setup copy all button
        btnCopyAll.onclick = function(e) {
            e.preventDefault();
            const hexArray = palette.map(i => i.hex).join(', ');
            navigator.clipboard.writeText(hexArray).then(() => {
                const originalHTML = btnCopyAll.innerHTML;
                btnCopyAll.innerHTML = '<i class="ri-check-line align-middle me-1"></i> @lang("tools.palette_color_copied")';
                btnCopyAll.className = 'btn btn-success btn-sm';
                setTimeout(() => {
                    btnCopyAll.innerHTML = originalHTML;
                    btnCopyAll.className = 'btn btn-outline-primary btn-sm';
                }, 2000);
            });
        };
    }

    function copyToClipboard(text, element) {
        navigator.clipboard.writeText(text).then(() => {
            const originalHTML = element.innerHTML;
            element.innerHTML = '<i class="ri-check-line text-success"></i>';
            setTimeout(() => {
                element.innerHTML = originalHTML;
            }, 1500);
        });
    }
});
</script>
