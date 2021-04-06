<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use Illuminate\Http\Request;

class BangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $list_bangunan = Bangunan::where([
            ['nama_toko', '!=', null,'OR','pegawai', '!=', null, 'OR', 'jenis_barang', '!=', null],
            [function ($query) use ($request) {
                if (($keyword = $request->keyword)) {
                    $query->orWhere('nama_toko', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('pegawai', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('jenis_barang', 'LIKE', '%' . $keyword . '%')->get();
                }
            }]
        ])
            ->orderBy('id_kode_toko', 'desc')
            ->paginate(5);

        return view('bangunan.index', compact('list_bangunan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bangunan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'nama_toko' => 'required',
            'pegawai' => 'required',
            'jenis_barang' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        Bangunan::create($request->all());

        return redirect()->route('bangunan.index')->with('success', 'Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_buku)
    {
        $bangunan = Bangunan::find($id_bangunan);
        $next = Bangunan::where('kode_toko', '<', $id_bangunan)->orderBy('kode_toko', 'desc')->first();
        $prev = Buku::where('kode_toko', '>', $id_bangunan)->orderBy('kode_toko')->first();
        return view('bangunan.show', compact('bangunan', 'next', 'prev'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_bangunan)
    {
        $buku = Buku::find($id_bangunan);
        return view('bangunan.edit', compact('bangunans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_bangunan)
    {
        $request->validate([
            'nama_toko' => 'required',
            'pegawai' => 'required',
            'jenis_barang' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        Bangunan::find($id_bangunan)->update($request->all());
        return redirect()->route('bangunan.index')->with('success', 'Barang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_bangunan)
    {
        Bangunan::find($id_bangunan)->delete();
        return redirect()->route('bangunan.index')->with('success', 'Barang berhasil dihapus');
    }
}