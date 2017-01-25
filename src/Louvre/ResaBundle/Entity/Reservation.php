<?php

namespace Louvre\ResaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="Louvre\ResaBundle\Repository\ReservationRepository")
 */
class Reservation
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
     * @var \Date
     *
     * @ORM\Column(name="dateResa", type="date")
     */
    private $dateResa;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var bool
     *
     * @ORM\Column(name="typeTicket", type="boolean")
     */
    private $typeTicket;

    /**
     * @ORM\OneToMany(targetEntity="Louvre\ResaBundle\Entity\Visiteur", mappedBy="reservation", cascade={"persist"})
     */
    private $visiteurs;


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
     * Set dateResa
     *
     * @param \Date $dateResa
     *
     * @return Reservation
     */
    public function setDateResa($dateResa)
    {
        $this->dateResa = $dateResa;

        return $this;
    }

    /**
     * Get dateResa
     *
     * @return \Date
     */
    public function getDateResa()
    {
        return $this->dateResa;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Reservation
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set typeTicket
     *
     * @param boolean $typeTicket
     *
     * @return Reservation
     */
    public function setTypeTicket($typeTicket)
    {
        $this->typeTicket = $typeTicket;

        return $this;
    }

    /**
     * Get typeTicket
     *
     * @return bool
     */
    public function getTypeTicket()
    {
        return $this->typeTicket;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->visiteurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add visiteur
     *
     * @param \Louvre\ResaBundle\Entity\Visiteur $visiteur
     *
     * @return Reservation
     */
    public function addVisiteur(\Louvre\ResaBundle\Entity\Visiteur $visiteur)
    {
        $visiteur->setReservation($this);
        $this->visiteurs->add($visiteur);

        return $this;
    }

    /**
     * Remove visiteur
     *
     * @param \Louvre\ResaBundle\Entity\Visiteur $visiteur
     */
    public function removeVisiteur(\Louvre\ResaBundle\Entity\Visiteur $visiteur)
    {
        $this->visiteurs->removeElement($visiteur);
    }

    /**
     * Get visiteurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVisiteurs()
    {
        return $this->visiteurs;
    }

    public function setVisiteurs($visiteurs)
    {
        foreach ($visiteurs as $visiteur) 
        {
            $this->addVisiteur($visiteur);
        }
 
    return $this;
    }


}
