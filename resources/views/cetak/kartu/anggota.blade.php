<!DOCTYPE html>
<html>
<head>
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 10%;
            border-radius: 5px;
            padding: 2px;
            margin: auto;
            text-align: center;
            border: 0.5px solid black;
        }
        .title {
            text-align: start;
        }

    </style>
</head>
<body>

<div class="card">
  <h1>SMK AL-BAHRI</h1>
  <h4>KARTU PERPUSTAKAAN</h4>
  <h6>Alamat Nanti sebelah sini</h6>
  <div class="title">
  <p >Nama: {{$user->name}}</p>
    <p>NIS: {{$user->nis}}</p>
  <p>Alamat: {{$user->alamat}}</p>
  <p>Email: {{$user->email}}</p>
  <p>No. Handphone: {{$user->no_handphone}}</p>
  </div>
</div>

</body>
</html>
