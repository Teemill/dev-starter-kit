<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesController extends Controller
{
    private $images = [
        "firstfilename",
        "secondfilename",
        "thirdfilename",
        "fourthfilename"
    ];

    //ascending order
    public function asc() {
        $ascendingImages = $this->images;
        sort($ascendingImages);

        return $ascendingImages;
    }

    //descending order
    public function desc() {
        $descendingImages = $this->images;
        rsort($descendingImages);

        return $descendingImages;
    }

    //random order
    public function random() {
        $randomImages = $this->images;
        shuffle($randomImages);

        return $randomImages;
    }
}
