<?php while ($row = $data->fetch_assoc()) {  ?> 
<div class="col-md-3">
	<a href="?controller=chi-tiet&id=<?=$row['id']?>">
		<img src="<?=$row['image_link']?>" height="200px" width="100%">
		<div class="chi-tiet">
			<h5><?=$row['name']?></h5>
			<p><?=$row['name_catalog_paren']?></p>
			<?php if($row['discount']>0){ ?>
			<p class="discount"><?=number_format($row['price']+$row['discount'])?><span>₫</span></p>
			<?php } ?>
			<b class="gia"><?=number_format($row['price'])?><span><u>đ</u></span></b>
		</div>
	</a>
</div>
<?php } ?>





