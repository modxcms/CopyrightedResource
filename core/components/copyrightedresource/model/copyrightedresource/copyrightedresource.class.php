<?php
require_once MODX_CORE_PATH.'model/modx/modprocessor.class.php';
require_once MODX_CORE_PATH.'model/modx/processors/resource/create.class.php';
require_once MODX_CORE_PATH.'model/modx/processors/resource/update.class.php';
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

    public function getContent(array $options = array()) {
        $content = parent::getContent($options);
        $year = date('Y');
        $content .= '<div class="copyright">&copy; '.$year.'. All Rights Reserved.</div>';
        return $content;
    }
}


class CopyrightedResourceCreateProcessor extends modResourceCreateProcessor {
}

class CopyrightedResourceUpdateProcessor extends modResourceUpdateProcessor {
    /**
     * Do any processing before the fields are set
     * @return boolean
     */
    public function beforeSet() {
        $beforeSet = parent::beforeSet();
        /**
        if ($this->getProperty('shouldBeTrue') == false) {
          $this->addFieldError('fieldname','The error message');
        }
        */

        return $beforeSet;
    }

    /**
     * Do any processing before the save of the Resource but after fields are set.
     * @return boolean
     */
    public function beforeSave() {
        $beforeSave = parent::beforeSave();
        if ($this->object->get('longtitle') == 'Send an Error') {
            $this->addFieldError('longtitle','Specify a different longtitle!');
        }
        return $beforeSave;
    }

    /**
     * Do any custom after save processing
     * @return boolean
     */
    public function afterSave() {
        $afterSave = parent::afterSave();
        $this->modx->log(modX::LOG_LEVEL_DEBUG,'Saving a Copyrighted Page!');
        return $afterSave;
    }
}