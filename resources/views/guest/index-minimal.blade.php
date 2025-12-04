@extends('guest.layouts.guest-minimal')

@section('title', 'Portfolio')

@section('content')
<div class="guest-container">
  
  {{-- Hero Section Component --}}
  @include('guest.components.hero-section')
  {{-- ============================================================================================
         SKILLS SECTION - Competenze e Tecnologie inserire qui i linhuaggi con include e  un partial a parte  con un foglio a parte 
      =========================================================================================== --}}
    <section class="skills-section" id="skills" role="region" aria-labelledby="skills-heading">
      <div class="section-header">
        <span class="section-tag">Le Mie Competenze</span>
        <h2 id="skills-heading" class="section-title">Competenze & Tecnologie</h2>
      </div>
      
      <div class="skills-container">
        {{-- Modern Tab Navigation - Horizontal Centered --}}
        <div class="skills-tabs-wrapper">
          <div class="skills-tabs">
            <button type="button" 
                    class="skills-tab active" 
                    role="tab" 
                    aria-selected="true" 
                    aria-controls="frontend-panel" 
                    id="frontend-tab" 
                    data-category="frontend">
              <div class="tab-icon">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
              </div>
              <div class="tab-content">
                <span class="tab-title">Frontend</span>
                <span class="tab-count">{{ count($technologiesByCategory['frontend'] ?? []) }}</span>
              </div>
            </button>
            
            <button type="button" 
                    class="skills-tab" 
                    role="tab" 
                    aria-selected="false" 
                    aria-controls="backend-panel" 
                    id="backend-tab" 
                    data-category="backend">
              <div class="tab-icon">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z"/>
                  <path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z"/>
                </svg>
              </div>
              <div class="tab-content">
                <span class="tab-title">Backend</span>
                <span class="tab-count">{{ count($technologiesByCategory['backend'] ?? []) }}</span>
              </div>
            </button>
            
            <button type="button" 
                    class="skills-tab" 
                    role="tab" 
                    aria-selected="false" 
                    aria-controls="devtools-panel" 
                    id="devtools-tab" 
                    data-category="dev-tools">
              <div class="tab-icon">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                </svg>
              </div>
              <div class="tab-content">
                <span class="tab-title">Dev Tools</span>
                <span class="tab-count">{{ count($technologiesByCategory['dev-tools'] ?? []) }}</span>
              </div>
            </button>
            
          
          </div>
        </div>
        
        {{-- Tab Panels --}}
        <div class="skills-panels">
          {{-- Frontend Panel --}}
          <div class="skills-panel active" 
               role="tabpanel" 
               id="frontend-panel" 
               aria-labelledby="frontend-tab">
            <div class="skills-grid">
              @foreach($technologiesByCategory['frontend'] ?? [] as $tech)
                <div class="skill-card">
                  @if($tech->logo)
                    <i class="{{ $tech->logo }} skill-icon" aria-hidden="true"></i>
                  @else
                    <div class="skill-icon skill-icon-fallback">{{ strtoupper(substr($tech->name, 0, 1)) }}</div>
                  @endif
                  <span class="skill-name">{{ $tech->name }}</span>
                </div>
              @endforeach
            </div>
          </div>
          
          {{-- Backend Panel --}}
          <div class="skills-panel" 
               role="tabpanel" 
               id="backend-panel" 
               aria-labelledby="backend-tab">
            <div class="skills-grid">
              @foreach($technologiesByCategory['backend'] ?? [] as $tech)
                <div class="skill-card">
                  @if($tech->logo)
                    <i class="{{ $tech->logo }} skill-icon" aria-hidden="true"></i>
                  @else
                    <div class="skill-icon skill-icon-fallback">{{ strtoupper(substr($tech->name, 0, 1)) }}</div>
                  @endif
                  <span class="skill-name">{{ $tech->name }}</span>
                </div>
              @endforeach
            </div>
          </div>
          
          {{-- Dev Tools Panel --}}
          <div class="skills-panel" 
               role="tabpanel" 
               id="devtools-panel" 
               aria-labelledby="devtools-tab">
            <div class="skills-grid">
              @foreach($technologiesByCategory['dev-tools'] ?? [] as $tech)
                <div class="skill-card">
                  @if($tech->logo)
                    <i class="{{ $tech->logo }} skill-icon" aria-hidden="true"></i>
                  @else
                    <div class="skill-icon skill-icon-fallback">{{ strtoupper(substr($tech->name, 0, 1)) }}</div>
                  @endif
                  <span class="skill-name">{{ $tech->name }}</span>
                </div>
              @endforeach
            </div>
          </div>
          
          @if(count($learningTechnologies) > 0)
          {{-- Learning Panel --}}
          <div class="skills-panel" 
               role="tabpanel" 
               id="learning-panel" 
               aria-labelledby="learning-tab">
            <div class="skills-grid">
              @foreach($learningTechnologies as $tech)
                <div class="skill-card learning-card">
                  @if($tech->logo)
                    <i class="{{ $tech->logo }} skill-icon" aria-hidden="true"></i>
                  @else
                    <div class="skill-icon skill-icon-fallback">{{ strtoupper(substr($tech->name, 0, 1)) }}</div>
                  @endif
                  <span class="skill-name">{{ $tech->name }}</span>
                  <span class="learning-badge">Nuovo</span>
                </div>
              @endforeach
            </div>
          </div>
          @endif
        </div>
      </div>
    </section>

    {{-- ============================================================================================
         LEARNING TECHNOLOGIES SECTION - Separate Modern Design  inserire qui i linhuaggi con include e  un partial a parte  con un foglio a parte 
        =========================================================================================== --}}
    <section class="skills-section learning-section" id="learning-technologies" role="region" aria-labelledby="learning-heading">
      <div class="section-header">
        <span class="section-tag">Crescita Continua</span>
        <h2 id="learning-heading" class="section-title">Tecnologie che Sto Imparando</h2>
      </div>
      
      <div class="skills-container">
        {{-- Modern Tab Navigation for Learning Categories --}}
        <div class="skills-tabs-wrapper">
          <div class="skills-tabs">
            @php
              // Se ci sono learning technologies, usa quelle. Altrimenti mostra struttura di esempio
              $learningByCategory = count($learningTechnologies) > 0 
                ? $learningTechnologies->groupBy('category')
                : collect([
                    'frontend' => collect([]),
                    'backend' => collect([]),
                    'dev-tools' => collect([])
                  ]);
              $isFirst = true;
            @endphp
            
            @foreach($learningByCategory as $category => $technologies)
              @php
                $categoryName = match($category) {
                  'frontend' => 'Frontend',
                  'backend' => 'Backend', 
                  'dev-tools' => 'Dev Tools',
                  'mobile' => 'Mobile',
                  'ai-ml' => 'AI/ML',
                  default => ucfirst(str_replace('-', ' ', $category))
                };
                
                $iconSvg = match($category) {
                  'frontend' => '<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>',
                  'backend' => '<path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z"/><path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z"/>',
                  'dev-tools' => '<path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>',
                  'mobile' => '<path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/><path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>',
                  'ai-ml' => '<path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>',
                  default => '<path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>'
                };
              @endphp
              
              <button type="button" 
                      class="skills-tab {{ $isFirst ? 'active' : '' }}" 
                      role="tab" 
                      aria-selected="{{ $isFirst ? 'true' : 'false' }}" 
                      aria-controls="learning-{{ $category }}-panel" 
                      id="learning-{{ $category }}-tab" 
                      data-category="learning-{{ $category }}">
                <div class="tab-icon">
                  <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    {!! $iconSvg !!}
                  </svg>
                </div>
                <div class="tab-content">
                  <span class="tab-title">{{ $categoryName }}</span>
                  <span class="tab-count">{{ $technologies->count() }}</span>
                </div>
              </button>
              
              @php $isFirst = false; @endphp
            @endforeach
          </div>
        </div>
        
        {{-- Tab Panels for Learning Categories --}}
        <div class="skills-panels">
          @php $isFirstPanel = true; @endphp
          @foreach($learningByCategory as $category => $technologies)
            <div class="skills-panel {{ $isFirstPanel ? 'active' : '' }}" 
                 role="tabpanel" 
                 id="learning-{{ $category }}-panel" 
                 aria-labelledby="learning-{{ $category }}-tab">
              <div class="skills-grid">
                @if($technologies->count() > 0)
                  @foreach($technologies as $tech)
                    <div class="skill-card learning-card">
                      @if($tech->logo)
                        <i class="{{ $tech->logo }} skill-icon" aria-hidden="true"></i>
                      @else
                        <div class="skill-icon skill-icon-fallback">{{ strtoupper(substr($tech->name, 0, 1)) }}</div>
                      @endif
                      <span class="skill-name">{{ $tech->name }}</span>
                      <span class="learning-badge">In Studio</span>
                    </div>
                  @endforeach
                @else
                  {{-- Placeholder quando non ci sono tecnologie --}}
                  <div class="empty-learning-state">
                    <div class="empty-icon">📚</div>
                    <p>Nessuna tecnologia in studio per questa categoria</p>
                    <small class="text-muted">Le tecnologie verranno popolate dinamicamente</small>
                  </div>
                @endif
              </div>
            </div>
            @php $isFirstPanel = false; @endphp
          @endforeach
        </div>
      </div>
    </section>

    {{-- ============================================
       PROJECTS SECTION - Simplified
      ============================================ --}}
    @include('guest.partials.projects-section') {{-- Sezione progetti --}} 

    {{-- Modern Contact Section --}}
    @include('guest.partials.contact-modern')




</div>
@endsection
