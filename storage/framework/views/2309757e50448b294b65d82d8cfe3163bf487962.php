<div class="white-popup mfp-with-anim mfp-hide gmz-popup-form" id="gmz-login-popup">
    <div class="popup-inner">
        <h4 class="popup-title"><?php echo e(__('Sign In')); ?></h4>
        <div class="popup-content">
            <form class="text-left gmz-form-action account-form" action="<?php echo e(url('login')); ?>" method="POST">
                <?php echo $__env->make('Frontend::components.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="form">
                    <input type="hidden" name="isfr" value="1" />
                    <div id="username-field" class="field-wrapper input">
                        <label for="lusername"><?php echo e(__('EMAIL')); ?></label>
                        <i class="fal fa-user-alt"></i>
                        <input id="lusername" name="email" type="text" class="form-control gmz-validation" data-validation="required" placeholder="<?php echo e(__('Your email')); ?>">
                    </div>

                    <div id="password-field" class="field-wrapper input mb-2">
                        <div class="d-flex justify-content-between">
                            <label for="lpassword"><?php echo e(__('PASSWORD')); ?></label>
                            <a href="#gmz-reset-popup" class="forgot-pass-link gmz-box-popup" data-effect="mfp-zoom-in"><?php echo e(__('Forgot Password?')); ?></a>
                        </div>
                        <i class="fal fa-lock"></i>
                        <input id="lpassword" name="password" type="password" class="form-control gmz-validation" data-validation="required" placeholder="<?php echo e(__('Your password')); ?>">
                        <div class="view-password">
                            <i class="fal fa-eye view"></i>
                            <i class="fal fa-eye-slash not-view"></i>
                        </div>
                    </div>

                    <div class="gmz-message"></div>

                    <div class="d-sm-flex justify-content-between">
                        <div class="field-wrapper">
                            <button type="submit" class="btn btn-primary" value=""><?php echo e(__('LOGIN')); ?></button>
                        </div>
                    </div>

                    <?php if(is_social_login_enable('facebook') || is_social_login_enable('google')): ?>
                        <div class="division">
                            <span><?php echo e(__('OR')); ?></span>
                        </div>

                        <div class="social">
                            <?php if(is_social_login_enable('facebook')): ?>
                                <a href="<?php echo e(url('/auth/redirect/facebook')); ?>" class="btn social-fb">
                                    <i class="fab fa-facebook-f"></i>
                                    <span class="brand-name"><?php echo e(__('Facebook')); ?></span>
                                </a>
                            <?php endif; ?>
                            <?php if(is_social_login_enable('google')): ?>
                                <a href="<?php echo e(url('/auth/redirect/google')); ?>" class="btn social-github">
                                    <i class="fab fa-google"></i>
                                    <span class="brand-name"><?php echo e(__('Google')); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <p class="signup-link"><?php echo e(__('Not registered ?')); ?> <a href="#gmz-register-popup" class="gmz-box-popup" data-effect="mfp-zoom-in"><?php echo e(__('Create an account')); ?></a></p>

                </div>
            </form>
        </div>
    </div>
</div>

<div class="white-popup mfp-with-anim mfp-hide gmz-popup-form" id="gmz-register-popup">
    <div class="popup-inner">
        <h4 class="popup-title"><?php echo e(__('Sign Up')); ?></h4>
        <div class="popup-content">
            <form class="text-left gmz-form-action account-form" action="<?php echo e(url('register')); ?>" method="POST">
                <?php echo $__env->make('Frontend::components.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="form">
                    <input type="hidden" name="isfr" value="1" />
                    <div class="row">
                        <div class="col-lg-6">
                            <div id="first_name-field" class="field-wrapper input">
                                <label for="rfirst_name"><?php echo e(__('FIRST NAME')); ?></label>
                                <i class="fal fa-user-alt"></i>
                                <input id="rfirst_name" name="first_name" type="text" class="form-control gmz-validation" data-validation="required" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div id="last_name-field" class="field-wrapper input">
                                <label for="rlast_name"><?php echo e(__('LAST NAME')); ?></label>
                                <i class="fal fa-user-alt"></i>
                                <input id="rlast_name" name="last_name" type="text" class="form-control gmz-validation" data-validation="required" placeholder="Last Name">
                            </div>
                        </div>
                    </div>

                    <div id="email-field" class="field-wrapper input">
                        <label for="remail"><?php echo e(__('EMAIL')); ?></label>
                        <i class="fal fa-at"></i>
                        <input id="remail" name="email" type="text" value="" class="form-control gmz-validation" data-validation="required" placeholder="Email">
                    </div>

                    <div id="password-field" class="field-wrapper input mb-2">
                        <div class="d-flex justify-content-between">
                            <label for="rpassword"><?php echo e(__('PASSWORD')); ?></label>
                            <a href="#gmz-reset-popup" class="forgot-pass-link gmz-box-popup" data-effect="mfp-zoom-in"><?php echo e(__('Forgot Password?')); ?></a>
                        </div>
                        <i class="fal fa-lock"></i>
                        <input id="rpassword" name="password" type="password" class="form-control gmz-validation" data-validation="required" placeholder="Password">
                        <div class="view-password">
                            <i class="fal fa-eye view"></i>
                            <i class="fal fa-eye-slash not-view"></i>
                        </div>
                    </div>

                    <div class="field-wrapper terms_condition">
                        <div class="n-chk">
                            <label class="new-control new-checkbox checkbox-primary">
                                <input type="checkbox" name="agree_field" value="1" id="agree-term" class="new-control-input gmz-validation" data-validation="required">
                                <span class="new-control-indicator"></span><span><?php echo sprintf(__('I agree to the <a href="%s">  terms and conditions </a>'), get_term_link()); ?></span>
                            </label>
                        </div>

                    </div>

                    <div class="gmz-message"></div>

                    <div class="d-sm-flex justify-content-between">
                        <div class="field-wrapper">
                            <button type="submit" class="btn btn-primary" value=""><?php echo e(__('REGISTER')); ?></button>
                        </div>
                    </div>

                    <?php if(is_social_login_enable('facebook') || is_social_login_enable('google')): ?>
                        <div class="division">
                            <span><?php echo e(__('OR')); ?></span>
                        </div>

                        <div class="social">
                            <?php if(is_social_login_enable('facebook')): ?>
                                <a href="<?php echo e(url('/auth/redirect/facebook')); ?>" class="btn social-fb">
                                    <i class="fab fa-facebook-f"></i>
                                    <span class="brand-name"><?php echo e(__('Facebook')); ?></span>
                                </a>
                            <?php endif; ?>
                            <?php if(is_social_login_enable('google')): ?>
                                <a href="<?php echo e(url('/auth/redirect/google')); ?>" class="btn social-github">
                                    <i class="fab fa-google"></i>
                                    <span class="brand-name"><?php echo e(__('Google')); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <p class="signup-link"><?php echo e(__('Already have an account?')); ?> <a href="#gmz-login-popup" class="gmz-box-popup" data-effect="mfp-zoom-in"><?php echo e(__('Login')); ?></a></p>

                </div>
            </form>
        </div>
    </div>
</div>

<div class="white-popup mfp-with-anim mfp-hide gmz-popup-form" id="gmz-reset-popup">
    <div class="popup-inner">
        <h4 class="popup-title"><?php echo e(__('Password Recovery')); ?></h4>
        <div class="popup-content">
            <form class="text-left gmz-form-action account-form" action="<?php echo e(url('password/email')); ?>" method="POST">
                <?php echo $__env->make('Frontend::components.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="form">
                    <div id="email-field" class="field-wrapper input">
                        <div class="d-flex justify-content-between">
                            <label for="femail"><?php echo e(__('EMAIL')); ?></label>
                        </div>
                        <i class="fal fa-at"></i>
                        <input id="femail" name="email" type="text" class="form-control gmz-validation" data-validation="required" value="" placeholder="Email">
                    </div>

                    <div class="gmz-message"></div>

                    <div class="d-sm-flex justify-content-between pb-2">
                        <div class="field-wrapper">
                            <button type="submit" class="btn btn-primary" value=""><?php echo e(__('RESET')); ?></button>
                        </div>
                    </div>

                    <p><?php echo e(__('Enter your email and instructions will sent to you!')); ?></p>

                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Frontend/Views/components/login.blade.php ENDPATH**/ ?>