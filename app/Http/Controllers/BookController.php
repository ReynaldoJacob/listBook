<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Muestra la vista del formulario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view("catalogs.form");
    }

    /**
     * Guarda un nuevo libro.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \Illuminate\Support\Facades\DB;
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request){

        $request->validate(
            [
                'author' => 'required',
                'title' => 'required',
                'edition' => 'required',
                'publication_data' => 'required',
                'content_type' => 'required',
                'restrictions' => 'required',
                'subject' => 'required',
                'provider' => 'required',
            ],[
                'author.required' => 'Este campo es requerido',
                'title.required' => 'Este campo es requerido',
                'edition.required' => 'Este campo es requerido',
                'publication_data.required' => 'Este campo es requerido',
                'content_type.required' => 'Este campo es requerido',
                'restrictions.required' => 'Este campo es requerido',
                'subject.required' => 'Este campo es requerido',
                'provider.required' => 'Este campo es requerido',
            ]
        );

        try {
            DB::beginTransaction();
            $book = new Book();
            $book->author = $request->author;
            $book->title = $request->title;
            $book->edition = $request->edition;
            $book->publication_data = $request->publication_data;
            $book->content_type = $request->content_type;
            $book->restrictions = $request->restrictions;
            $book->subject = $request->subject;
            $book->provider = $request->provider;
            $book->save();
            DB::commit();

            return redirect('/books')->with("success", "Libro crado exitosamente.");
        } catch (Exception $e) {
            DB::rollback();
            return 500;
        }
    }   

    /**
    * Muestra la vista de la lista de libros.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function getViewBook(){
        
        return view("catalogs.index");
    }

    /**
    * Funcion que permite obtener todos los libros registrados.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function getBooks()
    {
        $books = Book::all();
        return $books;
    }

    /**
    * Funcion que permite obtener la informacion de un libro especifico
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function getInfoBook(Request $request){
        $book = Book::find($request->book_id);
        return $book;
    }

    /**
    * Funcion que permite actualizar un libro
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function saveEditBook(Request $request){

        try {
            DB::beginTransaction();
            $book = Book::find($request->book_id);
            $book->author = $request->author;
            $book->title = $request->title;
            $book->edition = $request->edition;
            $book->publication_data = $request->publication_data;
            $book->content_type = $request->content_type;
            $book->restrictions = $request->restrictions;
            $book->subject = $request->subject;
            $book->provider = $request->provider;
            $book->save();
            DB::commit();

            return redirect('/books')->with("success", "Libro crado exitosamente.");
        } catch (Exception $e) {
            DB::rollback();
            return 500;
        } 
    }

    /**
    * Funcion que permite eliminar un libro
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function deleteBook(Request $request)
    {
        try {
            DB::beginTransaction();
            $book = Book::find($request->book_id);
            $book->delete();
            DB::commit();

            return "200";
        } catch (Exception $e) {
            DB::rollback();
            return 500;
        }
    }
}
