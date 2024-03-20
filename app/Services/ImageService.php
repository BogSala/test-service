<?php

namespace App\Services;

use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class ImageService
{
    public static function crop($imagePath) :string
    {
        $manager = new ImageManager(new Driver());

        $image = $manager->read($imagePath);

        $image->resize(70, 70);

        $encoded = $image->toPng();

        $name = Str::random(10);
        $path = public_path('/images')."/$name.png";

        $encoded->save($path);

        return $path;
    }
}
