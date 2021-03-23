<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Главная</title>
        <link href="/template/css/bootstrap.min.css" rel="stylesheet">
        <link href="/template/css/font-awesome.min.css" rel="stylesheet">
        <link href="/template/css/main.css" rel="stylesheet">
        <link href="/template/css/responsive.css" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head><!--/head-->

    <body>
        <div class="page-wrapper">


            <header id="header"><!--header-->
                <div class="header_top"><!--header_top-->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="contactinfo">
                                    <ul class="nav nav-pills">
                                        <li><a href="/"><i class="fa fa-home"></i> Главная</a></li>
                                        <?php if (isset($user) && $user['role']=='admin'):?>
                                            <li><a href="/admin"><i class="fa fa-edit"></i> Админ панель</a></li>
                                        <?php endif;?>
                                        <?php if (isset($user)):?>
                                            <li><a href="/user/logout"><i class="fa fa-sign-out"></i> Выход</a></li>
                                        <?php else:?>
                                            <li><a href="/user/login"><i class="fa fa-sign-in"></i> Вход</a></li>
                                        <?php endif;?>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/header_top-->


                <br><br>

            </header><!--/header-->