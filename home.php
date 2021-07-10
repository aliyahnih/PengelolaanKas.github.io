<?php

    $sql = $koneksi -> query("select * from kas");
    while($data=$sql-> fetch_assoc()) {

        $jml= $data['jumlah'];
        $total_masuk = $total_masuk+$jml;  

        $jml_keluar = $data['keluar'];
        $total_keluar = $total_keluar+$jml_keluar;  

        $total = $total_masuk - $total_keluar;
    }

?>
<marquee>SELAMAT DATANG DI SISTEM PENGELOLAAN KAS UKM FAJRUL ISLAM </marquee>
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                         <h2>HALAMAN UTAMA</h2>   
                            <h5>PENGELOLAAN KAS UKM FAJRUL ISLAM</h5>
                        </div>
                    </div>              
                     <!-- /. ROW  -->
                      <hr />
                    <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-6">           
    			<div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-green set-icon">
                        <i class="glyphicon glyphicon-floppy-save"></i>
                    </span>
                    <div class="text-box" >
                        <p class="main-text"><?php echo "RP.".number_format($total_masuk); ?>,-</p>
                        <p class="text-muted">TOTAL KAS MASUK</p>
                    </div>
                 </div>
    		     </div>
                        <div class="col-md-4 col-sm-6 col-xs-6">           
    			<div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-red set-icon">
                        <i class="glyphicon glyphicon-floppy-open"></i>
                    </span>
                    <div class="text-box" >
                        <p class="main-text"><?php echo "RP.".number_format($total_keluar); ?>,-</p>
                        <p class="text-muted">TOTAL KAS KELUAR</p>
                    </div>
                 </div>
    		     </div>
                        <div class="col-md-4 col-sm-6 col-xs-6">           
    			<div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-blue set-icon">
                        <i class="glyphicon glyphicon-floppy-disk"></i>
                    </span>
                    <div class="text-box" >
                        <p class="main-text"><?php echo "RP.".number_format($total); ?>,-</p>
                        <p class="text-muted">SALDO</p>
                    </div>
                 </div>
    		     