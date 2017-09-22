<?php $__env->startSection('content'); ?>
    <h1>Profile Management</h1>
    <!--
    <a href="<?php echo e(url('posts')); ?>" class="btn btn-success"> Template</a>
        -->

    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip Code</th>
            <th>Phone Number</th>
            <th>Company Name</th>
            <th>User Name</th>
            <th colspan="3"> You can </th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($post->id); ?></td>
                <td><?php echo e($post->first_name); ?></td>
                <td><?php echo e($post->last_name); ?></td>
                <td><?php echo e($post->address); ?></td>
                <td><?php echo e($post->city); ?></td>
                <td><?php echo e($post->state); ?></td>
                <td><?php echo e($post->zip_code); ?></td>
                <td><?php echo e($post->phone_number); ?></td>
                <td><?php echo e($post->company_name); ?></td>
                <td><?php echo e($post->user_name); ?></td>
                <td><a href="<?php echo e(route('posts.edit',$post->id)); ?>" class="btn btn-warning">Update</a></td>


            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>