<?php
//avoids primitive obession - and readability
//helps with consistency
//Immuatable
//Benefits of creating value object

//USD =>MMK
class Price{
    const USD = 'USD';
    const MMK = 'MMK';

    public function __construct(private float $amount,private string $fromCurrency,private string $toCurrency){
        if($amount < 0){
            throw new InvalidArgumentException('That make no sense! You must give positive numbers.');
        }

        $this->checkAvailableCurrency();
       
        $this->amount = $amount;
        $this->toCurrency = $toCurrency;
        $this->fromCurrency = $fromCurrency;
    }

    public function getAmount(){
        return $this->amount;
    }

    public function getToCurrency(){
        return $this->toCurrency;
    }
    public function getFromCurrency(){
        return $this->fromCurrency;
    }

    private function getAvailableCurrencies(): array{
        return [self::USD,self::MMK];
    }

    private function checkAvailableCurrency(){
        if(!in_array($this->toCurrency,$this->getAvailableCurrencies())){
            throw new InvalidArgumentException("$this->toCurrency is not available in our application");
        }

        if(!in_array($this->fromCurrency,$this->getAvailableCurrencies())){
            throw new InvalidArgumentException("$this->fromCurrency is not available in our application");
        }

    }
}
function currencyConverter(Price $price){
    $one_usd_to_mmk = 1780;
    
    if($price->getToCurrency() == 'USD'){
        echo "<br/>";
        echo $price->getAmount() / $one_usd_to_mmk;
    }

    if($price->getToCurrency() == 'MMK'){
        echo "<br/>";
        echo $price->getAmount() * $one_usd_to_mmk;
    }
}

try{
    currencyConverter(new Price(1000,'MMK','USD'));
    currencyConverter(new Price(2,'USD','MMK'));
}catch(InvalidArgumentException $e){
    echo $e->getMessage();
}