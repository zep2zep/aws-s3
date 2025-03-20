<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Test Connessioni</title>
</head>

<body>
    <h2>🖧 Report Test Connessioni</h2>
    <ul>
        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><strong><?php echo e($result['status']); ?></strong> - <?php echo $result['message']; ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <p>📅 Data e ora: <?php echo e(now()); ?></p>
</body>

</html>
<?php /**PATH C:\PRJ\Laravel\aws-s3\resources\views/emails/test_connection.blade.php ENDPATH**/ ?>