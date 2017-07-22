<?php

namespace App\Image;

use Intervention\Image\ImageManagerStatic;

class SaveImageToDisc
{
    private static $extensions = [
            "jpeg",
            "jpg",
            "png",
            "gif"
        ];

    private static $mimes = [
            "image/jpeg",
            "image/jpg",
            "image/gif",
            "image/png"
        ]; 

    /**
    * Save a picture.
    *
    * @param  array  $file
    */
    public static function savePicture($file)
    {
        $arr = explode(".", $file['name']);
        $fileExt = strtolower(array_pop($arr));
        
        if (in_array($fileExt, self::$extensions) === false ||
            in_array($file['type'], self::$mimes) === false ||
            $file['size'] > 2300000 ) {
                throw new \Exception ('Файл '.$file. ' не подходит, допускаются изображения форматов: jpg, png, jpeg, gif и не более 2мб');
        }
        
        $fileName = md5(rand().$file['name']).'.'.$fileExt;
        $target_dir = SITE_ROOT."/public/uploads/";
        list($width, $height, $type, $attr) = getimagesize($file['tmp_name']);

        // read image from temporary file
        $img = ImageManagerStatic::make($file['tmp_name']);

        // resize image
        if($width > 320 || $height > 240){
            $img->fit(320, 240);
        }

        // save image
        $img->save($target_dir.$fileName);

        return $fileName;
   }
}
