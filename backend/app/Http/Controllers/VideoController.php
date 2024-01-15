<?php

namespace App\Http\Controllers;

use App\Http\Resources\VideosResource;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function getVideos(Request $request)
    {
        $apiKey = '2cnXoXN33gMUkNOfe2N1LmCAtR0VurYBgfoPUjJNoRlBRFbZeQyvGgMT';

        $client = new Client();

        // Requisição à API
        $response = $client->request('GET', 'https://api.pexels.com/videos/search', [
            'headers' => [
                'Authorization' => $apiKey,
            ],
            'query' => [
                'query' => $request->input('query'),
                'orientation' => $request->input('orientation', ''),
                'size' => $request->input('size', ''),
                'locale' => $request->input('locale', 'en-US'),
                'page' => $request->input('page', 1),
                'per_page' => $request->input('per_page', 15),
            ],
        ]);

        // Obtendo o conteúdo da resposta como uma string
        $content = $response->getBody()->getContents();

        // Decodificando a string JSON
        $data = json_decode($content, true);

        // Usando a classe VideosResource para formatar os dados
        $videosResource = new VideosResource((Object) $data);

        // Obtendo os dados formatados
        $formattedData = $videosResource->toArray(request());

        // Retornando os dados formatados para a resposta da API
        return response()->json($formattedData);
    }
}
