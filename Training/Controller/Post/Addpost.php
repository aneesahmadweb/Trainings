<?php
namespace Anees\Training\Controller\Post;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Response\RedirectInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Data\Form\FormKey\Validator as FormKeyValidator;

class Addpost extends Action
{
    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @var ManagerInterface
     */
    protected $messageManager;

    /**
     * @var ResultFactory
     */
    protected $resultFactory;

    /**
     * @var RedirectInterface
     */
    protected $_redirect; // Change access level to protected

    /**
     * @var FormKeyValidator
     */
    protected $formKeyValidator;

    /**
     * Addpost constructor.
     *
     * @param Context           $context
     * @param PageFactory       $pageFactory
     * @param ManagerInterface  $messageManager
     * @param ResultFactory     $resultFactory
     * @param RedirectInterface $_redirect
     * @param FormKeyValidator  $formKeyValidator
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        ManagerInterface $messageManager,
        ResultFactory $resultFactory,
        RedirectInterface $_redirect,
        FormKeyValidator $formKeyValidator
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->messageManager = $messageManager;
        $this->resultFactory = $resultFactory;
        $this->_redirect = $_redirect;
        $this->formKeyValidator = $formKeyValidator;
    }


    /**
     * Index Action
     *
     * @return Redirect|Page
     */
    public function execute()
    {
        // Validate form key
        if (!$this->formKeyValidator->validate($this->getRequest())) {
            $this->messageManager->addError(__('Invalid form key'));
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl($this->_redirect->getRefererUrl()); // Redirect back to the same page
            return $resultRedirect;
        }

            // Get form data
            $formData = $this->getRequest()->getParams();
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl($this->_redirect->getRefererUrl()); // Redirect back to the same page


            return $resultRedirect;
    }
}
