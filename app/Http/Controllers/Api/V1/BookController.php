<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\SaveBookRequest;
use App\Http\Controllers\Api\Controller;

class BookController extends Controller
{
    public function index ( )
    {   
        $books = Book :: all( );
        return  response( ) -> json( [ 'success' => true, 'data' => $books] );
}

/* ----------------------------- */

public function show($id)                                                     
{ 
        $book = Book :: find($id);
        
            return  $this ->checkModelExists( function ( ) use ($book) {
                return response( ) ->json(['success' => true, 'data' => $book ]);
    }, $book);
}

    /* -------------------------- */

    public function store(SaveBookRequest $request) 
    { 
        
            $book = Book::create($request->all());    
            return response()->json(['success' => true, 'message' => 'Libro creado.', 'data' => $book], Response::HTTP_CREATED); 
    }

    /* ----------------------------- */
 
    public function update(SaveBookRequest $request, $id) 
    {  
            $book = Book::find($id); 
     
            return $this->checkModelExists(function ( ) use )

            return response()->json(['success' => true, 'message' => 'Libro actualizado.', 'data' => $book], Response::HTTP_CREATED);  
    }, $book);
}
/* ------------------------------- */


 public function destroy($id)
{
        $book = Book::find($id);
        if (empty($book)) {
            return response()->json(['success' => false, 'message' => 'No existe este libro'], Response::HTTP_NOT_FOUND);
        }
        $book->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
 }
}