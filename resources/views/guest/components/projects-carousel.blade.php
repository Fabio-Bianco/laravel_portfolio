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
                    <img src="https://picsum.photos/800/400?random={{ $project->id }}" 
                         class="d-block w-100" 
                         alt="{{ $project->title }}"
                         style="height: 400px; object-fit: cover;">
                    
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $project->title }}</h5>
                        <p>{{ $project->description ?: 'Progetto interessante' }}</p>
                        @if($project->github_url)
                            <a href="{{ $project->github_url }}" 
                               target="_blank" 
                               class="btn btn-outline-light btn-sm">
                                <i class="bi bi-github"></i> Vedi su GitHub
                            </a>
                        @endif
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