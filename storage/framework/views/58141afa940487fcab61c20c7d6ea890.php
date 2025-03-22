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

        .btn-link.text-white {
            color: white !important;
            text-decoration: none;
        }

        .btn-link.text-white:hover {
            color: red !important;
            text-decoration: underline;
        }
    </style>

    <!-- Sfondo -->
    <img id="background" src="<?php echo e(Storage::disk('s3')->url('img/background.svg')); ?>" alt="SS3Laravel background">

    <!-- Contenitore centrato -->
    <div class="h-100 d-flex align-items-center justify-content-center container">
        <div class="col-md-4">
            <div class="card border-primary mt-4 border-2 bg-transparent">
                <div class="card-header mt-4 border-0 text-center text-white">
                    <?php echo e(__('Register-Auth')); ?>

                </div>
                <div class="card-body text-white">

                    <?php if(session('success')): ?>
                        <div class="alert alert-success text-center">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <button class="btn btn-danger btn-sm mt-2" onclick="clearErrors()">Clear Errors</button>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('registerUser')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label class="text-white" for="name">Nome</label>
                            <input type="text" class="form-control bg-dark border-light text-white" id="name"
                                name="name" value="<?php echo e(old('name')); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="text-white" for="email">Email</label>
                            <input type="email" class="form-control bg-dark border-light text-white" id="email"
                                name="email" value="<?php echo e(old('email')); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="text-white" for="password">Password</label>
                            <input type="password" class="form-control bg-dark border-light text-white" id="password"
                                name="password">
                        </div>
                        <div class="mb-3">
                            <label class="text-white" for="password_confirmation">Conferma Password</label>
                            <input type="password" class="form-control bg-dark border-light text-white"
                                id="password_confirmation" name="password_confirmation">
                        </div>

                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary" type="submit">Registrati</button>
                            <a href="<?php echo e(url('/')); ?>" class="btn btn-secondary">Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function clearErrors() {
            location.reload(); // Ricarica la pagina per pulire gli errori
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\PRJ\Laravel\aws-s3\resources\views/auth/register.blade.php ENDPATH**/ ?>