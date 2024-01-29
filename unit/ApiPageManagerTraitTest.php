<?php

declare(strict_types = 1);

use Phphleb\ApiMultitool\Src\PageIntervalDto;

class ApiPageManagerTraitTest extends \Phphleb\TestO\TestCase
{
    use \Phphleb\ApiMultitool\Src\ApiPageManagerTrait;

    public function __construct()
    {
        if (!class_exists(PageIntervalDto::class)) {
            require_once __DIR__ . '/../../api-multitool/Src/PageIntervalDto.php';
        }
    }

    // Проверка, что возвращается правильный объект.
    public function testPageInterval01(): void
    {
        $interval = $this->getPageInterval(1, 10, 100);

        $this->assertTrue($interval instanceof PageIntervalDto);
    }

    // Проверка, что возвращает правильную страницу
    public function testPageInterval02(): void
    {
        $interval = $this->getPageInterval(1, 10, 100);

        $this->assertTrue($interval->getPage() === 1);
    }

    // Проверка, что возвращает правильную страницу с 0
    public function testPageInterval03(): void
    {
        $interval = $this->getPageInterval(0, 10, 100);

        $this->assertTrue($interval->getPage() === 1);
    }

    // Проверка, что возвращает правильную страницу
    public function testPageInterval04(): void
    {
        $interval = $this->getPageInterval(10, 10, 100);

        $this->assertTrue($interval->getPage() === 10);
    }

    // Проверка, что возвращает правильное количество
    public function testPageInterval05(): void
    {
        $interval = $this->getPageInterval(1, 10, 100);

        $this->assertTrue($interval->getCount() === 10);
    }

    // Проверка, что возвращает правильное количество по умолчанию
    public function testPageInterval06(): void
    {
        $interval = $this->getPageInterval(1);

        $this->assertTrue($interval->getCount() === 20);
    }

    // Проверка, что возвращает правильное установленное количество по умолчанию
    public function testPageInterval07(): void
    {
        $this->setApiBoxMaxCountPerPage(10);

        $interval = $this->getPageInterval(1);

        $this->setApiBoxMaxCountPerPage(20);

        $this->assertTrue($interval->getCount() === 10);
    }

    // Проверка, что возвращает правильное установленное количество
    public function testPageInterval08(): void
    {
        $this->setApiBoxMaxCountPerPage(10);

        $this->assertTrue($this->getApiBoxMaxCountPerPage() === 10);
    }

    // Проверка, что возвращает правильное начальное число
    public function testPageInterval09(): void
    {
        $interval = $this->getPageInterval(1, 5, 13);

        $this->assertTrue($interval->getStart() === 0);
    }

    // Проверка, что возвращает правильное конечное число
    public function testPageInterval10(): void
    {
        $interval = $this->getPageInterval(1, 5, 13);

        $this->assertTrue($interval->getEnd() === 5);
    }

    // Проверка, что возвращает правильное начальное число стр 2
    public function testPageInterval11(): void
    {
        $interval = $this->getPageInterval(2, 5, 130);

        $this->assertTrue($interval->getStart() === 5);
    }

    // Проверка, что возвращает правильное начальное число стр 2
    public function testPageInterval12(): void
    {
        $interval = $this->getPageInterval(2, 5, 130);

        $this->assertTrue($interval->getEnd() === 10);
    }

    // Проверка, что возвращает правильное конечное число на стр 1
    public function testPageInterval13(): void
    {
        $interval = $this->getPageInterval(1, 5, 4);

        $this->assertTrue($interval->getEnd() === 4);
    }

    // Проверка, что возвращает правильное начальное число на стр 1
    public function testPageInterval14(): void
    {
        $interval = $this->getPageInterval(1, 5, 4);

        $this->assertTrue($interval->getStart() === 0);
    }

    // Проверка, что возвращает правильное начальное число на стр 2
    public function testPageInterval15(): void
    {
        $interval = $this->getPageInterval(2, 5, 4);

        $this->assertTrue($interval->getStart() === 4);
    }

    // Проверка, что возвращает правильное число при превышении максимума
    public function testPageInterval16(): void
    {
        $interval = $this->getPageInterval(2, 25, 4);

        $this->assertTrue($interval->getCount() === 10);
    }

    // Проверка, что возвращает правильное начальное число при превышении максимума
    public function testPageInterval17(): void
    {
        $interval = $this->getPageInterval(1, 25, 60);

        $this->assertTrue($interval->getEnd() === 10);
    }

    // Проверка, что возвращает правильное конечное число на стр 1
    public function testPageInterval18(): void
    {
        $interval = $this->getPageInterval(5, 5, 20);

        $this->assertTrue($interval->getEnd() === 20);
    }

    // Проверка, что возвращает правильное начальное число на стр 1
    public function testPageInterval19(): void
    {
        $interval = $this->getPageInterval(5, 5, 20);

        $this->assertTrue($interval->getStart() === 20);
    }

    // Проверка, что возвращает правильный offset
    public function testPageInterval20(): void
    {
        $interval = $this->getPageInterval(3, 5, 130);

        $this->assertTrue($interval->getOffset() === 10);
    }

    // Проверка, что возвращает правильный limit
    public function testPageInterval21(): void
    {
        $interval = $this->getPageInterval(3, 5, 130);

        $this->assertTrue($interval->getLimit() === 5);
    }

}