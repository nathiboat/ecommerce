<?php

namespace App\Cart;

use Money\Money as BaseMoney;
use Money\Formatter\IntlMoneyFormatter;
use Money\Currencies\ISOCurrencies;

class Money
{
    protected $money;


    public function __construct($value)
    {
        $this->money = BaseMoney::GBP($value);
    }

    public function formatted()
    {
        $formatter = new IntlMoneyFormatter(
            new \NumberFormatter('en_GB', \NumberFormatter::CURRENCY),
            new ISOCurrencies()
        );

        return $formatter->format($this->money);
    }
}