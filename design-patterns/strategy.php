<?php
interface PaymentInterface{
    public function amount();
}
class CashPayment implements PaymentInterface{
    public function amount():string{
        return "1000MMK";
    }
}

class MobilePayment implements PaymentInterface{
    public function amount():string{
        $amount = 1000 - ((1000 *20)/100);
        return $amount."MMK";
    }
}
class Payment{
    private $paymentMethod;

    public function payment($method){
        switch($method){
            case 'cash':
                $this->paymentMethod = new CashPayment();
                break;
            case 'mobile':
                    $this->paymentMethod = new MobilePayment();
                    break;
            default:
                $this->paymentMethod = new CashPayment();
                break;
        }

        return $this->paymentMethod->amount();
    }
}

$payment =new Payment();
$amount = $payment->payment('mobile');

echo $amount;
interface Car{
    public function pickCar();
}
class FitCar implements Car{
    public function pickCar(){
        return "Fit Car is picked today";
    }
}

class VitzCar implements Car{
    public function pickCar(){
        return "Vitz Car is picked today";
    }
}
class CarPicker{
    public $date;

    public function __construct($date)
    {
        $this->date = $date;
    }

    public function pick(){
        $car = null;
        switch($this->date){
            case 'Monday':
                $car = new FitCar();
                break;
            case 'Sunday':
                $car = new VitzCar();
                break;
            default:
                $car = new FitCar();
                break;
        
        }

        return $car->pickCar();
    }
}

$car = new CarPicker('Sunday');
echo "<pre>";
var_dump($car->pick());