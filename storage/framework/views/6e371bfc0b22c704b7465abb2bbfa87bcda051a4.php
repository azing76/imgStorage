<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.pagenotfound')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

    <div class="error-page">
        <h2 class="headline text-yellow"> 403</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Accès refusé.</h3>
            <p>
                Vous n'avez pas les droits pour accéder à cette ressource.
                <?php echo e(trans('adminlte_lang::message.mainwhile')); ?> <a href='<?php echo e(url('/home')); ?>'><?php echo e(trans('adminlte_lang::message.returndashboard')); ?></a>.
                <br>
                <br>
                <br>
            </p>
            
        </div><!-- /.error-content -->
    </div><!-- /.error-page -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>