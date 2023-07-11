<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   
<div class="container">
    <h1>we get your ip : <?php echo e($ip); ?>, location details against this ip are ;</h1>
    <div class="card">
        <div class="card-body">
            <?php if($currentUserInfo): ?>
                <h4>IP: <?php echo e($currentUserInfo->ip); ?></h4>
                <h4>Country Name: <?php echo e($currentUserInfo->countryName); ?></h4>
                <h4>Country Code: <?php echo e($currentUserInfo->countryCode); ?></h4>
                <h4>Region Code: <?php echo e($currentUserInfo->regionCode); ?></h4>
                <h4>Region Name: <?php echo e($currentUserInfo->regionName); ?></h4>
                <h4>City Name: <?php echo e($currentUserInfo->cityName); ?></h4>
                <h4>Zip Code: <?php echo e($currentUserInfo->zipCode); ?></h4>
                <h4>Latitude: <?php echo e($currentUserInfo->latitude); ?></h4>
                <h4>Longitude: <?php echo e($currentUserInfo->longitude); ?></h4>
            <?php endif; ?>
        </div>
    </div>
</div>
   
</body>
</html><?php /**PATH C:\xampp\htdocs\group_repo\resources\views/user.blade.php ENDPATH**/ ?>