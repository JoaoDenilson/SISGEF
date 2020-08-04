<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SisGef</title>

    <!-- Style Antigo -->
    <link rel="stylesheet" href="<?= asset('css/app.css');?>">
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.js')); ?>"></script>

    <!-- Style Novo -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Script Novo -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <!-- Fim -->
    
</head>
<body>
    <div class="container my-3">  
    	<div>
              <img src="<?php echo e(asset('img/LogoSIGEF.png')); ?>" style="width: 70%; height: 25%;">
                
    		<?php echo $__env->yieldContent('content'); ?>
    	</div>	
        
    </div>
</body>
</html>