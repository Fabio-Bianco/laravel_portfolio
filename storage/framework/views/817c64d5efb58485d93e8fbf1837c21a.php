<?php $__env->startSection('title', 'Portfolio'); ?>

<?php $__env->startSection('content'); ?>
<div class="guest-container">
  
  
    <section class="hero-section" id="hero" role="banner" aria-label="Hero section">
      <div class="hero-content">
        
        <h1 class="hero-title"><?php echo e(config('app.owner_name', 'Fabio Bianco')); ?></h1>
        
        
        <p class="hero-subtitle">Full Stack Developer Jr</p>
        <p class="hero-tagline">
          Creo applicazioni web moderne con codice pulito e design centrato sull'utente. 
          Specializzato in <strong>Laravel</strong>, <strong>React</strong> e <strong>JavaScript</strong>.
        </p>
        
        
        <div class="hero-cta" role="group" aria-label="Azioni principali">
          <a href="#projects" 
             class="btn-hero btn-hero-primary" 
             onclick="event.preventDefault(); document.getElementById('projects').scrollIntoView({behavior: 'smooth'});"
             aria-label="Esplora i miei progetti">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
            </svg>
            Vedi i Progetti
          </a>
          <a href="#contact" 
             class="btn-hero btn-hero-secondary" 
             onclick="event.preventDefault(); document.getElementById('contact').scrollIntoView({behavior: 'smooth'});"
             aria-label="Contattami">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
            </svg>
            Contattami
          </a>
        </div>
        
        
      </div>
      
      
      <div class="hero-gradient-bg" aria-hidden="true"></div>
      
      
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

    
    <section class="about-section" id="about" role="region" aria-labelledby="about-heading">
      <div class="section-header">
        <span class="section-tag">Chi Sono</span>
        <h2 id="about-heading" class="section-title">Chi Sono</h2>
      </div>
      
      <div class="about-content">
        <div class="about-text">
          <p class="about-intro">
            Sono <strong><?php echo e(config('app.owner_name', 'Fabio Bianco')); ?></strong>, un Full Stack Developer appassionato 
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
              
              <?php echo e(strtoupper(substr(config('app.owner_name', 'FB'), 0, 2))); ?>

            </div>
            <div class="avatar-status" aria-label="Available for work">
              <span class="status-dot"></span>
              <span class="status-text">Disponibile per lavori</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <section class="skills-section" id="skills" role="region" aria-labelledby="skills-heading">
      <div class="section-header">
        <span class="section-tag">Cosa Faccio</span>
        <h2 id="skills-heading" class="section-title">Competenze & Tecnologie</h2>
        <p class="section-description">
          Un toolkit completo per creare applicazioni web moderne e scalabili
        </p>
      </div>
      
      <div class="skills-grid">
        
        <div class="skill-category">
          <div class="skill-category-header">
            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v9A1.5 1.5 0 0 1 14.5 12h-13A1.5 1.5 0 0 1 0 10.5v-9zM1.5 1a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
              <path d="M2 2h12v8H2V2z"/>
            </svg>
            <h3>Frontend</h3>
          </div>
          <div class="skill-list">
            <div class="skill-item">
              <span class="skill-name">
                <?php echo $__env->make('guest.partials.tech-icons', ['icon' => 'javascript'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                JavaScript (ES6+)
              </span>
              <div class="skill-level" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 90%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">
                <?php echo $__env->make('guest.partials.tech-icons', ['icon' => 'react'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                React
              </span>
              <div class="skill-level" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 85%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">
                <svg width="20" height="20" viewBox="0 0 512 512" style="margin-right: 0.5rem; vertical-align: middle;" aria-hidden="true">
                  <path fill="#E34F26" d="M71.357 460.819L30.272 0h451.456l-41.129 460.746L255.724 512z"/>
                  <path fill="#EF652A" d="M405.388 431.408l35.148-393.73H256v435.146z"/>
                  <path fill="#EBEBEB" d="M124.46 208.59l5.065 56.517H256V208.59zM119.419 150.715H256V94.197H114.281zM256 355.372l-.248.066-62.944-16.996-4.023-45.076h-56.736l7.919 88.741 115.772 32.14.26-.073z"/>
                  <path fill="#FFF" d="M255.805 208.59v56.517H325.4l-6.56 73.299-63.035 17.013v58.8l115.864-32.112.85-9.549 13.28-148.792 1.38-15.176 10.203-114.393H255.805v56.518h79.639L330.3 208.59z"/>
                </svg>
                <svg width="20" height="20" viewBox="0 0 512 512" style="margin-right: 0.5rem; vertical-align: middle;" aria-hidden="true">
                  <path fill="#264DE4" d="M71.357 460.819L30.272 0h451.456l-41.129 460.746L255.724 512z"/>
                  <path fill="#2965F1" d="M405.388 431.408l35.148-393.73H256v435.146z"/>
                  <path fill="#EBEBEB" d="M124.46 208.59l5.065 56.517H256V208.59zM119.419 150.715H256V94.197H114.281zM256 355.372l-.248.066-62.944-16.996-4.023-45.076h-56.736l7.919 88.741 115.772 32.14.26-.073z"/>
                  <path fill="#FFF" d="M255.805 208.59v56.517H325.4l-6.56 73.299-63.035 17.013v58.8l115.864-32.112.85-9.549 13.28-148.792 1.38-15.176 10.203-114.393H255.805v56.518h79.639L330.3 208.59z"/>
                </svg>
                HTML5 / CSS3
              </span>
              <div class="skill-level" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 95%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">
                <?php echo $__env->make('guest.partials.tech-icons', ['icon' => 'tailwind'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                Tailwind CSS
              </span>
              <div class="skill-level" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 80%"></div>
              </div>
            </div>
          </div>
        </div>
        
        
        <div class="skill-category">
          <div class="skill-category-header">
            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h11A1.5 1.5 0 0 1 15 2.5v11a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 13.5v-11z"/>
              <path fill="white" d="M2.5 2a.5.5 0 0 0-.5.5v11a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5v-11a.5.5 0 0 0-.5-.5h-11z"/>
            </svg>
            <h3>Backend</h3>
          </div>
          <div class="skill-list">
            <div class="skill-item">
              <span class="skill-name">
                <?php echo $__env->make('guest.partials.tech-icons', ['icon' => 'php'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                PHP
              </span>
              <div class="skill-level" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 90%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">
                <?php echo $__env->make('guest.partials.tech-icons', ['icon' => 'laravel'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                Laravel
              </span>
              <div class="skill-level" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 95%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">
                <svg width="20" height="20" viewBox="0 0 256 252" style="margin-right: 0.5rem; vertical-align: middle;" aria-hidden="true">
                  <path fill="#00546B" d="M235.64 150.64c-9.14 0-16.2 2.2-20.96 5.5-1.4.96-3.6.92-3.76 2.64.76 1.24 1 3.08 1.72 4.68 1.36 3.08 3.68 7.24 6.36 9.6 2.88 2.52 5.88 5.04 9.04 7.24 5.6 3.92 11.88 6.16 17.24 10.04 3.16 2.28 6.28 5.12 9.4 7.72 1.56 1.32 2.6 3.16 4.68 4 0-1.32 0-2.04.04-2.72 1.24-1.72 1.24-4.32 2.44-6.36 3.68-6.44 8.64-12.04 13.68-17.36 2.64-2.8 11.16-6.64 12.64-10.4-.72-.8-1-1.88-1.72-2.64-2.68-2.72-5.88-4.68-8.92-6.88-6.64-4.8-13.96-7.88-20.56-12.64-2.8-2-8.04-3.2-10.04-6.04-4.6-6.52-6.88-14.44-10.44-21.72-3.32-6.8-6.28-14.24-9.88-20.92-2.52-4.64-5.4-9.28-8.36-13.52-14.8-21.32-30.76-34.2-55.44-46.88-5.28-2.68-11.48-3.76-17.84-5.28-3.52-.16-7.04-.32-10.52-.48-2.2-.92-4.48-3.52-6.4-4.72C58.48 2.48 27.24-8.68 5.4 9.44c-13.88 11.56-20.68 28.88-25.64 48.44C-27.08 84.8-28 112.4-20.64 140.04c2.2 8.24 8.08 25.6 15.76 29.52 6.72 3.44 13.08.28 17.84 2.64 2.72 1.32 5.36 3.64 7.68 5.48 9.32 7.44 17.44 17.2 24.04 26.36 3.4 4.72 5.92 10.64 9.8 14.72 4.08 4.32 8.6 6.12 11.16 11.92 0 .04-.08.04-.08.08-1.68.56-1.88 2.6-2.88 4.16-7.36 11.44-8.36 25.72-11.16 40.92-1.28 5.48-3.68 14.24-1.72 20.28 1.56.4 2.12-.64 2.88-1.32 4.36-3.92 6-9.88 8.4-15.76 1.68-4.12 1-6.92 2.64-9.84 0-.04.04-.08.08-.08v.08c1.64 3.28 3.28 6.56 4.88 9.84 3.68 6.56 10.16 13.44 15.76 18.04 2.88 2.4 5.16 6.56 9.04 7.72v-.08h-.08c-.76-1.24-1.92-1.76-2.88-2.64-2.24-2.24-4.76-5-6.6-7.52-5.32-7-10.04-14.64-14.4-22.28-2.12-3.72-3.96-7.8-5.76-11.52-.76-1.6-.76-4-2.24-4.88-2.08 3.2-5.12 5.88-6.8 9.56-2.68 5.92-3.04 13.12-4.08 20.76-.6.16-.32 0-.64.08-4.48-1.08-6.08-5.6-7.72-9.52-4.08-9.84-4.84-25.68-1.24-37 .92-2.88 5.08-12.08 3.44-14.76-.84-2.52-3.6-4-5.16-6-1.88-2.44-3.8-5.56-5.12-8.36-3.32-7.24-4.92-15.24-8.36-22.44-3.2-6.72-6.72-13.52-10.36-19.96-1.96-3.44-5.24-7.08-6.6-10.92-.48-1.36.08-2.4.28-3.24 1.04-2.04 4.4-2.96 6.36-3.96 4.68-2.28 8.72-3.64 12.92-6.04 8.32-4.68 16.48-11.16 23.12-18.44 2.08-2.28 5.84-5.32 6.64-8.36-2-2-2.16-5.16-3.44-7.72-2.88-5.68-6.44-11.92-9.84-17.64-3.52-5.96-7.44-11.88-11.88-17-2.24-2.56-6.36-4.32-7.72-7.72-2.04-5.12-2.2-11.56-3.44-17.84-2.68-13.6-2.92-28.68 1.32-40.4 1.04-2.92 5.56-12.16 10.68-8.96 4.48 2.8 3.48 11.4 4.76 16.96.6 2.48.24 4.32 1.28 6 0-.04.08-.04.08-.08 2.48-4.92 5-9.8 7.44-14.72 3.6-5.64 14.8-12.92 22.36-8.72 2.36 3.64.28 8.92-.88 13.52-1.2 4.76-3.08 9.04-4.68 13.52-1.08 3-4.4 6.28-4.4 9.84 1.6 1.36 2.24 3.68 3.64 5.32 4.44 5.08 10.8 10.48 17 13.92 3.24 1.8 11.48 5.68 12.04 9.84-3.6 3.68-4.44 9.4-6.8 14.4-10.48 22.36-19.88 46.92-27 71.36-1.68 5.64-2.28 11.16-4.08 16.96-1.92 6.2-5.32 12.44-7.72 18.04-5.6 13-12.4 22.6-18.04 34.84-1.72 3.68-4.92 9.84-3.44 13.92.64 1.72 1.92 2.4 3.44 3.2 2.48 1.32 6.6-.52 8.92-1.32 6.36-2.24 11.64-4.48 16.96-7.72 2.6-1.6 5.16-4.92 8.36-5.72h3.64c5.68 1.28 12.08.4 17.4 1.72 9.4 2.36 17.8 6.04 25.64 10.04 23.88 12.2 43.48 29.56 56.88 51.32 2.08 3.4 2.88 6.64 4.92 10.04 4.08 6.76 8.96 13.68 13.08 20.28 4.16 6.68 8.32 13.4 13.52 18.76 2.8 2.88 13.76 4.44 18.84 5.96 3.56 1.08 9.36 2 12.92 3.44 6.76 2.72 13.36 6 19.88 9.04 3.24 1.52 13.28 4.84 13.92 8.72z"/>
                  <path fill="#00546B" d="M58.88 38.6c-2.4-.04-4.08.24-5.72.52v.08h.08c1.12 2.28 3.08 3.84 4.52 5.88 1.12 2.2 2.24 4.44 3.36 6.68l.08-.08c2.08-1.48 3.04-3.8 3.04-7.16-.84-1-.92-2.04-1.72-3.04-1.08-1.4-3-2.16-3.64-3.88z"/>
                  <path fill="#E48E00" d="M235.64 150.64c-9.14 0-16.2 2.2-20.96 5.5-1.4.96-3.6.92-3.76 2.64.76 1.24 1 3.08 1.72 4.68 1.36 3.08 3.68 7.24 6.36 9.6 2.88 2.52 5.88 5.04 9.04 7.24 5.6 3.92 11.88 6.16 17.24 10.04 3.16 2.28 6.28 5.12 9.4 7.72 1.56 1.32 2.6 3.16 4.68 4 0-1.32 0-2.04.04-2.72 1.24-1.72 1.24-4.32 2.44-6.36 3.68-6.44 8.64-12.04 13.68-17.36 2.64-2.8 11.16-6.64 12.64-10.4-.72-.8-1-1.88-1.72-2.64-2.68-2.72-5.88-4.68-8.92-6.88-6.64-4.8-13.96-7.88-20.56-12.64-2.8-2-8.04-3.2-10.04-6.04-4.6-6.52-6.88-14.44-10.44-21.72-3.32-6.8-6.28-14.24-9.88-20.92-2.52-4.64-5.4-9.28-8.36-13.52-14.8-21.32-30.76-34.2-55.44-46.88-5.28-2.68-11.48-3.76-17.84-5.28-3.52-.16-7.04-.32-10.52-.48-2.2-.92-4.48-3.52-6.4-4.72C58.48 2.48 27.24-8.68 5.4 9.44c-13.88 11.56-20.68 28.88-25.64 48.44C-27.08 84.8-28 112.4-20.64 140.04c2.2 8.24 8.08 25.6 15.76 29.52 6.72 3.44 13.08.28 17.84 2.64 2.72 1.32 5.36 3.64 7.68 5.48 9.32 7.44 17.44 17.2 24.04 26.36 3.4 4.72 5.92 10.64 9.8 14.72 4.08 4.32 8.6 6.12 11.16 11.92 0 .04-.08.04-.08.08-1.68.56-1.88 2.6-2.88 4.16-7.36 11.44-8.36 25.72-11.16 40.92-1.28 5.48-3.68 14.24-1.72 20.28 1.56.4 2.12-.64 2.88-1.32 4.36-3.92 6-9.88 8.4-15.76 1.68-4.12 1-6.92 2.64-9.84 0-.04.04-.08.08-.08v.08c1.64 3.28 3.28 6.56 4.88 9.84 3.68 6.56 10.16 13.44 15.76 18.04 2.88 2.4 5.16 6.56 9.04 7.72v-.08h-.08c-.76-1.24-1.92-1.76-2.88-2.64-2.24-2.24-4.76-5-6.6-7.52-5.32-7-10.04-14.64-14.4-22.28-2.12-3.72-3.96-7.8-5.76-11.52-.76-1.6-.76-4-2.24-4.88-2.08 3.2-5.12 5.88-6.8 9.56-2.68 5.92-3.04 13.12-4.08 20.76-.6.16-.32 0-.64.08-4.48-1.08-6.08-5.6-7.72-9.52-4.08-9.84-4.84-25.68-1.24-37 .92-2.88 5.08-12.08 3.44-14.76-.84-2.52-3.6-4-5.16-6-1.88-2.44-3.8-5.56-5.12-8.36-3.32-7.24-4.92-15.24-8.36-22.44-3.2-6.72-6.72-13.52-10.36-19.96-1.96-3.44-5.24-7.08-6.6-10.92-.48-1.36.08-2.4.28-3.24 1.04-2.04 4.4-2.96 6.36-3.96 4.68-2.28 8.72-3.64 12.92-6.04 8.32-4.68 16.48-11.16 23.12-18.44 2.08-2.28 5.84-5.32 6.64-8.36-2-2-2.16-5.16-3.44-7.72-2.88-5.68-6.44-11.92-9.84-17.64-3.52-5.96-7.44-11.88-11.88-17-2.24-2.56-6.36-4.32-7.72-7.72-2.04-5.12-2.2-11.56-3.44-17.84-2.68-13.6-2.92-28.68 1.32-40.4 1.04-2.92 5.56-12.16 10.68-8.96 4.48 2.8 3.48 11.4 4.76 16.96.6 2.48.24 4.32 1.28 6 0-.04.08-.04.08-.08 2.48-4.92 5-9.8 7.44-14.72 3.6-5.64 14.8-12.92 22.36-8.72 2.36 3.64.28 8.92-.88 13.52-1.2 4.76-3.08 9.04-4.68 13.52-1.08 3-4.4 6.28-4.4 9.84 1.6 1.36 2.24 3.68 3.64 5.32 4.44 5.08 10.8 10.48 17 13.92 3.24 1.8 11.48 5.68 12.04 9.84-3.6 3.68-4.44 9.4-6.8 14.4-10.48 22.36-19.88 46.92-27 71.36-1.68 5.64-2.28 11.16-4.08 16.96-1.92 6.2-5.32 12.44-7.72 18.04-5.6 13-12.4 22.6-18.04 34.84-1.72 3.68-4.92 9.84-3.44 13.92.64 1.72 1.92 2.4 3.44 3.2 2.48 1.32 6.6-.52 8.92-1.32 6.36-2.24 11.64-4.48 16.96-7.72 2.6-1.6 5.16-4.92 8.36-5.72h3.64c5.68 1.28 12.08.4 17.4 1.72 9.4 2.36 17.8 6.04 25.64 10.04 23.88 12.2 43.48 29.56 56.88 51.32 2.08 3.4 2.88 6.64 4.92 10.04 4.08 6.76 8.96 13.68 13.08 20.28 4.16 6.68 8.32 13.4 13.52 18.76 2.8 2.88 13.76 4.44 18.84 5.96 3.56 1.08 9.36 2 12.92 3.44 6.76 2.72 13.36 6 19.88 9.04 3.24 1.52 13.28 4.84 13.92 8.72z"/>
                  <path fill="#E48E00" d="M58.88 38.6c-2.4-.04-4.08.24-5.72.52v.08h.08c1.12 2.28 3.08 3.84 4.52 5.88 1.12 2.2 2.24 4.44 3.36 6.68l.08-.08c2.08-1.48 3.04-3.8 3.04-7.16-.84-1-.92-2.04-1.72-3.04-1.08-1.4-3-2.16-3.64-3.88z"/>
                </svg>
                MySQL
              </span>
              <div class="skill-level" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 85%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" style="margin-right: 0.5rem; vertical-align: middle;" aria-hidden="true">
                  <path d="M12 2L2 7v10l10 5 10-5V7L12 2z" fill="#61DAFB" opacity="0.3"/>
                  <path d="M12 22l-10-5v-7l10 5v7zm0 0l10-5v-7l-10 5v7zm0-12L2 5l10-3 10 3-10 5z" stroke="#61DAFB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <circle cx="12" cy="12" r="2" fill="#61DAFB"/>
                </svg>
                REST API
              </span>
              <div class="skill-level" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 90%"></div>
              </div>
            </div>
          </div>
        </div>
        
        
        <div class="skill-category">
          <div class="skill-category-header">
            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0z"/>
            </svg>
            <h3>Tools & DevOps</h3>
          </div>
          <div class="skill-list">
            <div class="skill-item">
              <span class="skill-name">
                <svg width="20" height="20" viewBox="0 0 256 256" style="margin-right: 0.25rem; vertical-align: middle;" aria-hidden="true">
                  <path fill="#DE4C36" d="M251.172 116.594L139.4 4.828c-6.433-6.437-16.873-6.437-23.314 0l-23.21 23.21 29.443 29.443c6.842-2.312 14.688-.761 20.142 4.693 5.48 5.489 7.02 13.402 4.652 20.266l28.375 28.376c6.865-2.365 14.786-.835 20.269 4.657 7.663 7.66 7.663 20.075 0 27.74-7.665 7.666-20.08 7.666-27.749 0-5.764-5.77-7.188-14.235-4.27-21.336l-26.462-26.462-.003 69.637a19.82 19.82 0 0 1 5.188 3.71c7.663 7.66 7.663 20.076 0 27.747-7.665 7.662-20.086 7.662-27.74 0-7.663-7.671-7.663-20.086 0-27.746a19.654 19.654 0 0 1 6.421-4.281V94.196a19.378 19.378 0 0 1-6.421-4.281c-5.806-5.798-7.202-14.317-4.227-21.446L81.47 39.442l-76.64 76.635c-6.44 6.443-6.44 16.884 0 23.322l111.774 111.768c6.435 6.438 16.873 6.438 23.316 0l111.251-111.249c6.438-6.44 6.438-16.887 0-23.324"/>
                </svg>
                <svg width="20" height="20" viewBox="0 0 256 250" style="margin-right: 0.5rem; vertical-align: middle;" aria-hidden="true">
                  <path fill="#24292F" d="M128.001 0C57.317 0 0 57.307 0 128.001c0 56.554 36.676 104.535 87.535 121.46 6.397 1.185 8.746-2.777 8.746-6.158 0-3.052-.12-13.135-.174-23.83-35.61 7.742-43.124-15.103-43.124-15.103-5.823-14.795-14.213-18.73-14.213-18.73-11.613-7.944.876-7.78.876-7.78 12.853.902 19.621 13.19 19.621 13.19 11.417 19.568 29.945 13.911 37.249 10.64 1.149-8.272 4.466-13.92 8.127-17.116-28.431-3.236-58.318-14.212-58.318-63.258 0-13.975 5-25.394 13.188-34.358-1.329-3.224-5.71-16.242 1.24-33.874 0 0 10.749-3.44 35.21 13.121 10.21-2.836 21.16-4.258 32.038-4.307 10.878.049 21.837 1.47 32.066 4.307 24.431-16.56 35.165-13.12 35.165-13.12 6.967 17.63 2.584 30.65 1.255 33.873 8.207 8.964 13.173 20.383 13.173 34.358 0 49.163-29.944 59.988-58.447 63.157 4.591 3.972 8.682 11.762 8.682 23.704 0 17.126-.148 30.91-.148 35.126 0 3.407 2.304 7.398 8.792 6.14C219.37 232.5 256 184.537 256 128.002 256 57.307 198.691 0 128.001 0Zm-80.06 182.34c-.282.636-1.283.827-2.194.39-.929-.417-1.45-1.284-1.15-1.922.276-.655 1.279-.838 2.205-.399.93.418 1.46 1.293 1.139 1.931Zm6.296 5.618c-.61.566-1.804.303-2.614-.591-.837-.892-.994-2.086-.375-2.66.63-.566 1.787-.301 2.626.591.838.903 1 2.088.363 2.66Zm4.32 7.188c-.785.545-2.067.034-2.86-1.104-.784-1.138-.784-2.503.017-3.05.795-.547 2.058-.055 2.861 1.075.782 1.157.782 2.522-.019 3.08Zm7.304 8.325c-.701.774-2.196.566-3.29-.49-1.119-1.032-1.43-2.496-.726-3.27.71-.776 2.213-.558 3.315.49 1.11 1.03 1.45 2.505.701 3.27Zm9.442 2.81c-.31 1.003-1.75 1.459-3.199 1.033-1.448-.439-2.395-1.613-2.103-2.626.301-1.01 1.747-1.484 3.207-1.028 1.446.436 2.396 1.602 2.095 2.622Zm10.744 1.193c.036 1.055-1.193 1.93-2.715 1.95-1.53.034-2.769-.82-2.786-1.86 0-1.065 1.202-1.932 2.733-1.958 1.522-.03 2.768.818 2.768 1.868Zm10.555-.405c.182 1.03-.875 2.088-2.387 2.37-1.485.271-2.861-.365-3.05-1.386-.184-1.056.893-2.114 2.376-2.387 1.514-.263 2.868.356 3.061 1.403Z"/>
                </svg>
                Git & GitHub
              </span>
              <div class="skill-level" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 90%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">
                <svg width="20" height="20" viewBox="0 0 256 256" style="margin-right: 0.5rem; vertical-align: middle;" aria-hidden="true">
                  <defs>
                    <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="vscode-gradient">
                      <stop stop-color="#0065A9" offset="0%"/>
                      <stop stop-color="#007ACC" offset="100%"/>
                    </linearGradient>
                  </defs>
                  <path fill="url(#vscode-gradient)" d="M181.534 254.252a15.934 15.934 0 0 0 12.7-.488l52.706-25.361a16.002 16.002 0 0 0 9.06-14.428V42.025c0-6.198-3.582-11.84-9.06-14.428L194.234 2.236a15.939 15.939 0 0 0-18.185 3.097l-100.9 92.052-43.95-33.361a10.655 10.655 0 0 0-13.614.605L3.49 77.453c-4.648 4.227-4.653 11.54-.011 15.774L41.593 128 3.478 162.773c-4.642 4.235-4.637 11.547.011 15.775l14.097 12.823a10.655 10.655 0 0 0 13.613.606l43.95-33.362 100.9 92.053a15.915 15.915 0 0 0 5.485 3.584Zm10.505-184.367L115.479 128l76.56 58.115V69.885Z"/>
                </svg>
                VS Code
              </span>
              <div class="skill-level" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 95%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">
                <svg width="20" height="20" viewBox="0 0 256 256" style="margin-right: 0.5rem; vertical-align: middle;" aria-hidden="true">
                  <path fill="#C12127" d="M0 256V0h256v256z"/>
                  <path fill="#FFF" d="M48 48h160v160h-32V80h-48v128H48z"/>
                </svg>
                Composer / npm
              </span>
              <div class="skill-level" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 85%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">
                <svg width="20" height="20" viewBox="0 0 256 256" style="margin-right: 0.5rem; vertical-align: middle;" aria-hidden="true">
                  <path fill="#FF6C37" d="M254.953 144.253c8.959-30.267-2.364-64.047-28.964-85.621-21.003-17.023-47.808-23.652-72.922-18.014a77.827 77.827 0 0 0-9.857 2.832c-1.265.453-2.506.955-3.746 1.473l.005.028c-2.025.85-4.011 1.785-5.958 2.832-4.072 2.195-7.922 4.819-11.48 7.834a78.916 78.916 0 0 0-23.116 37.845c-1.088 3.599-1.942 7.273-2.569 11.002-3.025 17.969.235 37.156 9.867 52.713 14.369 23.209 38.925 37.686 64.994 41.695a98.724 98.724 0 0 0 14.554.857c24.132-.057 48.515-9.654 65.555-27.656 12.289-12.974 19.425-28.73 21.637-44.82zm-47.885-42.095l-28.026 15.661-16.132 9.016-36.846 20.589a4.072 4.072 0 0 1-5.786-3.591 4.072 4.072 0 0 1 2.024-3.527l36.846-20.589 16.132-9.016 28.026-15.661a4.072 4.072 0 0 1 5.786 3.591 4.072 4.072 0 0 1-2.024 3.527z"/>
                  <path fill="#FF6C37" d="M98.44 98.498c-3.906-5.582-9.202-10.228-15.485-13.433-14.565-7.432-32.043-6.482-45.764 2.493-13.722 8.974-21.789 24.596-21.093 40.837.108 2.528.396 5.044.856 7.531 2.736 14.788 11.458 28.166 24.116 36.944 10.736 7.445 23.56 11.071 36.304 10.326 2.535-.148 5.059-.482 7.555-.996 14.788-3.048 27.976-12.132 36.424-25.116 7.164-11.011 10.186-24.136 8.595-36.96-.317-2.553-.827-5.08-1.524-7.557-4.137-14.7-14.451-27.214-28.984-33.969a51.638 51.638 0 0 0-7.562-2.832c-14.036-4.137-29.348-1.088-41.023 8.164a43.494 43.494 0 0 0-6.116 5.752c-9.202 10.444-13.722 24.596-12.483 38.339.247 2.74.75 5.456 1.506 8.114 4.489 15.78 17.509 27.978 33.945 31.826 3.297.772 6.68 1.157 10.074 1.147 13.338-.057 26.226-5.619 35.583-15.365 7.932-8.265 12.483-19.056 12.906-30.32.084-2.24-.023-4.48-.321-6.703-1.768-13.209-9.489-25.059-21.338-32.717a38.084 38.084 0 0 0-5.67-2.832c-11.011-4.489-23.56-2.94-33.289 4.115-8.247 5.976-13.532 15.365-14.233 25.272-.14 1.973.023 3.956.482 5.884 2.726 11.458 12.906 19.902 24.596 20.402 9.322.398 18.278-4.797 22.666-13.16 3.715-7.085 3.412-15.685-.807-22.489z"/>
                </svg>
                Postman / API Testing
              </span>
              <div class="skill-level" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 80%"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <section id="projects" class="projects-section" role="region" aria-labelledby="projects-heading">
      <div class="section-header">
        <span class="section-tag">Il Mio Lavoro</span>
        <h2 id="projects-heading" class="section-title">Progetti in Evidenza</h2>
      </div>

      
      <?php if(isset($allTypes)): ?>
        <div class="filters-section">
          <div class="filter-group" style="justify-content: center;">
            <a href="<?php echo e(route('home')); ?>" 
               class="filter-chip <?php echo e(!isset($currentType) ? 'active' : ''); ?>">
              Tutti
              <?php if(isset($typeCounts)): ?>
                <span class="count"><?php echo e($typeCounts->sum()); ?></span>
              <?php endif; ?>
            </a>
            <?php $__currentLoopData = $allTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $count = $typeCounts[$t->id] ?? 0;
              ?>
              <?php if($count > 0): ?>
                <a href="<?php echo e(route('home', ['type' => $t->slug])); ?>"
                   class="filter-chip <?php echo e((isset($currentType) && $currentType->id === $t->id) ? 'active' : ''); ?>">
                  <?php echo e($t->name); ?>

                  <span class="count"><?php echo e($count); ?></span>
                </a>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      <?php endif; ?>

      
      <div class="stats-bar">
        <span class="stat-item">
          <strong><?php echo e($projects->total()); ?></strong> progetti
        </span>
        <?php if(isset($currentType) || (isset($isFeatured) && $isFeatured)): ?>
          <span>•</span>
          <a href="<?php echo e(route('home')); ?>" style="color: var(--color-accent); text-decoration: none;">
            Tutti i progetti
          </a>
        <?php endif; ?>
        <?php if(!isset($isFeatured) || !$isFeatured): ?>
          <?php
            $featuredCount = \App\Models\Project::published()->featured()->count();
          ?>
          <?php if($featuredCount > 0): ?>
            <span>•</span>
            <a href="<?php echo e(route('projects.featured')); ?>" style="color: var(--color-accent); text-decoration: none;">
              ⭐ In Evidenza (<?php echo e($featuredCount); ?>)
            </a>
          <?php endif; ?>
        <?php endif; ?>
      </div>

      
      <div class="projects-grid">
        <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <article class="project-card">
            
            
            <?php if($project->image_url): ?>
              <div class="project-card-image">
                <img 
                  src="<?php echo e($project->image_url); ?>" 
                  alt="<?php echo e($project->title); ?>"
                  loading="lazy"
                  width="800"
                  height="450"
                  class="project-image"
                >
              </div>
            <?php else: ?>
              <?php
                $gradients = [
                  '#667eea 0%, #764ba2 100%',
                  '#f093fb 0%, #f5576c 100%',
                  '#4facfe 0%, #00f2fe 100%',
                  '#43e97b 0%, #38f9d7 100%'
                ];
                $randomGradient = $gradients[array_rand($gradients)];
              ?>
              <div class="project-card-image" style="background: linear-gradient(135deg, <?php echo e($randomGradient); ?>);">
                <div style="display: flex; align-items: center; justify-content: center; height: 100%; font-size: 3rem; color: white; opacity: 0.3;">
                  <?php echo e(strtoupper(substr($project->title, 0, 1))); ?>

                </div>
              </div>
            <?php endif; ?>
            
            <div class="project-card-body">
              
              
              <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1rem;">
                <?php if($project->type): ?>
                  <?php
                    $typeName = strtolower($project->type->name);
                    $badgeClass = 'frontend';
                    if ($typeName === 'automazioni') $badgeClass = 'automazioni';
                    elseif ($typeName === 'backend') $badgeClass = 'backend';
                  ?>
                  <span class="badge-type badge-type-<?php echo e($badgeClass); ?>">
                    <?php echo e($project->type->name); ?>

                  </span>
                <?php endif; ?>
                
                <?php if($project->technologies && $project->technologies->count()): ?>
                  <?php $__currentLoopData = $project->technologies->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="badge-tech"><?php echo e($tech->name); ?></span>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php if($project->technologies->count() > 3): ?>
                    <span class="badge-tech" style="opacity: 0.7;">+<?php echo e($project->technologies->count() - 3); ?></span>
                  <?php endif; ?>
                <?php endif; ?>
              </div>
              
              
              <h2 class="project-card-title"><?php echo e($project->title); ?></h2>
              
              
              <?php if($project->description): ?>
                <p class="project-card-description"><?php echo e($project->description); ?></p>
              <?php endif; ?>
              
              
              <?php if(!is_null($project->stargazers_count) || !is_null($project->forks_count)): ?>
                <div style="display: flex; gap: 1rem; margin-bottom: 1rem; color: var(--color-text-muted); font-size: 0.9rem;">
                  <?php if(!is_null($project->stargazers_count)): ?>
                    <span style="display: flex; align-items: center; gap: 0.35rem;">
                      ⭐ <?php echo e($project->stargazers_count); ?>

                    </span>
                  <?php endif; ?>
                  <?php if(!is_null($project->forks_count)): ?>
                    <span style="display: flex; align-items: center; gap: 0.35rem;">
                      🔀 <?php echo e($project->forks_count); ?>

                    </span>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              
              
              <div style="margin-top: auto;">
                <a href="<?php echo e(route('projects.show', $project->slug)); ?>" class="btn-primary-minimal" style="width: 100%; justify-content: center;">
                  Vedi progetto
                  <span style="font-size: 1.2rem;">→</span>
                </a>
              </div>
              
            </div>
            
          </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <div class="empty-state" style="grid-column: 1 / -1;">
            <div class="empty-state-icon">📭</div>
            <h3 style="margin-bottom: 0.5rem;">Nessun progetto trovato</h3>
            <p class="text-muted">Prova a cambiare i filtri di ricerca</p>
            <?php if(isset($currentType)): ?>
              <a href="<?php echo e(route('home')); ?>" class="btn-minimal" style="margin-top: 1rem;">
                Mostra tutti i progetti
              </a>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>

      
      <?php if($projects->hasPages()): ?>
        <div style="display: flex; justify-content: center;">
          <?php echo e($projects->links()); ?>

        </div>
      <?php endif; ?>
    </section>

    
    <?php echo $__env->make('guest.partials.contact-modern', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>




</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('guest.layouts.guest-minimal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/index-minimal.blade.php ENDPATH**/ ?>