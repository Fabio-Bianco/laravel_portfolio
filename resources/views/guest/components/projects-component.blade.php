{{-- 
  PROJECTS COMPONENT - COMPONENTE PRINCIPALE PROGETTI
  
  Scopo: Gestire TUTTA la logica di visualizzazione progetti
  
  Responsabilità:
  - Header sezione con titolo
  - Loop progetti + griglia card
  - Paginazione Laravel
  - Include filters component
  
  Dati richiesti dal Controller:
  - $projects (Collection paginata)
  - $allTypes (Collection tipi) 
  - $currentType (Model attivo o null)
  - $typeCounts (Array contatori per tipo)
  
  Pattern: Component Autonomo che gestisce la logica principale
--}}
<section class="projects-section" id="projects">
  {{-- Header sezione --}}
  <div class="section-header">
    <span class="section-tag">I Miei Lavori</span>
    <h2 class="section-title">Progetti Portfolio</h2>
    <p class="section-subtitle">Selezione dei miei progetti più significativi</p>
  </div>
  
  {{-- Filtri per tipologia --}}
  @include('guest.components.partials.projects-filters')
  
  {{-- Griglia progetti --}}
  <div class="projects-container">
<p>Qui include project.card per iterare le card</p>
  </div>
</section>