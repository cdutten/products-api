<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Article.
 *
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Article
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    public $name;

    /**
     * @ORM\Column(type="text")
     */
    public $description;
}
