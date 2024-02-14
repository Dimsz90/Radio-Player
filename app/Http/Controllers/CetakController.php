<?php

namespace App\Http\Controllers;

use Elibyy\TCPDF\Facades\TCPDF;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function index()
    {
        $users = User::whereHas(
            'roles', function($q){
                $q->where('name', 'siswa');
            }
        )->paginate(10);
        return view('cetak.kartu.index', compact('users'));
    }

    public function detail($id)
    {
        $user = Role::with('users')->where('name','siswa')->findOrFail($id);

        return view('cetak.kartu.show',compact('user'));
    }
    public function kartu($id)
    {
        $user = User::whereHas(
                    'roles', function($q){
                        $q->where('name', 'siswa');
                    }
                )->findOrFail($id);
        $view = view('cetak.kartu.anggota', compact('user'))->render();
        $pdf = new TCPDF;
        $pdf::SetTitle('Kartu Anggota');
        $pdf::AddPage();
        $pdf::writeHTML($view, true, false, true, false, '');
        $pdf::Output('kartu_anggota.pdf');
    }
    
}

