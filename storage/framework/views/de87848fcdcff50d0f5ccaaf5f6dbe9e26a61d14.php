


<?php $__env->startSection('title', 'confirmed'); ?>
<?php $__env->startSection('content'); ?>
<h1 class="page-title">Technician Profile</h1>
<div class="container">
    <div class="text-end mb-5">
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>Technician Profile Picture</h5>
                </div>
                <div class="card-body" style="background-color: rgb(137, 100, 162)">
                    <img src="<?php echo e(asset('storage/'.Auth::user()->profile_photo_path)); ?>" alt="..." class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h5>Technician Information</h5>
                </div>
                <div class="card-body" style="background-color: rgb(137, 100, 162)">
                    <p style="color: purple" class="text-primary">Name: <?php echo e(Auth::user()->name); ?></p>
                    <p style="color: purple">Email: <?php echo e(Auth::user()->email); ?></p>
                    <p style="color: purple">Phone Number: <?php echo e(Auth::user()->ph_no); ?></p>
                    <div class="d-flex mt-2">
                        <a href="<?php echo e(route('technicianpanel.pages.profile')); ?>"><button class="btn btn-primary">Edit Profile</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.technician', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group_repo\resources\views/technician/pages/introduction.blade.php ENDPATH**/ ?>