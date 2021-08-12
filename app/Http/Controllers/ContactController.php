<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Storage;

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
        $filenameToStore = null;

        if(($req->hasFile('image'))) {
        
            //Get filename with extension
            $filenameWithExt =  $req->file('image')->getClientOriginalName();

            //Get just the filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            // Get extension
            $extension =  $req->file('image')->getClientOriginalExtension();

            //Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $req->file('image')->storeAs('public/photos',$filenameToStore);
        }

        $contact = new Contact;
        $contact->contact_name = $req->input('contact_name');
        $contact->contact_fullname = $req->input('contact_fullname');
        $contact->contact_info = $req->input('contact_info');
        $contact->contact_email = $req->input('contact_email');
        $contact->contact_phone_number = $req->input('contact_phone_number');
        $contact->contact_photo = $filenameToStore;

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
        $contact = Contact::where('id',$id)->first();
        $contact->contact_name = $req->input('contact_name');
        $contact->contact_fullname = $req->input('contact_fullname');
        $contact->contact_info = $req->input('contact_info');
        $contact->contact_email = $req->input('contact_email');
        $contact->contact_phone_number = $req->input('contact_phone_number');

        if(($req->hasFile('image'))) {
        
            //Get filename with extension
            $filenameWithExt =  $req->file('image')->getClientOriginalName();

            //Get just the filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            // Get extension
            $extension =  $req->file('image')->getClientOriginalExtension();

            //Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $req->file('image')->storeAs('public/photos',$filenameToStore);

            Storage::delete('public/photos/'.$contact->contact_photo);

            //Add new photo to database
            $contact->contact_photo = $filenameToStore;

        }
        
        $contact->save();
        
        return redirect()->route('index')->with('success',' Контакт был обнавлен');
    }

    public function deleteContact($id)
    {
        $contact = Contact::find($id);

        Storage::delete('public/photos/'.$contact->contact_photo);

        $contact->delete();
        
        return redirect()->route('index')->with('success',' Контакт был удален');   
    }
}
