<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="icon" href="./assets/img/rumplas.png">
    <link rel="stylesheet" type="text/css" href="./assets/css/admin.css">
</head>
<body>
    <header>
        <div class="header-left">
            <img src="assets/img/rumplas.png" alt="">
        </div>
        <h2>Halaman Order</h2>
        <div class="header-right">
            <a href="<?php echo base_url('Order_Controller_User/pindah/order'); ?>">Order</a>
            <a href="<?php echo base_url('Order_Controller_User/pindah/user'); ?>">Dashboard</a>
        </div>
    </header>
<div class="container">
        <nav class="wrapper">
            <div class="brand">
                <div class="frist">order</div>
                <div class="last">page</div>
            </div>
        </nav>
    <div class="fContainer">
        <form action="<?php echo base_url('insert_order_user'); ?>" method="post">
            <div class="for">
                <label for="fbarang">Nama Barang</label>
                <div class="input">
                <input type="text" name="nama_barang" placeholder="Nama Barang">
                </div>
            </div>
            <div class="for">
                <label for="fjumlah">Jumlah</label>
                <div class="input">
                <input type="text" name="jumlah" placeholder="Jumlah">
                </div>
                
            </div>
            <div class="for">
                <label for="fcust">Nama Customer</label>
                <div class="input">
                <input type="text" name="nama_customer" placeholder="Nama Customer">
                </div>
                
            </div>
            <div class="for">
                <label for="forder">Tgl Order</label>
                <div class="input">
                <input type="date" name="tgl_order">
                </div>
                
            </div>
            <div class="for">
                <label>Ordering</label>
                <div class="input">
                <input type="text" name="ordering" placeholder="Ordering">
                </div>
                
            </div>
            <div class="for">
                <label for="fclosing">Tgl Closing</label>
                <div class="input">
                <input type="date" name="tgl_closing">
                </div>
            </div>
            <div class="for">
                <input type="submit" value="Submit" class="sub">
            </div>
        </form>
    </div>
</div>
</body>
</html>

   
