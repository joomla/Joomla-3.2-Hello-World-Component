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

		// Set the toolbar and number of found items
		$this->addToolBar($this->pagination->total);

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar($total=null)
	{
		JToolBarHelper::title(JText::_('COM_HELLOWORLD_MANAGER_HELLOWORLDS') .
			//Reflect number of items in title!
			($total ? ' <span style="font-size: 0.75em; vertical-align: middle;">(' . $total . ')</span>' : '')
			, 'helloworld');
		JToolBarHelper::deleteList('', 'helloworlds.delete');
		JToolBarHelper::editList('helloworld.edit');
		JToolBarHelper::addNew('helloworld.add');
	}

	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument()
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_HELLOWORLD_ADMINISTRATION'));
	}
}