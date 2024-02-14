<?php

namespace App\Http\Controllers;

use PDF;
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
            'denda'         => 'required',
            'tgl_pinjm'    => 'required',
            'tgl_kembali'   => 'required',
        ]);

        $pengembalian = Pengembalian::create([
            'book_id'       => $borrowing->book->id,
            'user_id'       => $borrowing->user->id,
            'durasi'        => $request->input('durasi'),
            'jumlah_pinjam' => $request->input('jumlah_pinjam'),
            'denda'         => $request->input('denda'),
            'tgl_pinjam'     => $request->input('tgl_pinjam'),
            'tgl_kembali'   => $request->input('tgl_kembali'),
        ]);

        $borrowing->delete();

        $book = Book::find($borrowing->book_id);

        $book->stock = $book->stock + $request->input('jumlah_pinjam');

        $book->save();

        return redirect()->route('pengembalian.index')->with(['success', 'Pengembalain behasil dilakukan']);
    }

    public function show()
    {
        $date = now();
        $pengembalians = Pengembalian::paginate(5);

        return view('laporan.pengembalian.index', compact('pengembalians','date'));
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

    return $pdf->Output('rekap_periode_peminjaman.pdf');
}

public function all()
{
    $pengembalians = Borrowing::all();

    $pdf = new \TCPDF();
    $pdf->AddPage();
    $view = \View::make('pengembalian.all', compact('pengembalians'))->render();
    $pdf->writeHTML($view, true, false, true, false, '');

    return $pdf->Output('rekap_laporan_semua_pengembalian.pdf');
}
}
