<section class="tour-type">
	<div class="container py-40">
		<div class="text-center">
			<h2 class="section-title mb-20">
				<i class="fas fa-map-marker-alt color-pri"></i>
				POPULARTOP DESTINATIONS IN TANZANIA
			</h2>
			<p class="lead mb-4">Popular tourist places and destinations in Tanzania that should be on your must visit list when you travel to Tanzania </div>
		<?php
			$dests = \App\Models\Destination::take(4)->get();
		?>
		<div class="row">
			<?php $__currentLoopData = $dests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-lg-3 col-md-4 col-6">
					<div class="tour-type__item" data-plugin="matchHeight">
						<div class="tour-type__thumbnail">
							<a href="<?php echo e(route('destination.show', $dest->slug)); ?>">

								<style>
								.my_img{
										max-width: 100%;
										min-width: 100%;
										min-height: 250px;
										object-fit: cover;
										height: auto;
								}
								</style>
								<img class="_image-tour my_img" src="<?php echo e(asset('destinations/'.$dest->photo)); ?>" alt="Destination" >
							</a>
						</div>
						<div class="tour-type__info">
							<h3 class="tour-type__name"><a href="#"><?php echo e($dest->title); ?></a></h3>
							
						</div>
					</div>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>

	<div class="d-flex align-items-center col-lg-12 mt-4 mb-2">
		<div class="mx-auto">
			<a class="btn btn-primary px-3" href="<?php echo e(route('destination')); ?>"><?php echo e(__('VIEW All DESTINATIONS')); ?></a>
		</div>
	</div>
</section>

<?php /**PATH C:\xampp\htdocs\nfz\tanzania\app\Modules/Frontend/Views/page/home/destination.blade.php ENDPATH**/ ?>