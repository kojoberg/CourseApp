<?php session_start(); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<?php
// including the database connection file
include_once("connection.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $frame = $_POST['frame'];
    $cost = $_POST['cost'];   
    
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
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE courses SET name='$name', description='$desc', framework='$frame', cost='$cost' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: view.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM courses WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $desc = $res['description'];
    $frame = $res['framework'];
    $cost = $res['cost'];

}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a> | <a href="view.php">View courses</a> | <a href="logout.php">Logout</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Description</td>
                <td><input type="text" name="desc" value="<?php echo $desc;?>"></td>
            </tr>
            <tr> 
                <td>Framework</td>
                <td><input type="text" name="frame" value="<?php echo $frame;?>"></td>
            </tr>

            <tr> 
                <td>Cost</td>
                <td><input type="text" name="cost" value="<?php echo $cost;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>