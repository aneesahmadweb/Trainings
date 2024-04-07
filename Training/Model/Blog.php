<?php

namespace Anees\Training\Model;

use Magento\Framework\Model\AbstractModel;

class Blog extends AbstractModel
{
    /**
     * Entity Id
     */
    const ENTITY_ID = 'entity_id';

    /**
     * Cache tag
     */
    const CACHE_TAG = 'anees_training_blog';

    /**
     * Dependency Initialization
     *
     * @return void
     */
    public function _construct()
    {
        parent::_construct();
        $this->_init(\Anees\Training\Model\ResourceModel\Blog::class);
    }

    /**
     * Get Id
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set Id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::ENTITY_ID, $id);
    }
}
