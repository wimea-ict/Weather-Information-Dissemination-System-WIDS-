<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog site</title>
    <link rel="stylesheet" href="../assets/css/style2.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
    <script src="../assets/jquery.min.js" type="text/javascript"></script>
    <script>
  function session_k(){
      document.location.href='../server/logout.php';
  }
$(function(){
  var tr = '';
  var trix = "hi";
$.ajax({
  type: 'post',
  url: '../server/blogs.php',
  data: {'blogs': trix},
  dataType: 'json',
  success: function(sup){
     $.each(JSON.parse(JSON.stringify(sup)),function(index,key){
      tr +="<tr><td>"+sup[index].title+"</td><td>"+sup[index].message+"</td><td>"+sup[index].sender+"</td><td>"+sup[index].date+"</td></tr>";
    })
    $(".tabs").html(tr);

  },
  error: function(){
    alert("error has occured");
  }
});
});
      </script>

  </head>
  <body>
  <div class="container-fluid">
    <div class="jumbotron mb-20">
      <p class = "lead cloc"> <span class = "text-center"><?php echo $_SESSION['email']; ?></span><button class = "btn btn-danger float-right" onclick="session_k();">Sign out</button> </p>
    </div>
    <div class="row">
  <div class="col-md-5">
    <form role = "form" method = "post" action = "../server/insert.php" enctype="multipart/form-data" id = "blogger">
  <fieldset class="form-group">
    <label for="exampleInputEmail1">title</label>
    <input type="title" class="form-control" id="exampleInputEmail1" placeholder="Enter blog title" name = "title">
  
  </fieldset>

  <fieldset class="form-group">
    <label for="exampleTextarea">message</label>
    <textarea class="form-control" id="exampleTextarea" rows="5" name = "message"></textarea>
  </fieldset>
  <input type="submit" class="btn btn-primary btn-block" value = "post" name = "post">
</form>
<hr />

      </div>
      <div class="col-md-7 mt-20">
        <div class="card">
          <div class="card-header">
            <h2 class = "text-center">Recent Posts</h2>
          </div>
          <div class="card-body">
            <table class = "table">
              <thead>
                <tr>
                  <th>Title</th>
                    <th>Message</th>
                      <th>blogger</th>
                      <th>Time</th>
                </tr>
              </thead>
              <tbody class = "tabs">
              </tbody>
            </table>
          </div>
        </div>

      </div>

    </div>
  </div>
  <script src="../assets/js/bootstrap.min.js" type="text/javascript" ></script>
  </body>
</html>
