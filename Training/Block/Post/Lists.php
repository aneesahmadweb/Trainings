<?php

namespace Anees\Training\Block\Post;

use Anees\Training\Model\ResourceModel\Blog\Collection;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Lists extends Template
{

    private $collections;
  static $pagerCounter;

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
     * @return $this
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('My Blog List'));

        $this->pageConfig->setPageLayout('1column'); // Set the page layout to full width

        if($this->getcoll()){


            // Create a unique pager block ID using a counter
            $pagerId = 'reward_history_pager_' . self::$pagerCounter++;

            // Create pager block using $records
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                $pagerId
            )->setAvailableLimit(array(3=>3,10=>10,15=>15,20=>20))
                ->setShowPerPage(true)->setCollection(
                    $this->getcoll()
                );
            $this->setChild($pagerId, $pager);
            $this->getcoll()->load();
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPagerHtml()
    {
        // Retrieve the unique pager block ID dynamically
        $pagerId = 'reward_history_pager_' . (self::$pagerCounter - 1);

        // Return the HTML of the pager block with the unique ID
        return $this->getChildHtml($pagerId);
    }
    /**
     * @return Collection
     */
    public function getcoll(){

       return $this->collections;
    }
}
