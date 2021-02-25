<?php

require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>LANSIA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style type="text/css">
    h1 {
      color: blue;
      font-family: sans-serif;
    }
    .bt1 {
      text-decoration: none;
      background-color: white;
      color: blue;
      font-family: sans-serif;
      font-size: 15px;
    }
   .bt2 {
      text-decoration: none;
      background-color: white;
      color: red;
      font-family: sans-serif;
      font-size: 15px;
    }
    .table1 {
      border-style: groove;
    }
    .atas {
      background-color: #F0FFF0;
      padding: 10px;
      margin: 5px;
    }
    .btbawah {
      background-color: blue;
      color: white  ;
      margin-top:  25px;
      padding: 20px;
      border-radius: 5px;
      border:none;
      display: inline-block;
      text-decoration: none;
      font-family: sans-serif;
      border-right: 3px solid black;
      border-bottom: 3px solid black;
    } 
    .btbawah : hover{
      opacity: 0.5;
    }
    .tambah {
      padding: 10px;
      background-color: blue;
      color: white  ;
      border-radius: 5px;
      border:none;
      display: inline-block;
      text-decoration: none;
      font-family: sans-serif;
      border-right: 3px solid black;
      border-bottom: 3px solid black;
    }
  </style>
</head>
<body>
<center>
  <h1>DATA LANSIA RW 10</h1>

  <form method="post" action="tambah.php">
    <input type="text" name="nama_lansia" placeholder="Nama Lansia"><BR><br>
	  <input type="text" name="alamat" placeholder="Alamat"><BR><BR>
	  <input type="date" name="tanggal_lahir" value="01/01/1901" min="01/01/1901" max="31/12/2035"><br><br>
	  <input type="text" name="pendidikan" placeholder="Pendidikan"><BR><BR>
	  <input type="text" name="nik" placeholder="NIK"><BR><BR>
	  <input type="text" name="bpjs" placeholder="No BPJS"><BR><BR>
    <input class="tambah" type="submit" name="submit" value="Tambah Data"><BR><BR>
  </form><br/>

  <table border="2">
    <tr class="atas">
      <th>No.</th>
      <th>Nama Lansia</th>
	    <th>Alamat</th>
      <th>Tanggal Lahir</th>
      <th>Umur</th>
	    <th>Pendidikan</th>
	    <th>NIK</th>
	    <th>No BPJS</th>
      <th colspan="2">Aksi</th>
    </tr>

    <?php
    $q = $conn->query("SELECT * FROM lansia");


    $no = 1;
    while ($dt = $q->fetch_assoc()) :
    ?>

    <tr>  
      <td><?= $no++ ?></td>
      <td><?= $dt['nama_lansia'] ?></td>
	    <td><?= $dt['alamat'] ?></td>
      <td style="text-align: center;"><?= $dt['tanggal_lahir'] ?></td>
      <td style="text-align: center;"><?= $dt['umur']  ?> Tahun</td>
	    <td style="text-align: center;"><?= $dt['pendidikan'] ?></td>
	    <td style="text-align: center;"><?= $dt['nik'] ?></td>
	    <td style="text-align: center;"><?= $dt['bpjs'] ?></td>
      <td><a class="bt1" href="update.php?id=<?= $dt['lansia_id'] ?>">Ubah</a></td>
      <td><a class = "bt2" href="hapus.php?id=<?= $dt['lansia_id'] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a></td>
    </tr>


    <?php
    endwhile;
    ?> 

  </table>
  <a  class="btbawah" href="export.php">Export Data ke Excel</a>

  </center>
</body>
</html>