<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;

use Illuminate\Http\Request;


class PeminjamanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = now();
        $borrowings = Borrowing::paginate(5);
        
        foreach ($borrowings as $borrowing) {
            $durasi = strtotime($borrowing->tgl_kembali) - strtotime($borrowing->tgl_pinjam);
            $borrowing->durasi = round($durasi / (60 * 60 * 24));
        }
    
        return view('peminjaman.index', compact('borrowings', 'date'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();

        return view('peminjaman.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
            'books' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required'
        ]);

        $stock = Book::find($request->books);
        if ($stock->stock <= 0) {
            flash('Maaf Stock Buku Habis', 'danger');
            return redirect()->back();
        }

        $peminjaman = new Borrowing;
        $peminjaman->book_id = $request->books;
        $peminjaman->user_id = auth()->user()->id;
        $peminjaman->tgl_pinjam = $request->tgl_pinjam;
        $peminjaman->tgl_kembali = $request->tgl_kembali;
        $peminjaman->jumlah_pinjam = $request->jumlah_pinjam;
        $peminjaman->save();

        $book = Book::find($request->books);
        $book->stock = $book->stock - $request->jumlah_pinjam;
        $book->save();
        return redirect()->back()->with(['success'=>'Yeayyyy kamu berhasil meminjam buku, selamat membaca']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book, $id)
    {
        $book = Book::find($id);

        return view('peminjaman.create', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function periode(Request $request)
{
    if ($request->has('tgl_awal')) {
        $borrowings = Borrowing::with('user','book')->whereBetween('tgl_pinjam', [request('tgl_awal'), request('tgl_akhir')])
                                ->get();
    }

    $pdf = new \TCPDF();
    $pdf->AddPage();
    $view = \View::make('peminjaman.periode', compact('borrowings'))->render();
    $pdf->writeHTML($view, true, false, true, false, '');

    return $pdf->Output('rekap_periode_peminjaman.pdf');
}

public function all()
{
    $borrowings = Borrowing::all();

    $pdf = new \TCPDF();
    $pdf->AddPage();
    $view = \View::make('peminjaman.all', compact('borrowings'))->render();
    $pdf->writeHTML($view, true, false, true, false, '');

    return $pdf->Output('rekap_laporan_semua_peminjaman.pdf');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

    }

}