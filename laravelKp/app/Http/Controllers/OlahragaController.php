<?php

namespace App\Http\Controllers;

use App\Models\Nomor;
use App\Models\Olahraga;
use Illuminate\Http\Request;

class OlahragaController extends Controller
{
    public function index(Request $request)
    {
        $pagination = 5;
        $posts = Olahraga::latest();
        return view('admin.cabor.listCabor', ['posts' => $posts->paginate($pagination)->withQueryString()])->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function create(Request $request)
    {
        return view('admin.cabor.addCabor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOlahragaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($data);

        $validated = $request->validate([
            'olahraga' => ['required'],
        ]);

        $add = new Olahraga;
        $add->nama = $validated['olahraga'];
        $add->save();


        // $nomor = $request->input('nomor');


        // foreach ($nomor as $key => $a) {
        //     $ad = new Nomor;
        //     $ad->olahraga_id = $add->id;
        //     $ad->nomor = $a;
        //     $ad->save();
        // }


        return redirect()->route('olahraga')->with('toast_success', 'Data Tersimpnan');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Olahraga  $olahraga
     * @return \Illuminate\Http\Response
     */
    public function detail(Olahraga $olahraga, Request $request, $id)
    {
        $pagination = 10;
        $a = $request->id;
        $olahraga = Olahraga::findorfail($id);
        $nomor = Nomor::where('olahraga_id', $a);
        return view('admin.cabor.detail', [
            'olahraga' => $olahraga,
            'nomor' => $nomor->paginate($pagination)->withQueryString()
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Olahraga  $olahraga
     * @return \Illuminate\Http\Response
     */
    public function edit(Olahraga $olahraga, int $id)
    {
        $olahraga = Olahraga::findorfail($id);
        return view('admin.cabor.editCabor', ['cabor' => $olahraga]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Olahraga  $olahraga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $olahraga = Olahraga::with('Nocabor')->find($id);


        $validated = $request->validate([
            'olahraga' => ['required'],
        ]);
        $olahraga->nama = $validated['olahraga'];
        $olahraga->update();


        // $nomor = $request->input('nomor');


        // foreach ($nomor as $key => $a) {
        //     $add = array(
        //         'olahraga_id' => $olahraga->id,
        //         'nomor' => $a
        //     );
        //     Nomor::create($add);
        // }

        return redirect()->route('olahraga')->with('toast_success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Olahraga $olahraga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $up = Olahraga::with('Nocabor')->find($id);
        Nomor::where('olahraga_id', $id)->delete();
        $up->delete();
        return redirect()->route('olahraga')->with('toast_success', 'Data berhasil dihapus.');
    }


    public function createNomor($id)
    {
        $olahraga = Olahraga::findorfail($id);
        return view('admin.cabor.addNomor', ['olahraga' => $olahraga]);
    }

    public function storeNomor(Request $request)
    {
        $validated = $request->validate([

            'olahraga_id' => ['required'],
            'nomor.*' => ['required'],
        ], ['nomor.*.required' => 'The nomor field is required.']);


        $nomor = $request->input('nomor');



        foreach ($nomor as $key => $a) {
            $ad = new Nomor;
            $ad->olahraga_id = $validated['olahraga_id'];
            $ad->nomor = $a;
            $ad->save();
        }


        return redirect()->back()->with('toast_success', 'Data Tersimpnan');
    }

    public function editNomor(Nomor $nomor, int $id)
    {
        $nomor = Nomor::with('Olga')->find($id);
        return view('admin.cabor.editNomor', ['nomor' => $nomor]);
    }

    public function updateNomor(Request $request)
    {
        $id = $request->id;
        $atlet = Nomor::findorfail($id);
        $validated = $request->validate([

            'nomor' => ['required'],
        ]);


        $atlet->nomor = $validated['nomor'];

        $atlet->update();


        return redirect()->back()->with('toast_success', 'Data Tersimpnan');
    }

    public function destroyNomor($id)
    {
        $up = Nomor::findorfail($id);
        $up->delete();
        return redirect()->back()->with('toast_success', 'Atlet berhasil dihapus.');
    }
}
