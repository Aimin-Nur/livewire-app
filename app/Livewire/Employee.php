<?php

namespace App\Livewire;
use App\Models\Pegawai;

use Livewire\Component;
use Livewire\WithPagination;

class Employee extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $email;
    public $alamat;


    public function store()
    {
        $rules = [
            'email' => 'required|email|unique:pegawai,email',
            'name' => 'required',
            'alamat' => 'required',
        ];

        $pesan = [
            'name.required' => 'Nama Wajib Diisi',
            'email.required' => 'Email Wajib diisi',
            'email.email' => 'Format Email Salah',
            'email.unique' => 'Email Anda sudah Terdaftar',
            'alamat.required' => 'Alamat Wajib diisi',
        ];
        $validated = $this->validate($rules, $pesan);
        Pegawai::create($validated);
        session()->flash('message', 'Data Berhasil Disimpan');
    }


    public function render()
    {
        $AllPegawai = Pegawai::orderBy('name', 'asc')->paginate(2);
        return view('livewire.employee', compact('AllPegawai'));
    }
}
