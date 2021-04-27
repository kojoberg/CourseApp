<?php session_start(); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<?php
//including the database connection file
include_once("connection.php");
 
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM courses WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>
 
<html>
<head>
    <title>Homepage</title>
</head>
 
<body>
<a href="index.php">Home</a> | <a href="add.html">Add New Data</a> | <a href="logout.php">Logout</a>
<br/><br/>
    
<table width='80%' border=0>
    <tr bgcolor='#CCCCCC'>
        <td>Name</td>
        <td>Description</td>
        <td>Framework</td>
        <td>Cost (cedis)</td>
        <td>Update</td>
    </tr>
    <?php
    while($res = mysqli_fetch_array($result)) {        
        echo "<tr>";
        echo "<td>".$res['name']."</td>";
        echo "<td>".$res['description']."</td>";
        echo "<td>".$res['framework']."</td>";
        echo "<td>".$res['cost']."</td>";    
        echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    ?>
</table>    
</body>
</html>