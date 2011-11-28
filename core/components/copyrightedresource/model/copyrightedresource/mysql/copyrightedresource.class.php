<?php
/**
 * @package copyrightedresource
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/copyrightedresource.class.php');
class CopyrightedResource_mysql extends CopyrightedResource {}