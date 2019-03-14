<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Security</title>
  <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
    <script src="../assets/jquery-2.0.3.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    </script>
  </head>
  <body>
  <div class="container-fluid mb-5 formed">
    <div class = "jumbotron">
<h1 class="display-3 text-center">BSE19-03</h1>
<p class="lead text-center">A blog site for the group </p>
  </div>

  <div class="col-md-5" style = "border: 1px solid gray; padding: 20px; border-radius: 5px; margin-left: 25%;">
    <form action="../server/index.php" method="post" enctype="multipart/form-data" id = "form_1">
      <fieldset class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name = "email" placeholder="Enter email" >
        <small class="text-muted">We'll never share your email with anyone else.</small>
      </fieldset>
      <fieldset class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name = "password" placeholder="Password" >
      </fieldset>
      <input type="submit" class="btn btn-outline-primary btn-block" name = "but" value = "submit">
    </form>
  </div>
</div>
<div class = "error alert alert-danger" style = "margin-left: 25%; width: 43%; margin-top: 5px; display: none;">error</div>
  </body>

  <script src="../assets/js/bootstrap.min.js" type="text/javascript" ></script>
</html>
