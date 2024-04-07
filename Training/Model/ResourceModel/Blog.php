<?php

namespace Anees\Training\Model\ResourceModel;

class Blog extends \Magento\Framework\Model\ResourceModel\b\AbstractDb
{
    /**
     * Dependency Initilization
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init("training_blog", "entity_id");
    }
}
