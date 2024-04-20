<?php
namespace Anees\Training\Controller\Post;



use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Anees\Training\Model\BlogFactory;

/**
 * Class Edit
 * @package Anees\Training\Controller\Post
 */
class Edit extends Action
{
    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @var
     */
    public $BlogFactory;


    /**
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(Context $context, PageFactory $pageFactory, BlogFactory $blogFactory,
                                \Psr\Log\LoggerInterface $logger )
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->context = $context;
        $BlogFactory = $blogFactory;
        $this->BlogFactory = $BlogFactory;
        $this->logger = $logger;
    }

    /**
     * Index Action
     *
     * @return Page
     */
    public function execute()
    {

        $page = $this->pageFactory->create();
        return $page;

    }

    }
