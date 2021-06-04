@extends('welcome')
@section('content')

@if ($data->isEmpty())
<div class="empty_page_icon pt-5 ">
    <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-emoji-frown empty_page_icon1 " viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
    </svg>
    <h1>there are any data</h1>
</div>
@endif

    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 gap-3 justify-content-center">
                @foreach ($data as $data)                   
                <div class="card pt-3" style="width: 15rem; margin: 10px;">
                    <img src="{{asset('/storage/img/'.$data->img)}}" class="card-img-top" alt="{{$data->titel}}">
                    <div class="card-body">
                    <h5 class="card-title " style="color:$purple-500;">{{$data->titel}}</h5>
                    <p class="card-text">
                        {{$data->dis}}
                    </p>          
                    </div>            
                    <div class="p-2">
                        <a href="{{url('/edit_data/'.$data->id)}}" type="button" class="btn btn-primary ">Edit</a>
                        <a href="{{url('/delete/'.$data->id.'/'.$data->img)}}" type="button" class="btn btn-danger ">Delete</a>      
                    </div>
                    
                </div>  
                @endforeach
        </div>
    </div> 
<style>
     .empty_page_icon{
        text-align: center;    
                            
    }
    .empty_page_icon1{
        width: 30%;                        
    }
   
</style>
@endsection