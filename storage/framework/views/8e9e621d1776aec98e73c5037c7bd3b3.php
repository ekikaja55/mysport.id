<?php $__env->startSection('title', 'Course List'); ?>

<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('css/admin/view.css')); ?>" rel="stylesheet">
    <div class="container mt-4">
        <div class="card border-0 shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-primary fs-1 fw-bold">Course List</h4>

                <a href="<?php echo e(route('admin.create')); ?>" class="btn btn-primary">
                    Add New Course
                </a>
            </div>
            <div class="card-body">
                <p class="lead text-muted">Berikut adalah daftar kursus yang tersedia:</p>

                <?php if($course->count() > 0): ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($c->name_course); ?></td>
                                    <td><?php echo e($c->created_at); ?></td>
                                    <td><?php echo e($c->updated_at); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#descriptionModal<?php echo e($c->id_course); ?>">
                                            View Description
                                        </button>

                                        <div class="modal fade" id="descriptionModal<?php echo e($c->id_course); ?>" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-primary"><?php echo e($c->name_course); ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo e($c->desc_course); ?>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="<?php echo e(route('admin.edit', $c->id_course)); ?>"
                                            class="btn btn-sm btn-outline-primary">Edit</a>
                                        <form action="<?php echo e(route('admin.destroy', $c->id_course)); ?>" method="POST"
                                            style="display:inline;">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-muted">No courses available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>


    <?php if(session('success')): ?>
        <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success">Success</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php echo e(session('success')); ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <script>
        window.onload = function() {
            <?php if(session('success')): ?>
                var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                myModal.show();
            <?php endif; ?>
        };
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\LARAVEL\jobsheet_week11_rizkiarkant\resources\views/admin_view/view.blade.php ENDPATH**/ ?>