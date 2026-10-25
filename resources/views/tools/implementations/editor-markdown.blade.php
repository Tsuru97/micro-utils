<div class="markdown-editor-wrapper py-3">
    <style>
        .editor-container {
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 16px;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        [data-bs-theme="dark"] .editor-container {
            border-color: rgba(255, 255, 255, 0.08);
            background: #1e293b;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .editor-toolbar {
            background: rgba(0, 0, 0, 0.02);
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
            padding: 10px 16px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }

        [data-bs-theme="dark"] .editor-toolbar {
            background: rgba(255, 255, 255, 0.02);
            border-bottom-color: rgba(255, 255, 255, 0.06);
        }

        .toolbar-btn {
            background: transparent;
            border: 1px solid transparent;
            color: #64748b;
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .toolbar-btn:hover {
            background: rgba(59, 130, 246, 0.08);
            color: #3b82f6;
            border-color: rgba(59, 130, 246, 0.15);
        }

        [data-bs-theme="dark"] .toolbar-btn {
            color: #94a3b8;
        }

        [data-bs-theme="dark"] .toolbar-btn:hover {
            background: rgba(59, 130, 246, 0.15);
            color: #60a5fa;
            border-color: rgba(59, 130, 246, 0.3);
        }

        .toolbar-divider {
            width: 1px;
            height: 20px;
            background: rgba(0, 0, 0, 0.1);
            margin: 0 4px;
        }

        [data-bs-theme="dark"] .toolbar-divider {
            background: rgba(255, 255, 255, 0.1);
        }

        .pane-textarea {
            font-family: 'Fira Code', 'Courier New', Courier, monospace;
            font-size: 0.875rem;
            line-height: 1.6;
            resize: none;
            border: none;
            height: 500px;
            background: transparent;
            color: #0f172a;
            padding: 20px;
            outline: none;
            width: 100%;
        }

        [data-bs-theme="dark"] .pane-textarea {
            color: #f1f5f9;
        }

        .pane-preview {
            height: 500px;
            overflow-y: auto;
            padding: 20px;
            background: #fafafa;
            border-left: 1px solid rgba(0, 0, 0, 0.08);
        }

        [data-bs-theme="dark"] .pane-preview {
            background: #0f172a;
            border-left-color: rgba(255, 255, 255, 0.08);
        }

        /* Markdown rendered preview style */
        .markdown-body {
            color: #334155;
            font-size: 0.95rem;
            line-height: 1.7;
        }

        [data-bs-theme="dark"] .markdown-body {
            color: #cbd5e1;
        }

        .markdown-body h1, .markdown-body h2, .markdown-body h3, .markdown-body h4 {
            font-weight: 700;
            color: #0f172a;
            margin-top: 1.25rem;
            margin-bottom: 0.75rem;
            line-height: 1.35;
        }

        [data-bs-theme="dark"] .markdown-body h1, 
        [data-bs-theme="dark"] .markdown-body h2, 
        [data-bs-theme="dark"] .markdown-body h3, 
        [data-bs-theme="dark"] .markdown-body h4 {
            color: #f8fafc;
        }

        .markdown-body h1 { font-size: 1.6rem; border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: 0.3em; }
        .markdown-body h2 { font-size: 1.35rem; border-bottom: 1px solid rgba(0,0,0,0.04); padding-bottom: 0.2em; }
        .markdown-body h3 { font-size: 1.15rem; }
        .markdown-body h4 { font-size: 1rem; }

        [data-bs-theme="dark"] .markdown-body h1 { border-bottom-color: rgba(255,255,255,0.06); }
        [data-bs-theme="dark"] .markdown-body h2 { border-bottom-color: rgba(255,255,255,0.04); }

        .markdown-body code {
            font-family: 'Fira Code', monospace;
            background: rgba(59, 130, 246, 0.07);
            color: #2563eb;
            padding: 2px 6px;
            border-radius: 6px;
            font-size: 0.85em;
        }

        [data-bs-theme="dark"] .markdown-body code {
            background: rgba(96, 165, 250, 0.12);
            color: #60a5fa;
        }

        .markdown-body pre {
            background: #1e293b;
            color: #f8fafc;
            padding: 16px;
            border-radius: 12px;
            overflow-x: auto;
            margin-bottom: 1rem;
        }

        .markdown-body pre code {
            background: transparent;
            color: inherit;
            padding: 0;
            font-size: 0.85rem;
        }

        .markdown-body blockquote {
            border-left: 4px solid #3b82f6;
            background: rgba(59, 130, 246, 0.03);
            color: #475569;
            padding: 10px 20px;
            margin-left: 0;
            margin-bottom: 1rem;
            border-radius: 0 8px 8px 0;
        }

        [data-bs-theme="dark"] .markdown-body blockquote {
            background: rgba(59, 130, 246, 0.05);
            color: #94a3b8;
        }

        .markdown-body table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5rem;
        }

        .markdown-body th, .markdown-body td {
            border: 1px solid rgba(0, 0, 0, 0.08);
            padding: 8px 12px;
            font-size: 0.875rem;
        }

        [data-bs-theme="dark"] .markdown-body th, 
        [data-bs-theme="dark"] .markdown-body td {
            border-color: rgba(255, 255, 255, 0.08);
        }

        .markdown-body th {
            background: rgba(0, 0, 0, 0.02);
            font-weight: 600;
        }

        [data-bs-theme="dark"] .markdown-body th {
            background: rgba(255, 255, 255, 0.02);
        }

        /* TOC style */
        .toc-box {
            background: rgba(59, 130, 246, 0.02);
            border: 1px solid rgba(59, 130, 246, 0.08);
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 20px;
        }

        .toc-title {
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #3b82f6;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .toc-list {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
        }

        .toc-item {
            margin-bottom: 6px;
        }

        .toc-link {
            color: #64748b;
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.2s ease;
            display: inline-block;
        }

        .toc-link:hover {
            color: #3b82f6;
        }

        [data-bs-theme="dark"] .toc-link {
            color: #94a3b8;
        }

        [data-bs-theme="dark"] .toc-link:hover {
            color: #60a5fa;
        }

        .toc-depth-1 { font-weight: 600; }
        .toc-depth-2 { padding-left: 14px; }
        .toc-depth-3 { padding-left: 28px; }

        .stat-badge {
            background: rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(0, 0, 0, 0.05);
            padding: 4px 10px;
            border-radius: 8px;
            font-size: 0.75rem;
            color: #64748b;
            font-weight: 500;
        }

        [data-bs-theme="dark"] .stat-badge {
            background: rgba(255, 255, 255, 0.03);
            border-color: rgba(255, 255, 255, 0.05);
            color: #94a3b8;
        }
    </style>

    <div class="editor-container shadow-sm border-0">
        <!-- Barra de herramientas superior -->
        <div class="editor-toolbar">
            <button class="toolbar-btn" id="btn-bold" title="Negrita (Ctrl+B)">
                <i class="ri-bold"></i>
            </button>
            <button class="toolbar-btn" id="btn-italic" title="Itálica (Ctrl+I)">
                <i class="ri-italic"></i>
            </button>
            <button class="toolbar-btn" id="btn-strikethrough" title="Tachado">
                <i class="ri-strikethrough"></i>
            </button>
            
            <div class="toolbar-divider"></div>

            <button class="toolbar-btn" id="btn-h1" title="Título H1">
                <strong>H1</strong>
            </button>
            <button class="toolbar-btn" id="btn-h2" title="Título H2">
                <strong>H2</strong>
            </button>
            <button class="toolbar-btn" id="btn-h3" title="Título H3">
                <strong>H3</strong>
            </button>

            <div class="toolbar-divider"></div>

            <button class="toolbar-btn" id="btn-list-ul" title="Lista Viñetas">
                <i class="ri-list-unordered"></i>
            </button>
            <button class="toolbar-btn" id="btn-list-ol" title="Lista Numerada">
                <i class="ri-list-ordered"></i>
            </button>
            <button class="toolbar-btn" id="btn-blockquote" title="Cita Blockquote">
                <i class="ri-double-quotes-l"></i>
            </button>

            <div class="toolbar-divider"></div>

            <button class="toolbar-btn" id="btn-code" title="Código en línea">
                <i class="ri-code-s-line"></i>
            </button>
            <button class="toolbar-btn" id="btn-code-block" title="Bloque de código">
                <i class="ri-code-box-line"></i>
            </button>
            <button class="toolbar-btn" id="btn-table" title="Tabla Markdown">
                <i class="ri-table-2"></i>
            </button>

            <div class="toolbar-divider"></div>

            <button class="toolbar-btn" id="btn-link" title="Insertar Enlace">
                <i class="ri-link"></i>
            </button>
            <button class="toolbar-btn" id="btn-image" title="Insertar Imagen">
                <i class="ri-image-line"></i>
            </button>

            <!-- Tabs de vista del preview en lado derecho -->
            <div class="ms-auto d-flex align-items-center gap-2">
                <ul class="nav nav-pills nav-custom-pills" id="preview-tabs" role="tablist" style="--bs-nav-pills-border-radius: 8px; font-size: 0.8rem;">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active py-1.5 px-3" id="tab-rendered" data-bs-toggle="pill" data-bs-target="#pane-rendered" type="button" role="tab" aria-selected="true">
                            <i class="ri-eye-line me-1"></i>Vista Previa
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link py-1.5 px-3" id="tab-html" data-bs-toggle="pill" data-bs-target="#pane-html-code" type="button" role="tab" aria-selected="false">
                            <i class="ri-code-line me-1"></i>Código HTML
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Área Principal: Split Pane -->
        <div class="row g-0">
            <!-- Izquierda: Editor Markdown -->
            <div class="col-12 col-md-6">
                <textarea class="pane-textarea form-control shadow-none" id="md-input" placeholder="@lang('tools.md_placeholder')"># Bienvenidos al Editor Markdown Profesional 🚀

Este es un editor **offline**, elegante y privado diseñado para crear y formatear documentos en tiempo real. 

## Características Principales

1. **Compilación Rápida:** Observa el HTML resultante al instante.
2. **Editor Enriquecido:** Utiliza la barra de herramientas superior para insertar tags comunes.
3. **Generación de TOC:** Se genera automáticamente un índice a partir de los encabezados.
4. **Inspección HTML:** Analiza el código resultante en la pestaña de la derecha.

> Todo el procesamiento es local. Tus textos nunca viajan a ningún servidor web.

### Ejemplo de Bloque de Código

```javascript
// Hola Mundo en JS
function saludar(nombre) {
    console.log(`¡Hola, ${nombre}! Bienvenido a Micro Utils.`);
}
saludar('Usuario');
```

### Tabla de Datos

| Característica | Soporte | Velocidad |
| :--- | :---: | :---: |
| Markdown Estándar | ✅ Completo | ⚡ Inmediato |
| Autonomía Offline | ✅ 100% | ⚡ Inmediato |
| Privacidad Total | ✅ Sí | ⚡ Inmediato |

Disfruta de una experiencia de escritura limpia e interactiva.</textarea>
            </div>

            <!-- Derecha: Previsualización o HTML -->
            <div class="col-12 col-md-6 tab-content bg-body-tertiary">
                <!-- Pane Renderizado HTML -->
                <div class="tab-pane fade show active pane-preview" id="pane-rendered" role="tabpanel" aria-labelledby="tab-rendered">
                    <!-- Índice Auto-Generado -->
                    <div class="toc-box d-none" id="toc-container">
                        <div class="toc-title">
                            <i class="ri-node-tree"></i> @lang('tools.md_toc')
                        </div>
                        <ul class="toc-list" id="toc-list"></ul>
                    </div>

                    <!-- Contenido Compilado -->
                    <div class="markdown-body" id="rendered-output"></div>
                </div>

                <!-- Pane Código HTML puro -->
                <div class="tab-pane fade pane-preview" id="pane-html-code" role="tabpanel" aria-labelledby="tab-html">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="fs-12 fw-bold text-muted uppercase-tracking">Código de marcado HTML resultante</span>
                        <button class="btn btn-sm btn-outline-primary py-1 px-2.5 fs-12" id="btn-copy-html">
                            <i class="ri-file-copy-line me-1"></i> Copiar Código HTML
                        </button>
                    </div>
                    <pre class="w-100 h-100 p-0 m-0 border-0 bg-transparent"><code class="language-html text-success d-block text-wrap" id="html-output" style="font-family: 'Fira Code', monospace; font-size: 0.8rem; line-height: 1.5;"></code></pre>
                </div>
            </div>
        </div>

        <!-- Barra de estado inferior: Estadísticas -->
        <div class="editor-toolbar border-top border-bottom-0 py-2 d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div class="d-flex gap-2">
                <span class="stat-badge"><i class="ri-text-spacing me-1 text-primary"></i> <span id="stat-words">0</span> @lang('tools.words_count')</span>
                <span class="stat-badge"><i class="ri-font-size me-1 text-success"></i> <span id="stat-chars">0</span> @lang('tools.characters_count')</span>
                <span class="stat-badge"><i class="ri-paragraph me-1 text-info"></i> <span id="stat-paragraphs">0</span> @lang('tools.paragraphs')</span>
            </div>
            
            <div class="d-flex gap-2">
                <button class="btn btn-outline-secondary btn-sm py-1.5 px-3 fs-13 shadow-none border-0" id="btn-download-md">
                    <i class="ri-markdown-line me-1"></i> @lang('tools.md_download')
                </button>
                <button class="btn btn-primary btn-sm py-1.5 px-3 fs-13 shadow-none" id="btn-download-html">
                    <i class="ri-file-html-line me-1"></i> @lang('tools.md_download_html')
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const inputArea = document.getElementById('md-input');
    const renderedOutput = document.getElementById('rendered-output');
    const htmlOutput = document.getElementById('html-output');
    const tocContainer = document.getElementById('toc-container');
    const tocList = document.getElementById('toc-list');

    // Stats
    const statWords = document.getElementById('stat-words');
    const statChars = document.getElementById('stat-chars');
    const statParagraphs = document.getElementById('stat-paragraphs');

    // Buttons
    const btnBold = document.getElementById('btn-bold');
    const btnItalic = document.getElementById('btn-italic');
    const btnStrikethrough = document.getElementById('btn-strikethrough');
    const btnH1 = document.getElementById('btn-h1');
    const btnH2 = document.getElementById('btn-h2');
    const btnH3 = document.getElementById('btn-h3');
    const btnListUl = document.getElementById('btn-list-ul');
    const btnListOl = document.getElementById('btn-list-ol');
    const btnBlockquote = document.getElementById('btn-blockquote');
    const btnCode = document.getElementById('btn-code');
    const btnCodeBlock = document.getElementById('btn-code-block');
    const btnTable = document.getElementById('btn-table');
    const btnLink = document.getElementById('btn-link');
    const btnImage = document.getElementById('btn-image');

    const btnCopyHTML = document.getElementById('btn-copy-html');
    const btnDownloadMD = document.getElementById('btn-download-md');
    const btnDownloadHTML = document.getElementById('btn-download-html');

    // Parse Markdown to HTML
    function compileMarkdown(markdown) {
        let html = markdown;

        // Escape HTML tags to prevent XSS and preserve markdown formatting behavior
        html = html
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;");

        // Code Blocks ```lang\ncode\n```
        html = html.replace(/```(\w*)\n([\s\S]*?)\n```/g, function(match, lang, code) {
            return `<pre><code class="language-${lang}">${code.trim()}</code></pre>`;
        });

        // Inline Code `code`
        html = html.replace(/`([^`]+)`/g, '<code>$1</code>');

        // Blockquotes > text
        html = html.replace(/^\>\s?(.*)$/gm, '<blockquote>$1</blockquote>');
        // Merge contiguous blockquotes
        html = html.replace(/<\/blockquote>\n<blockquote>/g, '\n');

        // Tables
        // Parse tables line-by-line or with helper regex
        html = html.replace(/((?:\|[^\n]+\|\n?)+)/g, function(match) {
            const lines = match.trim().split('\n');
            if (lines.length < 2) return match; // Not a full table
            
            let tableHTML = '<table><thead>';
            let tbodyOpen = false;

            lines.forEach((line, index) => {
                // Check if divider line
                if (line.includes('---') || line.includes(':---') || line.includes('---:')) {
                    // It's the align/separator line, skip it
                    return;
                }

                const cells = line.split('|').filter((cell, cIdx) => {
                    // Filter empty outer cells from leading/trailing pipes
                    if (cIdx === 0 && cell.trim() === '') return false;
                    if (cIdx === line.split('|').length - 1 && cell.trim() === '') return false;
                    return true;
                });

                if (index === 0) {
                    tableHTML += '<tr>';
                    cells.forEach(cell => tableHTML += `<th>${cell.trim()}</th>`);
                    tableHTML += '</tr></thead>';
                } else {
                    if (!tbodyOpen) {
                        tableHTML += '<tbody>';
                        tbodyOpen = true;
                    }
                    tableHTML += '<tr>';
                    cells.forEach(cell => tableHTML += `<td>${cell.trim()}</td>`);
                    tableHTML += '</tr>';
                }
            });

            if (tbodyOpen) {
                tableHTML += '</tbody>';
            }
            tableHTML += '</table>';
            return tableHTML;
        });

        // Headers # Header
        html = html.replace(/^#\s(.*)$/gm, '<h1 id="heading-$1">$1</h1>');
        html = html.replace(/^##\s(.*)$/gm, '<h2 id="heading-$1">$1</h2>');
        html = html.replace(/^###\s(.*)$/gm, '<h3 id="heading-$1">$1</h3>');
        html = html.replace(/^####\s(.*)$/gm, '<h4>$1</h4>');
        html = html.replace(/^#####\s(.*)$/gm, '<h5>$1</h5>');
        html = html.replace(/^######\s(.*)$/gm, '<h6>$1</h6>');

        // Clean headers inside IDs for linking
        html = html.replace(/id="heading-([^"]+)"/g, function(match, content) {
            const cleanId = content.toLowerCase().replace(/[^a-z0-9]/g, '-').replace(/-+/g, '-').trim();
            return `id="header-${cleanId}"`;
        });

        // Images ![alt](url)
        html = html.replace(/!\[([^\]]*)\]\(([^)]+)\)/g, '<img src="$2" alt="$1" class="img-fluid rounded my-3">');

        // Links [text](url)
        html = html.replace(/\[([^\]]+)\]\(([^)]+)\)/g, '<a href="$2" target="_blank" rel="noopener noreferrer">$1</a>');

        // Bold **text** or __text__
        html = html.replace(/\*\*([^*]+)\*\*/g, '<strong>$1</strong>');
        html = html.replace(/__([^_]+)__/g, '<strong>$1</strong>');

        // Italics *text* or _text_
        html = html.replace(/\*([^*]+)\*/g, '<em>$1</em>');
        html = html.replace(/_([^_]+)_/g, '<em>$1</em>');

        // Strikethrough ~~text~~
        html = html.replace(/~~([^~]+)~~/g, '<del>$1</del>');

        // Horizontal Rules ---, ___, ***
        html = html.replace(/^(?:---|___|\*\*\*)$/gm, '<hr>');

        // Unordered Lists - text, * text
        html = html.replace(/^\s*[-*+]\s+(.*)$/gm, '<li>$1</li>');
        // Wrap adjacent li tags in ul
        html = html.replace(/(<li>.*<\/li>)/gs, function(match) {
            // This is a naive wrap but sufficient for single level lists. Let's make it better
            return `<ul>${match}</ul>`;
        });
        // Remove nested/duplicate ul tags that are created naively
        html = html.replace(/<\/ul>\n<ul>/g, '\n');

        // Ordered Lists 1. text
        html = html.replace(/^\s*\d+\.\s+(.*)$/gm, '<li>$1</li>');
        // Let's replace li sequences inside ordered lists safely by distinguishing them
        // In native pure JS, simple splitting on paragraphs and tags is usually safer.
        // Let's do simple paragraph wrapping for standard text that are not block elements
        const blocks = html.split(/\n{2,}/);
        const wrappedBlocks = blocks.map(block => {
            const trimmed = block.trim();
            if (trimmed.startsWith('<h') || 
                trimmed.startsWith('<pre') || 
                trimmed.startsWith('<blockquote') || 
                trimmed.startsWith('<table') || 
                trimmed.startsWith('<ul') || 
                trimmed.startsWith('<ol') || 
                trimmed.startsWith('<hr') || 
                trimmed.startsWith('<img') ||
                trimmed.startsWith('<li')) {
                return trimmed;
            }
            return `<p>${trimmed.replace(/\n/g, '<br>')}</p>`;
        });

        html = wrappedBlocks.join('\n');

        // Decode escaped &gt; for HTML rendering to make elements work
        html = html.replace(/&lt;br&gt;/g, '<br>');

        return html;
    }

    // Generate Table of Contents
    function generateTOC(markdown) {
        const headerMatches = markdown.match(/^(#{1,3})\s+(.*)$/gm);
        tocList.innerHTML = '';

        if (!headerMatches || headerMatches.length === 0) {
            tocContainer.classList.add('d-none');
            return;
        }

        tocContainer.classList.remove('d-none');

        headerMatches.forEach(match => {
            const parts = match.match(/^(#{1,3})\s+(.*)$/);
            if (parts) {
                const depth = parts[1].length;
                const title = parts[2].trim().replace(/\*\*|__|\*|_/g, ''); // strip markdown styling from title
                const cleanId = title.toLowerCase().replace(/[^a-z0-9]/g, '-').replace(/-+/g, '-').trim();

                const li = document.createElement('li');
                li.className = `toc-item toc-depth-${depth}`;
                
                const a = document.createElement('a');
                a.href = `#header-${cleanId}`;
                a.className = 'toc-link';
                a.innerHTML = `<i class="ri-arrow-right-s-line text-muted"></i> ${title}`;

                // Smooth scroll trigger
                a.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetEl = document.getElementById(`header-${cleanId}`);
                    if (targetEl) {
                        targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });

                li.appendChild(a);
                tocList.appendChild(li);
            }
        });
    }

    // Update statistics
    function updateStats(text) {
        const trimmed = text.trim();
        const words = trimmed === '' ? 0 : trimmed.split(/\s+/).length;
        const chars = text.length;
        const paragraphs = trimmed === '' ? 0 : trimmed.split(/\n{2,}/).length;

        statWords.textContent = words;
        statChars.textContent = chars;
        statParagraphs.textContent = paragraphs;
    }

    // Insert text at cursor position
    function insertAtCursor(before, after = '') {
        const start = inputArea.selectionStart;
        const end = inputArea.selectionEnd;
        const text = inputArea.value;
        const selectedText = text.substring(start, end);
        
        const replacement = before + (selectedText || after) + (selectedText ? after : '');
        inputArea.value = text.substring(0, start) + replacement + text.substring(end);
        
        inputArea.focus();
        // Restore cursor selection
        inputArea.selectionStart = start + before.length;
        inputArea.selectionEnd = start + before.length + (selectedText || after).length;
        
        processEditorInput();
    }

    function processEditorInput() {
        const val = inputArea.value;
        const html = compileMarkdown(val);
        
        renderedOutput.innerHTML = html;
        htmlOutput.textContent = html;

        generateTOC(val);
        updateStats(val);
    }

    // Hook listeners
    inputArea.addEventListener('input', processEditorInput);

    // Toolbar actions
    btnBold.addEventListener('click', () => insertAtCursor('**', '**'));
    btnItalic.addEventListener('click', () => insertAtCursor('*', '*'));
    btnStrikethrough.addEventListener('click', () => insertAtCursor('~~', '~~'));
    
    btnH1.addEventListener('click', () => insertAtCursor('# ', ''));
    btnH2.addEventListener('click', () => insertAtCursor('## ', ''));
    btnH3.addEventListener('click', () => insertAtCursor('### ', ''));

    btnListUl.addEventListener('click', () => insertAtCursor('- ', ''));
    btnListOl.addEventListener('click', () => insertAtCursor('1. ', ''));
    btnBlockquote.addEventListener('click', () => insertAtCursor('> ', ''));

    btnCode.addEventListener('click', () => insertAtCursor('`', '`'));
    btnCodeBlock.addEventListener('click', () => insertAtCursor('```javascript\n', '\n```'));
    
    btnTable.addEventListener('click', () => {
        const tableTemplate = '\n| Columna 1 | Columna 2 | Columna 3 |\n| :--- | :---: | ---: |\n| Fila 1 | Centrado | Derecha |\n| Fila 2 | Centrado | Derecha |\n';
        insertAtCursor(tableTemplate);
    });

    btnLink.addEventListener('click', () => insertAtCursor('[Texto del Enlace](', 'https://ejemplo.com)'));
    btnImage.addEventListener('click', () => insertAtCursor('![Descripción de la Imagen](', 'https://via.placeholder.com/600x400)'));

    // Ctrl Shortcuts
    inputArea.addEventListener('keydown', function(e) {
        if (e.ctrlKey) {
            if (e.key === 'b' || e.key === 'B') {
                e.preventDefault();
                insertAtCursor('**', '**');
            } else if (e.key === 'i' || e.key === 'I') {
                e.preventDefault();
                insertAtCursor('*', '*');
            }
        }
    });

    // Copy Raw HTML
    btnCopyHTML.addEventListener('click', function(e) {
        e.preventDefault();
        const code = htmlOutput.textContent;
        if (code) {
            navigator.clipboard.writeText(code).then(() => {
                const origHTML = btnCopyHTML.innerHTML;
                btnCopyHTML.innerHTML = '<i class="ri-check-line"></i> ¡Copiado!';
                btnCopyHTML.className = 'btn btn-sm btn-success py-1 px-2.5 fs-12';
                setTimeout(() => {
                    btnCopyHTML.innerHTML = origHTML;
                    btnCopyHTML.className = 'btn btn-sm btn-outline-primary py-1 px-2.5 fs-12';
                }, 2000);
            });
        }
    });

    // Download MD
    btnDownloadMD.addEventListener('click', function() {
        const text = inputArea.value;
        const blob = new Blob([text], { type: 'text/markdown;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `document-${Date.now()}.md`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    });

    // Download HTML
    btnDownloadHTML.addEventListener('click', function() {
        const html = compileMarkdown(inputArea.value);
        const template = `<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento Exportado</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            line-height: 1.6;
            color: #334155;
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }
        h1, h2, h3 { color: #0f172a; margin-top: 1.5em; margin-bottom: 0.5em; }
        h1 { border-bottom: 1px solid #e2e8f0; padding-bottom: 0.3em; }
        code { background: #f1f5f9; color: #2563eb; padding: 2px 6px; border-radius: 4px; font-family: monospace; }
        pre { background: #1e293b; color: #f8fafc; padding: 16px; border-radius: 8px; overflow-x: auto; }
        pre code { background: transparent; color: inherit; padding: 0; }
        blockquote { border-left: 4px solid #3b82f6; background: #f8fafc; color: #475569; padding: 10px 20px; margin: 0 0 16px 0; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }
        th, td { border: 1px solid #e2e8f0; padding: 8px 12px; }
        th { background: #f8fafc; }
    </style>
</head>
<body>
    ${html}
</body>
</html>`;
        const blob = new Blob([template], { type: 'text/html;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `document-${Date.now()}.html`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    });

    // Run Initial Processing
    processEditorInput();
});
</script>
