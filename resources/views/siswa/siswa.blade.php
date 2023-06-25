@extends('dashboard.layout.main')

@section('container')

<body>
    <h1 style="display:flex; justify-content : center;" class="fst-italic mb-5">Data Siswa</h1>

    <div class="row mb-3">
        <div class="col-md-3 ms-auto">
            <form action="{{ route('siswa.search') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @can('admin')
    <div class="container">
        <a class="btn btn-secondary mb-3" href="{{route('siswa.create')}}">Tambah +</a>
    </div>
    @endcan

    <div class="container">
        <div class="row">
            <table class="table table-striped table-sm border-dark">
                <tr>
                    <th class="fs-5">No</th>
                    <th class="fs-5">NISN</th>
                    <th class="fs-5">Nama</th>
                    <th class="fs-5">Kelas</th>
                    <th class="fs-5">Alamat</th>
                    <th class="fs-5">Jenis Kelamin</th>
                    <th class="fs-5">Tanggal Lahir</th>
                    @can('admin')
                    <th class="fs-5">Pilihan</th>
                    @endcan
                </tr>

                @php
                $siswa = $siswa ?? [];
                $no = 1;
                @endphp

                @foreach ($siswa as $item)
                <tr>
                    <td class="fs-6">{{$no++}}</td>
                    <td class="fs-6">{{$item->nisn}}</td>
                    <td class="fs-6">{{$item->nama}}</td>
                    <td class="fs-6">{{$item->kelas}}</td>
                    <td class="fs-6">{{$item->alamat}}</td>
                    <td class="fs-6">{{$item->jenisKelamin}}</td>
                    <td class="fs-6">{{$item->tglLahir}}</td>
                    @can('admin')
                    <td>
                        <div style="display: flex; justify-content: space-between;">
                            <a class="btn btn-warning" href="{{ route('siswa.edit', $item->id) }}" role="button" style="margin-right: 10px;">Edit</a>
                            <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="margin-left: 10px;">Hapus</button>
                            </form>
                        </div>
                    </td>
                    @endcan
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    {{ $siswa->links() }}

</body>


@endsection
