<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.5
 */

defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
?>
<div class="login<?php echo $this->pageclass_sfx?>">
    <?php if ($this->params->get('show_page_heading')) : ?>
    <h1>
        <?php echo $this->escape($this->params->get('page_heading')); ?>
    </h1>
    <?php endif; ?>
    <?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
        <div class="login-description">
    <?php endif ; ?>
    <?php if($this->params->get('logindescription_show') == 1) : ?>
        <?php echo $this->params->get('login_description'); ?>
    <?php endif; ?>
    <?php if (($this->params->get('login_image')!='')) :?>
        <img src="<?php echo $this->escape($this->params->get('login_image')); ?>" class="login-image" alt="<?php echo JTEXT::_('COM_USER_LOGIN_IMAGE_ALT')?>"/>
    <?php endif; ?>
    <?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
        </div>
    <?php endif ; ?>
    <form class="form-horizontal" action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post">
        <div class="control-group">
            <label class="control-label" for="inputEmail"><?php echo JText::_('JGLOBAL_USERNAME') ?></label>
            <div class="controls">
                <input type="text" id="inputEmail" name="username" size="18" placeholder="Email">
            </div>
        </div>
	<div class="control-group">
            <label class="control-label" for="inputPassword"><?php echo JText::_('JGLOBAL_PASSWORD') ?></label>
            <div class="controls">
                <input type="password" name="password" id="inputPassword" placeholder="Password" size="18">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
                    <label class="checkbox">
                        <input type="checkbox" name="remember" value="yes" alt="<?php echo JText::_('JGLOBAL_REMEMBER_ME') ?>" /> <?php echo JText::_('JGLOBAL_REMEMBER_ME') ?>
                    </label>
                <?php endif; ?>
                <button type="submit" class="btn"><?php echo JText::_('JLOGIN'); ?></button>
            </div>
        </div>
        <input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('login_redirect_url', $this->form->getValue('return'))); ?>" />
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>
<ul class="nav nav-pills">
    <li>
        <a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
            <?php echo JText::_('COM_USERS_LOGIN_RESET'); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
            <?php echo JText::_('COM_USERS_LOGIN_REMIND'); ?>
        </a>
    </li>
    <?php
    $usersConfig = JComponentHelper::getParams('com_users');
    if ($usersConfig->get('allowUserRegistration')) : ?>
        <li>
            <a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
                <?php echo JText::_('COM_USERS_LOGIN_REGISTER'); ?>
            </a>
            </a>
        </li>
    <?php endif; ?>
</ul>

