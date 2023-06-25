<?php

namespace App\Http\Controllers;

use App\Models\wali;
use Illuminate\Http\Request;

class WaliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wali = Wali::orderBy('namaSiswa', 'ASC')->paginate(5);
        return view('wali/wali',compact('wali'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wali/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $wali = New wali;

        $wali->namaSiswa = $request->namaSiswa;
        $wali->kelasSiswa = $request->kelasSiswa;
        $wali->namaWali = $request->alamatWali;
        $wali->alamatWali = $request->alamatWali;
        $wali->noHpWali = $request->noHpWali;
        $wali->save();

        return redirect()->route('wali.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(wali $wali)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $wali = wali::find($id);
        return view('wali/edit', compact('wali'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update = wali::find($id);

        $update ->update([
            'namaSiswa' => $request->get('namaSiswa'),
            'kelasSiswa' => $request->get('kelasSiswa'),
            'namaWali' => $request->get('namaWali'),
            'alamatWali' => $request->get('alamatWali'),
            'noHpWali' => $request->get('noHpWali'),
        ]);

        return redirect()->route('wali.index')->with('success', 'wali edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $wali = wali::findOrFail($id);
        if ($wali) {
            $wali->delete();
            return redirect()->route('wali.index')->with('success', 'Data wali berhasil dihapus');
        }
        return redirect()->route('wali.index')->with('error', 'Data wali tidak ditemukan');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $wali = Wali::where('namaSiswa', 'LIKE', "%$search%")
            ->orWhere('kelasSiswa', 'LIKE', "%$search%")
            ->orWhere('namaWali', 'LIKE', "%$search%")
            ->orWhere('alamatWali', 'LIKE', "%$search%")
            ->orWhere('noHpWali', 'LIKE', "%$search%")
            ->orderBy('namaSiswa', 'ASC')
            ->paginate(5);

        return view('wali/wali', compact('wali', 'search'));
    }
}
