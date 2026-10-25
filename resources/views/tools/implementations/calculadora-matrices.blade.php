<div class="matrix-calculator-wrapper">
    <div class="row g-4">
        <!-- Input Panel -->
        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm bg-light h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold text-primary mb-0">
                            <i class="ri-settings-line align-middle me-1"></i> @lang('tools.mi_campo_entrada')
                        </h5>
                        
                        <!-- Dimension Selector -->
                        <div class="d-flex align-items-center gap-2">
                            <label for="matrix-dim" class="fs-13 fw-bold text-muted mb-0">@lang('tools.matrix_size'):</label>
                            <select class="form-select form-select-sm shadow-none" id="matrix-dim" style="width: 80px;">
                                <option value="2" selected>2 x 2</option>
                                <option value="3">3 x 3</option>
                            </select>
                        </div>
                    </div>

                    <!-- Matrices Grid Containers -->
                    <div class="row g-3 mb-4">
                        <!-- Matrix A -->
                        <div class="col-12 col-sm-6">
                            <div class="card border-0 shadow-none bg-white p-3 h-100">
                                <h6 class="fw-bold text-center mb-3">Matriz A</h6>
                                <div class="matrix-inputs-grid d-flex flex-column gap-2" id="matrix-a-container">
                                    <!-- Inputs injected dynamically -->
                                </div>
                            </div>
                        </div>

                        <!-- Matrix B -->
                        <div class="col-12 col-sm-6" id="matrix-b-wrapper">
                            <div class="card border-0 shadow-none bg-white p-3 h-100">
                                <h6 class="fw-bold text-center mb-3">Matriz B</h6>
                                <div class="matrix-inputs-grid d-flex flex-column gap-2" id="matrix-b-container">
                                    <!-- Inputs injected dynamically -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Matrix Operations Selector -->
                    <div class="mb-4">
                        <label for="matrix-operation" class="form-label fw-bold">@lang('tools.matrix_op')</label>
                        <select class="form-select shadow-none" id="matrix-operation">
                            <option value="add" selected>@lang('tools.matrix_op_add')</option>
                            <option value="sub">@lang('tools.matrix_op_sub')</option>
                            <option value="mul">@lang('tools.matrix_op_mul')</option>
                            <option value="det_a">@lang('tools.matrix_op_det_a')</option>
                            <option value="det_b">@lang('tools.matrix_op_det_b')</option>
                            <option value="inv_a">@lang('tools.matrix_op_inv_a')</option>
                            <option value="inv_b">@lang('tools.matrix_op_inv_b')</option>
                        </select>
                    </div>

                    <button type="button" class="btn btn-primary w-100 py-2.5 fw-bold" id="btn-calculate-matrix">
                        <i class="ri-play-line align-middle me-1"></i> @lang('tools.matrix_calculate')
                    </button>
                </div>
            </div>
        </div>

        <!-- Output Panel -->
        <div class="col-12 col-lg-5">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-4 text-primary">
                            <i class="ri-eye-line align-middle me-1"></i> @lang('tools.matrix_result')
                        </h5>

                        <div class="d-none" id="result-numeric-card">
                            <div class="card border-0 bg-primary-subtle text-primary p-4 text-center rounded-3 mb-4">
                                <h6 class="fs-12 fw-bold text-uppercase opacity-75 mb-2">Resultado Escalar</h6>
                                <h2 class="fw-bold mb-0" id="out-numeric-value">0</h2>
                            </div>
                        </div>

                        <div class="d-none" id="result-matrix-card">
                            <div class="card border-0 bg-light p-3 text-center rounded-3 mb-4">
                                <h6 class="fs-12 fw-bold text-muted text-uppercase mb-3">Matriz Resultante</h6>
                                <div class="d-flex flex-column gap-2 justify-content-center align-items-center" id="out-matrix-grid">
                                    <!-- Dynamic rows -->
                                </div>
                            </div>
                        </div>

                        <!-- Error Box -->
                        <div class="alert alert-danger border-0 d-none mb-4" id="matrix-error">
                            <i class="ri-alert-line me-2 align-middle"></i>
                            <span id="matrix-error-msg"></span>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success w-100 py-2.5 d-none" id="btn-copy-matrix">
                        <i class="ri-file-copy-line align-middle me-1"></i> @lang('tools.copy_text')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.matrix-inputs-grid input {
    text-align: center;
    font-family: monospace;
    font-weight: bold;
    font-size: 15px;
}
.matrix-row {
    display: flex;
    gap: 8px;
    justify-content: center;
}
.matrix-cell-out {
    width: 65px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: white;
    border: 1.5px solid #eef0f2;
    border-radius: 6px;
    font-family: monospace;
    font-weight: bold;
    font-size: 14px;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const dimSelect = document.getElementById('matrix-dim');
    const containerA = document.getElementById('matrix-a-container');
    const containerB = document.getElementById('matrix-b-container');
    const wrapperB = document.getElementById('matrix-b-wrapper');
    const opSelect = document.getElementById('matrix-operation');

    const btnCalculate = document.getElementById('btn-calculate-matrix');
    const btnCopy = document.getElementById('btn-copy-matrix');

    const numCard = document.getElementById('result-numeric-card');
    const numValue = document.getElementById('out-numeric-value');
    const matCard = document.getElementById('result-matrix-card');
    const matGrid = document.getElementById('out-matrix-grid');
    const errBox = document.getElementById('matrix-error');
    const errMsg = document.getElementById('matrix-error-msg');

    let calculatedResult = null; // Store for copy operations

    // Render Matrix Grids initially
    function buildGrids() {
        const size = parseInt(dimSelect.value);
        
        containerA.innerHTML = '';
        containerB.innerHTML = '';

        for (let r = 0; r < size; r++) {
            const rowA = document.createElement('div');
            rowA.className = 'matrix-row';
            
            const rowB = document.createElement('div');
            rowB.className = 'matrix-row';

            for (let c = 0; c < size; c++) {
                rowA.innerHTML += `<input type="number" class="form-control form-control-sm border-light shadow-none cell-a" data-row="${r}" data-col="${c}" value="0" style="width: 55px; height: 38px;">`;
                rowB.innerHTML += `<input type="number" class="form-control form-control-sm border-light shadow-none cell-b" data-row="${r}" data-col="${c}" value="0" style="width: 55px; height: 38px;">`;
            }

            containerA.appendChild(rowA);
            containerB.appendChild(rowB);
        }
    }

    // Toggle Matrix B visibility if operation only requires Matrix A or B
    function handleOpVisibility() {
        const op = opSelect.value;
        if (op === 'det_a' || op === 'inv_a') {
            wrapperB.classList.add('d-none');
            // Shift A to center block in columns if needed, or keep standard grid layout
        } else if (op === 'det_b' || op === 'inv_b') {
            wrapperB.classList.remove('d-none');
            // Optionally hide A if we only need B, but keeping both is standard
        } else {
            wrapperB.classList.remove('d-none');
        }
    }

    dimSelect.addEventListener('change', buildGrids);
    opSelect.addEventListener('change', handleOpVisibility);

    // Helpers to pull matrix values from inputs
    function getMatrixValues(containerSelector) {
        const size = parseInt(dimSelect.value);
        const matrix = [];
        for (let r = 0; r < size; r++) {
            matrix[r] = [];
            for (let c = 0; c < size; c++) {
                const input = document.querySelector(`${containerSelector} input[data-row="${r}"][data-col="${c}"]`);
                matrix[r][c] = parseFloat(input.value) || 0;
            }
        }
        return matrix;
    }

    // Operations Lógica
    function calculate() {
        numCard.classList.add('d-none');
        matCard.classList.add('d-none');
        errBox.classList.add('d-none');
        btnCopy.classList.add('d-none');
        calculatedResult = null;

        const size = parseInt(dimSelect.value);
        const op = opSelect.value;

        const matrixA = getMatrixValues('#matrix-a-container');
        const matrixB = getMatrixValues('#matrix-b-container');

        // Matrix Math Library
        try {
            if (op === 'add') {
                const res = [];
                for (let r = 0; r < size; r++) {
                    res[r] = [];
                    for (let c = 0; c < size; c++) {
                        res[r][c] = matrixA[r][c] + matrixB[r][c];
                    }
                }
                renderResultMatrix(res);
            } else if (op === 'sub') {
                const res = [];
                for (let r = 0; r < size; r++) {
                    res[r] = [];
                    for (let c = 0; c < size; c++) {
                        res[r][c] = matrixA[r][c] - matrixB[r][c];
                    }
                }
                renderResultMatrix(res);
            } else if (op === 'mul') {
                const res = [];
                for (let r = 0; r < size; r++) {
                    res[r] = [];
                    for (let c = 0; c < size; c++) {
                        let sum = 0;
                        for (let k = 0; k < size; k++) {
                            sum += matrixA[r][k] * matrixB[k][c];
                        }
                        res[r][c] = sum;
                    }
                }
                renderResultMatrix(res);
            } else if (op === 'det_a' || op === 'det_b') {
                const target = op === 'det_a' ? matrixA : matrixB;
                const det = calcDeterminant(target, size);
                renderResultNumeric(det);
            } else if (op === 'inv_a' || op === 'inv_b') {
                const target = op === 'inv_a' ? matrixA : matrixB;
                const inv = calcInverse(target, size);
                renderResultMatrix(inv);
            }
        } catch (err) {
            errBox.classList.remove('d-none');
            errMsg.textContent = err.message;
        }
    }

    function calcDeterminant(mat, size) {
        if (size === 2) {
            return mat[0][0] * mat[1][1] - mat[0][1] * mat[1][0];
        } else if (size === 3) {
            // Sarrus rule
            return mat[0][0] * (mat[1][1] * mat[2][2] - mat[1][2] * mat[2][1]) -
                   mat[0][1] * (mat[1][0] * mat[2][2] - mat[1][2] * mat[2][0]) +
                   mat[0][2] * (mat[1][0] * mat[2][1] - mat[1][1] * mat[2][0]);
        }
        throw new Error("@lang('tools.matrix_invalid_dimensions')");
    }

    function calcInverse(mat, size) {
        const det = calcDeterminant(mat, size);
        if (Math.abs(det) < 1e-9) {
            throw new Error("@lang('tools.matrix_non_invertible')");
        }

        if (size === 2) {
            return [
                [mat[1][1] / det, -mat[0][1] / det],
                [-mat[1][0] / det, mat[0][0] / det]
            ];
        } else if (size === 3) {
            // Adjugate matrix / determinant
            const adj = [];
            for (let r = 0; r < 3; r++) {
                adj[r] = [];
            }
            
            // Cofactors
            adj[0][0] = (mat[1][1] * mat[2][2] - mat[1][2] * mat[2][1]);
            adj[1][0] = -(mat[1][0] * mat[2][2] - mat[1][2] * mat[2][0]);
            adj[2][0] = (mat[1][0] * mat[2][1] - mat[1][1] * mat[2][0]);

            adj[0][1] = -(mat[0][1] * mat[2][2] - mat[0][2] * mat[2][1]);
            adj[1][1] = (mat[0][0] * mat[2][2] - mat[0][2] * mat[2][0]);
            adj[2][1] = -(mat[0][0] * mat[2][1] - mat[0][1] * mat[2][0]);

            adj[0][2] = (mat[0][1] * mat[1][2] - mat[0][2] * mat[1][1]);
            adj[1][2] = -(mat[0][0] * mat[1][2] - mat[0][2] * mat[1][0]);
            adj[2][2] = (mat[0][0] * mat[1][1] - mat[0][1] * mat[1][0]);

            // Divide adjugate components by determinant
            const res = [];
            for (let r = 0; r < 3; r++) {
                res[r] = [];
                for (let c = 0; c < 3; c++) {
                    res[r][c] = adj[r][c] / det;
                }
            }
            return res;
        }
        throw new Error("@lang('tools.matrix_invalid_dimensions')");
    }

    function renderResultNumeric(val) {
        numValue.textContent = Number.isInteger(val) ? val : val.toFixed(4);
        numCard.classList.remove('d-none');
        btnCopy.classList.remove('d-none');
        calculatedResult = val.toString();
    }

    function renderResultMatrix(res) {
        matGrid.innerHTML = '';
        
        let textRep = '';

        res.forEach((row, r) => {
            const rowDiv = document.createElement('div');
            rowDiv.className = 'matrix-row';
            
            row.forEach((cell, c) => {
                const formattedCell = Number.isInteger(cell) ? cell : cell.toFixed(3);
                rowDiv.innerHTML += `<div class="matrix-cell-out">${formattedCell}</div>`;
                textRep += formattedCell + (c < row.length - 1 ? '\t' : '');
            });

            matGrid.appendChild(rowDiv);
            textRep += (r < res.length - 1 ? '\n' : '');
        });

        matCard.classList.remove('d-none');
        btnCopy.classList.remove('d-none');
        calculatedResult = textRep;
    }

    btnCalculate.addEventListener('click', calculate);

    btnCopy.addEventListener('click', function(e) {
        e.preventDefault();
        if (calculatedResult) {
            navigator.clipboard.writeText(calculatedResult).then(function() {
                const originalHTML = btnCopy.innerHTML;
                btnCopy.innerHTML = '<i class="ri-check-line align-middle me-1"></i> Copied!';
                btnCopy.className = 'btn btn-success w-100 py-2.5';
                setTimeout(() => {
                    btnCopy.innerHTML = originalHTML;
                    btnCopy.className = 'btn btn-success w-100 py-2.5';
                }, 2000);
            });
        }
    });

    // Build initial layout
    buildGrids();
    handleOpVisibility();
});
</script>
