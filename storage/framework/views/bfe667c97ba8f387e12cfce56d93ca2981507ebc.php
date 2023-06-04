
<?php $__env->startSection('content'); ?>

<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>View the Orders and change there status to Accept</strong>
        </span>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4 p-3">
                <div class="card-header pb-0">
                    
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id = 'myTable' style="background-color: rgb(90, 88, 245)" >
                            <tbody>
                                <tr>
                                    <td>Order Id</td>
                                    <td><?php echo e($order->id); ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                    <form action="<?php echo e(route('technicianpanel.status.update',$order->id)); ?>" method="post" enctype="multipart/form-data" style="display: flex; gap: 15px; max-width: 300px">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <select name="status" id=""class="form-control" >
                                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($status); ?>" <?php if($order->status == $status): ?> selected <?php endif; ?>><?php echo e($status); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Amount<br> (Approximated Charges)</td>
                                    <td><?php echo e($order->total); ?></td>
                                </tr>
                                <tr>
                                    <td>User</td>
                                    <td><?php echo e($order->name); ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo e($order->email); ?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td><?php echo e($order->phone); ?></td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td><?php echo e($order->country); ?></td>
                                </tr>
                                <tr>
                                    <td>State</td>
                                    <td><?php echo e($order->state); ?></td>
                                </tr>
                                <tr>
                                    <td>City/td>
                                    <td><?php echo e($order->city); ?></td>
                                </tr>
                                <tr>
                                    <td>Zip Code</td>
                                    <td><?php echo e($order->zip); ?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><?php echo e($order->address); ?></td>
                                </tr>
                                <tr>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.technician', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GBS-10-5-2023\resources\views/technician/pages/view.blade.php ENDPATH**/ ?>