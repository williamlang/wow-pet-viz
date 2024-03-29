<?php
    require_once 'vendor/autoload.php';

    use Carbon\Carbon;
    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\ClientException;
    use PetViz\AbilityQuery;
    use Propel\Runtime\ActiveQuery\Criteria;

    $token = file_get_contents('token');
    $client = new Client();

    $abilities = AbilityQuery::create()
        ->filterByUpdatedAt(Carbon::now('UTC')->subHours(1), Criteria::LESS_THAN)
        ->find();

    foreach ($abilities as $i => $ability) {
        try {
            // @todo: endpoint needs to be migrated
            // https://develop.battle.net/documentation/guides/community-apis-world-of-warcraft-community-api-migration-status
            $response = $client->get('https://us.api.blizzard.com/wow/pet/ability/' . $ability->getAbilityId(), [
                'query' => [
                    'namespace' => 'static-us',
                    'locale' => 'en_US',
                    'access_token' => $token
                ]
            ]);

            $json = json_decode((string)$response->getBody(),  true);

            $ability->setRounds($json['rounds']);
            $ability->setCooldown($json['cooldown']);
            $ability->setPassive($json['isPassive']);
            $ability->setIcon(sprintf('https://render-us.worldofwarcraft.com/icons/56/%s.jpg', $json['icon']));
            $ability->setUpdatedAt(Carbon::now('UTC'));
            $ability->save();
        } catch (ClientException $e) {
            if ($e->getCode() == 404) {
                // do nothing
            } else {
                throw $e;
            }
        }

        if ($i % 50 == 0) sleep(1);
    }