<div class="modal fade hotel-enquiry-modal" id="hotelEnquiryModal" tabindex="-1" aria-labelledby="hotelEnquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="gmz-form-action enquiry-form-single" action="<?php echo e(url('hotel-send-enquiry')); ?>" method="POST">
            <div class="modal-header">
                <h5 class="modal-title" id="hotelEnquiryModalLabel"><?php echo e(__('ENQUIRY FORM')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <input type="hidden" name="post_id" value="<?php echo e($post['id']); ?>"/>
                    <input type="hidden" name="post_hashing" value="<?php echo e(gmz_hashing($post['id'])); ?>"/>
                    <?php echo $__env->make('Frontend::components.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="form-group">
                        <label for="full-name"><?php echo e(__('Full Name')); ?><span class="required">*</span> </label>
                        <input type="text" name="full_name"  class="form-control gmz-validation" data-validation="required" id="full-name"/>
                    </div>
                    <div class="form-group">
                        <label for="email"><?php echo e(__('Email')); ?><span class="required">*</span></label>
                        <input type="text" name="email"  class="form-control gmz-validation" data-validation="required" id="email"/>
                    </div>
                    <div class="form-group">
                        <label for="content"><?php echo e(__('Message')); ?><span class="required">*</span> </label>
                        <textarea name="content" rows="4" class="form-control gmz-validation" data-validation="required" id="content"></textarea>
                    </div>
                    <div class="gmz-message"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('CLOSE')); ?></button>
                <button type="submit" class="btn btn-primary"><?php echo e(__('SUBMIT REQUEST')); ?></button>
            </div>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/services/hotel/single/modal-enquiry.blade.php ENDPATH**/ ?>