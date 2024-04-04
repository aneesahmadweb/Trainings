<?php

namespace Anees\Training\Block;;

use Magento\Framework\View\Element\Template;

class Index extends Template
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
     * Example method in custom block
     *
     * @return string
     */
    public function getCustomMessage()
    {
        return __('This is a custom message from your block.');
    }
}
