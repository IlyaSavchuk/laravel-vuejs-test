<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Note::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Note::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return Note::find($note);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Note $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $note = Note::findOrFail($note);
        $note->update($request->all());

        return $note;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        if ($note) {
            $note->delete();
            return Response::HTTP_NO_CONTENT;
        }
        return Response::HTTP_BAD_REQUEST;
    }
}
