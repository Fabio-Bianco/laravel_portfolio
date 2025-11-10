<?php $__env->startSection('title', 'Portfolio'); ?>

<?php $__env->startSection('content'); ?>
<div class="guest-container">
  
  
    <section class="hero-section" id="hero" role="banner" aria-label="Hero section">
      <div class="hero-content">
        
        <div class="hero-tag" role="note" aria-label="Introduzione professionale">
          <span class="hero-tag-icon" aria-hidden="true">👋</span>
          <span>Hi, I'm</span>
        </div>
        
        
        <h1 class="hero-title"><?php echo e(config('app.owner_name', 'Fabio Bianco')); ?></h1>
        
        
        <p class="hero-subtitle">Full Stack Developer</p>
        <p class="hero-tagline">
          Building modern web applications with clean code and user-centric design. 
          Specialized in <strong>Laravel</strong>, <strong>React</strong>, and <strong>JavaScript</strong>.
        </p>
        
        
        <div class="hero-cta" role="group" aria-label="Azioni principali">
          <a href="#projects" 
             class="btn-hero btn-hero-primary" 
             onclick="event.preventDefault(); document.getElementById('projects').scrollIntoView({behavior: 'smooth'});"
             aria-label="Esplora i miei progetti">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
            </svg>
            View My Work
          </a>
          <a href="#contact" 
             class="btn-hero btn-hero-secondary" 
             onclick="event.preventDefault(); document.getElementById('contact').scrollIntoView({behavior: 'smooth'});"
             aria-label="Contattami">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
            </svg>
            Get In Touch
          </a>
        </div>
        
        
        <div class="hero-stats" role="region" aria-label="Statistiche portfolio">
          <?php
            $totalProjects = \App\Models\Project::published()->count();
            $featuredCount = \App\Models\Project::published()->featured()->count();
            $techCount = \App\Models\Technology::count();
          ?>
          <div class="hero-stat-item">
            <strong class="hero-stat-value"><?php echo e($totalProjects); ?>+</strong>
            <span class="hero-stat-label">Projects</span>
          </div>
          <div class="hero-stat-divider" aria-hidden="true"></div>
          <div class="hero-stat-item">
            <strong class="hero-stat-value"><?php echo e($techCount); ?>+</strong>
            <span class="hero-stat-label">Technologies</span>
          </div>
          <div class="hero-stat-divider" aria-hidden="true"></div>
          <div class="hero-stat-item">
            <strong class="hero-stat-value"><?php echo e($featuredCount); ?></strong>
            <span class="hero-stat-label">Featured</span>
          </div>
        </div>
      </div>
      
      
      <div class="scroll-indicator" aria-hidden="true">
        <span class="scroll-text">Scroll down</span>
        <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" class="scroll-arrow">
          <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
        </svg>
      </div>
    </section>

    
    <section class="about-section" id="about" role="region" aria-labelledby="about-heading">
      <div class="section-header">
        <span class="section-tag">Who I Am</span>
        <h2 id="about-heading" class="section-title">About Me</h2>
      </div>
      
      <div class="about-content">
        <div class="about-text">
          <p class="about-intro">
            Hi! I'm <strong><?php echo e(config('app.owner_name', 'Fabio Bianco')); ?></strong>, a passionate Full Stack Developer 
            who turns complex problems into elegant, user-friendly solutions.
          </p>
          <p>
            With expertise in <strong>Laravel</strong>, <strong>React</strong>, and modern JavaScript, 
            I build scalable web applications that prioritize both performance and user experience. 
            I believe in writing clean, maintainable code and staying updated with the latest web technologies.
          </p>
          <p>
            When I'm not coding, I'm exploring new frameworks, contributing to open-source projects, 
            or sharing knowledge with the developer community. Always eager to take on new challenges 
            and collaborate on innovative projects.
          </p>
        </div>
        
        <div class="about-avatar">
          <div class="avatar-container">
            <div class="avatar-image">
              
              <?php echo e(strtoupper(substr(config('app.owner_name', 'FB'), 0, 2))); ?>

            </div>
            <div class="avatar-status" aria-label="Available for work">
              <span class="status-dot"></span>
              <span class="status-text">Available for work</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <section class="skills-section" id="skills" role="region" aria-labelledby="skills-heading">
      <div class="section-header">
        <span class="section-tag">What I Do</span>
        <h2 id="skills-heading" class="section-title">Skills & Technologies</h2>
        <p class="section-description">
          A comprehensive toolkit for building modern, scalable web applications
        </p>
      </div>
      
      <div class="skills-grid">
        
        <div class="skill-category">
          <div class="skill-category-header">
            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v9A1.5 1.5 0 0 1 14.5 12h-13A1.5 1.5 0 0 1 0 10.5v-9zM1.5 1a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
              <path d="M2 2h12v8H2V2z"/>
            </svg>
            <h3>Frontend</h3>
          </div>
          <div class="skill-list">
            <div class="skill-item">
              <span class="skill-name">JavaScript (ES6+)</span>
              <div class="skill-level" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 90%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">React</span>
              <div class="skill-level" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 85%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">HTML5 / CSS3</span>
              <div class="skill-level" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 95%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">Tailwind CSS</span>
              <div class="skill-level" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 80%"></div>
              </div>
            </div>
          </div>
        </div>
        
        
        <div class="skill-category">
          <div class="skill-category-header">
            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h11A1.5 1.5 0 0 1 15 2.5v11a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 13.5v-11z"/>
              <path fill="white" d="M2.5 2a.5.5 0 0 0-.5.5v11a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5v-11a.5.5 0 0 0-.5-.5h-11z"/>
            </svg>
            <h3>Backend</h3>
          </div>
          <div class="skill-list">
            <div class="skill-item">
              <span class="skill-name">PHP</span>
              <div class="skill-level" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 90%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">Laravel</span>
              <div class="skill-level" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 95%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">MySQL</span>
              <div class="skill-level" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 85%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">REST API</span>
              <div class="skill-level" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 90%"></div>
              </div>
            </div>
          </div>
        </div>
        
        
        <div class="skill-category">
          <div class="skill-category-header">
            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0z"/>
            </svg>
            <h3>Tools & DevOps</h3>
          </div>
          <div class="skill-list">
            <div class="skill-item">
              <span class="skill-name">Git & GitHub</span>
              <div class="skill-level" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 90%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">VS Code</span>
              <div class="skill-level" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 95%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">Composer / npm</span>
              <div class="skill-level" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 85%"></div>
              </div>
            </div>
            <div class="skill-item">
              <span class="skill-name">Postman / API Testing</span>
              <div class="skill-level" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                <div class="skill-level-fill" style="width: 80%"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <section id="projects" class="projects-section" role="region" aria-labelledby="projects-heading">
      <div class="section-header">
        <span class="section-tag">My Work</span>
        <h2 id="projects-heading" class="section-title">Featured Projects</h2>
      </div>

      
      <?php if(isset($allTypes)): ?>
        <div class="filters-section">
          <div class="filter-group" style="justify-content: center;">
            <a href="<?php echo e(route('home')); ?>" 
               class="filter-chip <?php echo e(!isset($currentType) ? 'active' : ''); ?>">
              Tutti
              <?php if(isset($typeCounts)): ?>
                <span class="count"><?php echo e($typeCounts->sum()); ?></span>
              <?php endif; ?>
            </a>
            <?php $__currentLoopData = $allTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $count = $typeCounts[$t->id] ?? 0;
              ?>
              <?php if($count > 0): ?>
                <a href="<?php echo e(route('home', ['type' => $t->slug])); ?>"
                   class="filter-chip <?php echo e((isset($currentType) && $currentType->id === $t->id) ? 'active' : ''); ?>">
                  <?php echo e($t->name); ?>

                  <span class="count"><?php echo e($count); ?></span>
                </a>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      <?php endif; ?>

      
      <div class="stats-bar">
        <span class="stat-item">
          <strong><?php echo e($projects->total()); ?></strong> progetti
        </span>
        <?php if(isset($currentType) || (isset($isFeatured) && $isFeatured)): ?>
          <span>•</span>
          <a href="<?php echo e(route('home')); ?>" style="color: var(--color-accent); text-decoration: none;">
            Mostra tutti
          </a>
        <?php endif; ?>
        <?php if(!isset($isFeatured) || !$isFeatured): ?>
          <?php
            $featuredCount = \App\Models\Project::published()->featured()->count();
          ?>
          <?php if($featuredCount > 0): ?>
            <span>•</span>
            <a href="<?php echo e(route('projects.featured')); ?>" style="color: var(--color-accent); text-decoration: none;">
              ⭐ Featured (<?php echo e($featuredCount); ?>)
            </a>
          <?php endif; ?>
        <?php endif; ?>
      </div>

      
      <div class="projects-grid">
        <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <article class="project-card">
            
            
            <?php if($project->image_url): ?>
              <div class="project-card-image">
                <img src="<?php echo e($project->image_url); ?>" alt="<?php echo e($project->title); ?>">
              </div>
            <?php else: ?>
              <?php
                $gradients = [
                  '#667eea 0%, #764ba2 100%',
                  '#f093fb 0%, #f5576c 100%',
                  '#4facfe 0%, #00f2fe 100%',
                  '#43e97b 0%, #38f9d7 100%'
                ];
                $randomGradient = $gradients[array_rand($gradients)];
              ?>
              <div class="project-card-image" style="background: linear-gradient(135deg, <?php echo e($randomGradient); ?>);">
                <div style="display: flex; align-items: center; justify-content: center; height: 100%; font-size: 3rem; color: white; opacity: 0.3;">
                  <?php echo e(strtoupper(substr($project->title, 0, 1))); ?>

                </div>
              </div>
            <?php endif; ?>
            
            <div class="project-card-body">
              
              
              <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1rem;">
                <?php if($project->type): ?>
                  <?php
                    $typeName = strtolower($project->type->name);
                    $badgeClass = 'frontend';
                    if ($typeName === 'automazioni') $badgeClass = 'automazioni';
                    elseif ($typeName === 'backend') $badgeClass = 'backend';
                  ?>
                  <span class="badge-type badge-type-<?php echo e($badgeClass); ?>">
                    <?php echo e($project->type->name); ?>

                  </span>
                <?php endif; ?>
                
                <?php if($project->technologies && $project->technologies->count()): ?>
                  <?php $__currentLoopData = $project->technologies->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="badge-tech"><?php echo e($tech->name); ?></span>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php if($project->technologies->count() > 3): ?>
                    <span class="badge-tech" style="opacity: 0.7;">+<?php echo e($project->technologies->count() - 3); ?></span>
                  <?php endif; ?>
                <?php endif; ?>
              </div>
              
              
              <h2 class="project-card-title"><?php echo e($project->title); ?></h2>
              
              
              <?php if($project->description): ?>
                <p class="project-card-description"><?php echo e($project->description); ?></p>
              <?php endif; ?>
              
              
              <?php if(!is_null($project->stargazers_count) || !is_null($project->forks_count)): ?>
                <div style="display: flex; gap: 1rem; margin-bottom: 1rem; color: var(--color-text-muted); font-size: 0.9rem;">
                  <?php if(!is_null($project->stargazers_count)): ?>
                    <span style="display: flex; align-items: center; gap: 0.35rem;">
                      ⭐ <?php echo e($project->stargazers_count); ?>

                    </span>
                  <?php endif; ?>
                  <?php if(!is_null($project->forks_count)): ?>
                    <span style="display: flex; align-items: center; gap: 0.35rem;">
                      🔀 <?php echo e($project->forks_count); ?>

                    </span>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              
              
              <div style="margin-top: auto;">
                <a href="<?php echo e(route('projects.show', $project->slug)); ?>" class="btn-primary-minimal" style="width: 100%; justify-content: center;">
                  Vedi progetto
                  <span style="font-size: 1.2rem;">→</span>
                </a>
              </div>
              
            </div>
            
          </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <div class="empty-state" style="grid-column: 1 / -1;">
            <div class="empty-state-icon">📭</div>
            <h3 style="margin-bottom: 0.5rem;">Nessun progetto trovato</h3>
            <p class="text-muted">Prova a cambiare i filtri di ricerca</p>
            <?php if(isset($currentType)): ?>
              <a href="<?php echo e(route('home')); ?>" class="btn-minimal" style="margin-top: 1rem;">
                Mostra tutti i progetti
              </a>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>

      
      <?php if($projects->hasPages()): ?>
        <div style="display: flex; justify-content: center;">
          <?php echo e($projects->links()); ?>

        </div>
      <?php endif; ?>
    </section>

    
    <section class="contact-section" id="contact" role="region" aria-labelledby="contact-heading">
      <div class="section-header">
        <span class="section-tag">Get In Touch</span>
        <h2 id="contact-heading" class="section-title">Let's Work Together</h2>
        <p class="section-description">
          Have a project in mind? Let's discuss how I can help bring your ideas to life.
        </p>
      </div>
      
      <div class="contact-content">
        
        <div class="contact-form-wrapper">
          <form class="contact-form" 
                id="contactForm" 
                action="<?php echo e(route('contact.send')); ?>" 
                method="POST"
                novalidate
                aria-label="Contact form">
            <?php echo csrf_field(); ?>
            
            
            <div class="form-group">
              <label for="contact-name" class="form-label">
                Your Name <span class="required" aria-label="required">*</span>
              </label>
              <input type="text" 
                     id="contact-name" 
                     name="name" 
                     class="form-input" 
                     placeholder="John Doe"
                     required
                     aria-required="true"
                     aria-describedby="name-error"
                     autocomplete="name">
              <span class="form-error" id="name-error" role="alert"></span>
            </div>
            
            
            <div class="form-group">
              <label for="contact-email" class="form-label">
                Your Email <span class="required" aria-label="required">*</span>
              </label>
              <input type="email" 
                     id="contact-email" 
                     name="email" 
                     class="form-input" 
                     placeholder="john@example.com"
                     required
                     aria-required="true"
                     aria-describedby="email-error"
                     autocomplete="email">
              <span class="form-error" id="email-error" role="alert"></span>
            </div>
            
            
            <div class="form-group">
              <label for="contact-subject" class="form-label">
                Subject <span class="required" aria-label="required">*</span>
              </label>
              <input type="text" 
                     id="contact-subject" 
                     name="subject" 
                     class="form-input" 
                     placeholder="Project Inquiry"
                     required
                     aria-required="true"
                     aria-describedby="subject-error">
              <span class="form-error" id="subject-error" role="alert"></span>
            </div>
            
            
            <div class="form-group">
              <label for="contact-message" class="form-label">
                Message <span class="required" aria-label="required">*</span>
              </label>
              <textarea id="contact-message" 
                        name="message" 
                        class="form-input form-textarea" 
                        placeholder="Tell me about your project..."
                        rows="5"
                        required
                        aria-required="true"
                        aria-describedby="message-error"></textarea>
              <span class="form-error" id="message-error" role="alert"></span>
            </div>
            
            
            <button type="submit" 
                    class="btn-submit" 
                    id="submitBtn"
                    aria-label="Send message">
              <span class="btn-text">Send Message</span>
              <span class="btn-loading" style="display: none;" aria-hidden="true">
                <svg class="spinner" width="20" height="20" viewBox="0 0 24 24" fill="none">
                  <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" opacity="0.25"/>
                  <path d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" fill="currentColor"/>
                </svg>
                Sending...
              </span>
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
              </svg>
            </button>
            
            
            <div class="form-message form-success" id="successMessage" style="display: none;" role="alert">
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </svg>
              <span>Thanks! Your message has been sent successfully.</span>
            </div>
            <div class="form-message form-error-global" id="errorMessage" style="display: none;" role="alert">
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
              </svg>
              <span>Oops! Something went wrong. Please try again.</span>
            </div>
          </form>
        </div>
        
        
        <div class="contact-info">
          <div class="contact-info-card">
            <div class="contact-info-icon">
              <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
              </svg>
          </div>
          <h3>Email</h3>
          <a href="mailto:<?php echo e(config('app.owner_email')); ?>" class="contact-link">
            <?php echo e(config('app.owner_email')); ?>

          </a>
        </div>          <div class="contact-info-card">
            <div class="contact-info-icon">
              <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
              </svg>
          </div>
          <h3>GitHub</h3>
          <a href="https://github.com/<?php echo e(config('app.owner_github')); ?>" 
             target="_blank" 
             rel="noopener noreferrer"
             class="contact-link">
            {{ config('app.owner_github') }}
          </a>
        </div>          <div class="contact-info-card">
            <div class="contact-info-icon">
              <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
              </svg>
          </div>
          <h3>LinkedIn</h3>
          <a href="https://www.linkedin.com/in/<?php echo e(config('app.owner_linkedin')); ?>/" 
             target="_blank" 
             rel="noopener noreferrer"
             class="contact-link">
            Connect with me
          </a>
        </div>
      </div>
    </div>
  </section>



  
  <footer class="site-footer" role="contentinfo">
    <div class="footer-content">
      <div class="footer-grid">
        
        <div class="footer-column">
          <h3 class="footer-brand"><?php echo e(config('app.owner_name', 'Fabio Bianco')); ?></h3>
          <p class="footer-tagline">
            Full Stack Developer crafting modern web experiences with passion and precision.
          </p>
          <div class="footer-social">
            <a href="https://github.com/<?php echo e(config('app.owner_github')); ?>" 
               target="_blank" 
               rel="noopener noreferrer"
               class="social-link"
               aria-label="GitHub profile">
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
              </svg>
            </a>
            <a href="https://www.linkedin.com/in/<?php echo e(config('app.owner_linkedin')); ?>/" 
               target="_blank" 
               rel="noopener noreferrer"
               class="social-link"
               aria-label="LinkedIn profile">
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
            </svg>
          </a>
          <a href="mailto:<?php echo e(config('app.owner_email')); ?>" 
             class="social-link"
             aria-label="Email contact">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
            </svg>
          </a>
        </div>
      </div>        
        <div class="footer-column">
          <h4 class="footer-heading">Quick Links</h4>
          <ul class="footer-links">
            <li><a href="#hero" onclick="event.preventDefault(); document.getElementById('hero').scrollIntoView({behavior: 'smooth'});">Home</a></li>
            <li><a href="#about" onclick="event.preventDefault(); document.getElementById('about').scrollIntoView({behavior: 'smooth'});">About</a></li>
            <li><a href="#skills" onclick="event.preventDefault(); document.getElementById('skills').scrollIntoView({behavior: 'smooth'});">Skills</a></li>
            <li><a href="#projects" onclick="event.preventDefault(); document.getElementById('projects').scrollIntoView({behavior: 'smooth'});">Projects</a></li>
            <li><a href="#contact" onclick="event.preventDefault(); document.getElementById('contact').scrollIntoView({behavior: 'smooth'});">Contact</a></li>
          </ul>
        </div>
        
        
        <div class="footer-column">
          <h4 class="footer-heading">Explore</h4>
          <ul class="footer-links">
            <li><a href="<?php echo e(route('home')); ?>">All Projects</a></li>
            <?php
              $featuredCount = \App\Models\Project::published()->featured()->count();
            ?>
            <?php if($featuredCount > 0): ?>
              <li><a href="<?php echo e(route('projects.featured')); ?>">Featured Work</a></li>
            <?php endif; ?>
            <?php if(auth()->check()): ?>
              <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
            <?php endif; ?>
          </ul>
        </div>
        
        
        <div class="footer-column">
          <h4 class="footer-heading">Open Source & Accessibilità</h4>
          <p class="footer-text">
            Questo portfolio è costruito con Laravel ed è open source, progettato seguendo le linee guida WCAG 2.1 AA.
          </p>
          
          <div class="accessibility-features">
            <h5>Caratteristiche di Accessibilità:</h5>
            <ul>
              <li>
                <span class="accessibility-icon" aria-hidden="true">🎯</span>
                Navigazione da tastiera ottimizzata
              </li>
              <li>
                <span class="accessibility-icon" aria-hidden="true">🔍</span>
                Alto contrasto e leggibilità
              </li>
              <li>
                <span class="accessibility-icon" aria-hidden="true">📱</span>
                Design responsive
              </li>
              <li>
                <span class="accessibility-icon" aria-hidden="true">⌨️</span>
                Supporto screen reader
              </li>
              <li>
                <span class="accessibility-icon" aria-hidden="true">🌙</span>
                Modalità dark/light automatica
              </li>
            </ul>
          </div>
          
          <div class="footer-cta-group">
            <a href="https://github.com/<?php echo e(config('app.owner_github')); ?>/laravel_portfolio" 
               target="_blank" 
               rel="noopener noreferrer"
               class="footer-cta">
              <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
              </svg>
              Vedi Sorgente
            </a>
            <a href="#" 
               onclick="toggleHighContrast(event)"
               class="footer-cta contrast-toggle"
               role="button"
               aria-label="Attiva/disattiva modalità alto contrasto">
              <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
              </svg>
              Modalità Alto Contrasto
            </a>
          </div>
        </div>
      </div>
      
      
      <div class="footer-bottom">
        <p class="footer-copyright">
          &copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.owner_name', 'Fabio Bianco')); ?>. All rights reserved.
        </p>
        <p class="footer-tech">
          Built with <span style="color: #ff2d20;">❤</span> using Laravel & Vite
        </p>
      </div>
    </div>
  </footer>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest-minimal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\laravel_portfolio\resources\views/guest/index-minimal.blade.php ENDPATH**/ ?>