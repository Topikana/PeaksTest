<?php
/**
 * Created by PhpStorm.
 * User: letellie
 * Date: 21/05/19
 * Time: 14:25
 */

namespace AppBundle\Controller;

use AppBundle\Marvel\Marvel;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;




class MarvelController extends Controller
{

    /**
     * @Route("/{offset}", name="marvelList")
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     */
    public function listCharacter($offset = 100){

        $timestamp =  time();
        $publicKey = $this->getParameter('api_public_key');
        $privateKey = $this->getParameter('api_private_key');
        $hash = md5($timestamp.$privateKey.$publicKey);
        $url = 'http://gateway.marvel.com/v1/public/characters';
        $limit = 3;

        $client = new Marvel($timestamp,$this->getParameter('api_public_key'),$this->getParameter('api_private_key'),
            $hash, $url, $limit, $offset
        );

        $body = $client->api();

        $data = $this->get('jms_serializer')->deserialize($body, 'array', 'json');
        $marvel = $data['data']['results'];



        return $this->render('@App/marvelList.html.twig',[
            'heros' => $marvel,
            'offset' => $offset,
        ]);

    }


    /**
     * @Route("/marvelHero/{id}", name="marvelHero")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function persoCharacter($id){


        $url = 'https://developer.marvel.com/v1/public/characters/'.$id;
        $timestamp = time();
        $publicKey = $this->getParameter('api_public_key');
        $privateKey = $this->getParameter('api_private_key');
        $hash = md5($timestamp.$privateKey.$publicKey);
        $limit = 0;
        $offset = 0;

        $client = new Marvel($timestamp,$this->getParameter('api_public_key'),$this->getParameter('api_private_key'),
            $hash, $url, $limit, $offset);

        $body = $client->api();
        dump($body);die;

        $data = $this->get('jms_serializer')->deserialize($body, 'array', 'json');
        $hero = $data['data']['results'];

//
//        $client = new Client();
//        try {
//            $response = $client->request('GET', 'https://developer.marvel.com/v1/public/characters/'.$id,[
//                'query' => [
//
//
//            ]
//            ]);
//
//
//        } catch (GuzzleException $e) {
//
//            }
//
//        $data = $this->get('jms_serializer')->deserialize($response, 'array', 'json');
//        $hero = $data['data']['results'];
//        dump($url);die;


        return $this->render('@App/marvelHero.html.twig',[
                    'hero'  => $hero
        ]);


    }




}