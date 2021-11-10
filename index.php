<?php
  include ('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

  if( isset($_POST["cari"]) ) {
    $query = cari($_POST["keyword"]);
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Daftar Buku</title>
    <style type="text/css">
      * {
        font-family: "Garamond";
      }
      h1 {
        text-transform: capitalize;
        color: #2a7d75;
      }
    table {
      border: solid 1px #82d1c9;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #82d1c9;
        border: solid 1px #82d1c9;
        color: 3#FF0000;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #82d1c9;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    a {
          background-color: #236b64;
          color: #FFFAFA;
          padding: 10px;
          text-decoration: none;
          font-size: 15px;
    }
  
    </style>
  </head>
  <body>
    <center><h1>Daftar Buku</h1><center>
    <center><a href="tambah_produk.php"> Tambah Buku </a><center>
    <br/>

    <form action="index.php" method="get">
    	<input type="text" name="cari" placeholder="Cari judul buku" autocomplete="off">
	    <input type="submit" value="Cari">

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Judul Buku</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Tahun Terbit</th>
          <th>Gambar Buku</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM buku ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      if(isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $result = mysqli_query($koneksi, "SELECT * FROM buku WHERE judul LIKE '%".$cari."%'");				
      } else {
        $result = mysqli_query($koneksi, $query);
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['judul']; ?></td>
          <td><?php echo substr($row['pengarang'], 0, 20); ?></td>
          <td><?php echo substr($row['penerbit'],0, 20); ?></td>
          <td><?php echo $row['tahun']; ?></td>
          <td style="text-align: center;"><img src="../gambar<?php echo $row['gambar']; ?>" style="width: 120px;"></td>
          <td>
              <a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a> |
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
</html>