<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

$ms=isset($msg)?$msg:"";
echo $msg;

?>
  

    <?php

  if(isset($_SESSION['user'])){

?>

    <h1>Checkout</h1>

 <h2>Client:<?php echo $_SESSION['user']['name_surname'];?></h2>

<?php


 $cart=isset($_SESSION ['cart'])?$_SESSION ['cart']:array();


 if(empty($cart)){

 header('Location:index.php?msg=Cart is empty');


 }
  

 $total=isset($_SESSION['total'])?$_SESSION['total']:array();

 $amount=isset($_SESSION['amount'])?$_SESSION['amount']:array();


?>

<form action="routes.php" method="post">
 <table border="2">
<tr>
<th></th>
<th>Brand</th>
<th>Price</th>
<th>Amount</th>
<th>Total</th>

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

echo "</tr>";
echo "<input type='hidden' name='idart[]' value='$c[id_art]'>";

$i++;

    
}



?>

</table>


<br><br>



<?php

echo "Total:".$sum;

?>
<br><br>

<h3>Please check your data:</h3>

<input type="text" name="name" value="<?php echo $_SESSION['user']['name_surname'];?>">
<br><br>

<input type="text" name="email" value="<?php echo $_SESSION['user']['email'];?>">
<br><br>

<input type="text" name="phone" value="<?php echo $_SESSION['user']['phone'];?>">
<br><br>

<textarea name="address" cols="21" rows="5"><?php echo $_SESSION['user']['address'];?></textarea>
<br><br>

<input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['user_id'];?>" >


<input type="submit" name="action" value="Confirm">



<?php

  }

?>
</form>
</body>
</html>