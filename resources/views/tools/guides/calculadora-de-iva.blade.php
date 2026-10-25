<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Calculadora de IVA y Tasas de Impuestos
            </h4>
            <p class="text-muted">
                El **Impuesto al Valor Agregado (IVA)** o impuesto a las ventas es un impuesto indirecto sobre el consumo que se aplica a la transferencia de bienes o prestación de servicios. Calcular correctamente el IVA es fundamental para autónomos, emprendedores, contadores y consumidores con el fin de emitir facturas legales correctas, declarar impuestos ante el fisco o verificar el costo real de una compra.
            </p>
            <p class="text-muted">
                Nuestra calculadora interactiva te permite desglosar de forma sencilla cualquier importe de dos maneras: **Sumar IVA** (cuando conoces la base neta y necesitas calcular el impuesto correspondiente para obtener el total) o **Restar IVA** (desglosar el impuesto cuando tienes un precio de venta total con IVA incluido para deducir el neto base y el impuesto por separado).
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo utilizar esta calculadora en línea?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Selecciona el **Tipo de Cálculo**: Sumar IVA (Neto a Total) o Restar IVA (Total a Neto).</li>
                <li>Ingresa el **Monto Base** (importe sobre el cual deseas computar).</li>
                <li>Establece la **Tasa de IVA / Impuesto (%)** escribiéndola directamente o utilizando el control deslizante.</li>
                <li>Utiliza los **botones de acceso rápido** (Presets) para seleccionar instantáneamente las tasas estándar de varios países (como el 21% de España, 16% de México, 19% de Chile, 20% del Reino Unido, etc.).</li>
                <li>Visualiza el desglose en tiempo real y copia el resumen contable detallado haciendo clic en **"Copiar texto"**.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Garantizamos la privacidad de tus datos. Todo el procesamiento matemático de la calculadora se realiza en tu navegador web localmente a través de JavaScript de manera inmediata. Ningún dato sensible es transmitido ni almacenado en nuestros servidores, haciendo el proceso 100% privado y seguro.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: VAT & Sales Tax Calculator
            </h4>
            <p class="text-muted">
                **Value Added Tax (VAT)**, or sales tax, is a general, consumption-based tax placed on goods and services. Calculating these taxes accurately is vital for self-employed professionals, freelancers, small businesses, and buyers to draft appropriate receipts, comply with tax declarations, or estimate purchase budgets correctly.
            </p>
            <p class="text-muted">
                Our responsive calculator allows you to compute prices under two clear paradigms: **Add VAT / Tax** (when starting from a net amount to calculate the added tax and output the grand total) or **Subtract VAT / Tax** (to break down a tax-inclusive total price to reveal both the underlying net base value and the tax portion independently).
            </p>
            
            <h5 class="text-dark mt-4">How to use this online tax calculator?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Choose the **Calculation Type**: Add VAT / Tax (Net to Total) or Subtract VAT / Tax (Total to Net).</li>
                <li>Input the starting **Base Amount** in your currency.</li>
                <li>Set the **VAT / Tax Rate (%)** by entering the value or using the range slider.</li>
                <li>Use the **Common Presets** to quickly select typical tax rates for various countries, including 21% (Spain), 16% (Mexico), 19% (Chile), 20% (United Kingdom), 10% (Australia), or 8.25% (United States).</li>
                <li>Instantly review the broken-down results on the right card and click **"Copy text"** to copy a structured text summary to your clipboard.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local Execution:</strong> We care deeply about your privacy. All mathematical computations occur fully in your browser memory via client-side JavaScript. No data is sent or saved on our servers, ensuring 100% privacy and security.
            </div>
        @endif
    </div>
</div>
