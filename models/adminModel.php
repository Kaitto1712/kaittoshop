<?php 
	class adminModel extends db {
		function select_transaction($status){
			$sql ="SELECT transaction.*,user.username,user.fullname,user.email,user.address address2,user.phone FROM `transaction` LEFT JOIN user on user.id = transaction.user_id WHERE status = $status";
			$data = $this->connect()->query($sql);
			return $data;
		}
		function select_count_transaction($status){
			$sql ="SELECT count(*) temp FROM `transaction` LEFT JOIN user on user.id = transaction.user_id WHERE status = $status";
			$data = $this->connect()->query($sql);
			$row=$data -> fetch_assoc();
			return $row['temp'];
		}
		public function select_order($id_transacsion){
			$sql ="SELECT `order`.*,product.name,product.image_link FROM `order` LEFT JOIN product ON product.id = `order`.`product_id` WHERE `order`.`transaction_id` = $id_transacsion";
			$data = $this->connect()->query($sql);
			return $data;
		}
		public function delete_transaction($id){
			$sql ="DELETE FROM `transaction` WHERE `id` = $id";
			$this->connect()->query($sql);
		}
		public function update_transaction($id,$status){
			$sql ="UPDATE `transaction` SET `status` = $status WHERE `id` = $id";
			$this->connect()->query($sql);
		}
		public function select_product_by_id($id){
			$sql="SELECT * FROM `product` WHERE id =$id";
				$data = $this->connect()->query($sql);
				$row=$data -> fetch_assoc();
				return $row;
		}
		function select_catalog($id){
			$sql ="SELECT * FROM `catalog` WHERE `parent_id` = $id";
			$data = $this->connect()->query($sql);
			while ($row = $data->fetch_assoc()) {
			        $results[] = $row;
			    }   
			   echo json_encode($results);
		}
		function select_all_catalog(){
			$sql ="SELECT * FROM `catalog` ";
			$data = $this->connect()->query($sql);
			while ($row = $data->fetch_assoc()) {
			        $results[] = $row;
			    }   
			   echo json_encode($results);
		}
		public function show_product_by_id($id){
					$sql="SELECT * FROM `product` WHERE id =$id";
				$data = $this->connect()->query($sql);
			while ($row = $data->fetch_assoc()) {
			        $results[] = $row;
			    }   
			   echo json_encode($results);
		}
		public function select_product(){
			$sql = "SELECT product.* , catalog.name name_catalog from product LEFT JOIN catalog ON catalog_id = catalog.id";
			$data = $this->connect()->query($sql);
			return $data;
		}
		public function add_product($catalog_id,$name,$price,$dismount,$img_link,$img_link1,$img_link2,$img_link3,$describes){
			$sql = "INSERT INTO `product`(`catalog_id`, `name`, `price`, `discount`,
			 	`image_link`, `image_link1`, `image_link2`, `image_link3`, `describes`) 
			 	VALUES ($catalog_id,'$name',$price,$dismount,'$img_link','$img_link1','$img_link2','$img_link3','$describes')";
			$data = $this->connect()->query($sql);
			return $data;
		}
		public function update_product_id($catalog_id,$name,$price,$dismount,
		$img_link,$img_link1,$img_link2,$img_link3,$describes,$id){
			$sql= "UPDATE `product` SET `catalog_id`=$catalog_id,`name`='$name',`price`=$price,`discount`=$dismount,
				`image_link`='$img_link',`image_link1`='$img_link1',`image_link2`='$img_link2',`image_link3`='$img_link3',
				`describes`='$describes' WHERE id = $id";
			if($this->connect()->query($sql)){
				return true;
			}else{
				return false;
			}
		}
		public function delete_product($id){
			$sql ="DELETE FROM `product` WHERE `id` = $id";
			$this->connect()->query($sql);
		}
		public function delete_table_id($table,$id){
			$sql ="DELETE FROM `$table` WHERE id = $id";
			if($this->connect()->query($sql)){
				return true;
			}else{
				return false;
			}
		}
		public function show_all_catalog_catalogparen(){
			$sql ="SELECT catalog.*,catalog_paren.name name_paren FROM `catalog` LEFT JOIN catalog_paren ON catalog_paren.id = catalog.`parent_id`";
			$data = $this->connect()->query($sql);
			return $data;
		}
		public function insert_catalog($paren_id,$name){
			$sql="INSERT INTO `catalog`( `parent_id`, `name`) VALUES ($paren_id,'$name')";
			if($this->connect()->query($sql)){
				return true;
			}else{
				return false;
			}
		}
		public function update_catalog($id,$id_paren,$name_catalog){
			$sql="UPDATE `catalog` SET `parent_id`=$id_paren,`name`='$name_catalog' WHERE id= $id";
			if($this->connect()->query($sql)){
				return true;
			}else{
				return false;
			}
		}
		public function delete_catalog($id){
			$sql="DELETE FROM `catalog` WHERE id=$id";
			$this->connect()->query($sql);
		}
			public function show_catalog_by_id($id){
				$sql="SELECT catalog.*,catalog_paren.name name_paren FROM `catalog` LEFT JOIN catalog_paren ON catalog_paren.id = catalog.`parent_id` where catalog.id=$id";
				$data = $this->connect()->query($sql);
			while ($row = $data->fetch_assoc()) {
			    $results[] = $row;
			}   
			echo json_encode($results);
		}
		public function select_user(){
			$sql="SELECT * FROM `user` ";
			$data = $this->connect()->query($sql);
			while ($row = $data->fetch_assoc()) {
			        $results[] = $row;
			    }   
			   echo json_encode($results);
		}
		public function delete_user($id){
			$sql = "DELETE FROM `user` WHERE id=$id";
			if($this->connect()->query($sql)){
				return true;
			}else{
				return false;
			}
		}
		public function count_table($table){
			$sql = "SELECT count(*) temp FROM `$table` ";
			$data = $this->connect()->query($sql);
			$row=$data -> fetch_assoc();
			return $row['temp'];
		}
		public function total_month(){
			$sql="SELECT SUM(transaction.amount) as tongtien FROM transaction WHERE MONTH(transaction.created)  = MONTH(CURDATE())";
			$data = $this->connect()->query($sql);
			$row=$data -> fetch_assoc();
			return $row;
		}
		public function total_day(){
			$sql="SELECT SUM(transaction.amount) as tongtien FROM transaction WHERE DAY(transaction.created)  = DAY(CURDATE())";
			$data = $this->connect()->query($sql);
			$row=$data -> fetch_assoc();
			return $row;
		}
		public function total_year(){
			$sql="SELECT SUM(transaction.amount) as tongtien FROM transaction WHERE YEAR(transaction.created) = YEAR(CURDATE())";
			$data = $this->connect()->query($sql);
			$row=$data -> fetch_assoc();
			return $row;
		}
	}
?>