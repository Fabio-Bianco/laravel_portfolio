{{-- 
  PROJECTS COMPONENT - COMPONENTE PRINCIPALE PROGETTI
  
  Modalità:
  - homepage: Carosello Netflix con progetti featured (max 4)
  - portfolio: Griglia completa con filtri e paginazione
  
  Dati richiesti:
  - $projects (Collection featured o paginata)
  - $mode ('homepage' | 'portfolio')
  - $allTypes, $currentType, $typeCounts (solo portfolio mode)
  
  Pattern: Component Intelligente con conditional rendering
--}}
<section class="projects-section" id="projects">
  @if(isset($mode) && $mode === 'homepage')
    {{-- HOMEPAGE MODE: Carosello Featured --}}
    <div class="section-header">
      <span class="section-tag">I Miei Lavori</span>
      <h2 class="section-title">Progetti in Evidenza</h2>
      
    </div>
    
    {{-- Carosello Netflix-style --}}
    @if($projects && $projects->count())
      {{-- Carosello Netflix --}}
      @include('guest.components.projects-carousel')
      
      {{-- Link "Vedi tutti" --}}
      <div class="text-center mt-4">
        <a href="{{ route('portfolio') }}" class="btn-primary" style="background: #e50914; border: none; padding: 12px 24px; border-radius: 4px; color: white; text-decoration: none; font-weight: 500;">Vedi tutti i progetti →</a>
      </div>
    @else
      <div class="empty-state text-center">
        <div class="empty-icon">💼</div>
        <p><strong>Debug:</strong> Nessun progetto featured trovato</p>
        <p>Controlla che ci siano progetti con <code>is_published=1</code> e <code>is_featured=1</code></p>
        <a href="{{ route('portfolio') }}" class="btn-secondary mt-2">Vedi tutti i progetti →</a>
      </div>
    @endif
  
  @else
    {{-- PORTFOLIO MODE: Griglia Completa --}}
    <div class="section-header">
      <span class="section-tag">Portfolio Completo</span>
      <h2 class="section-title">Tutti i Progetti</h2>
      <p class="section-subtitle">Esplora la collezione completa</p>
    </div>
    
    {{-- Filtri per tipologia --}}
    @if(isset($allTypes))
      @include('guest.components.partials.projects-filters')
    @endif
    
    {{-- Griglia progetti --}}
    <div class="projects-container">
      <div class="projects-grid">
        @forelse($projects as $project)
          @include('guest.components.project-card', ['project' => $project, 'style' => 'grid'])
        @empty
          <div class="empty-projects-state">
            <div class="empty-icon">💼</div>
            <p>Nessun progetto da mostrare</p>
            <small class="text-muted">Prova a cambiare i filtri di ricerca</small>
          </div>
        @endforelse
      </div>
      
      {{-- Paginazione --}}
      @if($projects && method_exists($projects, 'hasPages') && $projects->hasPages())
        <div class="projects-pagination">
          {{ $projects->links() }}
        </div>
      @endif
    </div>
  @endif
</section>