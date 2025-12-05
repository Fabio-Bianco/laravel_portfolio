
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
                        <!-- Badge linguaggio (top-left) -->
                        <?php if($project->type): ?>
                        <div class="project-type-badge">
                            <span class="badge"><?php echo e($project->type->name); ?></span>
                        </div>
                        <?php endif; ?>
                        
                        <!-- Contenuto principale (bottom-left) -->
                        <div class="project-content">
                            <h5 class="project-title"><?php echo e($project->title); ?></h5>
                            <p class="project-description"><?php echo e($project->description ?: 'Progetto interessante'); ?></p>
                            
                            <!-- Pulsanti azione (inline) -->
                            <div class="project-actions">
                                <?php if($project->github_url): ?>
                                    <a href="<?php echo e($project->github_url); ?>" target="_blank" class="btn btn-outline-light">
                                        <i class="bi bi-github"></i> <span>GitHub</span>
                                    </a>
                                <?php endif; ?>
                                
                                <a href="<?php echo e(route('projects.show', $project->slug)); ?>" class="btn btn-outline-light btn-details">
                                    <i class="bi bi-arrow-right"></i> <span>Dettagli</span>
                                </a>
                            </div>
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