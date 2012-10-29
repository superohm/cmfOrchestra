<?php

namespace Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class PiAppAdminBundleEntityRubriqueProxy extends \PiApp\AdminBundle\Entity\Rubrique implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }
    
    
    public function __toString()
    {
        $this->__load();
        return parent::__toString();
    }

    public function getId()
    {
        $this->__load();
        return parent::getId();
    }

    public function setTitre($titre)
    {
        $this->__load();
        return parent::setTitre($titre);
    }

    public function getTitre()
    {
        $this->__load();
        return parent::getTitre();
    }

    public function setDescriptif($descriptif)
    {
        $this->__load();
        return parent::setDescriptif($descriptif);
    }

    public function getDescriptif()
    {
        $this->__load();
        return parent::getDescriptif();
    }

    public function setTexte($texte)
    {
        $this->__load();
        return parent::setTexte($texte);
    }

    public function getTexte()
    {
        $this->__load();
        return parent::getTexte();
    }

    public function addRubrique(\PiApp\AdminBundle\Entity\Rubrique $childrens)
    {
        $this->__load();
        return parent::addRubrique($childrens);
    }

    public function getChildrens()
    {
        $this->__load();
        return parent::getChildrens();
    }

    public function setParent(\PiApp\AdminBundle\Entity\Rubrique $parent)
    {
        $this->__load();
        return parent::setParent($parent);
    }

    public function getParent()
    {
        $this->__load();
        return parent::getParent();
    }

    public function setTreeParents(array $parents)
    {
        $this->__load();
        return parent::setTreeParents($parents);
    }

    public function getTreeParents()
    {
        $this->__load();
        return parent::getTreeParents();
    }

    public function getRoot()
    {
        $this->__load();
        return parent::getRoot();
    }

    public function getLevel()
    {
        $this->__load();
        return parent::getLevel();
    }

    public function getLeft()
    {
        $this->__load();
        return parent::getLeft();
    }

    public function getRight()
    {
        $this->__load();
        return parent::getRight();
    }

    public function addKeyWord(\PiApp\AdminBundle\Entity\KeyWord $keywords)
    {
        $this->__load();
        return parent::addKeyWord($keywords);
    }

    public function setKeyWords($keywords)
    {
        $this->__load();
        return parent::setKeyWords($keywords);
    }

    public function getKeywords()
    {
        $this->__load();
        return parent::getKeywords();
    }

    public function setLft($lft)
    {
        $this->__load();
        return parent::setLft($lft);
    }

    public function getLft()
    {
        $this->__load();
        return parent::getLft();
    }

    public function setLvl($lvl)
    {
        $this->__load();
        return parent::setLvl($lvl);
    }

    public function getLvl()
    {
        $this->__load();
        return parent::getLvl();
    }

    public function setRgt($rgt)
    {
        $this->__load();
        return parent::setRgt($rgt);
    }

    public function getRgt()
    {
        $this->__load();
        return parent::getRgt();
    }

    public function setRoot($root)
    {
        $this->__load();
        return parent::setRoot($root);
    }

    public function setCreatedAt($createdAt)
    {
        $this->__load();
        return parent::setCreatedAt($createdAt);
    }

    public function getCreatedAt()
    {
        $this->__load();
        return parent::getCreatedAt();
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->__load();
        return parent::setUpdatedAt($updatedAt);
    }

    public function getUpdatedAt()
    {
        $this->__load();
        return parent::getUpdatedAt();
    }

    public function setArchiveAt($archiveAt)
    {
        $this->__load();
        return parent::setArchiveAt($archiveAt);
    }

    public function getArchiveAt()
    {
        $this->__load();
        return parent::getArchiveAt();
    }

    public function setEnabled($enabled)
    {
        $this->__load();
        return parent::setEnabled($enabled);
    }

    public function getEnabled()
    {
        $this->__load();
        return parent::getEnabled();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'parent', 'childrens', 'lft', 'lvl', 'rgt', 'root', 'keywords', 'titre', 'descriptif', 'texte', 'created_at', 'updated_at', 'archive_at', 'enabled');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}