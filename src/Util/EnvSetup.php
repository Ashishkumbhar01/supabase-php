<?php
namespace Supabase\Client\Util;
use Dotenv\Dotenv;

class EnvSetup
{
    public static function env($path): array
    {
        // If the env vars are set and not empty use them
        $key = getenv('API_KEY');
        $url = getenv('URL');

        // else check try to load the .env file in the $path
        if (empty($key) || empty($url)) {
            $loaded = Dotenv::createArrayBacked($path)->safeLoad();

            if (key_exists('API_KEY', $loaded)) {
                $key = $loaded['API_KEY'];
            }

            if (key_exists('URL', $loaded)) {
                $url = $loaded['URL'];
            }
        }

        if (empty($key)) {
            throw new \Exception('Could not load API_KEY');
        }

        if (empty($url)) {
            throw new \Exception('Could not load URL');
        }

        return [
            'API_KEY' => $key,
            'URL' => $url,
        ];
    }
}
