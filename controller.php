<?php

require_once '../model/DAO.php';

class Controller{

public function addToCart(){

$idart=isset($_GET['idart'])?$_GET['idart']:"";

$dao=new DAO();

$onearticle=$dao->selectArticleById($idart);

if($onearticle){

session_start();

$_SESSION['cart'][]=$onearticle;

$msg="Article added to cart";

include 'index.php';


}



}

public function showCart(){

include 'cart.php';

}




public function emptyCart(){

session_start();

if(isset($_SESSION['cart'])){

session_unset();

session_destroy();

$msg="Cart is empty";

include 'index.php';


}

}

public function continueShopping(){

include 'index.php';

}


public function deleteArticle(){

$idart=isset($_GET['idart'])?$_GET['idart']:"";

session_start();

if(isset($_SESSION['cart'])){

foreach($_SESSION['cart'] as $c=>$id){

if($id['id_art']==$idart){

unset($_SESSION['cart'][$c]);

header('Location:cart.php');

}



}






}





}

public function refreshCart(){

$amount=isset($_GET['amount'])?$_GET['amount']:array();
$idart=isset($_GET['idart'])?$_GET['idart']:array();


$i=0;
    foreach($idart as $id){
        
         $dao= new DAO();

         $article=$dao->selectArticleById($id);

         $sum=$article['price']*$amount[$i];

         $total[]=$sum;

         $i++;
         
    }
       session_start();
       
       $_SESSION['total']=$total;
       
       $_SESSION['amount']=$amount;

       header('Location:cart.php');

       
  


     }

   public function register(){

   $name_surname=isset($_POST['name_surname'])?$_POST['name_surname']:"";
   $email=isset($_POST['email'])?$_POST['email']:"";
   $password=isset($_POST['password'])?$_POST['password']:"";
   $phone=isset($_POST['phone'])?$_POST['phone']:"";
   $address=isset($_POST['address'])?$_POST['address']:"";
   $rola=isset($_POST['rola'])?$_POST['rola']:"";

   $errors=array();

   if(empty($name_surname)){

    $errors['name_surname']="You have to insert name and surname";

   }

   if(empty($email)){

    $errors['email']="You have to insert email";

   }


   if(empty($password)){

    $errors['password']="You have to insert password";

   }


   if(empty($phone)){

    $errors['phone']="You have to insert phone";

   }


   if(empty($address)){

    $errors['address']="You have to insert address";

   }

  if(count($errors)==0){

  $dao=new DAO();

  $register=$dao->register($name_surname,$email,$password,$phone,$address,$rola);

  $msg="User registred";

  include 'login.php';

  }else{

  $msg="You have to fill all correctly";

  include 'login.php';

  }


   }

 public function login(){

 $email=isset($_POST['email'])?$_POST['email']:"";
 $password=isset($_POST['password'])?$_POST['password']:"";

 if(!empty($email)&&!empty($password)){
 
    $dao=new DAO();

    $user=$dao->login($email,$password);

    if($user){

    if($user['role']=='a'){

    session_start();

    $_SESSION['admin']=$user;

    $msg="Login success";
   
    include 'allarticles.php';

    }else{
 
  
    session_start();  

    $_SESSION['user']=$user;

    $msg="Login success";

    include 'checkout.php';

    }


    }else{

   $msg="Wrong email and/or password";
   include 'login.php';

    }


    

 }else{

 $msg="You have to insert email and password";
 include 'login.php';


 }




 }


