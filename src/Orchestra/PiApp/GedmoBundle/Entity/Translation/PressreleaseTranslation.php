<?php 
/**
 * This file is part of the <Gedmo> project.
 *
 * @category   Gedmo_Entities
 * @package    Entity
 * @author Etienne de Longeaux <etienne.delongeaux@gmail.com>
 * @since 2012-03-08
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PiApp\GedmoBundle\Entity\Translation;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Entity\MappedSuperclass\AbstractPersonalTranslation;

/**
 * @ORM\Entity(repositoryClass="PiApp\GedmoBundle\Repository\PressreleaseRepository")
 * @ORM\Table(
 *         name="gedmo_pressrelease_translations",
 *         uniqueConstraints={@ORM\UniqueConstraint(name="lookup_unique_idx", columns={
 *             "locale", "object_id", "field"
 *         })}
 * )
 */
class PressreleaseTranslation extends AbstractPersonalTranslation
{
	/**
	 * @ORM\ManyToOne(targetEntity="PiApp\GedmoBundle\Entity\PressRelease", inversedBy="translations")
	 * @ORM\JoinColumn(name="object_id", referencedColumnName="id", onDelete="CASCADE")
	 */
	protected $object;
	
	/**
	 * Convinient constructor
	 *
	 * @param string $locale
	 * @param string $field
	 * @param string $value
	 */
	public function __construct($locale = null, $field = null, $value = null)
	{
		if(!is_null($locale))
			$this->setLocale($locale);
		if(!is_null($field))
			$this->setField($field);
		if(!is_null($value))
			$this->setContent($value);
	}	
		
}