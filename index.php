<?php
/**
 * Joomla Template - Bootstrap
 *
 * @version  1.0
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2013-feb-08 Stilero Webdesign http://www.stilero.com
 * @category Templates
 * @license	GPLv2
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 
define('BOOTSTRAP_TEMPLATE_PATH', JPATH_THEMES.DS.$this->template.DS);
JLoader::register('BootstrapTemplateHelper', BOOTSTRAP_TEMPLATE_PATH.'helpers'.DS.'helper.php');
$app = JFactory::getApplication();
//JHtml::_('behavior.framework', true);
$hasTop = $this->countModules('top');
$hasLogo = $this->countModules('logo');
$hasToolbar = $this->countModules('toolbar');
$showToolbar = ($hasToolbar)? TRUE : FALSE;
$spanLogo = BootstrapTemplateHelper::spanSize($hasLogo + $hasToolbar);
$showHeader = ($hasTop || $hasLogo || $hasToolbar) ? TRUE : FALSE;
// TOP
$hasTopA = $this->countModules('top-a');
$spanTopA = BootstrapTemplateHelper::spanSize($this->countModules('top-a'));
$spanTopB = BootstrapTemplateHelper::spanSize($this->countModules('top-b'));
$hasTopB = $this->countModules('top-b');
$showTop = ($hasTopA || $hasTopB) ? TRUE : FALSE;
//HEADER
$hasMenu = $this->countModules('menu');
$hasBreadcrumbs = $this->countModules('breadcrumbs');
$hasInnerTop = $this->countModules('innertop');
//SIDEBAR
$hasSidebarA = $this->countModules('sidebar-a') > 0? true : false;
$hasSidebarB = $this->countModules('sidebar-b') > 0? true : false;
$sidebarSpan = BootstrapTemplateHelper::sidebarSpanSize($hasSidebarA, $hasSidebarB);
$componentSpan = BootstrapTemplateHelper::$fullSpan - $sidebarSpan;
$showSidebar = ($hasSidebarA || $hasSidebarB) ? TRUE : FALSE;
$hasInnerBottom = $this->countModules('innerbottom');
$hasBottomA = $this->countModules('bottom-a');
$hasBottomB = $this->countModules('bottom-b');
$showBottom = ($hasBottomA || $hasBottomB) ? TRUE : FALSE;
$hasFooter = $this->countModules('footer');

require_once JPATH_ROOT .'/templates/'. $this->template .'/html/message.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
    <head>
        <meta charset="utf-8">
        <jdoc:include type="head" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/assets/css/template.css" type="text/css" />
    </head>
    <body>
         <script src="http://code.jquery.com/jquery.js"></script>
        <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript">
                jQuery.noConflict();
        </script>
        <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/assets/js/dropdown.js"></script>
        <?php if($showHeader): ?>
            <div class="container">
                <div class="row-fluid">
                    <?php if($hasLogo): ?>
                        <div class="span3">
                            <div id="logo">
                                <jdoc:include type="modules" name="logo" />
                            </div>
                        </div>
                    <?php endif; //endif hasLogo ?>
                    <?php if($hasToolbar): ?>
                        <div class="span9">
                            <div id="toolbar">
                                <jdoc:include type="modules" name="toolbar" style="bootstrap" />
                            </div>
                        </div>
                    <?php endif; //endif hasToolbar ?>
                </div>
            </div>
        <?php endif;//End if showHeader ?>
        <?php if($hasMenu): ?>
            <div class="container">
                <div class="navbar">
                    <div class="navbar-inner">
                        <jdoc:include type="modules" name="menu" />
                    </div>
                </div>
            </div>
        <?php endif; //Has Menu ?>
        <?php if($showTop): ?>
            <div class="container">
                <div class="row-fluid">
                    <div id="top">
                        <?php if($hasTopA): ?>
                            <div id="top-a">
                                <jdoc:include type="modules" name="top-a" style="bootstrap" />
                            </div>
                        <?php endif;//hasTopA ?>
                        <?php if($hasTopB): ?>
                            <div id="top-b">
                                <jdoc:include type="modules" name="top-b" style="bootstrap" />
                            </div>
                        <?php endif;//hasTopB ?>
                    </div>
                </div>
            </div>
        <?php endif; //ShowTop ?>
        <?php if($hasBreadcrumbs): ?>
        <div class="container">
            <div id="breadcrumbs">
                <jdoc:include type="modules" name="breadcrumbs" />
            </div>
        </div>
        <?php endif; //hasBreadcrumbs ?>
        <div class="container">
            <div class="row-fluid">
                <?php if($hasSidebarA): ?>
                    <div class="span3">
                        <div id="sidebar-a">
                            <jdoc:include type="modules" name="sidebar-a" />
                        </div>
                    </div>
                <?php endif; //has sidebarA ?>
                <div class="span<?php echo $componentSpan; ?>">
                    <?php if($hasInnerTop): ?>
                        <div class="row">
                            <div id="innertop">
                                <jdoc:include type="modules" name="innertop" style="bootstrap" />
                            </div>
                        </div>
                    <?php endif; //innerTop ?>
                    <section id="contents">
                        <jdoc:include type="message" />
                        <jdoc:include type="component" />
                    </section>
                    <?php if($hasInnerBottom): ?>
                        <div class="row">
                            <div id="innerbottom">
                                <jdoc:include type="modules" name="innerbottom" style="bootstrap" />
                            </div>
                        </div>
                    <?php endif; //innerTop ?>
                </div>
                 <?php if($hasSidebarB): ?>
                    <div class="span3">
                        <div id="sidebar-b">
                            <jdoc:include type="modules" name="sidebar-b" />
                        </div>
                    </div>
                <?php endif; //has sidebarB ?>
            </div>
        </div>
        <div class="container">
            <?php if($hasFooter): ?>
            <div class="row-fluid">
                <div id="footer">
                    <jdoc:include type="modules" name="footer" style="bootstrap"/>
                </div>
            </div>
            <?php endif; //footer ?>
        </div>
        <jdoc:include type="modules" name="debug" />
    </body>
</html>