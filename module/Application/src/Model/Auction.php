<?php
namespace Application\Model;

class Auction {
    public $_update;
    public $_auc;
    public $_item;
    public $_bid;
    public $_buyout;
    public $_quantity;
    public $_timeLeft;

    public function __construct(){

    }

    public function exchangeArray($data) { 
        $this->_auc = (!empty($data['auc'])) ? $data['auc'] : null; 
        $this->_update = (!empty($data['update'])) ? $data['update'] : null; 
        $this->_item = (!empty($data['item'])) ? $data['item'] : null; 
        $this->_bid = (!empty($data['bid'])) ? $data['bid'] : null; 
        $this->_buyout = (!empty($data['buyout'])) ? $data['buyout'] : null; 
        $this->_quantity = (!empty($data['quantity'])) ? $data['quantity'] : null; 
        $this->_timeLeft = (!empty($data['timeLeft'])) ? $data['timeLeft'] : null; 
    }

    public function toValues(){
        return [
            'auc' => $this->_auc,
            'update' => $this->_update,
            'item' => $this->_item,
            'bid' => $this->_bid,
            'buyout' => $this->_buyout,
            'quantity' => $this->_quantity,
            'timeLeft' => $this->_timeLeft
        ];
    }
}
?>