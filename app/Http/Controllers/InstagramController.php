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
        $tag = str_replace(' ', '', $request['tag']);
        $imageCount = (int) $request['imageCount'];
        try {
            $medias = $instagram->getMediasByTag($tag, $imageCount);
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

        $medias = $instagram->getMediasByTag($tag, $imageCount);
        foreach ($medias as $media) {
            $images[] = [
                'original' => $media->getImageHighResolutionUrl(),
                'square' => $media->getSquareImages()[4],
                'caption' => $media->getCaption(),
                'link' => $media->getLink()
            ];
        }
        $params = [
            'tag' => $tag,
            'images' => $images,
            'media' => $medias[0]
        ];

        return view('pages.index', $params);
    }
}
