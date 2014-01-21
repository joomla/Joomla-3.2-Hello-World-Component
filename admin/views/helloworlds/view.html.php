<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HelloWorlds View
 */
class HelloWorldViewHelloWorlds extends JViewLegacy
{
	/**
	 * HelloWorlds view display method
	 *
	 * @param   string $tpl The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise a JError object.
	 */
	function display($tpl = null)
	{
		// Get data from the model
		$items      = $this->get('Items');
		$pagination = $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}
		// Assign data to the view
		$this->items      = $items;
		$this->pagination = $pagination;

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar()
	{
		JToolBarHelper::title(JText::_('COM_HELLOWORLD_MANAGER_HELLOWORLDS'));
		JToolBarHelper::deleteList('', 'helloworlds.delete');
		JToolBarHelper::editList('helloworld.edit');
		JToolBarHelper::addNew('helloworld.add');
	}
}