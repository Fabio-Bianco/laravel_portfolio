{{-- Skills Acquired Section - Competenze & Tecnologie --}}
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
    
    {{-- Tab Panels - Cards dinamiche dal database --}}
    <div class="skills-panels">
      <div class="skills-panel active" role="tabpanel" id="frontend-panel">
        <div class="skills-grid">
          <div class="placeholder-skills">Frontend Skills (TODO)</div>
        </div>
      </div>
      
      <div class="skills-panel" role="tabpanel" id="backend-panel">
        <div class="skills-grid">
          <div class="placeholder-skills">Backend Skills (TODO)</div>
        </div>
      </div>
      
      <div class="skills-panel" role="tabpanel" id="devtools-panel">
        <div class="skills-grid">
          <div class="placeholder-skills">DevTools Skills (TODO)</div>
        </div>
      </div>
    </div>
  </div>
</section>