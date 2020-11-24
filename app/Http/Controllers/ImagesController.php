<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /* TODO: retrieve image paths from storage instead of hard coded
    */
    private $images = [
        "/storage/images/butterfly.jpg",
        "/storage/images/cat.jpg",
        "/storage/images/dog.jpg",
        "/storage/images/goldfish.jpg"
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
