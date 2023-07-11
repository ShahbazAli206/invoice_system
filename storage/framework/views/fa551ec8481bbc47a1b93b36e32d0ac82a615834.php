
<?php $__env->startSection('content'); ?>

<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>View the Orders and change there status to Accept</strong>
        </span>
    </div>

    <div class="row">
        <div class="col-12">
                        <table class="table align-items-center mb-0" id = 'myTable' style="background-color: rgb(65, 54, 147)" >
                            <tbody>
                                <div class="container">
                                    <div class="row mb-5">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Update Order</h5>
                                                </div>
                                                <div class="card-body">
                                                    <form action="<?php echo e(route('technicianpanel.status.update',$order->id)); ?>" method="POST" enctype="multipart/form-data">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>

                                                        <div class="row mb-3">
                                  
                                                        <div class="row mb-3">
                                  
                                                          <div class="col-md-6">
                                                              <div class="form-group mb-3">
                                                                  <label for="category_id" style="color: rgb(0, 0, 0); font-size: 22px;">Status</label>
                                                                  <select name="status" id="status" class="form-control style="color: rgb(0, 0, 0); font-size: 18px;" <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                                      <option value="" style="color: rgb(0, 0, 0); font-size: 18px;">Select Option</option>
                                                                      <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                          <option value="<?php echo e($status); ?>" <?php echo e(old('category_id') == $status ? 'selected' : ''); ?> style="color: rgb(0, 0, 0); font-size: 18px;"><?php echo e($status); ?></option>       
                                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                               
                                                                  </select>
                                                                  <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                      <span class="invalid-feedback">
                                                                          <strong><?php echo e($message); ?></strong>
                                                                      </span>                                   
                                                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                  
                                                              </div> 
                                                          </div>
                                  
                                  
                                  
                                                         <div class="row mb-3">
                                  
                                                          <div class="col-md-6">
                                                                  <label for="description" style="color: rgb(0, 0, 0); font-size: 22px;">Description (note)</label>
                                                                  <textarea name="note" id="note" cols="60" rows="10" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is_invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Description about Order status ........" style="color: rgb(0, 0, 0); font-size: 18px;"></textarea>
                                                                  <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                      <span class="invalid-feedback">
                                                                          <strong><?php echo e($message); ?></strong>
                                                                      </span>                                   
                                                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                                                             
                                                          </div>
                                                        </div>
                                                        <div class="form-group text-end">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                  
                                    </div>
                                          </div>
                            </tbody>
                        </table>
                    </div>
               
    </div>
</div>
 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.technician', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group_repo\resources\views/technician/pages/view.blade.php ENDPATH**/ ?>