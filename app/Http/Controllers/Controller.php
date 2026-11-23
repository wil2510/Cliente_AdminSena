<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function requestApi(string $url): array
    {
        try {
            $response = Http::acceptJson()->get($url);
        } catch (ConnectionException $exception) {
            report($exception);
            session()->flash('api_error', 'No fue posible conectar con el servidor de datos.');

            return [];
        }

        if (!$response->successful()) {
            logger()->warning('La API respondió con un error.', [
                'url' => $url,
                'status' => $response->status(),
            ]);
            session()->flash('api_error', 'No se pudieron cargar los datos. La API respondió con HTTP '.$response->status().'.');

            return [];
        }

        $data = $response->json();

        if (!is_array($data)) {
            logger()->warning('La API respondió con un formato JSON inesperado.', ['url' => $url]);
            session()->flash('api_error', 'La API respondió con un formato de datos inesperado.');

            return [];
        }

        return $data;
    }

    protected function apiCollection($response): array
    {
        $data = is_array($response) ? ($response['data'] ?? $response) : [];

        return is_array($data) && array_is_list($data) ? $data : [];
    }

    protected function apiRecord($response): array
    {
        $data = is_array($response) ? ($response['data'] ?? $response) : [];

        if (!is_array($data)) {
            return [];
        }

        return array_is_list($data) ? ($data[0] ?? []) : $data;
    }

    protected function missingApiRecord(string $indexRoute): RedirectResponse
    {
        return redirect()->route($indexRoute)->with('api_error', 'No se encontró el registro solicitado en la API.');
    }

    protected function createApiRecord(string $url, array $data, ?UploadedFile $file = null, ?string $fileField = null): bool
    {
        try {
            $request = Http::acceptJson();

            if ($file !== null && $fileField !== null) {
                $request->attach($fileField, file_get_contents($file->getRealPath()), $file->getClientOriginalName());
            }

            $response = $request->post($url, $data);
        } catch (ConnectionException $exception) {
            report($exception);
            session()->flash('api_error', 'No fue posible conectar con el servidor de datos.');

            return false;
        }

        if (!$response->successful()) {
            logger()->warning('La API no pudo crear el registro.', [
                'url' => $url,
                'status' => $response->status(),
                'response' => $response->json(),
            ]);
            session()->flash('api_error', 'No se pudo crear el registro. La API respondió con HTTP '.$response->status().'.');

            return false;
        }

        return true;
    }
}
