<div class="mindmap-wrapper py-3">
    <style>
        .mindmap-container {
            position: relative;
            width: 100%;
            height: 600px;
            background-color: #fafafa;
            background-image: 
                radial-gradient(rgba(0, 0, 0, 0.05) 1px, transparent 0);
            background-size: 24px 24px;
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.02);
            user-select: none;
        }

        [data-bs-theme="dark"] .mindmap-container {
            background-color: #0f172a;
            background-image: 
                radial-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 0);
            border-color: rgba(255, 255, 255, 0.08);
        }

        .mindmap-canvas-layer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .mindmap-nodes-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
        }

        .mindmap-node {
            position: absolute;
            min-width: 120px;
            max-width: 220px;
            padding: 12px 18px;
            background: #ffffff;
            border: 2px solid #3b82f6;
            border-radius: 14px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            cursor: grab;
            transition: border-color 0.2s, box-shadow 0.2s, transform 0.1s;
            pointer-events: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .mindmap-node:active {
            cursor: grabbing;
            transform: scale(0.98);
        }

        .mindmap-node.selected {
            border-color: #10b981 !important;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.2), 0 10px 20px rgba(0, 0, 0, 0.08);
        }

        [data-bs-theme="dark"] .mindmap-node {
            background: #1e293b;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .node-text {
            font-size: 0.875rem;
            font-weight: 600;
            color: #1e293b;
            border: none;
            background: transparent;
            text-align: center;
            width: 100%;
            outline: none;
            word-wrap: break-word;
        }

        [data-bs-theme="dark"] .node-text {
            color: #f1f5f9;
        }

        /* Node micro contextual menu */
        .node-menu {
            position: absolute;
            bottom: -46px;
            left: 50%;
            transform: translateX(-50%);
            background: #ffffff;
            border: 1px solid rgba(0,0,0,0.08);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border-radius: 10px;
            padding: 4px;
            display: none;
            gap: 4px;
            z-index: 10;
        }

        [data-bs-theme="dark"] .node-menu {
            background: #1e293b;
            border-color: rgba(255,255,255,0.08);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .mindmap-node.selected .node-menu {
            display: flex;
        }

        .node-menu-btn {
            width: 28px;
            height: 28px;
            border-radius: 6px;
            border: none;
            background: transparent;
            color: #64748b;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 0.85rem;
            transition: all 0.2s ease;
        }

        .node-menu-btn:hover {
            background: rgba(59, 130, 246, 0.08);
            color: #3b82f6;
        }

        [data-bs-theme="dark"] .node-menu-btn:hover {
            background: rgba(59, 130, 246, 0.15);
            color: #60a5fa;
        }

        .node-color-dot {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            cursor: pointer;
            transition: transform 0.2s;
            border: 1px solid rgba(0,0,0,0.1);
        }

        .node-color-dot:hover {
            transform: scale(1.2);
        }

        /* Color palettes */
        .color-blue { border-color: #3b82f6 !important; }
        .color-emerald { border-color: #10b981 !important; }
        .color-amber { border-color: #f59e0b !important; }
        .color-rose { border-color: #f43f5e !important; }
        .color-purple { border-color: #8b5cf6 !important; }

        /* Canvas Help banner */
        .canvas-banner {
            position: absolute;
            top: 16px;
            left: 16px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 12px;
            padding: 8px 14px;
            font-size: 0.75rem;
            color: #64748b;
            pointer-events: none;
            z-index: 5;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.02);
        }

        [data-bs-theme="dark"] .canvas-banner {
            background: rgba(30, 41, 59, 0.85);
            border-color: rgba(255, 255, 255, 0.05);
            color: #94a3b8;
        }

        /* Sidebar settings panel */
        .mindmap-control-panel {
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 16px;
            padding: 16px;
            height: 100%;
        }

        [data-bs-theme="dark"] .mindmap-control-panel {
            background: rgba(255, 255, 255, 0.02);
            border-color: rgba(255, 255, 255, 0.05);
        }

        .curve-picker-btn {
            border: 1px solid rgba(0, 0, 0, 0.08);
            background: transparent;
            padding: 8px 12px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 0.8rem;
            color: #64748b;
            transition: all 0.2s ease;
        }

        .curve-picker-btn.active {
            background: #3b82f6;
            color: #ffffff;
            border-color: #3b82f6;
        }

        [data-bs-theme="dark"] .curve-picker-btn {
            border-color: rgba(255, 255, 255, 0.08);
            color: #cbd5e1;
        }

        [data-bs-theme="dark"] .curve-picker-btn.active {
            background: #3b82f6;
            color: #ffffff;
        }
    </style>

    <div class="row g-4">
        <!-- Panel Izquierdo: El lienzo interactivo del Mapa Mental -->
        <div class="col-12 col-lg-9">
            <div class="mindmap-container" id="mindmap-board">
                <!-- Banner instructivo -->
                <div class="canvas-banner d-flex align-items-center gap-2">
                    <i class="ri-information-line text-primary fs-14"></i>
                    <span>@lang('tools.mind_add_node') • Selecciona un nodo para abrir su menú</span>
                </div>

                <!-- Capa de Conexiones SVG -->
                <svg class="mindmap-canvas-layer" id="svg-canvas"></svg>

                <!-- Capa de Nodos HTML -->
                <div class="mindmap-nodes-container" id="nodes-canvas"></div>
            </div>
        </div>

        <!-- Panel Derecho: Ajustes de Diagramación y Exportación -->
        <div class="col-12 col-lg-3">
            <div class="mindmap-control-panel d-flex flex-column justify-content-between">
                <div>
                    <h5 class="fw-bold mb-3 text-dark">
                        <i class="ri-settings-4-line text-primary me-1"></i> Configuración
                    </h5>

                    <!-- Añadir Nodo de Forma Manual -->
                    <button class="btn btn-primary w-100 py-2.5 mb-3" id="btn-add-node">
                        <i class="ri-add-circle-line me-1"></i> Añadir Nodo Raíz
                    </button>

                    <!-- Ajustes de Conexiones -->
                    <h6 class="fw-bold text-muted mb-2.5 fs-11 uppercase-tracking mt-3">Estilo de Enlace</h6>
                    <div class="d-flex gap-2 mb-4">
                        <button class="curve-picker-btn active flex-fill" id="btn-style-curved" data-style="curved">
                            <i class="ri-bubble-chart-line me-1"></i> Curvo Bezier
                        </button>
                        <button class="curve-picker-btn flex-fill" id="btn-style-straight" data-style="straight">
                            <i class="ri-line-line me-1"></i> Recto
                        </button>
                    </div>

                    <!-- Paleta de Colores de Nodos -->
                    <h6 class="fw-bold text-muted mb-2.5 fs-11 uppercase-tracking">Colores Rápidos</h6>
                    <div class="d-flex gap-2 mb-4 justify-content-between bg-body-tertiary p-2.5 rounded-3">
                        <div class="node-color-dot" style="background-color: #3b82f6;" data-color="#3b82f6" title="Azul"></div>
                        <div class="node-color-dot" style="background-color: #10b981;" data-color="#10b981" title="Esmeralda"></div>
                        <div class="node-color-dot" style="background-color: #f59e0b;" data-color="#f59e0b" title="Ámbar"></div>
                        <div class="node-color-dot" style="background-color: #f43f5e;" data-color="#f43f5e" title="Rosa"></div>
                        <div class="node-color-dot" style="background-color: #8b5cf6;" data-color="#8b5cf6" title="Violeta"></div>
                    </div>
                </div>

                <div class="mt-4">
                    <!-- Exportación y Limpieza -->
                    <button class="btn btn-outline-danger w-100 py-2 mb-2" id="btn-clear-canvas">
                        <i class="ri-delete-bin-6-line me-1"></i> @lang('tools.mind_clear_canvas')
                    </button>
                    <button class="btn btn-success w-100 py-2.5" id="btn-export-svg">
                        <i class="ri-download-2-line me-1"></i> @lang('tools.mind_download_svg')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const board = document.getElementById('mindmap-board');
    const svgCanvas = document.getElementById('svg-canvas');
    const nodesCanvas = document.getElementById('nodes-canvas');

    // Control buttons
    const btnAddNode = document.getElementById('btn-add-node');
    const btnStyleCurved = document.getElementById('btn-style-curved');
    const btnStyleStraight = document.getElementById('btn-style-straight');
    const btnClearCanvas = document.getElementById('btn-clear-canvas');
    const btnExportSVG = document.getElementById('btn-export-svg');
    const colorDots = document.querySelectorAll('.node-color-dot');

    let nodes = [
        { id: 1, text: 'Idea Central', x: 300, y: 240, color: '#3b82f6' },
        { id: 2, text: 'Subtema A', x: 120, y: 150, color: '#10b981' },
        { id: 3, text: 'Subtema B', x: 480, y: 180, color: '#f59e0b' },
        { id: 4, text: 'Subtema C', x: 320, y: 380, color: '#8b5cf6' }
    ];

    let connections = [
        { from: 1, to: 2 },
        { from: 1, to: 3 },
        { from: 1, to: 4 }
    ];

    let selectedNodeId = null;
    let linkStyle = 'curved'; // 'curved' or 'straight'
    let draggingNodeId = null;
    let dragStartX = 0;
    let dragStartY = 0;
    let nodeStartX = 0;
    let nodeStartY = 0;

    // Initialize Canvas Board
    function init() {
        render();

        // Canvas double click to spawn a new node
        board.addEventListener('dblclick', function(e) {
            // Check if user clicked direct canvas background, not inside nodes/menus
            if (e.target === board || e.target === nodesCanvas || e.target === svgCanvas) {
                const rect = board.getBoundingClientRect();
                const x = e.clientX - rect.left - 60; // center offset
                const y = e.clientY - rect.top - 20;

                const newNode = {
                    id: Date.now(),
                    text: 'Nuevo Concepto',
                    x: Math.max(10, Math.min(x, rect.width - 150)),
                    y: Math.max(10, Math.min(y, rect.height - 70)),
                    color: '#3b82f6'
                };

                // If a node is selected, connect the new node as child
                nodes.push(newNode);
                if (selectedNodeId) {
                    connections.push({ from: selectedNodeId, to: newNode.id });
                }

                selectedNodeId = newNode.id;
                render();
            }
        });

        // Click outside node to deselect
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.mindmap-node') && !e.target.closest('.mindmap-control-panel') && !e.target.closest('.node-menu')) {
                selectedNodeId = null;
                updateSelectedNodeUI();
            }
        });
    }

    // Render nodes and SVG connections
    function render() {
        // Clear nodes in DOM
        nodesCanvas.innerHTML = '';

        // Draw nodes
        nodes.forEach(node => {
            const nodeEl = document.createElement('div');
            nodeEl.className = `mindmap-node ${selectedNodeId === node.id ? 'selected' : ''}`;
            nodeEl.style.left = `${node.x}px`;
            nodeEl.style.top = `${node.y}px`;
            nodeEl.style.borderColor = node.color;
            nodeEl.setAttribute('data-id', node.id);

            // Double click to select text inside node
            const input = document.createElement('input');
            input.type = 'text';
            input.className = 'node-text';
            input.value = node.text;
            input.setAttribute('placeholder', 'Escribe algo...');
            input.addEventListener('input', function(e) {
                node.text = e.target.value;
                drawLines(); // redraw connections in case size updates
            });

            nodeEl.appendChild(input);

            // Create Contextual Micro Menu
            const menu = document.createElement('div');
            menu.className = 'node-menu';

            // 1. Add Child Button
            const btnAddChild = document.createElement('button');
            btnAddChild.className = 'node-menu-btn';
            btnAddChild.title = 'Añadir Nodo Hijo';
            btnAddChild.innerHTML = '<i class="ri-node-tree"></i>';
            btnAddChild.addEventListener('click', function(e) {
                e.stopPropagation();
                const childId = Date.now();
                
                // Spawn nearby child node
                const childNode = {
                    id: childId,
                    text: 'Subnodo',
                    x: node.x + 180 + (Math.random() * 20 - 10),
                    y: node.y + (Math.random() * 80 - 40),
                    color: node.color
                };

                nodes.push(childNode);
                connections.push({ from: node.id, to: childId });
                selectedNodeId = childId;
                render();
            });

            // 2. Delete Node Button
            const btnDelete = document.createElement('button');
            btnDelete.className = 'node-menu-btn text-danger';
            btnDelete.title = 'Eliminar Nodo';
            btnDelete.innerHTML = '<i class="ri-delete-bin-line"></i>';
            btnDelete.addEventListener('click', function(e) {
                e.stopPropagation();
                deleteNode(node.id);
            });

            menu.appendChild(btnAddChild);
            menu.appendChild(btnDelete);
            nodeEl.appendChild(menu);

            // Drag and Drop implementation
            nodeEl.addEventListener('mousedown', function(e) {
                if (e.target.closest('.node-menu') || e.target.closest('.node-menu-btn')) return;
                
                selectedNodeId = node.id;
                updateSelectedNodeUI();
                
                draggingNodeId = node.id;
                dragStartX = e.clientX;
                dragStartY = e.clientY;
                nodeStartX = node.x;
                nodeStartY = node.y;

                e.preventDefault();
            });

            // Add node to canvas
            nodesCanvas.appendChild(nodeEl);
        });

        drawLines();
    }

    // Global mouse movements for dragging
    document.addEventListener('mousemove', function(e) {
        if (draggingNodeId !== null) {
            const dx = e.clientX - dragStartX;
            const dy = e.clientY - dragStartY;
            const node = nodes.find(n => n.id === draggingNodeId);

            if (node) {
                const rect = board.getBoundingClientRect();
                // Bound check to keep nodes in canvas bounds
                node.x = Math.max(10, Math.min(nodeStartX + dx, rect.width - 150));
                node.y = Math.max(10, Math.min(nodeStartY + dy, rect.height - 70));

                const nodeEl = nodesCanvas.querySelector(`[data-id="${draggingNodeId}"]`);
                if (nodeEl) {
                    nodeEl.style.left = `${node.x}px`;
                    nodeEl.style.top = `${node.y}px`;
                }

                drawLines();
            }
        }
    });

    document.addEventListener('mouseup', function() {
        draggingNodeId = null;
    });

    // Draw connection lines on SVG layer
    function drawLines() {
        svgCanvas.innerHTML = '';

        connections.forEach(conn => {
            const fromNode = nodes.find(n => n.id === conn.from);
            const toNode = nodes.find(n => n.id === conn.to);

            if (fromNode && toNode) {
                const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                
                // Calculate anchor points (centers of nodes)
                // Assuming standard nodes are around 150x50 pixels
                const x1 = fromNode.x + 75;
                const y1 = fromNode.y + 25;
                const x2 = toNode.x + 75;
                const y2 = toNode.y + 25;

                let d = '';
                if (linkStyle === 'curved') {
                    // Curved horizontal Bezier spline connection
                    const controlOffset = Math.abs(x2 - x1) * 0.5;
                    d = `M ${x1} ${y1} C ${x1 + controlOffset} ${y1}, ${x2 - controlOffset} ${y2}, ${x2} ${y2}`;
                } else {
                    // Straight connector line
                    d = `M ${x1} ${y1} L ${x2} ${y2}`;
                }

                path.setAttribute('d', d);
                path.setAttribute('stroke', '#cbd5e1');
                path.setAttribute('stroke-width', '3');
                path.setAttribute('fill', 'none');
                
                // Color match highlights
                svgCanvas.appendChild(path);
            }
        });
    }

    // Delete node and its orphan branches or connections
    function deleteNode(id) {
        // Prevent deleting last node
        if (nodes.length <= 1) {
            alert('Debe haber al menos un concepto en tu mapa mental.');
            return;
        }

        nodes = nodes.filter(n => n.id !== id);
        connections = connections.filter(c => c.from !== id && c.to !== id);
        selectedNodeId = null;
        render();
    }

    function updateSelectedNodeUI() {
        const allNodeEls = nodesCanvas.querySelectorAll('.mindmap-node');
        allNodeEls.forEach(el => {
            const id = parseInt(el.getAttribute('data-id'));
            if (id === selectedNodeId) {
                el.classList.add('selected');
            } else {
                el.classList.remove('selected');
            }
        });
    }

    // Toggle link styles
    btnStyleCurved.addEventListener('click', () => {
        linkStyle = 'curved';
        btnStyleCurved.classList.add('active');
        btnStyleStraight.classList.remove('active');
        drawLines();
    });

    btnStyleStraight.addEventListener('click', () => {
        linkStyle = 'straight';
        btnStyleStraight.classList.add('active');
        btnStyleCurved.classList.remove('active');
        drawLines();
    });

    // Add root node
    btnAddNode.addEventListener('click', () => {
        const rect = board.getBoundingClientRect();
        const newNode = {
            id: Date.now(),
            text: 'Nuevo Concepto',
            x: Math.max(100, Math.random() * (rect.width - 250)),
            y: Math.max(100, Math.random() * (rect.height - 150)),
            color: '#3b82f6'
        };
        nodes.push(newNode);
        selectedNodeId = newNode.id;
        render();
    });

    // Clear Canvas
    btnClearCanvas.addEventListener('click', () => {
        if (confirm('¿Estás seguro de que deseas limpiar todo tu mapa mental? Se perderán todas tus ideas.')) {
            nodes = [{ id: 1, text: 'Idea Principal', x: 300, y: 240, color: '#3b82f6' }];
            connections = [];
            selectedNodeId = 1;
            render();
        }
    });

    // Node Quick Color selection
    colorDots.forEach(dot => {
        dot.addEventListener('click', () => {
            const color = dot.getAttribute('data-color');
            if (selectedNodeId) {
                const node = nodes.find(n => n.id === selectedNodeId);
                if (node) {
                    node.color = color;
                    render();
                }
            } else {
                // Default fallback if no node is selected: alert to select first
                alert('Selecciona un nodo haciendo clic sobre él para cambiar su color.');
            }
        });
    });

    // Export entire canvas structure to valid standalone Vector SVG file
    btnExportSVG.addEventListener('click', function() {
        const rect = board.getBoundingClientRect();
        
        // Assemble connection lines
        let pathsString = '';
        connections.forEach(conn => {
            const fromNode = nodes.find(n => n.id === conn.from);
            const toNode = nodes.find(n => n.id === conn.to);
            if (fromNode && toNode) {
                const x1 = fromNode.x + 75;
                const y1 = fromNode.y + 25;
                const x2 = toNode.x + 75;
                const y2 = toNode.y + 25;
                let d = '';
                if (linkStyle === 'curved') {
                    const controlOffset = Math.abs(x2 - x1) * 0.5;
                    d = `M ${x1} ${y1} C ${x1 + controlOffset} ${y1}, ${x2 - controlOffset} ${y2}, ${x2} ${y2}`;
                } else {
                    d = `M ${x1} ${y1} L ${x2} ${y2}`;
                }
                pathsString += `<path d="${d}" stroke="#94a3b8" stroke-width="3" fill="none" />`;
            }
        });

        // Assemble node elements inside SVG
        let nodesString = '';
        nodes.forEach(node => {
            // Render beautiful SVG boxes mimicking HTML divs
            nodesString += `
            <g transform="translate(${node.x}, ${node.y})">
                <rect width="150" height="50" rx="12" fill="#ffffff" stroke="${node.color}" stroke-width="2" filter="url(#shadow)" />
                <text x="75" y="29" font-family="system-ui, -apple-system, sans-serif" font-size="12" font-weight="bold" fill="#1e293b" text-anchor="middle">${node.text}</text>
            </g>`;
        });

        // Compile complete SVG file markup
        const svgContent = '<' + '?xml version="1.0" encoding="UTF-8" standalone="no"?' + '>\n' + `
<svg width="${rect.width}" height="${rect.height}" viewBox="0 0 ${rect.width} ${rect.height}" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <!-- Grid Background Pattern -->
        <pattern id="grid" width="24" height="24" patternUnits="userSpaceOnUse">
            <circle cx="2" cy="2" r="1.5" fill="#f1f5f9" />
        </pattern>
        <!-- Soft Shadow Filter -->
        <filter id="shadow" x="-10%" y="-10%" width="120%" height="120%">
            <feDropShadow dx="0" dy="4" stdDeviation="6" flood-color="#0f172a" flood-opacity="0.06" />
        </filter>
    </defs>
    <!-- Background -->
    <rect width="100%" height="100%" fill="#fafafa" />
    <rect width="100%" height="100%" fill="url(#grid)" />
    
    <!-- Connection lines layer -->
    <g id="connections">
        ${pathsString}
    </g>
    
    <!-- Nodes layer -->
    <g id="nodes">
        ${nodesString}
    </g>
</svg>`;

        // Download SVG trigger
        const blob = new Blob([svgContent], { type: 'image/svg+xml;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `mindmap-${Date.now()}.svg`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    });

    init();
});
</script>
