<?php

namespace Anees\Training\Model;

class Blog extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    /**
     * No route page id.
     */
    const NOROUTE_ENTITY_ID = 'no-route';

    /**
     * Entity Id
     */
    const ENTITY_ID = 'entity_id';

    /**
     *  cache tag.
     */
    const CACHE_TAG = 'webkul_blogmanager_blog';

    /**
     * @var string
     */
    protected $_cacheTag = 'webkul_blogmanager_blog';

    /**
     * @var string
     */
    protected $_eventPrefix = 'webkul_blogmanager_blog';

    /**
     * Dependency Initilization
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init( \Anees\Training\Model\ResourceModel\Blog::class);
    }

    /**
     * Load object data.
     *
     * @param int $id
     * @param string|null $field
     * @return $this
     */
    public function load(int $id, $field = null)
    {
        if ($id === null) {
            return $this->noRoute();
        }
        return parent::load($id, $field);
    }

    /**
     * No Route
     *
     * @return $this
     */
    public function noRoute()
    {
        return $this->load(self::NOROUTE_ENTITY_ID, $this->getIdFieldName());
    }

    /**
     * Get Identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG.'_'.$this->getId()];
    }

    /**
     * Get Id
     *
     * @return int|null
     */
    public function getId()
    {
        return parent::getData(self::ENTITY_ID);
    }

    /**
     * Set Id
     *
     * @param int $id
     *
     */
    public function setId($id)
    {
        return $this->setData(self::ENTITY_ID, $id);
    }
}

