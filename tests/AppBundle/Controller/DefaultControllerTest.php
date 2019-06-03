<?php

namespace Tests\AppBundle\Controller;




use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
class DefaultControllerTest extends WebTestCase
{
    public function testListIsSuccessful(){
        $url = '/';
        $client = self::createClient();
        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());

    }

    public function testHeroIsSuccessful(){
        $info = 1009489;
        $url = '/marvelHero/list/'.$info;
        $client = self::createClient();
        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());

    }

    public function testAddIsSuccessful(){
        $id = 1009489;
        $offset = 100;
        $url = '/add/'.$offset.'/'.$id;
        $client = self::createClient();
        $client->request('GET', $url);

        $this->assertEquals('AppBundle\Controller\MarvelController::addFavorite',
            $client->getRequest()->attributes->get('_controller'),
            "the controller method called is not addFavorite");
    }

    public function testRemoveIsSuccesfull(){

        $offset = 100;
        $id = 1009489;
        $url = "/remove/".$offset.'/'.$id;
        $client = self::createClient();
        $client->request('GET', $url);

        $this->assertEquals('AppBundle\Controller\MarvelController::deleteFavorite',
            $client->getRequest()->attributes->get('_controller'),
            "the controller method called is not deleteFavorite");

    }


//    public function urlProvider(){
//        $id = 1011346;
//        $offset = 100;
//
//        return[
//            ['/'],
//            ['/'.$id]
//
//        ];
//    }


//    public function testIndex()
//    {
//        $client = static::createClient();
//
//        $client->request('GET', '/');
////        $this->assertTrue(true);
//
//        $this->assertEquals(200, $client->getResponse()->getStatusCode());

//        $client = static::createClient();
//
//        $crawler = $client->request('GET', '/');
//
//        $this->assertEquals(200, $client->getResponse()->getStatusCode());
//        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
//    }

//public function testList(){
//
//    $client = static::createClient();
//
//    $crawler = $client->request('GET', 'ROD/notepad');
//    $this->assertTrue(true);
//
//}



}
