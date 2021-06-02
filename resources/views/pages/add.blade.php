@extends('welcome')
@section('content')
<div class="container-fluid p-5  form_style">
    <form method="POST" action="/add_data" enctype="multipart/form-data">
        @csrf
        {{-- flash sassion massage --}}        
        @if (session()->has('massage'))
            <div class="alert alert-dark" role="alert">
                {{session()->get('massage')}}
            </div>
        @endif
        {{-- validate error massage for titel --}}
        @if ($errors->first("titel")   )                                                      
            <div class="alert alert-danger d-flex align-items-center" role="alert">                            
                <div>
                    Plz give a titel                 
                    {{-- {{$errors->first("titel")}}  --}}
                </div>
            </div>                                    
        @endif
        {{-- titel input  --}}
        <div class="mb-3 pt-2" >
            <label for="exampleFormControlInput1" class="form-label ">Titel</label><br>
            <input type="text" name="titel" class="form-control"   placeholder="titel">
        </div>
        {{-- validate error massage for img --}}
        @if ($errors->first("img"))                                                      
            <div class="alert alert-danger d-flex align-items-center" role="alert">                            
                <div>
                    Plz give a image
                    {{-- {{$errors->first("img")}} --}}
                </div>
            </div>                                    
        @endif
        {{-- img input  --}}
        <div class="mb-3 pt-2 image_Input_filde_size">
            <label for="formFileSm" class="form-label">Image</label>
            <input  name = "img" class="form-control form-control-sm" id="formFileSm" type="file">
        </div>
        {{-- validate error massage for dis --}}
        @if ($errors->first("dis"))                                                      
            <div class="alert alert-danger d-flex align-items-center" role="alert">                            
                <div>
                    Plz give a give a Discription of the image
                    {{-- {{$errors->first("dis")}} --}}
                </div>
            </div>                                    
        @endif
        {{-- dis input  --}}
        <div class="mb-3 pt-2">
            <label for="exampleFormControlInput1" class="form-label">Discription</label><br>
            <input type="text" name="dis"  class="form-control"  placeholder="titel">
        </div>
        <button class="btn btn-lg btn-primary" type="submit">submit</button>
    
    </form>
</div>
<style>
@media (min-width: 576px) { 
  .form_style{
        width:50%;
    }
 }
</style>
@endsection