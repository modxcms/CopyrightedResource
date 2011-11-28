<?php
/**
 * @package copyrightedresource
 */
class CopyrightedResource extends modResource {
    public $showInContextMenu = true;
    
    function __construct(xPDO & $xpdo) {
        parent :: __construct($xpdo);
        $this->set('class_key','CopyrightedResource');
    }

    public static function getControllerPath(xPDO &$modx) {
        return $modx->getOption('copyrightedresource.core_path',null,$modx->getOption('core_path').'components/copyrightedresource/').'controllers/';
    }

    public function getContextMenuText() {
        $this->xpdo->lexicon->load('copyrightedresource:default');
        return array(
            'text_create' => $this->xpdo->lexicon('copyrightedresource'),
            'text_create_here' => $this->xpdo->lexicon('copyrightedresource_create_here'),
        );
    }

    public function getResourceTypeName() {
        $this->xpdo->lexicon->load('copyrightedresource:default');
        return $this->xpdo->lexicon('copyrightedresource');
    }
}