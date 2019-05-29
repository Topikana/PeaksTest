<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Favorites
 *
 * @ORM\Table(name="favorites")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FavoritesRepository")
 *
 * )
 */
class Favorites
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="idHero", type="integer")
     */
    private $idHero;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;


    /**
     * @var string
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;


    /**
     * @var string
     * @ORM\Column(name="offset", type="string",  nullable=true)
     */
    private $offset;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idHero.
     *
     * @param int $idHero
     *
     * @return Favorites
     */
    public function setIdHero($idHero)
    {
        $this->idHero = $idHero;

        return $this;
    }

    /**
     * Get idHero.
     *
     * @return int
     */
    public function getIdHero()
    {
        return $this->idHero;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Favorites
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set path.
     *
     * @param string $path
     *
     * @return Favorites
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Favorites
     */
    public function setDescription($description)
    {
        $this->description= $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

//
//    /**
//     * @return string
//     */
//    public function getOffset()
//    {
//        return $this->offset;
//    }
//
//
//    /**
//     * @param string $offset
//     */
//    public function setOffset($offset)
//    {
//        $this->offset = $offset;
//    }




}
