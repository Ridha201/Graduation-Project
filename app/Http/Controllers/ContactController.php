<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;

class ContactController extends Controller
{
    public function addContact(Request $req)
    {

        $Contact = new contact ;
        $Contact->name = $req->name ;
        $Contact->email = $req->email ;
        $Contact->subject = $req->subject ;
        $Contact->message = $req->message ;
        $Contact->save();
        return redirect('builder');
        
    }
}
