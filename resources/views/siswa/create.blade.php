<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Bimbingan Konseling</title>
  </head>
  <body>
    <div class="container">
    <div class="card mt-5">
        <div class="card-header">
          <h2>Tambah Data Siswa</h2>
        </div>
        <form action="{{ route('siswa.store') }}" method="post">
            @csrf
            <div class="card-body">
                    <div class="row mb-3">
                      <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                      <div class="col-sm-10">
                        <input type="text" name="nisn" class="form-control" id="nisn">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" id="nama">
                      </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-10">
                            <select name="kelas" class="form-select" aria-label="Default select example" id="">
                                <option selected>Open this select menu</option>
                                <option value="X TKJ 1">X TKJ 1</option>
                                <option value="X TKJ 2">X TKJ 2</option>
                                <option value="X TKJ 3">X TKJ 3</option>
                                <option value="X MM 1">X MM 1</option>
                                <option value="X MM 2">X MM 2</option>
                                <option value="X RPL 1">X RPL 1</option>
                                <option value="X RPL 2">X RPL 2</option>
                                <option value="X BC">X BC</option>
                                <option value="XI TKJ 1">XI TKJ 1</option>
                                <option value="XI TKJ 2">XI TKJ 2</option>
                                <option value="XI TKJ 3">XI TKJ 3</option>
                                <option value="XI MM 1">XI MM 1</option>
                                <option value="XI MM 2">XI MM 2</option>
                                <option value="XI RPL 1">XI RPL 1</option>
                                <option value="XI RPL 2">XI RPL 2</option>
                                <option value="XI BC">XI BC</option>
                                <option value="XII TKJ 1">XII TKJ 1</option>
                                <option value="XII TKJ 2">XII TKJ 2</option>
                                <option value="XII TKJ 3">XII TKJ 3</option>
                                <option value="XII MM 1">XII MM 1</option>
                                <option value="XII MM 2">XII MM 2</option>
                                <option value="XII RPL 1">XII RPL 1</option>
                                <option value="XII RPL 2">XII RPL 2</option>
                                <option value="XII BC">XII BC</option>
                              </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <input type="text" name="alamat" class="form-control" id="alamat">
                        </div>
                      </div>
                    <div class="row mb-3">
                        <label for="jenisKelamin" class="col-sm-2 col-form-label">jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select name="jenisKelamin" class="form-select" aria-label="Default select example" id="">
                                <option selected>Open this select menu</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tglLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                          <input type="date" name="tglLahir" class="form-control" id="tglLahir">
                        </div>
                      </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>