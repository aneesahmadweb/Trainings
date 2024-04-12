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
use Anees\Training\Model\BlogFactory;

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
    protected $redirect;

    /**
     * @var FormKeyValidator
     */
    protected $formKeyValidator;

    /**
     * @var BlogFactory
     */
    protected $blogFactory;

    /**
     * Addpost constructor.
     *
     * @param Context           $context
     * @param PageFactory       $pageFactory
     * @param ManagerInterface  $messageManager
     * @param ResultFactory     $resultFactory
     * @param RedirectInterface $redirect
     * @param FormKeyValidator  $formKeyValidator
     * @param BlogFactory       $blogFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        ManagerInterface $messageManager,
        ResultFactory $resultFactory,
        RedirectInterface $redirect,
        FormKeyValidator $formKeyValidator,
        BlogFactory $blogFactory
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->messageManager = $messageManager;
        $this->resultFactory = $resultFactory;
        $this->redirect = $redirect;
        $this->formKeyValidator = $formKeyValidator;
        $this->blogFactory = $blogFactory;
    }

    /**
     * Execute action
     *
     * @return Redirect
     */
    public function execute()
    {
        try {
            // Validate form key
            if (!$this->formKeyValidator->validate($this->getRequest())) {
               $this->messageManager->addError('sdf');

            }

            // Get form data
            $formData = $this->getRequest()->getParams();

          /*  $name = $this->request->getParam('title', 'петро');*/


            // Save data to database
            $model = $this->blogFactory->create();
            $model->setData($formData);
            $model->save();

            // Display success message
            $this->messageManager->addSuccess(__('Data saved successfully'));
        } catch (LocalizedException $e) {
            // Display error message
            $this->messageManager->addError($e->getMessage());
        } catch (\Exception $e) {
            // Display generic error message
            $this->messageManager->addError(__('An error occurred while saving data'));
        }

        // Redirect back to the same page
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->redirect->getRefererUrl());
        return $resultRedirect;
    }
}
