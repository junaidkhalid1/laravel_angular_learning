<?php

use App\OAuthClient;
use Illuminate\Database\Seeder;

class OAuthClientTableSeeder extends Seeder
{
    public function run()
    {
        // Create android Client Secret

        OAuthClient::create([
            'id' => 'g3b259fde3ed9ff3843839b',
            'secret' => '3d7f5f8f793d59c25502c0ae8c4a95b',
            'name' => 'Android'
        ]);

        // Create Website Client Secret

        OAuthClient::create([
            'id' => 'f9b259fde3ef9ff3843839b',
            'secret' => '3f7f5f8f793d59d25502y0ae8c4b95p',
            'name' => 'Website'
        ]);
    }
}
