<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

use App\Video;
use App\Comment;
use Validator;

class VideosController extends Controller
{
    public function createVideo(){
        return view('Videos.createVideo');
    }

    public function saveVideo(Request $request){

        // $validator = Validator::make($request->all(),array(
        //     'title'         => 'required',
        //     'description'   => 'required',
        //     'image'         => 'required',
        //     'video'         => 'required|mime:mp4',
        // ));

        $validatedData = $request->validate(array(
            'title'         => 'required|min:5',
            'description'   => 'required',
            'image'         => 'required',
            'video'         => 'required',
        ));

        $video                = new Video();
        $user                 = \Auth::user();
        
        $video->user_id       = $user->id;
        $video->title         = $request->input('title');
        $video->description   = $request->input('description');

        $image                = $request->file('image');

        if($image){
            //$image_path     = $image->store('images','public');
            $image_path = time()."_".$image->getClientOriginalName();
            \Storage::disk('images')->put($image_path, \File::get($image));
            $video->image   = $image_path;
        }

        $video_file            = $request->file('video');

        if($video_file){
            //$image_path     = $image->store('images','public');
            $video_path = time()."_".$video_file->getClientOriginalName();
            \Storage::disk('videos')->put($image_path, \File::get($video_file));
            $video->video_path   = $video_path;
        }

        $video->save();

        return redirect()->route('home')->with(
            array('message' => "Video guardado correctamente","type" => "successs") 
        );
        
    }
}
