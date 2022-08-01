<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

Trait  DeleteTrait
{
   
 function deleteExampic($image_path){
        //save photo in folder
        $prefix = env('APP_URL')."\images\exams\\\\";
        $index = strpos($image_path, $prefix) + strlen($prefix);
        $resultfiles = substr($image_path, $index);
        $finalpath = "images/exams/".$resultfiles;
        
        //$resultfile = "images/exams/".$resultfiles;
        //return $resultfile;
        //$publicfolder = str_replace("laravel", "", base_path() ); 
        //$finalpath = $publicfolder.$resultfile;

        
        if(File::exists($finalpath)) {
            File::delete($finalpath);
            
            } 


        return "deleted";
    }



    function deleteExamans($image_path){
        //save photo in folder
        $prefix = env('APP_URL')."\images\studentanswers\\";

        
        $index = strpos($image_path, $prefix) + strlen($prefix);
        $resultfiles = substr($image_path, $index);
        $finalpath = "images/studentanswers/".$resultfiles;
        //$resultfile = "images/studentanswers/".$resultfiles;
        //$publicfolder = str_replace("laravel", "", base_path() ); 
        //$finalpath = $publicfolder.$resultfile;

        if(File::exists($finalpath)) {
            File::delete($finalpath);
            
            } 
            return "deleted";
        

        
    }



    function deleteExamright($image_path){
        //save photo in folder
        $prefix = env('APP_URL')."\images\rightanswers\\";

        
        $index = strpos($image_path, $prefix) + strlen($prefix);
        $resultfiles = substr($image_path, $index);
        $finalpath = "images/rightanswers/".$resultfiles;
       
       
        //$resultfile = "images/rightanswers/".$resultfiles;
       
       // $publicfolder = str_replace("laravel", "", base_path() ); 
        //$finalpath = $publicfolder.$resultfile;

        if(File::exists($finalpath)) {
            File::delete($finalpath);
            
            } 
            return "deleted";
        

        
    }



    function deleteLec($image_path){
        //save photo in folder
        $prefix = env('APP_URL')."\images\lectures\\";

        
        $index = strpos($image_path, $prefix) + strlen($prefix);
        $resultfiles = substr($image_path, $index);
        $finalpath = "images/lectures/".$resultfiles;
       
       // $resultfile = "images\\lectures\\".$resultfiles;
       // $publicfolder = str_replace("laravel", "", base_path() ); 
        //$finalpath = $publicfolder.$resultfile;

        if(File::exists($finalpath)) {
            File::delete($finalpath);
            
            } 
            return "deleted";
        

    }



    
}
