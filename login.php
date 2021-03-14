<?php

if (isset($_POST['login'])) {
  //mengambil isi komponen username dan password
  $username   = $_POST['username'];
  $pass       = $_POST['password'];

  //memanggil file connection.php untuk membuka koneksi dengan MySQL
  include 'connection.php';

  //mencari di dalam tabel user apakah ada username sesuai dengan isian komponen username
  $result = mysqli_query($con, "SELECT * FROM user WHERE username = '$username'");
  //menyimpan banyak baris yang ditemukan ke dalam variabel cek
  $cek = mysqli_num_rows($result);
  if ($cek > 0) {
    //membuka sesion untuk menyimpan nilai sesion
    session_start();
    // echo '<script>alert("oke")</script>';
    $row = mysqli_fetch_assoc($result);

    //mencek apakah hash password sama dengan isian password di tabel user
    if (password_verify($pass, $row["password"])) {
      //jika sama, maka buat sesion username dan pindahkan ke halaman admin
      $_SESSION['username'] = $row['username'];
      $_SESSION['level'] = $row['level'];
      header('Location:admin/index.php');
      $_SESSION['pesan'] = 'Login Berhasil';
      exit;
    }
  }
  $error = true;
}

?>

    <div class="row justify-content-center mt-5">
      <div class="col-md-6">

        <?php if (isset($error)) : ?>

          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login gagal</strong> Periksa kembali Username dan Password
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <div class="card">
          <div class="card-header bg-transparent mb-0">
            <h5 class="text-center">Login <span class="font-weight-bold text-primary">User</span></h5>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username">
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>

              <!-- <div class="form-group"> -->
              <input type="submit" name="login" value="Login" class="btn btn-success btn-block">
              <!-- <a href="?page=home" class="btn btn-block btn-danger">Kembali ke Beranda</a> -->
              <!-- </div> -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>