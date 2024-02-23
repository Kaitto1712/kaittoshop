<h5 class="text-center">Thông tin đơn hàng</h5>
<div class="row don-hang">
	<div class="col-md-12">
		<table style="width: 100%;">
			<tr>
				<th>Mã đơn hàng</th>
				<th>Tổng tiền</th>
				<th>Trạng thái</th>
			</tr>
			<?php foreach ($data as $key => $value): ?>
				<tr>
				<td><?=$value['id']?></td>
				<td><?=$value['amount']?></td>
				<td><?php if($value['status']==0){echo "Đang chờ lấy hàng";}else if($value['status']==1){echo "Đang giao hàng";}else echo "Thành công"; ?></td>
			</tr>
			<?php endforeach ?>
			
				
				
		</table>
	</div>
</div>