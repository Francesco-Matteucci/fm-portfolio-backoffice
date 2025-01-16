<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // per Http::get() se usi Laravel >= 7
use Illuminate\Support\Collection;

class GitHubController extends Controller
{
    public function fetchRepositories()
    {
        $username = 'ilTuoUsername';
        // Se hai bisogno di un token per vedere repo privati, aggiungi:
        // $token = 'GITHUB_PERSONAL_ACCESS_TOKEN';

        // Chiamata GET all’endpoint di GitHub (senza token per i repo pubblici):
        $response = Http::get("https://api.github.com/users/{$username}/repos");

        // Se usi un token (per repo privati), la chiamata sarebbe:
        /*
        $response = Http::withHeaders([
            'Authorization' => 'token ' . $token,
        ])->get("https://api.github.com/users/{$username}/repos");
        */

        // Verifica se la richiesta è OK (status 200)
        if ($response->successful()) {
            // Decodifica JSON in array
            $reposData = $response->json();
            // $reposData è un array di repos. Ognuno avrà campi come 'name', 'html_url', 'description', ecc.

            // Puoi filtrare, mappare, salvare in DB, ecc.
            // Esempio veloce: passiamo i dati a una view blade
            return view('github.repos', ['repos' => $reposData]);
        }

        // In caso di errore
        return response()->json([
            'success' => false,
            'message' => 'Errore nel recupero dei repo da GitHub'
        ], $response->status());
    }
}
