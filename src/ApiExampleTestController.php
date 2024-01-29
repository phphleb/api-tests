<?php

declare(strict_types = 1);

/**
 * Шаблон для тестирования API в контроллере.
 */

class ApiExampleTestController
{
    use \Phphleb\ApiMultitool\Src\ApiMethodWrapperTrait;

    public function actionTestMethod() {
        return 'actionTestMethod';
    }

    public function testExampleMethod() {
        return 'testExampleMethod';
    }

    public function error($e, $code = 500) {
        return ['error' => $e, 'code' => $code];
    }

}