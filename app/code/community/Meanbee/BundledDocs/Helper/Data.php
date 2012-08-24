<?php
class Meanbee_BundledDocs_Helper_Data extends Mage_Core_Helper_Data {
    public function getDocumentationFile($module, $page) {
        return join(DS, array(
            Mage::getModuleDir('docs', $module),
            'docs',
            $this->_sanitiseFilepath($page)
        ));
    }

    protected function _sanitiseFilepath($path) {
        return str_replace(array(
            '..'
        ), '', $path);
    }
}