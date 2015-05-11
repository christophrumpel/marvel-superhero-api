<?php
namespace Rumpel\MarvelUniverse;

use GuzzleHttp\Client;

class Character
{

    /**
     * @var Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client) {

        $this->client = $client;
    }

    /**
     * Get all Marvel characters
     * @param array $filterAttributes
     * @return mixed
     */
    public function getAll(array $filterAttributes = [])
    {
        $filters = ['query' => [$filterAttributes]];

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
     * @param $characterId
     * @return mixed|string
     */
    public function getById($characterId)
    {
        try {
            $result = $this->client->get('characters/' . $characterId);
        } catch (RequestException $e) {
            $return['request'] = $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                return $return['response'] = $e->getResponse() . "\n";

            }
        }

        return $result->json();
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