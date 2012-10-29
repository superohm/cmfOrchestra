<?php

namespace Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class PiAppGedmoBundleEntityOrganigramProxy extends \PiApp\GedmoBundle\Entity\Organigram implements \Doctrine\ORM\Proxy\Proxy
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

    public function setUpdatedValue()
    {
        $this->__load();
        return parent::setUpdatedValue();
    }

    public function getId()
    {
        $this->__load();
        return parent::getId();
    }

    public function getSlug()
    {
        $this->__load();
        return parent::getSlug();
    }

    public function setPage($page)
    {
        $this->__load();
        return parent::setPage($page);
    }

    public function getPage()
    {
        $this->__load();
        return parent::getPage();
    }

    public function setCategory($category)
    {
        $this->__load();
        return parent::setCategory($category);
    }

    public function getCategory()
    {
        $this->__load();
        return parent::getCategory();
    }

    public function setCategoryother($category)
    {
        $this->__load();
        return parent::setCategoryother($category);
    }

    public function getCategoryother()
    {
        $this->__load();
        return parent::getCategoryother();
    }

    public function setTitle($title)
    {
        $this->__load();
        return parent::setTitle($title);
    }

    public function getTitle()
    {
        $this->__load();
        return parent::getTitle();
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

    public function setContent($content)
    {
        $this->__load();
        return parent::setContent($content);
    }

    public function getContent()
    {
        $this->__load();
        return parent::getContent();
    }

    public function setQuestion($question)
    {
        $this->__load();
        return parent::setQuestion($question);
    }

    public function getQuestion()
    {
        $this->__load();
        return parent::getQuestion();
    }

    public function setMedia($media)
    {
        $this->__load();
        return parent::setMedia($media);
    }

    public function getMedia()
    {
        $this->__load();
        return parent::getMedia();
    }

    public function getChildrens()
    {
        $this->__load();
        return parent::getChildrens();
    }

    public function setParent(\PiApp\GedmoBundle\Entity\Organigram $parent)
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

    public function setPublishedAt($publishedAt)
    {
        $this->__load();
        return parent::setPublishedAt($publishedAt);
    }

    public function getPublishedAt()
    {
        $this->__load();
        return parent::getPublishedAt();
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

    public function setPosition($position)
    {
        $this->__load();
        return parent::setPosition($position);
    }

    public function getPosition()
    {
        $this->__load();
        return parent::getPosition();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'translations', 'id', 'slug', 'category', 'categoryother', 'title', 'descriptif', 'question', 'content', 'page', 'media', 'parent', 'childrens', 'lft', 'rgt', 'lvl', 'root', 'created_at', 'updated_at', 'published_at', 'archive_at', 'enabled', 'position');
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