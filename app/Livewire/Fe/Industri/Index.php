<?php

namespace App\Livewire\Fe\Industri;

use App\Models\Pkl;
use App\Models\Siswa;
use Livewire\Component;
use App\Models\Industri;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $indNama,$indBidangUsaha,$indAlamat,$indKontak,$indEmail,$indWebsite,$indFoto;
    public $siswa_id, $industri_id, $guru_id, $mulai, $selesai;

    public $isOpen = 0;

    use WithPagination, WithFileUploads;

    public $rowPerPage=3;
    public $search;
    public $userMail;

    public function mount(){
        //membaca email user yang seddang login
        $this->userMail = Auth::user()->email;
    }
    
    public function render()
    {
        return view('livewire.fe.industri.index',[
            'industris' => $this->search === NULL ?
                Industri::latest()->paginate($this->rowPerPage) :
                Industri::latest()
                    ->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('bidang_usaha', 'like', '%' . $this->search . '%')
                    ->orWhere('alamat', 'like', '%' . $this->search . '%')
                    ->paginate($this->rowPerPage),
                              
            'siswa_login'=>Siswa::where('email','=',$this->userMail)->first(),
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    
    public function openModal()
    {
        $this->isOpen = true;
    }


    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->indNama = '';
        $this->indBidangUsaha = '';
        $this->indAlamat = '';
        $this->indKontak = '';
        $this->indEmail = '';
        $this->indWebsite = '';
        $this->indFoto = '';
    }

    public function store()
    {
        $this->siswa_id = Siswa::where('email', $this->userMail)->first()->id ?? null;

            $this->validate([
            'indNama' => 'required|string|max:255',
            'indBidangUsaha' => 'required|string|max:255',
            'indAlamat' => 'required|string',
            'indKontak' => 'nullable|string|max:50',
            'indEmail' => 'nullable|email',
            'indWebsite' => 'nullable|url',
            'indFoto' => 'nullable|image|max:2048',
            ]);
        
        $fotoPath = null;
        if ($this->indFoto) {
            $fotoPath = $this->indFoto->store('foto-industri', 'public');
        }  
        

        DB::beginTransaction();
        
        try {
            $siswa = Siswa::find($this->siswa_id);

            if ($siswa->status_pkl) {

                DB::rollBack();
                $this->closeModal();

                return redirect()->route('dashboard')->with('error', 'Transaksi dibatalkan: Siswa sudah melapor.');
            }

            // Simpan data PKL
            Industri::create([
                'nama' => $this->indNama,
                'bidang_usaha' => $this->indBidangUsaha,
                'alamat' => $this->indAlamat,
                'kontak' => $this->indKontak,
                'email' => $this->indEmail,
                'website' => $this->indWebsite,
                'foto' => $fotoPath,
            ]);

            // Update status_lapor siswa
            $siswa->update(['status_pkl' => 1]);

            DB::commit();
            
            $this->resetInputFields();
            $this->closeModal();

            return redirect()->route('industri')->with('success', 'Data PKL berhasil disimpan dan status siswa diperbarui!');

            
        }
        catch (\Exception $e) {
            DB::rollBack();
            $this->closeModal();
            return redirect()->route('industri')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}