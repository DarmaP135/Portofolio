<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Atlet;
use App\Models\Nomor;
use App\Models\Perolehan;
use App\Models\Olahraga;
use App\Models\Role;
use APP\Models\Total;
use App\Models\User;
use Illuminate\Http\Request;

class PerolehanController extends Controller
{
    public function index()
    {
        $acara = Acara::all();
        return view('admin.perolehan.list', ['acara' => $acara]);
    }

    public function show(Request $request, $id)
    {
        $pagination = 5;
        $a = $request->id;
        $acara = Acara::findorfail($id);
        $emas = Perolehan::where('medali', '=', 'Emas')->count();
        $perak = Perolehan::where('medali', '=', 'Perak')->count();
        $perunggu = Perolehan::where('medali', '=', 'Perunggu')->count();
        $total = $emas + $perak + $perunggu;

        $perolehan = Perolehan::where([
            ['acara_id', '=', $a]
        ])->with('nomor')->latest();

        if ($request->has('atlet')) {
            $search = $request->atlet;
            $perolehan->Where('atletl_id', 'like', '%' . $search . '%');
        }
        if ($request->has('olahraga')) {
            $olga = $request->olahraga;
            $perolehan->Where('olahraga_id', 'like', '%' . $olga . '%');
        }
        if ($request->has('nomor')) {
            $nomor = $request->nomor;
            $perolehan->Where('nomor_id', 'like', '%' . $nomor . '%');
        }


        return view('admin.perolehan.perolehan', [
            'acara' => $acara,
            'medali' => $perolehan->paginate($pagination)->withQueryString(),
            'emas' => $emas,
            'perak' => $perak,
            'perunggu' => $perunggu,
            'total' => $total
        ]);
    }


    public function create(Request $request, $id)
    {
        $acara = Acara::findorfail($id);
        $olahraga = Olahraga::all();
        return view('admin.perolehan.addMedali', ['olahraga' => $olahraga, 'acara' => $acara]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [

                'atlet.*' => ['required'],
                'olahraga' => ['required'],
                'medali' => ['required'],
            ]
        );

        $atlet = $request->input('atlet');


        foreach ($atlet as $key => $a) {
            $add = new Perolehan();
            $add->atletl_id  = $a;
            $add->acara_id = $request['event'];
            $add->olahraga_id = $validated['olahraga'];
            $add->nomor_id = $request['nomor'];
            $add->medali = $validated['medali'];
            $add->save();
        }


        return redirect()->back()->with('toast_success', 'Data Tersimpnan');
    }

    public function edit($id)
    {
        $perolehan = Perolehan::with('Kegiatan', 'atlet', 'olga', 'nomor')->find($id);
        $olahraga = Olahraga::all();
        return view('admin.perolehan.editMedali', ['perolehan' => $perolehan, 'olahraga' => $olahraga]);
    }



    public function update(Request $request, $id)
    {

        $add = Perolehan::with('Kegiatan', 'atlet', 'olga', 'nomor')->find($id);

        $add->acara_id = $request['event'];
        $add->atletl_id = $request['atlet'];
        $add->olahraga_id = $request['olahraga'];
        $add->nomor_id = $request['nomor'];
        $add->medali = $request['medali'];
        $add->update();




        return redirect()->back()->with('toast_success', 'Data berhasil diubah.');
    }

    public function destroy($id)
    {
        $up = Perolehan::findorfail($id);
        $up->delete();
        return redirect()->back()->with('toast_success', 'Data berhasil dihapus.');
    }





    // Search
    public function select(Request $request)
    {
        $provinces = [];

        if ($request->has('q')) {
            $search = $request->q;
            $provinces = Olahraga::select("id", "nama")
                ->Where('nama', 'like', '%' . $search . '%')
                ->get();
        } else {
            $provinces = Olahraga::limit(10)->get();
        }
        return response()->json($provinces);
    }

    public function select1(Request $request)
    {
        $regencies = [];
        $olahraga = $request->olahraga;
        if ($request->has('q')) {
            $search = $request->q;
            $regencies = Nomor::select("id", "olahraga_id", "nomor")
                ->where('olahraga_id', $olahraga)
                ->Where('nomor', 'LIKE', "%$search%")
                ->get();
        } else {
            $regencies = Nomor::where('olahraga_id', $olahraga)->limit(10)->get();
        }
        return response()->json($regencies);
    }

    public function select2(Request $request)
    {
        $atlet = [];
        $menu = $request->inputVal;
        if ($request->has('q')) {
            $search = $request->q;
            $atlet = Atlet::select("id", "acara_id", "nama")
                ->where('acara_id', $menu)
                ->Where('nama', 'like', '%' . $search . '%')
                ->get();
        } else {
            $atlet = Atlet::where('acara_id', $menu)->limit(10)->get();
        }
        return response()->json($atlet);
    }

    public function select3(Request $request)
    {
        $cari = [];

        if ($request->has('q')) {
            $search = $request->q;
            $cari = Atlet::select("id", "nama")
                ->Where('nama', 'like', '%' . $search . '%')
                ->get();
        } else {
            $cari = Atlet::limit(10)->get();
        }
        return response()->json($cari);
    }


    //Operator

    public function indexOperator()
    {
        $acara = Acara::all();
        return view('admin.perolehan.list', ['acara' => $acara]);
    }

