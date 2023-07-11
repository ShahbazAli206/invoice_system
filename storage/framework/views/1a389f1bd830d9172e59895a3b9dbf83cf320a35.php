
<?php $__env->startSection('name', 'Home Page'); ?>
<?php $__env->startSection('content'); ?>
    <main class="homepage">
        <?php echo $__env->make('pages.components.home.header ', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <section class="products-section">
          <div class="container">
            <h1 class="section-title">Available Restaurents</h1>

            <section class="orders-box">
              <table class="table align-items-center mb-0" id = 'myTable' style="background-color: rgb(217, 216, 221)">
                <thead style="background-color: rgb(146, 146, 180)">
                  <tr>
                    <th style="color: #050404;">Name</th>
                    <th style="color: #050404;">Image</th>
                    <th style="color: #050404;">Location (Lat,Lon)</th>
                    <th style="color: #050404;">Email</th>
                    <th style="color: #050404;">Distance (from you)</th>
                    <th style="color: #050404;">Contact No.</th>

                  </tr>
                </thead>
                <tbody>
                  <?php if($products): ?>
                  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr style="color: #050404;" onclick="window.location='<?php echo e(route('home', $product->id)); ?>';">
                    
                    <a href="<?php echo e(route('home', $product->id)); ?>">
                    <td style="color: #000000;"><?php echo e($product->name); ?></td>
                    <td>
                      <div>
                          <img src="<?php echo e(asset('storage/'. $product->profile_photo_path)); ?>" alt="img N/A" class="avatar avatar-sm me-3">
                      </div>
                      

                  </td>
                    <td style="color: #050404;"><?php echo e($product->latitude); ?> / <?php echo e($product->longitude); ?></td>
                    <td style="color: #050404;"><?php echo e($product->email); ?></td>
                    <td style="color: #050404;"><?php echo e($product->distance); ?> Km</td>
                    <td style="color: #050404;"><?php echo e($product->ph_no); ?></td>
                   

                  </a>

                  </tr>   
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  <?php else: ?>
                  <tr>
                    <td colspan="5" style="text-align: center">No Item available in Menu...</td>
                  </tr>                  
                  <?php endif; ?>
                  
                </tbody>
              </table>
              
              
            <?php
          $latitude = Auth::user()->latitude; // Your latitude value
                $longitude = Auth::user()->longitude; // Your longitude value
          ?>
                    <h5 style="color: rgb(71, 4, 229); font-weight:bold; font-size:24px ">Customer Location</h5>
                    <div style="width: 1000px; height: 200px; border: 1px solid #ccc;margin-bottom: 220px;" class="mapouter">
                    <div class="gmap_canvas">
                      <iframe width="1270" height="500" id="gmap_canvas" 
                      src="https://maps.google.com/maps?q=<?= $latitude ?>,<?= $longitude ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" 
                      frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                    </iframe>
                  </div>
                </div>
                
              </section>
              </div>
        </section>
       

   

            
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group_repo\resources\views/pages/home2.blade.php ENDPATH**/ ?>