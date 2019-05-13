<?php

namespace App\Services;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class FileUploadService {

    /**
     * @param Request $request
     * @param string $fieldName
     * @param $width
     * @param $heigth
     * @param $folder
     * @param string $mimeType
     * @return string
     */
    public function upload(Request $request, $fieldName, $width, $heigth, $folder, $mimeType = 'jpg') {

        $resizedImage = Image::make($request->file($fieldName))->fit($width, $heigth)->encode($mimeType);

        // calculate md5 hash of encoded image
        $hash = md5($resizedImage->__toString());
        $path = "app/public/" . $folder ."/{$hash}.jpg";
        $publicPath = $folder . "/{$hash}.jpg";

        if (!is_dir(storage_path("app/public/" . $folder))) {
            Storage::makeDirectory("public/" . $folder);
        }
        $resizedImage->save(storage_path($path));

        return $publicPath;
    }
}
