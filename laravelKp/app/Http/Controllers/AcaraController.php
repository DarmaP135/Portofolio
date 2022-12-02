<?php

namespace App\Http\Controllers;

use App\Console\Kernel;
use App\Models\Acara;
use App\Models\Atlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AcaraController extends Controller
{
    public function index(Request $request)
    {
        $pagination = 5;
        $posts = Acara::withCount('Atlet')->latest()->paginate($pagination);
        return view('admin.events.listEvent', compact('posts'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function create()
    {
        return view('admin.events.addEvent');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAcaraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todayDate = date('m/d/Y');
        $validated = $request->validate([

            'nama' => ['required'],
            'tahun' => ['required', 'after:' . $todayDate],

        ]);

        $transaksi = new Acara();
        $transaksi->nama = $validated['nama'];
        $transaksi->tahun = $validated['tahun'];

        $transaksi->save();

        return redirect()->route('event')->with('toast_success', 'Data Tersimpnan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function edit(Acara $acara, int $id)
    {
        $acara = Acara::findorfail($id);
        return view('admin.events.editEvent', ['acara' => $acara]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = $request->id;
        $acara = Acara::findorfail($id);

        $todayDate = date('m/d/Y');
        $validated = $request->validate([
            'tahun' => ['required', 'after:' . $todayDate],

        ]);

        $acara['nama'] = $request->nama;
        $acara['tahun'] = $request->tahun;

        $acara->update();


        return redirect()->route('event')->with('toast_success', 'Data berhasil diubah.');
    }



    public function detail(Request $request, $id)
    {
        $a = $request->id;
        $atlet = Atlet::where('acara_id', $a);
        $pagination = 10;
        $acara = Acara::findorfail($id);


        return view('admin.events.detailAtlet', [
            'acara' => $acara,
            'atlet' => $atlet->paginate($pagination)->withQueryString()
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acara $acara
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $up = Acara::with('atlet')->find($id);
        Atlet::where('acara_id', $id)->delete();
        $up->delete();
        return redirect()->route('event')->with('toast_success', 'Event berhasil dihapus.');
    }


    //-- Atlet Controller --//
    public function createAtlet(Acara $acara, $id)
    {
        $acara = Acara::findorfail($id);
        return view('admin.events.addAtlet', ['acara' => $acara]);
    }

    public function storeAtlet(Request $request)
    {
        $validated = $request->validate([

            'acara_id' => ['required'],
            'nama.*' => ['required'],
        ], ['nama.*.required' => 'The nama field is required.']);


        $nomor = $request->input('nama');
        $a = 1;


        foreach ($nomor as $key => $a) {
            $ad = new Atlet;
            $ad->acara_id = $validated['acara_id'];
            $ad->nama = $a;
            $ad->save();
        }


        return redirect()->back()->with('toast_success', 'Data Tersimpnan');
    }


    public function editAtlet(Atlet $atlet, int $id)
    {
        $atlet = Atlet::with('Acara')->find($id);
        return view('admin.events.editAtlet', ['atlet' => $atlet]);
    }


    public function updateAtlet(Request $request)
    {
        $id = $request->id;
        $atlet = Atlet::findorfail($id);
        $validated = $request->validate([

            'nama' => ['required'],
        ]);


        $atlet->nama = $validated['nama'];

        $atlet->update();


        return redirect()->back()->with('toast_success', 'Data Tersimpnan');
    }

    public function destroyAtlet($id)
    {
        $up = Atlet::findorfail($id);
        $up->delete();
        return redirect()->back()->with('toast_success', 'Atlet berhasil dihapus.');
    }
}
