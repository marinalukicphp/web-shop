<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
 
 <?php


 require_once '../model/DAO.php';

 $dao=new DAO();

 $allarticles=$dao->selectAllArticles();

  $cart=isset($_SESSION['cart'])?$_SESSION['cart']:array();

  if($cart){

 echo "Number of articles in cart is:".count($cart);


  }


?>



<table border="3">
<tr>
<th>Brand</th>
<th>Price</th>
<th>Action</th>

<?php

foreach($allarticles as $a){

echo "<tr>";
echo "<td>$a[brand]</td>";
echo "<td>$a[price]</td>";
echo "<td><a href='routes.php?action=addtocart&idart=$a[id_art]'>Add to cart</a></td>";
echo "</tr>";

}

?>

</tr>
</table>



<br><br><br><br>

<a href="routes.php?action=showcart">My cart</a>

<br><br>

<?php

$msg=isset($msg)?$msg:"";
echo $msg;


$msg=isset($_GET['msg'])?$_GET['msg']:"";
echo $msg;


?>


</body>
</html>