 public function doOrder(){

  $name=isset($_POST['name'])?$_POST['name']:"";
  $email=isset($_POST['email'])?$_POST['email']:"";
  $phone=isset($_POST['phone'])?$_POST['phone']:"";
  $address=isset($_POST['address'])?$_POST['address']:"";
  $user_id=isset($_POST['user_id'])?$_POST['user_id']:"";

  session_start();


  $total=isset($_SESSION['total'])?$_SESSION['total']:array();
  $amount=isset($_SESSION['amount'])?$_SESSION['amount']:array();
  $cart=isset($_SESSION['cart'])?$_SESSION['cart']:array();

 $errors=array();

 if(empty($name)){

  $errors['name']="Please enter your name";

 }

 if(empty($email)){

  $errors['email']="Please enter your email";

 }

 if(empty($phone)){

  $errors['phone']="Please enter your phone";

 }


 if(empty($address)){

  $errors['address']="Please enter your address";

 }

 if(count($errors)==0){

 $dao=new DAO();

 $order_n=$dao->selectLastOrder();

 if(empty($order_n)){

  $order_number=1;

 }else{


  $order_number=max($order_n);

  $order_number++;

 
 }


 $i=0;

 foreach($cart as $c){

  $id_art=$c['id_art'];
  $product_name=$c['brand'];
  $product_price=$c['price'];
  $count=$amount[$i];
  $tot=$total[$i];

  $i++;


  $dao->insertOrder($user_id,$product_name,$product_price,$id_art,$count,$tot,
  $name,$email,$phone,$address,$order_number);


 }

 include 'thankyou.php';


 }






 }

 public function deleteBrand(){

 $idbrand=isset($_GET['idbrand'])?$_GET['idbrand']:"";
 
 if(!empty($idbrand)){

 $dao=new DAO();

 $deletebrand=$dao->deleteBrand($idbrand);

 $msg="Article deleted";

 include 'articles.php';


 }

 }

 public function viewUpdatePage(){

 $id=isset($_GET['id'])?$_GET['id']:"";

 if(!empty($id)){

 $dao=new DAO();

 $articlebyid=$dao->getArticleById($id);

 include 'updatearticle.php';


 }


 }


  public function updateArticle(){

  $brand=isset($_GET['brand'])?$_GET['brand']:"";
  $price=isset($_GET['price'])?$_GET['price']:"";
  $description=isset($_GET['description'])?$_GET['description']:"";
  $image=isset($_GET['image'])?$_GET['image']:"";
  $id=isset($_GET['id'])?$_GET['id']:"";
  
  $errors=array();
  
  if(empty($brand)){
  
  $errors['brand']="You have to insert brand";
  
  }
  
  
  
  if(empty($price)){
  
      $errors['price']="You have to insert price";
      
      }
      
  
      if(empty($description)){
  
          $errors['description']="You have to insert description";
          
          }
  
  
  
          if(empty($image)){
  
              $errors['image']="You have to insert image";
              
              }
              
  
   if(count($errors)==0){
  
   $dao=new DAO();
   
   $updatearticle=$dao->updateArticle($brand,$price,$description,$image,$id);

   $msg="Article updated";

   include 'allarticles.php';

 }


 }

 public function logout(){

 session_start();

 session_unset();

 session_destroy();

 header('Location:index.php');

 }

 
 public function insertArticle(){

 $brand=isset($_POST['brand'])?$_POST['brand']:"";
 $price=isset($_POST['price'])?$_POST['price']:"";
 $description=isset($_POST['description'])?$_POST['description']:"";

 if(isset($_FILES['image'])){

 $file_name=$_FILES['image']['name'];
 $file_tmp=$_FILES['image'] ['tmp_name'];
 
 $errors=array();

 if(empty($brand)){

 $errors['brand']="You have to insert brand";


 }

 
 if(empty($price)){

  $errors['price']="You have to insert price";
 
 
 }
    
  

    if(empty($description)){

      $errors['description']="You have to insert description";
     
     
      }
  
  

      if(empty($file_name)){

        $errors['file_name']="You have to insert image";
       
       
        }
  
  if(count($errors)==0){

 move_uploaded_file($file_tmp,"../images/$file_name");

 $dao=new DAO();

 $dao-> insertArticle($brand,$price,$description,$file_name);

 $msg="Article inserted<br><br>";

 include 'insertarticle.php';


  }else{

 $msg="You have to fill all fields correctly<br><br>";
 include 'insertarticle.php';


  }
  
}



 }








 














 

 



































}

?>