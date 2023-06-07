

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header"><?php echo e(__('')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                            
                        </div>
                        
                    <?php endif; ?>
                    <div class="text-primary" style="font-size: 30px">
                        
                    <?php echo e(__('Your email has been verified')); ?>

                   
        
                
                    </div>
                    <br>
                    <button class="btn btn-info"><a href="<?php echo e(route('technicianpanel')); ?>" style="color:rgb(19, 39, 147)">Go straight into Portal</a></button>
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group_repo\resources\views/home.blade.php ENDPATH**/ ?>