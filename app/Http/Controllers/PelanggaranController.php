<?php

namespace App\Http\Controllers;

use App\Models\pelanggaran;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pelanggaran = Pelanggaran::orderBy('nama', 'ASC')->paginate(5);
        return view('pelanggaran',compact('pelanggaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pelanggaran = New pelanggaran;

        $pelanggaran->pelanggaran = $request->pelanggaran;
        $pelanggaran->nama = $request->nama;
        $pelanggaran->kelas = $request->kelas;
        $pelanggaran->tanggal = $request->tanggal;
        $pelanggaran->hukuman = $request->hukuman;
        $pelanggaran->save();

        return redirect()->route('pelanggaran.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggaran $pelanggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pelanggaran = pelanggaran::find($id);
        return view('edit', compact('pelanggaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update = pelanggaran::find($id);

        $update ->update([
            'pelanggaran' => $request->get('pelanggaran'),
            'nama' => $request->get('nama'),
            'kelas' => $request->get('kelas'),
            'tanggal' => $request->get('tanggal'),
            'hukuman' => $request->get('hukuman'),
        ]);

        return redirect()->route('pelanggaran.index')->with('success', 'pelanggaran edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $pelanggaran = pelanggaran::findOrFail($id);
        if ($pelanggaran) {
            $pelanggaran->delete();
            return redirect()->route('pelanggaran.index')->with('success', 'Data pelanggaran berhasil dihapus');
        }
        return redirect()->route('pelanggaran.index')->with('error', 'Data pelanggaran tidak ditemukan');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $pelanggaran = Pelanggaran::where('pelanggaran', 'LIKE', "%$search%")
                              ->orWhere('nama', 'LIKE', "%$search%")
                              ->orWhere('kelas', 'LIKE', "%$search%")
                              ->orWhere('tanggal', 'LIKE', "%$search%")
                              ->orwhere('hukuman', 'LIKE', "%$search%")
                              ->orderBy('nama', 'ASC')
                              ->paginate(5);

        return view('pelanggaran', compact('pelanggaran'));
    }
}
