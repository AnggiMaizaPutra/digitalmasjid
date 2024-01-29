<center>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?= base_url('Quiz/simpan') ?> " name="form" method="post">

<table border="1">
    <tr>
        <td>Kode Sepeda</td>
        <td><select name="kodesepeda" id="" onchange= "a()">
            <option value="">Pilih</option>
            <option value="S001">S001</option>
            <option value="S002">S002</option>
            <option value="S003">S003</option>
        </select>
    </tr>
    <tr>
        <td> jenis</td>
        <td><input type="text" name="jenis"></td>
    </tr>
    <tr>
        <td>harga</td>
        <td><input type="text" name="hargasemua" onkeyup="b()"></td>
    </tr>
    <tr>
        <td>jumlah</td>
        <td><input type="text" name="jumlahbeli" onkeyup="b()"></td>
    </tr>
        
    <tr>
        <td>Harga Satuan</td>
        <td><input type="text" name="hargasatuan" onkeyup="b()"></td>
    </tr>
    <tr>
        <td><input type="submit" name="simpan"></td>
    </tr>
    <script>
        function a() {
            var kode = document.form.kodesepeda.value;
            var jenis = document.form.jenis.value;
            if (kode == 'S001')
             {
                document.form.jenis.value = "GUNUNG"
            } 
            else if (kode == 'S002') 
            {
                document.form.jenis.value = "PIKSI"
            } else
             {
                document.form.jenis.value = "LIPAT"
            }
        }
        function b() {
            var harga = document.form.hargasemua.value;
            var jumlah = document.form.jumlahbeli.value;

            document.form.hargasatuan.value = parseInt(harga) / parseInt(jumlah);
        }
    </script>
    </td> 
    </tr>
</body>
</html>
</center>