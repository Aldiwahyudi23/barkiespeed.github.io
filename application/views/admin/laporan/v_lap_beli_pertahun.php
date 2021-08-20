<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>laporan data stok barang</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()">
<div id="laporan">
<table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<!--<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>-->
</table>
<?php 
    $b=$jml->row_array();
?>

<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
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
 
<table border="0" align="center" style="width:900px;border:none;">
        <tr>
            <th style="text-align:left"></th>
        </tr>
</table>

<table border="1" align="center" style="width:900px;margin-bottom:20px;">
                      <?php 
    $urut=0;
    $nomor=0;
    $group='-';
    foreach($data->result_array()as $d){
    $nomor++;
    $urut++;
    if($group=='-' || $group!=$d['bulan']){
        $bulan=$d['bulan'];
        $query=$this->db->query("SELECT beli_nofak,DATE_FORMAT(beli_tanggal,'%M %Y') AS bulan,DATE_FORMAT(beli_tanggal,'%d %M %Y') AS beli_tanggal,beli_suplier_id,d_beli_id,d_beli_barang_id,d_beli_harga,d_beli_jumlah,SUM(d_beli_total) as total  FROM tbl_beli JOIN tbl_detail_beli ON beli_nofak=d_beli_nofak WHERE DATE_FORMAT(beli_tanggal,'%M %Y')='$bulan'");
        $t=$query->row_array();
        $tots=$t['total'];
        if($group!='-')
        echo "</table><br>";
        echo "<table align='center' width='900px;' border='1'>";
        echo "<tr><td colspan='6'><b>Bulan: $bulan</b></td> <td style='text-align:right;'><b>Total:</b></td><td style='text-align:right;'><b>".'Rp '.number_format($tots)."</b></td></tr>";
echo "<tr style='background-color:#ccc;'>
    <td width='3%' align='center'>No</td>
    <td width='8%' align='center'>No Faktur</td>
    <td width='10%' align='center'>Tanggal</td>
    <td width='10%' align='center'>Suplier ID</td>
    <td width='30%' align='center'>Barang ID</td>
    <td width='7%' align='center'>Harga beli</td>
    <td width='5%' align='center'>Qty</td>
    <td width='10%' align='center'>Subtotal</td>
    
    </tr>";
$nomor=1;
    }
    $group=$d['bulan'];
        if($urut==500){
        $nomor=0;
            echo "<div class='pagebreak'> </div>";
            //echo "<center><h2>KALENDER EVENTS PER TAHUN</h2></center>";
            }
        ?>
        <tr>
                <td style="text-align:center;vertical-align:top;text-align:center;"><?php echo $nomor; ?></td>
                <td style="vertical-align:top;padding-left:5px;"><?php echo $d['beli_nofak']; ?></td>
                <td style="vertical-align:top;text-align:center;"><?php echo $d['beli_tanggal']; ?></td>
                <td style="vertical-align:top;padding-left:5px;"><?php echo $d['beli_suplier_id']; ?></td>
                <td style="vertical-align:top;padding-left:5px;"><?php echo $d['d_beli_barang_id']; ?></td> 
                <td style="vertical-align:top;padding-left:5px;text-align:right;"><?php echo 'Rp '.number_format($d['d_beli_harga']); ?></td>
                <td style="vertical-align:top;padding-left:5px;text-align:center;"><?php echo $d['d_beli_jumlah']; ?></td>
                <td style="vertical-align:top;padding-left:5px;text-align:right;"><?php echo 'Rp '.number_format($d['d_beli_total']); ?></td> 
        </tr>
        

        <?php
        }
        ?>
</table> 

</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td></td>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="right">Bandung, <?php echo date('d-M-Y')?></td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>
   
    <tr>
    <td><br/><br/><br/><br/></td>
    </tr>    
    <tr>
        <td align="right">( <?php echo $this->session->userdata('nama');?> )</td>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <th><br/><br/></th>
    </tr>
    <tr>
        <th align="left"></th>
    </tr>
</table>
</div>
</body>
</html>