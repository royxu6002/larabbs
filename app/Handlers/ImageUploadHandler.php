<?php
namespace App\Handlers;

use Illuminate\Support\Str;

class ImageUploadHandler {
    protected $img_ext = ['png', 'gif', 'jpg', 'jpeg'];

    public function save($file, $folder, $file_prefix)
    {
        $fold_name =  "uploads/images/".$folder."/".date("ym/d", time());

        $upload_path = public_path(). '/' . $fold_name;

        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        $fileName = $file_prefix. '_'.time().'_'.Str::random(10).'.'.$extension;

        if(! in_array($extension, $this->img_ext)) {
            return  false;
        }

        $file->move($upload_path, $fileName);

        return [
            'path' => config('app.url')."/".$fold_name."/".$fileName
        ];

    }
}
