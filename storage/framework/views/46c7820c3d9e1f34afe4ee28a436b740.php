

<?php $__env->startSection('title', $project->title); ?>

<?php $__env->startSection('content'); ?>
<div class="guest-container">
  
  
  <a href="<?php echo e(route('home')); ?>" class="btn-minimal" style="margin-bottom: 2rem; display: inline-flex;">
    ← Torna al portfolio
  </a>

  
  <article style="max-width: 900px; margin: 0 auto;">
    
    
    <header style="margin-bottom: 2rem;">
      
      
      <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1rem;">
        <?php if($project->type): ?>
          <?php ($typeName = strtolower($project->type->name)); ?>
          <span class="badge-type badge-type-<?php echo e($typeName === 'automazioni' ? 'automazioni' : ($typeName === 'backend' ? 'backend' : 'frontend')); ?>">
            <?php echo e($project->type->name); ?>

          </span>
        <?php endif; ?>
        
        <?php if($project->technologies && $project->technologies->count()): ?>
          <?php $__currentLoopData = $project->technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="badge-tech"><?php echo e($tech->name); ?></span>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
      
      
      <h1 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem; line-height: 1.2;">
        <?php echo e($project->title); ?>

      </h1>
      
      
      <?php if($project->description): ?>
        <p style="font-size: 1.2rem; color: var(--color-text-muted); line-height: 1.6;">
          <?php echo e($project->description); ?>

        </p>
      <?php endif; ?>
      
    </header>

    
    <?php if($project->image_url): ?>
      <div style="margin-bottom: 2rem; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-lg);">
        <img 
             src="<?php echo e($project->image_url); ?>" 
             alt="<?php echo e($project->title); ?>" 
             loading="lazy"
             width="900"
             height="506"
             style="width: 100%; height: auto; display: block;">
      </div>
    <?php endif; ?>

    
    <?php if(!is_null($project->stargazers_count) || !is_null($project->forks_count) || !is_null($project->watchers_count)): ?>
      <div style="display: flex; gap: 2rem; margin-bottom: 2rem; padding: 1.5rem; background: var(--color-surface); border-radius: var(--radius); border: 1px solid var(--color-border);">
        <?php if(!is_null($project->stargazers_count)): ?>
          <div>
            <div style="font-size: 1.5rem; font-weight: 600; color: var(--color-text);">
              <?php echo e($project->stargazers_count); ?>

            </div>
            <div style="font-size: 0.9rem; color: var(--color-text-muted);">
              ⭐ Stars
            </div>
          </div>
        <?php endif; ?>
        
        <?php if(!is_null($project->forks_count)): ?>
          <div>
            <div style="font-size: 1.5rem; font-weight: 600; color: var(--color-text);">
              <?php echo e($project->forks_count); ?>

            </div>
            <div style="font-size: 0.9rem; color: var(--color-text-muted);">
              🔀 Forks
            </div>
          </div>
        <?php endif; ?>
        
        <?php if(!is_null($project->watchers_count)): ?>
          <div>
            <div style="font-size: 1.5rem; font-weight: 600; color: var(--color-text);">
              <?php echo e($project->watchers_count); ?>

            </div>
            <div style="font-size: 0.9rem; color: var(--color-text-muted);">
              👁️ Watchers
            </div>
          </div>
        <?php endif; ?>
        
        <?php if(!is_null($project->updated_at_github)): ?>
          <div style="margin-left: auto;">
            <div style="font-size: 0.9rem; color: var(--color-text-muted);">
              Ultimo aggiornamento
            </div>
            <div style="font-weight: 500; color: var(--color-text);">
              <?php echo e($project->updated_at_github->diffForHumans()); ?>

            </div>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    
    <div style="display: flex; flex-wrap: wrap; gap: 1rem; margin-bottom: 3rem;">
      <?php if($project->link): ?>
        <a href="<?php echo e($project->link); ?>" 
           class="btn-primary-minimal" 
           target="_blank" 
           rel="noopener"
           style="font-size: 1rem; padding: 0.85rem 1.75rem;">
          🔗 Visita il progetto
          <span style="font-size: 1.2rem;">→</span>
        </a>
      <?php endif; ?>
      
      <?php if($project->github_url): ?>
        <a href="<?php echo e($project->github_url); ?>" 
           class="btn-minimal" 
           target="_blank" 
           rel="noopener"
           style="font-size: 1rem; padding: 0.85rem 1.75rem;">
          <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
          </svg>
          Codice GitHub
        </a>
      <?php endif; ?>
      
      <?php if($project->demo_url): ?>
        <a href="<?php echo e($project->demo_url); ?>" 
           class="btn-minimal" 
           target="_blank" 
           rel="noopener"
           style="font-size: 1rem; padding: 0.85rem 1.75rem;">
          🚀 Demo Live
        </a>
      <?php endif; ?>
    </div>

    
    <?php if($project->technologies && $project->technologies->count()): ?>
      <section style="padding: 2rem; background: var(--color-surface); border-radius: var(--radius); border: 1px solid var(--color-border);">
        <h2 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 1.5rem;">
          🛠️ Stack Tecnologico
        </h2>
        <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
          <?php $__currentLoopData = $project->technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="padding: 0.75rem 1.25rem; background: rgba(59, 130, 246, 0.1); border: 1px solid rgba(59, 130, 246, 0.3); border-radius: 8px; font-weight: 500; color: var(--color-accent);">
              <?php echo e($tech->name); ?>

            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </section>
    <?php endif; ?>

  </article>
  
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head'); ?>
<style>
  @media (max-width: 768px) {
    h1 {
      font-size: 2rem !important;
    }
  }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('guest.layouts.guest-minimal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views\guest\projects\show-minimal.blade.php ENDPATH**/ ?>