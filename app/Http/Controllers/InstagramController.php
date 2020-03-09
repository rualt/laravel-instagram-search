<?php

namespace App\Http\Controllers;

use InstagramScraper\Instagram;
use InstagramScraper\Exception\InstagramNotFoundException;
use Illuminate\Http\Request;

class InstagramController extends Controller
{

    public function tagSearch(Request $request)
    {   
        $error = '';
        $instagram = new Instagram();
        $tag = $request['tag'];
        $tag = str_replace(' ', '', $tag);
                
        try {
            $medias = $instagram->getMediasByTag($tag);
            if (!isset($medias[0])) {
                throw new \Exception('You should probably be logged in to search for this. Or no results.');
            }
        } catch (InstagramNotFoundException $exception) {
            $error = $exception->getMessage();
        } catch (\Exception $exception) {
            $error = $exception->getMessage();
        }
        if (!empty($error)) {
            return view('welcome', ['tag' => $tag, 'error' => $error]);
        }

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