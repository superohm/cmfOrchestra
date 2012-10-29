<?php
/**
 * This file is part of the <User> project.
 *
 * @category   BootStrap_Entities
 * @package    Entity
 * @author (c) <etienne de Longeaux> <etienne.delongeaux@gmail.com>
 * @since 2011-12-30
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace BootStrap\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use BootStrap\UserBundle\Repository\RoleRepository;

/**
 * BootStrap\UserBundle\Entity\Role
 *
 * @ORM\Table(name="fos_role")
 * @ORM\Entity(repositoryClass="BootStrap\UserBundle\Repository\RoleRepository")
 * @ORM\HasLifecycleCallbacks() 
 * 
 * @category   BootStrap_Entities
 * @package    Entity
 * 
 * @author (c) <etienne de Longeaux> <etienne.delongeaux@gmail.com>
 */
class Role
{
    /**
     * @var bigint $id
     * 
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    
    /**
     * @ORM\ManyToMany(targetEntity="BootStrap\UserBundle\Entity\Ressource")
     * @ORM\JoinTable(name="fos_role_ressource",
     *      joinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="ressource_id", referencedColumnName="id")}
     * )
     */
    protected $accessControl;    
    
    /**
     * @ORM\Column(type="string",length=55, nullable=false)
     * @Assert\NotBlank()
     * @Assert\MinLength(limit = 3, message = "Le label doit avoir au moins {{ limit }} caractères")
     */
    protected $label;    
    
    /**
     * @ORM\Column(type="string",length=25, nullable=false)
     * @Assert\NotBlank()
     * @Assert\MinLength(limit = 8, message = "Le nom doit avoir au moins {{ limit }} caractères")
     * @Assert\MaxLength(limit = 25, message = "Le nom doit avoir au plus {{ limit }} caractères")
     */
    protected $name;    
    
    /**
     * @var text $comment
     *
     * @ORM\Column(type="text", nullable=true)
     * @Assert\NotBlank(message = "You must enter a comment")
     * @Assert\MinLength(limit = 25, message = "Le commentaire doit avoir au moins {{ limit }} caractères")
     */
    protected $comment;    

    /**
     * @var array
     * @ORM\Column(type="array", nullable=true)
     */
    protected $heritage;
    
    /**
     * @var boolean $enabled
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=true)
     */
    protected $enabled;   
    

    public function __construct()
    {
        $this->accessControl = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     *
     * This method is used when you want to convert to string an object of
     * this Entity
     * ex: $value = (string)$entity;
     *
     */
    public function __toString() {
    	return (string) $this->label;
    }    
    
    /**
     * Get id
     *
     * @return bigint 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set label
     *
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * Get label
     *
     * @return string 
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = strtoupper($name);
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set comment
     *
     * @param text $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get comment
     *
     * @return text 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set heritage
     *
     * @param array $heritage
     */
    public function setHeritage( array $heritage)
    {
        $this->heritage = array();
        
        foreach ($heritage as $role) {
        	$this->addRoleInHeritage($role);
        }        
    }

    /**
     * Get heritage
     *
     * @return array
     */
    public function getHeritage()
    {
    	$roles = $this->heritage;
    
    	// we need to make sure to have at least one role
    	$roles[] = RoleRepository::ShowDefaultRole();
    
    	return array_unique($roles);
    }
    
    /**
     * Adds a role heritatge to the role.
     *
     * @param string $role
     */
    public function addRoleInHeritage($role)
    {
    	$role = strtoupper($role);
    
    	if (!in_array($role, $this->heritage, true)) {
    		$this->heritage[] = $role;
    	}
    }    

    /**
     * Add accessControl
     *
     * @param \BootStrap\UserBundle\Entity\Ressource $accessControl
     */
    public function addRessource(\BootStrap\UserBundle\Entity\Ressource $accessControl)
    {
        $this->accessControl[] = $accessControl;
    }

    /**
     * Get accessControl
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getAccessControl()
    {
        return $this->accessControl;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }
}