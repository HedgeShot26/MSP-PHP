<section id="catalogue-admin">
		<div class="container">
			<div class="row">
				<div id="catalogue">

					<h4><b><?= $title; ?></b></h4>
					<hr>

					<a href="<?= base_url('catalogue/add') ?>" class="btn btn-primary float-right top-btn">Add Item</a>
					<div style="height:10px;"></div>

					<div class="box-table table-shadow">
						<table class="table box-table table-hover table-borderless" id="cataloguetable">
							<thead class="table-shadow title">
								<tr>
									<th>&nbsp;&nbsp;No.</th>
									<th>&nbsp;&nbsp;Product No.</th>
									<th>&nbsp;&nbsp;Name</th>
									<th>&nbsp;&nbsp;Images</th>
									<th>&nbsp;&nbsp;Category</th>
									<th>&nbsp;&nbsp;Price</th>
									<th>&nbsp;&nbsp;Quantity</th>
									<th>&nbsp;&nbsp;Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($items as $row) : ?>
									<tr class="tb-body table-shadow ">
									<td class="catalogue"></td>
										<td class="catalogue"><?= $row['Product_id'] ?></td>
										<td class="catalogue" style="text-transform: uppercase;"><?= $row['Product_Name'] ?></td>
										<td class="catalogue" style="text-align:center;">
											<img src="<?= "uploads/" . $row['Product_img'] ?>" width="150" height="150" style="border-radius:10px;">
										</td>
										<td class="catalogue"><?= $row['Category'] ?></td>
										<td class="catalogue"><?= $row['Product_Price'] ?></td>
										<td class="catalogue"> 
                                            <div class="btn-increment-decrement" onClick="decrement_quantity(<?php echo $row["Product_id"]; ?>)">-</div>
                                            <input class="input-quantity" id="input-quantity-<?php echo $row["Product_id"]; ?>" value="<?php echo $row["quantity"]; ?>">
                                            <div class="btn-increment-decrement" onClick="increment_quantity(<?php echo $item["cart_id"]; ?>)">+</div></td>
										<td class="catalogue" style="text-align:center;"><?php $row['Product_Price']*$row["quantity"] ?>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

        
<script>
function increment_quantity(cart_id) {
    var inputQuantityElement = $("#input-quantity-");
    var newQuantity = parseInt($(inputQuantityElement).val())+1;
}

function decrement_quantity(cart_id) {
    var inputQuantityElement = $("#input-quantity-");
    if($(inputQuantityElement).val() > 1) 
    {
    var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
    }
}

</script>
