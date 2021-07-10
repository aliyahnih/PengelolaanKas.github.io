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
        <caption>Laporan Kas Keluar</caption>
        <thead> 
            <tr>
        <th>No</th>
                                            <th>Kode</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Masuk</th>
                                            <th>Keluar</th>
        
    </tr>
    <?php

                                        $no = 1;

                                        $sql = $koneksi-> query("select * from kas");
                                        while($data=$sql-> fetch_assoc()){

                                    ?>
    <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['kode']; ?></td>
                                            <td><?php echo date('d F Y', strtotime($data['tgl'])); ?></td>
                                            <td><?php echo $data['keterangan']; ?></td>
                                            <td align="right"><?php echo number_format($data['jumlah']).",-"; ?></td>
                                            <td><?php echo $data['jenis']; ?></td>
                                            <td align="right"><?php echo number_format($data['keluar']).",-"; ?></td>
                                           
                                                
                                        </tr>
      
<?php
                                            $total=$total+$data['jumlah'];
                                            $total_keluar=$total_keluar+$data['keluar'];
                                            $saldo_akhir=$total-$total_keluar;
                                            }
                                        ?>
  <tr>
                                            <th colspan="5" style="text-align: center; font-size: 20px">Total kas Masuk</th>
                                            <td style="font-size: 17px; text-align: right;"><?php echo number_format($total ).",-"; ?></td>
                                            
                                                
                                        
                                        </tr>
                                        <tr>
                                            <th colspan="5" style="text-align: center; font-size: 20px">Total kas Keluar</th>
                                            <td style="font-size: 17px; text-align: right;"><?php echo number_format($total_keluar ).",-"; ?></td>
                                            
                                                
                                        
                                        </tr>
                                        <tr>
                                            <th colspan="5" style="text-align: center; font-size: 20px">Saldo Akhir</th>
                                            <th style="font-size: 17px; text-align: right;"><?php echo"Rp." .number_format($saldo_akhir ).",-"; ?></th>
                                            
                                                
                                        
                                        </tr>
                                            </tbody>
 </table>
 <br>
 <input type="button" class="noPrint" value="cetak" onclick="window.print()">