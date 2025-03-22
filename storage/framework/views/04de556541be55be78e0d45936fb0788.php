<?php $__env->startSection('content'); ?>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
            /* Evita lo scroll non voluto */
        }

        #background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            z-index: -1;
            /* Manda l'immagine dietro i contenuti */
        }
    </style>

    <!-- Sfondo -->
    <img id="background" src="<?php echo e(Storage::disk('s3')->url('img/background.svg')); ?>" alt="SS3Laravel background">

    <!-- Contenitore centrato -->
    <div class="h-100 d-flex align-items-center justify-content-center container">
        <div class="col-md-4">
            <div class="card border-primary mt-4 border-2 bg-transparent">
                <h2 class="mb-4 mt-2 text-center text-xl font-semibold text-white">Cambia Password</h2>
                <?php if(session('success')): ?>
                    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                <?php endif; ?>
                <form method="POST" action="<?php echo e(route('password.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3 mt-3 px-3">
                        <label class="text-white">Password attuale</label>
                        <input type="password" class="form-control bg-dark border-light text-white" name="current_password"
                            required>
                        <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-danger"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3 px-3">
                        <label class="text-white">Nuova Password</label>
                        <input type="password" class="form-control bg-dark border-light text-white" name="new_password"
                            required>
                    </div>
                    <div class="mb-3 px-3">
                        <label class="text-white">Conferma Nuova Password</label>
                        <input type="password" class="form-control bg-dark border-light text-white"
                            name="new_password_confirmation" required>
                    </div>
                    <div class="d-flex justify-content-center py-3">
                        <button type="submit" class="btn btn-success">Aggiorna Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\PRJ\Laravel\aws-s3\resources\views/auth/passwords/change.blade.php ENDPATH**/ ?>