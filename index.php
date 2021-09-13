<?php
  
  require './helpers/dbConnection.php';
  require './helpers/checkLogin.php';

if($_SESSION['User']['role'] == 1){

  $sql = "select * from students";

}elseif($_SESSION['User']['role'] == 2){

    $sql = "select * from students where id=".$_SESSION['User']['id'];
    
}
  $op  =  mysqli_query($con,$sql);


?>


<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1>Read Users </h1>   Welcome , <?php echo $_SESSION['User']['name'];?>
            <br>

     <?php 
     
        if(isset($_SESSION['Message'])){
            echo $_SESSION['Message'];
            unset($_SESSION['Message']);
        }
     
     ?>

        <a href="logout.php">LogOut</a>
        </div>

        <!-- PHP code to read records will be here -->



        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>action</th>

            </tr>

<?php 
      $i = 0;
      while ($data = mysqli_fetch_assoc($op)) {
?>
            <tr>
               <td><?php echo ++$i;?></td>
               <td><?php echo $data['id'];?></td>
               <td><?php echo $data['name'];?></td>
               <td><?php echo $data['email'];?></td>

                <td>
                    <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                    <a href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>
                </td>

            </tr>

<?php } ?>

            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>