    public function showOperator(Request $request, $id)
    {
        $pagination = 5;
        $a = $request->id;
        $acara = Acara::findorfail($id);
        $emas = Perolehan::where('medali', '=', 'Emas')->count();
        $perak = Perolehan::where('medali', '=', 'Perak')->count();
        $perunggu = Perolehan::where('medali', '=', 'Perunggu')->count();
        $total = $emas + $perak + $perunggu;

        $perolehan = Perolehan::where([
            ['acara_id', '=', $a]
        ])->latest();

        if ($request->has('atlet')) {
            $search = $request->atlet;
            $perolehan->Where('atletl_id', 'like', '%' . $search . '%');
        }
        if ($request->has('olahraga')) {
            $olga = $request->olahraga;
            $perolehan->Where('olahraga_id', 'like', '%' . $olga . '%');
        }
        if ($request->has('nomor')) {
            $nomor = $request->nomor;
            $perolehan->Where('nomor_id', 'like', '%' . $nomor . '%');
        }


        return view('admin.perolehan.perolehan', [
            'acara' => $acara,
            'medali' => $perolehan->paginate($pagination)->withQueryString(),
            'emas' => $emas,
            'perak' => $perak,
            'perunggu' => $perunggu,
            'total' => $total
        ]);
    }


    public function createOperator($id)
    {
        $acara = Acara::findorfail($id);
        $olahraga = Olahraga::all();
        return view('admin.perolehan.addMedali', ['olahraga' => $olahraga, 'acara' => $acara]);
    }

    public function storeOperator(Request $request)
    {
        $validated = $request->validate(
            [
                'atlet.*' => ['required'],
                'olahraga' => ['required'],
                'medali' => ['required'],
            ]
        );

        $atlet = $request->input('atlet');


        foreach ($atlet as $key => $a) {
            $add = new Perolehan();
            $add->atletl_id  = $a;
            $add->acara_id = $request['event'];
            $add->olahraga_id = $validated['olahraga'];
            $add->nomor_id = $request['nomor'];
            $add->medali = $validated['medali'];
            $add->save();
        }


        return redirect()->back()->with('toast_success', 'Data Tersimpnan');
    }

    public function editOperator($id)
    {
        $perolehan = Perolehan::with('Kegiatan', 'atlet', 'olga', 'nomor')->find($id);
        $olahraga = Olahraga::all();
        return view('admin.perolehan.editMedali', ['perolehan' => $perolehan, 'olahraga' => $olahraga]);
    }



    public function updateOperator(Request $request, $id)
    {

        $add = Perolehan::with('Kegiatan', 'atlet', 'olga', 'nomor')->find($id);

        $add->acara_id = $request['event'];
        $add->atletl_id = $request['atlet'];
        $add->olahraga_id = $request['olahraga'];
        $add->nomor_id = $request['nomor'];
        $add->medali = $request['medali'];
        $add->update();




        return redirect()->back()->with('toast_success', 'Data berhasil diubah.');
    }

    public function destroyOperator($id)
    {
        $up = Perolehan::findorfail($id);
        $up->delete();
        return redirect()->back()->with('toast_success', 'Data berhasil dihapus.');
    }



    public function homepage(Request $request)
    {
        $acara = Acara::all();
        return view('homepage', ['acara' => $acara]);
        // $pagination = 5;
        // $a = $request->id;
        // $emas = Perolehan::where('acara_id', '=', 1)->where('medali', '=', 'Emas')->count();
        // $perak = Perolehan::where('acara_id', '=', 1)->where('medali', '=', 'Perak')->count();
        // $perunggu = Perolehan::where('acara_id', '=', 1)->where('medali', '=', 'Perunggu')->count();
        // $total = $emas + $perak + $perunggu;

        // $perolehan = Perolehan::where([
        //     ['acara_id', '=', 1]
        // ])->latest();

        // if ($request->has('atlet')) {
        //     $search = $request->atlet;
        //     $perolehan->Where('atletl_id', 'like', '%' . $search . '%');
        // }
        // if ($request->has('olahraga')) {
        //     $olga = $request->olahraga;
        //     $perolehan->Where('olahraga_id', 'like', '%' . $olga . '%');
        // }
        // if ($request->has('nomor')) {
        //     $nomor = $request->nomor;
        //     $perolehan->Where('nomor_id', 'like', '%' . $nomor . '%');
        // }


        // return view('homepage', [
        //     'medali' => $perolehan->paginate($pagination)->withQueryString(),
        //     'emas' => $emas,
        //     'perak' => $perak,
        //     'perunggu' => $perunggu,
        //     'total' => $total
        // ]);
    }

    public function perolehan(Request $request, $id)
    {
        $pagination = 5;
        $a = $request->id;
        $acara = Acara::findorfail($id);
        $emas = Perolehan::where('acara_id', '=', $a)->where('medali', '=', 'Emas')->count();
        $perak = Perolehan::where('acara_id', '=', $a)->where('medali', '=', 'Perak')->count();
        $perunggu = Perolehan::where('acara_id', '=', $a)->where('medali', '=', 'Perunggu')->count();
        $total = $emas + $perak + $perunggu;

        $perolehan = Perolehan::where([
            ['acara_id', '=', $a]
        ])->with('nomor')->latest();

        if ($request->has('atlet')) {
            $search = $request->atlet;
            $perolehan->Where('atletl_id', 'like', '%' . $search . '%');
        }
        if ($request->has('olahraga')) {
            $olga = $request->olahraga;
            $perolehan->Where('olahraga_id', 'like', '%' . $olga . '%');
        }
        if ($request->has('nomor')) {
            $nomor = $request->nomor;
            $perolehan->Where('nomor_id', 'like', '%' . $nomor . '%');
        }


        return view('perolehan', [
            'acara' => $acara,
            'medali' => $perolehan->paginate($pagination)->withQueryString(),
            'emas' => $emas,
            'perak' => $perak,
            'perunggu' => $perunggu,
            'total' => $total
        ]);
    }
}
