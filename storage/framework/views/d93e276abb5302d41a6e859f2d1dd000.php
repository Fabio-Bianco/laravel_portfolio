



<?php if($projects->isNotEmpty()): ?>
  <section class="projects-carousel-section mt-4">

    <div id="projectsCarousel" class="carousel slide" data-bs-ride="carousel">
      
      <div class="carousel-indicators">
        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <button type="button"
                  data-bs-target="#projectsCarousel"
                  data-bs-slide-to="<?php echo e($loop->index); ?>"
                  class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => $loop->first]); ?>"
                  <?php if($loop->first): ?> aria-current="true" <?php endif; ?>
                  aria-label="Slide <?php echo e($loop->iteration); ?>">
          </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

      
      <div class="carousel-inner">
        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="carousel-item <?php if($loop->first): ?> active <?php endif; ?>">

            
            <?php
                // Immagini mockup professionali da Unsplash
                $mockupImages = [
                    'backend' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=1200&h=600&fit=crop&crop=center', // Server code
                    'frontend' => 'https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?w=1200&h=600&fit=crop&crop=center', // Web design
                    'automazioni' => 'https://images.unsplash.com/photo-1518432031352-d6fc5c10da5a?w=1200&h=600&fit=crop&crop=center', // Automation
                    'default' => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=1200&h=600&fit=crop&crop=center' // Generic code
                ];
                $typeKey = $project->type ? strtolower($project->type->name) : 'default';
                $imageUrl = $mockupImages[$typeKey] ?? $mockupImages['default'];
            ?>
            <img 
              src="<?php echo e($imageUrl); ?>" 
              class="d-block w-100" 
              alt="Mockup progetto <?php echo e($project->title); ?> (<?php echo e($project->type->name ?? 'Full-stack'); ?>)"
              loading="lazy"
              style="height: 500px; object-fit: cover;"
            >

            
            <div class="carousel-caption">

              
              <div class="project-type-badge">
                <span class="badge">
                  
                  <?php echo e($project->type->name ?? $project->stack_label ?? 'Full-stack'); ?>

                </span>
              </div>

              
              <div class="project-content">
                <h3 class="project-title">
                  <?php echo e($project->title); ?>

                </h3>

                
                <p class="project-description">
                  <?php echo e($project->short_description ?? Str::limit($project->description, 160)); ?>

                </p>

                
                <?php if(!empty($project->tech_stack)): ?>
                  <p class="project-stack">
                    
                    <?php if(is_array($project->tech_stack)): ?>
                      <?php echo e(implode(' • ', $project->tech_stack)); ?>

                    <?php else: ?>
                      <?php echo e($project->tech_stack); ?>

                    <?php endif; ?>
                  </p>
                <?php endif; ?>

                
                <div class="project-actions">

                  
                  <?php if(!empty($project->demo_url)): ?>
                    <a href="<?php echo e($project->demo_url); ?>" 
                       class="btn btn-primary"
                       target="_blank" 
                       rel="noopener noreferrer">
                      <i class="bi bi-box-arrow-up-right"></i>
                      <span>Live demo</span>
                    </a>
                  <?php endif; ?>

                  
                  <?php if(!empty($project->github_url)): ?>
                    <a href="<?php echo e($project->github_url); ?>" 
                       class="btn btn-outline"
                       target="_blank" 
                       rel="noopener noreferrer">
                      <i class="bi bi-github"></i>
                      <span>Codice su GitHub</span>
                    </a>
                  <?php endif; ?>

                  
                  <a href="<?php echo e(route('projects.show', $project)); ?>" 
                     class="btn btn-details">
                    <i class="bi bi-info-circle"></i>
                    <span>Dettagli</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

      
      <button class="carousel-control-prev" type="button" data-bs-target="#projectsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Precedente</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#projectsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Successivo</span>
      </button>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/components/projects-carousel.blade.php ENDPATH**/ ?>