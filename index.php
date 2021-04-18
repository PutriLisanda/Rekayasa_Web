<?php require 'curl_simak.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <title>DATA MAHASISWA</title>
</head>
<body>
    <center><h1>- DATA MAHASISWA TKJ 2020/2021 -</h1></center>
    <table id="example" class="display" style="width:75%">
        <thead>
            <tr>
                <th>NAMA</th>
                <th>NIM</th>
                <th>KELAS</th>
                <th>ANGKATAN</th>
                <th>IP</th>
                <th>IPK</th>
                <th>STATUS</th>
               
            </tr>
        </thead>
        
    </table>
</body>
<script src="./test.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "ajax": './data.txt',
            "columns": [
        {"data": "nama"},
        {"data": "nim"},
        {"data": "kelas"},
        {"data": "angkatan"},
        {"data": "IP"},
        {"data": "IPK"},
        {"data": "status_sem"}
       
    ]
            
        } );
    } );
</script>
</html>