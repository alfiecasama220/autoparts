<?php $__env->startSection('title', 'Admin Register'); ?>

<?php $__env->startSection('contents'); ?>



<div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-3">
            <div class="card shadow-lg bg-dark text-light">
                <div class="card-body text-center">
                    <img src="/assets/images/logo2.png" alt="Company Logo" class="mb-4 logo">
                    <h3 class="card-title mb-4">User Registration</h3>
                    <form action="<?php echo e(route('registerPost')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark border-0 ml-1"><i class="bi bi-person-fill"></i></span>
                                </div>
                                <input type="text" class="form-control bg-light border-0 text-dark <?php if(session('error')): ?> is-invalid <?php elseif(old()): ?> is-valid <?php endif; ?>" name="name" id="name" placeholder="Name" value="<?php echo e(old('name')); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark border-0 mr-1"><i class="bi bi-envelope-fill"></i></span>
                                </div>
                                <input type="email" class="form-control bg-light text-dark <?php if(session('error') || $errors->has('email')): ?> is-invalid <?php elseif(old() && !$errors->has('email')): ?> is-valid <?php endif; ?>" name="email" id="Email" placeholder="Email" required>
                            </div>
                        </div>                  
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark border-0"><i class="bi bi-key-fill"></i></i></span>
                                </div>
                                <input type="password" class="form-control bg-light text-dark <?php if(session('error') || $errors->has('email')): ?> is-invalid <?php endif; ?>" name="password" id="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark border-0"><i class="bi bi-people-fill"></i></i></span>
                                </div>
                                <select class="custom-select bg-dark border text-light <?php if(session('error')): ?> is-invalid) is-valid <?php endif; ?>" id="roles" name="role" required>
                                    <option value="">Select Role</option>
                                    <option value="Admin">Admin</option>
                                    
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-4">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\FOR SCHOOL PURPOSES\TURTAL\autoparts\resources\views/layout/register.blade.php ENDPATH**/ ?>