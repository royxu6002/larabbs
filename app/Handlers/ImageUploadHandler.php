<?php
namespace App\Handlers;

use Illuminate\Support\Str;
use Image;

class ImageUploadHandler {
    protected $img_ext = ['png', 'gif', 'jpg', 'jpeg'];

    public function save($file, $folder, $file_prefix, $max_width = false)
    {
        $fold_name =  "uploads/images/".$folder."/".date("ym/d", time());

        $upload_path = public_path(). '/' . $fold_name;

        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        $fileName = $file_prefix. '_'.time().'_'.Str::random(10).'.'.$extension;

        if(! in_array($extension, $this->img_ext)) {
            return  false;
        }

        $file->move($upload_path, $fileName);

        if( $max_width && $extension != 'gif') {
            $this->reduceSize($upload_path.'/'.$fileName, $max_width);
        }

        return [
            'path' => config('app.url')."/".$fold_name."/".$fileName
        ];

    }

    public function reduceSize($file_path, $max_width)
    {
        $image = Image::make($file_path);

        $image->resize($max_width, null, function($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $image->save();
    }
}
