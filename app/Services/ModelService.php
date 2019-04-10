<?php

namespace Mma\Services;
use Image;

class ModelService
{   
    /**
     * resize and add images
     *
     * 
     */
    public function handleUploadedImage($imagePath, $width = 800, $height = null)
    {
        if($this->canHandleImage()) {
            $width = (int) $width;
            $height = !(is_null($height)) ? (int) $height : null;
            Image::make(request()->file('image'))
                ->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($this->getImagePath($imagePath));
        }
    }

    /**
     * check if request has image
     *
     * 
     */
    protected function canHandleImage()
    {
        return request()->file('image');
    }

    protected function getImagePath($imagePath)
    {
        return public_path() . $imagePath;
    }
}
