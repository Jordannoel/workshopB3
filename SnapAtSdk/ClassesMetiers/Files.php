<?php

namespace SnapAtSdk\ClassesMetiers;

/**
 * Files
 *
 * @ORM\Table(name="files")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FilesRepository")
 */
class Files implements ClasseMetierInterface
{

    public function serializeProperties()
    {
        // TODO: Implement serializeProperties() method.
    }

    public function iterateProperties()
    {
        $array_prop_valeurs = array();
        foreach($this as $key => $value) {
            $array_prop_valeurs[$key] = $value;
        }
        return $array_prop_valeurs;
    }

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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;


    /**
     * Set id
     *
     * @param int $id
     *
     * @return Status
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
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
     * Set url
     *
     * @param string $url
     *
     * @return Files
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}

