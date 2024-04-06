<?php

 namespace Anees\Training\Block\Post;


 use Magento\Framework\View\Element\Template;

 class Add extends Template
 {
     /**
      * Constructor
      *
      * @param \Magento\Framework\View\Element\Template\Context $context
      * @param array $data
      */
     public function __construct(
         \Magento\Framework\View\Element\Template\Context $context,
         array $data = []
     ) {
         parent::__construct($context, $data);
     }

     /**
      * Get the action URL for the form
      *
      * @return string
      */
     public function getFormAction()
     {
         // Replace 'anees/training/addpost' with the actual route of your controller
         return $this->getUrl('training/post/addpost');
     }
 }
