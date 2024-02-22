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
  <p >Nama: <?php echo e($user->name); ?></p>
    <p>NIS: <?php echo e($user->nis); ?></p>
  <p>Alamat: <?php echo e($user->alamat); ?></p>
  <p>Email: <?php echo e($user->email); ?></p>
  <p>No. Handphone: <?php echo e($user->no_handphone); ?></p>
  </div>
</div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\dimas\resources\views/cetak/kartu/anggota.blade.php ENDPATH**/ ?>