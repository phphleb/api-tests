<?php

declare(strict_types = 1);

class ApiMethodWrapperTraitTest extends \Phphleb\TestO\TestCase
{
    public function __construct()
    {
        if (!class_exists('ApiExampleTestController')) {
            require_once __DIR__ . '/../src/ApiExampleTestController.php';
        }
    }

    // Проверка, что отрабатывает правильный метод (этого метода нет в контроллере он будет перенаправлен).
    public function testController01(): void
    {
        $controller = new ApiExampleTestController();

        $this->assertTrue($controller->testMethod() === 'actionTestMethod');
    }

    // Проверка, что отрабатывает правильный метод (обычные методы должны остаться рабочими).
    public function testController02(): void
    {
        $controller = new ApiExampleTestController();

        $this->assertTrue($controller->testExampleMethod() === 'testExampleMethod');
    }


}