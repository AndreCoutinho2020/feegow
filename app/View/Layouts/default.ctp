<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->meta('icon'); ?>        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <link href="/feegow/bootstrap4/dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="/feegow/bootstrap4/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="/feegow/bootstrap4/dist/js/bootstrap.js" type="text/javascript"></script>
        <script src="/feegow/mask/dist/jquery.mask.js" type="text/javascript"></script>        
        <title>feegow</title>
    </head>


    <body>
        <div class="container">
            <div class="row mt-5 mb-4">
                <div class="col-md-12 col-lg-12">
                    <img src="/feegow/img/cropped-favicon-32x32.png"> Feegow                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content'); ?> 
                </div>
            </div>
        </div>
    </body>
</html>
