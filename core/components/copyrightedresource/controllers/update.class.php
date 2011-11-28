<?php
class CopyrightedResourceUpdateManagerController extends ResourceUpdateManagerController {

    public function getLanguageTopics() {
        return array('resource','copyrightedresource:default');
    }
}