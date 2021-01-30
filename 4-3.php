<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "dbschool";

$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

//submit user
    if(isset($_POST['submit_u'])){
        
        //edit user
        if ($_GET['hal'] == "edit_user"){
            $hapus = mysqli_query($koneksi, "UPDATE user SET
            name_u = '$_POST[name_u]',
            email_u = '$_POST[email_u]',
            password_u = '$_POST[password_u]'
            WHERE id_s = '$_GET[idu]'    
            ");
            if (mysqli_affected_rows($koneksi)>0){
                echo    "<script>
                    alert('EDIT SUKSES');
                    document.location= '4-3.php';
                </script>";
                
            } else {
                echo    "<script>
                    alert('EDIT GAGAL');
                    document.location= '4-3.php';
                </script>";
            }

        }
    }
    //delete user
    if (isset($_GET['hal']))
    {
        if ($_GET['hal'] == "hapus_user")
        {
            $hapus = mysqli_query($koneksi, "DELETE FROM user WHERE id_u = '$_GET[idu]' ");
            if (mysqli_affected_rows($koneksi)>0){
                echo    "<script>
                    alert('HAPUS SUKSES');
                    document.location= '4-3.php';
                </script>";
            }
        } else if ($_GET['hal'] == "edit_user")
        {   
            $tampiluser = mysqli_query($koneksi, "SELECT * FROM user WHERE id_u = '$_GET[idu]'");
            $datauser = mysqli_fetch_array($tampiluser);
            if($datauser)
            {
                $vname_u = $datauser['name_u'];
                $vemail_u = $datauser['email_u'];
                $vrole_u = $datauser['password_u']; 
            }  
         }
    }


//submit school
    if(isset($_POST['submit_s'])){
            
        //edit school
        if ($_GET['hal'] == "edit"){
        $hapus = mysqli_query($koneksi, "UPDATE school SET
        npsn_s = '$_POST[npsn_s]',
        name_s = '$_POST[name_s]',
        address_s = '$_POST[address_s]',
        logo_s = '$_POST[logo_s]',
        level_s = '$_POST[level_s]',
        status_s = '$_POST[status_s]',
        userid_s = '$_POST[userid_s]' 
        WHERE id_u = '$_GET[id]'    
        ");
        if (mysqli_affected_rows($koneksi)>0){
            echo    "<script>
                alert('EDIT SUKSES');
                document.location= '4-3.php';
            </script>";
        }
        } else { 
            //simpan school
            $simpanschool = mysqli_query($koneksi, "INSERT INTO school (npsn_s, name_s, address_s, logo_s, level_s, status_s, userid_s) VALUES
                                    ('$_POST[npsn_s]','$_POST[name_s]','$_POST[address_s]','$_POST[logo_s]','$_POST[level_s]','$_POST[status_s]','$_POST[userid_s]')");

            if (mysqli_affected_rows($koneksi)>0){
                echo    "<script>
                    alert('INPUT SUKSES');
                    document.location= '4-3.php';
                </script>";
            } else {
                echo    "<script>
                    alert('INPUT GAGAL');
                    document.location= '4-3.php';
                </script>";
            }
        }
    }
    //delete school
    if (isset($_GET['hal']))
    {
        if ($_GET['hal'] == "hapus")
        {
            $hapus = mysqli_query($koneksi, "DELETE FROM school WHERE id_n = '$_GET[id]' ");
            if (mysqli_affected_rows($koneksi)>0){
                echo    "<script>
                    alert('HAPUS SUKSES');
                    document.location= '4-3.php';
                </script>";
            }
        } else if ($_GET['hal'] == "edit")
        {   
            $tampil = mysqli_query($koneksi, "SELECT * FROM school WHERE id_s = '$_GET[id]'");
            $data = mysqli_fetch_array($tampil);
                if($data)
            {
            $vNPSN_s = $data['npsn_s'];
            $vname_s = $data['name_s'];
            $vaddress_s = $data['address_s'];
            $vlogo_s = $data['logo_s'];
            $vlevel_s = $data['level_s'];
            $vstatus_s = $data['status_s'];
            $vuserid_s = $data['userid_s'];
            }
        }
    }
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
<div class="container" style="width : 900px;">
<a href="4-4.php" class="btn bg-danger text-white">Semua Sekolah</a>
<a href="4-1.php" class="btn bg-danger text-white">Logout</a>
<div class="container">
    <h1 class="text-light">SISTEM DATA SEKOLAH</h1>
        

<!-- AWALINPUT SCHOOL -->

    <div class="card text-center mt-3">
  		<div class="card-header bg-danger text-white">
    		Input User
  		</div>
  		<div class="card-body text-justify">
   		    <form method="post" action="">
                <div class="form-group">
                    <label>NPSN</label>
                    <input type="text" name="npsn_n" value="<?=@$vnpsn_n?>" class="form-control" placeholder="Input NPSN Sekolah" required="">
                    <label>Nama Sekolah</label>
                    <input type="text" name="name_s" value="<?=@$vname_s?>" class="form-control" placeholder="Input Nama Sekolah" required="">
                    <label>Alamat Sekolah</label><br>
                    <input type="text" name="address_s"value="<?=@$vaddress_s?>" class="form-control" placeholder="Input Alamat Sekolah" required=""><br>
                    <label>Logo Sekolah</label>
                    <input type="file" name="logo_s" value="<?=@$vlogo_s?>" class="form-control" placeholder="Input Logo Sekolah" required=""><br>
                    <label>Level Sekolah</label>
                    <input type="text" name="level_s" value="<?=@$vlevel_s?>" class="form-control" placeholder="SD/ SMP/ SMA" required="">
                    <label>Status Sekolah</label>
                    <input type="text" name="status_s" value="<?=@$vstatus_s?>" class="form-control" placeholder="Negeri/ Swasta" required="">
                    <label>User ID</label>
                    <input type="text" name="userid_s" value="<?=@$vuserid_s?>" class="form-control" placeholder="Input ID Pembuat" required="">
                    <button type="submit" class="btn btn-success" name="submit_s">Submit</button>
                    <button type="reset" class="btn btn-danger" name="reset_s">Clear</button>
                </div>
            </form>
   	    </div>
    </div>
    
<br><br>
<!-- END INPUT SCHOOL -->

<!-- DATABASE -->
<?php 
   		$lemari = mysqli_query($koneksi, "SELECT * from school INNER JOIN user ON user.id_u = school.userid_s");
        while ($koper = mysqli_fetch_array($lemari)) : ?>
           
    <div class="col-md-4 mt 5 float-left">
              <div class="card mb-4 box-shadow">
                  <div  class="header bg-danger text-white text-center" style="height : 50px; border-radius : 20px 20px 0 0;"><a style="text-decoration:none; color:white;" href="4-1.php?new=<?= $koper['id_s']?>"><?= $koper['name_s']?></a></div>
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="img/<?=$koper['logo_s']?>" data-holder-rendered="true">
                <div class="card-body">
                  <p class="card-text" style="height: 50px; overflow: auto"><?= $koper['address_s']?></p>
                  <p class="card-text" style="height: 50px; overflow: auto"><?= $koper['status_s']?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Post By : <?= $koper['name_u']?></button>
                      <a type="button" onclick="return confirm('Anda Yakin?');" href="4-3.php?hal=hapus&id=<?=$koper['id_s']?>"   class="btn btn-sm btn-outline-secondary">Delete</a>
                      <a type="button" onclick="return confirm('Anda Yakin?');" href="4-3.php?hal=edit&id=<?=$koper['id_s']?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                    </div>
                  </div>
                </div>
                </div>
    </div>

    <?php endwhile; ?>

<div class="clearfix"></div>

<!-- DATA USER -->
<div class="card text-center mt-3">
  <div class="card-header bg-danger text-white">
    Data USER
  </div>
  <div class="card-body text-justify">
   <table class = "table table-bordered">
   	<tr>
   		<th>ID User</th>
        <th>Nama User</th>
        <th>Email</th>
        <th>Aksi</th>
   		
   	</tr>
   	<?php 
   		$tampil = mysqli_query($koneksi, "SELECT * from user");
   		while ($data = mysqli_fetch_array($tampil)) :
   	 ?>
   	<tr>
   		<th><?=$data['id_u']?></th>
        <th><?=$data['name_u']?></th>
        <th><?=$data['email_u']?></th>
   		<td>
   			<a onclick="return confirm('Anda Yakin?');" href="4-3.php?hal=edit_user&idu=<?=$data['id_u']?>" class="btn btn-warning">Edit</a>
   			<a onclick="return confirm('Anda Yakin?');" href="4-3.php?hal=hapus_user&idu=<?=$data['id_u']?>" class="btn btn-danger">Delete</a>
   		</td>
   	</tr>
   <?php endwhile ?>
   </table>
   	</div>
  </div>

<br><br>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>