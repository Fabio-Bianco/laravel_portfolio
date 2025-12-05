
<div class="projects-carousel-section mb-5">
    <h2 class="text-center mb-4">I miei progetti</h2>
    
    <div id="projectsCarousel" class="carousel slide" data-bs-ride="carousel">
        
        <div class="carousel-indicators">
            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button type="button" 
                        data-bs-target="#projectsCarousel" 
                        data-bs-slide-to="<?php echo e($index); ?>" 
                        class="<?php echo e($index === 0 ? 'active' : ''); ?>" 
                        aria-current="<?php echo e($index === 0 ? 'true' : 'false'); ?>" 
                        aria-label="Slide <?php echo e($index + 1); ?>">
                </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        
        <div class="carousel-inner">
            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?>">
                    <img src="https://picsum.photos/1200/600?random=<?php echo e($project->id); ?>" 
                         class="d-block w-100" 
                         alt="<?php echo e($project->title); ?>"
                         style="height: 500px; object-fit: cover;">
                    
                    <div class="carousel-caption">
                        
                        <div class="project-header mb-3">
                            <?php if($project->type): ?>
                                <span class="badge bg-primary project-type-badge">
                                    <i class="bi bi-folder"></i> <?php echo e($project->type->name); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                        
                        
                        <h3 class="project-title mb-3"><?php echo e($project->title); ?></h3>
                        
                        
                        <p class="project-description mb-3">
                            <?php echo e(Str::limit($project->description ?: 'Progetto sviluppato con passione e dedizione', 100)); ?>

                        </p>
                        
                        
                        <?php if($project->technologies && $project->technologies->count() > 0): ?>
                            <div class="tech-stack mb-4">
                                <div class="tech-label mb-2">
                                    <i class="bi bi-code-slash"></i> <strong>Stack:</strong>
                                </div>
                                <div class="tech-badges">
                                    <?php $__currentLoopData = $project->technologies->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge bg-dark tech-badge"><?php echo e($tech->name); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($project->technologies->count() > 5): ?>
                                        <span class="badge bg-info tech-badge-more">+<?php echo e($project->technologies->count() - 5); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        
                        <div class="project-actions">
                            <?php if($project->github_url): ?>
                                <a href="<?php echo e($project->github_url); ?>" 
                                   target="_blank" 
                                   class="btn btn-outline-light btn-action me-2"
                                   rel="noopener noreferrer">
                                    <i class="bi bi-github"></i> Codice Sorgente
                                </a>
                            <?php endif; ?>
                            
                            <a href="<?php echo e(route('projects.show', $project->slug)); ?>" 
                               class="btn btn-primary btn-action">
                                <i class="bi bi-arrow-right-circle"></i> Esplora Progetto
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        
        <button class="carousel-control-prev" type="button" data-bs-target="#projectsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#projectsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/components/projects-carousel.blade.php ENDPATH**/ ?>