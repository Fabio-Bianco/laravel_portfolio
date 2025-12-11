{{-- resources/views/partials/projects-carousel.blade.php --}}

{{-- 
  PROJECTS CAROUSEL - CAROSELLO PROGETTI TIPO NETFLIX

  Scopo:
  - Mostrare una selezione di progetti in evidenza in formato carousel full-width
  - Ogni slide ha:
    - Immagine di background (cover del progetto)
    - Badge con linguaggio/stack
    - Titolo, descrizione breve
    - Pulsanti: Live demo, GitHub, Dettagli

  Variabili attese:
  - $projects    : Collection dei progetti da mostrare nel carosello
  - $currentType : Type selezionato (solo per testo esplicativo opzionale)
--}}

@if($projects->isNotEmpty())
  <section class="projects-carousel-section mt-4">

    <div id="projectsCarousel" class="carousel slide" data-bs-ride="carousel">
      {{-- 🔸 Indicatori inferiori (lineette) --}}
      <div class="carousel-indicators">
        @foreach($projects as $project)
          <button type="button"
                  data-bs-target="#projectsCarousel"
                  data-bs-slide-to="{{ $loop->index }}"
                  @class(['active' => $loop->first])
                  @if($loop->first) aria-current="true" @endif
                  aria-label="Slide {{ $loop->iteration }}">
          </button>
        @endforeach
      </div>

      {{-- 🔸 Slides --}}
      <div class="carousel-inner">
        @foreach($projects as $project)
          <div class="carousel-item @if($loop->first) active @endif">

            {{-- Immagine mockup specifica per tipo di progetto --}}
            @php
                // Immagini mockup professionali da Unsplash
                $mockupImages = [
                    'backend' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=1200&h=600&fit=crop&crop=center', // Server code
                    'frontend' => 'https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?w=1200&h=600&fit=crop&crop=center', // Web design
                    'automazioni' => 'https://images.unsplash.com/photo-1518432031352-d6fc5c10da5a?w=1200&h=600&fit=crop&crop=center', // Automation
                    'default' => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=1200&h=600&fit=crop&crop=center' // Generic code
                ];
                $typeKey = $project->type ? strtolower($project->type->name) : 'default';
                $imageUrl = $mockupImages[$typeKey] ?? $mockupImages['default'];
            @endphp
            <img 
              src="{{ $imageUrl }}" 
              class="d-block w-100" 
              alt="Mockup progetto {{ $project->title }} ({{ $project->type->name ?? 'Full-stack' }})"
              loading="lazy"
              style="height: 500px; object-fit: cover;"
            >

            {{-- Overlay con contenuto testo / bottoni --}}
            <div class="carousel-caption">

              {{-- Badge stack/language in alto a destra --}}
              <div class="project-type-badge">
                <span class="badge">
                  {{-- Se hai relazione type: $project->type->name --}}
                  {{ $project->type->name ?? $project->stack_label ?? 'Full-stack' }}
                </span>
              </div>

              {{-- Contenuto principale in basso a sinistra --}}
              <div class="project-content">
                <h2 class="project-title">
                  {{ $project->title }}
                </h2>

                {{-- Descrizione breve: usa un accessor o un campo short_description --}}
                <p class="project-description">
                  {{ $project->short_description ?? Str::limit($project->description, 160) }}
                </p>

                {{-- Opzionale: se hai uno stack (es. [Laravel, React, MySQL]) --}}
                @if(!empty($project->tech_stack))
                  <p class="project-stack">
                    {{-- tech_stack potrebbe essere array o stringa --}}
                    @if(is_array($project->tech_stack))
                      {{ implode(' • ', $project->tech_stack) }}
                    @else
                      {{ $project->tech_stack }}
                    @endif
                  </p>
                @endif

                {{-- Pulsanti di azione --}}
                <div class="project-actions">

                  {{-- Live demo (se esiste) --}}
                  @if(!empty($project->demo_url))
                    <a href="{{ $project->demo_url }}" 
                       class="btn btn-primary"
                       target="_blank" 
                       rel="noopener noreferrer">
                      <i class="bi bi-box-arrow-up-right"></i>
                      <span>Live demo</span>
                    </a>
                  @endif

                  {{-- GitHub repo (se esiste) --}}
                  @if(!empty($project->github_url))
                    <a href="{{ $project->github_url }}" 
                       class="btn btn-outline"
                       target="_blank" 
                       rel="noopener noreferrer">
                      <i class="bi bi-github"></i>
                      <span>Codice su GitHub</span>
                    </a>
                  @endif

                  {{-- Pagina dettagli progetto (route tipo projects.show) --}}
                  <a href="{{ route('projects.show', $project) }}" 
                     class="btn btn-outline">
                    <i class="bi bi-info-circle"></i>
                    <span>Dettagli</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      {{-- 🔸 Controlli prev/next --}}
      <button class="carousel-control-prev" type="button" data-bs-target="#projectsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Precedente</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#projectsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Successivo</span>
      </button>
    </div>
  </section>
@endif
