@extends('layouts.main')

@section('title',"Contacts")
   

@section('content')
    <h1>Contacts</h1>
    <div class="container">
        <table class="table table-bordered table-hover">
            <thead class="thead-inverse">
             <tr class="d-flex" >
                 <th class="col-lg-2">Name</th>
                <th class="col-lg-1"> Photo</th>  
                    <th class="col-lg-2">Full name</th> 
                         <th class="col-lg-2">Phone number</th> 
                             <th class="col-lg-2">e-mail</th>  
                                <th class="col-lg-2">INFO</th>
                                    <th class="col-lg-1">Action</th>
            </tr> 
            </thead>


    @foreach ($data as $el)
    <div class="row">
            <tr class="d-flex">
                <td class="col-lg-2"> {{$el->contact_name}}</td>
                    <td class="col-lg-1"> <img class="img-fluid" src= "storage/photos/{{$el->contact_photo}}">   </td>
                        <td class="col-lg-2">{{$el->contact_fullname}}</td>
                            <td class="col-lg-2">{{$el->contact_phone_number}}</td>
                                <td class="col-lg-2">{{$el->contact_email}}</td>
                                    <td class="col-lg-2">{{$el->contact_info}}</td>
                                            <td class="col-lg-1"><a href="{{ route('contact-update',$el->id ) }}">изменить</a> | <a href="{{ route('contact-delete',$el->id ) }}" onclick="return confirm('Удалить контакт безврозвратно ?')">удалить</a></td>
             </tr> 
        </div>

    @endforeach

    </table>   
    </div>

@endsection

