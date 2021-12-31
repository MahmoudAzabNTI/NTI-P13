<?php
/**
 * 
 */
namespace App\Http\Traits;

use Illuminate\Support\Facades\DB;

trait MediaTrait

{
  public function uploadImage($requestImage, string $folder)
  {
    # code...
    $photoName = time() . '.'. $requestImage->extension();
    $requestImage->move(public_path("assets/images\\$folder\\"), $photoName);
    return $photoName;
  }
  public function deleteImage($folder, $id)
  {
    $oldphotoName = DB::table('products')->select('image')->where('id', $id)->get()->first()->image;
    $oldphotoPath = public_path("assets/images/$folder//"). $oldphotoName;
    if(file_exists($oldphotoPath)){
      unlink($oldphotoPath);
      return true;
  }
  return false;
}
  }


?>