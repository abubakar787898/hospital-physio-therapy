<?php

namespace App\Helpers;
use Illuminate\Support\Str;
use TheSeer\Tokenizer\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class Images{
public static function upload_images($original_path, $large_path, $medium_path, $small_path, $request_file, $id, $table_field, $table_name)
{

    // To increasew memory for larger image
    ini_set('memory_limit','256M');

    // saving new file extention .jpg to have minimumal size
    $extension = ".jpg";

    $file_name = $request_file->getClientOriginalName();
    $file_name = pathinfo($file_name, PATHINFO_FILENAME);
    // $file_extension = $request_file->getClientOriginalExtension();
    $file_name = $id . '-' . time() . '-' . $file_name . $extension;

    // Save in DO public
    // $storagePath = Storage::disk('spaces')->put($request->file('image'));
    // $storagePath = Storage::disk('spaces')->put("" . $file_name, file_get_contents($request_file));
    // $storagePath = Storage::disk('spaces')->put("{$original_path}/{$file_name}", $request_file, 'spaces');
    //Orignal Image Path
    // createDirecrtory(public_path() . $original_path);
    // $request_file->move(public_path() . $original_path, $file_name);

    //Original
    Log::debug("creating dir");

    self::createDirecrtory(public_path() . "/" . $original_path);
    $image = ImageManagerStatic::make($request_file);
    $savedImageUri = $original_path . $file_name;

    // $image->text('Yak sport', 120, 100, function($font) {  
    //     $font->file(public_path('fonts/Roboto_Slab/RobotoSlab-VariableFont_wght.ttf'));  
    //     $font->size(40);  
    //     $font->color('#FFFFFF');  
    //     $font->align('center');  
    //     $font->valign('bottom');  
    //     $font->angle(60);  
    // }); 

    // dd($savedImageUri);
    Log::debug('savedImageUri fcirst');
    Log::debug($savedImageUri);    

    $image->resize(1800, null, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    })
    ->save($savedImageUri, 60, 'jpg');

    Log::debug("savedImageUri after");
    Log::debug($savedImageUri);

    // original image
    $storagePath = Storage::disk('spaces')->put("{$original_path}/{$file_name}", $image, 'public');
    $storagePath ? Log::debug('upload to ' . $original_path . "/" . $file_name) : Log::error('Error to ' . $original_path . "/" . $file_name);

    Log::debug("savedImageUri after DS upload");
    Log::debug($savedImageUri);

    Log::debug($storagePath);
    Log::debug('$storagePath');
  //Large Size Image Path
    $lgImage = ImageManagerStatic::make($request_file)->resize(1400, null, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    })
    // ->encode('jpg', 60)
    ->save($savedImageUri, 60, 'jpg');
    $storagePath = Storage::disk('spaces')->put("{$large_path}/{$file_name}", $lgImage, 'public');
    $storagePath ? Log::debug('upload to ' . $large_path) : Log::error('Error to ' . $large_path);

    //Medium Size Image Path
    $mdImage = ImageManagerStatic::make($request_file)->resize(900, null, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    })->save($savedImageUri, 60, 'jpg');
    $storagePath = Storage::disk('spaces')->put("{$medium_path}/{$file_name}", $mdImage, 'public');
    $storagePath ? Log::debug('upload to ' . $medium_path) : Log::error('Error to ' . $medium_path);
    
    //Small Size Image Path
    $smImage = ImageManagerStatic::make($request_file)->resize(500, null, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    })->save($savedImageUri, 60, 'jpg');
    $storagePath = Storage::disk('spaces')->put("{$small_path}/{$file_name}", $smImage, 'public');
    $storagePath ? Log::debug('upload to ' . $small_path) : Log::error('Error to ' . $small_path);

    self::update_data($table_name, $table_field, $file_name, $id);

    $image->destroy();
    unlink($savedImageUri);

}

public static function update_data($table_name, $table_field, $file_name, $id)
{
    DB::table($table_name)->where('id', $id)->update([$table_field => $file_name]);
}

public static function createDirecrtory($path)
{
    if (!File::isDirectory($path)) {
        File::makeDirectory($path, 0777, true, true);
    }
}
public static function delete_images_by_name($original_path, $large_path, $medium_path, $small_path, $file_name)
{
    try {

        if($file_name !== '') {

            $path=$original_path."/".$file_name;
            if(Storage::disk('spaces')->exists($path)) Storage::disk('spaces')->delete($path);
            
            $path=$large_path."/".$file_name;
            if(Storage::disk('spaces')->exists($path)) Storage::disk('spaces')->delete($path);

            $path=$medium_path."/".$file_name;
            if(Storage::disk('spaces')->exists($path)) Storage::disk('spaces')->delete($path);

            $path=$small_path."/".$file_name;
            if(Storage::disk('spaces')->exists($path)) Storage::disk('spaces')->delete($path);

        }

    } catch (Exception $exception) {

        Log::debug("Fil existing error" . public_path() . $original_path . $file_name);
        Log::debug("Exceptio nemssage" . $exception->getMessage());
    }
}
}
