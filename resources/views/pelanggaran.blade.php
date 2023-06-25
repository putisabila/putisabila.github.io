@extends('dashboard.layout.main')

@section('container')

<body>
  <h1 style="display:flex; justify-content : center;" class="fst-italic mb-5">Data Pelanggaran</h1>

  <div class="row mb-3">
    <div class="col-md-3 ms-auto">
      <form action="{{ route('pelanggaran.search') }}" method="GET">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search.." name="search">
          <button class="btn btn-primary" type="submit">Search</button>
        </div>
      </form>
    </div>
  </div>

  @can('admin')
  <div class="container">
    <a class="btn btn-primary mb-3" href="{{route('pelanggaran.create')}}">Tambah +</a>
  </div>
  @endcan

  <div class="container">
      <div class="row">
        <table class="table table-dark table-striped">
              <tr>
                  <th class="fs-5">No</th>
                  <th class="fs-5">Pelanggaran</th>
                  <th class="fs-5">Nama</th>
                  <th class="fs-5">Kelas</th>
                  <th class="fs-5">Tanggal</th>
                  <th class="fs-5">Hukuman</th>
                  @can('admin')
                  <th class="fs-5">
                    Pilihan
                  </th>
                  @endcan
              </tr>
              
              @php
              $no =1;    
              @endphp
              
              @foreach ($pelanggaran as $item)
              <tr>
                  <td class="fs-6">{{$no++}}</td>
                  <td class="fs-6">{{$item->pelanggaran}}</td>
                  <td class="fs-6">{{$item->nama}}</td>
                  <td class="fs-6">{{$item->kelas}}</td>
                  <td class="fs-6">{{$item->tanggal}}</td>
                  <td class="fs-6">{{$item->hukuman}}</td>
                  @can('admin')
                  <td>
                    <div style="display: flex; justify-content: space-between;">  
                    <a class="btn btn-light" href="{{ route('pelanggaran.edit', $item->id) }}" role="button" style="margin-right: -5px;">Edit</a>
                      <form action="{{ route('pelanggaran.destroy', $item->id) }}" method="get" class="inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                      @csrf
                      @method('post')
                      <button type="submit" class="btn btn-danger"  style="margin-left: -5px;">Hapus</button>
                      </form>
                    </div>
                  </td>
                  @endcan
              </tr>
              @endforeach
        </table>
      </div>
  </div>

  {{ $pelanggaran->links() }}

</body>
    
@endsection