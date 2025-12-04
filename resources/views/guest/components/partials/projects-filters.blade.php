{{-- Projects Filters Section --}}
<section class="projects-filters-section" id="project-filters" role="region" aria-labelledby="filters-heading">
  <div class="section-header">
    <h3 id="filters-heading" class="filter-title">Filtra per Categoria</h3>
  </div>
  
  <div class="filters-container">
    {{-- Type Filters --}}
    <div class="filter-tabs">
      <a href="{{ route('home') }}" 
         class="filter-tab {{ !$currentType ? 'active' : '' }}">
        <span class="filter-name">Tutti</span>
        <span class="filter-count">{{ $projects->total() }}</span>
      </a>
      
      @foreach($allTypes as $type)
        <a href="{{ route('home', ['type' => $type->slug]) }}" 
           class="filter-tab {{ $currentType && $currentType->id === $type->id ? 'active' : '' }}">
          <span class="filter-name">{{ $type->name }}</span>
          <span class="filter-count">{{ $typeCounts[$type->id] ?? 0 }}</span>
        </a>
      @endforeach
    </div>
  </div>
</section>