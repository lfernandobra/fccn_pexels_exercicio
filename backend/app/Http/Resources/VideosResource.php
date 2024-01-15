<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VideosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'items' => $this->formatItems($this->videos),
            'page' => $this->page,
            'per_page' => $this->per_page,
            'total_pages' => $this->total_results
        ];
    }

    /**
     * Format videos array.
     *
     * @param array $videos
     * @return array
     */
    private function formatItems(array $videos): array
    {
        $formattedVideos = [];

        foreach ($videos as $video) {
            $formattedVideos[] = [
                'width' => $video['width'],
                'height' => $video['height'],
                'duration' => $video['duration'],
                'user_name' => $video['user']['name'],
                'video_files' => $this->formatVideoFiles($video['video_files']),
                'video_pictures' => $this->formatVideoPictures($video['video_pictures']),
                'id' => $video['id'],
            ];
        }

        return $formattedVideos;
    }

    /**
     * Format video files array.
     *
     * @param array $videoFiles
     * @return array
     */
    private function formatVideoFiles(array $videoFiles): array
    {
        $formattedFiles = [];

        foreach ($videoFiles as $file) {
            $formattedFiles[] = [
                'id' => $file['id'],
                'quality' => $file['quality'],
                'file_type' => $file['file_type'],
                'width' => $file['width'],
                'height' => $file['height'],
                'fps' => $file['fps'],
                'link' => $file['link'],
            ];
        }

        return $formattedFiles;
    }

    /**
     * Format video pictures array.
     *
     * @param array $videoPictures
     * @return array
     */
    private function formatVideoPictures(array $videoPictures): array
    {
        $formattedPictures = [];

        foreach ($videoPictures as $picture) {
            $formattedPictures[] = [
                'id' => $picture['id'],
                'nr' => $picture['nr'],
                'picture' => $picture['picture'],
            ];
        }

        return $formattedPictures;
    }
}
