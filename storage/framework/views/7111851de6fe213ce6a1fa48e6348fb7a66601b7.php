
<?php $__env->startSection('name', 'Account Page'); ?>
<?php $__env->startSection('content'); ?>
    <div class="account-page">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Customer Profile Picture</h5>
                    </div>
                    <div class="card-body" style="background-color: rgb(137, 130, 142)">
                        <img src="<?php echo e(asset('storage/'.Auth::user()->profile_photo_path)); ?>" alt="..." class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    
                    <div class="row" style="display: flex; justify-content: space-between;">
                      <div class=col-md-3>
                        <div class="card">
                            
                          <div class="card-header"style="min-width: 400px;">
                            <h5>Customer Information</h5>
                        </div>


                        </div>
                      </div>
                      <div class=col-md-3>
                        <div class="card">
                          <div class="user-btn">
                            <form action="<?php echo e(route('logout')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-primary">logout</button>
                              </form> 
                              <a href="<?php echo e(route('pages.profile')); ?>"><button class="btn btn-primary">Edit Profile</button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body" style="background-color: rgb(207, 197, 213)">
                        <p style="color: rgb(71, 4, 229); font-weight:bold; font-size:24px ">Name: </p> <p style="color: rgb(0, 0, 0); font-weight:bold; font-size:20px "><?php echo e(Auth::user()->name); ?></p>
                        <p style="color: rgb(71, 4, 229); font-weight:bold; font-size:24px ">Email: </p><p style="color: rgb(0, 0, 0); font-weight:bold; font-size:20px "><?php echo e(Auth::user()->email); ?></p>
                        <p style="color: rgb(71, 4, 229); font-weight:bold; font-size:24px ">Phone Number: </p><p style="color: rgb(0, 0, 0); font-weight:bold; font-size:20px "><?php echo e(Auth::user()->ph_no); ?></p>
                        <p style="color: rgb(71, 4, 229); font-weight:bold; font-size:24px ">Location: </p>
                        <p style="color: rgb(0, 0, 0); font-weight:bold; font-size:20px">Latitude: <?php echo e(Auth::user()->latitude); ?> Longitude: <?php echo e(Auth::user()->longitude); ?></p></p>
                    <?php
                $latitude = Auth::user()->latitude; // Your latitude value
                $longitude = Auth::user()->longitude; // Your longitude value
                ?>
                          <h5 style="color: rgb(71, 4, 229); font-weight:bold; font-size:24px ">Customer Location</h5>
                          <div style="width: 950; height: 200px; border: 1px solid #ccc;margin-bottom: 220px;" class="mapouter">
                          <div class="gmap_canvas">
                            <iframe width="910" height="430" id="gmap_canvas" 
                            src="https://maps.google.com/maps?q=<?= $latitude ?>,<?= $longitude ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" 
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                          </iframe>
                        </div>
                      </div>
                </div>
              </div>

            </div>
        </div>

          <section class="orders-box">
            <p class="orders-box-title" >Orders</p>
            <table class="table align-items-center mb-0" id = 'myTable' style="background-color: rgb(217, 216, 221)">
              <thead style="background-color: rgb(146, 146, 180)">
                <tr>
                  <th style="color: #050404;">Items</th>
                  <th style="color: #050404;">Total</th>
                  <th style="color: #050404;">Date</th>
                  <th style="color: #050404;">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php if(auth()->user()->orders && auth()->user()->orders->count()): ?>
                <?php $__currentLoopData = auth()->user()->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr style="color: #050404;">
                  <td style="color: #050404;"><?php echo e($order->items->count()); ?></td>
                  <td style="color: #050404;"><?php echo e($order->total / 100); ?></td>
                  <td style="color: #050404;"><?php echo e(\Carbon\Carbon::parse($order->created_at)->format('d/m/Y')); ?></td>
                  <td style="color: #050404;"><?php echo e($order->status); ?></td>
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