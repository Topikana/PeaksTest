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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Routing\Annotation\Route;




class MarvelController extends Controller
{

    /**
     * @Route("/{offset}", name="marvelList")
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @Method({"GET"})
     *
     */
    public function listCharacter($offset = 100){

        $timestamp =  time();
        $publicKey = $this->getParameter('api_public_key');
        $privateKey = $this->getParameter('api_private_key');
        $hash = md5($timestamp.$privateKey.$publicKey);
        $url = 'http://gateway.marvel.com/v1/public/characters';
        $limit = 3;

        if($offset == 117){
            $limit = 2;
        }

        $client = new Marvel($timestamp,$this->getParameter('api_public_key'),$this->getParameter('api_private_key'),
            $hash, $url, $limit, $offset
        );

        $body = $client->api();

        $data = $this->get('jms_serializer')->deserialize($body, 'array', 'json');
        $marvel = $data['data']['results'];
//        dump($marvel);die;

        $em = $this->getDoctrine()->getManager();
        $favorites = $this->getDoctrine()->getRepository(Favorites::class)->findAll();

//        $favorite = new Favorites();

        //        for($i = 0 ; $i < 3; $i ++) {
//            $form = $this->createForm('AppBundle\Form\favoriteType', $favorite);
//            $form->handleRequest($request);
//        }
//

//
//
//        if($form->isSubmitted() && $form->isValid())
//        {
//            $favorite = $form->getData();
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($favorite);
//            $em->flush($favorite);
//
//            $offset = $favorite->getOffset();
//
//            return $this->redirectToRoute('marvelList', array(
//                'offset' => $offset
//            ));
//            }

        return $this->render('@App/marvelList.html.twig',[
            'heros' => $marvel,
            'offset' => $offset,
            'favorites' => $favorites,
//            'form' => $form->createView(),
        ]);

    }

    /**
     * @param $id
     * @param $offset
     * @Route("/add/{offset}/{id}", name="addFavorite")
     */
    public function addFavorite($id, $offset){
        $em = $this->getDoctrine()->getManager();
        $hero = new Favorites();
        $hero->setIdHero($id);
        $em->persist($hero);
        $em->flush($hero);

    return $this->redirectToRoute('marvelList', [
        'offset' => $offset,
    ]);



    }



    /**
     * @Route("/remove/{offset}/{id}", name="deleteFavorite")
     */
    public function deleteFavorite($id, $offset){

//        $hero = new Favorites();
//        $hero->getIdHero()

        $em = $this->getDoctrine()->getManager();
        $hero = $id;
        $favorite = $em->getRepository(Favorites::class)->findOneBy(['idHero' => $id]);

        $em->remove($favorite);
        $em->flush();

        return $this->redirectToRoute('marvelList',  array(
            'offset' => $offset
            )
        );


    }


    /**
     * @Route("/marvelHero/list/{info}", name="marvelHero")
     *
     */
    public function persoCharacter($info){



        $url = 'http://gateway.marvel.com/v1/public/characters/'.$info;
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
                    'hero'  => $hero,
        ]);
        }


}