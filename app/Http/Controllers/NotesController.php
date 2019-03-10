<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class NotesController extends Controller
{
    function showNotes() {
        return Note::all();
    }

    function storeNote(Request $request) {
        $data = $this->validate($request, [
            'title' => 'required|string',
            'text' => 'required|string'
        ]);

        $now = Carbon::now()->timestamp;

        $note = Note::create(array_merge([
            'id' => Str::uuid(),
            'date_create' => $now,
            'date_update' => $now
        ], $data));

        return response($note, 201);
    }

    function showNote(string $id) {
        if (!Uuid::isValid($id))
            abort(404);

        return Note::findOrFail($id);
    }

    function updateNote(Request $request, string $id) {
        if (!Uuid::isValid($id))
            abort(404);

        $data = $this->validate($request, [
            'title' => 'required|string',
            'text' => 'required|string'
        ]);

        $note = Note::findOrFail($id);

        $note->title = $data['title'];
        $note->text = $data['text'];
        $note->date_update = Carbon::now()->timestamp;

        $note->save();

        return $note;
    }

    function deleteNote(string $id) {
        if (!Uuid::isValid($id))
            abort(404);

        Note::destroy($id);
    }
}
