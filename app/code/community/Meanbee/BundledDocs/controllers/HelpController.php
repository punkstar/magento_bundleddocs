<?php
class Meanbee_BundledDocs_HelpController extends Mage_Adminhtml_Controller_Action {
    public function viewAction() {
        $this->loadLayout();

        $this->_setActiveMenu('system/docs');
        $this->getLayout()->getBlock('head')->setTitle("Extension Documentation");

        if ($this->getRequest()->getParam('module') && $this->getRequest()->getParam('page')) {
            $module = $this->getRequest()->getParam('module');
            $page = $this->getRequest()->getParam('page');

            /** @var $content_block Meanbee_BundledDocs_Block_Content */
            $content_block = $this->getLayout()->getBlock('meanbee.bundleddocs.content');

            if ($content_block) {
                $content_block->setDocumentationFilePath(
                    $this->getHelper()->getDocumentationFile($module, $page)
                );
            } else {
                Mage::throwException('Meanbee_BundledDocs: Documentation content block not found in layout');
            }
        }

        $this->renderLayout();
    }

    /**
     * @return Meanbee_BundledDocs_Helper_Data
     */
    public function getHelper() {
        return Mage::helper('docs');
    }
}
