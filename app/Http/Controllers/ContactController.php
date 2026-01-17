<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts as ContactsModel;
class ContactController extends Controller
{
    public function index()
    {
        $contacts = ContactsModel::all();
    
        return view('contacts.index', ['contacts' => $contacts]);
    }
}
