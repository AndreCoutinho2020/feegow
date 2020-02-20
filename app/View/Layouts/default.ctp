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

                <nav class="navbar navbar navbar-expand-lg fixed-top navbar-light bg-info">
                    <a class="navbar-brand text-white" href="/feegow">Feegow</a>
                    <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link text-white" href="/feegow">Agendamento <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/feegow/listar">Listagem de agendamentos</a>
                            </li>
                        </ul>
                    </div>
                </nav>
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
