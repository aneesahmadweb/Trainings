<?php
namespace Anees\Training\Model\ResourceModel\Blog;

use Anees\Training\Model\ResourceModel\Blog;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     *
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * Dependency Initilization
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(
            \Anees\Training\Model\Blog::class,
            \Anees\Training\Model\ResourceModel\Blog::class
        );
        $this->_map['fields']['entity_id'] = 'main_table.entity_id';
    }
}


