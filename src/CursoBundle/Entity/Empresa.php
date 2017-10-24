<?php

namespace CursoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;
use \CursoBundle\Entity\Persona;

/**
 * Empresa
 *
 * @ORM\Table(name="empresa")
 * @ORM\Entity(repositoryClass="CursoBundle\Repository\EmpresaRepository")
 */
class Empresa
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="ciudad", type="string", length=255)
     */
    private $ciudad;

    /**
     * @var int
     *
     * @ORM\Column(name="numEmpleados", type="integer")
     */
    private $numEmpleados;

    /**
     * @ORM\OneToMany(targetEntity="Persona", mappedBy="empresa")
     */
    private $personas;

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Empresa
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     *
     * @return Empresa
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set numEmpleados
     *
     * @param integer $numEmpleados
     *
     * @return Empresa
     */
    public function setNumEmpleados($numEmpleados)
    {
        $this->numEmpleados = $numEmpleados;

        return $this;
    }

    /**
     * Get numEmpleados
     *
     * @return int
     */
    public function getNumEmpleados()
    {
        return $this->numEmpleados;
    }

    /**
     * @return mixed
     */
    public function getPersonas()
    {
        return $this->personas;
    }

    /**
     * @param mixed $personas
     */
    public function setPersonas($personas)
    {
        $this->personas = $personas;
    }

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->personas = new ArrayCollection();
    }

    /**
     * Add persona
     *
     * @param \CursoBundle\Entity\Persona $persona
     *
     * @return Empresa
     */
    public function addPersona(Persona $persona)
    {
        $this->personas[] = $persona;

        return $this;
    }

    /**
     * Remove persona
     *
     * @param \CursoBundle\Entity\Persona $persona
     */
    public function removePersona(Persona $persona)
    {
        $this->personas->removeElement($persona);
    }
}
