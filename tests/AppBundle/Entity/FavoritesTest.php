<?php
/**
 * Created by PhpStorm.
 * User: letellie
 * Date: 27/05/19
 * Time: 08:49
 */

namespace Tests\AppBundle\Entity;
use AppBundle\Entity\Favorites;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FavoritesTest extends WebTestCase
{
//    private $favorites;


    public function testFavoritesCreate()
    {
        $favorites = new Favorites();
        $favorites->setIdHero(6666);
        $favorites->setName('Testname');
        $favorites->setPath('https://developer.marvel.com/');

//        $em = $this->container->get("doctrine")->getManager();
//        $this->em->persist($favorites);
//        try {
//            $this->em->flush();
//        } catch (\Exception $exception) {
//            echo $exception->getMessage();
//        }

        $this->assertEquals(6666, $favorites->getIdHero());
        $this->assertEquals("Testname", $favorites->getName());
        $this->assertEquals("https://developer.marvel.com/", $favorites->getPath());
    }


}