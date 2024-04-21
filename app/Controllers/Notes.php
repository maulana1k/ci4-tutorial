<?php

namespace App\Controllers;

use App\Models\NotesModel;

class Notes extends BaseController
{
    protected $notes;
    public function __construct()
    {
        $this->notes = new NotesModel();
    }
    public function index()
    {
        $allNotes = $this->notes->findAll();
        $data = [
            'notes' => $allNotes
        ];
        return view('home', $data);
    }
    public function view($id = false)
    {
        $data = $this->notes->find($id);
        return view('view', ['notes' => $data]);
    }
    public function create()
    {
        return view('create');
    }
    public function store()
    {
        $data = [
            'title' => $this->request->getVar('title'),
            'text' => $this->request->getVar('text'),
        ];
        $noteId = $this->notes->insert($data);
        $saved = $this->notes->find($noteId);

        return  view('view', ['notes' => $saved]);
    }
    public function update($id)
    {
        $data = [
            'title' => $this->request->getVar('title'),
            'text' => $this->request->getVar('text'),
        ];

        $result = $this->notes->update($id, $data);
        if ($result) {
            return redirect()->back()->with('success', 'Notes updated');
        } else {
            return redirect()->back()->with('fail', 'Fail to update note');
        }
    }
    public function delete($id)
    {
        if ($id === null) {
            return redirect()->back()->with('error', 'Note ID is missing');
        }

        $result = $this->notes->delete($id);

        if ($result) {
            return redirect()->to('/');
        } else {
            return redirect()->back()->with('error', 'Failed to delete note');
        }
    }
}
