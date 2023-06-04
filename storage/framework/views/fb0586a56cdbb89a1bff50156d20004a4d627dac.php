<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Welcome <?php echo e($user->name); ?></h1>
    <h1> You are succefully registered as a 
        <?php if($user->role === '1'): ?>
            Resident
            
        <?php elseif($user->role === '2'): ?>
            Admin
        <?php elseif($user->role === '3'): ?>
            Technician
        <?php endif; ?>
    </h1>
    <p>Your Email is:  &nbsp; <?php echo e($user->email); ?></p>
    <p>Your Name is:  <?php echo e($user->name); ?></p>
    
</body>
</html><?php /**PATH C:\xampp\htdocs\GBS-10-5-2023\resources\views/emails/welcome.blade.php ENDPATH**/ ?>