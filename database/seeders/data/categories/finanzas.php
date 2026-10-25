<?php

return [
    'slug' => 'finanzas',
    'name' => ['es' => 'Finanzas', 'en' => 'Finance'],
    'icon' => 'ri-hand-coin-line',
    'order' => 4,
    'tools' => [
        [
            'slug' => 'calculadora-de-iva',
            'name' => ['es' => 'Calculadora de IVA', 'en' => 'VAT / Tax Calculator'],
            'description' => [
                'es' => '<p>Calcula y desglosa el Impuesto al Valor Agregado (IVA) o impuestos de ventas de forma rápida. Suma o resta tasas de varios países en segundos.</p>',
                'en' => '<p>Quickly calculate and break down Value Added Tax (VAT) or sales taxes. Add or subtract tax rates from various countries in seconds.</p>'
            ],
            'blade_view_name' => 'tools.implementations.calculadora-de-iva',
            'is_active' => true,
            'order' => 1,
            'seo' => [
                'title' => ['es' => 'Calculadora de IVA Gratis en Línea | MicroUtils', 'en' => 'Free Online VAT / Sales Tax Calculator | MicroUtils'],
                'description' => ['es' => 'Calcula y desglosa el IVA e impuestos sobre el neto o el total fácilmente. Ideal para freelancers y empresas. 100% gratuito.', 'en' => 'Easily calculate and break down VAT/taxes on net or total values. Ideal for freelancers and businesses. 100% free.'],
                'keywords' => ['es' => 'calculadora de iva, desglosar iva, calcular impuestos, iva 16, iva 21', 'en' => 'vat calculator, sales tax calculator, calculate vat, break down vat, tax calculator']
            ]
        ],
        [
            'slug' => 'calculadora-interes-compuesto',
            'name' => ['es' => 'Calculadora de Interés Compuesto', 'en' => 'Compound Interest Calculator'],
            'description' => [
                'es' => '<p>Calcula el crecimiento de tus inversiones con interés compuesto. Visualiza el crecimiento año por año con un gráfico interactivo en tiempo real.</p>',
                'en' => '<p>Calculate the growth of your investments with compound interest. Visualize year-by-year growth with an interactive real-time chart.</p>'
            ],
            'blade_view_name' => 'tools.implementations.calculadora-interes-compuesto',
            'is_active' => true,
            'order' => 2,
            'seo' => [
                'title' => ['es' => 'Calculadora de Interés Compuesto con Gráfico en Línea', 'en' => 'Free Online Compound Interest Calculator with Chart'],
                'description' => ['es' => 'Proyecta tus ahorros y ganancias a futuro calculando interés compuesto. Gráfico interactivo dinámico, aportaciones mensuales y plazos personalizados.', 'en' => 'Project your future savings and earnings by calculating compound interest. Dynamic interactive chart, monthly deposits, and custom periods.'],
                'keywords' => ['es' => 'calculadora interes compuesto, calcular interes compuesto online, interes compuesto formula, ahorro e inversion', 'en' => 'compound interest calculator, calculate compound interest, compound interest formula, compound growth calculator']
            ]
        ],
        [
            'slug' => 'calculadora-prestamos',
            'name' => ['es' => 'Calculadora de Préstamos y Amortizaciones', 'en' => 'Loan Amortization Calculator'],
            'description' => [
                'es' => '<p>Calcula cuotas y genera la tabla de amortización para préstamos utilizando el sistema francés con cuotas fijas. Desglosa abonos a capital, intereses y saldos pendientes.</p>',
                'en' => '<p>Calculate loan payments and generate full amortization tables using the French fixed installment system. Breaks down principal payments, interest, and balances.</p>'
            ],
            'blade_view_name' => 'tools.implementations.calculadora-prestamos',
            'is_active' => true,
            'order' => 3,
            'seo' => [
                'title' => ['es' => 'Calculadora de Préstamos y Tabla de Amortización Gratis en Línea', 'en' => 'Free Online Loan Amortization Schedule Calculator'],
                'description' => ['es' => 'Proyecta tus pagos mensuales de préstamos, hipotecas o créditos. Genera de forma automática la tabla de amortización del sistema francés con desglose contable detallado.', 'en' => 'Project your mortgage or credit monthly payments. Generates a detailed period-by-period French amortization schedule with professional accounting breakdown.'],
                'keywords' => ['es' => 'calculadora de prestamos, amortizacion de creditos, tabla de amortizacion francesa, simulador hipotecario, calcular cuotas credito', 'en' => 'loan calculator, amortization table, mortgage calculator, french amortization schedule, calculate loan payment online']
            ]
        ]
    ]
];
