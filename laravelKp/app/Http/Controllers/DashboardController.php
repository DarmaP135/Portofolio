<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;
use App\Models\Atlet;
use App\Models\Nomor;
use App\Models\Perolehan;
use APP\Models\Total;
use App\Models\Olahraga;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Acara::all()->count();
        $posts1 = Olahraga::all()->count();
        $posts2 = Nomor::all()->count();
        return view('admin.admin', [
            'posts' => $posts,
            'posts1' => $posts1,
            'posts2' => $posts2
        ]);
    }

    public function index1()
    {
        $posts = Acara::all()->count();
        $posts1 = Olahraga::all()->count();
        $posts2 = Nomor::all()->count();
        return view('admin.admin', [
            'posts' => $posts,
            'posts1' => $posts1,
            'posts2' => $posts2
        ]);
    }
}
