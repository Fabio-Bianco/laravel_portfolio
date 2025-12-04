<div class="card">
    <div class="card-header"><?php echo e(__('Profile Information')); ?></div>

    <div class="card-body">
        <form
            id="send-verification"
            class="d-none"
            method="post"
            action="<?php echo e(route('verification.send')); ?>"
        >
            <?php echo csrf_field(); ?>
        </form>
        <form method="POST" action="<?php echo e(route('profile.update')); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('patch'); ?>

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">
                    <?php echo e(__('Name')); ?>

                </label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name', $user->name)); ?>" required autofocus autocomplete="name">

                    <?php $__errorArgs = ['name'];
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
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">
                    <?php echo e(__('Email')); ?>

                </label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email', $user->email)); ?>" required autocomplete="email">

                    <?php $__errorArgs = ['email'];
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

                    <?php if($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail()): ?>
                        <div class="mt-2">
                            <p class="mb-0">
                                <?php echo e(__('Your email address is unverified.')); ?>


                                <button form="send-verification" class="btn btn-link p-0">
                                    <?php echo e(__('Click here to re-send the verification email.')); ?>

                                </button>
                            </p>

                            <?php if(session('status') === 'verification-link-sent'): ?>
                                <div class="alert alert-success mt-3 mb-0" role="alert">
                                    <?php echo e(__('A new verification link has been sent to your email address.')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        <?php echo e(__('Save')); ?>

                    </button>
                    <?php if(session('status') === 'profile-updated'): ?>
                        <span class="m-1 fade-out"><?php echo e(__('Saved.')); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
</div>
<?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views\profile\partials\update-profile-information-form.blade.php ENDPATH**/ ?>