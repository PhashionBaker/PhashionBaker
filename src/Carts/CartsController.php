<?php
namespace \PhashionBaker\Carts;

class CartsController{
  public function postCatalogItem(){
    //Get Quantity
    //Scope Stores with params
    //Query InventoryItems
    //Group By Warehouse
    //Warn if not enough quantity
    //Get Cart
    //Create Entries
    //Validate Cart
  }
  public function putCatalogItem($id){
    //Lookup CartItem
    //Validate Inventory Availability
    //Update Quantity
    //Get Cart
    //Validate Cart
  }
  public function deleteCatalogItem($id){
    //remove catalog item
    //get cart
    //Validate Cart
  }
  private function getCart($id){
    //return card by Id
  }
  private function validateCart(Carts &$cart){
    //Run through CartItems
      //Validate Availability
      //Check delivery methods
    //group into locations and delivery methods
    //get rates for every location and delivery method
    //validate discounts
    return $cart;
  }
  private function validatePromotions(Carts &$cart){
    //Get automatically applied discounts
    //Get coupons
    //Apply discounts
    return $cart;
  }
}
