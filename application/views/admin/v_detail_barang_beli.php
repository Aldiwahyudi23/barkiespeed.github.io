					<?php 
						error_reporting(0);
						$b=$brg->row_array();
					?>
					<table style="font-size:12px;">
						<tr>
		                    <th></th>
		                    <th>Nama Barang</th>
		                    <th>Harga Pokok</th>
		                    <th>Harga Jual</th>
		                    <th>Jumlah</th>
		                </tr>
						<tr>
							<td></th>
							<td><input type="text" name="nabar" value="<?php echo $b['barang_nama'];?>" style="width:160px;margin-right:5px;" class="form-control input-sm" readonly>
		                    <input type="hidden" name="satuan" value="<?php echo $b['barang_satuan'];?>" style="width:50px;margin-right:5px;" class="form-control input-sm" readonly></td>
		                    <td><input type="text" name="harpok" value="<?php echo $b['barang_harpok'];?>" style="width:80px;margin-right:5px;" class="form-control input-sm" required></td>
		                    <td><input type="text" name="harjul" value="<?php echo $b['barang_harjul_grosir'];?>" style="width:80px;margin-right:5px;" class="form-control input-sm" required></td>
		                    <td><input type="text" name="jumlah" id="jumlah" class="form-control input-sm" style="width:50px;margin-right:5px;" required></td>
		                    <td><button type="submit" class="btn btn-sm btn-primary">Ok</button></td>
						</tr>
					</table>
					