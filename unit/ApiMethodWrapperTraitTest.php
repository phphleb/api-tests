<?php

// Start  phpunit vendor/phphleb/api-tests/unit/Src/ApiMethodWrapperTraitTest.php

// Если загрузчик не нашёл класс
if (!class_exists('ApiExampleTestController')) {
    require_once __DIR__ . '/../src/ApiExampleTestController.php';
}

use PHPUnit\Framework\TestCase;

class ApiMethodWrapperTraitTest extends TestCase
{
    // Проверка, что отрабатывает правильный метод (этого метода нет в контроллере он будет перенаправлен).
    public function testController01()
    {
        $controller = new ApiExampleTestController();

        $this->assertTrue($controller->testMethod() === 'actionTestMethod');
    }

    // Проверка, что отрабатывает правильный метод (обычные методы должны остаться рабочими).
    public function testController02()
    {
        $controller = new ApiExampleTestController();

        $this->assertTrue($controller->testExampleMethod() === 'testExampleMethod');
    }


}