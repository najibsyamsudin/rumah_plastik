<?php
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rumah Plastik</title>
    <link rel="icon" href="./assets/img/rumplas.png">
    <link rel="stylesheet" type="text/css" href="./assets/css/utama.css">
    <style>
        .status_but {
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
        
        .status_but:hover {
        background-color: #F3F4F6;
        text-decoration: none;
        transition-duration: 0.1s;
        }
        
        .status_but:disabled {
        background-color: #FAFBFC;
        border-color: rgba(27, 31, 35, 0.15);
        color: #959DA5;
        cursor: default;
        }
        
        .status_but:active {
        background-color: #EDEFF2;
        box-shadow: rgba(225, 228, 232, 0.2) 0 1px 0 inset;
        transition: none 0s;
        }
        
        .status_but:focus {
        outline: 1px transparent;
        }
        
        .status_but:before {
        display: none;
        }
        
        .status_but:-webkit-details-marker {
        display: none;
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
            <a href="<?php echo base_url('Kontrol/pindah/register'); ?>">Register</a>
            <a href="<?php echo base_url('Kontrol/pindah/order'); ?>">Order</a>
            <a href="<?php echo base_url('Kontrol/pindah/home'); ?>">Dashboard</a>
            <a href="<?php echo base_url('Kontrol/logout'); ?>">Logout</a>
        </div>
    </header>
    <main>
        <form method="get" action="<?php echo base_url('search_kontrol'); ?>">
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
                <button style="background-color :#43ee60" class="status-button status_but" onclick="updateOrder(<?php echo $row['id']; ?>, 'Sudah Order')">Sudah Order</button>
                <button style="background-color :#edfc68" class="status-button status_but" onclick="updateOrder(<?php echo $row['id']; ?>, 'Belum Order')">Belum Order</button>
                <button style="background-color :#ec5a5a" class="status-button status_but" onclick="updateOrder(<?php echo $row['id']; ?>, 'Barang Kosong')">Barang Kosong</button>
                <br><br><button class="status-button status-message-button status_but"><?php echo $row['aksi']; ?></button>
                </td>
            </tr>
        <?php endforeach; ?>
            </tbody>
        </table>
        <?php else : ?>
            <p>No results found.</p>
        <?php endif; ?>
    </main>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
function updateOrder(orderId, status) {
    // Kirim permintaan AJAX untuk memperbarui status order
    $.ajax({
        url: '<?php echo base_url('Kontrol/update_order_status'); ?>',
        method: 'POST',
        data: { id: orderId, status: status },
        success: function(response) {
            var rowId = $('[data-row-id="' + orderId + '"]');
            var statusMessageButton = rowId.find('.status-message-button');
            statusMessageButton.text(response); // Mengubah isi button hasil dengan status dari database
            statusMessageButton.addClass('active');
        },
        error: function(xhr, status, error) {
            alert('Terjadi kesalahan: ' + error);
            // Tangani kesalahan jika terjadi
        }
    });
}

</script>



</body>
</html>
    
</body>
</html>
