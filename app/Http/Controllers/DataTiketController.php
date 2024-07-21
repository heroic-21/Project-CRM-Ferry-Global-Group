<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class DataTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataTiket = Ticket::with('user')->get();
        $totalTiket = Ticket::count();
        $totalTiketTertunda = Ticket::where('status_tiket', 'Tertunda')->count();
        $totalTiketBerangkat = Ticket::where('status_tiket', 'Sudah Berangkat')->count();
        $totalTiketBelum = Ticket::where('status_tiket', 'Belum Berangkat')->count();
        $totalTiketBatal = Ticket::where('status_tiket', 'Batal')->count();
        $totalTiketPremium = Ticket::where('kelas_tiket', 'Premium')->count();
        $totalTiketBiasa = Ticket::where('kelas_tiket', 'Biasa')->count();
        return view('apps.tickets', compact('dataTiket', 'totalTiket', 'totalTiketTertunda', 'totalTiketBerangkat', 'totalTiketBatal', 'totalTiketBelum', 'totalTiketPremium', 'totalTiketBiasa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id_tiket)
    {
        $tiket = Ticket::findOrFail($id_tiket);
        return view('apps.editTickets', compact('tiket'));
    }

    public function update(Request $request, $id_tiket)
    {
        $tiket = Ticket::findOrFail($id_tiket);
        $this->validate($request, [
            'rute'=>'required',
        ]);
        $tiket->save();
        return redirect()->route('backTiket')->with('success', 'Tiket berhasil dihapus.');
    }

    public function destroy($id_tiket)
    {
        $ticket = Ticket::where('id_tiket', $id_tiket)->first();
        $ticket->delete();
        return redirect()->route('backTiket')->with('success', 'Tiket berhasil dihapus.');
    }
}
