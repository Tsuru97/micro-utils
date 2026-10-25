<div class="math-function-grapher-wrapper">
    <div class="row g-4">
        <!-- Controls Panel -->
        <div class="col-12 col-lg-5">
            <div class="card border-0 shadow-sm bg-light h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4 text-primary">
                        <i class="ri-settings-line align-middle me-1"></i> @lang('tools.mi_campo_entrada')
                    </h5>

                    <form id="graph-form">
                        <!-- Mathematical Formulas List -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <label class="form-label fw-bold mb-0">@lang('tools.math_function')</label>
                                <button type="button" class="btn btn-primary btn-sm" id="btn-add-function">
                                    <i class="ri-add-line align-middle me-1"></i> @lang('tools.grad_add_stop')
                                </button>
                            </div>
                            
                            <div class="d-flex flex-column gap-3" id="functions-list">
                                <!-- Function rows injected dynamically -->
                            </div>
                        </div>

                        <!-- Boundaries Section -->
                        <h6 class="fw-bold text-dark mb-3">@lang('tools.math_grid_bounds')</h6>
                        
                        <!-- X Bounds -->
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label for="graph-min-x" class="form-label fs-13 fw-semibold">@lang('tools.math_min_x')</label>
                                <input type="number" class="form-control shadow-none" id="graph-min-x" value="-10" step="1">
                            </div>
                            <div class="col-6">
                                <label for="graph-max-x" class="form-label fs-13 fw-semibold">@lang('tools.math_max_x')</label>
                                <input type="number" class="form-control shadow-none" id="graph-max-x" value="10" step="1">
                            </div>
                        </div>

                        <!-- Y Bounds -->
                        <div class="row g-2 mb-4">
                            <div class="col-6">
                                <label for="graph-min-y" class="form-label fs-13 fw-semibold">@lang('tools.math_min_y')</label>
                                <input type="number" class="form-control shadow-none" id="graph-min-y" value="-10" step="1">
                            </div>
                            <div class="col-6">
                                <label for="graph-max-y" class="form-label fs-13 fw-semibold">@lang('tools.math_max_y')</label>
                                <input type="number" class="form-control shadow-none" id="graph-max-y" value="10" step="1">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2.5 fw-bold" id="btn-plot-graph">
                            <i class="ri-compass-3-line align-middle me-1"></i> @lang('tools.math_draw')
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Visual Graph Preview Panel -->
        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold text-primary mb-0">
                                <i class="ri-eye-line align-middle me-1"></i> @lang('tools.shadow_preview')
                            </h5>
                            <!-- Coordinate tooltip badge -->
                            <span class="badge bg-secondary-subtle text-secondary fw-bold rounded-pill p-2" id="coord-tooltip" style="font-family: monospace;">X: 0.00 | Y: 0.00</span>
                        </div>

                        <!-- SVG Grid Visualizer -->
                        <div class="w-100 bg-white border border-light rounded-3 overflow-hidden position-relative" style="height: 380px; cursor: crosshair;" id="graph-container">
                            <svg id="graph-svg" width="100%" height="100%" viewBox="0 0 600 400" xmlns="http://www.w3.org/2000/svg" style="background-color: #fafafa;">
                                <!-- Grid Lines and Axes drawn dynamically -->
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('graph-form');
    const functionsList = document.getElementById('functions-list');
    const btnAddFunction = document.getElementById('btn-add-function');

    const elMinX = document.getElementById('graph-min-x');
    const elMaxX = document.getElementById('graph-max-x');
    const elMinY = document.getElementById('graph-min-y');
    const elMaxY = document.getElementById('graph-max-y');

    const svg = document.getElementById('graph-svg');
    const container = document.getElementById('graph-container');
    const tooltip = document.getElementById('coord-tooltip');

    const svgWidth = 600;
    const svgHeight = 400;

    // Palette of colors for successive mathematical curves
    const curveColors = [
        '#0d6efd', // Blue
        '#198754', // Green
        '#dc3545', // Red
        '#6f42c1', // Purple
        '#0dcaf0', // Teal
        '#fd7e14'  // Orange
    ];

    // Default functions list
    let functionsData = [
        { formula: 'x^2 - 4' }
    ];

    function renderFunctionInputs() {
        functionsList.innerHTML = '';
        
        functionsData.forEach((fn, index) => {
            const color = curveColors[index % curveColors.length];
            const row = document.createElement('div');
            row.className = 'd-flex flex-column gap-1 bg-white p-2 rounded border border-light';
            row.innerHTML = `
                <div class="input-group">
                    <span class="input-group-text border-end-0 fw-bold font-monospace" style="color: ${color}; background-color: ${color}15;">f${index+1}(x)=</span>
                    <input type="text" class="form-control border-start-0 shadow-none font-monospace val-formula" value="${fn.formula}" data-index="${index}" style="font-family: monospace;">
                    <button type="button" class="btn btn-outline-danger btn-delete-function" data-index="${index}" ${functionsData.length <= 1 ? 'disabled' : ''}>
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </div>
                <div class="text-danger fs-11 mt-1 d-none err-msg" id="err-fn-${index}"></div>
            `;
            functionsList.appendChild(row);
        });

        drawGraph();
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        drawGraph();
    });

    // Handle formula input change
    functionsList.addEventListener('input', function(e) {
        if (e.target.classList.contains('val-formula')) {
            const index = parseInt(e.target.getAttribute('data-index'));
            functionsData[index].formula = e.target.value;
        }
    });

    // Add function row
    btnAddFunction.addEventListener('click', function(e) {
        e.preventDefault();
        if (functionsData.length >= 6) {
            alert("Máximo 6 funciones simultáneas.");
            return;
        }
        functionsData.push({ formula: '' });
        renderFunctionInputs();
    });

    // Delete function row
    functionsList.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-delete-function');
        if (btn) {
            const index = parseInt(btn.getAttribute('data-index'));
            if (functionsData.length > 1) {
                functionsData.splice(index, 1);
                renderFunctionInputs();
            }
        }
    });

    // Safe mathematical expression parser (Mathematicians friendly)
    function sanitizeFormula(formulaStr) {
        let clean = formulaStr.toLowerCase().trim();

        // Convert algebraic carets ^ to JS power ** operators
        clean = clean.replace(/\^/g, '**');

        // Split input into word tokens and validate
        // Strip out allowed math word tokens to check if there are forbidden symbols
        const allowedWords = /^(sin|cos|tan|abs|sqrt|cbrt|log|exp|pow|pi|e|ln|asin|acos|atan|sinh|cosh|tanh|x)$/;
        
        const tokens = clean.split(/[^a-z0-9_]+/i);
        for (let t of tokens) {
            if (t && isNaN(t) && !allowedWords.test(t)) {
                throw new Error("Término no permitido o desconocido: " + t);
            }
        }

        return clean;
    }

    function drawGraph() {
        const minX = parseFloat(elMinX.value);
        const maxX = parseFloat(elMaxX.value);
        const minY = parseFloat(elMinY.value);
        const maxY = parseFloat(elMaxY.value);

        // Clear error text fields
        document.querySelectorAll('.err-msg').forEach(el => {
            el.classList.add('d-none');
            el.textContent = '';
        });

        if (isNaN(minX) || isNaN(maxX) || isNaN(minY) || isNaN(maxY) || minX >= maxX || minY >= maxY) {
            alert('Límites inválidos: Min debe ser menor que Max.');
            return;
        }

        // Clean SVG elements
        svg.innerHTML = '';

        function toSvgX(x) {
            return ((x - minX) / (maxX - minX)) * svgWidth;
        }

        function toSvgY(y) {
            return svgHeight - (((y - minY) / (maxY - minY)) * svgHeight);
        }

        function toMathX(svgX) {
            return minX + (svgX / svgWidth) * (maxX - minX);
        }

        // 1. Draw Grid Lines
        const gridGroup = document.createElementNS('http://www.w3.org/2000/svg', 'g');
        gridGroup.setAttribute('stroke', '#eef0f2');
        gridGroup.setAttribute('stroke-width', '1');

        const xStep = (maxX - minX) / 10;
        for (let x = minX; x <= maxX; x += xStep) {
            const svgX = toSvgX(x);
            const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
            line.setAttribute('x1', svgX);
            line.setAttribute('y1', 0);
            line.setAttribute('x2', svgX);
            line.setAttribute('y2', svgHeight);
            gridGroup.appendChild(line);
        }

        const yStep = (maxY - minY) / 10;
        for (let y = minY; y <= maxY; y += yStep) {
            const svgY = toSvgY(y);
            const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
            line.setAttribute('x1', 0);
            line.setAttribute('y1', svgY);
            line.setAttribute('x2', svgWidth);
            line.setAttribute('y2', svgY);
            gridGroup.appendChild(line);
        }
        svg.appendChild(gridGroup);

        // 2. Draw Main Axes (X = 0 and Y = 0)
        const axesGroup = document.createElementNS('http://www.w3.org/2000/svg', 'g');
        axesGroup.setAttribute('stroke', '#b5bec9');
        axesGroup.setAttribute('stroke-width', '1.5');

        if (minX <= 0 && maxX >= 0) {
            const axisX = toSvgX(0);
            const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
            line.setAttribute('x1', axisX);
            line.setAttribute('y1', 0);
            line.setAttribute('x2', axisX);
            line.setAttribute('y2', svgHeight);
            axesGroup.appendChild(line);
        }

        if (minY <= 0 && maxY >= 0) {
            const axisY = toSvgY(0);
            const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
            line.setAttribute('x1', 0);
            line.setAttribute('y1', axisY);
            line.setAttribute('x2', svgWidth);
            line.setAttribute('y2', axisY);
            axesGroup.appendChild(line);
        }
        svg.appendChild(axesGroup);

        // Axis label tags
        const labelsGroup = document.createElementNS('http://www.w3.org/2000/svg', 'g');
        labelsGroup.setAttribute('fill', '#8898aa');
        labelsGroup.setAttribute('font-size', '10');
        labelsGroup.setAttribute('font-family', 'monospace');

        for (let i = 0; i <= 10; i++) {
            const xVal = minX + i * xStep;
            const yVal = minY + i * yStep;

            if (i > 0 && i < 10) {
                const textX = document.createElementNS('http://www.w3.org/2000/svg', 'text');
                textX.setAttribute('x', toSvgX(xVal) - 10);
                const posY = (minY <= 0 && maxY >= 0) ? toSvgY(0) + 14 : svgHeight - 8;
                textX.setAttribute('y', posY);
                textX.textContent = xVal.toFixed(1);
                labelsGroup.appendChild(textX);
            }

            if (i > 0 && i < 10) {
                const textY = document.createElementNS('http://www.w3.org/2000/svg', 'text');
                const posX = (minX <= 0 && maxX >= 0) ? toSvgX(0) + 6 : 8;
                textY.setAttribute('x', posX);
                textY.setAttribute('y', toSvgY(yVal) + 4);
                textY.textContent = yVal.toFixed(1);
                labelsGroup.appendChild(textY);
            }
        }
        svg.appendChild(labelsGroup);

        // 3. Draw each function curve
        functionsData.forEach((fn, index) => {
            if (!fn.formula.trim()) return;

            const errBlock = document.getElementById(`err-fn-${index}`);
            const color = curveColors[index % curveColors.length];

            try {
                const formulaClean = sanitizeFormula(fn.formula);
                
                // Compile dynamic mathematical function wrapping variables in local scope (mathematicians layout)
                const f = new Function(
                    'x', 'sin', 'cos', 'tan', 'abs', 'sqrt', 'cbrt', 'log', 'exp', 'pow', 'pi', 'e', 'ln', 'asin', 'acos', 'atan', 'sinh', 'cosh', 'tanh',
                    `return (${formulaClean});`
                );
                
                // Test evaluation
                f(0, Math.sin, Math.cos, Math.tan, Math.abs, Math.sqrt, Math.cbrt, Math.log, Math.exp, Math.pow, Math.PI, Math.E, Math.log, Math.asin, Math.acos, Math.atan, Math.sinh, Math.cosh, Math.tanh);

                let pathD = '';
                let isDrawing = false;

                for (let svgX = 0; svgX <= svgWidth; svgX++) {
                    const mathX = toMathX(svgX);
                    let mathY;
                    
                    try {
                        mathY = f(
                            mathX, 
                            Math.sin, Math.cos, Math.tan, Math.abs, Math.sqrt, Math.cbrt, 
                            Math.log, Math.exp, Math.pow, Math.PI, Math.E, Math.log,
                            Math.asin, Math.acos, Math.atan, Math.sinh, Math.cosh, Math.tanh
                        );
                    } catch (e) {
                        isDrawing = false;
                        continue;
                    }

                    if (isNaN(mathY) || !isFinite(mathY)) {
                        isDrawing = false;
                        continue;
                    }

                    const svgY = toSvgY(mathY);

                    if (svgY < -500 || svgY > svgHeight + 500) {
                        isDrawing = false;
                        continue;
                    }

                    if (!isDrawing) {
                        pathD += `M ${svgX} ${svgY} `;
                        isDrawing = true;
                    } else {
                        pathD += `L ${svgX} ${svgY} `;
                    }
                }

                if (pathD) {
                    const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                    path.setAttribute('d', pathD);
                    path.setAttribute('fill', 'none');
                    path.setAttribute('stroke', color);
                    path.setAttribute('stroke-width', '3');
                    path.setAttribute('stroke-linecap', 'round');
                    path.setAttribute('stroke-linejoin', 'round');
                    svg.appendChild(path);
                } else {
                    throw new Error("No hay puntos visibles en el rango.");
                }

            } catch (err) {
                if (errBlock) {
                    errBlock.classList.remove('d-none');
                    errBlock.textContent = "@lang('tools.math_invalid_formula')" + err.message;
                }
            }
        });
    }

    container.addEventListener('mousemove', function(e) {
        const rect = container.getBoundingClientRect();
        const svgX = ((e.clientX - rect.left) / rect.width) * svgWidth;
        const svgY = ((e.clientY - rect.top) / rect.height) * svgHeight;

        const minX = parseFloat(elMinX.value);
        const maxX = parseFloat(elMaxX.value);
        const minY = parseFloat(elMinY.value);
        const maxY = parseFloat(elMaxY.value);

        const mathX = minX + (svgX / svgWidth) * (maxX - minX);
        const mathY = minY + ((svgHeight - svgY) / svgHeight) * (maxY - minY);

        tooltip.textContent = `X: ${mathX.toFixed(2)} | Y: ${mathY.toFixed(2)}`;
    });

    // Initial render
    renderFunctionInputs();
});
</script>
