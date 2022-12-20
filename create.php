<?php

require './classes/student.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  # Create Student Obj ..... 
    $student = new student; 

     $data = $student->register($_POST);

     foreach($data as $key => $value){
         echo '* '.$key.' : '.$value.'<br>';
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
        <h2>Register</h2>

        <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputName">Title</label>
                <input type="text" class="form-control"  id="exampleInputName" aria-describedby="" name="name" placeholder="Enter Title">
            </div>



            <div class="form-group">
                <label for="exampleInputEmail">Content</label>
                <input type="text" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp" name="content" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">Image</label>
                <input type="file" class="form-control"  id="exampleInputPassword1" name="image" placeholder="Password">
            </div>



            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>


</body>

</html>