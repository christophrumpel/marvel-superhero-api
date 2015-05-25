<?php

namespace Rumpel\MarvelUniverse;

use GuzzleHttp\Client;

class AbstractSuperHeroApi
{
    /**
     * @var string
     */
    private $baseUrl = 'http://gateway.marvel.com/v1/public/';

    /**
     * @var Client
     */
    protected $client;
    protected $slug;

    /**
     * @param Client $client
     */
    public function __construct(Client $client) {

        $this->client = $client;
    }

    /**
     * Get resource by id
     * @param $characterId
     * @return mixed|string
     */
    public function getById($characterId)
    {
        try {
            $result = $this->client->get($this->slug . '/' . $characterId);
        } catch (RequestException $e) {
            $return['request'] = $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                return $return['response'] = $e->getResponse() . "\n";

            }
        }

        return $result->json();
    }

    /**
     * Get all from resource
     * @param array $filterAttributes
     * @return mixed
     */
    public function getAll(array $filterAttributes = [])
    {
        $filters = ['query' => [$filterAttributes]];

        try {
            $result = $this->client->get($this->slug, $filters);
        } catch (RequestException $e) {
            $return['request'] = $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                return $return['response'] = $e->getResponse() . "\n";

            }
        }

        return $result->json();

    }

}