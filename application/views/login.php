<!DOCTYPE html>
<html>

<head>
    <title>Login - Aplikasi Perpustakaan</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url() . 'assets/img/LOGO SMK ASSA.png'; ?>">
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js'; ?>"></script>
</head>

<body>
    <div class="col-md-4 col-md-offset-4" style="margin-top: 100px">
        <center>
            <h2>Perpustakaan | Login Admin</h2>
            <h2>SMK Assa'idiyah Kudus</h2>
        </center>
        <br />
        <?php
		if (isset($_GET['pesan'])) {
			if ($_GET['pesan'] == "gagal") {
				echo "<div class='alert alert-danger'>Login gagal! Username dan Password salah.</div>";
			} else if ($_GET['pesan'] == "logout") {
				echo "<div class='alert alert-danger'>Anda Telah Logout.</div>";
			} else if ($_GET['pesan'] == "belumlogin") {
				echo "<div class='alert alert-success'>Silahkan login dulu.</div>";
			}
		}
		?>
        <br />
        <div class="panel panel-default">
            <div class="panel-body">
                <br />
                <br />
                <form method="post" action="<?php echo base_url() . 'welcome/login' ?>">
                    <div class="input-group">
                        <input type="text" name="username" placeholder="username" class="form-control">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <?php echo form_error('username'); ?>
                    </div>
                    </br>
                    <div class="input-group">
                        <input type="password" name="password" placeholder="password" class="form-control">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <?php echo form_error('password'); ?>
                    </div>
                    </br>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn btn-primary">
                    </div>

                </form>

            </div>
        </div>
    </div>
</body>

</html>