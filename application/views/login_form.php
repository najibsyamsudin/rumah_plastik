<?php

?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Plastik</title>
	<link rel="icon" href="./assets/img/rumplas.png">
    <link rel="stylesheet" type="text/css" href="./assets/css/loginawal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    .form img{
	display: flex;
	justify-content: center;
	align-items: center;
    margin-left: 35px;
}
</style>
</head>

<body>
    <section>
        <div class="box">
            <div class="boxContainer">
                <div class="form">
                    <h1>Rumah Plastik</h1>
                    <img src="assets/img/rumplas.png" alt="Logo" style="width: 150px;">
                    <h2>Login</h2>
                    <?php echo $this->session->flashdata('message'); ?>
                    <?php echo form_open('Login_Controller'); ?>
                        <div class="inputBox">
                            <input type="text" name="username" id="username" placeholder="Username">
                        </div>
                        <div class="inputBox">
                            <input type="password" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="remember">
                            <label>Ingat saya</label>
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Login">
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </section>
</body>


</html>