<?php
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rumah Plastik</title>
    <link rel="icon" href="./assets/img/rumplas.png">
    <link rel="stylesheet" type="text/css" href="./assets/css/utama.css">
    <style>
        .status_button {
        appearance: none;
        background-color: #FAFBFC;
        border: 1px solid rgba(27, 31, 35, 0.15);
        border-radius: 6px;
        box-shadow: rgba(27, 31, 35, 0.04) 0 1px 0, rgba(255, 255, 255, 0.25) 0 1px 0 inset;
        box-sizing: border-box;
        color: #24292E;
        cursor: pointer;
        display: inline-block;
        font-family: -apple-system, system-ui, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
        font-size: 14px;
        font-weight: 500;
        line-height: 20px;
        list-style: none;
        padding: 6px 16px;
        position: relative;
        transition: background-color 0.2s cubic-bezier(0.3, 0, 0.5, 1);
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        vertical-align: middle;
        white-space: nowrap;
        word-wrap: break-word;
        }
        
        .status_button:hover {
        background-color: #F3F4F6;
        text-decoration: none;
        transition-duration: 0.1s;
        }
        
        .status_button:disabled {
        background-color: #FAFBFC;
        border-color: rgba(27, 31, 35, 0.15);
        color: #959DA5;
        cursor: default;
        }
        
        .status_button:active {
        background-color: #EDEFF2;
        box-shadow: rgba(225, 228, 232, 0.2) 0 1px 0 inset;
        transition: none 0s;
        }
        
        .status_button:focus {
        outline: 1px transparent;
        }
        
        .status_button:before {
        display: none;
        }
        
        .status_button:-webkit-details-marker {
        display: none;
        }
        .status_button.sudahorder {
        background-color: #28a745; /* Hijau */
        }

        .status_button.belumorder {
            background-color: #ffc107; /* Kuning */
        }

        .status_button.barangkosong {
            background-color: #dc3545; /* Merah */
        }

    </style>
</head>
<body>
    <header>
        <div class="header-left">
            <img src="assets/img/rumplas.png" alt="">
        </div>
        <h2>Selamat Datang <?php echo $username; ?></h2>
        <div class="header-right">
            <a href="<?php echo base_url('User_Controller/pindah/order'); ?>">Order</a>
            <a href="<?php echo base_url('User_Controller/pindah/user'); ?>">Dashboard</a>
            <a href="<?php echo base_url('User_Controller/logout'); ?>">Logout</a>
        </div>
    </header>
    <main>
        <form method="get" action="<?php echo base_url('search_user'); ?>">
                <input type="search" id="mySearch" name="q" placeholder="Search the site…" aria-label="Search through site content" />
                <button type="submit">Search</button>
        </form>
        <?php if (!empty($orders)) : ?>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Nama Customer</th>
                    <th>Tgl Order</th>
                    <th>Ordering</th>
                    <th>Tgl Closing</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; ?>
            <?php foreach ($orders as $row) : ?>
            <tr data-row-id="<?php echo $row['id']; ?>">
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nama_barang']; ?></td>
                <td><?php echo $row['jumlah']; ?></td>
                <td><?php echo $row['nama_customer']; ?></td>
                <td><?php echo $row['tgl_order']; ?></td>
                <td><?php echo $row['ordering']; ?></td>
                <td><?php echo $row['tgl_closing']; ?></td>
                <td>
                    <button  class = "status_button" <?php echo strtolower($row['aksi']); ?>><?php echo $row['aksi']; ?></button>
                </td>
            </tr>
        <?php endforeach; ?>
            </tbody>
        </table>
        <?php else : ?>
            <p>No results found.</p>
        <?php endif; ?>
    </main>

</body>
</html>
    
</body>
</html>
