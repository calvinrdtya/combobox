<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- query -->
    <script src="js/jquery-3.6.1.js"></script>
    <title>Combobox Bertingkat</title>
</head>
<body style="font-family: poppins;">
    <nav class="navbar navbar-dark bg-primary fixed top">
        <div class="container">
            <a class="navbar-brand" href="index.php" style="color: #fff;">
            RPL SMK NEGERI 2 TRENGGALEK
            </a>
        </div>
    </nav>

    <div class="container mb-5 mx-auto">
        <h2 class="text-center mt-3">Combobox Bertingkat Data Kendaraan</h2><hr>
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <div class="form-group">
                    <label for="sel1">Pilih Kendaraan</label>
                    <select class="form-control" name="kendaraan" id="kendaraan">
                    <?php
                        include "koneksi.php";
                        
                        //Perintah sql untuk menampilkan semua data pada tabel kendaraan
                        $sql="SELECT * from kendaraan";
                        $hasil=mysqli_query($kon,$sql);
                        while ($data = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?php echo $data['id_kendaraan'];?>"><?php echo $data['nama_kendaraan'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sel1">Pilih Merk</label>
                    <select class="form-control" name="merk" id="merk">
                        <!-- merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                    </select>
                </div>
                <div class="form-froup">
                    <label for="sel1">Tipe</label>
                    <select class="form-control" name="tipe" id="tipe">
                        <!-- tipe motor akan diload menggunakan ajax, dan ditampilkan disini -->
                    </select>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#kendaraan").change(function(){
            // variabel dari nilai combobox kendaraan
            var id_kendaraan = $("#kendaraan").val();

            // menggunakan ajax untuk mengirim dan menerima data dari server
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ambil-data.php",
                data: "kendaraan="+id_kendaraan,
                success: function(data){
                    $("#merk").html(data);
                }
            });
        });

        $("#merk").change(function(){
            // variabel dari nilai combobox merk
            var id_merk = $("#merk").val();

            // menggunakan ajax untuk mengirim dan menerima data dari server
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ambil-data.php",
                data: "merk="+id_merk,
                success: function(data){
                    $("#tipe").html(data);
                }
            });
        });
    </script>

<div class="navbar bg-dark fixed-bottom">
    <div class="container text-center" style="color: #fff;">
        &copy <?php echo date('Y');?> Copyright: <a href="#">RPL SMK Negeri 2 TRENGGALEK</a>
    </div>
</div>
</body>
</html>