<?php $__env->startSection('content'); ?>

<body>

    <div class="content">
        <div style="text-align:center;padding:170px;">
            <br><br><br><br><br>
            <h1 style="font-size:250px">Q</h1>
        </div>
    </div>

    <div class="bottom">
        <form action="<?php echo e(route('sendmail')); ?>" method="post">
            <input type="email" name="mail" placeholder="mail address">
            <input type="text" name="title" placeholder="message">
            <button type="submit">Send Mail</button>
            <?php echo e(csrf_field()); ?>

        </form>
    </div>

<?php echo $__env->yieldContent('content'); ?>

</body>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>