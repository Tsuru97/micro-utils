<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Conversor de Bases Numéricas
            </h4>
            <p class="text-muted">
                Un **sistema de numeración** es un conjunto de símbolos y reglas que se utilizan para representar datos numéricos o cantidades. El sistema que empleamos en nuestra vida cotidiana es el **Sistema Decimal (Base 10)**, el cual utiliza diez dígitos (del 0 al 9) y es un sistema posicional basado en potencias de diez. Sin embargo, en el mundo de la computación y la electrónica digital, existen otros sistemas que son la base fundamental de las tecnologías de la información.
            </p>
            <p class="text-muted">
                Esta micro-herramienta te permite convertir de forma inmediata cualquier número entre los cuatro sistemas posicionales más relevantes:
            </p>
            <ul class="text-muted ps-3 mb-4">
                <li>**Sistema Binario (Base 2):** Utiliza únicamente dos dígitos (`0` y `1`). Representa el lenguaje primario de las computadoras (encendido/apagado, bits de datos).</li>
                <li>**Sistema Octal (Base 8):** Agrupa bits en bloques de tres, utilizando los dígitos del 0 al 7. Muy popular históricamente en la informática clásica y sistemas de permisos de archivos de tipo Unix/Linux.</li>
                <li>**Sistema Decimal (Base 10):** El sistema estándar de representación humana.</li>
                <li>**Sistema Hexadecimal (Base 16):** Utiliza dieciséis dígitos (los números del 0 al 9 y las letras de la A a la F). Es el estándar para representar de forma abreviada bytes, direcciones de memoria física de hardware y códigos de color CSS (como `#FFFFFF`).</li>
            </ul>
            
            <h5 class="text-dark mt-4">¿Cómo realizar conversiones de base en línea?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Selecciona el **Base del Número de Entrada** correspondiente al número que vas a ingresar (Binario, Octal, Decimal o Hexadecimal).</li>
                <li>Escribe o pega el valor a convertir en el campo **Número de Entrada**. La interfaz validará en tiempo real tu entrada. Si ingresas caracteres extraños o no permitidos por la base seleccionada (como una letra `G` en hexadecimal o un `3` en binario), la herramienta desactivará los cálculos y te mostrará una alerta de error.</li>
                <li>De manera simultánea, la cuadrícula del panel derecho mostrará las tarjetas con el número traducido al resto de las bases numéricas.</li>
                <li>Haz clic en el icono de **Copiar** situado en la esquina superior derecha de cada tarjeta de base para guardar el valor correspondiente en tu portapapeles.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Tu privacidad y rapidez son primordiales. Todas las operaciones de traducción y parseo numérico se calculan de manera local en tu equipo mediante JavaScript nativo en cliente. No enviamos ningún número ni registro de datos a la red.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Number Bases Converter
            </h4>
            <p class="text-muted">
                A **numeral system** represents a structural framework of symbols and rules used to define numerical quantities. The default system in human societies represents the **Decimal System (Base 10)**, mapping ten digits (from 0 to 9) through base-10 powers. However, digital hardware and microprocessor electronics rely on alternative systems to parse information.
            </p>
            <p class="text-muted">
                Our free Bases Converter tool delivers real-time bidirectional translations between the four key positional systems of modern engineering:
            </p>
            <ul class="text-muted ps-3 mb-4">
                <li>**Binary System (Base 2):** Deploys two characters (`0` and `1`). Represents the underlying language of digital logic gates and silicon processors (on/off signals).</li>
                <li>**Octal System (Base 8):** Groups binary sequences in three-bit blocks using numbers 0 to 7. Traditionally useful in legacy mainframe computing and file permission attributes in Unix-like environments.</li>
                <li>**Decimal System (Base 10):** The primary human-readable mathematical notation.</li>
                <li>**Hexadecimal System (Base 16):** Combines sixteen digits (0 to 9 and letters A through F). Represents the modern standard to compress bytes, define physical memory addresses, and configure CSS color keys (like `#000000`).</li>
            </ul>
            
            <h5 class="text-dark mt-4">How to convert base numbers online?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Choose the **Input Number Base** representing your starting number system (Binary, Octal, Decimal, or Hexadecimal).</li>
                <li>Type your sequence in the **Input Number** field. The interface validates your key entries instantly. If you input characters incompatible with the selected base (such as writing `H` in Hexadecimal or `2` in Binary), the tool halts computation and alerts you.</li>
                <li>Simultaneously, the right panel cards will display the processed value mapped across all other three bases.</li>
                <li>Click the **Copy icon** on any output card to quickly copy its string to your clipboard.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local Execution:</strong> We value your security. Every base conversion and mathematical parser is computed locally on your device via client-side JavaScript. No data logs are uploaded or recorded.
            </div>
        @endif
    </div>
</div>
