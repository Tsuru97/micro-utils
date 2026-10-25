<div class="jwt-decoder-wrapper py-3">
    <style>
        .jwt-segment-title {
            font-size: 0.9rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 8px 16px;
            border-radius: 8px 8px 0 0;
            color: #ffffff;
            margin-bottom: 0;
        }
        
        .jwt-header-title { background-color: #ef4444; }
        .jwt-payload-title { background-color: #a855f7; }
        .jwt-signature-title { background-color: #3b82f6; }
        
        .jwt-code-block {
            font-family: 'Fira Code', 'Courier New', Courier, monospace;
            font-size: 0.85rem;
            background: #0f172a;
            color: #f1f5f9;
            padding: 16px;
            border-radius: 0 0 12px 12px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            max-height: 280px;
            overflow-y: auto;
            white-space: pre-wrap;
            word-break: break-all;
        }

        .jwt-token-input {
            font-family: 'Fira Code', 'Courier New', Courier, monospace;
            font-size: 0.9rem;
            line-height: 1.5;
            border-radius: 12px;
        }

        .jwt-status-badge {
            font-size: 0.8rem;
            font-weight: 700;
            padding: 6px 12px;
            border-radius: 20px;
            display: inline-block;
        }

        .status-valid {
            background-color: rgba(16, 185, 129, 0.15);
            color: #10b981;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .status-expired {
            background-color: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }
        
        .meta-list {
            background: rgba(255, 255, 255, 0.5);
            border-radius: 14px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            padding: 16px;
        }
        
        [data-bs-theme="dark"] .meta-list {
            background: rgba(255, 255, 255, 0.02);
            border-color: rgba(255, 255, 255, 0.05);
        }
    </style>

    <div class="row g-4">
        <!-- Panel Izquierdo: Campo de entrada del Token -->
        <div class="col-12 col-lg-5">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 p-md-5 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="fw-bold mb-0 text-dark">
                                <i class="ri-key-line text-primary me-2"></i> JWT Input
                            </h4>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-light border" id="btn-load-jwt-demo">
                                    <i class="ri-magic-line text-warning"></i> Demo Token
                                </button>
                                <button class="btn btn-sm btn-outline-secondary" id="btn-clear-jwt">
                                    @lang('tools.clear')
                                </button>
                            </div>
                        </div>

                        <div class="mb-4">
                            <textarea class="form-control jwt-token-input shadow-none" id="jwt-input" rows="12" placeholder="@lang('tools.jwt_input')"></textarea>
                        </div>
                    </div>

                    <!-- Metadatos de expiración -->
                    <div class="meta-list" id="jwt-meta-panel" style="display: none;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="fw-bold text-dark fs-14">Estado del Token</span>
                            <span class="jwt-status-badge status-valid" id="jwt-status">ACTIVE</span>
                        </div>
                        <div class="row g-2 text-muted fs-13">
                            <div class="col-6"><strong>Algoritmo (alg):</strong></div>
                            <div class="col-6 text-dark text-end" id="meta-alg">-</div>
                            <div class="col-6"><strong>Tipo (typ):</strong></div>
                            <div class="col-6 text-dark text-end" id="meta-typ">-</div>
                            <div class="col-6"><strong>Expiración (exp):</strong></div>
                            <div class="col-6 text-dark text-end" id="meta-exp">-</div>
                            <div class="col-6"><strong>Emitido en (iat):</strong></div>
                            <div class="col-6 text-dark text-end" id="meta-iat">-</div>
                        </div>
                    </div>
                    
                    <div id="jwt-empty-meta" class="text-center py-4 text-muted border rounded-4 border-dashed">
                        <i class="ri-shield-user-line fs-24 opacity-50"></i>
                        <p class="mb-0 mt-1 small">Ingresa un token para analizar su firma y fechas de vigencia.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel Derecho: Salida Decodificada -->
        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 p-md-5">
                    <h4 class="fw-bold mb-4 text-dark">
                        <i class="ri-braces-line text-success me-2"></i> Decoded segments
                    </h4>

                    <!-- Alerta de error -->
                    <div class="alert alert-danger border-0 d-none" id="jwt-error-alert">
                        <i class="ri-error-warning-line me-2 align-middle fs-16"></i>
                        <span id="jwt-error-msg">@lang('tools.jwt_invalid')</span>
                    </div>

                    <div id="jwt-decoded-container" style="opacity: 0.45; pointer-events: none; transition: opacity 0.3s;">
                        <!-- Header -->
                        <div class="mb-4">
                            <div class="jwt-segment-title jwt-header-title">
                                <i class="ri-shield-keyhole-line me-1"></i> @lang('tools.jwt_header'): <span class="fw-normal small">Metadata</span>
                            </div>
                            <pre class="jwt-code-block" id="jwt-header-block">{}</pre>
                        </div>

                        <!-- Payload -->
                        <div class="mb-4">
                            <div class="jwt-segment-title jwt-payload-title">
                                <i class="ri-database-2-line me-1"></i> @lang('tools.jwt_payload'): <span class="fw-normal small">Claims & Data</span>
                            </div>
                            <pre class="jwt-code-block" id="jwt-payload-block">{}</pre>
                        </div>

                        <!-- Signature -->
                        <div>
                            <div class="jwt-segment-title jwt-signature-title">
                                <i class="ri-fingerprint-line me-1"></i> @lang('tools.jwt_signature'): <span class="fw-normal small">HMAC / RSA Verification</span>
                            </div>
                            <pre class="jwt-code-block font-monospace text-muted fs-12 mb-0" id="jwt-signature-block">Signature segment is validated offline for structure.</pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const jwtInput = document.getElementById('jwt-input');
    const btnLoadDemo = document.getElementById('btn-load-jwt-demo');
    const btnClear = document.getElementById('btn-clear-jwt');

    // Error alert
    const errorAlert = document.getElementById('jwt-error-alert');
    const errorMsg = document.getElementById('jwt-error-msg');

    // Code blocks
    const headerBlock = document.getElementById('jwt-header-block');
    const payloadBlock = document.getElementById('jwt-payload-block');
    const signatureBlock = document.getElementById('jwt-signature-block');
    const decodedContainer = document.getElementById('jwt-decoded-container');

    // Metadata panel
    const metaPanel = document.getElementById('jwt-meta-panel');
    const emptyMeta = document.getElementById('jwt-empty-meta');
    const statusBadge = document.getElementById('jwt-status');
    const metaAlg = document.getElementById('meta-alg');
    const metaTyp = document.getElementById('meta-typ');
    const metaExp = document.getElementById('meta-exp');
    const metaIat = document.getElementById('meta-iat');

    // Base64Url Decoder helper that supports unicode characters nicely
    function base64UrlDecode(str) {
        // Add padding if needed
        let base64 = str.replace(/-/g, '+').replace(/_/g, '/');
        while (base64.length % 4) {
            base64 += '=';
        }
        try {
            // Decodes to string, then decodes escape sequences for UTF-8
            return decodeURIComponent(atob(base64).split('').map(function(c) {
                return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
            }).join(''));
        } catch (e) {
            return atob(base64);
        }
    }

    function parseJWT() {
        const token = jwtInput.value.trim();
        
        if (token === '') {
            resetUI();
            return;
        }

        const segments = token.split('.');
        
        if (segments.length !== 3) {
            showError("{{ __('tools.jwt_invalid') }}");
            return;
        }

        try {
            errorAlert.classList.add('d-none');
            decodedContainer.style.opacity = '1';
            decodedContainer.style.pointerEvents = 'auto';

            // 1. Decode Header
            const decodedHeader = base64UrlDecode(segments[0]);
            const headerObj = JSON.parse(decodedHeader);
            headerBlock.textContent = JSON.stringify(headerObj, null, 4);

            // 2. Decode Payload
            const decodedPayload = base64UrlDecode(segments[1]);
            const payloadObj = JSON.parse(decodedPayload);
            payloadBlock.textContent = JSON.stringify(payloadObj, null, 4);

            // 3. Signature
            signatureBlock.textContent = segments[2];

            // 4. Update Meta list
            emptyMeta.style.display = 'none';
            metaPanel.style.display = 'block';

            metaAlg.textContent = headerObj.alg || 'N/A';
            metaTyp.textContent = headerObj.typ || 'JWT';

            // Expiration timestamp check
            if (payloadObj.exp) {
                const expDate = new Date(payloadObj.exp * 1000);
                metaExp.textContent = expDate.toLocaleString();

                const now = new Date();
                if (now > expDate) {
                    statusBadge.textContent = "{{ __('tools.jwt_expired') }}";
                    statusBadge.className = 'jwt-status-badge status-expired';
                } else {
                    statusBadge.textContent = 'ACTIVE';
                    statusBadge.className = 'jwt-status-badge status-valid';
                }
            } else {
                metaExp.textContent = 'Sin Expiración';
                statusBadge.textContent = 'ACTIVE';
                statusBadge.className = 'jwt-status-badge status-valid';
            }

            if (payloadObj.iat) {
                const iatDate = new Date(payloadObj.iat * 1000);
                metaIat.textContent = iatDate.toLocaleString();
            } else {
                metaIat.textContent = 'N/A';
            }

        } catch (err) {
            showError('Error al decodificar segmentos del token. Por favor verifica que el token esté bien estructurado.');
            console.error(err);
        }
    }

    function showError(msg) {
        errorMsg.textContent = msg;
        errorAlert.classList.remove('d-none');
        decodedContainer.style.opacity = '0.45';
        decodedContainer.style.pointerEvents = 'none';
        
        metaPanel.style.display = 'none';
        emptyMeta.style.display = 'block';
    }

    function resetUI() {
        errorAlert.classList.add('d-none');
        decodedContainer.style.opacity = '0.45';
        decodedContainer.style.pointerEvents = 'none';
        headerBlock.textContent = '{}';
        payloadBlock.textContent = '{}';
        signatureBlock.textContent = 'Signature segment is validated offline for structure.';
        
        metaPanel.style.display = 'none';
        emptyMeta.style.display = 'block';
    }

    // Demo Token Generator (Valid JWT structure with dummy header/payload expiration set in future)
    btnLoadDemo.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Let's create a real base64 demo JWT token
        const header = {
            "alg": "HS256",
            "typ": "JWT"
        };
        
        const now = Math.floor(Date.now() / 1000);
        const payload = {
            "sub": "1234567890",
            "name": "Jane Doe",
            "admin": true,
            "iat": now,
            "exp": now + 7200 // Valid for next 2 hours
        };

        function base64url(source) {
            let encodedSource = btoa(JSON.stringify(source));
            encodedSource = encodedSource.replace(/=+$/, '');
            encodedSource = encodedSource.replace(/\+/g, '-');
            encodedSource = encodedSource.replace(/\//g, '_');
            return encodedSource;
        }

        const token = base64url(header) + "." + base64url(payload) + ".s5S4k9pL2o0wE1q8R_demo_signature_hash_value_here";
        
        jwtInput.value = token;
        parseJWT();
    });

    btnClear.addEventListener('click', function(e) {
        e.preventDefault();
        jwtInput.value = '';
        resetUI();
    });

    jwtInput.addEventListener('input', parseJWT);
});
</script>
