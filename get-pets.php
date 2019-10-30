<?php
    require_once 'vendor/autoload.php';

    use GuzzleHttp\Client;
    use PetViz\PetQuery;

    $token = file_get_contents('token');
    $client = new Client();
    $response = $client->get('https://us.api.blizzard.com/data/wow/pet/index', [
        'query' => [
            'namespace' => 'static-us',
            'locale' => 'en_US',
            'access_token' => $token
        ]
    ]);

    $json = json_decode((string)$response->getBody(), true);

    foreach ($json['pets'] as $petArr) {
        $pet = PetQuery::create()
            ->filterByPetId($petArr['id'])
            ->findOneOrCreate();

        $pet->setName($petArr['name']);
        $pet->setHref($petArr['key']['href']);
        $pet->save();
    }
