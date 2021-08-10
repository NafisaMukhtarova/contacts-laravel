@extends('layouts.main')

@section('title',"Add Contact")
   
@section('content')
    <h1>Add contact</h1>

    <form action="{{ route('contact-form') }}" method="POST" enctype ="multipart/form-data">
            
            @csrf
                <div class="mb-3">
                     <label for="contact_name" class="form-label">Name</label>
                    <input type="text" class="form-control" inactive id="contact_name" name="contact_name" required >
                </div>

                <div class="mb-3">
                    <label for="contact_fullname" class="form-label">Full name</label>
                    <input type="text" class="form-control" id="contact_fullname" name="contact_fullname"  >
                </div>

                
                <div class="mb-3">
                    <label for="contact_info" class="form-label">Info</label>
                    <input type="text" class="form-control" id="contact_info" name="contact_info"  >
                </div>
        

                <div class="mb-3">
                        <label for="contact_phone_number" class="form-label">Phone number</label>
                        <input type="text" class="mask-phone form-control" id="contact_phone_number" name ="contact_phone_number" >
                        
                        <script>
                            $('.mask-phone').mask('+9(999)999-99-99');
                            </script>
                    
                </div>    
                  
                
                <div class="mb-3">
                        <label for="contact_email" class="form-label">email</label>
                        <input type="email" class="form-control" id="contact_email" name ="contact_email" >
                 </div>    
                    
                 <div class="mb-3">
                    <label for="image" class="form-label">Photo</label>
                     <input type="file" name = "image" id ="image">
                 </div>
                    
               
            
            <button type="submit" class="btn btn-primary" > Добавить</button>
        </form>

@endsection