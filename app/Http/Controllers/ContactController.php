<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts as ContactsModel;
class ContactController extends Controller
{
    public function index()
    {
        $contacts = ContactsModel::Active()->get();
    
        return view('contacts.index', ['contacts' => $contacts]);
    }

    public function create(){
        return view('contacts.create');
    }
    
    public function details($id){
        $contact = ContactsModel::findOrFail($id);
        return view('contacts.details', ['contact' => $contact]);
    }

    public function edit($id){
        $contact = ContactsModel::findOrFail($id);
        return view('contacts.edit', ['contact' => $contact]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|min:5|max:150',
            'email' => 'required|email|max:255|unique:contacts,email,'.$id,
            'contact' => 'required|min:9|max:50',
        ]);

        ContactsModel::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact
        ]);

        session()->flash('success', 'Contact updated successfully.');
        return redirect()->route('contacts.list');
    }


    public function store(Request $request) {
      $request->validate([
            'name' => 'required|string|min:5|max:150',
            'email' => 'required|email|max:255|unique:contacts,email',
            'contact' => 'required|min:9|max:50',
        ]);

        ContactsModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact
        ]);

        session()->flash('success', 'Contact created successfully.');
        return redirect()->route('contacts.list');
    }

    public function delete($id){
        $contact = ContactsModel::findOrFail($id);
        $contact->delete();

        session()->flash('success', 'Contact deleted successfully.');
        return redirect()->route('contacts.list');
    }
 

}
