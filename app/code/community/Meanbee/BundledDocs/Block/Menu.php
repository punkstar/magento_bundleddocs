<?php
class Meanbee_BundledDocs_Block_Menu extends Mage_Adminhtml_Block_Abstract {
    public function getDocumentedModules() {

        $documentation_result = array();

        $docs_tags = Mage::getConfig()->getXpath('//config/docs');

        foreach ($docs_tags as $docs_tag) {
            /** @var $docs_tag Mage_Core_Model_Config_Element */

            if ($docs_tag->hasChildren()) {
                foreach ($docs_tag->children() as $module) {
                    /** @var $module Mage_Core_Model_Config_Element */

                    $module_name = $module->getName();
                    $module_title = (string) $module->title;

                    $documentation_result[$module_name] = array(
                        'title' => $module_title,
                        'pages' => array()
                    );

                    foreach ($module->pages->children() as $page) {
                        $documentation_result[$module_name]['pages'][(string) $page->file] = (string) $page->title;
                    }
                }
            }
        }

        return $documentation_result;
    }

    public function getDocumentationUrl($module, $page) {
        return $this->getUrl('*/*/*', array(
            'module' => $module,
            'page' => $page
        ));
    }
}