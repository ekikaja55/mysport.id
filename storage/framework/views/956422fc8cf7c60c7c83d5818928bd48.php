<?php $__env->startSection('title', 'Add New Course'); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/home.css')); ?>">
    <?php if($errors->any()): ?>
        <div id="error-message" class="alert alert-danger" role="alert">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="container mt-4">
        <div class="card border-0 shadow">
            <div class="card-header">
                <h4 class="mb-0 text-primary fs-1 fw-bold">Add New Materi</h4>
            </div>
            <div class="card-body">


                <form action="<?php echo e(route('materi.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="name_materi" class="form-label">Materi Name</label>
                        <input type="text" class="form-control" id="name_materi" name="name_materi" required>
                    </div>
                    <div class="mb-3">
                        <label for="desc_materi" class="form-label">Materi Description</label>
                        <textarea class="form-control" id="desc_materi" name="desc_materi" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="id_course" class="form-label">Select Course</label>
                        <select class="form-control" id="id_course" name="id_course" required>
                            <option value="" disabled selected>-- Choose a Course --</option>
                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($course->id_course); ?>"><?php echo e($course->name_course); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Materi</button>
                    <a href="<?php echo e(route('materi.view')); ?>" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <style>
        #error-message {
            left: 0;
            right: 0;
            z-index: -9999;
            animation: slideInDown 0.5s ease-out forwards;
        }

        @keyframes slideInDown {
            0% {
                transform: translateY(-100%);
            }

            100% {
                transform: translateY(0);
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\LARAVEL\jobsheet_week11_rizkiarkant\resources\views/admin_view/materi/create.blade.php ENDPATH**/ ?>