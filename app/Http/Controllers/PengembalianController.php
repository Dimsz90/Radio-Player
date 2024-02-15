<?php

namespace App\Http\Controllers;


use App\Models\Borrowing;
use App\Models\Pengembalian;
use App\Models\Book;

use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $date = now();
        $borrowings = Borrowing::paginate(5);

        return view('pengembalian.index', compact('date','borrowings'));
    }

    public function create($id)
    {
        $date = now();
        $pengembalian = Borrowing::findOrFail($id);

        return view('pengembalian.create', compact('pengembalian','date'));
    }

    public function store(Request $request, $id)
    {
        $borrowing = Borrowing::findOrFail($id);

        $this->validate($request,[
            'durasi'        => 'required',
            'jumlah_pinjam' => 'required',
            'tgl_pinjam'    => 'required',
            'tgl_kembali'   => 'required',
        ]);


        $pengembalian = new Pengembalian;
        $pengembalian->book_id = $borrowing->book->id;
        $pengembalian->user_id = $borrowing->user->id;
        $pengembalian->durasi = $request->durasi;
        $pengembalian->jumlah_pinjam = $request->jumlah_pinjam;
        $pengembalian->denda = $request->denda ?? 0;
        $pengembalian->tgl_pinjam = $request->tgl_pinjam;
        $pengembalian->tgl_kembali = $request->tgl_kembali;
        $pengembalian->save();


        $borrowing->delete();

        $book = Book::find($borrowing->book_id);

        $book->stock = $book->stock + $request->input('jumlah_pinjam');

        $book->save();

        return redirect()->route('pengembalian')->with(['success', 'Pengembalain behasil dilakukan']);
    }

    public function show()
    {
        $date = now();
        $pengembalians = Pengembalian::paginate(5);

        return view('pengembalian.show', compact('pengembalians','date'));
    }
    public function periode(Request $request)
{
    if ($request->has('tgl_awal')) {
        $pengembalians = Pengembalian::with('user','book')->whereBetween('tgl_pinjam', [request('tgl_awal'), request('tgl_akhir')])
                                ->get();
    }

    $pdf = new \TCPDF();
    $pdf->AddPage();
    $view = \View::make('pengembalian.periode', compact('pengembalians'))->render();
    $pdf->writeHTML($view, true, false, true, false, '');

    return $pdf->Output('rekap_periode_peminjaman.pdf','i');
}

public function all()
{
    $pengembalians = Pengembalian::all();

    $pdf = new \TCPDF();
    $pdf->AddPage();
    $view = \View::make('pengembalian.all', compact('pengembalians'))->render();
    $pdf->writeHTML($view, true, false, true, false, '');

    return 
    $pdf->Output('rekap_laporan_semua_pengembalian.pdf', 'i');
}

}

