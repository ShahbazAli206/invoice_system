

<?php $__env->startSection('content'); ?>
<style>
    .dropdown-toggle-no-caret::after {
    display: none !important;
}
</style>
<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>All Invoice are here!</strong>
        </span>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4 p-3">
                <div class="card-header pb-0" style="background-color: rgb(248, 252, 251)">
                    <div class="mb-3 d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0" style="font-size: 24px"> </h5>
                        </div>
                        <a href="<?php echo e(route('adminpanel.Invoices.create')); ?>" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp;Add New Invoice</a>
                    </div>
                    <a class="btn bg-light mx-2" href="<?php echo e(route('adminpanel.Invoices')); ?>" onclick="updateStatus('All')">All</a>
                    <a class="btn bg-light mx-2" href="<?php echo e(route('adminpanel.Invoices')); ?>" onclick="updateStatus('Sent')">Sent</a>
                    <a class="btn bg-light mx-2" href="<?php echo e(route('adminpanel.Invoices')); ?>" onclick="updateStatus('Unpaid')">Unpaid</a>
                    <a class="btn bg-light mx-2" href="<?php echo e(route('adminpanel.Invoices')); ?>" onclick="updateStatus('Draft')">Draft</a>


<script>
    function updateStatus(status) {
        $.ajax({
            url: "<?php echo e(route('adminpanel.Invoices.update')); ?>",
            type: "POST",
            data: {
                _method: "PUT",
                _token: "<?php echo e(csrf_token()); ?>",
                status: status
            },
            success: function(response) {
                // Handle the success response
                console.log('Status updated successfully');
            },
            error: function(error) {
                // Handle the error response
                console.error('Status update failed');
            }
        });
    }
</script>

                </div>
                <div class="card-header pb-0">
                    <div class="mb-3 d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Invoice</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id = 'myTable'>
                            <thead>
                                <tr>
                                   
                                    <th class="text-center  text-uppercase text-secondary text-xxs font-weight-bolder">
                                      <h6>DATE</h6>  
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                        <h6>NUMBER</h6>
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                        <h6>CUSTOMER</h6>
                                    </th>
                                   
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                        <h6>STATUS</h6>
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                        <h6>AMOUNT DUE</h6>
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                        
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                        <h6>TOTAL</h6>
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                        <h6>ACTION</h6>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $prroducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    
                                    
                                    <td class="text-center">
                                        <?php echo e(\Carbon\Carbon::parse($product->date)->format('d/m/Y')); ?>

                                    </td>
                                    
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0"><?php echo e($product->invoice_no); ?></p>
                                    </td>

                                    <td  class="text-center">
                                        <p class="text-xs font-weight-bold mb-0"><?php echo e($product->cust_name); ?></p>
                                    </td>

                                    <td class="text-center">
                                       <p class="text-xs font-weight-bold mb-0"><?php echo e($product->status); ?></p>
                                    </td>

                                    <td class="text-center">
                                       <p class="text-xs font-weight-bold mb-0"><?php echo e($product->ttotal); ?></p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0"><?php echo e($product->amount_status); ?></p>
                                     </td>

                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0"><?php echo e($product->ttotal); ?></p>
                                    </td>



                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle dropdown-toggle-no-caret" type="button" id="actionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                ...
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="actionsDropdown">
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href=<?php echo e(route('adminpanel.Invoices.updateStatus', ['invoiceId' => $product->id])); ?>>Mark as Sent</a></li>
                                                <li><a class="dropdown-item" href="#">View</a></li>
                                            </ul>
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
<?php echo $__env->make('layouts.user_type.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Invoice_system\resources\views/laravel-examples/Invoices/Invoices.blade.php ENDPATH**/ ?>