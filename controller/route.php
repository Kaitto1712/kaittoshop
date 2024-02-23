<?php 
session_start();
include ('models/userModel.php');
include ('models/masterModel.php');
include ('models/adminModel.php');
$userModel = new userModel();
$masterModel = new masterModel();
$adminModel = new adminModel();
if(isset($_GET['controller'])){
	$control = $_GET['controller'];
}else{$control = 'trang-chu';
}
if(isset($_GET['action'])){
	$action = $_GET['action'];
}else $action = '';
$sotin1trang = 12;
	switch ($control) {
		case 'ajax':
			$page =isset($_GET['page'])?$_GET['page']:1;
				$from = ($page-1)*$sotin1trang;
			switch ($action) {
					case 'dang-ky':
						$user =$_POST['user'];
						$phone = $_POST['phone'];
						$pass = $_POST['pass'];
						$name=$_POST['name'];
						$address= $_POST['address'];
						if($masterModel->select_user($user)){
							if($masterModel->insert_user($user,$pass,$name,$address,$phone)){
								echo "<div class='alert alert-success mt-3'><strong>Thông báo!</strong> Đăng ký thành công .</div>";
							}else{
								echo "<div class='alert alert-danger mt-3'><strong>Thông báo!</strong> Đăng ký thất bại .</div>";
							}
						}else{
							echo "<div class='alert alert-danger mt-3'><strong>Thông báo!</strong> Tài khoản đã tồn tại .</div>";
						}
						break;
					case 'cua-hang':
						if(isset($_GET['type'])){
							$type = $_GET['type'];
							if($type=='default'){
									$data=  $userModel->show_all_product($from,$sotin1trang);
							}else{
								$data=$userModel->show_all_product_oder($type,$from,$sotin1trang);
							}
						}else{
							$data=  $userModel->show_all_product($from,$sotin1trang);
						}
						include('views/user/ajax/cuahang.php');
						break;
					case 'thoi-trang-nam':
						if(isset($_GET['type'])){
							$type = $_GET['type'];
							if($type=='default'){
									$data=  $userModel->show_all_product_by_catalogparent('Thời trang nam',$from,$sotin1trang);
							}else{
								$data=  $userModel->show_all_product_by_catalogparent_order('Thời trang nam',$type,$from,$sotin1trang);
							}
						}else{
							$data=  $userModel->show_all_product_by_catalogparent('Thời trang nam',$from,$sotin1trang);
						}
						include('views/user/ajax/thoitrang.php');
						break;
					case 'thoi-trang-nu':
						if(isset($_GET['type'])){
							$type = $_GET['type'];
							if($type=='default'){
									$data=  $userModel->show_all_product_by_catalogparent('Thời trang nữ',$from,$sotin1trang);
							}else{
								$data=  $userModel->show_all_product_by_catalogparent_order('Thời trang nữ',$type,$from,$sotin1trang);
							}
						}else{
							$data=  $userModel->show_all_product_by_catalogparent('Thời trang nữ',$from,$sotin1trang);
						}
						include('views/user/ajax/thoitrang.php');
						break;
					case 'phu-kien':
						if(isset($_GET['type'])){
							$type = $_GET['type'];
							if($type=='default'){
									$data=  $userModel->show_all_product_by_catalogparent('Phụ kiện',$from,$sotin1trang);
							}else{
								$data=  $userModel->show_all_product_by_catalogparent_order('Phụ kiện',$type,$from,$sotin1trang);
							}
						}else{
							$data=  $userModel->show_all_product_by_catalogparent('Phụ kiện',$from,$sotin1trang);
						}
						include('views/user/ajax/thoitrang.php');
						break;
					case 'cuahang-order':
						$type = $_GET['type'];
						if($type=='default'){
							$data=$userModel->show_all_product($from,$sotin1trang);
						}else{
							$data=$userModel->show_all_product_oder($type,$form,$sotin1trang);
						}
						include('views/user/ajax/cuahang.php');
						break;
					case 'danh-muc':
						if(isset($_GET['type'])){
							$data=  $userModel->show_all_product_by_catalog($_GET['type']);
							include('views/user/ajax/cuahang.php');
						}
						break;
					case 'seach':
						if(isset($_GET['type'])&&isset($_GET['key'])){
							$key = $_GET['key'];
							switch ($_GET['type']) {
								case 'thoi-trang-nam':
									$type='Thời trang nam';
									$data=  $userModel->show_product_seach($type,$key);
									break;
								case 'thoi-trang-nu':
									$type='Thời trang nữ';
									$data=  $userModel->show_product_seach($type,$key);
									break;
								case 'phu-kien':
									$type='Phụ kiện';
									$data=  $userModel->show_product_seach($type,$key);
									break;
								case 'cua-hang':
									$data=  $userModel->show_product_seach_all($key);
									break;
							}
							include('views/user/ajax/thoitrang.php');
						}
						break;
					case 'product-new':
						$data=  $userModel->show_4_product_new();
						include('views/user/ajax/thoitrangmoive.php');
						break;
					case 'footer':
						$catalog_nu = $userModel->show_all_catalog_by_catalogparent('Thời trang nữ');
						$catalog_nam = $userModel->show_all_catalog_by_catalogparent('Thời trang nam');
						$catalog_phukien = $userModel->show_all_catalog_by_catalogparent('Phụ kiện');
						include('views/user/ajax/footer.php');
						break;
					default:
						# code...
						break;
				}
			break;
		case 'gioi-thieu':
			include('views/user/gioithieu.php');
			break;
		case 'cua-hang':
			$breadcrumb = 'Cửa hàng';
			$catalog = $userModel->show_all_catalog();	
			include('views/user/cuahang.php');
			break;
		case 'thoi-trang-nu':
			$breadcrumb = 'Thời trang nữ ';
			$catalog = $userModel->show_all_catalog_by_catalogparent('Thời trang nữ');
			include('views/user/thoi-trang.php');
			break;
		case 'phu-kien':
			$breadcrumb = 'Phụ kiện';
			$catalog = $userModel->show_all_catalog_by_catalogparent('Phụ kiện');
			include('views/user/thoi-trang.php');
			break;
		case 'thoi-trang-nam':
			$breadcrumb = 'Thời trang nam ';
			$catalog = $userModel->show_all_catalog_by_catalogparent('Thời trang nam');
			include('views/user/thoi-trang.php');
			break;
		case 'tai-khoan':
			switch ($action) {
				case 'dang-xuat':
					unset($_SESSION['user']);
					header('Location:?controller=tai-khoan');
					break;
				case 'doi-mat-khau':
					if(isset($_POST['submit'])){
						$pass = $_POST['pass'];
						$pass1 = $_POST['pass1'];
						$pass2 = $_POST['pass2'];
						if($pass!=$_SESSION['user']['password']){
							$_SESSION['err'] = "<div class='alert alert-danger'><strong>Lỗi !</strong>* Mật khẩu cũ không chính xác .</div>";
						}else if($pass1!=$pass2){
							$_SESSION['err'] = "<div class='alert alert-success'><strong>Lỗi !</strong>* Nhập lại mật khẩu không chính xác.</div>";
						}else{
							$userModel->update_pass($_SESSION['user']['username'],$pass1);
							$_SESSION['user'] = $masterModel->show_user($_SESSION['user']['username']);
							$_SESSION['err'] = "<div class='alert alert-success'><strong>Thành công!</strong> Đổi mật khẩu thành công </div> ";
						}
					}
					break;
				default:
					header('Location:?controller=tai-khoan&action=thong-tin-ca-nhan');
					break;
				case 'thong-tin-ca-nhan':
					if(isset($_POST['submit'])){
						$phone = $_POST['phone'];
						$email = $_POST['email'];
						$address  = $_POST['address'];
						$name  = $_POST['name'];
						if($userModel->update_info_user($_SESSION['user']['username'],$phone,$email,$address,$name)){
							$_SESSION['user'] = $masterModel->show_user($_SESSION['user']['username']);
							$_SESSION['sussess'] ="<p class='alert alert-success'>Cập nhật thành công </p>";			
						}else{
							$_SESSION['sussess'] ="<p class='alert alert-danger'>Cập nhật thất bại </p>";
						}
					}
					break;
				case 'don-hang':
					break;
				}
					if(isset($_POST['login'])){
						$user= $_POST['user'];
						$pass=$_POST['pass'];
						if($masterModel->login($user,$pass)){
							$_SESSION['user'] = $masterModel->show_user($user);
							if($_SESSION['user']['level']==2){
								header('Location:?controller=admin');
							}else{
								if($action=="dat-hang"){
								header('Location:?controller=dat-hang');
									}else{
										include('views/user/tai-khoan.php');
									}
							}
						}else{
							$_SESSION['err'] = "Thông tin tài khoản hoặc mật khẩu không chính xác";
							include('views/user/tai-khoan.php');
						}	
					}else{
						include('views/user/tai-khoan.php');
					}
			break;
		case 'gio-hang':
					switch ($action) {
						case 'delete_cart':
							if(isset($_SESSION['cart'])){
								$id = $_GET['id'];
								unset($_SESSION['cart'][$id]);
								header('Location:?controller=gio-hang');
							}
							break;
						case 'update_cart':					
							if(isset($_POST['id'])&&isset($_POST['number'])){
									$id = $_POST['id'];
									$number = $_POST['number'];
									$cart = $_SESSION['cart'];
									if(array_key_exists($id,$cart)){
										if($number>0){
											$cart[$id] = array(
												'name' => $cart[$id]['name'],
												'id' => $cart['id'],
												'number' => $number,
												'price' =>$cart[$id]['price'],
												'img' =>$cart[$id]['img'],
												'size' =>$cart[$id]['size']
											);
										}else{
											unset($cart[$id]);
										}
									}
									$_SESSION['cart'] = $cart;}
							break;
						default:
							include ('views/user/gio-hang.php');
							break;
					}
			break;
		case 'trang-chu':		
			$data1=  $userModel->show_all_product_by_catalogparent_limit8('Thời trang nữ');
			$data2=  $userModel->show_all_product_by_catalogparent_limit8('Thời trang nam');
			$data3=  $userModel->show_all_product_by_catalogparent_limit8('Phụ kiện');
			include('views/user/index.php');
			break;
		case 'chi-tiet':
			if(isset($_GET['id'])&&is_numeric($_GET['id'])){
					$id = $_GET['id'];
						if($data = $userModel->show_product_by_id($id)){
							$breadcrumb = $userModel->show_name_catalog_catalogparen_by_productID($id);
							if(isset($_GET['cart'])){
										if(isset($_POST['id'])&&isset($_POST['number'])&&isset($_POST['size'])){
											$number = $_POST['number'];
											$size =$_POST['size'];
											if(!isset($_SESSION['cart'])){
												$cart= array();
												$cart[$id]= array(
													'name'=>$data['name'],
													'id' => $data['id'],
													'number'=>$number,
													'price' => $data['price'],
													'img' =>$data['image_link'],
													'size' =>$size
												);
											}else{
												$cart = $_SESSION['cart'];
												if(array_key_exists($id, $cart)){
													$cart[$id]= array(
													'name'=>$data['name'],
													'id' => $data['id'],
													'number'=>(int)$cart[$id]['number']+$number,
													'price' => $data['price'],
													'img' =>$data['image_link'],
													'size' =>$size
													);
												}else{
													$cart[$id]= array(
													'name'=>$data['name'],
													'id' => $data['id'],
													'number'=>$number,
													'price' => $data['price'],
													'img' =>$data['image_link'],
													'size' =>$size
													);
												}
											}
											$_SESSION['cart'] =$cart;
											echo "<pre>";
											print_r($_SESSION['cart']);
										}
									}
							include('views/user/chi-tiet-sp.php');
						}else{
							header('Location:?controller=trang-chu');
						}
					}else{
					header('Location:?controller=trang-chu');
				}
			break;
		case 'dat-hang':
			if(isset($_POST['submit'])){
				if(isset($_SESSION['cart'])){
					$message = isset($_POST['comment'])?$_POST['comment']:'';
					$amount = 0;
					foreach ($_SESSION['cart'] as $key => $value) {
						 $amount += $value['number'] * $value['price'];
					}
					if(isset($_SESSION['user'])){
						$user_id = $_SESSION['user']['id'];
						$userModel->insert_transaction($user_id,'','','','',$amount,$message);
						$transaction_id = $userModel->select_max_id_transaction();
						foreach ($_SESSION['cart'] as $key => $value) {
							$userModel->insert_oder($transaction_id,$value['id'],$value['number'],$value['size'],$value['price']*$value['number']);
						}
						include('views/user/dat-hang-ok.php');
						unset($_SESSION['cart']);
						break;
					}else{
						$name = $_POST['name'];
						$phone = $_POST['phone'];
						$email = $_POST['email'];
						$address = $_POST['address'];
						$userModel->insert_transaction('NULL',$name,$email,$phone,$address,$amount,$message);
						$transaction_id = $userModel->select_max_id_transaction();
						foreach ($_SESSION['cart'] as $key => $value) {
							$userModel->insert_oder($transaction_id,$value['id'],$value['number'],$value['size'],$value['price']*$value['number']);
						}
						include('views/user/dat-hang-ok.php');
						unset($_SESSION['cart']);
						break;
					}
				}
			}			
			include('views/user/dat-hang.php');
			break;
			case 'lien-he':
				include('views/user/lienhe.php');
				break;
		case 'admin':
			if(isset($_SESSION['user'])&&$_SESSION['user']['level']==2){
				include('views/admin/layout/header.php');
				switch ($action) {
					case 'trang-chu':
						$count_donhangcho = $adminModel->select_count_transaction(0);
						$count_donhanggui = $adminModel->select_count_transaction(1);
						$count_donhangok = $adminModel->select_count_transaction(2);
						$count_product = $adminModel->count_table('product');
						$count_catalog = $adminModel->count_table('catalog');
						$count_user = $adminModel->count_table('user');
						$day = $adminModel->total_day();
						$month = $adminModel->total_month();
						$year = $adminModel->total_year();
						include('views/admin/dashboard.php');	
						break;
					case 'don-hang-moi':
						if(isset($_GET['param'])){
							$param = $_GET['param'];
								switch ($param) {
									case 'delete':
										$id = $_GET['id'];
										$adminModel->delete_transaction($id);
										break;
									case 'update':
										$id = $_GET['id'];
										$adminModel->update_transaction($id,1);
										break;
								}
						}
						$data=$adminModel->select_transaction(0);
						include('views/admin/donhang/danhsachcho.php');	
						break;
					case 'dang-gui':
						if(isset($_GET['param'])){
							$param = $_GET['param'];
								switch ($param) {
									case 'delete':
										$id = $_GET['id'];
										$adminModel->delete_transaction($id);
										break;
									case 'update':
										$id = $_GET['id'];
										$adminModel->update_transaction($id,2);
										break;
								}
						}
						$data=$adminModel->select_transaction(1);
						include('views/admin/donhang/danggui.php');	
						break;
					case 'da-nhan':
						$data=$adminModel->select_transaction(2);
						include('views/admin/donhang/danhan.php');	
						break;
					case 'show-product':
							$data=$adminModel->select_product();
							foreach ($data as $key => $value) {$count=$value['id']+1;}
						include('views/admin/mathang/danhsach.php');	//show-product
						break;
					case 'show-catalog':
						include('views/admin/danhmuc/danhsach.php');
						break;
					case 'add-catalog':
						include('view/admin/danhmuc/themmoi.php');
						break;
					case 'show-user':
						include('views/admin/acount/danhsach.php');
						break;
					case 'dang-xuat':
						session_destroy();
						echo "<script type=\"text/javascript\">location.reload();</script>";
						break;
					default:
						$count_donhangcho = $adminModel->select_count_transaction(0);
						$count_donhanggui = $adminModel->select_count_transaction(1);
						$count_donhangok = $adminModel->select_count_transaction(2);
						$count_product = $adminModel->count_table('product');
						$count_catalog = $adminModel->count_table('catalog');
						$count_user = $adminModel->count_table('user');
						$day = $adminModel->total_day();
						$month = $adminModel->total_month();
						$year = $adminModel->total_year();
							include('views/admin/dashboard.php');
						break;
					}
					include('views/admin/layout/footer.php');
				}else{
				header('Location:?controller=trang-chu');
			}
			break;
		case 'admin-ajax':
		if(isset($_SESSION['user'])&&$_SESSION['user']['level']==2){
				switch ($action) {
						case 'danhmuc':
							include('views/admin/layout/danhmuc.php');
							break;
						case 'chi-tiet-don-hang':
							$id = isset($_GET['id'])?$_GET['id']:0;
							$data=$adminModel->select_order($id);
							include('views/admin/donhang/modal_donhang.php');
							break;
						case 'danh-sach-catalog':
							$id = isset($_GET['id'])?$_GET['id']:1;
							$adminModel->select_catalog($id);
							break;
						case 'show-all-product':
							$data=$adminModel->select_product();
						case 'add-product':
							$name = $_POST['name'];
							$catalog_id = isset($_POST['catalog_id'])?$_POST['catalog_id']:'null';
							$price = $_POST['price'];
							$dismount = $_POST['dismount'];
							$img_link =$_FILES['img_link'];
							$describes = $_POST['describes'];
							if($catalog_id=="null"){
								echo "<div class='alert alert-danger'>Vui lòng chọn Danh mục </div>";
							}else{
								if($masterModel->link_img($img_link['name'])!=false){
										$path=$masterModel->link_img($img_link['name']);
									if($_FILES['img_link1']['name']!==""){
										$img_name1 = "upload/img/".rand().$_FILES['img_link1']['name'];
										move_uploaded_file($_FILES['img_link1']['tmp_name'], $img_name1);
									}else{
										$img_name1 = $path;
									}
									if($_FILES['img_link2']['name']!==""){
										$img_name2 = "upload/img/".rand().$_FILES['img_link2']['name'];
										move_uploaded_file($_FILES['img_link2']['tmp_name'], $img_name2);
									}else{
										$img_name2 = $path;
									}
									if($_FILES['img_link3']['name']!==""){
										$img_name3 = "upload/img/".rand().$_FILES['img_link3']['name'];
										move_uploaded_file($_FILES['img_link3']['tmp_name'], $img_name3);
									}else{
										$img_name3 = $path;
									}
										if($adminModel->add_product($catalog_id,$name,$price,$dismount,$path,$img_name1,$img_name2,$img_name3,$describes)){
											move_uploaded_file($_FILES['img_link']['tmp_name'], $path);
												echo '<script type="text/javascript">swal("Thông báo!", "Thêm thành công", "success")</script>';
										}else{
											echo "<div class='alert alert-danger'>Lỗi ! vui lòng thử lại sau </div>";
										}
								}else{
									echo "<div class='alert alert-danger'>Vui lòng chọn file ảnh PNG , JPEG , JPG , GIF </div>";
								}
							}
							break;
						case 'show_product_id':
							if(isset($_POST['id'])){
								$id= $_POST['id'];
								$adminModel->show_product_by_id($id);
							}
							break;
						case 'select_all_catalog':
							$adminModel->select_all_catalog();
							break;
						case 'update_product':
							$id = $_POST['id'];
							$data = $adminModel->select_product_by_id($id);
							$name = $_POST['name'];
							$catalog_id = isset($_POST['catalog_id'])?$_POST['catalog_id']:'null';
							$price = $_POST['price'];
							$dismount = $_POST['dismount'];
							$img_link =$_FILES['img_link'];
							$describes = $_POST['describes'];
							if($catalog_id=="null"){
								echo "<div class='alert alert-danger'>Vui lòng chọn Danh mục </div>";
							}else{
									if($_FILES['img_link']['name']!==""){
										$img_name = "upload/img/".rand().$_FILES['img_link']['name'];
										move_uploaded_file($_FILES['img_link']['tmp_name'], $img_name);
									}else{
										$img_name = $data['image_link'];
									}
									if($_FILES['img_link1']['name']!==""){
										$img_name1 = "upload/img/".rand().$_FILES['img_link1']['name'];
										move_uploaded_file($_FILES['img_link1']['tmp_name'], $img_name1);
									}else{
										$img_name1 = $data['image_link1'];
									}
									if($_FILES['img_link2']['name']!==""){
										$img_name2 = "upload/img/".rand().$_FILES['img_link2']['name'];
										move_uploaded_file($_FILES['img_link2']['tmp_name'], $img_name2);
									}else{
										$img_name2 = $data['image_link2'];
									}
									if($_FILES['img_link3']['name']!==""){
										$img_name3 = "upload/img/".rand().$_FILES['img_link3']['name'];
										move_uploaded_file($_FILES['img_link3']['tmp_name'], $img_name3);
									}else{
										$img_name3 = $data['image_link3'];
									}
										if($adminModel->update_product_id($catalog_id,$name,$price,$dismount,$img_name,$img_name1,$img_name2,$img_name3,$describes,$id)){
												echo '<script type="text/javascript">swal("Thông báo!", "Sửa thành công", "success")</script>';			
										}else{
											echo "<div class='alert alert-danger'>Lỗi ! vui lòng thử lại sau </div>";
										}
							}
							break;
						case 'delete_product':
						if(isset($_POST['id'])){
								$id=$_POST['id'];
								$adminModel->delete_table_id("product",$id);
							}
						break;
						case 'show_all_catalog':
							$data=$adminModel->show_all_catalog_catalogparen();
							foreach ($data as $key => $value) {
								echo " <tr>
                                <td>".$value['id']."</td>
                                <td>$value[name]</td>
                                <td>$value[name_paren]</td>
                                <td><button data='$value[id]'  class='btn btn-danger btn_delete_catalog'>Xoá</button></td>
                                <td><button data='$value[id]'  class='btn btn-success btn_update_catalog'>Sửa</button></td>
                         	   </tr>";
							}
							break;
						case 'add_catalog':
							if(isset($_POST['id'])&&isset($_POST['catalog'])){
								$id = $_POST['id'];
								$catalog =$_POST['catalog'];
								if($adminModel->insert_catalog($id,$catalog)){
									echo '<script type="text/javascript">swal("Thông báo!", "Thêm thành công", "success")</script>';
								}else{
									echo "<div class='alert alert-danger'>Lỗi ! vui lòng thử lại sau </div>";
								}
							}
							break;
						case 'delete_catalog':
							if(isset($_POST['id'])){
								$adminModel->delete_catalog($_POST['id']);
							}
							break;
						case 'show_catalog_id':
						if(isset($_POST['id'])){
							$adminModel->show_catalog_by_id($_POST['id']);
						}
							break;
						case 'update_catalog':
							if(isset($_POST['id_catalog_paren'])&&isset($_POST['name_catalog'])&&isset($_POST['id'])){
								$id_catalog_paren = $_POST['id_catalog_paren'];
								$name_catalog = $_POST['name_catalog'];	
								$id = $_POST['id'];
								if($adminModel->update_catalog($id,$id_catalog_paren,$name_catalog)){
									echo '<script type="text/javascript">swal("Thông báo!", "Thêm thành công", "success")</script>';
								}else{
									echo "<div class='alert alert-danger'>Lỗi ! vui lòng thử lại sau </div>";
								}
							}
							break;
						case 'select_user':
							$adminModel->select_user();		
							break;
						case 'delete_user':
							if(isset($_POST['id'])){
								$adminModel->delete_user($_POST['id']);
							}		
							break;
						case 'check-user':

							if(isset($_POST['user'])){
								if( $masterModel->select_user($_POST['user'])){
								 	echo "1";
								}else{echo "0";}
							}
							break;
						case 'add_user':
							if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['address'])&&isset($_POST['phone'])&&isset($_POST['level'])){
								$username = $_POST['username'];
								$password = $_POST['password'];
								$name = $_POST['name'];
								$email = $_POST['email'];
								$address = $_POST['address'];
								$phone = $_POST['phone'];
								$level = $_POST['level'];	
								$masterModel->insert_user2($username,$password,$name,$email,$address,$phone,$level);
							}
							break;
						case 'select_user_id':
							if(isset($_POST['id'])){
								$masterModel->show_user_by_id($_POST['id']);
							}
							break;
						case 'update_user_id':
							if(isset($_POST['id'])){
								$id = $_POST['id'];
								$password = $_POST['password'];
								$name = $_POST['name'];
								$email = $_POST['email'];
								$address = $_POST['address'];
								$phone = $_POST['phone'];
								$level = $_POST['level'];	
								$masterModel->update_user_id($id,$password,$name,$email,$address,$phone,$level);
							}
							break;
						default:
							# code...
							break;
					}	
			}
			break;
		default:
			header('Location:?controller=trang-chu');
			break;
	}
 ?>