<?php
namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::orderBy('nama', 'ASC')->paginate(5);
        return view('siswa.siswa', compact('siswa'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $siswa = new Siswa;

        $siswa->nisn = $request->nisn;
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->alamat = $request->alamat;
        $siswa->jenisKelamin = $request->jenisKelamin;
        $siswa->tglLahir = $request->tglLahir;
        $siswa->save();

        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);

        $siswa->nisn = $request->get('nisn');
        $siswa->nama = $request->get('nama');
        $siswa->kelas = $request->get('kelas');
        $siswa->alamat = $request->get('alamat');
        $siswa->jenisKelamin = $request->get('jenisKelamin');
        $siswa->tglLahir = $request->get('tglLahir');
        $siswa->save();

        return redirect()->route('siswa.index')->with('success', 'siswa edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        if ($siswa) {
            $siswa->delete();
            return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus');
        }
        return redirect()->route('siswa.index')->with('error', 'Data siswa tidak ditemukan');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $siswa = Siswa::where('nisn', 'LIKE', "%$search%")
            ->orWhere('nama', 'LIKE', "%$search%")
            ->orWhere('kelas', 'LIKE', "%$search%")
            ->orWhere('alamat', 'LIKE', "%$search%")
            ->orWhere('jenisKelamin', 'LIKE', "%$search%")
            ->orWhere('tglLahir', 'LIKE', "%$search%")
            ->orderBy('nama', 'ASC')
            ->paginate(5);

        return view('siswa.siswa', compact('siswa'));
    }
}
