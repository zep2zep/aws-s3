<!DOCTYPE html>
<html>

<head>
    <title>Test Connessione Database</title>
</head>

<body>
    <h2>📡 Risultati Test Connessione</h2>

    <ul>
        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo $result['status']; ?> - <?php echo $result['message']; ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <hr>
    <p>📅 Data e ora: <?php echo e(now()); ?></p>
    <p><strong>📍 IP Address:</strong> <?php echo e($ipAddress); ?></p>
    <p><strong>🖥️ Browser:</strong> <?php echo e($browser); ?></p>

    <p>🔍 Questo test è stato eseguito automaticamente per verificare la connessione ai database.</p>
</body>

</html>
<?php /**PATH C:\PRJ\Laravel\aws-s3\resources\views/emails/test_connection.blade.php ENDPATH**/ ?>