<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Faktur Transaksi </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()">
<div id="laporan">
<table align="center" style="width:700px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<tr>
    <th><img class="" width="150px" 
		height="80px" src="<?php echo base_url().'assetss/images/speed.jpeg'?>"/></th>
 <th style="text-align:center;">
          <h3>BARKIESPEED </h6>
          <p>Jalan. Suekarno-Hatta No.237, Bandung</p>
          <p>Wa:0814672378427, Email:aldiwahyudi1223@gmail.com, Website:barkiespeed.online</p>
          
          </th>
          <th width="150px" 
		height="80px"></th>
</tr>
</table>

<table border="0" align="center" style="width:500px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    
</tr>
                       
</table>
<table border="0" align="center" style="width:700px;border:none; text-size 14">
    <tr>
        <th style="text-align:left;">Akun anda sudah di aktifkan dan bisa di buka melalui website http://barkiespeed.online/pengguna</th>
        
    </tr>
<tr>
    <th> </th>
</tr>
    <tr>
<?php foreach ($data->result_array() as $i):
	$nofak = $i['nofak']; ?>
        <th style="text-align:left;">No Faktur : <?php echo $nofak ?></th>
       
        <?php endforeach;?>
    </tr>
        <tr>
            <th style="text-align:left;">Password   : 123456</th>
          
        </tr>
        <tr>
            <th>
                Catatan !
            </th>
        </tr>
        <tr>
            <th>
                Apabila akun belum aktif atau kata sandi salah, Bisa hubungi kasir bengkel.
            </th>
        </tr>

</table>


</div>
</body>
</html>