<?php

namespace App\Http\traits;

use Illuminate\Support\Facades\Artisan;

trait EnvUpdater
{
    protected function updateEnvFile($key, $value)
    {
        $path = base_path('.env');

        if (file_exists($path)) {
            $env = file_get_contents($path);

            // Check if the key exists in the .env file
            if (strpos($env, $key) !== false) {
                // Update the existing key-value pair
                $pattern = "/^{$key}=.*/m";
                $replacement = "{$key}=\"{$value}\"";
                $env = preg_replace($pattern, $replacement, $env);
            } else {
                // Append the new key-value pair at the end
                $env .= "\n{$key}=\"{$value}\"";
            }

            file_put_contents($path, $env);
        }
    }
}