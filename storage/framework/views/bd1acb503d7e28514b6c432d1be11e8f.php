

<?php $__env->startSection('page-title', 'Modifica Progetti'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="h4 mb-1">✏️ Modifica Progetti</h2>
      <p class="text-muted mb-0">Modifica rapidamente titolo, immagine e link dei progetti pubblicati</p>
    </div>
    <span class="badge bg-info"><?php echo e($projects->total()); ?> progetti</span>
  </div>

  <?php if(session('project_updated')): ?>
    <div class="alert alert-success alert-dismissible fade show">
      ✓ Progetto <strong><?php echo e(session('project_updated')); ?></strong> aggiornato con successo!
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <div class="row g-3">
    <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div class="col-12 col-md-6 col-xl-4">
        <div class="card h-100 shadow-sm position-relative">
          
          
          <div class="position-absolute top-0 end-0 m-2" style="z-index: 10;">
            <?php if($p->is_featured): ?>
              <span class="badge bg-warning text-dark me-1">⭐ Featured</span>
            <?php endif; ?>
            <?php if($p->is_published): ?>
              <span class="badge bg-success">👁️ Pubblicato</span>
            <?php else: ?>
              <span class="badge bg-secondary">🔒 Draft</span>
            <?php endif; ?>
          </div>
          
          
          <?php if($p->image_url): ?>
            <div class="card-img-top ratio ratio-16x9 overflow-hidden bg-light position-relative">
              <img src="<?php echo e($p->image_url); ?>" class="w-100 h-100 object-fit-cover" alt="<?php echo e($p->title); ?>" id="img-preview-<?php echo e($p->id); ?>">
              <div class="position-absolute bottom-0 start-0 end-0 p-2 bg-dark bg-opacity-75">
                <button type="button" class="btn btn-sm btn-light w-100" data-bs-toggle="modal" data-bs-target="#editImageModal<?php echo e($p->id); ?>">
                  🖼️ Cambia Immagine
                </button>
              </div>
            </div>
          <?php else: ?>
            <div class="card-img-top ratio ratio-16x9 bg-secondary d-flex align-items-center justify-content-center">
              <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#editImageModal<?php echo e($p->id); ?>">
                🖼️ Aggiungi Immagine
              </button>
            </div>
          <?php endif; ?>
          
          <div class="card-body">
            
            
            <?php if($p->technologies && $p->technologies->count()): ?>
              <div class="d-flex gap-1 flex-wrap mb-2">
                <?php $__currentLoopData = $p->technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <span class="badge bg-info text-dark"><?php echo e($tech->name); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php endif; ?>
            
            
            <?php if($p->type): ?>
              <div class="mb-2">
                <span class="badge bg-primary"><?php echo e($p->type->name); ?></span>
              </div>
            <?php endif; ?>
            
            
            <div class="mb-3">
              <button type="button" class="btn btn-link p-0 text-start w-100 text-decoration-none" data-bs-toggle="modal" data-bs-target="#editTitleModal<?php echo e($p->id); ?>">
                <h3 class="h5 card-title mb-0 text-dark">
                  <?php echo e($p->title); ?>

                  <small class="text-muted ms-1">✏️</small>
                </h3>
              </button>
            </div>
            
            
            <?php if($p->description): ?>
              <p class="card-text text-muted small mb-2 line-clamp-3"><?php echo e($p->description); ?></p>
            <?php endif; ?>
            
            
            <?php if(!is_null($p->stargazers_count) || !is_null($p->forks_count)): ?>
              <div class="mb-3 small text-muted">
                <?php if(!is_null($p->stargazers_count)): ?>
                  <span class="me-2">⭐ <?php echo e($p->stargazers_count); ?></span>
                <?php endif; ?>
                <?php if(!is_null($p->forks_count)): ?>
                  <span>🔀 <?php echo e($p->forks_count); ?></span>
                <?php endif; ?>
              </div>
            <?php endif; ?>
            
            
            <div class="d-flex gap-2 flex-wrap">
              <button type="button" class="btn btn-sm btn-primary flex-fill" data-bs-toggle="modal" data-bs-target="#editLinkModal<?php echo e($p->id); ?>">
                🔗 <?php echo e($p->link ? 'Modifica Link' : 'Aggiungi Link'); ?>

              </button>
              <a href="<?php echo e(route('projects.show', $p->slug)); ?>" class="btn btn-sm btn-outline-secondary" target="_blank">
                👁️ Vedi
              </a>
            </div>
            
            <?php if($p->link): ?>
              <div class="mt-2">
                <small class="text-muted d-block text-truncate">
                  🔗 <a href="<?php echo e($p->link); ?>" target="_blank" class="text-decoration-none"><?php echo e($p->link); ?></a>
                </small>
              </div>
            <?php endif; ?>
            
          </div>
          
        </div>
      </div>
      
      
      <div class="modal fade" id="editTitleModal<?php echo e($p->id); ?>" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" action="<?php echo e(route('admin.projects.quick-update', $p)); ?>">
              <?php echo csrf_field(); ?>
              <?php echo method_field('PATCH'); ?>
              <input type="hidden" name="field" value="title">
              <div class="modal-header">
                <h5 class="modal-title">✏️ Modifica Titolo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Titolo progetto</label>
                  <input type="text" name="title" class="form-control" value="<?php echo e($p->title); ?>" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <button type="submit" class="btn btn-primary">Salva</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      
      <div class="modal fade" id="editImageModal<?php echo e($p->id); ?>" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" action="<?php echo e(route('admin.projects.quick-update', $p)); ?>">
              <?php echo csrf_field(); ?>
              <?php echo method_field('PATCH'); ?>
              <input type="hidden" name="field" value="image_url">
              <div class="modal-header">
                <h5 class="modal-title">🖼️ Modifica Immagine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">URL Immagine</label>
                  <input type="url" name="image_url" class="form-control" value="<?php echo e($p->image_url); ?>" placeholder="https://...">
                  <div class="form-text">Inserisci l'URL completo dell'immagine</div>
                </div>
                <?php if($p->image_url): ?>
                  <div class="mb-3">
                    <label class="form-label">Anteprima attuale:</label>
                    <div class="ratio ratio-16x9 border rounded overflow-hidden">
                      <img src="<?php echo e($p->image_url); ?>" class="w-100 h-100 object-fit-cover" alt="Preview">
                    </div>
                  </div>
                <?php endif; ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <button type="submit" class="btn btn-primary">Salva</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      
      <div class="modal fade" id="editLinkModal<?php echo e($p->id); ?>" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" action="<?php echo e(route('admin.projects.quick-update', $p)); ?>">
              <?php echo csrf_field(); ?>
              <?php echo method_field('PATCH'); ?>
              <input type="hidden" name="field" value="link">
              <div class="modal-header">
                <h5 class="modal-title">🔗 Modifica Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Link progetto</label>
                  <input type="url" name="link" class="form-control" value="<?php echo e($p->link); ?>" placeholder="https://...">
                  <div class="form-text">Link esterno al progetto (es. GitHub repo, demo, sito)</div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <button type="submit" class="btn btn-primary">Salva</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <div class="col-12">
        <div class="alert alert-info">
          <strong>ℹ️ Nessun progetto trovato.</strong>
          <p class="mb-0 mt-2">Inizia importando progetti da GitHub o creandone di nuovi.</p>
        </div>
      </div>
    <?php endif; ?>
  </div>

  
  <?php if($projects->hasPages()): ?>
    <div class="mt-4">
      <?php echo e($projects->links()); ?>

    </div>
  <?php endif; ?>
  
</div>

<?php $__env->startPush('head'); ?>
<style>
  .line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  
  .object-fit-cover {
    object-fit: cover;
  }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\laravel_portfolio\resources\views/admin/projects/cards.blade.php ENDPATH**/ ?>