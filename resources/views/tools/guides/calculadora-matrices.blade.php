<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Calculadora de Matrices Matemáticas
            </h4>
            <p class="text-muted">
                Una **matriz** es una estructura bidimensional de números organizados en filas y columnas. El álgebra matricial es una de las ramas más poderosas y aplicadas de las matemáticas modernas. Se utiliza ampliamente en ciencias de la computación (particularmente para transformaciones 3D, rotaciones y escalados en videojuegos y motores gráficos), física cuántica, modelado económico, criptografía y en la resolución de sistemas de ecuaciones lineales complejos.
            </p>
            <p class="text-muted">
                Nuestra calculadora de matrices en línea te permite configurar cuadrículas dinámicas de **2x2** y **3x3** para realizar cálculos algebraicos avanzados de forma instantánea. Soporta operaciones aritméticas entre dos matrices como la **Suma** y la **Resta** (las cuales requieren que ambas matrices tengan las mismas dimensiones) y la **Multiplicación de Matrices** (efectuando el producto escalar de las filas de la primera matriz por las columnas de la segunda).
            </p>
            <p class="text-muted">
                Además, incluye herramientas univariadas esenciales como el cálculo del **Determinante** (el cual indica si un sistema tiene soluciones únicas y si la matriz posee inversa) y la obtención de la **Matriz Inversa** mediante el método de la matriz adjunta dividida por su determinante. Si el determinante es exactamente igual a cero, la calculadora te advertirá de forma segura que la matriz es singular (no invertible), evitando operaciones prohibidas de división por cero.
            </p>
            
            <h5 class="text-dark mt-4">¿Cómo resolver operaciones de matrices en línea?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Selecciona el **Tamaño de la Matriz** en el menú desplegable superior derecho (elige entre rejillas de 2x2 y 3x3).</li>
                <li>Rellena las celdas numéricas de la **Matriz A** y, si la operación lo requiere, la **Matriz B** (puedes ingresar números enteros o decimales).</li>
                <li>Selecciona la **Operación de Matrices** que deseas realizar en el listado desplegable.</li>
                <li>Haz clic en **"Calcular Matriz"** para procesar la información de forma inmediata.</li>
                <li>Observa el resultado en el panel derecho: se mostrará una tarjeta destacada con el resultado numérico escalar (para determinantes) o una matriz resultante con sus celdas organizadas.</li>
                <li>Haz clic en **"Copiar texto"** para guardar el resultado estructurado por filas y columnas directamente en tu portapapeles.</li>
            </ol>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Garantizamos la confidencialidad de tus operaciones y tareas escolares. Todos los algoritmos algebraicos y cálculos matriciales se resuelven enteramente en tu navegador mediante Javascript en cliente. No recopilamos, transmitimos ni almacenamos ningún valor ingresado.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Matrix Calculator
            </h4>
            <p class="text-muted">
                A **matrix** represents a rectangular grid of numbers organized in horizontal rows and vertical columns. Matrix algebra is one of the most versatile branches of modern mathematics, widely applied in computer science (especially for 3D physics, graphics scaling, and coordinate rotations), quantum physics, machine learning weights, and solving complex systems of linear equations.
            </p>
            <p class="text-muted">
                Our interactive matrix solver supports **2x2** and **3x3** dimensional grids, enabling swift mathematical evaluations. Tweak cell values and solve algebraic formulas like **Matrix Addition** and **Matrix Subtraction** (which require matching dimensions) and **Matrix Multiplication** (computing the dot product of rows from the first matrix by columns of the second matrix).
            </p>
            <p class="text-muted">
                Furthermore, it incorporates key matrix algorithms such as computing the **Determinant** (which denotes system solvability and invertibility status) and finding the **Inverse Matrix** using cofactor expansion and adjugate formulas. If the determinant equals zero, the calculator flags the matrix as singular (non-invertible), avoiding division by zero crashes.
            </p>
            
            <h5 class="text-dark mt-4">How to compute matrix algebra online?</h5>
            <ol class="text-muted ps-3 mb-4">
                <li>Choose your target **Matrix Dimensions** from the top-right select box (toggles 2x2 and 3x3 layouts).</li>
                <li>Fill the numeric grid boxes for **Matrix A** and **Matrix B** (supports integers and decimals).</li>
                <li>Pick your required action from the **Matrix Operations** dropdown.</li>
                <li>Click **"Solve Matrix"** to compute the algebraic result immediately.</li>
                <li>Review the output on the right panel: reveals a numerical card for scalar results (determinants) or an organized matrix grid for tabular arrays.</li>
                <li>Tap **"Copy text"** to copy a tab-separated text representation of the results matrix directly to your clipboard.</li>
            </ol>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Local Computation:</strong> We secure your academic and research records. Every linear algebra algorithm is evaluated entirely on your machine via client-side JavaScript. Input values never travel over the network.
            </div>
        @endif
    </div>
</div>
