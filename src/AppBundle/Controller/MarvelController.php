<?php
/**
 * Created by PhpStorm.
 * User: letellie
 * Date: 21/05/19
 * Time: 14:25
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Favorites;
use AppBundle\Marvel\Marvel;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


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

        $url = 'http://gateway.marvel.com//v1/public/characters/'.$id;
        $timestamp = time();
        $publicKey = $this->getParameter('api_public_key');
        $privateKey = $this->getParameter('api_private_key');
        $hash = md5($timestamp.$privateKey.$publicKey);
        $limit = 20;
        $offset = 100;

        $client = new Marvel($timestamp,$this->getParameter('api_public_key'),$this->getParameter('api_private_key'),
            $hash, $url, $limit, $offset);

        $body = $client->api();

        $data = $this->get('jms_serializer')->deserialize($body, 'array', 'json');
        $hero = $data['data']['results'];

        return $this->render('@App/marvelHero.html.twig',[
                    'hero'  => $hero
        ]);
        }
//
        /**
        * @Route("/marvelHero/favorite/{id}", name="favorite")
        */
        public function addFavorite($id){


//        $favorite = new Favorites();
//        $favorite->setIdHero($id);
//        $path =
//        $em = $this->getDoctrine()->


        }
}