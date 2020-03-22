<?php

namespace App\Http\Controllers;

use InstagramScraper\Instagram;
use InstagramScraper\Exception\InstagramNotFoundException;
use Illuminate\Http\Request;
use App\FavoriteImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class InstagramController extends Controller
{
    public function favorite()
    {
        $images = FavoriteImage::all();
        return view('favorites', compact('images'));
    }

    public function add(Request $request)
    {
        $image = new FavoriteImage;
        $image->page_link = $request->source;
        $image->square_image = $request->square;
        $image->save();
    }

    public function delete(Request $request)
    {
        $source = $request->source;
        FavoriteImage::where('page_link', $source)->delete();
    }

    public function download(Request $request)
    {
        $id = $request->id;
        $image = $request->image;
        $imageContent = file_get_contents($image);
        $filename = $id . '.jpg';
        Storage::disk('public')->put($filename, $imageContent);
        return response()->download(storage_path("app/public/{$filename}"))->deleteFileAfterSend();
    }

    public function search(Request $request)
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
            return view('index', compact('tag', 'error'));
        }

        $medias = $instagram->getMediasByTag($tag, $imageCount);
        $media = $medias[array_key_first($medias)];
        $biggestImageKey = array_key_last($media->getSquareImages());

        foreach ($medias as $media) {
            $images[] = [
                'square' => $media->getSquareImages()[$biggestImageKey],
                'source' => $media->getLink(),
                'high_resolution'=> $media->getImageHighResolutionUrl(),
                'id' => $media->getId()
            ];
        }

        return view('index', compact('tag', 'images'));
    }
}
