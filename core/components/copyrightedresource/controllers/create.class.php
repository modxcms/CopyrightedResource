<?php
class CopyrightedResourceCreateManagerController extends ResourceCreateManagerController {

    public function getLanguageTopics() {
        return array('resource','copyrightedresource:default');
    }
}