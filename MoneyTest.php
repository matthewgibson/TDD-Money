<?php
require_once('Dollar.php');
require_once('Franc.php');

 class MoneyTest extends \PHPUnit_Framework_TestCase {
    public function testMultiplication()
    {
        $five = Money::dollar(5);
        $this->assertEquals(Money::dollar(10), $five->times(2));
        $this->assertEquals(Money::dollar(15), $five->times(3));
    }
    public function testEquality()
    {
    	$five1 = Money::dollar(5);
    	$five2 = Money::dollar(5);
    	$this->assertTrue($five1->equals($five2));
    	$six = Money::dollar(6);
    	$this->assertFalse($five1->equals($six));
        $frfive1 = Money::franc(5);
        $frfive2 = Money::franc(5);
        $this->assertTrue($frfive1->equals($frfive2));
        $frsix = Money::franc(6);
        $this->assertFalse($frfive1->equals($frsix));
        $this->assertFalse($five1->equals($frfive1));
    }
    public function testFrancMultiplication()
    {
    	$five = Money::franc(5);
    	$this->assertEquals(Money::franc(10), $five->times(2));
    	$this->assertEquals(Money::franc(15), $five->times(3));
    }
	public function testCurrency()
	{
	    $dollar = Money::dollar(1);
	    $franc = Money::franc(1);
        $this->assertEquals("USD", $dollar->currency());
	    $this->assertEquals("CHF", $franc->currency());
    }
    public function testDifferentClassEquality()
    {
        $money = new Money(8, "CHF");
        $this->assertTrue($money->equals(new Franc(8, "CHF")));
    }
}
