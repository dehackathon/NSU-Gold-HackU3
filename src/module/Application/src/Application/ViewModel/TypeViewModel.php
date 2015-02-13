<?php
namespace Application\ViewModel;

use Zend\View\Model\ViewModel;

class TypeViewModel extends ViewModel
{
    public function __construct($type)
    {
        $this->setTemplate('partials/calendar/' . $type . '.phtml');
        $this->setTerminal(true);
    }
}