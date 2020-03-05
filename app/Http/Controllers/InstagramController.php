<?php

namespace App\Http\Controllers;

use InstagramScraper\Instagram;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function home()
    {
        $instagram = new Instagram();

        if (!empty($_REQUEST['tag'])) {
            $tag = htmlspecialchars($_REQUEST['tag']);
            $medias = $instagram->getMediasByTag($tag, 44);
            foreach ($medias as $media) {
                $images[] = $media->getImageHighResolutionUrl();
            }
        } else {
            $tag = '';
        }

        $params = [
            'tag' => $tag,
            'images' => $images
        ];

        return view('instagram.welcome', compact('params'));
    }
}