
<?php $__env->startSection('name', 'Account Page'); ?>
<?php $__env->startSection('content'); ?>
    <div class="account-page">
        <div class="container">
          <section class="u-box">
            <div class="user-info">
              <p class="user-name">
                <?php echo e(Auth::user()->name); ?>

              </p>
              <p class="user-email">
                <?php echo e(Auth::user()->email); ?>

              </p>
              <p class="user-ph_no">
                <?php echo e(Auth::user()->ph_no); ?>

              </p>
              <img src="<?php echo e(asset('storage/'.Auth::user()->profile_photo_path)); ?>" alt="..." style="width: 250px; border-radius:5" >
            </div>
            
            <div class="user-btn">
              <form action="<?php echo e(route('logout')); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <button class="btn btn-primary">logout</button>
                </form> 
                <a href="<?php echo e(route('pages.profile')); ?>"><button class="btn btn-primary">Edit Profile</button></a>
            </div>
          </section>
          <section class="orders-box">
            <p class="orders-box-title">Orders</p>
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Items</th>
                  <th>Total</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php if(auth()->user()->orders && auth()->user()->orders->count()): ?>
                <?php $__currentLoopData = auth()->user()->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($order->id); ?></td>
                  <td><?php echo e($order->items->count()); ?></td>
                  <td><?php echo e($order->total / 100); ?></td>
                  <td><?php echo e(\Carbon\Carbon::parse($order->created_at)->format('d/m/Y')); ?></td>
                  <td><?php echo e($order->status); ?></td>
                </tr>   
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                <?php else: ?>
                <tr>
                  <td colspan="5" style="text-align: center">No Orders...</td>
                </tr>                  
                <?php endif; ?>
                
              </tbody>
            </table>
          </section>
            
             
         
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group_repo\resources\views/pages/account.blade.php ENDPATH**/ ?>