<?php $__env->startSection('title', 'Portfolio'); ?>

<?php $__env->startSection('content'); ?>
<div class="guest-container">
  
  
    <section class="hero-section" id="hero" role="banner" aria-label="Hero section">
      <div class="hero-container">
        
        <div class="hero-content">
          
          <h1 class="hero-title">
            <span class="title-highlight"><?php echo e(config('app.owner_name', 'Fabio Bianco')); ?></span>
            <small style="display: block; font-size: 0.35em; font-weight: 400; opacity: 0.5; margin-top: 0.5rem; letter-spacing: 0.15em;">aka b_bot</small>
          </h1>
          
          
          <p class="hero-subtitle">
            Full Stack Developer Jr
          </p>
          
          
          <p class="hero-tagline">
            Creo applicazioni web moderne con codice pulito e design centrato sull'utente. 
            Specializzato in <strong>Laravel</strong>, <strong>React</strong> e <strong>JavaScript</strong>.
          </p>
          
          
          <div class="hero-cta" role="group" aria-label="Azioni principali">
            <a href="#projects" 
               class="btn-hero btn-hero-primary" 
               onclick="event.preventDefault(); document.getElementById('projects').scrollIntoView({behavior: 'smooth'});"
               aria-label="Esplora i miei progetti">
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
              </svg>
              <span>Vedi i Progetti</span>
            </a>
            <a href="#contact" 
               class="btn-hero btn-hero-secondary" 
               onclick="event.preventDefault(); document.getElementById('contact').scrollIntoView({behavior: 'smooth'});"
               aria-label="Contattami">
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
              </svg>
              <span>Contattami</span>
            </a>
          </div>
        </div>
        
        
        <div class="hero-visual">
          <div class="hero-code-display">
            <div class="code-window">
              <div class="code-header">
                <span class="code-dot" style="background: #ff5f56;"></span>
                <span class="code-dot" style="background: #ffbd2e;"></span>
                <span class="code-dot" style="background: #27c93f;"></span>
                <span class="code-title">portfolio.php</span>
              </div>
              <div class="code-content">
                <div class="code-line"><span class="code-keyword">class</span> <span class="code-class">Developer</span> <span class="code-bracket">{</span></div>
                <div class="code-line">  <span class="code-keyword">public function</span> <span class="code-function">build</span>() {</div>
                <div class="code-line">    <span class="code-keyword">return</span> [</div>
                <div class="code-line">      <span class="code-string">'passion'</span> => <span class="code-value">true</span>,</div>
                <div class="code-line">      <span class="code-string">'code'</span> => <span class="code-string">'clean'</span>,</div>
                <div class="code-line">      <span class="code-string">'coffee'</span> => <span class="code-value">Infinity</span></div>
                <div class="code-line">    ];</div>
                <div class="code-line">  }</div>
                <div class="code-line"><span class="code-bracket">}</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      <div class="hero-gradient-bg" aria-hidden="true"></div>
      
      
      <div class="glass-orb glass-orb-1" aria-hidden="true"></div>
      <div class="glass-orb glass-orb-2" aria-hidden="true"></div>
      
      
      <div class="scroll-indicator" 
           role="button" 
           tabindex="0"
           onclick="document.getElementById('projects').scrollIntoView({behavior: 'smooth'});"
           onkeypress="if(event.key === 'Enter') document.getElementById('projects').scrollIntoView({behavior: 'smooth'});"
           aria-label="Scorri alla sezione progetti"
           style="cursor: pointer;">
        <span class="scroll-text">Scorri giù</span>
        <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" class="scroll-arrow">
          <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
        </svg>
      </div>
    </section>



    
    <section class="skills-section" id="skills" role="region" aria-labelledby="skills-heading">
      <div class="section-header">
        <span class="section-tag">Le Mie Competenze</span>
        <h2 id="skills-heading" class="section-title">Competenze & Tecnologie</h2>
      </div>
      
      <div class="skills-container">
        
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
                <span class="tab-count"><?php echo e(count($technologiesByCategory['frontend'] ?? [])); ?></span>
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
                <span class="tab-count"><?php echo e(count($technologiesByCategory['backend'] ?? [])); ?></span>
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
                <span class="tab-count"><?php echo e(count($technologiesByCategory['dev-tools'] ?? [])); ?></span>
              </div>
            </button>
            
            <?php if(count($learningTechnologies) > 0): ?>
            <button type="button" 
                    class="skills-tab" 
                    role="tab" 
                    aria-selected="false" 
                    aria-controls="learning-panel" 
                    id="learning-tab" 
                    data-category="learning">
              <div class="tab-icon">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                </svg>
              </div>
              <div class="tab-content">
                <span class="tab-title">Sto Imparando</span>
                <span class="tab-count"><?php echo e(count($learningTechnologies)); ?></span>
              </div>
            </button>
            <?php endif; ?>
          </div>
        </div>
        
        
        <div class="skills-panels">
          
          <div class="skills-panel active" 
               role="tabpanel" 
               id="frontend-panel" 
               aria-labelledby="frontend-tab">
            <div class="skills-grid">
              <?php $__currentLoopData = $technologiesByCategory['frontend'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="skill-card">
                  <?php if($tech->logo): ?>
                    <i class="<?php echo e($tech->logo); ?> skill-icon" aria-hidden="true"></i>
                  <?php else: ?>
                    <div class="skill-icon skill-icon-fallback"><?php echo e(strtoupper(substr($tech->name, 0, 1))); ?></div>
                  <?php endif; ?>
                  <span class="skill-name"><?php echo e($tech->name); ?></span>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
          
          
          <div class="skills-panel" 
               role="tabpanel" 
               id="backend-panel" 
               aria-labelledby="backend-tab">
            <div class="skills-grid">
              <?php $__currentLoopData = $technologiesByCategory['backend'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="skill-card">
                  <?php if($tech->logo): ?>
                    <i class="<?php echo e($tech->logo); ?> skill-icon" aria-hidden="true"></i>
                  <?php else: ?>
                    <div class="skill-icon skill-icon-fallback"><?php echo e(strtoupper(substr($tech->name, 0, 1))); ?></div>
                  <?php endif; ?>
                  <span class="skill-name"><?php echo e($tech->name); ?></span>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
          
          
          <div class="skills-panel" 
               role="tabpanel" 
               id="devtools-panel" 
               aria-labelledby="devtools-tab">
            <div class="skills-grid">
              <?php $__currentLoopData = $technologiesByCategory['dev-tools'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="skill-card">
                  <?php if($tech->logo): ?>
                    <i class="<?php echo e($tech->logo); ?> skill-icon" aria-hidden="true"></i>
                  <?php else: ?>
                    <div class="skill-icon skill-icon-fallback"><?php echo e(strtoupper(substr($tech->name, 0, 1))); ?></div>
                  <?php endif; ?>
                  <span class="skill-name"><?php echo e($tech->name); ?></span>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
          
          <?php if(count($learningTechnologies) > 0): ?>
          
          <div class="skills-panel" 
               role="tabpanel" 
               id="learning-panel" 
               aria-labelledby="learning-tab">
            <div class="skills-grid">
              <?php $__currentLoopData = $learningTechnologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="skill-card learning-card">
                  <?php if($tech->logo): ?>
                    <i class="<?php echo e($tech->logo); ?> skill-icon" aria-hidden="true"></i>
                  <?php else: ?>
                    <div class="skill-icon skill-icon-fallback"><?php echo e(strtoupper(substr($tech->name, 0, 1))); ?></div>
                  <?php endif; ?>
                  <span class="skill-name"><?php echo e($tech->name); ?></span>
                  <span class="learning-badge">Nuovo</span>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </section>

    
    <section class="skills-section learning-section" id="learning-technologies" role="region" aria-labelledby="learning-heading">
      <div class="section-header">
        <span class="section-tag">Crescita Continua</span>
        <h2 id="learning-heading" class="section-title">Tecnologie che Sto Imparando</h2>
      </div>
      
      <div class="skills-container">
        
        <div class="skills-tabs-wrapper">
          <div class="skills-tabs">
            <?php
              // Se ci sono learning technologies, usa quelle. Altrimenti mostra struttura di esempio
              $learningByCategory = count($learningTechnologies) > 0 
                ? $learningTechnologies->groupBy('category')
                : collect([
                    'frontend' => collect([]),
                    'backend' => collect([]),
                    'dev-tools' => collect([])
                  ]);
              $isFirst = true;
            ?>
            
            <?php $__currentLoopData = $learningByCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $technologies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
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
              ?>
              
              <button type="button" 
                      class="skills-tab <?php echo e($isFirst ? 'active' : ''); ?>" 
                      role="tab" 
                      aria-selected="<?php echo e($isFirst ? 'true' : 'false'); ?>" 
                      aria-controls="learning-<?php echo e($category); ?>-panel" 
                      id="learning-<?php echo e($category); ?>-tab" 
                      data-category="learning-<?php echo e($category); ?>">
                <div class="tab-icon">
                  <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <?php echo $iconSvg; ?>

                  </svg>
                </div>
                <div class="tab-content">
                  <span class="tab-title"><?php echo e($categoryName); ?></span>
                  <span class="tab-count"><?php echo e($technologies->count()); ?></span>
                </div>
              </button>
              
              <?php $isFirst = false; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
        
        
        <div class="skills-panels">
          <?php $isFirstPanel = true; ?>
          <?php $__currentLoopData = $learningByCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $technologies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="skills-panel <?php echo e($isFirstPanel ? 'active' : ''); ?>" 
                 role="tabpanel" 
                 id="learning-<?php echo e($category); ?>-panel" 
                 aria-labelledby="learning-<?php echo e($category); ?>-tab">
              <div class="skills-grid">
                <?php if($technologies->count() > 0): ?>
                  <?php $__currentLoopData = $technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="skill-card learning-card">
                      <?php if($tech->logo): ?>
                        <i class="<?php echo e($tech->logo); ?> skill-icon" aria-hidden="true"></i>
                      <?php else: ?>
                        <div class="skill-icon skill-icon-fallback"><?php echo e(strtoupper(substr($tech->name, 0, 1))); ?></div>
                      <?php endif; ?>
                      <span class="skill-name"><?php echo e($tech->name); ?></span>
                      <span class="learning-badge">In Studio</span>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                  
                  <div class="empty-learning-state">

                  </div>
                <?php endif; ?>
              </div>
            </div>
            <?php $isFirstPanel = false; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </section>

    
    <section id="projects" class="simple-section">
      <div class="container">
        <h2>I Miei Progetti</h2>
        <p>Una selezione dei progetti su cui ho lavorato</p>
        
        <div class="projects-simple-grid">
          <?php $__empty_1 = true; $__currentLoopData = $projects->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="project-simple-card">
              <h3><?php echo e($project->title); ?></h3>
              <?php if($project->description): ?>
                <p><?php echo e(Str::limit($project->description, 100)); ?></p>
              <?php endif; ?>
              <?php if($project->github_url): ?>
                <a href="<?php echo e($project->github_url); ?>" target="_blank">Vedi su GitHub →</a>
              <?php endif; ?>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>Nessun progetto disponibile</p>
          <?php endif; ?>
        </div>
      </div>
    </section>

    
    <?php echo $__env->make('guest.partials.contact-modern', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>




</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('guest.layouts.guest-minimal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/index-minimal.blade.php ENDPATH**/ ?>