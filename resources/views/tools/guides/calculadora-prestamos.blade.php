<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Calculadora de Préstamos y Tabla de Amortización
            </h4>
            <p class="text-muted">
                Un **préstamo** es una operación financiera en la que una entidad o persona (prestamista) entrega una cantidad de dinero a otra (prestatario) a cambio de la obligación de devolver ese capital junto con los intereses devengados, distribuidos en un plazo acordado. Planificar un crédito requiere conocer de antemano el impacto de las tasas y el flujo de los pagos mensuales.
            </p>
            <p class="text-muted">
                Esta calculadora avanzada utiliza el **Sistema de Amortización Francés**, el método más utilizado por bancos e instituciones hipotecarias a nivel global. Se caracteriza por mantener **cuotas mensuales fijas e idénticas** a lo largo de la vida del crédito. Al inicio, la mayor parte del pago mensual se destina a cubrir los intereses devengados, y a medida que el saldo insoluto del capital disminuye, el abono directo al capital se incrementa progresivamente en cada período.
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo utilizar esta calculadora financiera?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Ingresa el **Monto del Préstamo** (capital total solicitado).</li>
                <li>Establece la **Tasa de Interés Anual (%)** nominal pactada con tu institución.</li>
                <li>Determina el **Plazo del Préstamo** e indica en el selector lateral si el número corresponde a **Años** o **Meses**.</li>
                <li>Selecciona tu **Tipo de Moneda** preferido para formatear las cifras con los símbolos adecuados (soporta USD $, EUR €, MXN $, GBP £, COP $, CLP $, ARS $).</li>
                <li>Haz clic en **"Calcular Tabla de Amortización"** para procesar la información.</li>
                <li>Analiza las tarjetas informativas superiores que te muestran el **Pago Mensual Estimado**, el **Total de Intereses a Pagar** acumulados y el **Monto Total de Pagos** (capital + interés).</li>
                <li>Explora la **Tabla de Amortización completa** paso a paso en la sección derecha, donde se detalla período a período la cuota total, el desglose de lo destinado a capital, lo destinado a interés y el saldo pendiente restante.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Garantizamos la privacidad de tu información financiera. Todo el procesamiento matemático de la fórmula de amortización francesa y el renderizado de la tabla se realizan en tu navegador web de forma instantánea a través de JavaScript. No guardamos ni transmitimos tus importes o tasas a servidores.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Amortization Loan Calculator
            </h4>
            <p class="text-muted">
                A **loan** is a financial contract where an institution or individual (lender) advances money to another (borrower) in exchange for future repayments of the principal amount along with accrued interest charges, distributed over a predetermined horizon. Evaluating terms beforehand is crucial to prevent budget overruns.
            </p>
            <p class="text-muted">
                Our advanced financial utility implements the **French Amortization Method**, which is the global banking benchmark for personal, car, and mortgage loans. This model establishes **fixed, equal periodic installments** throughout the life of the loan. Early periods feature higher interest weights relative to capital, but as the principal balance decreases, the direct capital repayment portion grows dynamically with every installment.
            </p>
            
            <h5 class="text-dark mt-4">How to compute your loan amortization schedule?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Input the total **Loan Amount** (the principal borrowed).</li>
                <li>Enter the annual nominal **Interest Rate (%)** supplied by your bank.</li>
                <li>State the target **Loan Term** and specify if the period represents **Years** or **Months** using the adjacent selector.</li>
                <li>Choose your **Currency Type** to format values correctly (supports USD $, EUR €, MXN $, GBP £, COP $, CLP $, ARS $).</li>
                <li>Press **"Calculate Amortization Schedule"** to begin calculations.</li>
                <li>Analyze the dashboard cards showing the **Estimated Monthly Payment**, **Total Interest to Pay**, and **Total Payments Amount** (Principal + Interest).</li>
                <li>Browse the interactive period-by-period **Amortization Table** detailing exact interest costs, direct principal reductions, and remaining balances at each month.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local Computation:</strong> Financial confidentiality is guaranteed. All French system amortizations and interest breakdowns are executed 100% locally on your computer via client-side JavaScript. No data is stored or transmitted.
            </div>
        @endif
    </div>
</div>
