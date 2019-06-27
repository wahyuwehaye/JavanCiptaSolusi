<html>
	<head>
		<title>Kalkulator</title>
	</head>
	<body>
		<h3>Kalkulator Sederhana Dengan Codeigniter</h3>
		<form action="C_kalkulator/hasilnya" method="post">
			<table border="0">
				<tr>
					<td>Angka 1</td>
					<td><input type="text" name="x" value="<?php echo $x; ?>" /></td>
				</tr>
				<tr>
					<td>Pilihan</td>
					<td><select name="pilihan">
					<option value="pilih">-pilih-</option>
					<option value="tambah">tambah</option>
					<option value="kurang">kurang</option>
					<option value="kali">kali</option>
					<option value="bagi">bagi</option>
					</select>
					</td>
				</tr>
				<tr>
					<td>Angka 2</td>
					<td><input type="text" name="y" value="<?php echo $y; ?>" /></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Hitung Hasilnya" /></td>
				</tr>
				<tr>
					<td>Hasilnya</td>
					<td><input type="text" name="hasilhitung" id="hasil" value="<?php echo $hasilnya; ?>"></td>
				</tr>
			</table>
		</form>
		<a href="<?php echo base_url() ?>hitung" type="button" >Reset Perhitungan</a>
	</body>
</html>