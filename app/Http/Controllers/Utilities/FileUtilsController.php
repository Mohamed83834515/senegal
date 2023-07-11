<?php

namespace App\Http\Controllers\Utilities;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;

class FileUtilsController extends Controller
{
        
    /**
     * Upload file
     *
     * @param  File $file
     * @param  string $prefix
     * @param  string $folder
     * @return string|null
     */
    public static function uploadFile($file, string $prefix, string $folder = ''){
        if ($file == null) {
            return null;
        } else {
            $imageName = $prefix.'_'.uniqid().'.'.$file->extension();  
            $file->move(public_path($folder), $imageName);

            return $imageName;
        }
    }
}
