<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: El Poder del Interés Compuesto
            </h4>
            <p class="text-muted">
                El **interés compuesto** ha sido catalogado por célebres pensadores e inversores como Albert Einstein como "la octava maravilla del mundo". A diferencia del interés simple (donde las ganancias de cada período se retiran y el interés siempre se calcula únicamente sobre el capital original), el interés compuesto permite que los rendimientos generados en cada ciclo se sumen al saldo total, de manera que **los propios intereses generen nuevos intereses** en los siguientes períodos.
            </p>
            <p class="text-muted">
                Este efecto multiplicador da como resultado una **curva de crecimiento exponencial**, visible en nuestro gráfico apilado en tiempo real. Durante los primeros años, el aumento de tus ahorros parece lineal y lento, pero a largo plazo, la acumulación de intereses supera exponencialmente a tus depósitos físicos directos, multiplicando tu patrimonio neto de forma asombrosa.
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo utilizar esta calculadora financiera?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Ajusta el **Depósito Inicial** usando el deslizador para establecer tu capital de partida.</li>
                <li>Define la **Contribución Mensual** que planeas depositar regularmente. Incluso cantidades pequeñas mensuales marcan una diferencia colosal a largo plazo.</li>
                <li>Establece la **Tasa de Interés Anual (%)** estimada de tu vehículo de inversión.</li>
                <li>Elige el **Plazo en Años** para ver la evolución del crecimiento en tu horizonte temporal.</li>
                <li>Visualiza de inmediato los totales desglosados y el gráfico SVG dinámico que separa de forma interactiva tu capital depositado de los intereses compuestos ganados.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Garantizamos la privacidad de tus datos financieros de forma absoluta. Todo el procesamiento matemático y el renderizado dinámico de la gráfica vectorial se realiza en tu navegador web de forma instantánea usando JavaScript. Ningún dato sobre tus presupuestos o inversiones es transmitido ni almacenado en nuestros servidores, haciendo el proceso 100% privado y seguro.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: The Exponential Power of Compound Interest
            </h4>
            <p class="text-muted">
                **Compound interest** has been famously referred to by legendary minds like Albert Einstein as "the eighth wonder of the world". Unlike simple interest—where interest earned during a cycle is withdrawn and new earnings are computed solely on the original principal—compound interest ensures that **interest earned is added back to the balance**, allowing your earnings to generate brand new earnings in subsequent periods.
            </p>
            <p class="text-muted">
                This compounding dynamic shapes a distinct **exponential growth curve**, visible instantly on our custom vector chart. In the starting years, your savings trajectory might look modest and linear, but as time advances, compound interest begins to snowball, eventually overtaking physical deposits to multiply your net worth dramatically.
            </p>
            
            <h5 class="text-dark mt-4">How to utilize this financial planner?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Adjust the **Starting Balance** slider to define your initial lump-sum principal.</li>
                <li>Select the **Monthly Contribution** you plan to save regularly. Consistent monthly habits compound into massive wealth over long horizons.</li>
                <li>Define the projected **Annual Interest Rate (%)** of your savings yield or investment portfolio.</li>
                <li>Drag the **Horizon in Years** slider to chart the asset growth across different target timelines.</li>
                <li>Review the numeric summaries and interactive SVG chart, dividing your cumulative cash deposits from the exponential interest returns over time.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local Execution:</strong> We care deeply about your privacy. All financial projections and vector graphic renders are performed entirely on your device via client-side JavaScript. Your personal net worth targets never touch our servers, assuring 100% security and privacy.
            </div>
        @endif
    </div>
</div>
