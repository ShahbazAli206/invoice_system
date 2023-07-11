
<?php $__env->startSection('name', '<?php echo e($product->title); ?>'); ?>
<?php $__env->startSection('content'); ?>
     <?php if(session()->has('addedToCart')): ?>
         <section class="pop-up">
            <div class="pop-up-box">
                <div class="pop-up-title">
                <?php echo e(session()->get('addedToCart')); ?>

            </div>
            <div class="pop-up-actions">
                
                <a href="<?php echo e(route('cart')); ?>" class="btn btn-primary">order confirmation !</a>
            </div>
        </div>
         </section>
     <?php endif; ?>
    <div class="product-page">
        <div class="container">
            <div class="product-page-row">
                <section class="product-page-image">
                    <img src="<?php echo e(asset('storage/'.$product->image)); ?>" alt="" style="max-width: 80%; max-height: 350px;">
                </section>
                <section class="product-page-details">
                    <p class="p-title"><?php echo e($product->title); ?></p>
                    <p style="color: rgb(23, 23, 28); font-size: 22px; font-weight: bold;">Visit Charges:</p>
                    <?php if(isset($product->price)): ?>
                    <p class="p-price"> <?php echo e($product->price); ?></p>
                    <?php endif; ?>    
                    <p style="color: rgb(23, 23, 28); font-size: 22px; font-weight: bold;">Category:</p>
                   
                    <?php if(isset($product['category']['name'])): ?>
                    <?php $categoryName = $product['category']['name']; ?>
                    <p class="p-category"><?php echo e($categoryName); ?></p>

                    <?php echo e($categoryName); ?> <br>
                <?php endif; ?>
                    <p style="color: rgb(23, 23, 28); font-size: 22px; font-weight: bold;">Description:</p>
                    <p class="p-description"> <?php echo e($product->description); ?></p>

                    <form action="<?php echo e(route('addToCart',$product->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="p-form">
                            <div class="p-colors">
                                <label for="color">Availability</label>
                                <select name="color" id="color" required>
                                    <option value="">-- Select Timing --</option>
                                    <?php $__currentLoopData = $product->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($color->id); ?>"><?php echo e($color->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="p-quantity">
                                <label for="quantity">No. of Task</label>
                                <input type="number"name="quantity" min="1" max="100" value=1 required>
                            </div>
                        </div>
                        <div class="row mb-3">

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label style="color: rgb(23, 23, 28); font-size: 22px; font-weight: bold;" for="description">Description</label>
                                    <textarea name="description" id="description" cols="80" rows="5" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is_invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Write Some Description about order ..."></textarea>
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
                          </div> 
                        <button type="submit" class="btn btn-cart"> Order Now</button>
                    </form>

                </section>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group_repo\resources\views/pages/product.blade.php ENDPATH**/ ?>