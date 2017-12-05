<!DOCTYPE html>
<html>
<head>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
<title> DATA STAFF </title>
</head>
<body>

<table id="customers">
  <tr>
    <th>No.</th>
    <th>Nama Lengkap</th>
    <th>Alamat</th>
    <th>Tanggal Lahir</th>
    <th>Jenis Kelamin</th>
    <th>No. Telpon</th>
    <th>Nama Bank</th>
    <th>No. Rekening</th>
  </tr>

  <?php 
  $queri ="select * from staff";
  $hasil=mysql_query($queri);
  $id = 1;

  while($data = mysql_fetch_array($hasil)){
    $id = $data['id'];
    echo "
    <tr>
    <td><center>.$id.</center></td>
    <td>".$data[nama_staff]."</td>
    <td>".$data[alamat_staff]."</td>
    <td>".$data[datel_staff]."</td>
    <td>".$data[jk_staff]."</td>
    <td>".$data[notelp_staff]."</td>
    <td>".$data[bank_staff]."</td>
    <td>".$data[norek_staff]."</td>
    </tr>
    ";
  }
  ?>
</table>

</body>
</html>
