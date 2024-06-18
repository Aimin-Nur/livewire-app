<?php

namespace App\Livewire;

use Livewire\Component;

class Employee extends Component
{
    public $nama;
    public $email;
    public $alamat;
    
    public function store()
    {
        $rules = [
            'email' => 'required|email',
            'nama' => 'required',
            'alamat' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Wajib Diisi',
            'email.required' => 'Email Wajib diisi',
            'email.email' => 'Format Email Salah',
            'alamat.required' => 'Alamat Wajib diisi',
        ];
        $validated = $this->validate($rules, $pesan);
    }


    public function render()
    {
        return view('livewire.employee');
    }
}
