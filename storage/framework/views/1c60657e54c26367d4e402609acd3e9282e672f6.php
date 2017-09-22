<?php $__env->startSection('content'); ?>
    <h1>Update Profile</h1>
    <?php echo Form::model($post,['method' => 'PATCH','route'=>['posts.update',$post->id]]); ?>

    <div class="form-group">
        <?php echo Form::label('First Name', 'First Name:'); ?>

        <?php echo Form::text('first_name',null,['class'=>'form-control']); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('Last Name', 'Last Name:'); ?>

        <?php echo Form::text('last_name',null,['class'=>'form-control']); ?>


        <div class="form-group">
            <?php echo Form::label('Address', 'Address:'); ?>

            <?php echo Form::text('address',null,['class'=>'form-control']); ?>

        </div>
        <div class="form-group">
            <?php echo Form::label('City', 'City:'); ?>

            <?php echo Form::text('city',null,['class'=>'form-control']); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('State', 'State:'); ?>

            <?php echo Form::text('state',null,['class'=>'form-control']); ?>

        </div>
        <div class="form-group">
            <?php echo Form::label('Zip Code', 'Zip Code:'); ?>

            <?php echo Form::text('zip_code',null,['class'=>'form-control']); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('Phone Number', 'Phone Number:'); ?>

            <?php echo Form::text('phone_number',null,['class'=>'form-control']); ?>

        </div>
        <div class="form-group">
            <?php echo Form::label('Company Name', 'Company Name:'); ?>

            <?php echo Form::text('company_name',null,['class'=>'form-control']); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('User Name', 'User Name:'); ?>

            <?php echo Form::text('user_name',null,['class'=>'form-control']); ?>

        </div>

    </div>
    <div class="form-group">
        <?php echo Form::submit('Update', ['class' => 'btn btn-primary']); ?>

        <?php echo Form::submit('Cancel', ['class' => 'btn btn-primary']); ?>


        <h3> Thank You!!!</h3>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>