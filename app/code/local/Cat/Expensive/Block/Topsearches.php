<?php
class Cat_Expensive_Block_Topsearches
    extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{
    protected function _toHtml()
    {
        $products_count = $this->getData("products_count");
        $productCollection = Mage::getModel('catalog/product')
            ->getCollection()
            ->addAttributeToSort('price', 'DESC')
            ->addAttributeToFilter('visibility', 4)
            ->addAttributeToSelect('*')
            ->setOrder('price', 'desc');
        $productCollection->getSelect()->limit($products_count);
        $html = '<div class="widget-expensive-block">' ;
        $html .= '<p class="widget-expensive-title">The Most Expensive Products</p>' ;

        foreach($productCollection as $product){
            $html .=  "<a href='".$product->getProductUrl()."'>".$product->getName()."</a></br>";
        }
        $html .= '</div>';
        return $html;

    }

};