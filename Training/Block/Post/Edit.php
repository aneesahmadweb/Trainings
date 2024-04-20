<?php

namespace Anees\Training\Block\Post;

use Magento\Framework\View\Element\Template;
use Anees\Training\Model\BlogFactory;

class Edit extends Template
{
    /**
     * @var array
     */
    public $BlogFactory;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,BlogFactory $BlogFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->BlogFactory = $BlogFactory;

    }

    /**
     * Example method in custom block
     *
     * @return string
     */
    public function getBlog()
    {
         /*  get parameter id */
        $blogid= $this->getRequest()->getParam('id');

        return $this->BlogFactory->create()->load($blogid);

    }

    public function getFormAction(){

        return $this->getUrl('training/post/addpost');



    }
}
