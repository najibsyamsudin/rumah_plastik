<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="icon" href="./assets/img/rumplas.png">
    <link rel="stylesheet" type="text/css" href="./assets/css/utama.css">
</head>
<body>
    <header>
        <div class="header-left">
            <img src="assets/img/rumplas.png" alt="">
        </div>
        <h2>Selamat Datang <?php echo $username; ?></h2>
        <div class="header-right">
            <a href="order.html">Register</a>
            <a href="order.html">Order</a>
            <a href="<?php echo base_url('Kontrol/pindah'); ?>">Dashboard</a>
            <a href="<?php echo base_url('Kontrol/logout'); ?>">Logout</a>
        </div>
    </header>


    
<body>
    
</html>