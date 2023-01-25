<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>PHP MVC</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <style>
        input{
            margin-top:5px;
            margin-bottom:5px;
        }
        .right{
            float:right;
        }
    </style>
</head>
<body>
<form action="../../Controller/UserController.php" method="post" class="col-lg-5">
    <h3>Add user</h3>
    <hr/>
    Name: <input type="text" name="name" class="form-control"/>
    Age: <input type="text" name="age" class="form-control"/>
    Email: <input type="text" name="email" class="form-control"/>
    <input type="submit" value="Submit" class="btn btn-success"/>
</form>
</body>
</html>