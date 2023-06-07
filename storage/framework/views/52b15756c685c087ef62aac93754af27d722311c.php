


<?php $__env->startSection('content'); ?>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/module0.png'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="<?php echo e(asset('storage/'.Auth::user()->profile_photo_path)); ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <?php echo e(Auth::user()->name); ?>

              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                <?php echo e(Auth::user()->email); ?>

              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                
                
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        
        <div class="col-12 col-xl-4"  style="width: 100%; max-width: 1200px;">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Profile Information</h6>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <p class="text-sm">
                I am,  <?php echo e(Auth::user()->name); ?> , my task is to give a gateway between both resident and technician tasks that they will perform 
              </p>
              
              <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp;<?php echo e(Auth::user()->name); ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp;  <?php echo e(Auth::user()->email); ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Admin registered at: </strong> &nbsp;  <?php echo e(Auth::user()->email_verified_at); ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Phone Number:</strong> &nbsp;  <?php echo e(Auth::user()->ph_no); ?></li>
                <li class="list-group-item border-0 ps-0 pb-0">
                </li>
              </ul>
            </div>
          </div>
        </div>
        
        
      </div>
      <?php echo $__env->make('layouts.footers.auth.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.user_type.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group_repo\resources\views/profile.blade.php ENDPATH**/ ?>