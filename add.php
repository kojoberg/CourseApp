<?php session_start(); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<html>
<head>
    <title>Add Course</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("connection.php");
 
if(isset($_POST['Submit'])) {    
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $frame = $_POST['frame'];
    $cost = $_POST['cost'];
    $loginId = $_SESSION['id'];
        
    // checking empty fields
    if(empty($name) || empty($desc) || empty($frame) || empty($cost)) {                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($desc)) {
            echo "<font color='red'>Description field is empty.</font><br/>";
        }
        
        if(empty($frame)) {
            echo "<font color='red'>Framework field is empty.</font><br/>";
        }

        if(empty($cost)) {
            echo "<font color='red'>Cost field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database    
        $result = mysqli_query($mysqli, "INSERT INTO courses(name, description, framework, cost, login_id) VALUES('$name','$desc','$frame','$cost','$loginId')");
        
        //display success message
        echo "<font color='green'>Course added successfully.";
        echo "<br/><a href='view.php'>View Result</a>";
    }
}
?>
</body>
</html>