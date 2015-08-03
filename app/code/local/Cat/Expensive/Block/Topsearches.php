<?php
class Cat_Expensive_Block_Topsearches
    extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{
    public function getExpensiveProducts()
    {

        $products_count = $this->getData("products_count");
        $productCollection = Mage::getModel('catalog/product')
            ->getCollection()
            ->addAttributeToSort('price', 'DESC')
            ->addAttributeToFilter('visibility', 4)
            ->addAttributeToSelect('*')
            ->setOrder('price', 'desc');
        $productCollection->getSelect()->limit($products_count);
        return $productCollection;
    }

};