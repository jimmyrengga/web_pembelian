<html>
    <head>
        <title>Web Pembelian > Supplier List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Web<strong>Pembelian</strong></a>
                </div>
                <?php
                    session_start();

                    if (isset($_SESSION['user'])) {
                        $userid = $_SESSION['user'];
                    } else {
                        header('Location: index.php');
                    }
                    
                ?>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Master <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="./userlist.php">User</a></li>
                                <li><a href="./supplierlist.php">Supplier</a></li>
                                <li><a href="./baranglist.php">Barang</a></li>
                            </ul>	
                        </li>
                        <li><a href="./pembelianform.php">Pembelian</a></li>
                        <li><a href="./laporanlist.php">Laporan</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Selamat Datang, <?php echo $userid;?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="./logout.php">Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container" style="padding-top: 75px;">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <a href="./supplierform.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Tambah</a>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="form-group pull-right">
                        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                    <div class="form-group col-md-10 pull-right">
                        <input type="text" class="form-control col-md-6" placeholder="Pencarian berdasarkan supplier id">
                    </div>
                </div>
            </div>
            <?php
                            
                if(isset($_SESSION['rc'])) {
                    if($_SESSION['rc'] == "sukses") {
                        echo '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data berhasil tersimpan.</div>';
                    } else {
                        echo '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data gagal tersimpan.</div>';
                    }
					unset($_SESSION['rc']);
                }
            ?>
            <hr/>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Supplier ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include ('./CSupplier.php');

                    $c = new CSupplier();
                    $query = $c->getData();

                    while ($row = mysql_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?= $row['supplier_id'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td><a href="./supplieredit.php?id=<?php echo $row['supplier_id']; ?>">Edit</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>
