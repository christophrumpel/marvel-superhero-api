<?php
/**
 * Created by PhpStorm.
 * User: christophrumpel
 * Date: 09/05/15
 * Time: 16:16
 */

namespace Rumpel\MarvelUniverse;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SuperheroApi
{

    /**
     * @var string
     */
    private $baseUrl = 'http://gateway.marvel.com/v1/public/';

    /**
     * @var Client
     */
    private $client;

    public function __construct($publicKey, $privateKey)
    {
        $ts = time();
        $hash = md5($ts . $privateKey . $publicKey);

        $this->client = new Client([
            'base_url' => $this->baseUrl,
            'defaults' => [
                'query' => [
                    'ts'     => $ts,
                    'apikey' => $publicKey,
                    'hash'   => $hash
                ]
            ]
        ]);
    }

    /**
     * Get all Marvel characters
     * @param int $offset
     * @param int $limit
     * @return mixed
     */
    public function getAllCharacters($offset = 0, $limit = 0)
    {
        $filters = [
            'query' => [
                'offset' => $offset,
            ]
        ];

        if($limit > 0)
            $filters['query']['limit'] = $limit;

        try {
            $result = $this->client->get('characters', $filters);
        } catch (RequestException $e) {
            $return['request'] = $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                return $return['response'] = $e->getResponse() . "\n";

            }
        }

        return $result->json();

    }

    /**
     * Get a Marvel character by id
     * @param $id
     * @return mixed|string
     */
    public function getCharacterById($id)
    {
        try {
            $result = $this->client->get('characters/' . $id);
        } catch (RequestException $e) {
            $return['request'] = $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                return $return['response'] = $e->getResponse() . "\n";

            }
        }

        return $result->json();
    }

}