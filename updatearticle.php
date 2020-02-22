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

require_once '../model/DAO.php';

$dao=new DAO();

$articlebyid=$dao->getArticleById($id);

?>
  

    <form action="routes.php" method="get">

  <?php

 foreach ($articlebyid as $a){


?>


 <input type="text" name="brand" value="<?php echo $a['brand'];?>">
 <span style='color:red;'><?php if(array_key_exists('brand',$errors)) echo $errors['brand'];?></span>
 <br><br>


 <input type="number" name="price" value="<?php echo $a['price'];?>">
 <span style='color:red;'><?php if(array_key_exists('price',$errors)) echo $errors['price'];?></span>
 <br><br>

 <textarea name="description" cols="21" rows="5" ><?php echo $a['description'];?></textarea>
 <span style='color:red;'><?php if(array_key_exists('description',$errors)) echo $errors['description'];?></span>
 <br><br>

 <input type="text" name="image" value="<?php echo $a['image'];?>">
 <span style='color:red;'><?php if(array_key_exists('image',$errors)) echo $errors['image'];?></span>
 <br><br>

 <input type="hidden" name="id" value="<?php echo $a['id_art'];?>">
 <br><br>

<?php } ?>

 <input type="submit" name="action" value="Update article">


    </form>
</body>
</html>