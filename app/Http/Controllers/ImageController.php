<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

//constant for number of images to retrieve
define("NUM_OF_IMAGES", 4);

class ImageController extends Controller
{
    //ascending order
    public function asc() 
    {
        $ascending_images = $this->retrieve_image_urls(NUM_OF_IMAGES);
        sort($ascending_images);

        return $ascending_images;
    }

    //descending order
    public function desc() 
    {
        $descending_images = $this->retrieve_image_urls(NUM_OF_IMAGES);
        rsort($descending_images);

        return $descending_images;
    }

    //random order
    public function random() 
    {
        $random_images = $this->retrieve_image_urls(NUM_OF_IMAGES);
        shuffle($random_images);

        Log::info($random_images);
        return $random_images;
    }

    /* for each image path, check for Zone Identifier ADS, then remove /public/ and prepend /storage/
    *  to get the public URL, then return $num_of_images images from the final array
    */
    private function retrieve_image_urls($num_of_images) 
    {
        $image_paths = Storage::files("public/images");
        $urls = [];

        foreach ($image_paths as $image) {
            $adsSplit= explode(":", $image);
            if (count($adsSplit) == 1) {
                $pathSplit = explode("/", $image);
                $pathSplit[0] = "storage";
                $url = implode("/", $pathSplit);
                array_push($urls, $url);
            }
        }
        
        return array_slice($urls, 0, $num_of_images);
    }

}
