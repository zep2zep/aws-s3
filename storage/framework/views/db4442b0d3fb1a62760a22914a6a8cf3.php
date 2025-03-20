<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-center align-items-center container" style="height: 100vh;">
        <!-- Background Image -->
        <img id="background" class="absolute left-0 top-2 h-full w-full object-cover"
            src="<?php echo e(Storage::disk('s3')->url('img/background.svg')); ?>" alt="SS3Laravel background" />

        <div class="row w-100 justify-content-center position-relative" style="z-index: 1;">
            <div class="col-md-6">
                <h2 class="mb-4 text-center text-white">🔍 Test Connessione ai Database</h2>

                <!-- Messaggi di Successo / Errore -->
                <?php if(session('success')): ?>
                    <div class="alert alert-success text-center"><?php echo e(session('success')); ?></div>
                <?php endif; ?>
                <?php if(session('error')): ?>
                    <div class="alert alert-danger text-center"><?php echo e(session('error')); ?></div>
                <?php endif; ?>

                <!-- Card per Database PRIMARIO -->
                <div class="card mb-3 opacity-75 shadow-lg">
                    <div class="card-body text-center">
                        <h4 class="mb-3">Database PRIMARIO</h4>
                        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(str_contains($result['message'], 'PRIMARIO')): ?>
                                <p
                                    class="<?php echo e($result['status'] === '✅ Connessione riuscita' ? 'text-success fw-bold' : 'text-danger fw-bold'); ?>">
                                    <?php echo $result['message']; ?>

                                </p>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <!-- Card per Database SECONDARIO -->
                <div class="card opacity-75 shadow-lg">
                    <div class="card-body text-center">
                        <h4 class="mb-3">Database SECONDARIO</h4>
                        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(str_contains($result['message'], 'SECONDARIO')): ?>
                                <p
                                    class="<?php echo e($result['status'] === '✅ Connessione riuscita' ? 'text-success fw-bold' : 'text-danger fw-bold'); ?>">
                                    <?php echo $result['message']; ?>

                                </p>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\PRJ\Laravel\aws-s3\resources\views/testconn.blade.php ENDPATH**/ ?>