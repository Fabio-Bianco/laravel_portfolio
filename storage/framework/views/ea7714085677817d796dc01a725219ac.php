<?php $__env->startSection('title', 'Verifica Email'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifica indirizzo email</div>

                <div class="card-body">
                    <?php if(session('status') == 'verification-link-sent'): ?>
                        <div class="alert alert-success" role="alert">
                            Abbiamo inviato un nuovo link di verifica all'indirizzo email fornito.
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        Grazie per la registrazione! Prima di iniziare, verifica il tuo indirizzo email cliccando sul link che ti abbiamo inviato. Se non hai ricevuto l'email, puoi richiedere un nuovo invio.
                    </div>

                    <form class="d-inline" method="POST" action="<?php echo e(route('verification.send')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                            Invia di nuovo l'email di verifica
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/auth/verify-email.blade.php ENDPATH**/ ?>