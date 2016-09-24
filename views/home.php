<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Photo Album</title>

    <!-- Bootstrap Core CSS -->
    <link href="../stylesheets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../stylesheets/css/thumbnail-gallery.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link href="../stylesheets/css/signin.css" rel="stylesheet">
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../controllers/album.php?data">Photo Album</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">Profile</a>
                </li>
                <li>
                    <a href="../controllers/user.php?logout">Logout</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Albumes
                <a href="../controllers/album.php?new" type="button" class="btn btn-primary" >New Album</a>
            </h1>

        </div>

        <?php
        foreach ($rows_albumes as $row_album) { ?>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="../controllers/album.php?find=<?= $row_album['id'];?>">
                    <img class="img-responsive" src="http://icons.iconarchive.com/icons/grafikartes/flat-retro-modern/512/iPhoto-icon.png" width="400" height="300">
                </a>
                <p><h3><?= $row_album['name'];?></h3></p>
                <p><h4><?= $row_album['description'];?></h4></p><br>
                <a href="../controllers/album.php?edit=<?= $row_album['id'];?>" type="button" class="btn btn-primary" >Edit Album</a>
            </div>

        <?php }

        ?>



    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; 2016</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="../stylesheets/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../stylesheets/js/bootstrap.min.js"></script>

</body>

</html>