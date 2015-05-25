<?php
namespace Rumpel\MarvelUniverse;

use GuzzleHttp\Client;

class Comic extends AbstractSuperHeroApi
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
        $this->slug = 'comics';
    }

    /**
     * Get from a specific character all comics
     * @param $comicId
     * @param array $filterAttributes
     * @return mixed|string
     */
    public function getCharacters($comicId, array $filterAttributes = [])
    {
        $filters = ['query' => [$filterAttributes]];

        try {
            $result = $this->client->get($this->slug . '/' . $comicId . '/characters', $filters);
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
     * @param $comicId
     * @param array $filterAttributes
     * @return mixed|string
     */
    public function getCreators($comicId, array $filterAttributes = [])
    {
        $filters = ['query' => [$filterAttributes]];

        try {
            $result = $this->client->get($this->slug . '/' . $comicId . '/creators', $filters);
        } catch (RequestException $e) {
            $return['request'] = $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                return $return['response'] = $e->getResponse() . "\n";

            }
        }

        return $result->json();
    }

    /**
     * Get from a specific comic all events
     * @param $comicId
     * @param array $filterAttributes
     * @return mixed|string
     */
    public function getEvents($comicId, array $filterAttributes = [])
    {
        $filters = ['query' => [$filterAttributes]];

        try {
            $result = $this->client->get($this->slug . '/' . $comicId . '/events', $filters);
        } catch (RequestException $e) {
            $return['request'] = $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                return $return['response'] = $e->getResponse() . "\n";

            }
        }

        return $result->json();
    }

    /**
     * Get from a specific comic all stories
     * @param $comicId
     * @param array $filterAttributes
     * @return mixed|string
     */
    public function getStories($comicId, array $filterAttributes = [])
    {
        $filters = ['query' => [$filterAttributes]];

        try {
            $result = $this->client->get($this->slug . '/' . $comicId . '/stories', $filters);
        } catch (RequestException $e) {
            $return['request'] = $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                return $return['response'] = $e->getResponse() . "\n";

            }
        }

        return $result->json();
    }
}