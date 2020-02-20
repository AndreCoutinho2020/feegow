<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>feegow</title>
        <?php echo $this->Html->meta('icon'); ?>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <link href="/feegow/bootstrap4/dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="/feegow/bootstrap4/dist/js/bootstrap.js" type="text/javascript"></script>
        <script src="/feegow/mask/dist/jquery.mask.js" type="text/javascript"></script>        
    </head>

    <body>
        <div class="container">
            <div class="row mt-5 mb-4">
                <div class="col-12">
                    <div id="header">
                        <img src="/feegow/img/cropped-favicon-32x32.png"> Software para clínicas médicas e consultórios
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php echo $this->Flash->render(); ?>
                    <?php echo $this->fetch('content'); ?> 
                </div>
            </div>
        </div>
    </body>
</html>
