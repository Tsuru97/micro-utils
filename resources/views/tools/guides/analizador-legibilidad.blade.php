<div class="card border-0 shadow-sm mt-5">
    <div class="card-body p-4">
        @if(app()->getLocale() == 'es')
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>Guía de Uso: Análisis de Legibilidad y Comprensión de Textos
            </h4>
            <p class="text-muted">
                La **legibilidad** mide la facilidad con la que un lector puede comprender un texto escrito. En la redacción de contenidos, el SEO y la comunicación corporativa, mantener un nivel de legibilidad adecuado para tu público objetivo es indispensable: un texto demasiado complejo ahuyentará a los lectores aumentando la tasa de rebote, mientras que uno demasiado simple podría carecer de la profundidad técnica requerida.
            </p>
            <p class="text-muted">
                Nuestra herramienta calcula automáticamente tres de las fórmulas de legibilidad más respetadas en el ámbito académico y editorial. Analiza en tiempo real la estructura de tu prosa (palabras, oraciones y sílabas) y arroja puntuaciones detalladas y comprensibles de inmediato.
            </p>
            
            <h5 class="text-dark mt-4">Las Fórmulas Matemáticas Utilizadas</h5>
            <ul class="text-muted ps-3 mb-4">
                <li class="mb-3">
                    <strong>1. Índice de Fernández-Huerta (FH):</strong>
                    Es una de las adaptaciones más precisas de la fórmula de Flesch para el idioma español. Se calcula como:
                    <br><code class="d-block my-2 bg-light p-2 rounded text-dark fs-12 font-monospace">FH = 206.84 - (0.60 * P) - (1.02 * F)</code>
                    Donde <code class="fs-12 text-primary font-monospace">P</code> representa el número de sílabas por cada 100 palabras, y <code class="fs-12 text-primary font-monospace">F</code> es el promedio de palabras por oración. Una puntuación superior a 60 indica un nivel estándar (estilo periodístico) apto para el público general.
                </li>
                <li class="mb-3">
                    <strong>2. Índice de Szigriszt-Pazos (SP):</strong>
                    Otro pilar fundamental de la legibilidad en español, muy similar al método FH pero con pesos estadísticos ajustados:
                    <br><code class="d-block my-2 bg-light p-2 rounded text-dark fs-12 font-monospace">SP = 206.84 - 62.33 * (Sílabas / Palabras) - (Palabras / Oraciones)</code>
                    Califica la prosa desde "Muy Difícil" (texto científico hermético, menor a 35) hasta "Muy Fácil" (mayor a 85).
                </li>
                <li>
                    <strong>3. Flesch-Kincaid Grade Level (FK):</strong>
                    Es el estándar de oro en el idioma inglés y se utiliza en esta herramienta para estimar la complejidad educativa equivalente en años de escuela escolarizada americana (e.g. un grado de 8.0 significa que un alumno de octavo grado de secundaria puede entender el texto fácilmente).
                </li>
            </ul>

            <h5 class="text-dark">Seguridad y Privacidad de Datos</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Procesamiento Local:</strong> Respetamos tu propiedad intelectual y la privacidad de tus redacciones. Todo el análisis gramático, la separación de sílabas heurística en español y el cómputo de fórmulas se realizan 100% de forma local en tu navegador mediante JavaScript. Ninguna línea de tu texto es enviada a servidores externos, garantizando una confidencialidad del 100%.
            </div>
        @else
            <h4 class="text-primary mb-3">
                <i class="ri-article-line me-2 align-middle"></i>User Guide: Text Readability and Comprehension Analysis
            </h4>
            <p class="text-muted">
                **Readability** measures how easy it is for a target reader to digest and comprehend written prose. Whether you are copywriting, drafting academic abstracts, or optimizing digital marketing blogs for SEO, adjusting your readability to the educational level of your audience is key: dense phrasing increases bounce rates, whereas overly simplistic structures might undermine your professional authority.
            </p>
            <p class="text-muted">
                Our premium **Text Readability Analyzer** computes three renowned quantitative formulas in real-time. By parsing your prose's raw mechanics (sentences, words, and syllable counts), it delivers instantaneous, color-coded scorecards of your writing complexity.
            </p>
            
            <h5 class="text-dark mt-4">The Mathematical Formulas Explained</h5>
            <ul class="text-muted ps-3 mb-4">
                <li class="mb-3">
                    <strong>1. Fernandez-Huerta Index (FH):</strong>
                    A highly accurate adaptation of the Flesch Reading Ease index tailored specifically to Spanish grammar and syntax:
                    <br><code class="d-block my-2 bg-light p-2 rounded text-dark fs-12 font-monospace">FH = 206.84 - (0.60 * P) - (1.02 * F)</code>
                    Where <code class="fs-12 text-primary font-monospace">P</code> is the number of syllables per 100 words, and <code class="fs-12 text-primary font-monospace">F</code> is the average sentence length in words. Scores above 60 denote standard journalistic clarity.
                </li>
                <li class="mb-3">
                    <strong>2. Szigriszt-Pazos Index (SP):</strong>
                    Another staple of Spanish linguistics, measuring how accessible and fluid a piece of literature is:
                    <br><code class="d-block my-2 bg-light p-2 rounded text-dark fs-12 font-monospace">SP = 206.84 - 62.33 * (Syllables / Words) - (Words / Sentences)</code>
                    Indexes below 35 represent dense academic/scientific documents, whereas marks over 85 characterize elementary levels.
                </li>
                <li>
                    <strong>3. Flesch-Kincaid Grade Level (FK):</strong>
                    The classic standard for English readability, translating the complexity of sentences and syllable weights into US school grade levels (e.g., a grade score of 8.0 indicates standard editorial prose readable by 13-14 year-old students).
                </li>
            </ul>

            <h5 class="text-dark">Data Privacy & Security Guaranteed</h5>
            <div class="alert alert-success border-0 shadow-none bg-success-subtle mb-0">
                <i class="ri-shield-check-line label-icon align-middle fs-18 me-2 text-success"></i>
                <strong>Private Browser Execution:</strong> We value your copyright and intellectual property. The text analysis, sentence tokenizers, and syllable counters run fully in client-side memory through native JavaScript. Absolutely no text is transmitted or cached on our servers.
            </div>
        @endif
    </div>
</div>
