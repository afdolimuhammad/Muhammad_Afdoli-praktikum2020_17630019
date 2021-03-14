<?php
include "connection.php";

$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($con, "SELECT * FROM user WHERE id=$id") or die(mysqli_error($con));

while ($data = mysqli_fetch_array($result)) {
    $username = $data['username'];
    $password = $data['password'];
    $level = $data['level'];
}
?>

<div class="card">
    <div class="card-header">
        <strong>Tambah Data User</strong>
    </div>
    <div class="card-body">
        <form action="?page=user-update" method="POST">
            <!-- <?php echo $password ?> -->
            <input type="hidden" name="password_lama1" class="form-control" placeholder="Username" value="<?php echo $password; ?>">
            <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Level</label>
                <div class="col-sm-9">
                    <select class="form-control" name="level">
                        <option disabled> Pilih </option>
                        <option <?php if ($level == "admin") echo 'selected'; ?> value="admin">Admin</option>
                        <option <?php if ($level == "mahasiswa") echo 'selected'; ?> value="mahasiswa">Mahasiswa</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="password_lama2" class="col-sm-3 col-form-label">Password Lama</label>
                <div class="col-sm-9">
                    <input type="password" name="password_lama2" class="form-control" placeholder="Password Lama" required>
                </div>
            </div>
            <div class=" form-group row">
                <label for="password_baru" class="col-sm-3 col-form-label">Password Baru</label>
                <div class="col-sm-9">
                    <input type="password" name="password_baru" class="form-control" placeholder="Password Baru" required>
                </div>
            </div>
    </div>
    <div class=" card-footer bg-transparent">
        <input type="hidden" name="id" value=<?php echo $id; ?>>
        <button type="submit" name="update" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
    </form>
</div>