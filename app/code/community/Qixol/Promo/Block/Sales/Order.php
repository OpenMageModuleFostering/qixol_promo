<?php
//????????????????
class Qixol_Promo_Block_Adminhtml_Sales_Order extends Mage_Sales_Block_Order_Totals
{
   protected function _initTotals() {

     parent::_initTotals();
        $amt = $this->getSource()->getPointsAmount();
        $baseAmt = $this->getSource()->getBasePointsAmount();
        if ($amt != 0) {
            $this->addTotal(new Varien_Object(array(
                        'code' => 'points',
                        'value' => $amt,
                        'base_value' => $baseAmt,
                        'label' => 'Reward points discount',
                    )), 'points');
        }
        return $this;
    }	
}