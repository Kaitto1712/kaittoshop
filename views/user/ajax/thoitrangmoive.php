 <?php 
 while ($row = $data->fetch_assoc()) {  ?>
 <div class="col-md-12 main-vip">
 	<a href="?controller=chi-tiet&id=<?=$row['id']?>" style="color: black;">
 		<div class="row">
 		<div class="col-md-4">
 			<img src="<?=$row['image_link']?>" height="80px" width="80px">
 		</div>
 		<div class="col-md-8">
 			<p><?=$row['name']?></p>
 			<p><?=number_format($row['price'])?><span>đ</span></p>
 		</div>
 	</div>
 	</a>
 </div>
 <?php } ?>