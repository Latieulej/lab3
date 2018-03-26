<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Application\Model\Auction;
use Application\Services\AuctionTable;
use Application\Form\AuctionEditForm;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    private $_table;

    public function __construct(AuctionTable $table)
    {
        $this->_table = $table;
    }

    public function indexAction() {
        return new ViewModel([
            'auctions' => $this->_table->fetchAll(),
        ]);
    }

    public function editAction() 
    {
        $id = (int)$this->params()->fromRoute('id', -1);
        if ($id<1) {
            $this->getResponse()->setStatusCode(404);
            return;
        }
        
        $auction = $this->_table->find($id);
        
        if ($auction == null) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        $form = new AuctionEditForm($auction);
        
        if ($this->getRequest()->isPost()) {
            $data = $this->params()->fromPost();            
            
            $form->setData($data);
            $update =[
                'item' => $data['item'],
                'bid' => $data['bid'],
                'buyout' => $data['buyout'],
                'quantity' => $data['quantity'],
            ];
            $this->_table->update($auction, $update);
            
            return $this->redirect()->toRoute('index');                             
        } else {
            $form->setData([
                    'item'=>$auction->_item,
                    'bid'=>$auction->_bid,
                    'buyout'=>$auction->_buyout,
                    'quantity'=>$auction->_quantity,
                ]);
        }
        
        return new ViewModel(array(
            'auction' => $auction,
            'form' => $form
        ));
    }
}

?>