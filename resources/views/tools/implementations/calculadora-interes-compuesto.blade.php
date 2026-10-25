<div class="compound-interest-wrapper">
    <div class="row g-4">
        <!-- Controls Panel -->
        <div class="col-12 col-lg-5">
            <div class="card border-0 shadow-sm bg-light h-100">
                <div class="card-body p-4">
                    <!-- Selector de Moneda -->
                    <div class="mb-3">
                        <label for="ci-currency-select" class="form-label fw-bold">@lang('tools.ci_currency')</label>
                        <select class="form-select shadow-none" id="ci-currency-select">
                            <option value="USD" data-symbol="$" selected>USD ($)</option>
                            <option value="EUR" data-symbol="€">EUR (€)</option>
                            <option value="GBP" data-symbol="£">GBP (£)</option>
                            <option value="MXN" data-symbol="$">MXN ($)</option>
                            <option value="PEN" data-symbol="S/.">PEN (S/.)</option>
                            <option value="CLP" data-symbol="$">CLP ($)</option>
                            <option value="COP" data-symbol="$">COP ($)</option>
                            <option value="ARS" data-symbol="$">ARS ($)</option>
                        </select>
                    </div>

                    <!-- Principal -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <label for="ci-principal-input" class="form-label fw-bold mb-0">@lang('tools.ci_principal')</label>
                            <span class="fw-bold text-primary" id="lbl-principal">$10,000</span>
                        </div>
                        <input type="range" class="form-range" id="ci-principal-input" min="0" max="100000" step="1000" value="10000">
                    </div>

                    <!-- Monthly Deposit -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <label for="ci-monthly-input" class="form-label fw-bold mb-0">@lang('tools.ci_monthly')</label>
                            <span class="fw-bold text-primary" id="lbl-monthly">$200</span>
                        </div>
                        <input type="range" class="form-range" id="ci-monthly-input" min="0" max="5000" step="50" value="200">
                    </div>

                    <!-- Interest Rate -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <label for="ci-rate-input" class="form-label fw-bold mb-0">@lang('tools.ci_rate')</label>
                            <span class="fw-bold text-primary" id="lbl-rate">8%</span>
                        </div>
                        <input type="range" class="form-range" id="ci-rate-input" min="1" max="30" step="0.5" value="8">
                    </div>

                    <!-- Horizon Years -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <label for="ci-years-input" class="form-label fw-bold mb-0">@lang('tools.ci_years')</label>
                            <span class="fw-bold text-primary" id="lbl-years">20 años</span>
                        </div>
                        <input type="range" class="form-range" id="ci-years-input" min="1" max="50" step="1" value="20">
                    </div>

                    <!-- Frequency Selector -->
                    <div class="mb-0">
                        <label for="ci-frequency-select" class="form-label fw-bold">@lang('tools.ci_frequency')</label>
                        <select class="form-select shadow-none" id="ci-frequency-select">
                            <option value="12" selected>@lang('tools.ci_freq_monthly')</option>
                            <option value="1">@lang('tools.ci_freq_annual')</option>
                            <option value="2">@lang('tools.ci_freq_semiannual')</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart & Results Panel -->
        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Numeric Summaries -->
                        <div class="row g-2 mb-4 text-center">
                            <div class="col-4">
                                <div class="p-2 border border-light rounded">
                                    <div class="text-muted fs-12 mb-1">@lang('tools.ci_total_balance')</div>
                                    <h6 class="fw-bold text-success mb-0" id="res-ci-balance">$0.00</h6>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="p-2 border border-light rounded">
                                    <div class="text-muted fs-12 mb-1">@lang('tools.ci_total_principal')</div>
                                    <h6 class="fw-bold text-dark mb-0" id="res-ci-principal">$0.00</h6>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="p-2 border border-light rounded">
                                    <div class="text-muted fs-12 mb-1">@lang('tools.ci_total_interest')</div>
                                    <h6 class="fw-bold text-primary mb-0" id="res-ci-interest">$0.00</h6>
                                </div>
                            </div>
                        </div>

                        <!-- Gorgeous Custom SVG Chart -->
                        <h6 class="fw-bold mb-2 text-muted text-center">@lang('tools.ci_chart_title')</h6>
                        <div class="bg-light rounded p-2 mb-3 position-relative" style="height: 220px;">
                            <svg id="ci-chart" class="w-100 h-100" viewBox="0 0 500 220" style="overflow: visible;">
                                <defs>
                                    <linearGradient id="colorInterest" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="5%" stop-color="#198754" stop-opacity="0.3"/>
                                        <stop offset="95%" stop-color="#198754" stop-opacity="0.0"/>
                                    </linearGradient>
                                    <linearGradient id="colorDeposits" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="5%" stop-color="#0d6efd" stop-opacity="0.3"/>
                                        <stop offset="95%" stop-color="#0d6efd" stop-opacity="0.0"/>
                                    </linearGradient>
                                </defs>
                                
                                <!-- Chart grid lines -->
                                <line x1="40" y1="20" x2="480" y2="20" stroke="#e9ecef" stroke-dasharray="4"/>
                                <line x1="40" y1="70" x2="480" y2="70" stroke="#e9ecef" stroke-dasharray="4"/>
                                <line x1="40" y1="120" x2="480" y2="120" stroke="#e9ecef" stroke-dasharray="4"/>
                                <line x1="40" y1="170" x2="480" y2="170" stroke="#e9ecef" stroke-dasharray="4"/>
                                
                                <!-- Axes -->
                                <line x1="40" y1="180" x2="480" y2="180" stroke="#ced4da" stroke-width="1.5"/>
                                <line x1="40" y1="10" x2="40" y2="180" stroke="#ced4da" stroke-width="1.5"/>

                                <!-- Y Axis Labels -->
                                <text x="32" y="24" fill="#6c757d" font-size="10" text-anchor="end" id="y-lbl-1">100k</text>
                                <text x="32" y="74" fill="#6c757d" font-size="10" text-anchor="end" id="y-lbl-2">50k</text>
                                <text x="32" y="124" fill="#6c757d" font-size="10" text-anchor="end" id="y-lbl-3">25k</text>
                                <text x="32" y="174" fill="#6c757d" font-size="10" text-anchor="end">0</text>
                                
                                <!-- SVG Paths for compound growth -->
                                <path id="path-interest" fill="url(#colorInterest)" stroke="#198754" stroke-width="2.5" d="M 40 180 Z"/>
                                <path id="path-deposits" fill="url(#colorDeposits)" stroke="#0d6efd" stroke-width="2" d="M 40 180 Z"/>

                                <!-- Legend -->
                                <g transform="translate(60, 205)">
                                    <circle cx="0" cy="-4" r="5" fill="#0d6efd"/>
                                    <text x="10" y="0" fill="#495057" font-size="11">Capital Depositado</text>
                                    
                                    <circle cx="160" cy="-4" r="5" fill="#198754"/>
                                    <text x="170" y="0" fill="#495057" font-size="11">Interés Compuesto</text>
                                </g>

                                <!-- X axis label limits -->
                                <text x="40" y="195" fill="#6c757d" font-size="10" text-anchor="middle">Año 0</text>
                                <text x="480" y="195" fill="#6c757d" font-size="10" text-anchor="middle" id="x-lbl-end">Año 20</text>
                            </svg>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success w-100" id="btn-ci-copy">
                        <i class="ri-file-copy-line align-middle me-1"></i> @lang('tools.copy_text')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const inCurrency = document.getElementById('ci-currency-select');
    const inPrincipal = document.getElementById('ci-principal-input');
    const inMonthly = document.getElementById('ci-monthly-input');
    const inRate = document.getElementById('ci-rate-input');
    const inYears = document.getElementById('ci-years-input');
    const inFreq = document.getElementById('ci-frequency-select');

    const lblPrincipal = document.getElementById('lbl-principal');
    const lblMonthly = document.getElementById('lbl-monthly');
    const lblRate = document.getElementById('lbl-rate');
    const lblYears = document.getElementById('lbl-years');

    const resBalance = document.getElementById('res-ci-balance');
    const resPrincipal = document.getElementById('res-ci-principal');
    const resInterest = document.getElementById('res-ci-interest');

    const pathInterest = document.getElementById('path-interest');
    const pathDeposits = document.getElementById('path-deposits');

    const yLbl1 = document.getElementById('y-lbl-1');
    const yLbl2 = document.getElementById('y-lbl-2');
    const yLbl3 = document.getElementById('y-lbl-3');
    const xLblEnd = document.getElementById('x-lbl-end');
    const btnCopy = document.getElementById('btn-ci-copy');

    function formatCurrency(val) {
        const currencyCode = inCurrency.value;
        return new Intl.NumberFormat(undefined, { 
            style: 'currency', 
            currency: currencyCode, 
            maximumFractionDigits: 0 
        }).format(val);
    }

    function calculateCompound() {
        const principal = parseFloat(inPrincipal.value);
        const monthly = parseFloat(inMonthly.value);
        const rate = parseFloat(inRate.value) / 100;
        const years = parseInt(inYears.value);
        const freq = parseInt(inFreq.value);

        // Update UI labels
        lblPrincipal.textContent = formatCurrency(principal);
        lblMonthly.textContent = formatCurrency(monthly) + '/mes';
        lblRate.textContent = (rate * 100).toFixed(1) + '%';
        lblYears.textContent = `${years} ` + (years === 1 ? 'año' : 'años');
        xLblEnd.textContent = `Año ${years}`;

        let currentBalance = principal;
        let totalDeposited = principal;
        
        const yearlyData = [{ year: 0, principal: totalDeposited, balance: currentBalance }];

        for (let year = 1; year <= years; year++) {
            // Formula calculated per compound frequency
            const r = rate / freq;
            const n = freq; // compounding periods per year
            
            // Compounding principal
            let newBalance = currentBalance * Math.pow(1 + r, n);
            
            // Add monthly deposits compounded
            if (monthly > 0) {
                // If compounded n times per year, deposits added monthly are accumulated
                // To keep it clean, we calculate month-by-month compounding internally for the year:
                for (let m = 1; m <= 12; m++) {
                    // Compound existing
                    currentBalance = currentBalance * Math.pow(1 + rate / 12, 1);
                    // Add deposit
                    currentBalance += monthly;
                    totalDeposited += monthly;
                }
                newBalance = currentBalance;
            } else {
                totalDeposited += 0; // no extra deposits
                currentBalance = newBalance;
            }

            yearlyData.push({
                year: year,
                principal: totalDeposited,
                balance: newBalance
            });
        }

        const totalEarnedInterest = currentBalance - totalDeposited;

        resBalance.textContent = formatCurrency(currentBalance);
        resPrincipal.textContent = formatCurrency(totalDeposited);
        resInterest.textContent = formatCurrency(totalEarnedInterest);

        drawChart(yearlyData, years);
    }

    function drawChart(data, years) {
        const maxVal = data[data.length - 1].balance * 1.1; // 10% padding
        
        // Update Y axis labels
        yLbl1.textContent = formatCurrency(maxVal * 0.9);
        yLbl2.textContent = formatCurrency(maxVal * 0.6);
        yLbl3.textContent = formatCurrency(maxVal * 0.3);

        const chartWidth = 440; // 480 - 40
        const chartHeight = 170; // 180 - 10
        const startX = 40;
        const startY = 180;

        let dInterest = `M ${startX} ${startY}`;
        let dDeposits = `M ${startX} ${startY}`;

        data.forEach((d) => {
            const pctX = d.year / years;
            const x = startX + pctX * chartWidth;

            // Compounded Interest Y height
            const pctYInterest = d.balance / maxVal;
            const yInterest = startY - pctYInterest * chartHeight;
            dInterest += ` L ${x} ${yInterest}`;

            // Deposits Y height
            const pctYDeposits = d.principal / maxVal;
            const yDeposits = startY - pctYDeposits * chartHeight;
            dDeposits += ` L ${x} ${yDeposits}`;
        });

        // Close shapes for background color area gradients
        dInterest += ` L ${startX + chartWidth} ${startY} Z`;
        dDeposits += ` L ${startX + chartWidth} ${startY} Z`;

        pathInterest.setAttribute('d', dInterest);
        pathDeposits.setAttribute('d', dDeposits);
    }

    inCurrency.addEventListener('change', calculateCompound);
    inPrincipal.addEventListener('input', calculateCompound);
    inMonthly.addEventListener('input', calculateCompound);
    inRate.addEventListener('input', calculateCompound);
    inYears.addEventListener('input', calculateCompound);
    inFreq.addEventListener('change', calculateCompound);

    btnCopy.addEventListener('click', function(e) {
        e.preventDefault();
        
        const summary = 
            `Depósito Inicial: ${lblPrincipal.textContent}\n` +
            `Aportación Mensual: ${lblMonthly.textContent}\n` +
            `Tasa de Interés: ${lblRate.textContent}\n` +
            `Plazo: ${lblYears.textContent}\n` +
            `Balance Total Final: ${resBalance.textContent}\n` +
            `Total Capital Depositado: ${resPrincipal.textContent}\n` +
            `Total Intereses Ganados: ${resInterest.textContent}`;
            
        navigator.clipboard.writeText(summary).then(function() {
            const originalHTML = btnCopy.innerHTML;
            btnCopy.innerHTML = '<i class="ri-check-line align-middle me-1"></i> Copied!';
            setTimeout(() => {
                btnCopy.innerHTML = originalHTML;
            }, 2000);
        });
    });

    // Run initial calculation
    calculateCompound();
});
</script>
