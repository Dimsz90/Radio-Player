<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;
use Intervention\Image\Facades\Image;
use spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Borrowing;

class BookController extends Controller
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
        $raks = Category::all();

        $books = Book::paginate(10);

        return view('books.index', compact('books','raks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();

        return view('books.create',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'       => 'required',
            'name'              => 'required',
            'description'       => 'required',
            'penerbit'          => 'required',
            'tanggal_terbit'    =>  'required',
            'stock'             =>  'required',
            'images'            => 'required|image|max:50000',
        ]);
    
        // Proses penyimpanan data buku...
        $book = Book::create($request->all());
    
        // Proses penyimpanan gambar...
        if($request->hasFile('images')) {
            $imageName = time().'.'.$request->images->extension();  
            $request->images->move(public_path('uploads'), $imageName);
            $book->update(['images' => $imageName]);
        }
    
        flash()->success('Buku berhasi ditambahkan');
        return redirect()->route('books');
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
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**

     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'penerbit' => 'required',
            'tanggal_terbit' => 'required|date',
            'stock' => 'required|integer',
            
        ]);

        $book->update($request->all());




    if($request->hasFile('images')) {
        // Hapus gambar lama
        Storage::delete('public/uploads/' . $book->images);

  
        $imageName = time().'.'.$request->images->extension();  
        $request->images->move(public_path('uploads'), $imageName);
        $book->update(['images' => $imageName]);
    }

    flash()->success('Data buku berhasil diupdate.');
    return redirect()->route('books');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
{
    if (Borrowing::where('book_id', $book->id)->exists()) {
        flash()->error('masih ada yang pinjem.');
        return redirect()->route('books');
    }

    Storage::delete('public/' . $book->images);

    $book->delete();
    flash()->success('selamat buku berhasil dihapus.');
    return redirect()->route('books');
}
public function rekap()
{
    $books = Book::all();

    $pdf = new \TCPDF();
    $pdf->AddPage();
    $view = \View::make('books.rekap', compact('books'))->render();
    $pdf->writeHTML($view, true, false, true, false, '');

    return $pdf->Output('rekap_buku.pdf');
}
private function validateRequest(){
    return tap(request()->validate([
        'category_id'       => 'required',
        'name'              => 'required',
        'description'       => 'required',
        'penerbit'          => 'required',
        'tanggal_terbit'    =>  'required',
        'stock'             =>  'required',
        'images'    => 'required|image|max:50000',
    ]), function(){
        if(request()->hasFile('images')){
            request()->validate([
                'images'    => 'required|image|max:50000',
            ]);
        }
    });
}

private function storeImage($book){
    if(request()->has('images')){
        $book->update([
            'images'  => request()->images->store('uploads','public'),
        ]);

        $images = Image::make(public_path('storage/'. $book->images))->fit(300,300, null, 'top-left');
        $images->save();
}
}
};