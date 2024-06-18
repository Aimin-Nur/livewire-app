<?php

namespace App\Livewire;
use App\Models\Pegawai;

use Livewire\Component;

class Employee extends Component
{
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
        return view('livewire.employee');
    }
}
