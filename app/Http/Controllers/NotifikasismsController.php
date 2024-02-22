<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class NotifikasismsController extends Controller
{
    
    public function create($id)
    {
        $borrowing = Borrowing::with('user')->findOrFail($id);

        return view('notifikasi.create', compact('borrowing'));
    }

    public function denda(Request $request, $id)
    {
        $borrowing = Borrowing::with('user')->findOrFail($id);
  
      $tgl_pinjam = strtotime($borrowing->tgl_pinjam);
        $tgl_kembali = strtotime($borrowing->tgl_kembali);
        $durasi = ($tgl_kembali - $tgl_pinjam) / 86400;
    
      
        $denda = 0;
        if ($durasi < 0) {
            $denda = abs($durasi) * 1000;
        }
    
        $denda = number_format($denda, 2,',','.');
    
        $this->sendSms($borrowing->user->no_handphone, 'Assallamuallaikum Wr. Wb. Kami dari perpustakaan ingin memberitahukan bahwa kamu memiliki denda pengembalian buku sebesar Rp' . $denda . ' Segera lakukan pengembalian dan membayar denda anda terimakasih');
    
        return redirect()->back()->with(['success'=>'Pesan berhasil dikirim']);
    }
    

    public function rimainder(Request $request, $id)
    {
        $borrowing = Borrowing::with('user')->findOrFail($id);
        $tgl_pinjam = strtotime($borrowing->tgl_pinjam);
        $tgl_kembali = strtotime($borrowing->tgl_kembali);
        $durasi = ($tgl_kembali - $tgl_pinjam) / 86400;
    
        $this->sendSms($borrowing->user->no_handphone, 'Assallamuallaikum Wr. Wb. Kami dari perpustakaan ingin memberitahukan bahwa masa berlaku peminjaman kamu tersisa ' . $durasi . ' hari lagi harap dikembalikan tepat waktu');

        return redirect()->back()->with(['success'=>'Pesan berhasil dikirim']);
    }

    private function sendSms($phoneNumber, $text,  $daysRemaining = null)
    {
        $client = new Client([
            'base_uri' => 'https://gg64k8.api.infobip.com',
            'headers' => [
                'Authorization' => 'App 14548563c7644f2e4c6ef6e445b7a15c-bb588f23-d99d-4da6-ae21-e20aa167ad3c',
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ]
        ]);
       

        try {
    
            $response = $client->post('/sms/2/text/advanced', [
                'json' => [
                    'messages' => [
                        [
                            'destinations' => [
                                ['to' => '+62895393384782']
                            ],
                            'from' => 'PERPUS ',
                            'text' => $text
                        ]
                    ]
                ]
            ]);

            if ($response->getStatusCode() == 200) {
                echo $response->getBody();
            }
            else {
                echo 'Unexpected HTTP status: ' . $response->getStatusCode();
            }
        }
        catch(RequestException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
