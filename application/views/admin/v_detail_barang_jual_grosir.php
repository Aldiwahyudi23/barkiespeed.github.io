					<?php 
						error_reporting(0);
						$b=$brg->row_array();
					?>
					<table style="font-size:12px;">
						<tr>
		                    <th ></th>
		                    <th>Nama Barang</th>
		                    <th>Stok</th>
		                    <th>Harga</th>
		                    <th>Diskon</th>
		                    <th>Jumlah</th>
		                </tr>
						<tr>
							<td ></th>
							<td><input type="text" name="nabar" value="<?php echo $b['barang_nama'];?>" style="width:140px;margin-right:5px;" class="form-control input-sm" readonly>
		                    <input type="hidden" name="satuan" value="<?php echo $b['barang_satuan'];?>" style="width:50px;margin-right:5px;" class="form-control input-sm" readonly></td>
		                    <td><input type="text" name="stok" value="<?php echo $b['barang_stok'];?>" style="width:50px;margin-right:5px;" class="form-control input-sm" readonly></td>
		                    <td><input type="text" name="harjul" value="<?php echo number_format($b['barang_harjul_grosir']);?>" style="width:70px;margin-right:5px;text-align:right;" class="form-control input-sm" readonly></td>
		                    <td><input type="number" name="diskon" id="diskon" value="0" min="0" class="form-control input-sm" style="width:50px;margin-right:5px;" required></td>
		                    <td><input type="number" name="qty" id="qty" value="1" min="1" max="<?php echo $b['barang_stok'];?>" class="form-control input-sm" style="width:50px;margin-right:5px;" required></td>
		                    <td><button type="submit" class="btn btn-sm btn-primary">Ok</button></td>
						</tr>
					</table>
					