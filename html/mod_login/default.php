<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_login
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
?>
<?php if ($type == 'logout') : ?>
    <form class="form-horizontal" action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form">
        <?php if ($params->get('greeting')) : ?>
            <div class="login-greeting">
            <?php if($params->get('name') == 0) : {
                echo JText::sprintf('MOD_LOGIN_HINAME', htmlspecialchars($user->get('name')));
            } else : {
                echo JText::sprintf('MOD_LOGIN_HINAME', htmlspecialchars($user->get('username')));
            } endif; ?>
            </div>
        <?php endif; ?>
        <div class="logout-button">
            <input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGOUT'); ?>" />
            <input type="hidden" name="option" value="com_users" />
            <input type="hidden" name="task" value="user.logout" />
            <input type="hidden" name="return" value="<?php echo $return; ?>" />
            <?php echo JHtml::_('form.token'); ?>
        </div>
    </form>
<?php else : ?>
    <form class="form-horizontal" action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form" >
        <?php if ($params->get('pretext')): ?>
            <div class="well">
                <?php echo $params->get('pretext'); ?>
            </div>
        <?php endif; ?>
        <div class="control-group">
            <label class="control-label" for="inputEmail"><?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?></label>
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
                        <input type="checkbox" name="remember" value="yes"> <?php echo JText::_('MOD_LOGIN_REMEMBER_ME') ?>
                    </label>
                <?php endif; ?>
                <button type="submit" name="Submit" class="btn"><?php echo JText::_('JLOGIN') ?></button>
            </div>
        </div>
	<input type="hidden" name="option" value="com_users" />
	<input type="hidden" name="task" value="user.login" />
	<input type="hidden" name="return" value="<?php echo $return; ?>" />
	<?php echo JHtml::_('form.token'); ?>
            <div class="btn-group">
                <button class="btn">
                    <a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
			<?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_PASSWORD'); ?>
                    </a>
                </button>
                <button class="btn">
                    <a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
			<?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_USERNAME'); ?>
                    </a>
                </button>
                <?php
		$usersConfig = JComponentHelper::getParams('com_users');
		if ($usersConfig->get('allowUserRegistration')) : ?>
                    <button class="btn">
                        <a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
				<?php echo JText::_('MOD_LOGIN_REGISTER'); ?>
                        </a>
                    </button>
                <?php endif; ?>
            </div>
	<?php if ($params->get('posttext')): ?>
		<div class="well">
                    <?php echo $params->get('posttext'); ?>
		</div>
	<?php endif; ?>
</form>
<?php endif; ?>
