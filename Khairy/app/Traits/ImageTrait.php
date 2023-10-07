<?php

namespace App\Traits;
use Illuminate\Support\Facades\File;

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


    function deleteImage($image_path, $folder){

        $prefix = env('APP_URL')."\\images\\".$folder;
        $index = strpos($image_path, $prefix) + strlen($prefix);
        $resultfiles = substr($image_path, $index);
        $finalpath = "images/".$folder.$resultfiles;



        if (File::exists($finalpath)) {
            if (File::delete($finalpath)) {
                // File deletion was successful
                // You can add further code here if needed
            } else {
                // File deletion failed
                // Add code here to handle the failure
            }
            } else {
            // File does not exist
            // Add code here to handle this case
            }

        return "deleted";

    }



}
