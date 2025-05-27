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
        $this->userMail = Auth::user()->email;
        $this->siswa_login = Siswa::where('email','=',$this->userMail)->first();
        $this->industris = Industri::all();
        $this->gurus = Guru::all();
        
    
        if (Auth::user()->role == 'siswa' && $this->siswa_login) {
            $this->siswa_id = $this->siswa_login->id;
        } elseif (Auth::user()->role == 'guru') {
            $this->guru_id = Auth::user()->guru->id;
        }

        if (!$this->siswa_login) {
            Auth::logout(); // logout user
            return redirect()->route('login')->with('akun_belum_terverifikasi', 'Akun Anda belum terverifikasi.');   
        }
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
