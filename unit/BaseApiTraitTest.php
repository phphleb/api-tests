<?php

declare(strict_types = 1);

class BaseApiTraitTest extends \Phphleb\TestO\TestCase
{
    use \Phphleb\ApiMultitool\BaseApiTrait;

    private array $request = [
          'name1' => null,
          'name2' => '1234567890',
          'name3' => ['a1' => '1234567890'],
          'name4' => 123456789,
        ];
    private array $rules = [
        'name1' => 'required',
        'name2' => 'required|type:string|minlength:10',
        '[name3][a1]' => 'required|type:string|minlength:10',
        'name4' => 'required|type:int|min:10',
        'name5' => 'type:int|min:10',

    ];

    private array $errorRequest = [
        'name1' => null,
        'name2' => '1234', // Недостаточная длина
        'name3' => ['a1' => '1234567890'],
        'name4' => null, // Другой тип

    ];

    // Проверка, что валидация работает комплексно
    public function testComprehensiveValidationCheck(): void
    {
        $result = $this->check($this->request, $this->rules);

        $this->assertTrue($result);
    }

    // Проверка возврата ошибки
    public function testReturnOneSpecificErrorCheck(): void
    {
        $result = $this->check($this->errorRequest, $this->rules);
        $errors = $this->getErrorCells();

        $this->assertTrue($errors === ['name2']);
    }

    // Проверка возврата множественных ошибок
    public function testMultipleErrorReturnCheck(): void
    {
        $result = $this->check($this->errorRequest, $this->rules, '', false);
        $errors = $this->getErrorCells();

        $this->assertTrue($errors === ['name2', 'name4']);
    }
}