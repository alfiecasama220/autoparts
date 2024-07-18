<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    
    <link rel="stylesheet" href="styles.css">
    <?php echo app('Illuminate\Foundation\Vite')('resources\css\app.css'); ?>;
</head>
<body class="auth-bg">



        <?php if(session('error')): ?>
            <script>
                window.addEventListener('load', function (event) {
                    trigger();
                }) 
            </script>
        <?php elseif(session('success') || $errors->has('email')): ?>
            <script>
                window.addEventListener('load', function (event) {
                    trigger();
                }) 
            </script>
        
        <?php endif; ?>

    
    
    <!-- Toast Container -->
    <div class="toast-container" aria-live="polite" aria-atomic="true">
        <div id="toast" class="toast toast-success
        
        <?php if(session('error') || $errors->has('email')): ?>
            bg-danger
        <?php else: ?>
            bg-success
            
        <?php endif; ?>
        
        " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body text-light">

                <?php if(session('error')): ?>
                    <?php echo e(session('error')); ?>

                <?php elseif(session('success')): ?>
                    <?php echo e(session('success')); ?>

                <?php else: ?>
                    <?php echo e($errors->first('email')); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php echo $__env->yieldContent('contents'); ?>



    <?php echo app('Illuminate\Foundation\Vite')('resources\js\app.js'); ?>

    <script>
        function showToast() {
            const toast = document.getElementById('toast');

            toast.classList.add('show');

            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        function trigger() {
            showToast();
        }
    </script>
</body>
</html>
<?php /**PATH D:\FOR SCHOOL PURPOSES\TURTAL\autoparts\resources\views/layout/app.blade.php ENDPATH**/ ?>