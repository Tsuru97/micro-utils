<div class="whatsapp-link-generator-wrapper">
    <div class="row g-4">
        <!-- Controles -->
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm bg-light h-100">
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label for="wa-phone" class="form-label fw-bold">@lang('tools.wa_phone')</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="ri-phone-line"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0 shadow-none" id="wa-phone" placeholder="Ej: 521234567890" aria-label="Phone number">
                        </div>
                        <div class="form-text">@lang('tools.wa_phone_help')</div>
                    </div>

                    <div class="mb-4">
                        <label for="wa-message" class="form-label fw-bold">@lang('tools.wa_message') <span class="text-muted fw-normal fs-13">(@lang('tools.optional'))</span></label>
                        <textarea class="form-control shadow-none" id="wa-message" rows="4" placeholder="@lang('tools.wa_message_placeholder')"></textarea>
                    </div>

                    <button type="button" class="btn btn-primary w-100" id="btn-wa-generate">
                        <i class="ri-whatsapp-line align-middle me-1"></i> @lang('tools.wa_generate')
                    </button>
                </div>
            </div>
        </div>

        <!-- Salida -->
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 text-center d-flex flex-column justify-content-center align-items-center">
                    
                    <div id="wa-empty-state" class="text-muted py-5">
                        <i class="ri-qr-code-line display-1 opacity-25"></i>
                        <p class="mt-3">@lang('tools.wa_empty_state')</p>
                    </div>

                    <div id="wa-result-state" class="d-none w-100">
                        <h5 class="fw-bold mb-3 text-success">@lang('tools.wa_success')</h5>
                        
                        <!-- QR Code Container -->
                        <div class="bg-light p-3 rounded d-inline-block mb-4" id="wa-qrcode"></div>
                        
                        <!-- Link Output -->
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-muted bg-light" id="wa-link-output" readonly>
                            <button class="btn btn-outline-primary" type="button" id="btn-wa-copy">
                                <i class="ri-file-copy-line"></i>
                            </button>
                        </div>
                        
                        <a href="#" target="_blank" class="btn btn-success w-100" id="btn-wa-open">
                            <i class="ri-external-link-line align-middle me-1"></i> @lang('tools.wa_open_link')
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Librería para generar el QR Code localmente -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const elPhone = document.getElementById('wa-phone');
    const elMessage = document.getElementById('wa-message');
    const btnGenerate = document.getElementById('btn-wa-generate');
    const btnCopy = document.getElementById('btn-wa-copy');
    const btnOpen = document.getElementById('btn-wa-open');
    const elEmptyState = document.getElementById('wa-empty-state');
    const elResultState = document.getElementById('wa-result-state');
    const elLinkOutput = document.getElementById('wa-link-output');
    const qrContainer = document.getElementById('wa-qrcode');

    let qrcode = null;

    btnGenerate.addEventListener('click', function(e) {
        e.preventDefault();
        
        let phone = elPhone.value.trim().replace(/[^0-9]/g, '');
        let message = elMessage.value.trim();

        if (phone === '') {
            elPhone.classList.add('is-invalid');
            return;
        }
        elPhone.classList.remove('is-invalid');

        let url = 'https://wa.me/' + phone;
        if (message !== '') {
            url += '?text=' + encodeURIComponent(message);
        }

        // Show UI
        elEmptyState.classList.add('d-none');
        elResultState.classList.remove('d-none');

        // Update Link and Button
        elLinkOutput.value = url;
        btnOpen.href = url;

        // Generate QR
        qrContainer.innerHTML = '';
        qrcode = new QRCode(qrContainer, {
            text: url,
            width: 180,
            height: 180,
            colorDark : "#000000",
            colorLight : "#f8f9fa",
            correctLevel : QRCode.CorrectLevel.H
        });
    });

    btnCopy.addEventListener('click', function(e) {
        e.preventDefault();
        if (elLinkOutput.value) {
            navigator.clipboard.writeText(elLinkOutput.value).then(function() {
                const originalHTML = btnCopy.innerHTML;
                btnCopy.innerHTML = '<i class="ri-check-line"></i>';
                btnCopy.classList.replace('btn-outline-primary', 'btn-success');
                setTimeout(() => {
                    btnCopy.innerHTML = originalHTML;
                    btnCopy.classList.replace('btn-success', 'btn-outline-primary');
                }, 2000);
            });
        }
    });
});
</script>
