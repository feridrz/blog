<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100;1,300;1,400&display=swap"
        rel="stylesheet">
    <title>Document</title>
</head>
<style>
    <?php echo $__env->make('assets.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</style>

<?php if(isset($_SESSION['error_message'])): ?>
    <script>alert("<?php echo e($_SESSION['error_message']); ?>")</script>
    <?php unset($_SESSION['error_message']); ?>
<?php endif; ?>

<?php if(isset($_SESSION['success_message'])): ?>
    <script>alert("<?php echo e($_SESSION['success_message']); ?>")</script>
    <?php unset($_SESSION['success_message']); ?>
<?php endif; ?>

<body>
<?php /**PATH /Users/faridrzayev/Desktop/packs 2/app/views/template/header.blade.php ENDPATH**/ ?>