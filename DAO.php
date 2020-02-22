<?php

require_once '../config/db.php';



class DAO{

private $db;

private $SELECTALLARTICLES="SELECT * FROM articles";
private $SELECTARTICLESBYID="SELECT * FROM articles WHERE id_art=?";
private $REGISTER="INSERT INTO users (name_surname,email,password,phone,address,role)VALUES(?,?,?,?,?,?)";
private $LOGIN="SELECT * FROM users WHERE email=? AND password=?";
private $ORDER="INSERT INTO orders (user_id,product_name,product_price,
id_art,count,total,client_name,email,phone,address,order_number)VALUES(?,?,?,?,?,?,?,?,?,?,?)";
private $LASTORDER="SELECT MAX(order_number) FROM orders";
private $DELETEBRAND="DELETE FROM articles WHERE id_art=?";
private $GETARTICLESBYID="SELECT * FROM articles WHERE id_art=?";
private $UPDATEARTICLE="UPDATE articles SET brand=?,price=?,description=?,image=? WHERE id_art=?";
private $INSERTARTICLE="INSERT INTO articles(brand,price,description,image)VALUES(?,?,?,?)";


public function __construct(){

$this->db=DB::CreateInstance();

}





public function selectAllArticles(){

$statement=$this->db->prepare($this->SELECTALLARTICLES);

$statement->execute();

$result=$statement->fetchAll();

return $result;




}


public function selectArticleById($id){

$statement=$this->db->prepare($this->SELECTARTICLESBYID);

$statement->bindValue(1,$id);

$statement->execute();

$result=$statement->fetch();

return $result;






}




public function register($n,$e,$pw,$ph,$a,$r){

$statement=$this->db->prepare($this->REGISTER);

$statement->bindValue(1,$n);

$statement->bindValue(2,$e);

$statement->bindValue(3,$pw);

$statement->bindValue(4,$ph);

$statement->bindValue(5,$a);

$statement->bindValue(6,$r);


$statement->execute();


}

public function login($e,$p){

$statement=$this->db->prepare($this->LOGIN);

$statement->bindValue(1,$e);

$statement->bindValue(2,$p);

$statement->execute();

$result=$statement->fetch();

return $result;


}

public function insertOrder($user_id,$product_name,$product_price,$id_art,$count,$total,$client_name,$email,$phone,$address,$order_number){

$statement=$this->db->prepare($this->ORDER);

$statement->bindValue(1,$user_id);
$statement->bindValue(2,$product_name);
$statement->bindValue(3,$product_price);
$statement->bindValue(4,$id_art);
$statement->bindValue(5,$count);
$statement->bindValue(6,$total);
$statement->bindValue(7,$client_name);
$statement->bindValue(8,$email);
$statement->bindValue(9,$phone);
$statement->bindValue(10,$address);
$statement->bindValue(11,$order_number);

$statement->execute();



}

public function selectLastOrder(){

$statement=$this->db->prepare($this->LASTORDER);

$statement->execute();

$result=$statement->fetch();

return $result;



}



public function deleteBrand($id){

$statement=$this->db->prepare($this->DELETEBRAND);

$statement->bindValue(1,$id);

$statement->execute();


}


public function getArticleById($id){

$statement=$this->db->prepare($this->GETARTICLESBYID);

$statement->bindValue(1,$id);

$statement->execute();

$result=$statement->fetchAll();

return $result;




}

public function updateArticle($b,$p,$d,$i,$id){

$statement=$this->db->prepare($this->UPDATEARTICLE);

$statement->bindValue(1,$b);
$statement->bindValue(2,$p);
$statement->bindValue(3,$d);
$statement->bindValue(4,$i);
$statement->bindValue(5,$id);

$statement->execute();


}

public function insertArticle($b,$p,$d,$i){

 $statement=$this->db->prepare($this->INSERTARTICLE);

 $statement->bindValue(1,$b);
 $statement->bindValue(2,$p);
 $statement->bindValue(3,$d);
 $statement->bindValue(4,$i);


 $statement->execute();



}








}
?>