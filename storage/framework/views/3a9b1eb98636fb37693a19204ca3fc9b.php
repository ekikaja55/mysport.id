<?php $__env->startSection('title', 'Edit Course'); ?>

<?php $__env->startSection('content'); ?>
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
        <div class="card-header">
            <h4 class="mb-0 text-primary fs-1 fw-bold">Edit Materi</h4>
        </div>
        <form action="<?php echo e(route('materi.update', $materi->id_materi)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="mb-3">
                <label for="course_name" class="form-label">Materi Name</label>
                <input type="text" class="form-control" id="course_name" name="name_materi"
                    value="<?php echo e(old('name_materi', $materi->name_materi)); ?>" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="desc_materi" rows="4" required><?php echo e(old('desc_course', $materi->desc_materi)); ?></textarea>
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

            <button type="submit" class="btn btn-primary">Update Materi</button>
            <a href="<?php echo e(route('materi.view')); ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <style>
        .container {
            animation: slideUp 1s ease-in-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(100%);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

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

<?php echo $__env->make('template.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\LARAVEL\jobsheet_week11_rizkiarkant\resources\views/admin_view/materi/edit.blade.php ENDPATH**/ ?>