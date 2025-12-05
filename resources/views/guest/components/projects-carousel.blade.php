{{-- Bootstrap 5 Carousel per progetti featured --}}
<div class="projects-carousel-section mb-5">
    <h2 class="text-center mb-4">I miei progetti</h2>
    
    <div id="projectsCarousel" class="carousel slide" data-bs-ride="carousel">
        {{-- Indicatori --}}
        <div class="carousel-indicators">
            @foreach($projects as $index => $project)
                <button type="button" 
                        data-bs-target="#projectsCarousel" 
                        data-bs-slide-to="{{ $index }}" 
                        class="{{ $index === 0 ? 'active' : '' }}" 
                        aria-current="{{ $index === 0 ? 'true' : 'false' }}" 
                        aria-label="Slide {{ $index + 1 }}">
                </button>
            @endforeach
        </div>
        
        {{-- Slide --}}
        <div class="carousel-inner">
            @foreach($projects as $index => $project)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <img src="https://picsum.photos/1200/600?random={{ $project->id }}" 
                         class="d-block w-100" 
                         alt="{{ $project->title }}"
                         style="height: 500px; object-fit: cover;">
                    
                    <div class="carousel-caption">
                        {{-- Header con tipo progetto --}}
                        <div class="project-header mb-3">
                            @if($project->type)
                                <span class="badge bg-primary project-type-badge">
                                    <i class="bi bi-folder"></i> {{ $project->type->name }}
                                </span>
                            @endif
                        </div>
                        
                        {{-- Titolo progetto --}}
                        <h3 class="project-title mb-3">{{ $project->title }}</h3>
                        
                        {{-- Descrizione --}}
                        <p class="project-description mb-3">
                            {{ Str::limit($project->description ?: 'Progetto sviluppato con passione e dedizione', 100) }}
                        </p>
                        
                        {{-- Stack tecnologie --}}
                        @if($project->technologies && $project->technologies->count() > 0)
                            <div class="tech-stack mb-4">
                                <div class="tech-label mb-2">
                                    <i class="bi bi-code-slash"></i> <strong>Stack:</strong>
                                </div>
                                <div class="tech-badges">
                                    @foreach($project->technologies->take(5) as $tech)
                                        <span class="badge bg-dark tech-badge">{{ $tech->name }}</span>
                                    @endforeach
                                    @if($project->technologies->count() > 5)
                                        <span class="badge bg-info tech-badge-more">+{{ $project->technologies->count() - 5 }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                        
                        {{-- Azioni progetto --}}
                        <div class="project-actions">
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" 
                                   target="_blank" 
                                   class="btn btn-outline-light btn-action me-2"
                                   rel="noopener noreferrer">
                                    <i class="bi bi-github"></i> Codice Sorgente
                                </a>
                            @endif
                            
                            <a href="{{ route('projects.show', $project->slug) }}" 
                               class="btn btn-primary btn-action">
                                <i class="bi bi-arrow-right-circle"></i> Esplora Progetto
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        {{-- Controlli --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#projectsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#projectsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>