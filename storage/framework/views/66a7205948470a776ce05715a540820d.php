 

<?php $__env->startSection('title','Dashboard b_bot Portfolio'); ?>

<?php $__env->startSection('content'); ?>
<h1>Dashboard Admin</h1>

<p>Gestisci i tuoi progetti:</p>

<ul>
    <li><a href="<?php echo e(route('admin.projects.create')); ?>">Aggiungi progetto</a></li>
    <li><a href="<?php echo e(route('admin.projects.index')); ?>">Lista progetti</a></li>
</ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views\admin\dashboard.blade.php ENDPATH**/ ?>