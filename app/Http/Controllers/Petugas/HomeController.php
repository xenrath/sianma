<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Antrian;
use App\Models\Loket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $lokets = Loket::where('petugas_id', auth()->user()->id)->get();

        return view('petugas.home', compact('lokets'));
    }

    public function selanjutnya($id)
    {
        $loket = Loket::where('id', $id)->first();

        $antrian = Antrian::where([['loket_id', $loket->id], ['status', false]])
            ->whereDate('created_at', \Carbon\Carbon::today())
            ->first();

        Antrian::where('id', $antrian->id)->update([
            'status' => true
        ]);

        return back()->with('success', 'Berhasil melanjutkan Antrian');
    }

    public function ulangi($id)
    {
        $loket = Loket::where('id', $id)->first();

        $antrian = Antrian::where([['loket_id', $loket->id], ['status', true]])
            ->whereDate('created_at', \Carbon\Carbon::today())
            ->orderBy('id', 'desc')
            ->first();

        return back()->with('success', 'Berhasil mengulangi Antrian ' . $antrian->urutan);
    }
}
