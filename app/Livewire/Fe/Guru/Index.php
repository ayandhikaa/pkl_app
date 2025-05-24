<?php

namespace App\Livewire\Fe\Guru;

use App\Models\Guru;
use Livewire\Component;
use App\Http\Request;

class Index extends Component
{
    public function render()
    {
        return view('livewire.fe.guru.index');
    }

    public function index(){
        $guru = Guru::get();
        return response()->json($guru, 200);
    }

    public function store(Request $request){
        $this->validate([
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'email' => 'required|email',
        ]);

        Guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'email' => $request->email,
        ]);

        return response()->json(['message' => 'Guru created successfully'], 200);

    }

    public function show(string $id){
        $guru = Guru::find($id);
        return response()->json($guru, 200);
    }

    public function update(Request $request, string $id){
        $this->validate([
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'email' => 'required|email',
        ]);

        Guru::where('id', $id)->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'email' => $request->email,
        ]);

        return response()->json(['message' => 'Guru updated successfully'], 200);
    }

    public function destroy(string $id){
        Guru::where('id', $id)->delete();
        return response()->json(['message' => 'Guru deleted successfully'], 200);
    }
}
