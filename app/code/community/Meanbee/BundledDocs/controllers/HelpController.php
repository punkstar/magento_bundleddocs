<?php
class Meanbee_BundledDocs_HelpController extends Mage_Adminhtml_Controller_Action {
    public function viewAction() {
        $this->loadLayout();
        $this->renderLayout();
    }
}