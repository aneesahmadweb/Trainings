<?php

namespace Anees\Training\Block\Post;

use Anees\Training\Model\ResourceModel\Blog\Collection;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Lists extends Template
{

    private $collections;


    /**
     * Constructor
     *
     * @param Context $context
     * @param array $data
         * @param Collection $collection

     */
    public function __construct(
        Context $context,
        Collection $collections,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->collections = $collections;
    }

    /**
     * Example method in custom block
     *
     * @return string
     */
    public function getCustomMessage()
    {
        return __('This is a custom message from your block.');
    }

    public function getcoll(){

       return $this->collections;
    }
}
