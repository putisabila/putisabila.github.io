@extends('dashboard.layout.main')

@section('container')

<body>
  <h1 style="display:flex; justify-content : center;" class="fst-italic mb-5">Data Wali Siswa</h1>

  <div class="row mb-3">
    <div class="col-md-3 ms-auto">
        <form action="{{ route('wali.search') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search.." name="search">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

  @can('admin')
  <div class="container">
    <a class="btn btn-primary mb-3" href="{{ route('wali.create') }}">Tambah +</a>
  </div>
  @endcan

  <div class="container">
    <div class="row">
        <table class="table table-success table-striped">
            <tr>
                <th class="fs-5">No</th>
                <th class="fs-5">Nama Siswa</th>
                <th class="fs-5">Kelas Siswa</th>
                <th class="fs-5">Nama Wali</th>
                <th class="fs-5">Alamat Wali</th>
                <th class="fs-5">No Hp Wali</th>
                @can('admin')
                <th class="fs-5">Pilihan</th>
                @endcan
            </tr>

            @php
            $no = $wali->firstItem();
            @endphp

            @foreach ($wali as $item)
            <tr>
                <td class="fs-6">{{ $no++ }}</td>
                <td class="fs-6">{{ $item->namaSiswa }}</td>
                <td class="fs-6">{{ $item->kelasSiswa }}</td>
                <td class="fs-6">{{ $item->namaWali }}</td>
                <td class="fs-6">{{ $item->alamatWali }}</td>
                <td class="fs-6">{{ $item->noHpWali }}</td>
                @can('admin')
                <td>
                  <div style="display: flex; justify-content: space-between;"> 
                  <a class="btn btn-primary" href="{{ route('wali.edit', $item->id) }}" role="button" style="margin-right: 10px;">Edit</a>
                    <form action="{{ route('wali.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"  style="margin-left: 10px;">Hapus</button>
                    </form>
                  </div>
                </td>
                @endcan
            </tr>
            @endforeach
        </table>
    </div>
  </div>

  {{ $wali->links() }}

</body>
    
@endsection
