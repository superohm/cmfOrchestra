<?php
/**
 * This file is part of the <PI_CRUD> project.
 *
 * @category   PI_CRUD_Form
 * @package    Form
 * @author Etienne de Longeaux <etienne.delongeaux@gmail.com>
 * @since 2012-03-22
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PiApp\GedmoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Description of the MenuType form.
 *
 * @category   PI_CRUD_Form
 * @package    Form
 *
 * @author Etienne de Longeaux <etienne.delongeaux@gmail.com>
 */
class MenuType extends AbstractType
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
	public function __construct(EntityManager $em)
	{
		$this->_em = $em;
	}
		
    public function buildForm(FormBuilder $builder, array $options)
    {
    	$choiceList = $this->_em->getRepository("PiAppGedmoBundle:Menu")->getArrayAllCategory();
    	if(!isset($choiceList) || !count($choiceList))
    		$choiceList = array();
    	    	
        $builder            
 			->add('enabled', 'checkbox', array(
	        		'data'  => true,
	        ))            
	        ->add('page', 'entity', array(
            		'class' => 'PiAppAdminBundle:Page',
            		'query_builder' => function(EntityRepository $er) {
	            		return $er->getAllPageHtml();
		            },
		            'property' => 'route_name',
		            'empty_value' => 'pi.form.label.select.choose.option',
		            "label" 	=> "pi.form.label.field.url",
		            'multiple'	=> false,
		            'required'  => false,
		            "attr" => array(
		            		"class"=>"pi_simpleselect",
		            ),		            
            ))
            ->add('url', 'text', array(
            		'label'=>'pi.form.label.field.or',
            		'required'  => false,
            ))
	        ->add('category', 'choice', array(
	        		'choices'   => $choiceList,
			        'multiple'	=> false,
			        'required'  => false,
			        'empty_value' => 'pi.form.label.select.choose.category',
	        		'label'	=> "pi.form.label.field.category",
			        "attr" => array(
			        		"class"=>"pi_simpleselect",
		        	),
	        ))
	        ->add('categoryother', 'text', array(
	        		'label'=>'pi.form.label.field.or',
	        		'required'  => false,
	        ))           
 			->add('parent', 'entity', array(
	        		'class' => 'PiAppGedmoBundle:Menu',
	        		'query_builder' => function(EntityRepository $er) {
	        		return $er->createQueryBuilder('k')
		        		->select('k')
		        		->orderBy('k.lft', 'ASC');
			        },
			        'empty_value' => 'pi.form.label.select.choose.option',
			        'multiple'	=> false,
			        'required'  => false,
			        "attr" => array(
			        		"class"=>"pi_simpleselect",
			        ),
	        ))
	        ->add('title', 'text', array(
 					'label'	=> "pi.form.label.field.title",
 			)) 
	        ->add('media', new \PiApp\GedmoBundle\Form\MediaType($this->_em, 'image', 'image_collection', "simpleLink", 'pi.form.label.media.picture'))	          
        ;
    }

    public function getName()
    {
        return 'piapp_gedmobundle_menutype';
    }
        
}
