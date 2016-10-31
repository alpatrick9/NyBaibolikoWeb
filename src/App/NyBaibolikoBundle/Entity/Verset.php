<?php

namespace App\NyBaibolikoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Verset
 *
 * @ORM\Table(name="verset")
 * @ORM\Entity(repositoryClass="App\NyBaibolikoBundle\Repository\VersetRepository")
 */
class Verset
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
     * @var string
     *
     * @ORM\Column(name="book", type="string", length=255)
     */
    private $book;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;

    /**
     * @var int
     *
     * @ORM\Column(name="chapitre_number", type="integer")
     */
    private $chapitreNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="verset_number", type="integer")
     */
    private $versetNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=true)
     */
    private $note;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set book
     *
     * @param string $book
     *
     * @return Verset
     */
    public function setBook($book)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     * @return string
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * Set chapitreNumber
     *
     * @param integer $chapitreNumber
     *
     * @return Verset
     */
    public function setChapitreNumber($chapitreNumber)
    {
        $this->chapitreNumber = $chapitreNumber;

        return $this;
    }

    /**
     * Get chapitreNumber
     *
     * @return int
     */
    public function getChapitreNumber()
    {
        return $this->chapitreNumber;
    }

    /**
     * Set versetNumber
     *
     * @param integer $versetNumber
     *
     * @return Verset
     */
    public function setVersetNumber($versetNumber)
    {
        $this->versetNumber = $versetNumber;

        return $this;
    }

    /**
     * Get versetNumber
     *
     * @return int
     */
    public function getVersetNumber()
    {
        return $this->versetNumber;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Verset
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Verset
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
}
