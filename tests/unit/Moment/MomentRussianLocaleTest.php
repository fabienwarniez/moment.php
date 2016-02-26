<?php

namespace Moment;

class MomentRussianLocaleTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        Moment::setLocale('ru_RU');
    }

    public function testFormat()
    {
        $a = [
            ['l, F d Y, g:i:s a',                  'воскресенье, 14-го февраля 2010, 15:25:50'],
            ['D, gA',                              'вс, 3 дня'],
            ['n m F M',                            '2 2-й 02 февраль фев'],
            ['Y y',                                '2010 10'],
            ['j d',                                '14-го 14']
        ];
        $b = new Moment('2010-01-14 15:25:50');
        for ($i = 0; $i < count($a); $i++) {
            $this->assertEquals($a[$i][1], $b->format($a[$i][0]), $a[$i][0] . ' ---> ' . $a[$i][1]);
        }
    }
}
