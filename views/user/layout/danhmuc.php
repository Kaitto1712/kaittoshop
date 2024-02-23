<div class="col-md-3 main-left">
	<h2>Danh mục sản phẩm</h2>
	<ul>
		<?php 
		while ($row = $catalog->fetch_assoc()) {  ?>
			<li><p onclick="changeDM(<?=$row['id']?>)" style="display: inline;cursor: pointer;"><?=$row['name']?></p>
			<span><?=$row['counts']?></span></li>
		<?php } ?>
	</ul>
	<div class="vip">
		<h2>Sản phẩm mới</h2>
		<div class="row" id="vip">
			
		</div>
	</div>
</div>
