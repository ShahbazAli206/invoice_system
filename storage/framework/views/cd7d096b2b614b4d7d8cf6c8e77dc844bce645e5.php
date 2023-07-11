

<?php $__env->startSection('content'); ?>

<div>
    
    <h1 class="page-title">All Order</h1>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4 p-3">
                <div class="card-header pb-0">
                    
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" style="background-color: rgb(106, 94, 115)"  id = 'myTable'>
                            <thead>
                                <tr>
                                    <th>Customer name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>address</th>
                                    <th>Note</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($order->name); ?></td>
                                    <td style="max-width: 120px; overflow-x: auto; white-space: nowrap;"><?php echo e($order->email); ?></td>
                                    <td><?php echo e($order->phone); ?></td>

                                    <td style="max-width: 120px; overflow-x: auto; white-space: nowrap;"><?php echo e($order->address); ?></td>
                                    <td style="max-width: 200px; overflow: auto;"><?php echo e($order->note); ?></td>
                                    <td>
                                        <span class="badge bg-<?php if($order->status == 'accepted'): ?> success
                                             <?php endif; ?>
                                            ">
                                            <?php echo e($order->status); ?>

                                        </span>
                                    </td>
                                   
                                    <td>
                                         <div class="d-flex mt-2" style="gap: 5px">
                                            <a href="<?php echo e(route('technicianpanel.pages.view',$order->id)); ?>" class="btn btn-secondary">View</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
<?php $__env->stopSection(); ?>





















































































<?php echo $__env->make('layouts.technician', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group_repo\resources\views/technician/pages/dashboard.blade.php ENDPATH**/ ?>