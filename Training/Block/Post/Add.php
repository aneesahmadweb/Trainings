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
     * Prepare layout.
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        // Call parent _prepareLayout() method
        parent::_prepareLayout();

        // Add custom layout updates
        // Example 1: Add a new block to the layout
        // $this->getLayout()->createBlock('Vendor\Module\Block\CustomBlock')->setTemplate('Vendor_Module::custom_template.phtml');

        // Example 2: Add a new container to the layout
        // $container = $this->getLayout()->createBlock('Magento\Framework\View\Element\Template')->setTemplate('Vendor_Module::custom_container.phtml');
        // $this->setChild('custom_container', $container);

        // Add additional layout preparation code here

        // Add custom CSS files
        // $this->getLayout()->getBlock('head')->addCss('css/custom.css');

        // Add custom JavaScript files
       // $this->getLayout()->getBlock('head')->addJs('js/custom.js');

        // Set page title
        $this->pageConfig->getTitle()->set(__('Blog'));

        // Set meta tags
       // $this->pageConfig->setDescription(__('Custom Page Description'));
       // $this->pageConfig->setKeywords(__('Custom, Keywords'));

        // Set custom breadcrumbs
        $breadcrumbs = $this->getLayout()->getBlock('breadcrumbs');
        $breadcrumbs->addCrumb('home', ['label' => __('Home'), 'title' => __('Go to Home Page'), 'link' => $this->_storeManager->getStore()->getBaseUrl()]);
        $breadcrumbs->addCrumb('Blog', ['label' => __('Blog'), 'title' => __('Blog')]);



        return $this;
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
