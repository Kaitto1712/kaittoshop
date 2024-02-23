<?php 
	include "db.php";
	class userModel extends db
	{
			public function show_all_product($from,$sotin1trang){
				$sql ="SELECT product.*,catalog_paren.name name_catalog_paren from product LEFT JOIN catalog ON product.catalog_id = catalog.id LEFT JOIN catalog_paren on catalog.parent_id = catalog_paren.id ORDER BY product.id DESC LIMIT $from,$sotin1trang";
				$data = $this->connect()->query($sql);
					 return $data;
			}
			public function show_4_product_new(){
				$sql ="SELECT product.*,catalog_paren.name name_catalog_paren from product LEFT JOIN catalog ON product.catalog_id = catalog.id LEFT JOIN catalog_paren on catalog.parent_id = catalog_paren.id ORDER BY product.id DESC LIMIT 4";
				$data = $this->connect()->query($sql);
					return $data;
			}
			public function show_all_product_oder($type,$from,$sotin1trang){
				$sql ="SELECT product.*,catalog_paren.name name_catalog_paren from product LEFT JOIN catalog ON product.catalog_id = catalog.id LEFT JOIN catalog_paren on catalog.parent_id = catalog_paren.id order by  product.price $type LIMIT $from,$sotin1trang";
				$data = $this->connect()->query($sql);
					return $data;
			}

			public function show_all_catalog(){
				$sql="SELECT count(product.catalog_id) counts,catalog.*  FROM `catalog` LEFT JOIN product On catalog.id = product.catalog_id GROUP BY product.catalog_id order by catalog.name";
				$data=$this->connect()->query($sql);
				 return $data;
			}
			public function show_product_seach($type,$key){
				$sql="SELECT product.*,catalog.id hi ,catalog_paren.name name_catalog_paren FROM product LEFT JOIN catalog ON product.catalog_id =catalog.id LEFT JOIN catalog_paren ON catalog.parent_id = catalog_paren.id WHERE catalog_paren.name='$type'  AND product.name like '%$key%'";
				$data=$this->connect()->query($sql);
				 return $data;
			}
			public function show_product_seach_all($key){
				$sql="SELECT product.*,catalog.id hi ,catalog_paren.name name_catalog_paren FROM product LEFT JOIN catalog ON product.catalog_id =catalog.id LEFT JOIN catalog_paren ON catalog.parent_id = catalog_paren.id WHERE  product.name like '%$key%'";
				$data=$this->connect()->query($sql);
				 return $data;
			}
			public function show_all_product_by_catalogparent($thoitrang,$from,$sotin1trang){
				$sql = "SELECT product.*,catalog.id hi ,catalog_paren.name name_catalog_paren FROM product LEFT JOIN catalog ON product.catalog_id =catalog.id LEFT JOIN catalog_paren ON catalog.parent_id = catalog_paren.id WHERE catalog_paren.name='$thoitrang' ORDER BY product.id DESC LIMIT $from,$sotin1trang";
				$data=$this->connect()->query($sql);
				return $data;
			}
			public function show_all_product_by_catalog($danhmuc){
				$sql = "SELECT product.*,catalog.id hi ,catalog_paren.name name_catalog_paren FROM product LEFT JOIN catalog ON product.catalog_id =catalog.id LEFT JOIN catalog_paren ON catalog.parent_id = catalog_paren.id WHERE catalog.id =$danhmuc ";
				$data=$this->connect()->query($sql);
				return $data;
			}
			public function show_all_product_by_catalogparent_order($thoitrang,$type,$from,$sotin1trang){
				$sql = "SELECT product.*,catalog.id hi,catalog_paren.name name_catalog_paren FROM product LEFT JOIN catalog ON product.catalog_id =catalog.id LEFT JOIN catalog_paren ON catalog.parent_id = catalog_paren.id WHERE catalog_paren.name='$thoitrang'  order by product.price $type LIMIT $from,$sotin1trang" ;
				$data=$this->connect()->query($sql);
				return $data;
			}
			public function show_all_product_by_catalogparent_limit8($thoitrang){
				$sql = "SELECT  product.*,catalog.id hi,catalog_paren.name name_catalog_paren FROM product LEFT JOIN catalog ON product.catalog_id =catalog.id LEFT JOIN catalog_paren ON catalog.parent_id = catalog_paren.id WHERE catalog_paren.name='$thoitrang' limit 8";
				$data=$this->connect()->query($sql);
				return $data;
			}
			
			public function show_all_catalog_by_catalogparent($thoitrang){
				$sql = "SELECT catalog.*,count(product.catalog_id) counts FROM catalog LEFT JOIN product ON product.catalog_id = catalog.id  LEFT JOIN catalog_paren ON catalog_paren.id = catalog.parent_id WHERE catalog_paren.name='$thoitrang' GROUP by product.catalog_id ";

				$data=$this->connect()->query($sql);
				
				return $data;
			}
		
			public function show_product_new(){
				$sql="SELECT * FROM `product` order BY created DESC LIMIT 5";
				$data=$this->connect()->query($sql);
				return $data;
			}

			public function update_pass($username,$pass){
				$sql="UPDATE `user` SET `password`= '$pass' WHERE username='$username'";
				if($this->connect()->query($sql)){
					return true;
				}else{
					return false;
				}
			}
			public function update_info_user($username,$phone,$email,$address,$name){
				$sql = "UPDATE `user` SET `email`='$email',`address`='$address',`phone`='$phone',`fullname`='$name' WHERE username = '$username'";
				if($this->connect()->query($sql)){
					return true;
				}else{
					return false;
				}
			}
			public function show_product_by_id($id){
				$sql="SELECT * FROM `product` WHERE id =$id";
				$data=$this->connect()->query($sql);
				$row=$data -> fetch_assoc();
				return $row;
			}
			public function show_name_catalog_catalogparen_by_productID($id){
				$sql ="SELECT catalog.name child,catalog_paren.name paren FROM catalog LEFT JOIN catalog_paren ON catalog.parent_id = catalog_paren.id LEFT JOIN product ON product.catalog_id = catalog.id WHERE product.id = $id";
				$data=$this->connect()->query($sql);
				$row=$data -> fetch_assoc();
				return $row;
			}
			public function insert_transaction($user_id,$name,$email,$phone,$address,$amount,$message){
				$sql= "INSERT INTO `transaction`(`status`, `user_id`, `user_name`, `user_email`, `user_phone`, `address`, `amount`, `message`) VALUES (0,$user_id,'$name','$email','$phone','$address','$amount','$message')";
				$this->connect()->query($sql);
			}
			public function select_max_id_transaction(){
				$sql ="SELECT  Max(transaction.id) id from `transaction`";
				$data=$this->connect()->query($sql);
				$row= $data ->fetch_assoc();
				return $row['id'];
			}
			public function insert_oder($transaction_id,$product_id,$qty,$size,$amount){
				$sql="INSERT INTO `order`(`transaction_id`, `product_id`, `qty`, `size`, `amount`) VALUES ($transaction_id,$product_id,$qty,'$size',$amount)";
				$this->connect()->query($sql);
			}
			public function select_don_hang($user){
				$sql = "SELECT transaction.* FROM transaction LEFT JOIN user ON transaction.user_id = user.id WHERE user.username = '$user'";
				$data=$this->connect()->query($sql);
				 return $data;
			}
	}
 ?>