<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function allData()
    {
        //$contact = new Contact;
        //dd($contact->get());
        //return view('index',['data' => $contact->get()]);
        $contact = Contact::all();
        //dd($contact);
        return view('index',['data' => $contact]);
        //return view('index');
    }

    public function addContact(ContactRequest $req)
    {
        //dd($req);
        $contact = new Contact;
        $contact->contact_name = $req->input('contact_name');
        $contact->contact_fullname = $req->input('contact_fullname');
        $contact->contact_info = $req->input('contact_info');
        $contact->contact_email = $req->input('contact_email');
        $contact->contact_phone_number = $req->input('contact_phone_number');
        
        $contact->save();

        return redirect()->route('index')->with('success',' Контакт был отправлен');

    }

    public function updateContact($id)
    {
        $contact = Contact::where('id',$id)->first();
        //dd($contact);
        return view('update_contact',['data' => $contact]);
    }

    public function updateContactSubmit($id,ContactRequest $req)
    {
        //$contact = Contact::find($id);
        $contact = Contact::where('id',$id)->first();
        $contact->contact_name = $req->input('contact_name');
        $contact->contact_fullname = $req->input('contact_fullname');
        $contact->contact_info = $req->input('contact_info');
        $contact->contact_email = $req->input('contact_email');
        $contact->contact_phone_number = $req->input('contact_phone_number');
        
        $contact->save();
        /// ПРОБЛЕМА  Поле id должно называть именно так, иначе не работает. Придется изспольховать методы Update
        //изменила поле в таблице на id. Работает
        return redirect()->route('index')->with('success',' Контакт был обнавлен');
    }

    public function deleteContact($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('index')->with('success',' Контакт был удален');   
    }

}
