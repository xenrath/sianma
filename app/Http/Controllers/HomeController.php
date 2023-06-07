<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Loket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $today = Carbon::today()->translatedFormat('l, d F Y');
        $lokets = Loket::get();

        return view('home', compact('today', 'lokets'));
    }

    public function cek_user()
    {
        if (auth()->check()) {
            if (auth()->user()->isDev()) {
                return redirect('dev');
            } elseif (auth()->user()->isAdmin()) {
                return redirect('admin');
            } elseif (auth()->user()->isPetugas()) {
                return redirect('petugas');
            }
        } else {
            return redirect('/');
        }
    }

    public function antrian($id)
    {
        $antrians = Antrian::where('loket_id', $id)->whereDate('created_at', Carbon::today())->get();

        if (count($antrians) > 0) {
            $urutan = count($antrians) + 1;
        } else {
            $urutan = 1;
        }

        Antrian::create([
            'loket_id' => $id,
            'urutan' => $urutan
        ]);

        return back()->with('success', 'Berhasil membuat Antrian');
    }
}
