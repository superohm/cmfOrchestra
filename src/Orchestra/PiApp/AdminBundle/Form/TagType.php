<?php
/**
 * This file is part of the <Admin> project.
 *
 * @category   Admin_Form
 * @package    CMS_Form
 * @author (c) <etienne de Longeaux> <etienne.delongeaux@gmail.com>
 * @since 2012-01-07
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PiApp\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Doctrine\ORM\EntityManager;

/**
 * Description of the TagType form.
 *
 * @category   Admin_Form
 * @package    CMS_Form
 *
 * @author (c) <etienne de Longeaux> <etienne.delongeaux@gmail.com>
 */
class TagType extends AbstractType
{
	/**
	 * @var \Doctrine\ORM\EntityManager
	 */
	protected $_em;
	
	
	/**
	 * Constructor.
	 *
	 * @param \Doctrine\ORM\EntityManager $em
	 * @return void
	 */
	public function __construct(EntityManager $em, $locale)
	{
		$this->_em 	  = $em;
		$this->_locale = $locale;
	}	
		
    public function buildForm(FormBuilder $builder, array $options)
    {
    	$choiceList = $this->_em->getRepository("PiAppAdminBundle:Tag")->getArrayAllGroupName($this->_locale);
    	if(!isset($choiceList) || !count($choiceList))
    		$choiceList = array();
    	    	
        $builder
            ->add('enabled')
            ->add('groupname', 'choice', array(
            		'choices'   => $choiceList,
            		'multiple'	=> false,
            		'required'  => false,
            		'empty_value' => 'Choose a type',
            		"attr" => array(
            				"class"=>"pi_simpleselect",
            		),
            ))
            ->add('groupnameother', 'text', array(
            		'label'=>'ou',
            		'required'  => false,
            ))
            ->add('name')
            ->add('color')
            ->add('Hicolor')
        ;
    }

    public function getName()
    {
        return 'piapp_adminbundle_tagtype';
    }
}
