<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/22/2018
 * Time: 1:34 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Class Word
 *
 * @ORM\Entity
 * @ORM\Table(name="words")
 *
 * @package AppBundle\Entity
 */
class Word
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=25)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $word;

    /**
     * @ORM\OneToMany(targetEntity="Meaning", mappedBy="word")
     */
    private $meanings;

    public function __construct()
    {
        $this->meanings = new ArrayCollection();
    }

    public function getWord() {
        return $this->word;
    }

    public function getMeanings() {
        return $this->meanings;
    }
}