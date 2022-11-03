<?php
session_start();
require 'koneksi.php';

$all_data = ambil_data("SELECT peminjaman_buku.*, siswa.NIS, siswa.nama, siswa.kelas, buku.judul FROM peminjaman_buku INNER JOIN siswa ON peminjaman_buku.id_siswa = siswa.id INNER JOIN buku ON peminjaman_buku.id_buku = buku.kode_buku");
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
   <title>Cetak Daftar Peminjaman</title>
</head>

<body>
   <div class="container">
      <h2>Cetak daftar peminjaman</h2>
      <div class="data-tables datatable-dark">
         <div class="container ps-5 pe-5 pt-2 pb-2">
            <div class="card">
               <table class="table" id="mauexport">
                  <thead>
                     <tr>
								<th scope="col">No.</th>
								<th scope="col" class="table-secondary">NIS</th>
								<th scope="col">Nama</th>
								<th scope="col">Kelas</th>
								<th scope="col">Kode Buku</th>
								<th scope="col">Buku Dipinjam</th>
								<th scope="col">Tanggal Peminjaman</th>
								<th scope="col">Tanggal Pengembalian</th>
								<th scope="col">Status Peminjaman</th>
							</tr>
                  </thead>
                  <tbody>
                     <?php $i = 1; ?>
                        <?php foreach($all_data as $data) : ?>
                           <tr>
                              <th scope="row"><?= $i ?></th>
                              <td class="table-secondary"><?= $data["NIS"] ?></td>
                              <td><?= $data["nama"] ?></td>
                              <td><?= $data["kelas"] ?></td>
                              <td><?= $data["id_buku"] ?></td>
                              <td><?= $data["judul"] ?></td>
                              <td><?= $data["tanggal_peminjaman"] ?></td>
                              <td><?= $data["tanggal_pengembalian"] ?></td>
                              <td><?= $data["status_peminjaman"] ?></td>
                           </tr>
                        <?php $i++; ?>
							<?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

   <script>
      $(document).ready(function() {
         $('#mauexport').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                  'copy','csv','excel', 'pdf', 'print'
            ]
         } );
      } );
   </script>

   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
</body>

</html>