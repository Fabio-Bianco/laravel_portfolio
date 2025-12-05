
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
                    <img src="https://picsum.photos/800/400?random=<?php echo e($project->id); ?>" 
                         class="d-block w-100" 
                         alt="<?php echo e($project->title); ?>"
                         style="height: 400px; object-fit: cover;">
                    
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo e($project->title); ?></h5>
                        <p><?php echo e($project->description ?: 'Progetto interessante'); ?></p>
                        <?php if($project->github_url): ?>
                            <a href="<?php echo e($project->github_url); ?>" 
                               target="_blank" 
                               class="btn btn-outline-light btn-sm">
                                <i class="bi bi-github"></i> Vedi su GitHub
                            </a>
                        <?php endif; ?>
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