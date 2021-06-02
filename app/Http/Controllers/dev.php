<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class dev extends Controller
{
    // ------route for our home page
    public function home(){
        
        // query for get data from our database
        $db = DB::table("blog_data")->get();
        // returing data to our pages/home.blade.php page
        return view("pages.home",['data' => $db]);        
    }
    

 
     //------route where adding form will show and admin can add data
     public function add(){
        return view("pages.add");
    }
    //-------route where request datas will be inserted in data-base
    public function add_data(Request $req){
        // validating datas 
        $validated = $req->validate([
            //if any validate fails , it will go to the route where it was came from
            'titel' => 'required',
            'img' => 'required | mimes:jpg,png',
            'dis'=> 'required'
        ]);
        

        
        //check if the same titel already exist or not
        $titel = $req->titel;
        $check = DB::table("blog_data")->where('titel',$titel)->exists();
        if($check == true){// if exist go the previous page                        
            
            //flash massage (this titel already exist try another one)
            session()->flash('massage', 'this titel already exist try another one');
            return redirect()->back(); 
        }

        // giving  name to all return data for easy understanding 
        $titel = $req->titel;
        //get file extension
        $extension = $req->file('img')->extension();
        // and storing file or image in given directory and give it a defult name(titel is given) 
        $img = $req->file('img')->storeAs('public/img',$titel.".".$extension);
        $dis = $req->dis;
        
        
        // storing other datas in table
        DB::table("blog_data")->insert([
            'titel' => $titel,
            'img' => $titel.".".$extension,
            'dis' => $dis,
            'created_at' => now()
            
        ]);

        // and redirecting it to / route
        return redirect('/');
    }

    // in list we can see a edit button  if we press that button it will give us this page
    // in this page we can edit spacific data that we want to edit
    public function edit_data($id){
        // getting the data we want to edit with form
        $db =  DB::table('blog_data')->where('id',$id)->first();
        return view('pages.edit',['data' => $db]);

    }

    //updating with change data
    public function update_data(Request $req){
        // getting the id which will be updated
        $id = $req->id;

        if( $req->has('img')){ // seeing that, is the user want to update the image file ...if so
            
            
            // validate the data
            $validated = $req->validate([
                'titel' => 'required',
                'img' => ' required | mimes:jpg,png',
                'dis'=> 'required'
            ]);
            //check if the same titel already exist or not
            $titel = $req->titel;
            $check = DB::table("blog_data")->where('titel',$titel)->exists();
            if($check == true){// if exist go the previous page                        
                //flash massage (this titel already exist try another one)
                session()->flash('massage', 'this titel already exist try another one');
                return redirect()->back(); 
            }
            //find the matching id 
            $db = DB::table("blog_data")->where("id",$id)->first();
            $db->img;
            //delete its previous image that was given name with the old titel
            Storage::delete("public/img/$db->img");   
             // giving  name to all return data for easy understanding 
            $titel = $req->titel;
            //get file extension
            $extension = $req->file('img')->extension();
            // and storing file or image in given directory and give it a defult name(titel is given) 
            $img = $req->file('img')->storeAs('public/img',$titel.".".$extension);
            $dis = $req->dis;        
            //  store data with the matching id
            DB::table("blog_data")->where('id',$id)->update([
                'titel' => $titel,
                'img' => $titel.".".$extension,
                'dis' => $dis,
                'updated_at' => now()
                
            ]);
            
        }else{ //if the user dont want to update the image but other data then.....else
            // validate
            $validated = $req->validate([
                'titel' => 'required',                        
                'dis'=> 'required'
            ]);
            //check if the same file already exist or not
            $titel = $req->titel;
            $check = DB::table("blog_data")->where('titel',$titel)->exists();
            if($check == true){// if exist go the previous page                        
                //flash massage (this titel already exist try another one)
                session()->flash('massage', 'this titel already exist try another one');
                return redirect()->back(); 
            }
            //make clean data varibale 
            $titel = $req->titel;
            $dis = $req->dis;
            // find the id 
            $db = DB::table("blog_data")->where("id",$id)->first();
            $db->img;
            // find uploaded file extenshon (didn't find anything to find uploaded file extension)            
            $extension = pathinfo(storage_path().'public/img/'.$db->img ,PATHINFO_EXTENSION);            
            // cheacking if the new data and previous titel same or not (cos it will make problem for image name )
           if($db->img !== "$titel.$extension"){ // if both titel is not same so change the image name , which one was previously inserted 
            Storage::move("public/img/$db->img","public/img/$titel".".".$extension); 
           } // if titel are same it will skip 

            
            // insert datas into database tabel
            DB::table("blog_data")->where('id',$id)->update([
                'titel' => $titel,
                'img' => $titel.".".$extension,
                'dis' => $dis,
                'updated_at' => now()
                
                ]);                                

        }        
        // redirect to / route
        return redirect('/');

    }


    // delete action route
    public function delete_data($id,$img){                
        // find by id        
        DB::table("blog_data")->where('id',$id)->delete();// delete data from data base
        // delete image from storage 
        Storage::delete("public/img/$img");
        // redirect to /
        return redirect('/');
        
        
    }
}


