
<?php $__env->startSection('title', 'Edit Profile'); ?>
<?php $__env->startSection('content'); ?>
<h1 class="page-title">Edit/Update Menu Items</h1>
<div class="container" >
    <div class="row" >
        <div class="col-12" >
            <div class="card mb-4 mx-4 p-3" style="background-color: rgb(172, 245, 221)">
                <div class="card-header pb-0" style="background-color: rgb(172, 245, 221)">
                    <div class="mb-3 d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0" style="font-size: 24px"> Notifications</h5>
                        </div>
                        <a href="<?php echo e(route('mark-as-read')); ?>" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp;Mark All as Read </a>
                    </div>
                </div>
                <ul>
                    <li class="nav-item dropdown">
                        
                    
                                    <?php $__currentLoopData = auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                                    <form action="<?php echo e(route('mark-read', $notification->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="data" value="<?php echo e($notification->data['data']); ?>">
                                        <input type="hidden" name="dataa" value="<?php echo e($notification->id); ?>">
            
                                        <button type="submit" style="color: #cf2222; font-size: 16px; width: auto; border-radius: 5px; background-color: #4CAF50; padding: 5px; margin-bottom: 20px; cursor: pointer;"><?php echo e($notification->data['data']); ?></button>
                                    </form>
                                   
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            
            
                                    <?php
                                        $admin_id_list = [1, 2, 35]; // Manually define the admin IDs
                                    ?>
                                    <?php $__currentLoopData = \App\Models\Notification::where('notifiable_id', 'IN', $admin_id_list)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($notification->data['data']); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            
            
            
                                    <?php $__currentLoopData = auth()->user()->readNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li style="color: #171515; font-size: 16px; width: auto; border-radius: 5px; padding: 5px 5px; margin-bottom: 20px;"> <?php echo e($notification->data['data']); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </li>
            </div>
        </div>
    </div>
    
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.technician', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group_repo\resources\views/technician/pages/notifications.blade.php ENDPATH**/ ?>