<?php
require 'function.php';
require 'cek.php';
?>

<html>
<head>
<title>Export Data Stock</title>
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
        <h2>Data Stock</h2>
        <div class="data-tables datatable-dark">
        <a href="index.php" class="btn btn-danger mb-2">Kembali</a>
                                    <table class="table table-bordered table-striped" id="example" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Deskripsi</th>
                                                <th>Stock</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                            $ambilsemuadatastock = mysqli_query($conn,"select * from stock");
                                            $i = 1;
                                            $jmlhbarangsemua = 0;
                                            while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                                $namabarang = $data['namabarang'];
                                                $deskripsi = $data['deskripsi'];
                                                $stock = $data['stock'];
                                                $idb = $data['idbarang'];
                                                //jmhlbrngsemua
                                                $jmlhbarangsemua = $jmlhbarangsemua + $stock;
                                            

                                            ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?php echo $namabarang;?></td>
                                                <td><?php echo $deskripsi;?></td>
                                                <td><?php echo $stock;?></td>
                                            </tr>

                                            <?php
                                            };
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Jumlah</th>
                                                <th></th>
                                                <th></th>
                                                <th><?php echo $jmlhbarangsemua;?></th>
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