<?php

namespace App\Livewire\Fe\Pkl;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\Pkl;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Industri;
use App\Models\Guru;


class Create extends Component
{
    public $siswa_id, $siswa_login, $mulai, $selesai, $industris, $gurus, $guru_id, $industri_id;
    public $isOpen = false;
    public function mount()
    {
        $this->siswa_login = Siswa::where('email', Auth::user()->email)->first();
        $this->industris = Industri::all();
        $this->gurus = Guru::all();
        $this->isOpen = true;
    
        if ($this->siswa_login) {
            $this->siswa_id = $this->siswa_login->id;
        }
    }
    

    public function updatedSiswaId($value)
    {
        $this->siswa_login = Siswa::find($value);
    }

    public function render()
    {
        logger('Siswa login:', ['data' => $this->siswa_login]);
        return view('livewire.fe.pkl.create');
    }

    private function resetInputFields()
    {
        $this->siswa_id = '';
        $this->industri_id = '';
        $this->guru_id = '';
        $this->mulai = '';
        $this->selesai = '';
    }

    public function store()
    {
        
        $this->validate([
            'siswa_id' => 'required',
            'industri_id' => 'required',
            'guru_id' => 'required',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after:mulai',
        ]);

        DB::beginTransaction();

        try {
            $siswa = Siswa::find($this->siswa_id);

            if (!$siswa) {
                DB::rollBack();
                $this->closeModal();
                session()->flash('error', 'Siswa tidak ditemukan.');
                return;
            }

            if ($siswa->status_pkl) {
                DB::rollBack();
                $this->closeModal();
                session()->flash('error', 'Transaksi dibatalkan: Siswa sudah melapor.');
                return;
            }

            // Cek apakah siswa sudah memiliki entri PKL
            $existingPkl = Pkl::where('siswa_id', $this->siswa_id)->exists();

            if ($existingPkl) {
                $this->closeModal();
                session()->flash('error', 'Kamu sudah pernah mengisi data PKL.');
                return;
            }


            // Simpan data PKL
            Pkl::create([
                'siswa_id' => $this->siswa_id,
                'industri_id' => $this->industri_id,
                'guru_id' => $this->guru_id,
                'mulai' => $this->mulai,
                'selesai' => $this->selesai,
            ]);

            // Update status_lapor siswa
            $siswa->update(['status_lapor_pkl' => 1]);

            DB::commit();

            $this->closeModal();
            $this->resetInputFields();

            session()->flash('success', 'Data PKL berhasil disimpan dan status siswa diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->closeModal();
            session()->flash('error', 'Terjadi kesalahan:');
        }
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->dispatch('closeModal');
    }
}
