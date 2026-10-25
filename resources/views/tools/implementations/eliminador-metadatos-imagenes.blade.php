<div class="exif-remover-wrapper">
    <div class="row g-4">
        <!-- Upload Dropzone -->
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm bg-light h-100">
                <div class="card-body p-4 d-flex flex-column justify-content-center">
                    <div class="border border-2 border-dashed border-primary rounded-3 p-5 text-center cursor-pointer position-relative bg-white" id="drop-zone" style="cursor: pointer; transition: all 0.2s ease;">
                        <input type="file" id="file-input" class="position-absolute top-0 start-0 w-100 h-100 opacity-0" accept="image/jpeg,image/png" style="cursor: pointer;">
                        <i class="ri-image-add-line display-3 text-primary mb-3"></i>
                        <h5 class="fw-bold mb-2">@lang('tools.exif_dropzone')</h5>
                        <p class="text-muted small mb-0">Max: 15MB. JPEG, PNG.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Info & Action Panel -->
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-4 text-primary">
                            <i class="ri-shield-user-line align-middle me-1"></i> @lang('tools.exif_info')
                        </h5>
                        
                        <!-- File Details -->
                        <div id="file-details" class="d-none">
                            <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom border-light">
                                <span class="text-muted">Nombre</span>
                                <span class="fw-bold text-dark text-truncate" id="file-name" style="max-width: 200px;">---</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom border-light">
                                <span class="text-muted">Tamaño</span>
                                <span class="fw-bold text-dark" id="file-size">---</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom border-light">
                                <span class="text-muted">Tipo</span>
                                <span class="fw-bold text-dark" id="file-type">---</span>
                            </div>

                            <!-- Metadata Warning State -->
                            <div class="alert alert-warning border-0 shadow-none bg-warning-subtle mb-0 mt-3 d-none" id="meta-warning">
                                <i class="ri-alert-line label-icon align-middle fs-16 me-2 text-warning"></i>
                                <strong>@lang('tools.exif_metadata_found')</strong>
                                <ul class="mb-0 fs-13 ps-3 mt-1 text-muted" id="meta-list"></ul>
                            </div>

                            <!-- Clean State -->
                            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0 mt-3 d-none" id="meta-clean">
                                <i class="ri-checkbox-circle-line label-icon align-middle fs-16 me-2 text-success"></i>
                                <span>@lang('tools.exif_no_meta')</span>
                                <div class="mt-2 text-muted fs-12 border-top border-success-subtle pt-2">
                                    @if(app()->getLocale() == 'es')
                                        <strong>Nota:</strong> Las fotos descargadas de WhatsApp, Telegram, capturas de pantalla (screenshots) o redes sociales suelen ser limpiadas automáticamente por esas plataformas y no contienen metadatos. ¡Prueba subiendo una foto original de la cámara de tu teléfono!
                                    @else
                                        <strong>Note:</strong> Photos downloaded from WhatsApp, Telegram, screenshots, or social media platforms are automatically cleaned by those platforms and contain no metadata. Try uploading an original photo from your device's camera!
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Empty State -->
                        <div id="info-empty-state" class="text-center py-5 text-muted">
                            <i class="ri-attachment-line display-4 opacity-25"></i>
                            <p class="mt-2 mb-0">Sube una imagen para analizar sus metadatos</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="button" class="btn btn-primary w-100 d-none" id="btn-exif-clean">
                            <i class="ri-shield-flash-line align-middle me-1"></i> @lang('tools.exif_clean_btn')
                        </button>
                        <div class="alert alert-success border-0 shadow-none bg-success-subtle mt-3 mb-0 d-none text-center" id="clean-success">
                            <i class="ri-check-line align-middle fs-16 me-1"></i> @lang('tools.exif_success')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const dropZone = document.getElementById('drop-zone');
    const fileInput = document.getElementById('file-input');
    const fileDetails = document.getElementById('file-details');
    const infoEmptyState = document.getElementById('info-empty-state');
    const elName = document.getElementById('file-name');
    const elSize = document.getElementById('file-size');
    const elType = document.getElementById('file-type');
    const metaWarning = document.getElementById('meta-warning');
    const metaList = document.getElementById('meta-list');
    const metaClean = document.getElementById('meta-clean');
    const btnClean = document.getElementById('btn-exif-clean');
    const cleanSuccess = document.getElementById('clean-success');

    let activeFile = null;
    let activeArrayBuffer = null;

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
            handleFile(e.dataTransfer.files[0]);
        }
    });

    fileInput.addEventListener('change', function() {
        if (fileInput.files.length) {
            handleFile(fileInput.files[0]);
        }
    });

    function handleFile(file) {
        if (!file.type.match('image/jpeg') && !file.type.match('image/png')) {
            alert("@lang('tools.exif_invalid_file')");
            return;
        }

        activeFile = file;
        cleanSuccess.classList.add('d-none');
        btnClean.classList.add('d-none');
        metaWarning.classList.add('d-none');
        metaClean.classList.add('d-none');
        metaList.innerHTML = '';

        elName.textContent = file.name;
        elSize.textContent = (file.size / 1024 / 1024).toFixed(2) + ' MB';
        elType.textContent = file.type === 'image/jpeg' ? 'JPEG' : 'PNG';

        infoEmptyState.classList.add('d-none');
        fileDetails.classList.remove('d-none');

        const reader = new FileReader();
        reader.onload = function(e) {
            activeArrayBuffer = e.target.result;
            analyzeMetadata();
        };
        reader.readAsArrayBuffer(file);
    }

    function analyzeMetadata() {
        const view = new DataView(activeArrayBuffer);
        let foundMeta = [];

        if (activeFile.type === 'image/jpeg') {
            try {
                if (view.byteLength < 4) {
                    throw new Error("File too small");
                }
                if (view.getUint16(0) !== 0xFFD8) {
                    throw new Error("Not a valid JPEG");
                }
                
                let offset = 2;
                while (offset < view.byteLength - 2) {
                    const marker = view.getUint16(offset);
                    
                    // Stop parsing immediately when we reach SOS (Start of Scan) or EOI (End of Image)
                    if (marker === 0xFFDA || marker === 0xFFD9) {
                        break;
                    }

                    if (marker >= 0xFF00) {
                        if (offset + 4 > view.byteLength) break;
                        const length = view.getUint16(offset + 2);
                        
                        if (marker === 0xFFE1) { // APP1 EXIF segment
                            foundMeta.push("Cámara / EXIF (Metadata)");
                            
                            if (offset + 4 + length - 2 <= view.byteLength) {
                                const subView = new Uint8Array(activeArrayBuffer, offset + 4, length - 2);
                                // Fallback byte mapping to character strings to avoid TextDecoder null byte issues
                                const bytes = Array.from(subView);
                                const text = bytes.map(b => String.fromCharCode(b)).join('');
                                
                                if (text.includes("GPS")) {
                                    foundMeta.push("Geolocalización GPS (Ubicación exacta)");
                                }
                                if (/Apple|Samsung|Canon|Nikon|Sony|Google|Huawei|Xiaomi|Motorola/i.test(text)) {
                                    foundMeta.push("Modelo de Cámara / Celular (Dispositivo)");
                                }
                            }
                        } else if (marker === 0xFFED) { // APP13 Photoshop / IPTC
                            foundMeta.push("Información IPTC / Photoshop");
                        } else if (marker === 0xFFFE) { // Comment segment
                            foundMeta.push("Comentarios incrustados (Comments)");
                        }
                        
                        offset += length + 2;
                    } else {
                        offset++;
                    }
                }
            } catch (err) {
                console.error("Error parsing JPEG EXIF:", err);
            }
        } else if (activeFile.type === 'image/png') {
            try {
                if (view.byteLength < 8) {
                    throw new Error("File too small");
                }
                const pngSignature = [0x89, 0x50, 0x4E, 0x47, 0x0D, 0x0A, 0x1A, 0x0A];
                let isPng = true;
                for (let i = 0; i < 8; i++) {
                    if (view.getUint8(i) !== pngSignature[i]) {
                        isPng = false;
                        break;
                    }
                }

                if (isPng) {
                    let offset = 8;
                    while (offset < view.byteLength - 8) {
                        const length = view.getUint32(offset);
                        const chunkType = String.fromCharCode(
                            view.getUint8(offset + 4),
                            view.getUint8(offset + 5),
                            view.getUint8(offset + 6),
                            view.getUint8(offset + 7)
                        );

                        if (['tEXt', 'zTXt', 'iTXt'].includes(chunkType)) {
                            foundMeta.push(`Texto descriptivo y comentarios (${chunkType} Metadata)`);
                        } else if (chunkType === 'iCCP') {
                            foundMeta.push("Perfil de Color Incrustado (iCCP Profile)");
                        } else if (chunkType === 'eXIf') {
                            foundMeta.push("Bloque EXIF PNG (Cámara & Configuración)");
                        }

                        offset += length + 12;
                    }
                }
            } catch (err) {
                console.error("Error parsing PNG Metadata:", err);
            }
        }

        // Remove duplicate detections if any
        foundMeta = [...new Set(foundMeta)];

        if (foundMeta.length > 0) {
            foundMeta.forEach(meta => {
                const li = document.createElement('li');
                li.textContent = meta;
                metaList.appendChild(li);
            });
            metaWarning.classList.remove('d-none');
        } else {
            metaClean.classList.remove('d-none');
        }

        btnClean.classList.remove('d-none');
    }

    btnClean.addEventListener('click', function(e) {
        e.preventDefault();
        
        let cleanBlob = null;

        if (activeFile.type === 'image/jpeg') {
            cleanBlob = stripJpegMetadata();
        } else if (activeFile.type === 'image/png') {
            cleanBlob = stripPngMetadata();
        }

        if (cleanBlob) {
            cleanSuccess.classList.remove('d-none');
            
            // Auto download
            const url = URL.createObjectURL(cleanBlob);
            const a = document.createElement("a");
            a.href = url;
            a.download = "cleaned-" + activeFile.name;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }
    });

    function stripJpegMetadata() {
        const view = new DataView(activeArrayBuffer);
        const segments = [];
        
        if (view.getUint16(0) !== 0xFFD8) return null; // Not JPEG

        segments.push(new Uint8Array(activeArrayBuffer, 0, 2)); // Add SOI marker

        let offset = 2;
        while (offset < view.byteLength - 2) {
            const marker = view.getUint16(offset);
            
            if (marker === 0xFFDA) { // SOS (Start of Scan) - beginning of image stream
                // Push everything from SOS marker to the end of the file
                segments.push(new Uint8Array(activeArrayBuffer, offset));
                break;
            }

            if (marker >= 0xFF00) {
                if (offset + 4 > view.byteLength) break;
                const length = view.getUint16(offset + 2);

                // Skip metadata markers: APP1 (0xFFE1), APP13 (0xFFED), Comment (0xFFFE)
                if (marker !== 0xFFE1 && marker !== 0xFFED && marker !== 0xFFFE) {
                    segments.push(new Uint8Array(activeArrayBuffer, offset, length + 2));
                }

                offset += length + 2;
            } else {
                offset++;
            }
        }

        return new Blob(segments, { type: 'image/jpeg' });
    }

    function stripPngMetadata() {
        const view = new DataView(activeArrayBuffer);
        const segments = [];
        
        // Add PNG signature
        segments.push(new Uint8Array(activeArrayBuffer, 0, 8));

        let offset = 8;
        while (offset < view.byteLength - 12) {
            const length = view.getUint32(offset);
            const chunkType = String.fromCharCode(
                view.getUint8(offset + 4),
                view.getUint8(offset + 5),
                view.getUint8(offset + 6),
                view.getUint8(offset + 7)
            );

            // Skip metadata and profile chunks: tEXt, zTXt, iTXt, iCCP, eXIf
            if (!['tEXt', 'zTXt', 'iTXt', 'iCCP', 'eXIf'].includes(chunkType)) {
                segments.push(new Uint8Array(activeArrayBuffer, offset, length + 12));
            }

            offset += length + 12;
            
            // Stop at IEND chunk (which is the last chunk in a valid PNG)
            if (chunkType === 'IEND') {
                break;
            }
        }

        return new Blob(segments, { type: 'image/png' });
    }
});
</script>
