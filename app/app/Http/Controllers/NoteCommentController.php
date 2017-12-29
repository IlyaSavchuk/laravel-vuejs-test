<?php

namespace App\Http\Controllers;

use App\NoteComment;
use Illuminate\Http\Request;

class NoteCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($note)
    {
        return NoteComment::where(['node_id' => $note]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $note)
    {
        return Note::find($note)->comments()->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NoteComment $noteComment
     * @return \Illuminate\Http\Response
     */
    public function show($note, NoteComment $noteComment)
    {
        return Note::find($note)->comments()->find($noteComment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\NoteComment $noteComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $note, NoteComment $noteComment)
    {
        $note = Note::findOrFail($note);
        $note->update($request->all());

        return $note;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NoteComment $noteComment
     * @return \Illuminate\Http\Response
     */
    public function destroy($note, NoteComment $noteComment)
    {
        NoteComment::findOrFail($noteComment)->delete();
        return Response::HTTP_NO_CONTENT;
    }
}
