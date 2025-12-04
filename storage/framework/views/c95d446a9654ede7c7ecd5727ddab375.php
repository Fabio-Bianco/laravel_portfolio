
<section class="projects-section" id="projects" role="region" aria-labelledby="projects-heading">
  <div class="projects-container">
    <div class="section-header">
      <span class="section-tag">I Miei Lavori</span>
      <h2 id="projects-heading" class="section-title">Progetti in Evidenza</h2>
      <p class="section-subtitle">Una selezione dei miei progetti più significativi</p>
    </div>

    <div class="projects-content">
      <?php if($projects && $projects->count()): ?>
        <div class="projects-grid">
          <?php $__currentLoopData = $projects->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="project-card">
              <div class="project-header">
                <h3 class="project-title">
                  <a href="<?php echo e(route('projects.show', $project->slug)); ?>" class="project-link">
                    <?php echo e($project->name); ?>

                  </a>
                </h3>
                <?php if($project->type): ?>
                  <span class="project-type"><?php echo e($project->type->name); ?></span>
                <?php endif; ?>
              </div>
              
              <?php if($project->description): ?>
                <p class="project-description"><?php echo e(Str::limit($project->description, 120)); ?></p>
              <?php endif; ?>
              
              <div class="project-footer">
                
                <?php if($project->technologies->count()): ?>
                  <div class="project-tech">
                    <?php $__currentLoopData = $project->technologies->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <span class="tech-badge"><?php echo e($tech->name); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($project->technologies->count() > 3): ?>
                      <span class="tech-badge-more">+<?php echo e($project->technologies->count() - 3); ?></span>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
                
                
                <div class="project-links">
                  <?php if($project->github_url): ?>
                    <a href="<?php echo e($project->github_url); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="project-link-btn"
                       title="Vedi su GitHub">
                      <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                      </svg>
                    </a>
                  <?php endif; ?>
                  
                  <?php if($project->demo_url): ?>
                    <a href="<?php echo e($project->demo_url); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="project-link-btn"
                       title="Vedi Demo Live">
                      <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm.312-3.5h2.49c-.062-.89-.291-1.733-.656-2.5H12.18c.174.782.282 1.623.312 2.5zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                      </svg>
                    </a>
                  <?php endif; ?>
                  
                  <a href="<?php echo e(route('projects.show', $project->slug)); ?>" 
                     class="project-link-btn project-details-btn"
                     title="Vedi Dettagli">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                      <path d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                  </a>
                </div>
              </div>
            </article>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        
        <div class="projects-footer">
          <a href="<?php echo e(route('projects.show', '#')); ?>" class="btn-view-all">
            Vedi Tutti i Progetti
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
              <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
            </svg>
          </a>
        </div>
      <?php else: ?>
        
        <div class="projects-empty">
          <div class="empty-icon">📂</div>
          <h3>Progetti in Arrivo</h3>
          <p>Sto lavorando su progetti interessanti che saranno presto disponibili qui.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views\guest\partials\projects-minimal.blade.php ENDPATH**/ ?>