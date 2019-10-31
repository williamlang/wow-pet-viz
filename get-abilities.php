<?php
    require_once 'vendor/autoload.php';

    use Carbon\Carbon;
    use GuzzleHttp\Client;
    use PetViz\AbilityQuery;
    use PetViz\PetQuery;
    use PetViz\PetAbilityQuery;
    use Propel\Runtime\ActiveQuery\Criteria;

    $token = file_get_contents('token');
    $client = new Client();

    $pets = PetQuery::create()
        ->filterByUpdatedAt(Carbon::now('UTC')->subHours(1), Criteria::LESS_THAN)
        ->find();

    echo $pets->count() . " pets found needing update.\n";

    foreach ($pets as $i => $pet) {
        echo $i . '. ' . $pet->getName() . " is being updated.\n";
        $response = $client->get('https://us.api.blizzard.com/data/wow/pet/' . $pet->getPetId(), [
            'query' => [
                'namespace' => 'static-us',
                'locale' => 'en_US',
                'access_token' => $token
            ]
        ]);

        $json = json_decode((string)$response->getBody(),  true);

        $pet->setType($json['battle_pet_type']['name']);
        $pet->setDescription(empty($json['description']) ? "" : $json['description']);
        $pet->setCapturable($json['is_capturable']);
        $pet->setTradeable($json['is_tradable']);
        $pet->setBattlepet($json['is_battlepet']);
        $pet->setAllianceOnly($json['is_alliance_only']);
        $pet->setHordeOnly($json['is_horde_only']);
        $pet->setIcon($json['icon']);
        $pet->setUpdatedAt(Carbon::now('UTC'));
        $pet->save();

        if ($pet->getBattlepet()) {
            // clear all abilities
            PetAbilityQuery::create()
                ->filterByPetId($pet->getPetId())
                ->delete();

            foreach ($json['abilities'] as $jsonAbility) {
                $ability = AbilityQuery::create()
                    ->filterByAbilityId($jsonAbility['ability']['id'])
                    ->findOneOrCreate();

                $ability->setName($jsonAbility['ability']['name']);
                $ability->save();

                // re-add the join record
                $petAbility = PetAbilityQuery::create()
                    ->filterByPetId($pet->getPetId())
                    ->filterByAbilityId($ability->getAbilityId())
                    ->findOneOrCreate();

                $petAbility->setSlot($jsonAbility['slot']);
                $petAbility->setLevel($jsonAbility['required_level']);
                $petAbility->save();
            }
        }

        if ($i % 50 == 0) sleep(1);
    }