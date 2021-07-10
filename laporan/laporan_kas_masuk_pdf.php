<?php

    $koneksi = new mysqli("localhost","root","","db_kas");
    ?>
    <style>
        @media print{
            input.noPrint{
                display: none;

            }
        }
    </style>
    <table border="1" width= "100%" style="border-collapse: collapse;">
        <caption>Laporan Kas Masuk</caption>
        <thead>         
            <tr>

        <th>No</th>
        <th>Kode</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Jumlah</th>
        
    </tr>
</thead>
<tbody>
    

<?php

        $no = 1;

        $sql = $koneksi-> query("select * from kas where jenis = 'masuk' ");
        while($data=$sql-> fetch_assoc()){

    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['kode']; ?></td>
        <td><?php echo date('d F Y', strtotime($data['tgl'])); ?></td>
        <td><?php echo $data['keterangan']; ?></td>
        <td align="right"><?php echo number_format($data['jumlah']).",-"; ?></td>
                                            
     </tr>
     <?php
    $total=$total+$data['jumlah'];
    }
 ?>
  <tr>
                                            <th colspan="4" style="text-align: center; font-size: 20px">Total kas Masuk</th>
                                            <th style="font-size: 17px; text-align: right;"><?php echo"Rp." .number_format($total ).",-"; ?></th>
                                            
                                                
                                        
                                        </tr>

     
     
 </tbody>
 </table>
 <br>
 <input type="button" class="noPrint" value="cetak" onclick="window.print()">

