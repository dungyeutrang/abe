<?php

namespace App\Lib;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FileHelper
{

    /**
     * save file
     *
     * @param $file
     * @return string
     */
    public static function saveFile($file)
    {
        $fileExtension = $file->getClientOriginalExtension();
        $filePath = date('Y-m-d').'/'.uniqid().'.'.$fileExtension;
        Storage::disk('local')->put($filePath,File::get($file));
        return $filePath;
    }

    /**
     * delete file
     *
     * @param $filePath
     */
    public static function delFile($filePath)
    {
        Storage::disk('local')->delete($filePath);
    }

}