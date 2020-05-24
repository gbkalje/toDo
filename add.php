<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    
  </head>
  <body>
    <h1 style="text-align:center;"><i>ADD TODO</i></h1>

    <?php

     if (($_SERVER["REQUEST_METHOD"] ?? 'GET') == 'POST'){

    $Title=$_POST['tit'];
    $date=$_POST['deat'];
 
  

  
    $servername = "localhost";
    $username = "root";
    $password ="";
    $database="TODO";            //for database

//Creating database connection
$conn=mysqli_connect($servername,$username,$password,$database);

//check connection

     if(!$conn)
      {
          die("Failed to connect". mysqli_connect_error());
      }
     else
      {
          echo "connection successful";
//subit to database
             $sql="INSERT INTO `task` ( `title`, `date`) VALUES ( '$Title', '$date');";
           $result=mysqli_query($conn,$sql);
      
           if($result)
           {
                   echo '<div class="alert alert-success alert-dismissable fade show" role="alert">
                   <strong>Success!</strong> Your entry has been submitted successfully!
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                   </button>
                   </div>';
            }
           else
            {
                echo "error". mysqli_error($conn);
             }


      }
 }


 ?>

    <form action="add.php" method="post">
  <div class="form-group">
    <label for="tit">TODO Title</label>
    <input type="text"  name="tit"class="form-control" id="tit" aria-describedby="emailHelp" >
  </div>
  <div class="form-group">
    <label for="deat">Deadline</label>
    <input type="date"  name="deat"class="form-control" id="deat" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

  <button onclick="document.getElementById('myInput').value = ''">Clear</button>
</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>