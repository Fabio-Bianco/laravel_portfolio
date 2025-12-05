
<?php
  $cardStyle = $style ?? 'grid';
  $isCarousel = $cardStyle === 'carousel';
?>

<article class="project-card project-card--<?php echo e($cardStyle); ?>">
  
  <div class="project-header">
    <?php if($project->image_url): ?>
      <img src="<?php echo e($project->image_url); ?>" 
           alt="<?php echo e($project->title); ?>" 
           class="project-image">
    <?php else: ?>
      <div class="project-placeholder">
        <?php if($isCarousel): ?>
          
          <img src="https://via.placeholder.com/400x250/6366f1/ffffff?text=<?php echo e(urlencode($project->title)); ?>" 
               alt="<?php echo e($project->title); ?> placeholder" 
               class="project-image placeholder-img">
        <?php else: ?>
          <span class="placeholder-text"><?php echo e(strtoupper(substr($project->title, 0, 2))); ?></span>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
  
  
  <div class="project-content">
    
    <?php if($project->type): ?>
      <span class="project-type badge"><?php echo e($project->type->name); ?></span>
    <?php endif; ?>
    
    
    <h3 class="project-title">
      <a href="<?php echo e(route('projects.show', $project->slug)); ?>">
        <?php echo e($project->title); ?>

      </a>
    </h3>
    
    
    <?php if(!$isCarousel && $project->description): ?>
      <p class="project-description">
        <?php echo e(Str::limit($project->description, 100)); ?>

      </p>
    <?php endif; ?>
    
    
    <?php if($project->technologies && $project->technologies->count()): ?>
      <div class="project-technologies">
        <?php $maxTechs = $isCarousel ? 2 : 3 ?>
        <?php $__currentLoopData = $project->technologies->take($maxTechs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <span class="tech-tag"><?php echo e($tech->name); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($project->technologies->count() > $maxTechs): ?>
          <span class="tech-more">+<?php echo e($project->technologies->count() - $maxTechs); ?></span>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
  
  
  <?php if(!$isCarousel || ($project->stargazers_count || $project->forks_count)): ?>
    <div class="project-footer">
      
      <?php if($project->stargazers_count || $project->forks_count): ?>
        <div class="project-stats">
          <?php if($project->stargazers_count): ?>
            <span class="stat">⭐ <?php echo e($project->stargazers_count); ?></span>
          <?php endif; ?>
          <?php if($project->forks_count): ?>  
            <span class="stat">🔀 <?php echo e($project->forks_count); ?></span>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      
      
      <?php if(!$isCarousel): ?>
        <div class="project-actions">
          <?php if($project->link): ?>
            <a href="<?php echo e($project->link); ?>" target="_blank" class="btn-live">Live</a>
          <?php endif; ?>
          <?php if($project->github_url): ?>
            <a href="<?php echo e($project->github_url); ?>" target="_blank" class="btn-github">GitHub</a>  
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</article><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/components/project-card.blade.php ENDPATH**/ ?>