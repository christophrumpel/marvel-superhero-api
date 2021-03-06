<?php
namespace Rumpel\MarvelUniverse;

use GuzzleHttp\Client;

class Character extends AbstractSuperHeroApi
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $slug;

    public function __construct(Client $client)
    {
        parent::__construct($client);
        $this->slug = 'characters';
    }

    /**
     * Get from a specific character all comics
     * @param $characterId
     * @param array $filterAttributes
     * @return mixed|string
     */
    public function getComics($characterId, array $filterAttributes = [])
    {
        $filters = ['query' => [$filterAttributes]];

        try {
            $result = $this->client->get('characters/' . $characterId . '/comics', $filters);
        } catch (RequestException $e) {
            $return['request'] = $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                return $return['response'] = $e->getResponse() . "\n";

            }
        }

        return $result->json();
    }

    /**
     * Get from a specific character all events
     * @param $characterId
     * @param array $filterAttributes
     * @return mixed|string
     */
    public function getEvents($characterId, array $filterAttributes = [])
    {
        $filters = ['query' => [$filterAttributes]];

        try {
            $result = $this->client->get('characters/' . $characterId . '/events', $filters);
        } catch (RequestException $e) {
            $return['request'] = $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                return $return['response'] = $e->getResponse() . "\n";

            }
        }

        return $result->json();
    }

    /**
     * Get from a specific character all series
     * @param $characterId
     * @param array $filterAttributes
     * @return mixed|string
     */
    public function getSeries($characterId, array $filterAttributes = [])
    {
        $filters = ['query' => [$filterAttributes]];

        try {
            $result = $this->client->get('characters/' . $characterId . '/series', $filters);
        } catch (RequestException $e) {
            $return['request'] = $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                return $return['response'] = $e->getResponse() . "\n";

            }
        }

        return $result->json();
    }

    /**
     * Get from a specific character all stories
     * @param $characterId
     * @param array $filterAttributes
     * @return mixed|string
     */
    public function getStories($characterId, array $filterAttributes = [])
    {
        $filters = ['query' => [$filterAttributes]];

        try {
            $result = $this->client->get('characters/' . $characterId . '/stories', $filters);
        } catch (RequestException $e) {
            $return['request'] = $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                return $return['response'] = $e->getResponse() . "\n";

            }
        }

        return $result->json();
    }
}