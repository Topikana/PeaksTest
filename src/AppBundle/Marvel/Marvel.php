<?php
/**
 * Created by PhpStorm.
 * User: letellie
 * Date: 21/05/19
 * Time: 13:33
 */

namespace AppBundle\Marvel;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JMS\Serializer\Serializer;

use Hateoas\Configuration\Annotation as Hateoas;

class Marvel
{
//    private $marvelClient;
//
//    private $apiKeyPublic;
//
//    private $serializer;
//
//    private $apiKeyPrivate;


    /**
     * Marvel constructor.
     * @param Client $marvelClient
     * @param $apiKeyPublic
     * @param Serializer $serializer
     *
     */
    public function __construct($timestamp, $publicKey, $privateKey, $hash, $url, $limit, $offset)
    {

        $this->timestamp = $timestamp;
        $this->hash = $hash;
        $this->publicKey = $publicKey;
        $this->privateKey = $privateKey;
        $this->url = $url;
        $this->limit = $limit;
        $this->offset = $offset;

    }

    public function api()
    {
        // Create a client with a base URI
        $client = new Client();
        try {
            $response = $client->request('GET', $this->url,
                [
                    'query' =>
                        [
                            'orderBy' => 'name',
                            'limit' => $this->limit,
                            'offset' => $this->offset,
                            'hash' => $this->hash,
                            'apikey' => $this->publicKey,
                            'ts' => $this->timestamp
                        ]
                ]
            );

            return $body = $response->getBody()->getContents();
        } catch (GuzzleException $e) {


        }

    }
}







