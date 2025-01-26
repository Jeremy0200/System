<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CedulaService
{
    public function verificarCedula($cedula)
    {
        $url = 'https://webservices.ec/api/cedula';
        $token = env('API_CEDULA_TOKEN');

        $response = Http::withHeaders([
            'Authorization' => "Bearer $token",
        ])->post($url, [
            'cedula' => $cedula,
        ]);

        if ($response->successful()) {
            return $response->json(); // Retorna el resultado de la API
        }

        return null; // Manejo de error en caso de falla
    }
}
