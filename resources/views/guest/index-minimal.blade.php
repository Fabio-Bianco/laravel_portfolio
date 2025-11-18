@extends('guest.layouts.guest-minimal')

@section('title', 'Portfolio')

@section('content')
<div class="guest-container">
  
  {{-- ============================================
         HERO SECTION - Split Screen Modern Design
         - Text content on left
         - 3D visual on right with parallax effect
         - Glassmorphism accents
         - Smooth animations
         - Mobile responsive (stacks vertically)
        ============================================ --}}
    <section class="hero-section" id="hero" role="banner" aria-label="Hero section">
      <div class="hero-container">
        {{-- Left Side: Content --}}
        <div class="hero-content">
          {{-- Main Title --}}
          <h1 class="hero-title">
            <span class="title-highlight">{{ config('app.owner_name', 'Fabio Bianco') }}</span>
            <small style="display: block; font-size: 0.35em; font-weight: 400; opacity: 0.5; margin-top: 0.5rem; letter-spacing: 0.15em;">aka b_bot</small>
          </h1>
          
          {{-- Subtitle with typing effect placeholder --}}
          <p class="hero-subtitle">
            Full Stack Developer Jr
          </p>
          
          {{-- Tagline --}}
          <p class="hero-tagline">
            Creo applicazioni web moderne con codice pulito e design centrato sull'utente. 
            Specializzato in <strong>Laravel</strong>, <strong>React</strong> e <strong>JavaScript</strong>.
          </p>
          
          {{-- CTA Buttons --}}
          <div class="hero-cta" role="group" aria-label="Azioni principali">
            <a href="#projects" 
               class="btn-hero btn-hero-primary" 
               onclick="event.preventDefault(); document.getElementById('projects').scrollIntoView({behavior: 'smooth'});"
               aria-label="Esplora i miei progetti">
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
              </svg>
              <span>Vedi i Progetti</span>
            </a>
            <a href="#contact" 
               class="btn-hero btn-hero-secondary" 
               onclick="event.preventDefault(); document.getElementById('contact').scrollIntoView({behavior: 'smooth'});"
               aria-label="Contattami">
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
              </svg>
              <span>Contattami</span>
            </a>
          </div>
        </div>
        
        {{-- Right Side: Code Visual Placeholder --}}
        <div class="hero-visual">
          <div class="hero-code-display">
            <div class="code-window">
              <div class="code-header">
                <span class="code-dot" style="background: #ff5f56;"></span>
                <span class="code-dot" style="background: #ffbd2e;"></span>
                <span class="code-dot" style="background: #27c93f;"></span>
                <span class="code-title">portfolio.php</span>
              </div>
              <div class="code-content">
                <div class="code-line"><span class="code-keyword">class</span> <span class="code-class">Developer</span> <span class="code-bracket">{</span></div>
                <div class="code-line">  <span class="code-keyword">public function</span> <span class="code-function">build</span>() {</div>
                <div class="code-line">    <span class="code-keyword">return</span> [</div>
                <div class="code-line">      <span class="code-string">'passion'</span> => <span class="code-value">true</span>,</div>
                <div class="code-line">      <span class="code-string">'code'</span> => <span class="code-string">'clean'</span>,</div>
                <div class="code-line">      <span class="code-string">'coffee'</span> => <span class="code-value">Infinity</span></div>
                <div class="code-line">    ];</div>
                <div class="code-line">  }</div>
                <div class="code-line"><span class="code-bracket">}</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      {{-- Animated Gradient Background --}}
      <div class="hero-gradient-bg" aria-hidden="true"></div>
      
      {{-- Glassmorphism decorative orbs - Full viewport --}}
      <div class="glass-orb glass-orb-1" aria-hidden="true"></div>
      <div class="glass-orb glass-orb-2" aria-hidden="true"></div>
      
      {{-- Scroll Indicator --}}
      <div class="scroll-indicator" 
           role="button" 
           tabindex="0"
           onclick="document.getElementById('projects').scrollIntoView({behavior: 'smooth'});"
           onkeypress="if(event.key === 'Enter') document.getElementById('projects').scrollIntoView({behavior: 'smooth'});"
           aria-label="Scorri alla sezione progetti"
           style="cursor: pointer;">
        <span class="scroll-text">Scorri giù</span>
        <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" class="scroll-arrow">
          <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
        </svg>
      </div>
    </section>

    {{-- ============================================
         ABOUT ME SECTION - Public Bio
         - Problem-solving oriented bio
         - Umana ma professionale
         - Avatar/foto con lazy loading
         - Personal stats cards
        ============================================ --}}
    <section class="about-section" id="about" role="region" aria-labelledby="about-heading">
      <div class="section-header">
        <span class="section-tag">Chi Sono</span>
        <h2 id="about-heading" class="section-title">Chi Sono</h2>
      </div>
      
      <div class="about-content">
        <div class="about-text">
          <p class="about-intro">
            Sono <strong>{{ config('app.owner_name', 'Fabio Bianco') }}</strong>, un Full Stack Developer appassionato 
            che trasforma problemi complessi in soluzioni eleganti e user-friendly.
          </p>
          <p>
            Con esperienza in <strong>Laravel</strong>, <strong>React</strong> e JavaScript moderno, 
            creo applicazioni web scalabili che danno priorità sia alle prestazioni che all'esperienza utente. 
            Credo nel codice pulito e manutenibile, e mi mantengo aggiornato con le ultime tecnologie web.
          </p>
          <p>
            Quando non programmo, esploro nuovi framework, contribuisco a progetti open-source 
            o condivido conoscenze con la community degli sviluppatori. Sempre pronto ad affrontare nuove sfide 
            e collaborare su progetti innovativi.
          </p>
        </div>
        
        <div class="about-avatar">
          <div class="avatar-container">
            <div class="avatar-image">
              {{-- simplified: removed auth() from guest view --}}
              {{ strtoupper(substr(config('app.owner_name', 'FB'), 0, 2)) }}
            </div>
            <div class="avatar-status" aria-label="Available for work">
              <span class="status-dot"></span>
              <span class="status-text">Disponibile per lavori</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- ============================================
         SKILLS SECTION - Structured & Categorized
         - Frontend / Backend / Tools
         - SVG icons + skill level
         - Grid layout responsive
         - Lazy loading per performance
        ============================================ --}}
    <section class="skills-section" id="skills" role="region" aria-labelledby="skills-heading">
      <div class="section-header">
        <span class="section-tag">Cosa Faccio</span>
        <h2 id="skills-heading" class="section-title">Competenze & Tecnologie</h2>
        <p class="section-description">
          Un toolkit completo per creare applicazioni web moderne e scalabili
        </p>
      </div>
      
      <div class="skills-minimal-grid">
        {{-- Backend --}}
        <div class="skill-category-minimal">
          <h3 class="skill-category-title">Backend</h3>
          <div class="skill-icons-grid">
            @include('guest.partials.tech-icons', ['icon' => 'php', 'size' => 48, 'title' => 'PHP'])
            @include('guest.partials.tech-icons', ['icon' => 'laravel', 'size' => 48, 'title' => 'Laravel'])
            @include('guest.partials.tech-icons', ['icon' => 'mysql', 'size' => 48, 'title' => 'MySQL'])
            @include('guest.partials.tech-icons', ['icon' => 'node', 'size' => 48, 'title' => 'Node.js'])
          </div>
        </div>        {{-- Frontend --}}
        <div class="skill-category-minimal">
          <h3 class="skill-category-title">Frontend</h3>
          <div class="skill-icons-grid">
            @include('guest.partials.tech-icons', ['icon' => 'javascript', 'size' => 48, 'title' => 'JavaScript'])
            @include('guest.partials.tech-icons', ['icon' => 'react', 'size' => 48, 'title' => 'React'])
            @include('guest.partials.tech-icons', ['icon' => 'html5', 'size' => 48, 'title' => 'HTML5'])
            @include('guest.partials.tech-icons', ['icon' => 'css3', 'size' => 48, 'title' => 'CSS3'])
            @include('guest.partials.tech-icons', ['icon' => 'tailwind', 'size' => 48, 'title' => 'Tailwind CSS'])
          </div>
        </div>        {{-- Tools & DevOps --}}
        <div class="skill-category-minimal">
          <h3 class="skill-category-title">Tools & DevOps</h3>
          <div class="skill-icons-grid">
            @include('guest.partials.tech-icons', ['icon' => 'git', 'size' => 48, 'title' => 'Git'])
            @include('guest.partials.tech-icons', ['icon' => 'github', 'size' => 48, 'title' => 'GitHub'])
            @include('guest.partials.tech-icons', ['icon' => 'vscode', 'size' => 48, 'title' => 'VS Code'])
            @include('guest.partials.tech-icons', ['icon' => 'npm', 'size' => 48, 'title' => 'NPM'])
            @include('guest.partials.tech-icons', ['icon' => 'postman', 'size' => 48, 'title' => 'Postman'])
          </div>
        </div>
      </div>
    </section>

    {{-- ============================================
       LEARNING SECTION
      ============================================ --}}
    <section class="learning-section" role="region" aria-labelledby="learning-heading">
      <div class="learning-container">
        <div class="section-header">
          <span class="section-tag">In Crescita</span>
          <h2 id="learning-heading" class="section-title">Sto Imparando</h2>
          <p class="section-subtitle">Tecnologie e linguaggi che sto attualmente studiando per ampliare le mie competenze</p>
        </div>

        <div class="learning-content">
          <div class="learning-grid">
            
            {{-- Python --}}
            <div class="learning-card">
              <div class="learning-icon">
                <svg viewBox="0 0 24 24" width="40" height="40">
                  <path fill="#3776AB" d="M14.25.18l.9.2.73.26.59.3.45.32.34.34.25.34.16.33.1.3.04.26.02.2-.01.13V8.5l-.05.63-.13.55-.21.46-.26.38-.3.31-.33.25-.35.19-.35.14-.33.1-.3.07-.26.04-.21.02H8.77l-.69.05-.59.14-.5.22-.41.27-.33.32-.27.35-.2.36-.15.37-.1.35-.07.32-.04.27-.02.21v3.06H3.17l-.21-.03-.28-.07-.32-.12-.35-.18-.36-.26-.36-.36-.35-.46-.32-.59-.28-.73-.21-.88-.14-1.05-.05-1.23.06-1.22.16-1.04.24-.87.32-.71.36-.57.4-.44.42-.33.42-.24.4-.16.36-.1.32-.05.24-.01h.16l.06.01h8.16v-.83H6.18l-.01-2.75-.02-.37.05-.34.11-.31.17-.28.25-.26.31-.23.38-.2.44-.18.51-.15.58-.12.64-.1.71-.06.77-.04.84-.02 1.27.05zm-6.3 1.98l-.23.33-.08.41.08.41.23.34.33.22.41.09.41-.09.33-.22.23-.34.08-.41-.08-.41-.23-.33-.33-.22-.41-.09-.41.09zm13.09 3.95l.28.06.32.12.35.18.36.27.36.35.35.47.32.59.28.73.21.88.14 1.04.05 1.23-.06 1.23-.16 1.04-.24.86-.32.71-.36.57-.4.45-.42.33-.42.24-.4.16-.36.09-.32.05-.24.02-.16-.01h-8.22v.82h5.84l.01 2.76.02.36-.05.34-.11.31-.17.29-.25.25-.31.24-.38.2-.44.17-.51.15-.58.13-.64.09-.71.07-.77.04-.84.01-1.27-.04-1.07-.14-.9-.2-.73-.25-.59-.3-.45-.33-.34-.34-.25-.34-.16-.33-.1-.3-.04-.25-.02-.2.01-.13v-5.34l.05-.64.13-.54.21-.46.26-.38.3-.32.33-.24.35-.2.35-.14.33-.1.3-.06.26-.04.21-.02.13-.01h5.84l.69-.05.59-.14.5-.21.41-.28.33-.32.27-.35.2-.36.15-.36.1-.35.07-.32.04-.28.02-.21V6.07h2.09l.14.01zm-6.47 14.25l-.23.33-.08.41.08.41.23.33.33.23.41.08.41-.08.33-.23.23-.33.08-.41-.08-.41-.23-.33-.33-.23-.41-.08-.41.08z"/>
                </svg>
              </div>
              <div class="learning-info">
                <h3 class="learning-name">Python</h3>
                <p class="learning-desc">Backend, Automation, Data Processing</p>
                <div class="learning-progress">
                  <div class="progress-bar" style="width: 35%"></div>
                </div>
              </div>
            </div>

            {{-- TypeScript --}}
            <div class="learning-card">
              <div class="learning-icon">
                <svg viewBox="0 0 24 24" width="40" height="40">
                  <path fill="#3178C6" d="M1.125 0C.502 0 0 .502 0 1.125v21.75C0 23.498.502 24 1.125 24h21.75c.623 0 1.125-.502 1.125-1.125V1.125C24 .502 23.498 0 22.875 0zm17.363 9.75c.612 0 1.154.037 1.627.111a6.38 6.38 0 0 1 1.306.34v2.458a3.95 3.95 0 0 0-.643-.361 5.093 5.093 0 0 0-.717-.26 5.453 5.453 0 0 0-1.426-.2c-.3 0-.573.028-.819.086a2.1 2.1 0 0 0-.623.242c-.17.104-.3.229-.393.374a.888.888 0 0 0-.14.49c0 .196.053.373.156.529.104.156.252.304.443.444s.423.276.696.41c.273.135.582.274.926.416.47.197.892.407 1.266.628.374.222.695.473.963.753.268.279.472.598.614.957.142.359.214.776.214 1.253 0 .657-.125 1.21-.373 1.656a3.033 3.033 0 0 1-1.012 1.085 4.38 4.38 0 0 1-1.487.596c-.566.12-1.163.18-1.79.18a9.916 9.916 0 0 1-1.84-.164 5.544 5.544 0 0 1-1.512-.493v-2.63a5.033 5.033 0 0 0 3.237 1.2c.333 0 .624-.03.872-.09.249-.06.456-.144.623-.25.166-.108.29-.234.373-.38a1.023 1.023 0 0 0-.074-1.089 2.12 2.12 0 0 0-.537-.5 5.597 5.597 0 0 0-.807-.444 27.72 27.72 0 0 0-1.007-.436c-.918-.383-1.602-.852-2.053-1.405-.45-.553-.676-1.222-.676-2.005 0-.614.123-1.141.369-1.582.246-.441.58-.804 1.004-1.089a4.494 4.494 0 0 1 1.47-.629 7.536 7.536 0 0 1 1.77-.201zm-15.113.188h9.563v2.166H9.506v9.646H6.789v-9.646H3.375z"/>
                </svg>
              </div>
              <div class="learning-info">
                <h3 class="learning-name">TypeScript</h3>
                <p class="learning-desc">Type Safety, Advanced Patterns</p>
                <div class="learning-progress">
                  <div class="progress-bar" style="width: 45%"></div>
                </div>
              </div>
            </div>

            {{-- Go --}}
            <div class="learning-card">
              <div class="learning-icon">
                <svg viewBox="0 0 24 24" width="40" height="40">
                  <path fill="#00ADD8" d="M1.811 10.231c-.047 0-.058-.023-.035-.059l.246-.315c.023-.035.081-.058.128-.058h4.172c.046 0 .058.035.035.07l-.199.303c-.023.036-.082.07-.117.07zM.047 11.306c-.047 0-.059-.023-.035-.058l.245-.316c.023-.035.082-.058.129-.058h5.328c.047 0 .07.035.058.07l-.093.28c-.012.047-.058.07-.105.07zm2.828 1.075c-.047 0-.059-.035-.035-.07l.163-.292c.023-.035.07-.07.117-.07h2.337c.047 0 .07.035.07.082l-.023.28c0 .047-.047.082-.082.082zm12.129-2.36c-.736.187-1.239.327-1.963.514-.176.046-.187.058-.34-.117-.174-.199-.303-.327-.548-.444-.737-.362-1.45-.257-2.115.175-.795.514-1.204 1.274-1.192 2.22.011.935.654 1.706 1.577 1.835.795.105 1.46-.175 1.987-.77.105-.13.198-.27.315-.434H10.47c-.245 0-.304-.152-.222-.35.152-.362.432-.97.596-1.274a.315.315 0 0 1 .292-.187h4.253c-.023.316-.023.631-.07.947a4.983 4.983 0 0 1-.958 2.29c-.841 1.11-1.94 1.8-3.33 1.986-1.145.152-2.209-.07-3.143-.77-.865-.65-1.356-1.52-1.484-2.595-.152-1.274.222-2.419.993-3.424.83-1.086 1.928-1.776 3.272-2.02 1.098-.2 2.15-.07 3.096.571.62.41 1.063.97 1.356 1.648.07.105.023.164-.117.2m3.868 6.461c-1.064-.024-2.034-.328-2.852-1.029a3.665 3.665 0 0 1-1.262-2.255c-.21-1.32.152-2.489.947-3.529.853-1.122 1.881-1.706 3.272-1.95 1.192-.21 2.314-.095 3.33.595.923.63 1.496 1.484 1.648 2.605.198 1.578-.257 2.887-1.309 3.965-.771.806-1.683 1.293-2.852 1.485-.315.047-.631.07-.946.07-.012.047-.012.047-.023.047zm2.314-4.206c-.011-.899-.432-1.485-1.109-1.75-.9-.354-1.763-.153-2.384.539-.585.637-.703 1.408-.46 2.232.267.83.65 1.31 1.553 1.497.768.153 1.461-.024 1.988-.657.594-.71.65-1.497.412-2.232v.37z"/>
                </svg>
              </div>
              <div class="learning-info">
                <h3 class="learning-name">Go</h3>
                <p class="learning-desc">Microservices, Performance</p>
                <div class="learning-progress">
                  <div class="progress-bar" style="width: 25%"></div>
                </div>
              </div>
            </div>

            {{-- Docker --}}
            <div class="learning-card">
              <div class="learning-icon">
                <svg viewBox="0 0 24 24" width="40" height="40">
                  <path fill="#2496ED" d="M13.983 11.078h2.119a.186.186 0 00.186-.185V9.006a.186.186 0 00-.186-.186h-2.119a.185.185 0 00-.185.185v1.888c0 .102.083.185.185.185m-2.954-5.43h2.118a.186.186 0 00.186-.186V3.574a.186.186 0 00-.186-.185h-2.118a.185.185 0 00-.185.185v1.888c0 .102.082.185.185.185m0 2.716h2.118a.187.187 0 00.186-.186V6.29a.186.186 0 00-.186-.185h-2.118a.185.185 0 00-.185.185v1.887c0 .102.082.185.185.186m-2.93 0h2.12a.186.186 0 00.184-.186V6.29a.185.185 0 00-.185-.185H8.1a.185.185 0 00-.185.185v1.887c0 .102.083.185.185.186m-2.964 0h2.119a.186.186 0 00.185-.186V6.29a.185.185 0 00-.185-.185H5.136a.186.186 0 00-.186.185v1.887c0 .102.084.185.186.186m5.893 2.715h2.118a.186.186 0 00.186-.185V9.006a.186.186 0 00-.186-.186h-2.118a.185.185 0 00-.185.185v1.888c0 .102.082.185.185.185m-2.93 0h2.12a.185.185 0 00.184-.185V9.006a.185.185 0 00-.184-.186h-2.12a.185.185 0 00-.184.185v1.888c0 .102.083.185.185.185m-2.964 0h2.119a.185.185 0 00.185-.185V9.006a.185.185 0 00-.184-.186h-2.12a.186.186 0 00-.186.186v1.887c0 .102.084.185.186.185m-2.92 0h2.12a.185.185 0 00.184-.185V9.006a.185.185 0 00-.184-.186h-2.12a.185.185 0 00-.184.185v1.888c0 .102.082.185.185.185M23.763 9.89c-.065-.051-.672-.51-1.954-.51-.338.001-.676.03-1.01.087-.248-1.7-1.653-2.53-1.716-2.566l-.344-.199-.226.327c-.284.438-.49.922-.612 1.43-.23.97-.09 1.882.403 2.661-.595.332-1.55.413-1.744.42H.751a.751.751 0 00-.75.748 11.376 11.376 0 00.692 4.062c.545 1.428 1.355 2.48 2.41 3.124 1.18.723 3.1 1.137 5.275 1.137.983.003 1.963-.086 2.93-.266a12.248 12.248 0 003.823-1.389c.98-.567 1.86-1.288 2.61-2.136 1.252-1.418 1.998-2.997 2.553-4.4h.221c1.372 0 2.215-.549 2.68-1.009.309-.293.55-.65.707-1.046l.098-.288z"/>
                </svg>
              </div>
              <div class="learning-info">
                <h3 class="learning-name">Docker</h3>
                <p class="learning-desc">Containerization, DevOps</p>
                <div class="learning-progress">
                  <div class="progress-bar" style="width: 40%"></div>
                </div>
              </div>
            </div>

            {{-- PostgreSQL --}}
            <div class="learning-card">
              <div class="learning-icon">
                <svg viewBox="0 0 24 24" width="40" height="40">
                  <path fill="#4169E1" d="M23.5594 14.7228a.5269.5269 0 0 0-.0563-.1191c-.139-.2632-.4768-.3418-.7805-.1779a.2332.2332 0 0 0-.1357.1314c-.1703.4966-.5747.7283-1.2245.7283-1.3878 0-2.8878-.614-4.2863-1.1785-1.2485-.5035-2.542-1.0247-3.7173-1.0247-.8128 0-1.5222.2809-2.0995.8349-1.8825 1.8062-2.6292 1.8894-3.0872 1.8894-.266 0-.3836-.0691-.4376-.1411-.1411-.1869-.0495-.5149.2077-.7957 1.3363-1.4545 2.2769-2.6193 2.7949-3.4653.8858-1.4474 1.022-2.6562.3949-3.4992-.5673-.7608-1.5637-.9198-2.6736-.7283-1.0683.1869-2.3187.6364-3.5116 1.0674-1.2783.4622-2.6062.9419-3.7327.9119a6.6664 6.6664 0 0 1-.9586-.0936 2.5064 2.5064 0 0 0-.3266-.056c-.2657 0-.5395.1335-.7449.364-.2895.3247-.4005.74-.2936 1.1076.0316.1092.139.2673.5562.2673.2301 0 .5068-.0632.8379-.1349 1.3812-.2976 3.2664-.7031 4.7625-.0495.4313.1885.819.4307 1.1831.6615.7449.4737 1.4197.9029 2.4857.9029.9624 0 2.0141-.3765 3.1215-.7529 1.1036-.3753 2.2434-.7638 3.292-.7638.7588 0 1.4050.1883 1.9216.5597.5249.3779.8182.8931.8182 1.4429 0 .493-.1681.8825-.4997 1.1577-.1962.1619-.4504.2738-.7344.323-.495.0866-.8972.0495-1.2006-.1123a.5511.5511 0 0 0-.282-.0769.4366.4366 0 0 0-.2921.1335c-.2929.2918-.2232.7355.1369 1.0976.195.1957.4595.3373.7662.4102a2.0463 2.0463 0 0 0 .5914.0866c.438 0 .9085-.114 1.3917-.338.3489-.162.6542-.3686.9073-.6136.5608-.5417.8665-1.2552.8665-2.0141-.0001-.9984-.4408-1.8543-1.2743-2.4756z"/>
                </svg>
              </div>
              <div class="learning-info">
                <h3 class="learning-name">PostgreSQL</h3>
                <p class="learning-desc">Advanced Queries, Performance Tuning</p>
                <div class="learning-progress">
                  <div class="progress-bar" style="width: 30%"></div>
                </div>
              </div>
            </div>

            {{-- MongoDB --}}
            <div class="learning-card">
              <div class="learning-icon">
                <svg viewBox="0 0 24 24" width="40" height="40">
                  <path fill="#47A248" d="M17.193 9.555c-1.264-5.58-4.252-7.414-4.573-8.115-.28-.394-.53-.954-.735-1.44-.036.495-.055.685-.523 1.184-.723.566-4.438 3.682-4.74 10.02-.282 5.912 4.27 9.435 4.888 9.884l.07.05A73.49 73.49 0 0111.91 24h.481c.114-1.032.284-2.056.51-3.07.417-.296.604-.463.85-.693a11.342 11.342 0 003.639-8.464c.01-.814-.103-1.662-.197-2.218zm-5.336 8.195s0-8.291.275-8.29c.213 0 .49 10.695.49 10.695-.381-.045-.765-1.76-.765-2.405z"/>
                </svg>
              </div>
              <div class="learning-info">
                <h3 class="learning-name">MongoDB</h3>
                <p class="learning-desc">NoSQL, Document Database</p>
                <div class="learning-progress">
                  <div class="progress-bar" style="width: 35%"></div>
                </div>
              </div>
            </div>

            {{-- Java --}}
            <div class="learning-card">
              <div class="learning-icon">
                <svg viewBox="0 0 24 24" width="40" height="40">
                  <path fill="#007396" d="M8.851 18.56s-.917.534.653.714c1.902.218 2.874.187 4.969-.211 0 0 .552.346 1.321.646-4.699 2.013-10.633-.118-6.943-1.149M8.276 15.933s-1.028.761.542.924c2.032.209 3.636.227 6.413-.308 0 0 .384.389.987.602-5.679 1.661-12.007.13-7.942-1.218M13.116 11.475c1.158 1.333-.304 2.533-.304 2.533s2.939-1.518 1.589-3.418c-1.261-1.772-2.228-2.652 3.007-5.688 0-.001-8.216 2.051-4.292 6.573M19.33 20.504s.679.559-.747.991c-2.712.822-11.288 1.069-13.669.033-.856-.373.75-.89 1.254-.998.527-.114.828-.093.828-.093-.953-.671-6.156 1.317-2.643 1.887 9.58 1.553 17.462-.7 14.977-1.82M9.292 13.21s-4.362 1.036-1.544 1.412c1.189.159 3.561.123 5.77-.062 1.806-.152 3.618-.477 3.618-.477s-.637.272-1.098.587c-4.429 1.165-12.986.623-10.522-.568 2.082-1.006 3.776-.892 3.776-.892M17.116 17.584c4.503-2.34 2.421-4.589.968-4.285-.355.074-.515.138-.515.138s.132-.207.385-.297c2.875-1.011 5.086 2.981-.928 4.562 0-.001.07-.062.09-.118M14.401 0s2.494 2.494-2.365 6.33c-3.896 3.077-.888 4.832-.001 6.836-2.274-2.053-3.943-3.858-2.824-5.539 1.644-2.469 6.197-3.665 5.19-7.627M9.734 23.924c4.322.277 10.959-.153 11.116-2.198 0 0-.302.775-3.572 1.391-3.688.694-8.239.613-10.937.168 0-.001.553.457 3.393.639"/>
                </svg>
              </div>
              <div class="learning-info">
                <h3 class="learning-name">Java</h3>
                <p class="learning-desc">Spring Boot, Enterprise Applications</p>
                <div class="learning-progress">
                  <div class="progress-bar" style="width: 20%"></div>
                </div>
              </div>
            </div>

            {{-- Angular --}}
            <div class="learning-card">
              <div class="learning-icon">
                <svg viewBox="0 0 24 24" width="40" height="40">
                  <path fill="#DD0031" d="M9.931 12.645h4.138l-2.07-4.908m0-7.737L.68 3.982l1.726 14.771L12 24l9.596-5.242L23.32 3.984 11.999.001zm7.064 18.31l-2.096-1.218-4.898 2.717v-2.73l-4.011-2.346 1.356-8.131 4.655 11.088 7.064-4.13v4.75l-2.07 1.218z"/>
                </svg>
              </div>
              <div class="learning-info">
                <h3 class="learning-name">Angular</h3>
                <p class="learning-desc">TypeScript Framework, SPA Development</p>
                <div class="learning-progress">
                  <div class="progress-bar" style="width: 30%"></div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    {{-- ============================================
       PROJECTS SECTION
      ============================================ --}}
    <section id="projects" class="projects-section" role="region" aria-labelledby="projects-heading">
      <div class="section-header">
        <span class="section-tag">Il Mio Lavoro</span>
        <h2 id="projects-heading" class="section-title">Progetti in Evidenza</h2>
      </div>

      {{-- Filtri --}}
      @if(isset($allTypes))
        <div class="filters-section">
          <div class="filter-group" style="justify-content: center;">
            <button type="button"
                    data-filter="all"
                    class="filter-chip {{ !isset($currentType) ? 'active' : '' }}">
              Tutti
              @isset($typeCounts)
                <span class="count">{{ $typeCounts->sum() }}</span>
              @endisset
            </button>
            @foreach($allTypes as $t)
              @php
                $count = $typeCounts[$t->id] ?? 0;
              @endphp
              @if($count > 0)
                <button type="button"
                        data-filter="{{ $t->slug }}"
                        class="filter-chip {{ (isset($currentType) && $currentType->id === $t->id) ? 'active' : '' }}">
                  {{ $t->name }}
                  <span class="count">{{ $count }}</span>
                </button>
              @endif
            @endforeach
          </div>
        </div>
      @endif

      {{-- Stats --}}
      <div class="stats-bar">
        <span class="stat-item">
          <strong>{{ $projects->total() }}</strong> progetti
        </span>
        @if(isset($currentType) || (isset($isFeatured) && $isFeatured))
          <span>•</span>
          <a href="{{ route('home') }}" style="color: var(--color-accent); text-decoration: none;">
            Tutti i progetti
          </a>
        @endif
        @if(!isset($isFeatured) || !$isFeatured)
          @php
            $featuredCount = \App\Models\Project::published()->featured()->count();
          @endphp
          @if($featuredCount > 0)
            <span>•</span>
            <a href="{{ route('projects.featured') }}" style="color: var(--color-accent); text-decoration: none;">
              ⭐ In Evidenza ({{ $featuredCount }})
            </a>
          @endif
        @endif
      </div>

      {{-- Projects Grid --}}
      <div class="projects-grid">
        @forelse($projects as $project)
          <article class="project-card" data-type="{{ $project->type ? $project->type->slug : '' }}">
            
            {{-- Image --}}
            @if($project->image_url)
              <div class="project-card-image">
                <img 
                  src="{{ $project->image_url }}" 
                  alt="{{ $project->title }}"
                  loading="lazy"
                  width="800"
                  height="450"
                  class="project-image"
                >
              </div>
            @else
              @php
                $gradients = [
                  '#667eea 0%, #764ba2 100%',
                  '#f093fb 0%, #f5576c 100%',
                  '#4facfe 0%, #00f2fe 100%',
                  '#43e97b 0%, #38f9d7 100%'
                ];
                $randomGradient = $gradients[array_rand($gradients)];
              @endphp
              <div class="project-card-image" style="background: linear-gradient(135deg, {{ $randomGradient }});">
                <div style="display: flex; align-items: center; justify-content: center; height: 100%; font-size: 3rem; color: white; opacity: 0.3;">
                  {{ strtoupper(substr($project->title, 0, 1)) }}
                </div>
              </div>
            @endif
            
            <div class="project-card-body">
              
              {{-- Meta badges --}}
              <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1rem;">
                @if($project->type)
                  @php
                    $typeName = strtolower($project->type->name);
                    $badgeClass = 'frontend';
                    if ($typeName === 'automazioni') $badgeClass = 'automazioni';
                    elseif ($typeName === 'backend') $badgeClass = 'backend';
                  @endphp
                  <span class="badge-type badge-type-{{ $badgeClass }}">
                    {{ $project->type->name }}
                  </span>
                @endif
                
                @if($project->technologies && $project->technologies->count())
                  @foreach($project->technologies->take(3) as $tech)
                    <span class="badge-tech">{{ $tech->name }}</span>
                  @endforeach
                  @if($project->technologies->count() > 3)
                    <span class="badge-tech" style="opacity: 0.7;">+{{ $project->technologies->count() - 3 }}</span>
                  @endif
                @endif
              </div>
              
              {{-- Title --}}
              <h2 class="project-card-title">{{ $project->title }}</h2>
              
              {{-- Description --}}
              @if($project->description)
                <p class="project-card-description">{{ $project->description }}</p>
              @endif
              
              {{-- Meta info --}}
              @if(!is_null($project->stargazers_count) || !is_null($project->forks_count))
                <div style="display: flex; gap: 1rem; margin-bottom: 1rem; color: var(--color-text-muted); font-size: 0.9rem;">
                  @if(!is_null($project->stargazers_count))
                    <span style="display: flex; align-items: center; gap: 0.35rem;">
                      ⭐ {{ $project->stargazers_count }}
                    </span>
                  @endif
                  @if(!is_null($project->forks_count))
                    <span style="display: flex; align-items: center; gap: 0.35rem;">
                      🔀 {{ $project->forks_count }}
                    </span>
                  @endif
                </div>
              @endif
              
              {{-- Action --}}
              <div style="margin-top: auto;">
                <a href="{{ route('projects.show', $project->slug) }}" class="btn-primary-minimal" style="width: 100%; justify-content: center;">
                  Vedi progetto
                  <span style="font-size: 1.2rem;">→</span>
                </a>
              </div>
              
            </div>
            
          </article>
        @empty
          <div class="empty-state" style="grid-column: 1 / -1;">
            <div class="empty-state-icon">📭</div>
            <h3 style="margin-bottom: 0.5rem;">Nessun progetto trovato</h3>
            <p class="text-muted">Prova a cambiare i filtri di ricerca</p>
            @if(isset($currentType))
              <a href="{{ route('home') }}" class="btn-minimal" style="margin-top: 1rem;">
                Mostra tutti i progetti
              </a>
            @endif
          </div>
        @endforelse
      </div>

      {{-- Pagination --}}
      @if($projects->hasPages())
        <div style="display: flex; justify-content: center;">
          {{ $projects->links() }}
        </div>
      @endif
    </section>

    {{-- Modern Contact Section --}}
    @include('guest.partials.contact-modern')




</div>
@endsection
