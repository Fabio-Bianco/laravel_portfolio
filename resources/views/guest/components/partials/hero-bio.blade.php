{{-- Left Side: Bio Content --}}
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