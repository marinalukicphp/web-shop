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

$msg=isset($msg)?$msg:"";
echo $msg;

$errors=isset($errors)?$errors:array();



?>
    
<a href="routes.php?action=logout">Log out</a>

<br><br>

<h1>Add new article:</h1>

<form action="routes.php" method="post" enctype="multipart/form-data">

<input type="text" name="brand" placeholder="Brand">
<span style='color:red;'><?php if(array_key_exists('brand',$errors)) echo $errors['brand'];?></span>
<br><br>


<input type="text" name="price" placeholder="Price">
<span style='color:red;'><?php if(array_key_exists('price',$errors)) echo $errors['price'];?></span>
<br><br>

<textarea name="description" rows="10" cols="22" placeholder="Description" ></textarea>
<span style='color:red;'><?php if(array_key_exists('description',$errors)) echo $errors['description'];?></span>
<br><br>

<input type="file" name="image">
<br><br>

<input type="submit" name="action" value="Insert article">


</form>
</body>
</html>