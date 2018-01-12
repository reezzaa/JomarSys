<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jomar's Machine Shop and Engineering Services Management System (JMSESMS)</title>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link id="theme-link" rel="stylesheet" href="css/themes/spring.css">
         <link rel="shortcut icon" href="img/favicon.ico">

       
</head>
<body>
    <!-- <?php echo $__env->yieldContent('content'); ?> -->
   
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php echo $__env->make('scriptss', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <script src="<?php echo e(asset('js/pages/login.js')); ?>"></script>
        <script>$(function(){ Login.init(); });</script>
</body>
</html>
