<?php
/**
 * Created by PhpStorm.
 * User: letellie
 * Date: 27/05/19
 * Time: 08:49
 */

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Favorites;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

//use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FavoritesTest extends KernelTestCase
{
//    private $favorites;

//    protected function setUp()
//    {
//        $kernel = self::bootKernel();
//
//        $this->entityManager = $kernel->getContainer()
//            ->get('doctrine')
//            ->getManager();
//    }

    public function testFavoritesCreate()
    {
        $kernel = self::bootKernel();
        $em = $kernel->getContainer()
            ->get('doctrine')->getManager();

        $favorites = new Favorites();
        $favorites->setIdHero(6666);

        $em->persist($favorites);
        try {
            $em->flush();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }

//        $favorites = $this->getDoctrine()->getRepository(Favorites::class)->findAll();

        $test = $em->getRepository(Favorites::class)->findOneBy(['idHero' => 6666]);

//        $test->getidHero();

        $this->assertEquals(6666, $test->getIdHero());

        $em->remove($test);
        $em->flush();

    }










}