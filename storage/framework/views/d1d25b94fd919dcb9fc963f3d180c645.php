<div class="card">
    <div class="card-header"><?php echo e(__('Delete Account')); ?></div>

    <div class="card-body">
        <div class="mb-3">
            <?php echo e(__('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.')); ?>

        </div>

        <div class="row mb-0">
            <div class="col-md-6">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                    <?php echo e(__('Delete Account')); ?>

                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteAccountModalLabel">
            <?php echo e(__('Are you sure you want to delete your account?')); ?>

        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <?php echo e(__('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.')); ?>

        </div>
        <form id="deleteAccountForm" method="post" action="<?php echo e(route('profile.destroy')); ?>" class="p-6">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>

            <div>
                <input type="password" class="form-control <?php $__errorArgs = ['password', 'userDeletion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="<?php echo e(__('Password')); ?>" required>

                <?php $__errorArgs = ['password', 'userDeletion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <?php echo e(__('Cancel')); ?>

        </button>
        <button type="submit" class="btn btn-danger" form="deleteAccountForm">
            <?php echo e(__('Delete Account')); ?>

        </button>
      </div>
    </div>
  </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <?php $shouldOpenModal = $errors->userDeletion->isNotEmpty(); ?>

    <script>
        let shouldOpenModal = <?php echo e(Js::from($shouldOpenModal)); ?>;

        if (shouldOpenModal) {
            window.addEventListener('load', function() {
                let deleteAccountModal = new bootstrap.Modal('#deleteAccountModal');
                deleteAccountModal.toggle();
            });
        }
    </script>
<?php $__env->stopPush(); ?><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views\profile\partials\delete-user-form.blade.php ENDPATH**/ ?>