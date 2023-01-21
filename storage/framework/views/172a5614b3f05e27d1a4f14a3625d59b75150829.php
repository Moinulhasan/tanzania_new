<?php
    admin_enqueue_styles('gmz-dropzone');
    admin_enqueue_scripts('gmz-dropzone');
?>
<div class="modal fade gmz-media-modal" id="gmzMediaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <?php echo $__env->make('Backend::components.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <?php echo e(__('Media')); ?>

                    <button type="button" class="btn btn-primary btn-sm btn-addnew"><?php echo e(__('Add new')); ?></button>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
                <div id="gmz-media-add-new" class="gmz-media-upload-area">
                    <form action="<?php echo e(dashboard_url('upload-new-media')); ?>" method="post" class="gmz-dropzone"
                          id="gmz-upload-form" enctype="multipart/form-data">
                        <?php echo $__env->make('Backend::components.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <input type="hidden" name="is_modal" value="1" />
                        <div class="fallback">
                            <input name="file" type="file" multiple/>
                        </div>
                        <div class="dz-message text-center needsclick">
                            <i data-feather="upload-cloud"></i>
                            <h3><?php echo e(__('Drop files here or click to upload.')); ?></h3>
                            <p class="text-muted">
                                <span><?php echo e(__('Only JPG, PNG, JPEG, SVG, GIF files types are supported.')); ?></span>
                                <span><?php echo e(sprintf(__('Maximum file size is %s MB.'), admin_config('max_file_size'))); ?></span>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <div class="d-flex align-items-center justify-content-between w-100">
                    <button type="button" class="btn btn-danger btn-delete ml-2" data-url="<?php echo e(dashboard_url('bulk-delete-media-item')); ?>"><?php echo e(__('Delete')); ?></button>
                    <span>&nbsp;</span>
                    <div class="mr-4">
                        <button class="btn btn-close" data-dismiss="modal"><i class="flaticon-cancel-12"></i> <?php echo e(__('Close')); ?></button>
                        <button type="button" class="btn btn-primary btn-select"><?php echo e(__('Select')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/components/modal.blade.php ENDPATH**/ ?>