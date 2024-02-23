<p>Mã đơn hàng :<?=$id?></p>
<table style="width: 100%;" class="table table-bordered">
	<tr>
		<th>STT</th>
		<th>Mã hàng</th>
		<th>Tên hàng</th>
		<th>Hình ảnh</th>
		<th>Size</th>
		<th>Số lượng</th>
		<th>Tổng tiền</th>
	</tr>
	<?php foreach ($data as $key => $value) :?>
		<tr>
			<td><?=$key+1?></td>
			<td><?=$value['product_id']?></td>
			<td><?=$value['name']?></td>
			<td><img height="100px" src="<?=$value['image_link']?>"></td>
			<td><?=$value['size']?></td>
			<td><?=$value['qty']?></td>
			<td><?=number_format($value['amount'])?></td>
		</tr>
	<?php endforeach ?>
</table>