<?php

namespace Tests;

use Gallery\Models\User;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\ClientRepository;

trait ApiAuthorization
{
    /**
     * @var User
     */
    protected $user;

    protected $baseUrl = '/';

    protected $scopes = [];

    public function auth()
    {
        $this->user = factory(User::class)->create();
        $clientRepository = new ClientRepository();
        $client = $clientRepository->createPersonalAccessClient(
            $this->user, 'Test Personal Access Client', $this->baseUrl
        );

        DB::table('oauth_personal_access_clients')->insert([
            'client_id' => $client->getKey(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $token = $this->user->createToken('TestToken', $this->scopes)->accessToken;
        $this->headers['Accept'] = 'application/json';
        $this->headers['Authorization'] = 'Bearer '.$token;
    }
}


