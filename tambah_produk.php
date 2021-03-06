<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
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
        text-transform: uppercase;
        color: #82d1c9;
      }
    button {
          background-color: #82d1c9;
          color: #82d1c9;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #82d1c9;
      border: 2px solid #ccc;
      outline-color: #82d1c9;
    }
    button{
      background-color: #82d1c9;
      color:#000000;
      padding: 10px;
      font-size: 12px;
      border: 0;
      margin-top: 20px;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Tambah Buku</h1>
      <center>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Judul Buku</label>
          <input type="text" name="judul" autofocus="" required="" />
        </div>
        <div>
          <label>Pengarang</label>
         <input type="text" name="pengarang" />
        </div>
        <div>
          <label>Penerbit</label>
         <input type="text" name="penerbit" required="" />
        </div>
        <div>
          <label>Tahun Terbit</label>
         <input type="text" name="tahun" required="" />
        </div>
        <div>
          <label>Gambar Buku</label>
         <input type="file" name="gambar" required="" />
        </div>
        <div>
         <button type="submit">Simpan Data Buku</button>
        </div>
        </section>
      </form>
  </body>
</html>