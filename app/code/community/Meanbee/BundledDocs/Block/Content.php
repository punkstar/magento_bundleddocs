<?php
/**
 * @method getDocumentationFilePath()
 * @method setDocumentationFilePath(string $filePath)
 */

class Meanbee_BundledDocs_Block_Content extends Mage_Adminhtml_Block_Abstract {

    public function getDocumentationFileContents() {
        if (file_exists($this->getDocumentationFilePath())) {
            ob_start();

            include $this->getDocumentationFilePath();

            $html = ob_get_clean();

            return $html;
        } else {
            return false;
        }
    }

    /**
     * Implement a lightweight version of parent::fetchView($fileName).
     *
     * @return string
     */
    public function _toHtml() {
        if ($this->getIsDocumentationTemplate() && $this->getTemplate()) {
            if (file_exists($this->getTemplate())) {
                ob_start();

                include $this->getTemplate();

                $html = ob_get_clean();

                return $html;
            } else {
                return $this->__('Documentation file not found');
            }
        } else {
            return parent::_toHtml();
        }
    }
}