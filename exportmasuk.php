<?php
require 'function.php';
require 'cek.php';
?>

<html>
<head>
<title>Data Barang Masuk</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap4.min.js"></script>
<!-- <script src="script.js"></script>-->

</head>

<body>
    <div class="container">
        <h2>Data Barang Masuk</h2>
        <div class="data-tables datatable-dark">
                                <div class="row mt-4">
                                    <div class="col">
                                        <form method="post" class="form-inline">
                                            <input type="date" name="tglawal" class="form-control">
                                            <input type="date" name="tglakhir" class="form-control ml-4">
                                            <button type="submit" name="filtertgl" class="btn btn-info ml-3">Filter</button>
                                        </form>
                                    </div>
                                    <a href="masuk.php" class="btn btn-danger mb-2">Kembali</a>
                                </div>
                                    <table class="table table-bordered table-striped" id="example" style="width:100%">
                                    <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                            
                                            $ambilsemuadatastock = mysqli_query($conn,"select * from masuk m, stock s where s.idbarang = m.idbarang");
                                            //Sorting berdasarkan tanggal
                                            if(isset($_POST['filtertgl'])){
                                                $awal = $_POST['tglawal'];
                                                $akhir = $_POST['tglakhir'];
                                            
                                                if($awal!=null || $akhir!=null){
                                                    $ambilsemuadatastock = mysqli_query($conn,"select * from masuk m, stock s where s.idbarang = m.idbarang and tanggal BETWEEN '$awal' and DATE_ADD('$akhir', INTERVAL 1 DAY)");
                                                } else {
                                                    $ambilsemuadatastock = mysqli_query($conn,"select * from masuk m, stock s where s.idbarang = m.idbarang");
                                                }
                                            }
                                            $jmlhbarangmasuk=0;

                                            while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                                $idb = $data['idbarang'];
                                                $idm = $data['idmasuk'];
                                                $tanggal = $data['tanggal'];
                                                $namabarang = $data['namabarang'];
                                                $qty = $data['qty'];
                                                $keterangan = $data['keterangan'];
                                                //jmlh
                                                // $jmlhbarangmasuk = ['jmlhbarangmasuk'];
                                                $jmlhbarangmasuk = $qty+$jmlhbarangmasuk;
                                            

                                            ?>
                                            <tr>
                                                <td><?php echo $tanggal;?></td>
                                                <td><?php echo $namabarang;?></td>
                                                <td><?php echo $qty;?></td>
                                                <td><?php echo $keterangan;?></td>
                                            </tr>

                                            <?php
                                            };
                                            // var_dump($ambilsemuadatastock);
                                            
                                            ?>
                                            </tbody>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                            </tr>
                                        </tfoot> -->
                                        <tfoot>
                                            <tr>
                                                <th>Jumlah</th>
                                                <th></th>
                                                <th><?php echo $jmlhbarangmasuk;?></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        
                                    </table>
        </div>
    </div>
    
<script>
$(document).ready(function () {
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            { extend: 'excelHtml5', footer: true },
            { extend: 'print', footer: true },
            { extend: 'pdfHtml5', footer: true }
        ]
    });
});
// buttons: [
//             'excel', 'pdf', 'print'
//         ]
</script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

</body>

</html>