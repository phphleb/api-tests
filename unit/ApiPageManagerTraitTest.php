<?php

// Start  phpunit vendor/phphleb/api-tests/unit/KeyApiPageManagerTraitTest.php

use Phphleb\ApiMultitool\Src\PageIntervalDto;
use PHPUnit\Framework\TestCase;

class ApiPageManagerTraitTest extends TestCase
{
    use \Phphleb\ApiMultitool\Src\ApiPageManagerTrait;

    // Проверка, что возвращается правильный объект.
    public function testPageInterval01()
    {
        $interval = $this->getPageInterval(1, 10, 100);

        $this->assertTrue($interval instanceof PageIntervalDto);
    }

    // Проверка, что возвращает правильную страницу
    public function testPageInterval02()
    {
        $interval = $this->getPageInterval(1, 10, 100);

        $this->assertTrue($interval->getPage() === 1);
    }

    // Проверка, что возвращает правильную страницу с 0
    public function testPageInterval03()
    {
        $interval = $this->getPageInterval(0, 10, 100);

        $this->assertTrue($interval->getPage() === 1);
    }

    // Проверка, что возвращает правильную страницу
    public function testPageInterval04()
    {
        $interval = $this->getPageInterval(10, 10, 100);

        $this->assertTrue($interval->getPage() === 10);
    }

    // Проверка, что возвращает правильное количество
    public function testPageInterval05()
    {
        $interval = $this->getPageInterval(1, 10, 100);

        $this->assertTrue($interval->getCount() === 10);
    }

    // Проверка, что возвращает правильное количество по умолчанию
    public function testPageInterval06()
    {
        $interval = $this->getPageInterval(1);

        $this->assertTrue($interval->getCount() === 20);
    }

    // Проверка, что возвращает правильное установленное количество по умолчанию
    public function testPageInterval07()
    {
        $this->setApiBoxMaxCountPerPage(10);

        $interval = $this->getPageInterval(1);

        $this->setApiBoxMaxCountPerPage(20);

        $this->assertTrue($interval->getCount() === 10);
    }

    // Проверка, что возвращает правильное установленное количество
    public function testPageInterval08()
    {
        $this->setApiBoxMaxCountPerPage(10);

        $this->assertTrue($this->getApiBoxMaxCountPerPage() === 10);
    }

    // Проверка, что возвращает правильное начальное число
    public function testPageInterval09()
    {
        $interval = $this->getPageInterval(1, 5, 13);

        $this->assertTrue($interval->getStart() === 0);
    }

    // Проверка, что возвращает правильное конечное число
    public function testPageInterval10()
    {
        $interval = $this->getPageInterval(1, 5, 13);

        $this->assertTrue($interval->getEnd() === 5);
    }

    // Проверка, что возвращает правильное начальное число стр 2
    public function testPageInterval11()
    {
        $interval = $this->getPageInterval(2, 5, 130);

        $this->assertTrue($interval->getStart() === 5);
    }

    // Проверка, что возвращает правильное начальное число стр 2
    public function testPageInterval12()
    {
        $interval = $this->getPageInterval(2, 5, 130);

        $this->assertTrue($interval->getEnd() === 10);
    }

    // Проверка, что возвращает правильное конечное число на стр 1
    public function testPageInterval13()
    {
        $interval = $this->getPageInterval(1, 5, 4);

        $this->assertTrue($interval->getEnd() === 4);
    }

    // Проверка, что возвращает правильное начальное число на стр 1
    public function testPageInterval14()
    {
        $interval = $this->getPageInterval(1, 5, 4);

        $this->assertTrue($interval->getStart() === 0);
    }

    // Проверка, что возвращает правильное начальное число на стр 2
    public function testPageInterval15()
    {
        $interval = $this->getPageInterval(2, 5, 4);

        $this->assertTrue($interval->getStart() === 4);
    }

    // Проверка, что возвращает правильное число при превышении максимума
    public function testPageInterval16()
    {
        $interval = $this->getPageInterval(2, 25, 4);

        $this->assertTrue($interval->getCount() === 20);
    }

    // Проверка, что возвращает правильное наальное число при превышении максимума
    public function testPageInterval17()
    {
        $interval = $this->getPageInterval(1, 25, 60);

        $this->assertTrue($interval->getEnd() === 20);
    }

    // Проверка, что возвращает правильное конечное число на стр 1
    public function testPageInterval18()
    {
        $interval = $this->getPageInterval(5, 5, 20);

        $this->assertTrue($interval->getEnd() === 20);
    }

    // Проверка, что возвращает правильное начальное число на стр 1
    public function testPageInterval19()
    {
        $interval = $this->getPageInterval(5, 5, 20);

        $this->assertTrue($interval->getStart() === 20);
    }

    // Проверка, что возвращает правильный offset
    public function testPageInterval20()
    {
        $interval = $this->getPageInterval(3, 5, 130);

        $this->assertTrue($interval->getOffset() === 10);
    }

    // Проверка, что возвращает правильный limit
    public function testPageInterval21()
    {
        $interval = $this->getPageInterval(3, 5, 130);

        $this->assertTrue($interval->getLimit() === 5);
    }

}