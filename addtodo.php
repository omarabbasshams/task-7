<?php
require  './helpers/dbConnection.php';
require  './helpers/helpers.php';
require './helpers/checkLogin.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){

# Logic ... 
$title          = CleanInputs($_POST['title']);
$description    = CleanInputs($_POST['description']);
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
var_dump($startdate);
print_r($_POST);

# Validate Inputs ... 
$errors = [];

if(!validate($title,1)){
 $errors['title'] = "Field Required.";
}elseif(!validate($title,2)){
    $errors['title'] = "Invalid String.";  
}
if(!validate($description,1)){
    $errors['description'] = "Field Required.";
   }elseif(!validate($description,2)){
       $errors['description'] = "Invalid String.";  
   }
   if(!validate($startdate,1)){
    $errors['startdate'] = "Field Required.";
   }
   if(!validate($enddate,1)){
    $errors['enddate'] = "Field Required.";
   }
if(count($errors) > 0){

    foreach($errors as $key => $value)
    {
        echo '* '.$key.' : '.$value.'<br>';
    }
}else{
 
 

 $sql = "insert into todo (title,description,startdate,enddate) values ('$title','$description','$startdate','$enddate')";

 $op = mysqli_query($con,$sql);

 if($op){
     echo 'Registration done';
 }else{
     echo 'Error in Register';
   }
}

}



?>





<!DOCTYPE html>
<html lang="en">
<head>
<title>Register</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<h2>Add TODO</h2>
<form method="post" action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  enctype ="multipart/form-data">



<div class="form-group">
<label for="exampleInputEmail1">Title</label>
<input type="text" name="title"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Title">
</div>


<div class="form-group">
<label for="exampleInputEmail1">Description</label>
<input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">
</div>

<div class="form-group">
<label for="exampleInputPassword1">startdate</label>
<input type="date" name="startdate"   class="form-control" id="exampleInputPassword1" placeholder="startdate">
</div>
<div class="form-group">
<label for="exampleInputPassword1">enddate</label>
<input type="date" name="enddate"   class="form-control" id="exampleInputPassword1" placeholder="enddate">
</div>


<button type="submit" class="btn btn-primary">Save</button>
</form>
</div>



</body>
</html>
