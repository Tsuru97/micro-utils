<div class="loan-calculator-wrapper">
    <div class="row g-4">
        <!-- Form Panel -->
        <div class="col-12 col-lg-5">
            <div class="card border-0 shadow-sm bg-light h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4 text-primary">
                        <i class="ri-calculator-line align-middle me-1"></i> @lang('tools.mi_campo_entrada')
                    </h5>

                    <form id="loan-form">
                        <!-- Loan Amount -->
                        <div class="mb-3">
                            <label for="loan-amount" class="form-label fw-bold">@lang('tools.loan_amount')</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 text-muted" id="currency-addon">$</span>
                                <input type="number" class="form-control border-start-0 shadow-none" id="loan-amount" value="10000" min="1" step="100" required>
                            </div>
                        </div>

                        <!-- Interest Rate -->
                        <div class="mb-3">
                            <label for="loan-rate" class="form-label fw-bold">@lang('tools.loan_rate')</label>
                            <input type="number" class="form-control shadow-none" id="loan-rate" value="7.5" min="0" max="100" step="0.01" required>
                        </div>

                        <!-- Term Period & Type -->
                        <div class="mb-3">
                            <label for="loan-term" class="form-label fw-bold">@lang('tools.loan_term')</label>
                            <div class="row g-2">
                                <div class="col-7">
                                    <input type="number" class="form-control shadow-none" id="loan-term" value="5" min="1" required>
                                </div>
                                <div class="col-5">
                                    <select class="form-select shadow-none" id="loan-term-type">
                                        <option value="years" selected>@lang('tools.loan_term_years')</option>
                                        <option value="months">@lang('tools.loan_term_months')</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Currency Selector -->
                        <div class="mb-4">
                            <label for="loan-currency" class="form-label fw-bold">@lang('tools.loan_currency')</label>
                            <select class="form-select shadow-none" id="loan-currency">
                                <option value="$" selected>USD ($)</option>
                                <option value="€">EUR (€)</option>
                                <option value="MXN $">MXN ($)</option>
                                <option value="£">GBP (£)</option>
                                <option value="COL $">COP ($)</option>
                                <option value="AR $">ARS ($)</option>
                                <option value="CL $">CLP ($)</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2.5 fw-bold" id="btn-calculate-loan">
                            <i class="ri-play-line align-middle me-1"></i> @lang('tools.loan_calculate')
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Dynamic Output & WOW Table Panel -->
        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-4 text-primary">
                            <i class="ri-line-chart-line align-middle me-1"></i> @lang('tools.mi_campo_salida')
                        </h5>

                        <!-- Aggregates / Key Numbers -->
                        <div class="row g-3 mb-4">
                            <div class="col-12 col-sm-4">
                                <div class="card border-0 bg-primary-subtle text-primary p-3 h-100">
                                    <div class="fs-12 fw-bold text-uppercase opacity-75">@lang('tools.loan_monthly_payment')</div>
                                    <h4 class="fw-bold mb-0 mt-1" id="out-monthly-payment">0.00</h4>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="card border-0 bg-danger-subtle text-danger p-3 h-100">
                                    <div class="fs-12 fw-bold text-uppercase opacity-75">@lang('tools.loan_total_interest')</div>
                                    <h4 class="fw-bold mb-0 mt-1" id="out-total-interest">0.00</h4>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="card border-0 bg-success-subtle text-success p-3 h-100">
                                    <div class="fs-12 fw-bold text-uppercase opacity-75">@lang('tools.loan_total_payment')</div>
                                    <h4 class="fw-bold mb-0 mt-1" id="out-total-payment">0.00</h4>
                                </div>
                            </div>
                        </div>

                        <!-- Scrollable Amortization Schedule -->
                        <h6 class="fw-bold text-dark mb-2">@lang('tools.loan_amortization_table')</h6>
                        <div class="table-responsive rounded-3 border border-light" style="max-height: 300px;">
                            <table class="table table-hover table-striped mb-0 align-middle text-center fs-13" id="amortization-table">
                                <thead class="table-primary text-white position-sticky top-0" style="z-index: 1;">
                                    <tr>
                                        <th>@lang('tools.loan_table_period')</th>
                                        <th>@lang('tools.loan_table_payment')</th>
                                        <th>@lang('tools.loan_table_principal')</th>
                                        <th>@lang('tools.loan_table_interest')</th>
                                        <th>@lang('tools.loan_table_balance')</th>
                                    </tr>
                                </thead>
                                <tbody id="amortization-tbody">
                                    <!-- Dynamic rows -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('loan-form');
    const elAmount = document.getElementById('loan-amount');
    const elRate = document.getElementById('loan-rate');
    const elTerm = document.getElementById('loan-term');
    const elTermType = document.getElementById('loan-term-type');
    const elCurrency = document.getElementById('loan-currency');
    const currencyAddon = document.getElementById('currency-addon');

    const outMonthly = document.getElementById('out-monthly-payment');
    const outTotalInterest = document.getElementById('out-total-interest');
    const outTotalPayment = document.getElementById('out-total-payment');
    const tableBody = document.getElementById('amortization-tbody');

    // Update currency addon instantly when selecting currency
    elCurrency.addEventListener('change', function() {
        currencyAddon.textContent = this.value;
        calculateSchedule();
    });

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        calculateSchedule();
    });

    function formatMoney(amount, currency) {
        return currency + ' ' + amount.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function calculateSchedule() {
        const amount = parseFloat(elAmount.value);
        const annualRate = parseFloat(elRate.value);
        const term = parseInt(elTerm.value);
        const termType = elTermType.value;
        const currency = elCurrency.value;

        if (isNaN(amount) || isNaN(annualRate) || isNaN(term) || amount <= 0 || annualRate < 0 || term <= 0) {
            return;
        }

        // 1. Calculate number of months
        const totalMonths = (termType === 'years') ? (term * 12) : term;

        // 2. Monthly interest rate
        const monthlyRate = annualRate / 12 / 100;

        // 3. Constant periodic payment (French amortization formula)
        let monthlyPayment = 0;
        if (monthlyRate === 0) {
            monthlyPayment = amount / totalMonths;
        } else {
            monthlyPayment = amount * (monthlyRate * Math.pow(1 + monthlyRate, totalMonths)) / (Math.pow(1 + monthlyRate, totalMonths) - 1);
        }

        let remainingBalance = amount;
        let totalInterestPaid = 0;

        tableBody.innerHTML = '';

        for (let month = 1; month <= totalMonths; month++) {
            const interestPaid = remainingBalance * monthlyRate;
            let principalPaid = monthlyPayment - interestPaid;

            // Handle potential precision edge case on final period
            if (month === totalMonths) {
                principalPaid = remainingBalance;
                monthlyPayment = principalPaid + interestPaid;
            }

            remainingBalance -= principalPaid;
            totalInterestPaid += interestPaid;

            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="fw-bold text-muted">${month}</td>
                <td class="fw-semibold">${formatMoney(monthlyPayment, currency)}</td>
                <td class="text-success">${formatMoney(principalPaid, currency)}</td>
                <td class="text-danger">${formatMoney(interestPaid, currency)}</td>
                <td class="fw-bold">${formatMoney(Math.max(0, remainingBalance), currency)}</td>
            `;
            tableBody.appendChild(row);
        }

        const totalPayments = amount + totalInterestPaid;

        // Display results in dashboard cards
        outMonthly.textContent = formatMoney(monthlyPayment, currency);
        outTotalInterest.textContent = formatMoney(totalInterestPaid, currency);
        outTotalPayment.textContent = formatMoney(totalPayments, currency);
    }

    // Run once at loading time
    calculateSchedule();
});
</script>
