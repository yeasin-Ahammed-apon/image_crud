@extends('welcome')
@section('content')
<div class="container-fluid p-5 form_style" >
    
    <form method="POST" action="/update_data" enctype="multipart/form-data">
        @csrf
        {{-- flash sassion massage --}}        
        @if (session()->has('massage'))
            <h1>{{session()->get('massage')}}</h1>
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
        <input type="hidden"  value="{{$data->id}}" name="id" >
        <div class="mb-3 p-2">
            <label for="exampleFormControlInput1" class="form-label">titel</label><br>
            <input type="text" name="titel"  class="form-control" placeholder="titel" value="{{$data->titel}}">
        </div>

        <label class="image-label pt-2" >Current image</label><br>
        <img src="{{url("storage/img/".$data->img)}}" 
                                        id ="image" 
                                        class="img-thumbnail"
                                        style = "width: 30%;"
                                        alt="...">
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
        <div class="p-2">
            <label for="formFileSm" class="form-label">Image</label>
            <img src="" alt="">
            <input  name = "img" class="form-control form-control-sm"
                                 id="get_image_file"
                                 type="file"
                                 >
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
        <div class="mb-3 p-2">
            <label for="exampleFormControlInput1" class="form-label">Discription</label><br>
            <input type="text" name="dis" class="form-control"  placeholder="titel" value="{{$data->dis}}">
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
<script>
// var get_image_file = document.getElementById('get_image_file')
get_image_file.onchange = evt => {
  const [file] = get_image_file.files
  if (file) {
    image.src = URL.createObjectURL(file)
  }
}
</script>

@endsection