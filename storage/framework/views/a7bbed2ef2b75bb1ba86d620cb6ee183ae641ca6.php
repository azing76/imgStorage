<?php $__env->startSection('htmlheader_title'); ?>
	Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
	Timeline
	<div class="btn-group">
		<button type="button" class="btn btn-default"><a href="<?php echo e(route('images.index')); ?>">Trier par</a></button>
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" >
			<span class="caret"></span>
			<span class="sr-only">Toggle Dropdown</span>
		</button>
		<ul class="dropdown-menu" role="menu">
			<li><a href="<?php echo e(route('images.index', array('order' => 'date') )); ?>"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>Date</a></li>
			<li><a href="<?php echo e(route('images.index', array('order' => 'title') )); ?>"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>Nom</a></li>
			<li><a href="<?php echo e(route('images.index', array('order' => 'size') )); ?>"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i>Taille</a></li>
			<li><a href="<?php echo e(route('images.index', array('order' => 'random') )); ?>"><i class="fa fa-random" aria-hidden="true"></i>Aléatoire</a></li>
		</ul>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
	<link href="<?php echo e(asset('/css/modal-image.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>



	<div class="row">

		<?php $__currentLoopData = $imagesPrivate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="nav-tabs-custom col-md-3" style='margin-left:10px'>
				<!-- Tabs within a box -->
				<ul class="nav nav-tabs pull-right">
					<li class="pull-right">
						<button type="button" class="btn btn-box-tool" onclick="window.location='<?php echo e(route('images.edit',$image)); ?>';" ><i class="fa fa-wrench"></i></button>
						<button type="button" class="btn btn-box-tool" onclick="event.preventDefault(); document.getElementById('delete-form-<?php echo e($image->id); ?>').submit();"><i class="fa fa-times"></i></button>
					</li>
					<li><a href="#img-content-<?php echo e($image->user_id); ?>-<?php echo e($image->title); ?>" data-toggle="tab">Détails</a></li>
					<li class="active"><a href="#img-image-<?php echo e($image->user_id); ?>-<?php echo e($image->title); ?>" data-toggle="tab">Image</a></li>
					<li class="pull-left header"><i class="fa fa-photo"></i> <?php echo e(str_limit($image->title,6)); ?></li>
				</ul>
				<div class="tab-content no-padding">
					<!-- Morris chart - Sales -->
					<div class="tab-pane active" id="img-image-<?php echo e($image->user_id); ?>-<?php echo e($image->title); ?>" style="position: relative; height:270px;">
						<div style="padding-top:5px;">
						</div>
						<img src="/img/imageDB/<?php echo e($image->user_id); ?>/<?php echo e($image->picture); ?>" alt="<?php echo e($image->content); ?>" id="myImg" class="img-rounded img-responsive center-block myImg">
					</div>
					<div class="tab-pane" id="img-content-<?php echo e($image->user_id); ?>-<?php echo e($image->title); ?>" style="position: relative; height:270px;">
						<blockquote >
						  <p><?php echo e($image->content); ?></p>
						  <footer> by <cite title="auteur"><?php echo e($image->user->name); ?></cite></footer>
						</blockquote>
						<footer>Ajoutée <?php echo e($image->created_at->diffForHumans()); ?></footer>
					</div>
				</div>

			</div>


			<form id="delete-form-<?php echo e($image->id); ?>" action="<?php echo e(route('images.destroy',$image)); ?>" method="POST" style="display:none">
	      <?php echo e(csrf_field()); ?>

	      <input type="hidden" name="_method" value="delete">
	    </form>
	    <!-- /.nav-tabs-custom -->
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		<!-- Trigger the Modal -->
		

		<!-- The Modal -->
		<div id="myModal" class="modal">

			<!-- The Close Button -->
			<span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

			<!-- Modal Content (The Image) -->
			<img class="modal-content" id="img01">

			<!-- Modal Caption (Image Text) -->
			<div id="caption"></div>
		</div>


	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	
	<script type="text/javascript">
	// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = $('.myImg');
var modalImg = $("#img01");
var captionText = document.getElementById("caption");
$('.myImg').click(function(){
    modal.style.display = "block";
    var newSrc = this.src;
    modalImg.attr('src', newSrc);
    captionText.innerHTML = this.alt;
});

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>