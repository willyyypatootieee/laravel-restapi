<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Carbon;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // get all authors
    $authors = Author::all();
        if(!empty($authors)) {
            return Response::json(['data' => $authors], 201);
    }  else  {
        return Response::json(['message' => 'No authors found'], 404);
    }
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = array();
        $data['author_name'] = $request->author_name;
        $data['author_contact_no'] = $request->author_contact_no;
        $data['author_country'] = $request->author_country;
        $data['created_at'] = Carbon::now();

        $author =  Author::create($data);
  

        if($authors) {
            return Response::json(['message' => 
        'New Authot Has Been Created Successfully!'], 201);
    }  else  {
        return Response::json(['message' => 'Something went wrong...'], 404);
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
            
    // get authors by id
    $authorss = Author::find($author->id);
        if(!empty($authorss)) {
            return Response::json(['data' => $authorss], 201);
    }  else  {
        return Response::json(['message' => 'No authors found'], 404);
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }
}
