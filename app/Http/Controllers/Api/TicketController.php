<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class TicketController extends Controller
{
    public function index(){
        $count = Ticket::count();
        $open = Ticket::where('keterangan', '1')->count();
        $closed = Ticket::where('keterangan', '2')->count();
        // $data = Ticket::all();
        $data = Ticket::orderByRaw('keterangan = 1 DESC')->get();


        return response()->json([
            'total' => $count,
            'open' => $open,
            'closed' => $closed,
            'data' => TicketResource::collection($data)
        ]);
    }

    public function ticketById($id){
        $ticket = Ticket::where('id', $id)->first();

        if (!$ticket) {
            return response()->json([
                'message' => 'Keluhan tidak ditemukan'
            ], 404);
        }

        return new TicketResource($ticket);
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
            'nama_pelapor' => 'sometimes|required|string|max:255',
            'email_pelapor' => 'sometimes|required|email|max:255',
            'sektor' => 'sometimes|required|string|max:255',
            'keluhan' => 'sometimes|required|string|max:255',
            'keterangan' => 'sometimes|required|string|max:255',
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
