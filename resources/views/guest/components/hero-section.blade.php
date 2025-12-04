<section class="hero-section" id="hero" role="banner" aria-label="Hero section">
  <div class="hero-container">
    {{-- Left Side: Content (Bio) --}}
    @include('guest.components.partials.hero-bio')
    
    {{-- Right Side: Code Visual --}}
    @include('guest.components.partials.hero-code')
  </div>
  
  {{-- Background Elements --}}
  <div class="hero-gradient-bg" aria-hidden="true"></div>
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