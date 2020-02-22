<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>

<a href="insertarticle.php">Insert article</a>

<br><br>

<a href="routes.php?action=logout">Log out</a>


<?php

require_once '../model/DAO.php';

$dao=new DAO();

$allarticles=$dao->selectAllArticles();

?>

<h2>All articles</h2>

<table border="3">
<tr>
<th>Brand</th>
<th>Price</th>
<th>Description</th>
<th>Image</th>
<th colspan="3">Action</th>

<?php

foreach($allarticles as $a){

echo "<tr>";
echo "<td>$a[brand]</td>";
echo "<td>$a[price]</td>";
echo "<td>$a[description]</td>";
echo "<td>$a[image]</td>";
echo "<td><a href='routes.php?action=deletebrand&idbrand=$a[id_art]'>Delete</a></td>";
echo "<td><a href='routes.php?action=viewupdatepage&id=$a[id_art]'>Edit</a></td>";
echo "</tr>";

}

?>

</tr>
</table>

<?php

$msg=isset($msg)?$msg:"";
echo $msg;


$msg=isset($_GET['msg'])?$_GET['msg']:"";
echo $msg;


?>


</body>
</html>