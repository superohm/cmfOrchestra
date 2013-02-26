<?php
/**
 * This file is part of the <Admin> project.
 *
 * @category   Admin_Util
 * @package    Extension_jquery 
 * @author Etienne de Longeaux <etienne.delongeaux@gmail.com>
 * @since 2012-01-11
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PiApp\AdminBundle\Util\PiJquery;

use Symfony\Component\DependencyInjection\ContainerInterface;

use PiApp\AdminBundle\Twig\Extension\PiJqueryExtension;
use PiApp\AdminBundle\Exception\ExtensionException;

/**
 * Session flash Jquery plugin
 *
 * @category   Admin_Util
 * @package    Extension_jquery 
 * 
 * @author Etienne de Longeaux <etienne.delongeaux@gmail.com>
 */
class PiSessionFlashManager extends PiJqueryExtension
{
	/**
	 * @var array
	 * @static
	 */
	static $actions = array('renderdialog', 'renderfancybox');
	
	/**
	 * Constructor.
	 *
	 * @param ContainerInterface $container The service container
	 */
	public function __construct(ContainerInterface $container)
	{
		parent::__construct($container);
	}
	
	/**
	 * Sets init.
	 *
	 * @access protected
	 * @return void
	 *
	 * @author Etienne de Longeaux <etienne_delongeaux@hotmail.com>
	 */	
	protected function init($options = null)
	{
		if($options == 'fancybox'){
			$this->container->get('pi_app_admin.twig.extension.layouthead')->addJsFile("bundles/piappadmin/js/fancybox/jquery.fancybox.pack.js");
			$this->container->get('pi_app_admin.twig.extension.layouthead')->addCssFile("bundles/piappadmin/js/fancybox/jquery.fancybox.css");
		}elseif($options == 'wijmo'){
			$this->container->get('pi_app_admin.twig.extension.layouthead')->addCssFile("bundles/piappadmin/css/themes/wijmo/jquery.wijmo.wijdialog.css");
			$this->container->get('pi_app_admin.twig.extension.layouthead')->addCssFile("bundles/piappadmin/css/themes/wijmo/jquery.wijmo-open.2.1.2.css");
			$this->container->get('pi_app_admin.twig.extension.layouthead')->addCssFile("bundles/piappadmin/css/themes/rocket/jquery-wijmo.css");
			$this->container->get('pi_app_admin.twig.extension.layouthead')->addJsFile("bundles/piappadmin/js/wijmo/external/jquery.wijmo-open.all.2.1.2.min.js");
		}
	}	
	
    /**
      * Set progress text for Progress flash dialog.
      *
      * @param	$options	tableau d'options.
      * @access protected
      * @return void
      *
      * @author Etienne de Longeaux <etienne_delongeaux@hotmail.com> 
      */
	protected function render($options = null)
	{        
		// Options management
		if(!isset($options['action']) || empty($options['action']) || (isset($options['action']) && !in_array(strtolower($options['action']), self::$actions)) )
			throw ExtensionException::optionValueNotSpecified('action', __CLASS__);		
		if(!isset($options['dialog-name']) || empty($options['dialog-name']))
			throw ExtensionException::optionValueNotSpecified('dialog-name', __CLASS__);
		
		$method = strtolower($options['action']) . "Action";
		if(method_exists($this, $method))
			return $this->$method($options);
		else
			throw ExtensionException::MethodUnDefined($method);
	}

	/**
	 * Set progress text for Progress flash dialog.
	 *
	 * @param	$options	tableau d'options.
	 * @access protected
	 * @return void
	 *
	 * @author Etienne de Longeaux <etienne_delongeaux@hotmail.com>
	 */
	protected function renderdialogAction($options = null)
	{
		// We open the buffer.
		ob_start ();
		?>
				<script type="text/javascript">
				//<![CDATA[
				
					$(document).ready(function() {
					
						// On injecte les messages d'erreur via un dialog
						var layout_flash_message = $("#<?php echo $options['dialog-name']; ?>").html();
					
						if(layout_flash_message != null && layout_flash_message.length != 0) {
							// modal dialog for the error form
							$('#<?php echo $options['dialog-name']; ?>').wijdialog({
				                height: 180,
				                width: 400,
				                modal: true,
				                buttons: {
				                    Ok: function () {
				                        $(this).wijdialog("close");
				                    }
				                },
				                captionButtons: {
				                	close: { visible: false },
				                    pin: { visible: false },
				                    refresh: { visible: false },
				                    toggle: { visible: false },
				                    minimize: { visible: false },
				                    maximize: { visible: false }
				                },
				                show: 'scale',
				                hide: 'scale',
				                collapsingAnimation: { animated: "scale", duration: 1000000, easing: "easeOutExpo" },
				                expandingAnimation: { animated: "scale", duration: 1000000, easing: "easeOutExpo" },
				            });
				        }		
					});
	
				//]]>
				</script>
			<?php 
			// We retrieve the contents of the buffer.
			$_content = ob_get_contents ();
			// We clean the buffer.
			ob_clean ();
			// We close the buffer.
			ob_end_flush ();
			
			return $_content;
		}

		/**
		 * Set progress text for Progress flash dialog.
		 *
		 * @param	$options	tableau d'options.
		 * @access protected
		 * @return void
		 *
		 * @author Etienne de Longeaux <etienne_delongeaux@hotmail.com>
		 */
		protected function renderfancyboxAction($options = null)
		{
			// We open the buffer.
			ob_start ();
			?>
				<script type="text/javascript">
				//<![CDATA[
				
					$(document).ready(function() {
					
						// On injecte les messages d'erreur via un dialog
						var layout_flash_message = $("#<?php echo $options['dialog-name']; ?>").html();
					
						if(layout_flash_message != null && layout_flash_message.length != 0) {
							$.fancybox({
						        type: 'inline',
						        height: 'auto',
						        content: layout_flash_message
						    });
				        }		
					});
	
				//]]>
				</script>
			<?php 
			// We retrieve the contents of the buffer.
			$_content = ob_get_contents ();
			// We clean the buffer.
			ob_clean ();
			// We close the buffer.
			ob_end_flush ();
			
			return $_content;
		}		
}