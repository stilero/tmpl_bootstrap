<?php
/**
 * Bootstrap
 *
 * @version  1.0
 * @package Stilero
 * @subpackage Bootstrap
 * @author Daniel Eliasson (joomla@stilero.com)
 * @copyright  (C) 2013-feb-12 Stilero Webdesign (www.stilero.com)
 * @license	GNU General Public License version 2 or later.
 * @link http://www.stilero.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 

class BootstrapTemplateHelper{
    
    static $fullSpan = 12;
    
    static function spanSize($moduleCount){
        if($moduleCount == 0){
            return 0;
        }
        $spanSize = self::$fullSpan / $moduleCount;
        $roundedSpanSize = round($spanSize);
        $roundedSpanSize = $roundedSpanSize == 0 ? 1 : $roundedSpanSize;
        return (int)$roundedSpanSize;
    }
    
    static function sidebarSpanSize($hasSidebarA, $hasSidebarB){
        if(!$hasSidebarA && !$hasSidebarB){
            return 0;
        }
        return 3 * ( (int)$hasSidebarA + (int)$hasSidebarB );
    }
}
