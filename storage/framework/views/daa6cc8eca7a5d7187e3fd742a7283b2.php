<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
          <span class="fw-semibold"><?php echo e(__('Login')); ?></span>

          <?php if(Route::has('register')): ?>
            <a href="<?php echo e(route('register')); ?>" class="btn btn-light btn-sm text-dark fw-semibold">
              <?php echo e(__('Register')); ?>

            </a>
          <?php endif; ?>
        </div>

        <div class="card-body p-4">
          <?php if(session('status')): ?>
            <div class="alert alert-success mb-4"><?php echo e(session('status')); ?></div>
          <?php endif; ?>

          <?php if($errors->any()): ?>
            <div class="alert alert-danger mb-4" role="alert">
              <?php echo e($errors->first('email') ?? $errors->first('password')); ?>

            </div>
          <?php endif; ?>

          <form method="POST" action="<?php echo e(route('login')); ?>" novalidate>
            <?php echo csrf_field(); ?>

            <div class="mb-3">
              <label for="email" class="visually-hidden">Email</label>
              <input
                id="email"
                type="email"
                name="email"
                class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                value="<?php echo e(old('email')); ?>"
                required
                autocomplete="email"
                placeholder="email"
                aria-label="Email"
                autofocus
              >
              
            </div>

            <div class="mb-3">
              <label for="password" class="visually-hidden">Password</label>
              <input
                id="password"
                type="password"
                name="password"
                class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                required
                autocomplete="current-password"
                placeholder="password"
                aria-label="Password"
              >
              
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Ricordami</label>
              </div>

              <?php if(Route::has('password.request')): ?>
                <a class="link-secondary small" href="<?php echo e(route('password.request')); ?>">
                  Password dimenticata?
                </a>
              <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary w-100">
              <?php echo e(__('Log in')); ?>

            </button>
          </form>
        </div>

        
      </div>

      <div class="text-center mt-3">
        <a href="<?php echo e(route('home')); ?>" class="link-secondary small">← Torna al portfolio</a>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/auth/login.blade.php ENDPATH**/ ?>