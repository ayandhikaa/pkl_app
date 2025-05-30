<?php

namespace App\Livewire\Fe\Pkl;

use App\Models\Pkl;
use App\Models\Guru;
use App\Models\Siswa;
use Livewire\Component;
use App\Models\Industri;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Livewire\Volt\Compilers\mount;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $siswa_id, $industri_id, $guru_id, $mulai, $selesai, $siswa_login, $industris, $gurus;
    public $isOpen = 0;

    use WithPagination;

    protected $listeners = ['closeModal'];

    public $rowPerPage=3;
    public $search;
    public $userMail;

    public function mount() {
        $user = Auth::user();
        $this->userMail = Auth::user()->email;

        if ($user->hasRole('siswa')) {
            $this->siswa_login = Siswa::where('email', $this->userMail)->first();
        
            if (!$this->siswa_login) {
                // Email tidak ditemukan di tabel siswa (ini seharusnya sudah dicegah oleh middleware)
                session()->flash('akun_belum_terverifikasi', 'Email tidak terdaftar sebagai siswa.');
                redirect('/login')->send(); // pakai ->send() karena ini dalam lifecycle Livewire
                return;
            }
        
            $this->siswa_id = $this->siswa_login->id;
        }

        if ($user->hasRole('guru')) {
            $this->guru_id = optional($user->guru)->id;
        }
        
        $this->industris = Industri::all();
        $this->gurus = Guru::all();
    }
    
    
    public function render()
    {
        $query = Pkl::with(['siswa', 'industri', 'guru'])->latest();

        if ($this->search !== null) {
            $query->whereHas('siswa', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })->orWhereHas('industri', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            });
        }

        return view('livewire.fe.pkl.index', [
            'pkls' => $query->paginate($this->rowPerPage),
            'siswa_login' => $this->siswa_login,
            'industris' => $this->industris,
            'gurus' => $this->gurus,
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
        $this->siswa_id      ='';
        $this->industri_id   = '';
        $this->guru_id       = '';
        $this->mulai        ='';
        $this->selesai      = '';
    }
}
