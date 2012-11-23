<?php
/**
 * This file is part of the <PI_CRUD> project.
 *
 * @category   PI_CRUD_Form
 * @package    Form
 * @author Etienne de Longeaux <etienne.delongeaux@gmail.com>
 * @since 20XX-XX-XX
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PiApp\GedmoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Description of the RssType form.
 *
 * @category   PI_CRUD_Form
 * @package    Form
 *
 * @author Etienne de Longeaux <etienne.delongeaux@gmail.com>
 */
class RssType extends AbstractType
{
	/**
	 * @var \Doctrine\ORM\EntityManager
	 */
	protected $_em;
	
	/**
	 * @var \Symfony\Component\DependencyInjection\ContainerInterface
	 */
	protected $_container;	
	
	/**
	 * @var string
	 */
	protected $_locale;	
	
	/**
	 * Constructor.
	 *
	 * @param \Doctrine\ORM\EntityManager $em
	 * @param string	$locale
	 * @return void
	 */
	public function __construct(EntityManager $em, ContainerInterface $container)
	{
		$this->_em 			= $em;
		$this->_locale		= $container->get('session')->getLocale();
		$this->_container 	= $container;
	}
		
    public function buildForm(FormBuilder $builder, array $options)
    {
    	//$choiceList = $this->_em->getRepository("bundle:entity")->getArrayAllCategory();
    	//if(!isset($choiceList) || !count($choiceList))
    	//	$choiceList = array();
    	
        $builder 			
 			->add('url', 'text', array(
 					"label" 	=> "pi.form.label.field.url",
 					"label_attr" => array(
 							"class"=>"page_collection",
 					),
 					'required'  => false,
 			)) 			
 			->add('created_at', 'date', array(
 					'widget' => 'single_text', // choice, text, single_text
 					'input' => 'datetime',
 					'format' => $this->_container->get('pi_app_admin.twig.extension.tool')->getDatePatternByLocalFunction($this->_locale),// 'dd/MM/yyyy', 'MM/dd/yyyy',
 					'required'  => false,
 					"attr" => array(
 							"class"=>"pi_datepicker",
 					),
 					'label'	=> 'pi.form.label.date.creation',
 			)) 			
 			->add('updated_at', 'date', array(
 					'widget' => 'single_text', // choice, text, single_text
 					'input' => 'datetime',
 					'format' => $this->_container->get('pi_app_admin.twig.extension.tool')->getDatePatternByLocalFunction($this->_locale),// 'dd/MM/yyyy', 'MM/dd/yyyy',
 					'required'  => false,
 					"attr" => array(
 							"class"=>"pi_datepicker",
 					),
 					'label'	=> 'pi.form.label.date.updating',
 			)) 			
 			->add('published_at', 'date', array(
 					'widget' => 'single_text', // choice, text, single_text
 					'input' => 'datetime',
 					'format' => $this->_container->get('pi_app_admin.twig.extension.tool')->getDatePatternByLocalFunction($this->_locale),// 'dd/MM/yyyy', 'MM/dd/yyyy',
 					'required'  => false,
 					"attr" => array(
 							"class"=>"pi_datepicker",
 					),
 					'label'	=> 'pi.form.label.date.publication',
 			)) 			
 			->add('archive_at', 'date', array(
 					'widget' => 'single_text', // choice, text, single_text
 					'input' => 'datetime',
 					'format' => $this->_container->get('pi_app_admin.twig.extension.tool')->getDatePatternByLocalFunction($this->_locale),// 'dd/MM/yyyy', 'MM/dd/yyyy',
 					'required'  => false,
 					"attr" => array(
 							"class"=>"pi_datepicker",
 					),
 					'label'	=> 'pi.form.label.date.archivage',
 			))        	
 			->add('enabled', 'checkbox', array(
            		'data'  => true,
 					'label'	=> 'pi.form.label.field.enabled',
            )) 			
 			->add('position') 			
 			->add('users') 			
 			->add('pageurl', 'entity', array(
 					'class' => 'PiAppAdminBundle:Page',
 					'query_builder' => function(EntityRepository $er) {
 						return $er->getAllPageHtml();
 					},
 					'property' => 'route_name',
 					'empty_value' => 'pi.form.label.select.choose.option',
 					"label" 	=> "pi.form.label.field.url",
 					"label_attr" => array(
 							"class"=>"page_collection",
 					),
 					"attr" => array(
 							"class"=>"pi_simpleselect",
 					),
 					'multiple'	=> false,
 					'required'  => false,
 			)) 			
 			->add('media', new \PiApp\GedmoBundle\Form\MediaType($this->_em, 'image', 'image_collection', "simpleLink", 'pi.form.label.media.picture'))
        ;
    }

    public function getName()
    {
        return 'piapp_gedmobundle_rsstype';
    }
        
}
