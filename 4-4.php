<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "dbschool";

$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal No. 4B</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body   style= " background-color : black;">
<h1 class="text-light">Data Sekolah</h1>
<div class="card text-center mt-3">
  <div class="card-header bg-danger text-white">
    Data Sekolah
  </div>
  <div class="card-body text-justify">
   <table class = "table table-bordered">
   	<tr>
   		<th>NPSN</th>
        <th>Nama Sekolah</th>
        <th>Alamat Sekolah</th>
        <th>Logo Sekolah</th>
        <th>Level Sekolah</th>
        <th>Status Sekolah</th>
        <th>Author</th>
  
<?php 
   		$lemari = mysqli_query($koneksi, "SELECT * from school INNER JOIN user ON user.id_u = school.userid_s");
        while ($koper = mysqli_fetch_array($lemari)) : ?>
           
    <tr>
   		<th><?=$koper['npsn_s']?></th>
        <th><?=$koper['name_s']?></th>
        <th><?=$koper['address_s']?></th>
        <th><img src="img/<?php echo $koper['logo_s']?> "width="50"></th>
        <th><?=$koper['level_s']?></th>
        <th><?=$koper['status_s']?></th>
        <th><?=$koper['name_u']?></th>
       </tr>
    

    <?php endwhile; ?>
    <a class="btn btn-success" href="4-3.php">Kembali</a>

<div class="clearfix"></div> 
</body>
</html>