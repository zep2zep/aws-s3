<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-center align-items-center container" style="height: 100vh;">
        <!-- Background Image -->
        <img id="background" class="absolute left-0 top-2 h-full w-full object-cover"
            src="<?php echo e(Storage::disk('s3')->url('img/background.svg')); ?>" alt="SS3Laravel background" />

        <div class="row w-100 justify-content-center position-relative" style="z-index: 1;">
            <div class="col-md-8">
                <h2 class="mb-4 text-center text-white">📜 Log Accessi</h2>

                <!-- Pulsante Reset con Spaziatura -->
                <div class="mb-3 text-center">
                    <form action="<?php echo e(url('reset.log')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger btn-lg px-4 py-2">🔄 Reset Log Accessi</button>
                    </form>
                </div>

                <!-- Tabella Log Accessi -->
                <div class="card opacity-75 shadow-lg">
                    <div class="card-body">
                        <div style="max-height: 400px; overflow-y: auto;"> <!-- ✅ Aggiunto il contenitore scrollabile -->
                            <table class="table-bordered bg-light table text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Ora di accesso</th>
                                        <th>Indirizzo IP</th>
                                        <th>Browser</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($log->id); ?></td>
                                            <td><?php echo e($log->timestamp); ?></td>
                                            <td><?php echo e($log->ip_address); ?></td>
                                            <td><?php echo e(Str::before($log->browser, '/')); ?></td>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\PRJ\Laravel\aws-s3\resources\views/log_accessi.blade.php ENDPATH**/ ?>