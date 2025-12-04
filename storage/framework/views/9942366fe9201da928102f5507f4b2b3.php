

<?php $__env->startSection('title', 'Profilo Utente'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Il mio Profilo</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Nome</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php echo e($user->name); ?>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php echo e($user->email); ?>

                    </div>
                </div>
                <hr>
                <?php if($user->bio): ?>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Bio</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php echo e($user->bio); ?>

                    </div>
                </div>
                <hr>
                <?php endif; ?>
                <?php if($user->github_username): ?>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">GitHub</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <a href="https://github.com/<?php echo e($user->github_username); ?>" target="_blank">
                            <?php echo e($user->github_username); ?>

                        </a>
                    </div>
                </div>
                <hr>
                <?php endif; ?>
                <?php if($user->linkedin_username): ?>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">LinkedIn</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <a href="https://linkedin.com/in/<?php echo e($user->linkedin_username); ?>" target="_blank">
                            <?php echo e($user->linkedin_username); ?>

                        </a>
                    </div>
                </div>
                <hr>
                <?php endif; ?>
                <div class="row">
                    <div class="col-sm-12">
                        <?php if($user->is_admin): ?>
                            <a class="btn btn-primary" href="<?php echo e(route('admin.profile.edit')); ?>">
                                Modifica Profilo (Admin)
                            </a>
                        <?php endif; ?>
                        
                        <!-- Password Update Form -->
                        <div class="mt-4">
                            <h5>Modifica Password</h5>
                            <form method="POST" action="<?php echo e(route('password.update')); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                                
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Password Attuale</label>
                                    <input type="password" class="form-control <?php $__errorArgs = ['current_password', 'updatePassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="current_password" name="current_password" required>
                                    <?php $__errorArgs = ['current_password', 'updatePassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="password" class="form-label">Nuova Password</label>
                                    <input type="password" class="form-control <?php $__errorArgs = ['password', 'updatePassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="password" name="password" required>
                                    <?php $__errorArgs = ['password', 'updatePassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Conferma Nuova Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                </div>
                                
                                <button type="submit" class="btn btn-success">Aggiorna Password</button>
                            </form>
                        </div>
                        
                        <!-- Account Deletion Form -->
                        <div class="mt-4">
                            <h5 class="text-danger">Zona Pericolosa</h5>
                            <form method="POST" action="<?php echo e(route('profile.destroy')); ?>" onsubmit="return confirm('Sei sicuro di voler eliminare il tuo account? Questa azione è irreversibile.')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                
                                <div class="mb-3">
                                    <label for="password_deletion" class="form-label">Conferma Password per Eliminazione</label>
                                    <input type="password" class="form-control <?php $__errorArgs = ['password', 'userDeletion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="password_deletion" name="password" required>
                                    <?php $__errorArgs = ['password', 'userDeletion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                
                                <button type="submit" class="btn btn-danger">Elimina Account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/profile/show.blade.php ENDPATH**/ ?>