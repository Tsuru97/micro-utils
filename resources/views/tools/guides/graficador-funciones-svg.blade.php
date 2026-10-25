<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Graficador de Funciones Matemáticas SVG
            </h4>
            <p class="text-muted">
                Un **graficador de funciones** es una herramienta analítica invaluable para estudiantes, educadores y científicos. Permite visualizar de forma inmediata el comportamiento geométrico de ecuaciones algebraicas y trigonométricas en un plano bidimensional. Al trazar una función, es posible identificar fácilmente raíces, intersecciones con los ejes, pendientes, puntos críticos, asíntotas e intervalos de crecimiento o decrecimiento de la función.
            </p>
            <p class="text-muted">
                Nuestra calculadora visual emplea el **sistema de coordenadas cartesianas** inventado por René Descartes. En lugar de depender de pesadas librerías de terceros o llamadas lentas al servidor, esta utilidad procesa tus ecuaciones de forma 100% local en tu navegador utilizando JavaScript. Convierte la expresión algebraica en una serie de pares ordenados $(x, y)$ dentro del intervalo especificado y genera un elemento gráfico vectorial **SVG (Scalable Vector Graphics)** de alta fidelidad. Al ser vectorial, puedes redimensionar el gráfico o inspectar las coordenadas al mover el puntero sin perder nitidez ni velocidad.
            </p>

            <h5 class="text-dark mt-4">¿Cómo graficar múltiples funciones y curvas implícitas (ej: círculos o corazones)?</h5>
            <p class="text-muted">
                Este graficador está diseñado para trazar funciones **explícitas** de la forma $y = f(x)$ (donde la variable $y$ está totalmente despejada de un lado de la igualdad, por ejemplo, $y = x^2 - 4$).
            </p>
            <p class="text-muted">
                Si deseas graficar una curva **implícita** (donde $y$ no está despejada y existen múltiples valores de $y$ para un mismo valor de $x$, como la ecuación de un círculo $x^2 + y^2 = 9$ o el famoso corazón matemático $(x^2 + y^2 - 1)^3 - x^2 y^3 = 0$), debes **despejar y separar la ecuación en dos o más funciones explícitas independientes** y graficarlas de forma simultánea haciendo clic en **"Añadir Color"**:
            </p>
            <ul class="text-muted ps-3 mb-4">
                <li>
                    **Ejemplo 1: Círculo de radio 3 ($x^2 + y^2 = 9$)**
                    <br>Despejando $y$, obtenemos $y = \pm\sqrt{9 - x^2}$. Puedes graficarlo agregando dos funciones:
                    <ul class="ps-3 mt-1">
                        <li>**$f_1(x)$ (Mitad superior):** `sqrt(9 - x^2)`</li>
                        <li>**$f_2(x)$ (Mitad inferior):** `-sqrt(9 - x^2)`</li>
                    </ul>
                </li>
                <li class="mt-3">
                    **Ejemplo 2: El Corazón Matemático ($(x^2 + y^2 - 1)^3 - x^2 y^3 = 0$)**
                    <br>Despejando la ecuación cuadrática resultante, el corazón se divide en dos funciones explícitas perfectas que puedes ingresar directamente en notación matemática estándar:
                    <ul class="ps-3 mt-1">
                        <li>**$f_1(x)$ (Mitad superior):** `(cbrt(x*x) + sqrt(cbrt(x*x*x*x) - 4*x*x + 4)) / 2`</li>
                        <li>**$f_2(x)$ (Mitad inferior):** `(cbrt(x*x) - sqrt(cbrt(x*x*x*x) - 4*x*x + 4)) / 2`</li>
                    </ul>
                    <span class="fs-12 text-muted">*Nota: Configura el rango de visualización de X e Y entre -2 y 2 para apreciar la figura en su máximo esplendor.*</span>
                </li>
            </ul>
            
            <h5 class="text-dark mt-4">¿Cómo utilizar este graficador en línea?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Escribe tu función en el campo **Fórmula de la Función f(x)**. Puedes escribir fórmulas usando variables e integrando operaciones comunes. Para facilitar el ingreso, el sistema convierte automáticamente expresiones cotidianas como `x^2` a notación de potencia de JS (`x**2`), y funciones estándar como `sin(x)` o `cos(x)` a llamadas trigonométricas de `Math`.</li>
                <li>Haz clic en **"Añadir Color"** para añadir más campos de entrada y graficar hasta 6 funciones de forma simultánea, cada una con un color único asignado automáticamente.</li>
                <li>Modifica los límites en la sección **Rango de Visualización de la Gráfica** para acercar o alejar el zoom de los ejes X e Y (por defecto está configurado de -10 a 10).</li>
                <li>Haz clic en **"Graficar Función"** para redibujar el plano cartesiano y proyectar el trazado de las curvas.</li>
                <li>Mueve tu ratón o mantén pulsado el dedo sobre el lienzo de la gráfica para ver las **coordenadas exactas (X, Y)** en tiempo real en la insignia superior derecha.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> La seguridad de tus búsquedas y experimentos es primordial. Todo el procesamiento matemático de interpretación de fórmulas y trazado vectorial ocurre localmente en tu equipo a través de JavaScript. Ninguna ecuación ni coordenada de análisis se guarda ni transmite por internet.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: SVG Function Grapher
            </h4>
            <p class="text-muted">
                A **function grapher** is an essential analytical utility designed for students, educators, and science professionals. It grants the ability to visually interpret algebraic, polynomial, or trigonometric expressions on a standard two-dimensional grid. Plotting a function simplifies finding roots, coordinate intercepts, gradient behaviors, local extrema, asymptotes, and boundaries.
            </p>
            <p class="text-muted">
                Our responsive graphing calculator utilizes the classic **Cartesian coordinate system**. Instead of loading massive third-party chart scripts or invoking slow backend rendering, this utility evaluates formulas fully client-side. The tool generates clean **SVG (Scalable Vector Graphics)** math curves instantly. Since it relies on vectors, the resulting curve scales perfectly and allows responsive coordinate tracking as you glide the mouse pointer.
            </p>

            <h5 class="text-dark mt-4">How to plot multiple functions and implicit curves (e.g. circles or hearts)?</h5>
            <p class="text-muted">
                This graphing calculator is specialized in tracing **explicit** functions in the form $y = f(x)$ (where the $y$ variable is isolated on one side, such as $y = x^2 - 4$).
            </p>
            <p class="text-muted">
                If you wish to plot an **implicit** equation (where $y$ is not isolated and multiple $y$ values exist for a single $x$, such as the equation of a circle $x^2 + y^2 = 9$ or the famous mathematical heart curve $(x^2 + y^2 - 1)^3 - x^2 y^3 = 0$), you must **isolate $y$ and split the equation into separate explicit functions**, then plot them simultaneously using the **"Add Color"** button:
            </p>
            <ul class="text-muted ps-3 mb-4">
                <li>
                    **Example 1: Circle with radius 3 ($x^2 + y^2 = 9$)**
                    <br>Solving for $y$ yields $y = \pm\sqrt{9 - x^2}$. Plot it by adding two distinct functions:
                    <ul class="ps-3 mt-1">
                        <li>**$f_1(x)$ (Top half):** `sqrt(9 - x^2)`</li>
                        <li>**$f_2(x)$ (Bottom half):** `-sqrt(9 - x^2)`</li>
                    </ul>
                </li>
                <li class="mt-3">
                    **Example 2: Mathematical Heart ($(x^2 + y^2 - 1)^3 - x^2 y^3 = 0$)**
                    <br>Solving the quadratic equation resulting from the heart equation splits it into two explicit curves. You can input them using standard mathematical notation:
                    <ul class="ps-3 mt-1">
                        <li>**$f_1(x)$ (Top half):** `(cbrt(x*x) + sqrt(cbrt(x*x*x*x) - 4*x*x + 4)) / 2`</li>
                        <li>**$f_2(x)$ (Bottom half):** `(cbrt(x*x) - sqrt(cbrt(x*x*x*x) - 4*x*x + 4)) / 2`</li>
                    </ul>
                    <span class="fs-12 text-muted">*Tip: Set your graph X and Y boundaries to span from -2 to 2 for a stunning high-definition heart visual.*</span>
                </li>
            </ul>
            
            <h5 class="text-dark mt-4">How to use this online tool?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Input your expression inside the **Function Formula f(x)** field. You can compose formulas easily. To help user inputs, the parser automatically translates notation like `x^2` into JavaScript exponents (`x**2`), and standard operations like `sin(x)` or `cos(x)` into native `Math` commands.</li>
                <li>Click **"Add Color"** to append additional fields and plot up to 6 functions simultaneously, each mapped to a distinct curve color automatically.</li>
                <li>Fine-tune your coordinate boundaries inside the **Graph View Boundaries** section to zoom in or out of the X and Y axes (default values span from -10 to 10).</li>
                <li>Press the **"Plot Function"** button to instantly draw the coordinate grid and trace the mathematical curves.</li>
                <li>Hover your mouse or tap and drag over the visualizer container to inspect **exact (X, Y) math coordinates** in real-time inside the top right badge.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local Computation:</strong> Your research privacy is completely guaranteed. All expression scanning, variable mapping, and vector path generation are computed directly in your browser. No data ever leaves your computer.
            </div>
        @endif
    </div>
</div>
