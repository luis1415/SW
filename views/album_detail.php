<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>albumes</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="../stylesheets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../stylesheets/css/signin.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../stylesheets/css/thumbnail-gallery.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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

<div class="form-signin">
<form method="post" action="../controllers/album.php">

    <div class="arrow-up"></div>
    <div class="formholder">
        <div class="randompad">
            <fieldset>
                <label name="name">Name</label>
                <input type="text" name="name" value="<?php echo $row["name"]; ?>" class="form-control" /><br>
                <label name="description">Description</label>
                <input type="text" name="description" value="<?= $row["description"]; ?>" class="form-control" /><br>
                <input type="hidden" name="id_album" value="<?= $row["id"]; ?>" class="form-control" /><br>
                <button class="btn btn-lg btn-primary btn-block" type="submit" value="save" name="update" >Update</button>
            </fieldset>
        </div>
    </div>
</form>
</div>

</body>
</html>