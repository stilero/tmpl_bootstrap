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
$app = JFactory::getApplication();
//JHtml::_('behavior.framework', true);
$hasTop = $this->countModules('top');
$hasLogo = $this->countModules('logo');
$hasToolbarL = $this->countModules('toolbar-l');
$hasToolbarR = $this->countModules('toolbar-r');
$showToolbar = ($hasToolbarL || $hasToolbarR)? TRUE : FALSE;
$spanLogo = 12 / ($hasLogo + $hasToolbarL + $hasToolbarR);
$hasTopA = $this->countModules('top-a');
$hasTopB = $this->countModules('top-b');
$showTop = ($hasTop || $hasLogo || $hasToolbarL || $hasToolbarR || $hasTopA || $hasTopB) ? TRUE : FALSE;
$hasMenu = $this->countModules('menu');
$hasBreadcrumbs = $this->countModules('breadcrumbs');
$hasBanner = $this->countModules('banner');
$hasInnerTop = $this->countModules('innertop');
$hasSidebarA = $this->countModules('sidebar-a');
$hasSidebarB = $this->countModules('sidebar-b');
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
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/assets/css/bootstrap.css" type="text/css" />
    </head>
    <body>
         <script src="http://code.jquery.com/jquery.js"></script>
        <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript">
                jQuery.noConflict();
        </script>
        <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/assets/js/dropdown.js"></script>
        <?php if($showTop){ ?>
            
            <div class="container-fluid">
                <?php if($hasLogo): ?>
                    <div class="span<?php echo $spanLogo;?>">
                        <div id="logo">
                            <jdoc:include type="modules" name="logo" />
                        </div>
                    </div>
                <?php endif; //endif hasLogo ?>
                <?php if($hasToolbarL): ?>
                    <div class="span<?php echo $spanLogo;?>">
                        <div id="toolbar-l">
                            <jdoc:include type="modules" name="toolbar-l" />
                        </div>
                    </div>
                <?php endif; //endif hasLogo ?>
                <?php if($hasToolbarR): ?>
                    <div class="span<?php echo $spanLogo;?>">
                        <div id="toolbar-r  ">
                            <jdoc:include type="modules" name="toolbar-r" />
                        </div>
                    </div>
                <?php endif; //endif hasLogo ?>
            </div>
        
        
        <div id="top">
             <jdoc:include type="modules" name="top" />

              <?php if($hasTopA){ ?>
             <div id="top-a">
                  <jdoc:include type="modules" name="top-a" />
             </div>
             <?php } ?>
              <?php if($hasTopB){ ?>
             <div id="top-b">
                  <jdoc:include type="modules" name="top-b" />
             </div>
             <?php } ?>
        </div>
        <?php }//End if showTop ?>
        <?php if($hasMenu){ ?>
            <div class="navbar">
                <div class="navbar-inner">
                        <jdoc:include type="modules" name="menu" />
                </div>
            </div>
        <?php } ?>
        <?php if($hasBreadcrumbs){ ?>
        <div id="breadcrumbs">
            <jdoc:include type="modules" name="breadcrumbs" />
        </div>
        <?php } ?>
        <?php if($hasBanner){ ?>
        <div id="banner">
            <jdoc:include type="modules" name="banner" />
        </div>
        <?php } ?>
        <div class="container">
            <jdoc:include type="message" style="bootstrapError" />
            <?php if($hasInnerTop){ ?>
            <div id="innertop">
                <jdoc:include type="modules" name="innertop" />
            </div>
            <?php } ?>
            <?php if($showSidebar){ ?>
            <div id="sidebar">
                <?php if($hasSidebarA){ ?>
                <div id="sidebar-a">
                    <jdoc:include type="modules" name="sidebar-a" />
                </div>
                <?php } ?>
                <?php if($hasSidebarB){ ?>
                <div id="sidebar-b">
                    <jdoc:include type="modules" name="sidebar-b" />
                </div>
                <?php } ?>
            </div>
            <?php } ?>
            <jdoc:include type="component" />
            <?php if($hasInnerBottom){ ?>
            <div id="innerbottom">
                <jdoc:include type="modules" name="innerbottom" />
            </div>
            <?php } ?>
        </div>
        <?php if($showBottom){ ?>
        <div id="bottom">
            <?php if($hasBottomA){ ?>
           <div id="bottom-a">
            <jdoc:include type="modules" name="bottom-a" />
            </div>
            <?php } ?>
            <?php if($hasBottomB){ ?>
            <div id="bottom-b">
                <jdoc:include type="modules" name="bottom-b" />
            </div> 
            <?php } ?>
        </div>
        <?php } ?>
        <?php if($hasFooter){ ?>
        <div id="footer">
            <jdoc:include type="modules" name="footer" />
        </div>
        <?php }?>
        <jdoc:include type="modules" name="debug" />
    </body>
</html>