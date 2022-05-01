<?php $__env->startComponent('mail::message'); ?>
# This is mail to reset your Secure account application.

Reset your password Useing below button.

<?php $__env->startComponent('mail::button', ['url' => 'http://localhost:4200/response-password-reset?token='.$token]); ?>
Reset Password
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH /home/gurukiran/Desktop/forget and reset/Secure/resources/views/Email/passwordReset.blade.php ENDPATH**/ ?>