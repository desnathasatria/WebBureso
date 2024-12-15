<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    // Ambil data kritik dan saran
    public function getDataMessage(Request $request)
    {
        $limit = $request->input('limit', 10);
        $offset = $request->input('offset', 0);

        $messages = Message::orderBy('created_at', 'desc')
            ->skip($offset)
            ->take($limit)
            ->get();

        $total_count = Message::count();

        return response()->json([
            'data' => $messages,
            'total_count' => $total_count
        ]);
    }

    // Simpan kritik dan saran
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengirim' => 'required|string|max:255',
            'email_pengirim' => 'required|email|max:255',
            'pesan' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/messages'), $imageName);
        }

        Message::create([
            'name' => $request->nama_pengirim,
            'email' => $request->email_pengirim,
            'message' => $request->pesan,
            'image' => $imageName,
            'status' => 1, // Default status: "Belum dicek oleh admin"
        ]);

        return response()->json(['success' => true]);
    }
}
