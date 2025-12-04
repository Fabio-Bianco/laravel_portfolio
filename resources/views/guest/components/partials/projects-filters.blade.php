{{-- 
  PROJECTS FILTERS - SEZIONE FILTRI PROGETTI
  
  Scopo: Fornire navigation per filtrare progetti per tipologia
  
  Responsabilità:
  - Tab "Tutti" con link alla home senza filtri
  - Tab per ogni Type esistente con contatori progetti
  - Gestione stato attivo basato su $currentType
  - Generazione link con parametro ?type=slug
  
  Dati utilizzati:
  - $allTypes: Collection di tutti i tipi disponibili
  - $currentType: Tipo attualmente selezionato (null = tutti)
  - $typeCounts: Array associativo [type_id => count] per badge contatori
  - $projects->total(): Totale progetti per tab "Tutti"
  
  Logica routing:
  - route('home') senza parametri = tutti i progetti
  - route('home', ['type' => $type->slug]) = filtro specifico
  
  Pattern: Navigation tabs con stato dinamico
--}}
<section class="projects-filters-section" id="project-filters" role="region" aria-labelledby="filters-heading">
  <div class="section-header">
    <h3 id="filters-heading" class="filter-title">Filtra per Categoria</h3>
  </div>
  
  
    </div>
  </div>
</section>