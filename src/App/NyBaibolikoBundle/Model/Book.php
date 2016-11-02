<?php
namespace App\NyBaibolikoBundle\Model;
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/2/16
 * Time: 8:43 AM
 */
class Book
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var integer
     */
    protected $chap;

    /**
     * @var integer
     */
    protected $versetFirst;

    /**
     * @var integer
     */
    protected $versetLast;

    /**
     * Book constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getChap()
    {
        return $this->chap;
    }

    /**
     * @param int $chap
     */
    public function setChap($chap)
    {
        $this->chap = $chap;
    }

    /**
     * @return int
     */
    public function getVersetFirst()
    {
        return $this->versetFirst;
    }

    /**
     * @param int $versetFirst
     */
    public function setVersetFirst($versetFirst)
    {
        $this->versetFirst = $versetFirst;
    }

    /**
     * @return int
     */
    public function getVersetLast()
    {
        return $this->versetLast;
    }

    /**
     * @param int $versetLast
     */
    public function setVersetLast($versetLast)
    {
        $this->versetLast = $versetLast;
    }


}