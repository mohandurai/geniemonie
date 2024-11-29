<?php

namespace App\Http\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageManager
{
    public static function upload(string $dir, string $format, $image = null)
    {
        if ($image != null) {
            $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $format;
            if (!Storage::disk('public_uploads_uploads')->exists($dir)) {
                Storage::disk('public_uploads')->makeDirectory($dir);
            }
            Storage::disk('public_uploads')->put($dir . $imageName, file_get_contents($image));
        } else {
            $imageName = 'def.png';
        }

        return $imageName;
    }

    public  static function update(string $dir, $old_image, string $format, $image = null)
    {
        if (Storage::disk('public_uploads')->exists($dir . $old_image)) {
            Storage::disk('public_uploads')->delete($dir . $old_image);
        }
        $imageName = ImageManager::upload($dir, $format, $image);
        return $imageName;
    }

    public static function delete($full_path)
    {
        if (Storage::disk('public_uploads')->exists($full_path)) {
            Storage::disk('public_uploads')->delete($full_path);
        }

        return [
            'success' => 1,
            'message' => 'Removed successfully !'
        ];

    }
}
