<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Set some global property
$document = JFactory::getDocument();
$document->addStyleDeclaration('.icon-helloworld {background-image: url(' . JURI::root() . 'media/com_helloworld/images/tux-48x48.png);width: 48px;
height: 48px;}');

// import joomla controller library
jimport('joomla.application.component.controller');

// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('HelloWorld');

// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

// Redirect if set by the controller
$controller->redirect();