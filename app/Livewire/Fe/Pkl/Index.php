<?php

namespace App\Livewire\Fe\Pkl;

use App\Models\Pkl;
use App\Models\Guru;
use App\Models\Siswa;
use Livewire\Component;
use App\Models\Industri;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Livewire\Volt\Compilers\Mount;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $siswa_id, $industri_id, $guru_id, $mulai, $selesai;
    public $isOpen = 0;

    use WithPagination;

    public $rowPerPage=3;
    public $search;
    public $userMail;

    public function mount(){
        //membaca email user yang seddang login
        $this->userMail = Auth::user()->email;
    }
    
    public function render()
    {
        return view('livewire.fe.pkl.index',[
            'pkls' => Pkl::latest()->paginate($this->rowPerPage),
            'pkls' => $this->search === NULL ?
                        Pkl::latest()->paginate($this->rowPerPage) :
                        Pkl::latest()->whereHas('siswa', function ($query) {
                                                $query->where('nama', 'like', '%' . $this->search . '%');
                                            })
                                    ->orWhereHas('industri', function ($query) {
                                                $query->where('nama', 'like', '%' . $this->search . '%');
                                    })->paginate($this->rowPerPage),
                
            
            //mengakses record siswa yang emailnya sama dengan user yang sedang login
            'siswa_login'=>Siswa::where('email','=',$this->userMail)->first(),
            dd($this->userMail),
            'industris'=>Industri::all(),
            'gurus'=>Guru::all(),
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

    public function store()
    {
        $this->validate([
                'siswa_id'       => 'required',
                'industri_id'    => 'required',
                'guru_id'        => 'required',
                'mulai'         => 'required|date',
                'selesai'       => 'required|date|after:mulai',
            ]);
        

        DB::beginTransaction();
        
        try {
            $siswa = Siswa::find($this->siswa_id);

            if ($siswa->status_pkl) {

                DB::rollBack();
                $this->closeModal();

                return redirect()->route('dashboard')->with('error', 'Transaksi dibatalkan: Siswa sudah melapor.');
            }

            // Simpan data PKL
            Pkl::create([
                'siswa_id'      => $this->siswa_id,
                'industri_id'   => $this->industri_id,
                'guru_id'       => $this->guru_id,
                'mulai'         => $this->mulai,
                'selesai'       => $this->selesai,
            ]);

            // Update status_lapor siswa
            $siswa->update(['status_lapor_pkl' => 1]);

            DB::commit();
            
            $this->closeModal();
            $this->resetInputFields();

            return redirect()->route('dashboard')->with('success', 'Data PKL berhasil disimpan dan status siswa diperbarui!');

            
        }
        catch (\Exception $e) {
            DB::rollBack();
            $this->closeModal();
            return redirect()->route('dashboard')->with('error', 'Terjadi kesalahan:');
        }
    }
}