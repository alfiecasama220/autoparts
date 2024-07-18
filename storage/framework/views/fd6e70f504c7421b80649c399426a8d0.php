<?php use \Illuminate\Support\Facades\Vite; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    
</head>
<body class="dashboard">
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
    <div id="toast-container" class="toast-container" aria-live="polite" aria-atomic="true">
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

    <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    <div class="container-fluid">
        
        <div class="row">

            <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
            <?php echo $__env->yieldContent('contents'); ?>

    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>

    <script>
        function showToast() {
            const toast = document.getElementById('toast');
            const toastContainer = document.getElementById('toast-container');

            toast.classList.add('show');

            setTimeout(() => {
                toast.classList.remove('show');
                toastContainer.classList.add('hide');
            }, 3000);
        }

        function trigger() {
            showToast();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</body>
</html>
<?php /**PATH D:\FOR SCHOOL PURPOSES\TURTAL\autoparts\resources\views/admin/app.blade.php ENDPATH**/ ?>