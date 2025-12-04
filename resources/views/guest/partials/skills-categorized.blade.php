{{-- Skills Section - Categorized by Frontend, Backend, Dev Tools --}}
<section class="skills-section" id="skills" role="region" aria-labelledby="skills-heading">
  <div class="skills-container">
    <div class="section-header">
      <span class="section-tag">Cosa Faccio</span>
      <h2 id="skills-heading" class="section-title">Competenze & Tecnologie</h2>
      <p class="section-subtitle">Un toolkit completo per creare applicazioni web moderne e scalabili</p>
    </div>

    <div class="skills-content">
      <div class="skills-grid">
        
        {{-- FRONTEND Category --}}
        @if($technologiesByCategory['frontend']->count())
          <div class="skill-category-section">
            <div class="skill-category-header">
              <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v9A1.5 1.5 0 0 1 14.5 12h-13A1.5 1.5 0 0 1 0 10.5v-9zM1.5 1a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                <path d="M2 2h12v8H2V2z"/>
              </svg>
              <h3>Frontend</h3>
            </div>
            <div class="tech-tags">
              @foreach($technologiesByCategory['frontend'] as $tech)
                <a href="{{ route('projects.by-technology-slug', $tech->slug) }}" class="tech-tag frontend-tag" title="Progetti con {{ $tech->name }}">
                  {{ $tech->name }}
                </a>
              @endforeach
            </div>
          </div>
        @endif

        {{-- BACKEND Category --}}
        @if($technologiesByCategory['backend']->count())
          <div class="skill-category-section">
            <div class="skill-category-header">
              <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M5.338 1.59a61.748 61.748 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.856C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2.005-1.415z"/>
              </svg>
              <h3>Backend</h3>
            </div>
            <div class="tech-tags">
              @foreach($technologiesByCategory['backend'] as $tech)
                <a href="{{ route('projects.by-technology-slug', $tech->slug) }}" class="tech-tag backend-tag" title="Progetti con {{ $tech->name }}">
                  {{ $tech->name }}
                </a>
              @endforeach
            </div>
          </div>
        @endif

        {{-- DEV TOOLS Category --}}
        @if($technologiesByCategory['dev-tools']->count())
          <div class="skill-category-section">
            <div class="skill-category-header">
              <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M6.854 1.146a.5.5 0 0 0-.708 0l-6 6a.5.5 0 0 0 0 .708l6 6a.5.5 0 0 0 .708-.708L1.707 7.5H13.5a.5.5 0 0 0 0-1H1.707l5.147-5.146a.5.5 0 0 0 0-.708z"/>
              </svg>
              <h3>Dev Tools</h3>
            </div>
            <div class="tech-tags">
              @foreach($technologiesByCategory['dev-tools'] as $tech)
                <a href="{{ route('projects.by-technology-slug', $tech->slug) }}" class="tech-tag devtools-tag" title="Progetti con {{ $tech->name }}">
                  {{ $tech->name }}
                </a>
              @endforeach
            </div>
          </div>
        @endif

      </div>
    </div>
  </div>
</section>
