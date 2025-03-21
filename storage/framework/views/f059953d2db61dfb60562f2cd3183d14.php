<?php $__env->startSection('content'); ?>
    <div class="relative h-screen w-screen">
        <img id="background" class="absolute left-0 top-0 h-full w-full object-cover"
            src="<?php echo e(Storage::disk('s3')->url('img/my-bg.jpg')); ?>" alt="My background" />
        <!-- Success message -->
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <?php if(session('success')): ?>
                <div class="d-flex justify-content-center">
                    <div class="alert alert-success d-flex justify-content-between align-items-center mt-4"
                        style="width:400px; border: 2px solid red;">
                        <?php echo session('success'); ?>

                        <!-- Bottone per rimuovere il messaggio -->
                        <button id="close-message" class="btn btn-danger btn-sm ml-5">Clear</button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div
            class="relative flex min-h-screen flex-col items-center justify-between selection:bg-[#FF2D20] selection:text-white">
            <!-- Testo sovrapposto centrato -->
            <div class="absolute inset-0 flex h-full w-full flex-col items-center justify-center text-center">
                <h1 class="mb-4 text-4xl text-white">Ciao mondo!</h1>
                <p class="text-lg text-white">
                    Benvenuti nel mio angolo virtuale di caos creativo, <br>
                    dove il buon senso fa spesso una pausa caffè e l'arguzia è l'unica moneta accettata.<br>
                    <span class="mt-2 text-sm text-gray-400">[V0.1.0 del 2025-03-21]</span>
                </p>
            </div>
            <!-- Footer in basso -->
            <footer class="text-smtext-white mt-auto w-full py-1 text-center">
                Laravel v<?php echo e(Illuminate\Foundation\Application::VERSION); ?> (PHP v<?php echo e(PHP_VERSION); ?>)
                <br>
                <p>By @sestapertica</p>
            </footer>
        </div>
    </div>
    <script>
        document.getElementById('close-message').addEventListener('click', function() {
            // Nasconde il messaggio di successo
            this.parentElement.remove();
            // Ricarica la pagina
            location.reload();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\PRJ\Laravel\aws-s3\resources\views/home.blade.php ENDPATH**/ ?>