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
 

 session_start();

 $cart=isset($_SESSION ['cart'])?$_SESSION ['cart']:array();


 if(empty($cart)){

 header('Location:index.php?msg=Cart is empty');


 }
  

 $total=isset($_SESSION['total'])?$_SESSION['total']:array();

 $amount=isset($_SESSION['amount'])?$_SESSION['amount']:array();



?>

<form action="routes.php" method="get">
<table border="2">
<tr>
<th></th>
<th>Brand</th>
<th>Price</th>
<th>Amount</th>
<th>Total</th>
<th></th>
</tr>

<?php

$i=0;

$sum=0;

foreach ($cart as $c){

echo "<tr>";
echo "<td>Image</td>";
echo "<td>$c[brand]</td>";
echo "<td>$c[price]</td>";
?>
<td><input type='text' name='amount[]' value='
<?php

if(!empty($amount)&&!empty($amount[$i])){

echo $amount[$i];

}else{
 
  echo '1';

}

?>
' size='2'></td>

<td><?php if(!empty($total)&&!empty($total[$i])){ echo $total[$i];}else { echo $c['price'];} ?></td>

<?php



if(!empty($total[$i])){

$sum+=$total[$i];

}else{

$sum+=$c['price'];

}
echo "<td><a href='routes.php?action=deletearticle&idart=$c[id_art]'>Delete article</a></td>";
echo "</tr>";
echo "<input type='hidden' name='idart[]' value='$c[id_art]'>";

$i++;

    
}



?>

<tr>
<td><a href="routes.php?action=emptycart">Empty cart</a></td>
<td></td>
<td></td>
<td></td>
<td><input type="submit" name="action" value="Refresh cart"></td>
<td><a href="routes.php?action=continueshopping">Continue shopping</a></td>
</tr>


</table>
<br><br>



<?php

echo "Total:".$sum;

?>

<br><br>

<a href="login.php">Order</a>

</form>
</body>
</html>