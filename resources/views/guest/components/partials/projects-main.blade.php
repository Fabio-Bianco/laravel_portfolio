{{-- Projects Main Section --}}
<section class="projects-section" id="projects" role="region" aria-labelledby="projects-heading">
  <div class="section-header">
    <span class="section-tag">I Miei Lavori</span>
    <h2 id="projects-heading" class="section-title">Progetti Portfolio</h2>
    <p class="section-subtitle">Selezione dei miei progetti più significativi</p>
  </div>
  
  <div class="projects-container">
    {{-- Projects Grid --}}
    <div class="projects-grid">
      @forelse($projects as $project)
        <div class="project-placeholder">
          {{ $project->title ?? 'Project Name' }} (TODO: Card Component)
        </div>
      @empty
        <div class="empty-projects-state">
          <div class="empty-icon">💼</div>
          <p>Nessun progetto da mostrare</p>
        </div>
      @endforelse
    </div>
    
    {{-- Pagination --}}
    @if($projects->hasPages())
      <div class="projects-pagination">
        {{ $projects->links() }}
      </div>
    @endif
  </div>
</section>