<?php
class Qixol_Promo_Block_Adminhtml_Bannerboxes_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

    public function __construct() {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'qixol';
        $this->_controller = 'adminhtml_bannerboxes';

        $this->_updateButton('save', 'label', Mage::helper('qixol')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('qixol')->__('Delete Item'));

        $this->_addButton('saveandcontinue', array(
            'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
                ), -100);

        $this->_formScripts[] = "

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }

        ";
    }

    public function getHeaderText() {
        if (Mage::registry('bannerbox_data') && Mage::registry('bannerbox_data')->getId()) {
            return Mage::helper('qixol')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('bannerbox_data')->getTitle()));
        } else {
            return Mage::helper('qixol')->__('Add Item');
        }
    }

}