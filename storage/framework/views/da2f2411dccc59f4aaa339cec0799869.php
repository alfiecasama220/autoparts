<?php $__env->startSection('title', 'Admin Login'); ?>

<?php $__env->startSection('contents'); ?>

<div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-3">
            <div class="card shadow-lg bg-dark text-light">
                <div class="card-body text-center">
                    <img src="/assets/images/logo2.png" alt="Company Logo" class="mb-4 logo">
                    <h3 class="card-title mb-4">Admin Login</h3>
                    <form action="<?php echo e(route('loginPost')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark border-0"><i class="fas fa-envelope text-light"></i></span>
                                </div>
                                <input type="email" class="form-control border-0 text-dark" name="email" id="email" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark border-0"><i class="fas fa-lock text-light"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control border-0 text-dark" id="password" placeholder="Password">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-dark border-0">
                                        <input type="checkbox" id="showPassword">
                                        <label class="form-check-label text-light mb-0" for="showPassword">Show Password</label>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-4">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\FOR SCHOOL PURPOSES\TURTAL\autoparts\resources\views/layout/index.blade.php ENDPATH**/ ?>