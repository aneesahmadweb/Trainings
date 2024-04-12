<?php

namespace Anees\Training\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Blog extends AbstractDb
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

