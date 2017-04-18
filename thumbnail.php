<?php

function generateThumbnail($img, $width, $height, $quality = 100)
{
    if (is_file($img)) {
        $imagick = new Imagick(realpath($img));
        $imagick->setImageFormat('jpeg');
        $imagick->setImageCompression(Imagick::COMPRESSION_JPEG);
        $imagick->setImageCompressionQuality($quality);
        $imagick->thumbnailImage($width, $height, false, false);
        $filename_no_ext = reset(explode('.', $img));
        if (file_put_contents($filename_no_ext . '_thumb' . '.jpg', $imagick) === false) {
            throw new Exception("Could not put contents.");
        }
        return true;
    }
    else {
        throw new Exception("No valid image provided with {$img}.");
    }
}

?>