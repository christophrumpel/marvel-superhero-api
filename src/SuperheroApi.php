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
    /**
     * @var Comic
     */
    private $comic;
    /**
     * @var Character
     */
    private $character;

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
        $this->character = new Character($this->client);
    }

    public function characters() {
        return $this->character;
    }

    public function comics() {
        return $this->comic;
    }

}