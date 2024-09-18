<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        $data = Ticket::all();

        return TicketResource::collection($data);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nama_pelapor' => 'required|string|max:50',
            'email_pelapor' => 'required|email',
            'sektor' => 'required|string|max:50',
            'keluhan' => 'required',
        ]);

        Ticket::create($validatedData);
        return response()->json([
            'message' => 'Laporan berhasil disimpan',
        ], 201);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'email_pelapor' => 'required|email|max:255',
            'sektor' => 'required|string|max:255',
            'keluhan' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        // Temukan data keluhan berdasarkan id
        $keluhan = Ticket::find($id);

        // Jika data keluhan tidak ditemukan
        if (!$keluhan) {
            return response()->json([
                'message' => 'Keluhan tidak ditemukan'
            ], 404);
        }

        // Update data keluhan dengan data baru
        $keluhan->update($request->all());

        // Kembalikan response success
        return response()->json([
            'message' => 'Keluhan berhasil diperbarui',
            'keluhan' => $keluhan
        ], 200);
    }

    public function destroy($id){

        $data = Ticket::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'Keluhan tidak ditemukan'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'message' => 'Keluhan berhasil dihapus'
        ], 200);
    }
}
