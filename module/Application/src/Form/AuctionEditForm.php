<?php
namespace Application\Form;

use Zend\Form\Form;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilter;
use Application\Model\Auction;

/**
 * This form is used to collect user's login, password and 'Remember Me' flag.
 */
class AuctionEditForm extends Form
{
    private $_auction;
    public function __construct(Auction $elem)
    {
        $this->_auction = $elem;

        // Define form name
        parent::__construct('auctionedit-form');
     
        // Set POST method for this form
        $this->setAttribute('method', 'post');
        
        $this->addElements();
        
    }
    

    protected function addElements() 
    {
        $this->add([            
            'type'  => 'text',
            'name' => 'item',
            'options' => [
                'label' => 'Item',
            ],
        ]);
        
        $this->add([            
            'type'  => 'text',
            'name' => 'bid',
            'options' => [
                'label' => 'Enchere',
            ],
        ]);
        
        $this->add([            
            'type'  => 'text',
            'name' => 'buyout',
            'options' => [
                'label' => 'Immediat',
            ],
        ]);

        $this->add([            
            'type'  => 'text',
            'name' => 'quantity',
            'options' => [
                'label' => 'Quantite',
            ],
        ]);
        
        $this->add([
            'type'  => 'submit',
            'name' => 'submit',
            'attributes' => [                
                'value' => 'Sign in',
                'id' => 'submit',
            ],
        ]);
    }      
}

