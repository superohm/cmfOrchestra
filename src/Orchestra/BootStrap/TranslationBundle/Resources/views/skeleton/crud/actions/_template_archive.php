

	/**
     * Template : Finds and displays an archive of {{ entity }} entity.
     * 
     * @Cache(maxage="86400")
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @access	public
     * @author Etienne de Longeaux <etienne.delongeaux@gmail.com> 
     */
    public function _template_archiveAction($MaxResults = null, $template = '_tmp_archive.html.twig', $order = 'DESC', $lang = "")
    {
    	$em 		= $this->getDoctrine()->getEntityManager();
    
    	if(empty($lang))
    		$lang	= $this->container->get('session')->getLocale();
    	 
    	if(isset($_GET['page']) && !empty($_GET['page']))
    		$page 	= $_GET['page'];
    	else
    		$page 	= 1;
    	 
    	$paginator 			= $this->container->get('knp_paginator');
    
    	$count 				= $em->getRepository("{{ bundle }}:{{ entity }}")->count(1);
    	$query_pagination	= $em->getRepository("{{ bundle }}:{{ entity }}")->getAllByCategory('', null, $order)->getQuery();
    	$query_pagination->setHint('knp_paginator.count', $count);
    	 
    	$pagination = $paginator->paginate(
    			$query_pagination,
    			$page,	/*page number*/
    			$MaxResults		/*limit per page*/
    	);
    	 
    	//print_r($pagination);exit;
    	 
    	$query_pagination->setFirstResult(($page-1)*$MaxResults);
    	$query_pagination->setMaxResults($MaxResults);
    	$query_pagination	= $em->getRepository("{{ bundle }}:{{ entity }}")->setTranslatableHints($query_pagination, $lang, false);
    	$entities			= $em->getRepository("{{ bundle }}:{{ entity }}")->findTranslationsByQuery($lang, $query_pagination, 'object', false);
    	 
    	return $this->render("{{ bundle }}:{{ entity }}:$template", array(
    			'entities'		=> $entities,
    			'pagination'	=> $pagination,
    			'locale'		=> $lang,
    			'lang'			=> $lang,
    	));        
    } 