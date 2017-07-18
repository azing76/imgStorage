<?php $__env->startSection('htmlheader_title'); ?>
	Modifier l'image
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
	Modifier l'image
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

				<div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"></h3>
                        <div class="box-tools pull-right">
                            
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
											<form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('images.update',$image)); ?>" enctype="multipart/form-data">
												<?php echo e(csrf_field()); ?>


												
    										<input type="hidden" name="_method" value="put">

												<div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
														<label for="title" class="col-md-4 control-label">Titre</label>

														<div class="col-md-6">
																<input id="title" type="text" class="form-control" name="title" value="<?php echo e($image->title); ?>" required autofocus>

																<?php if($errors->has('title')): ?>
																		<span class="help-block">
																				<strong><?php echo e($errors->first('title')); ?></strong>
																		</span>
																<?php endif; ?>
														</div>
												</div>

												<div class="form-group<?php echo e($errors->has('content') ? ' has-error' : ''); ?>">
														<label for="content" class="col-md-4 control-label">Description</label>
														<div class="col-md-6">
																<input id="content" type="textarea" class="form-control" name="content" value="<?php echo e($image->content); ?>"  >

																<?php if($errors->has('content')): ?>
																		<span class="help-block">
																				<strong><?php echo e($errors->first('content')); ?></strong>
																		</span>
																<?php endif; ?>
														</div>


														<div class="form-group">
															<div class="col-md-6 col-md-offset-4">
																<img src="/img/imageDB/<?php echo e($image->user_id); ?>/<?php echo e($image->picture); ?>" alt="<?php echo e($image->content); ?>" style="padding-top:10px;" class="img-rounded img-responsive center-block">
															</div>
														</div>

														<div class="form-group">
															<div class="col-md-6 col-md-offset-4">
                                <?php if($image->public): ?>
                                  <div class="radio">
  																	<label><input type="radio" name="public" value="0" >Privée</label>
  																</div>
  																<div class="radio">
  																	<label><input type="radio" name="public" value="1" checked>Publique</label>
  																</div>
  															</div>
                              <?php else: ?>
                                <div class="radio">
                                  <label><input type="radio" name="public" value="0" checked>Privée</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="public" value="1" >Publique</label>
                                </div>
                              </div>
                              <?php endif; ?>



														</div>
												</div>

												<div class="form-group">
														<div class="col-md-6 col-md-offset-4">
																<button type="submit" class="btn btn-primary">
																		Modifier
																</button>
														</div>
												</div>
										</form>
                    </div>
                    <!-- /.box-body -->
                </div>

			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>