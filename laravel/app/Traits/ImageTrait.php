<?php

namespace App\Traits;

Trait  ImageTrait
{
     function saveImage($photo,$folder){
        //save photo in folder
        $file_extension = $photo -> getClientOriginalExtension();
        $file_name = env('APP_URL').'/'.$folder.'/'.rand(4,5).$photo->getClientOriginalName().time().'.'.$file_extension;
        $path = $folder;
        $photo -> move($path,$file_name);

        return $file_name;
    }


 
}
