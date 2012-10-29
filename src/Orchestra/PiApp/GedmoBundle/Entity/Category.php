<?php
/**
 * This file is part of the <Gedmo> project.
 *
 * @category   Gedmo_Entities
 * @package    Entity
 * @author (c) <etienne de Longeaux> <etienne.delongeaux@gmail.com>
 * @since 2012-07-31
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PiApp\GedmoBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use BootStrap\TranslationBundle\Model\AbstractDefault;

/**
 * PiApp\GedmoBundle\Entity\Category
 * 
 * @ORM\Table(name="gedmo_category")
 * @ORM\Entity(repositoryClass="PiApp\GedmoBundle\Repository\CategoryRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Gedmo\TranslationEntity(class="PiApp\GedmoBundle\Entity\Translation\CategoryTranslation")
 *
 * @category   Gedmo_Entities
 * @package    Entity
 *
 * @author (c) <etienne de Longeaux> <etienne.delongeaux@gmail.com>
 */
class Category extends AbstractDefault
{
	/**
	 * List of al translatable fields
	 *
	 * @var array
	 * @access  protected
	 */
	protected $_fields	= array('name');
	
	/**
	 * Name of the Translation Entity
	 *
	 * @var array
	 * @access  protected
	*/
	protected $_translationClass = 'PiApp\GedmoBundle\Entity\Translation\CategoryTranslation';
	
	/**
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 *
	 * @ORM\OneToMany(targetEntity="PiApp\GedmoBundle\Entity\Translation\CategoryTranslation", mappedBy="object", cascade={"persist", "remove"})
	 */
	protected $translations;
		
    /**
     * @var bigint
     * 
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Gedmo\Translatable
     * @ORM\Column(name="name", type="string", length=255, nullable = true)
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="PiApp\GedmoBundle\Entity\Block", mappedBy="category")
     */
    protected $items;

    public function __construct()
    {
        $this->items = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     *
     * This method is used when you want to convert to string an object of
     * this Entity
     * ex: $value = (string)$entity;
     *
     */
    public function __toString()
    {
    	return (string) $this->getName();
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
    	$this->name = $name;
    	return $this;
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
    
}