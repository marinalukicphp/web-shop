<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>

    <form action="routes.php" method="post">

    <?php

$msg=isset($msg)?$msg:"";
echo $msg;

?>
    
<h1>Log in</h1>


<input type="text" name="email" placeholder="Email">
<br><br>


<input type="password" name="password" placeholder="Password">
<br><br>

<input type="submit" name="action" value="Log in">
<br><br>
</form>

<?php

$errors=isset($errors)?$errors:array();

?>

<h1>Register</h1>

<form action="routes.php" method="post">

 <input type="text" name="name_surname" placeholder="Name and surname">
 <span style='color:red;'><?php if(array_key_exists('name_surname',$errors)) echo $errors['name_surname'];?></span>
 <br><br>

 <input type="text" name="email" placeholder="Email">
 <span style='color:red;'><?php if(array_key_exists('email',$errors)) echo $errors['email'];?></span>
 <br><br>

 <input type="password" name="password" placeholder="Password">
 <span style='color:red;'><?php if(array_key_exists('password',$errors)) echo $errors['password'];?></span>
 <br><br>


 <input type="text" name="phone" placeholder="Phone">
 <span style='color:red;'><?php if(array_key_exists('phone',$errors)) echo $errors['phone'];?></span>
 <br><br>

<textarea name="address" cols="21" rows="5" placeholder="Address"></textarea>
<span style='color:red;'><?php if(array_key_exists('address',$errors)) echo $errors['address'];?></span>
<br><br>

<input type="hidden" name="rola" value="c">
<br><br>

<input type="submit" name="action" value="Register">

<br><br>

    </form>
</body>
</html>