<?php

namespace App\Http\Controllers;

use InstagramScraper\Instagram;
use Illuminate\Http\Request;

class InstagramController extends Controller
{

    public function home()
    {
        $instagram = new Instagram();
            $tag = 'cats';
            $medias = $instagram->getMediasByTag($tag, 44);
            foreach ($medias as $media) {
                $images[] = $media->getImageHighResolutionUrl();
            }
        $params = [
            'tag' => $tag,
            'images' => $images
        ];

        return view('welcome', $params);
    }
}