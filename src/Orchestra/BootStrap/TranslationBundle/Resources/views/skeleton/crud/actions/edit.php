
    /**
     * Displays a form to edit an existing {{ entity }} entity.
     *
     * @Secure(roles="ROLE_USER")
	 * @return \Symfony\Component\HttpFoundation\Response
     *
	 * @access	public
	 * @author (c) <etienne de Longeaux> <etienne.delongeaux@gmail.com>    
     */
    public function editAction($id)
    {
        $em 	= $this->getDoctrine()->getEntityManager();
    	$locale	= $this->container->get('session')->getLocale();
        $entity = $em->getRepository("{{ bundle }}:{{ entity }}")->findOneByEntity($locale, $id, 'object');
        
        $NoLayout   = $this->container->get('request')->query->get('NoLayout');
        if(!$NoLayout)	$template = "edit.html.twig";  else	$template = "edit.html.twig";        

        if (!$entity) {
        	$entity = $em->getRepository("{{ bundle }}:{{ entity }}")->find($id);
        	$entity->addTranslation(new {{ entity }}Translation($locale));            
        }

        $editForm   = $this->createForm(new {{ entity_class }}Type($em, $this->container), $entity, array('show_legend' => false));
        $deleteForm = $this->createDeleteForm($id);

{% if 'annotation' == format %}
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'NoLayout' 	  => $NoLayout,
        );
{% else %}
        return $this->render("{{ bundle }}:{{ entity|replace({'\\': '/'}) }}:$template", array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'NoLayout' 	  => $NoLayout,
        ));
{% endif %}
    }
