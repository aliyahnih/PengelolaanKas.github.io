<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             DATA KAS MASUK
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                        $no = 1;

                                        $sql = $koneksi-> query("select * from kas where jenis = 'masuk' ");
                                        while($data=$sql-> fetch_assoc()){

                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['kode']; ?></td>
                                            <td><?php echo date('d F Y', strtotime($data['tgl'])); ?></td>
                                            <td><?php echo $data['keterangan']; ?></td>
                                            <td align="right"><?php echo number_format($data['jumlah']).",-"; ?></td>
                                            <td>
                                                <a id="edit_data" data-toggle="modal" data-target="#edit" data-id="<?php echo $data['kode'] ?>" data-ket="<?php echo $data['keterangan'] ?>" data-tgl="<?php echo $data['tgl']; ?>" data-jml="<?php echo $data['jumlah'] ?>" class="btn btn-info" ><i class="fa fa-edit"></i> Edit </a>

                                                <a onclick ="return confirm('Yakin Akan menghapus data ini ?')" href="?page=masuk&aksi=hapus&id=<?php echo $data['kode']; ?>" class="btn btn-danger" ><i class="fa fa-trash"></i> Hapus </a>
                                            </td>
                                        </tr>

                                        <?php
                                            $total=$total+$data['jumlah'];
                                            }
                                        ?>
                                    </tbody>
                                        <tr>
                                            <th colspan="4" style="text-align: center; font-size: 20px">Total kas Masuk</th>
                                            <th style="font-size: 17px; text-align: right;"><?php echo"Rp." .number_format($total ).",-"; ?></th>
                                            
                                                
                                        
                                        </tr>

                                </table>
                            </div>

                            <!--halaman tambah-->


                        <div class="panel-body">
                            <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
                              Tambah Data
                            </button> 
                            <a href = "./laporan/laporan_kas_masuk_excel.php" target ="blank" class= "btn btn-default" >Export To Excel</a>
                            <a href = "./laporan/laporan_kas_masuk_pdf.php" target ="blank" class= "btn btn-default" >Export To PDF</a>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Tambah Data</h4>
                                        </div>
                                        <div class="modal-body" id="modal_edit">
                                              <form role="form" method="POST">
                                            <div class="form-group">
                                                <label>Kode</label>
                                                <input class="form-control" name= "kode" placeholder="Input Kode" />
                                                
                                            </div>
                                            <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" rows="3" name="ket"></textarea>
                                        </div>

                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input class="form-control"  type="date" name= "tgl" />
                                            </div>

                                            <div class="form-group">
                                                <label>Jumlah</label>
                                                <input class="form-control"  name= "jml" type="number" />
                                            </div>

                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                        </div>
                                        </form>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <?php 
                            if (isset($_POST['simpan'])) {
                                $kode = $_POST['kode'];
                                $ket = $_POST['ket'];
                                $tgl = $_POST['tgl'];
                                $jml = $_POST['jml'];
                                $sql = $koneksi -> query("insert into kas(kode, keterangan, tgl, jumlah, jenis, keluar) values('$kode','$ket','$tgl','$jml','masuk',0)");
                                if ($sql){
                                    ?>
                                        <script type="text/javascript">
                                            alert("Simpan Data Berhasil");
                                            window.location.href="?page=masuk";
                                        </script>
                                    <?php
                                }

                            }
                            ?>

                            <!--akhir halaman tambah-->

                            <!--halaman ubah-->

                              <div class="panel-body">
                            
                            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Ubah Data</h4>
                                        </div>
                                        <div class="modal-body" id="modal_edit">
                                              <form role="form" method="POST">
                                            <div class="form-group">
                                                <label>Kode</label>
                                                <input class="form-control" name= "kode" placeholder="Input Kode" id="kode" readonly />
                                                
                                            </div>
                                            <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" rows="3" name="ket" id="ket"></textarea>
                                        </div>

                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input class="form-control"  type="date" name= "tgl" id="tgl" />
                                            </div>

                                            <div class="form-group">
                                                <label>Jumlah</label>
                                                <input class="form-control"  name= "jml" type="number" id="jml"/>
                                            </div>

                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
                                        </div>
                                        </form>
                                            <?php 

                                                if (isset($_POST['ubah'])) {
                                                        $kode = $_POST['kode'];
                                                        $ket = $_POST['ket'];
                                                        $tgl = $_POST['tgl'];
                                                        $jml = $_POST['jml'];
                                                        $sql = $koneksi -> query("update kas set keterangan ='$ket', tgl='$tgl',jumlah='$jml',jenis='masuk',keluar = 0 where kode='$kode' ");

                                                         if ($sql){
                                                            ?>
                                                                <script type="text/javascript">
                                                                    alert("Ubah Data Berhasil");
                                                                    window.location.href="?page=masuk"
                                                                </script>
                                                            <?php
                                                        }

                                                    }
                                                    ?>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <script src="assets/js/jquery-1.10.2.js"></script>

                        <script type="text/javascript">

                            $(document).on("click", "#edit_data", function(){
                                var kode= $(this).data('id');
                                var ket= $(this).data('ket');
                                var tgl= $(this).data('tgl');
                                var jml= $(this).data('jml');

                                $("#modal_edit #kode").val(kode);
                                $("#modal_edit #ket").val(ket);
                                $("#modal_edit #tgl").val(tgl);
                                $("#modal_edit #jml").val(jml);
                            })

                        </script>

                        


                            <!--akhir halaman ubah-->
                           
                    
                        </div>
                    </div>
</div>