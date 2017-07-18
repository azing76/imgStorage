<?php $__env->startSection('htmlheader_title'); ?>
    Register
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<body class="hold-transition register-page">
    <div id="app" v-cloak>
        <div class="register-box">
            <div class="register-logo">
                <a href="<?php echo e(url('/home')); ?>"><b>Img</b>Storage</a>
            </div>

            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> <?php echo e(trans('adminlte_lang::message.someproblems')); ?><br><br>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="register-box-body">
                <p class="login-box-msg"><?php echo e(trans('adminlte_lang::message.registermember')); ?></p>

                <register-form></register-form>

                

                <a href="<?php echo e(url('/login')); ?>" class="text-center"><?php echo e(trans('adminlte_lang::message.membreship')); ?></a>
            </div><!-- /.form-box -->
        </div><!-- /.register-box -->
    </div>

    <?php echo $__env->make('adminlte::layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('adminlte::auth.terms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>