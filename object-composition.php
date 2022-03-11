<?php

class Subscription{
    protected BillGateway $gateway;

    public function __construct(BillGateway $gateway){
        $this->gateway = $gateway;
    }
   

    public function subscribe(){

    }

    public function cancel(){
        $this->gateway->findSubscriptionUser();
        echo "Subscription is cancel";
    }

    public function swap(){

    }
}
interface BillGateway{
    public function findSubscriptionUser();
}

class StripeGateway implements BillGateway{
    public function findSubscriptionUser(){
       echo "Finding stripe user";
    }
}


class PaypalGateway implements BillGateway{
    public function findSubscriptionUser(){
       echo "Finding paypal user";
    }
}


$subscription = new Subscription(new PaypalGateway());

//option2
// class BillableSubscription extends Subscription{
//     protected function findStringSubscriptedUser(){

//     }
// }

echo $subscription->cancel();