<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/22/2018
 * Time: 3:37 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class Word
 *
 * @ORM\Entity
 * @ORM\Table(name="meanings")
 *
 * @package AppBundle\Entity
 */
class Meaning
{
    /**
     * @ORM\ManyToOne(targetEntity="Word", inversedBy="meanings")
     * @ORM\JoinColumn(name="word_id", referencedColumnName="id")
     */
    private $word;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=25)
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="integer", length=25)
     */
    private $wordId;


    /**
     * @ORM\Column(type="string", length=20)
     */
    private $speachPart;

    /**
     * @ORM\Column(type="text")
     */
    private $definition;


    public function getSpeachPart() {
        return $this->speachPart;
    }

    public function getDefinition() {
        return $this->definition;
    }
}