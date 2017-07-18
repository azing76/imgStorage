<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <?php if(! Auth::guest()): ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo e(Gravatar::get($user->email)); ?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?php echo e(Auth::user()->name); ?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(trans('adminlte_lang::message.online')); ?></a>
                </div>
            </div>
        <?php endif; ?>

        <!-- search form (Optional) -->
        
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="<?php echo e(isActiveRoute('images.index')); ?>"><a href="<?php echo e(route('images.index')); ?>"><i class='fa fa-home'></i> <span><?php echo e(trans('adminlte_lang::message.home')); ?></span></a></li>
            <li class="<?php echo e(isActiveRoute('images.create')); ?>"><a href="<?php echo e(route('images.create')); ?>"><i class='fa fa-upload'></i> <span>Uploader une image</span></a></li>
            <li class="<?php echo e(isActiveRoute('public')); ?>"><a href="<?php echo e(route('public')); ?>"><i class='fa fa-search'></i> <span>Explorer</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
