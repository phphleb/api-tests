<?php

declare(strict_types = 1);

class ApiRequestDataManagerTraitTest extends \Phphleb\TestO\TestCase
{
    use \Phphleb\ApiMultitool\Src\ApiRequestDataManagerTrait;

    // Проверка, что возвращается правильный результат.
    public function testCheckData01(): void
    {
        $result = $this->check(['name1' => 100], ['name1' => 'required']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный результат при required.
    public function testCheckData02(): void
    {
        $result = $this->check([], ['name1' => 'required']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный результат без required.
    public function testCheckData03(): void
    {
        $result = $this->check([], ['name1' => 'type:string']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный результат type.
    public function testCheckData04(): void
    {
        $result = $this->check(['name1' => 'text'], ['name1' => 'type:string']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный результат type.
    public function testCheckData05(): void
    {
        $result = $this->check(['name1' => 100], ['name1' => 'type:string']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильная ошибка поля с type.
    public function testCheckData06(): void
    {
        $result = $this->check(['name1' => 100], ['name1' => 'type:string']);

        $this->assertTrue(count($this->getErrorCells()) === 1 && $this->getErrorCells()[0] === 'name1');
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData07(): void
    {
        $result = $this->check(['name1' => "1234567890"], ['name1' => 'required|type:string|minlen:5']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData08(): void
    {
        $result = $this->check(['name1' => "1234"], ['name1' => 'required|type:string|minlen:5']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData09(): void
    {
        $result = $this->check(['name1' => "1234567890"], ['name1' => 'required|type:string|minlength:5']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData10(): void
    {
        $result = $this->check(['name1' => "1234"], ['name1' => 'required|type:string|minlength:5']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData11(): void
    {
        $result = $this->check(['name1' => "1234567890"], ['name1' => 'required|type:string|maxlength:5']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData12()
    {
        $result = $this->check(['name1' => "12345"], ['name1' => 'required|type:string|maxlength:5']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData13(): void
    {
        $result = $this->check(['name1' => "1234567890"], ['name1' => 'required|type:string|maxlen:5']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData14(): void
    {
        $result = $this->check(['name1' => "12345"], ['name1' => 'required|type:string|maxlen:5']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData15(): void
    {
        $result = $this->check(['name1' => "123"], ['name1' => 'required|type:string|maxlen:5|minlen:2']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData16(): void
    {
        $result = $this->check(['name1' => "1"], ['name1' => 'required|type:string|maxlen:5|minlen:2']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData17(): void
    {
        $result = $this->check(['name1' => "1234567890"], ['name1' => 'required|type:string|maxlen:5|minlen:2']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и длине строки.
    public function testCheckData18(): void
    {
        $result = $this->check(['name1' => "1234567890"], ['name1' => 'required|type:string|maxlen:5|minlen:2']);

        $this->assertTrue(count($this->getErrorCells()) === 1 && $this->getErrorCells()[0] === 'name1');
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData19()
    {
        $result = $this->check(['name1' => 1234567890], ['name1' => 'required|type:int']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData20(): void
    {
        $result = $this->check(['name1' => 1234567890], ['name1' => 'required|type:integer']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData21(): void
    {
        $result = $this->check(['name1' => "1234567890"], ['name1' => 'required|type:int']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData22()
    {
        $result = $this->check(['name1' => "1234567890"], ['name1' => 'required|type:integer']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допуску.
    public function testCheckData23(): void
    {
        $result = $this->check(['name1' => 1234567890], ['name1' => 'required|type:integer|min:100500']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допуску.
    public function testCheckData24(): void
    {
        $result = $this->check(['name1' => 100], ['name1' => 'required|type:integer|min:100500']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допуску.
    public function testCheckData25(): void
    {
        $result = $this->check(['name1' => 0], ['name1' => 'required|type:integer|min:100500']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допуску.
    public function testCheckData26(): void
    {
        $result = $this->check(['name1' => -100500], ['name1' => 'required|type:integer|min:100500']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допуску.
    public function testCheckData27(): void
    {
        $result = $this->check(['name1' => -100], ['name1' => 'required|type:integer|min:-100500']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допускам.
    public function testCheckData28(): void
    {
        $result = $this->check(['name1' => 150], ['name1' => 'required|type:integer|min:100|max:200']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допускам.
    public function testCheckData29(): void
    {
        $result = $this->check(['name1' => 90], ['name1' => 'required|type:integer|min:100|max:200']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допускам.
    public function testCheckData30(): void
    {
        $result = $this->check(['name1' => 220], ['name1' => 'required|type:integer|min:100|max:200']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допускам.
    public function testCheckData31(): void
    {
        $result = $this->check(['name1' => 0], ['name1' => 'required|type:integer|min:100|max:200']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допускам.
    public function testCheckData32(): void
    {
        $result = $this->check(['name1' => null], ['name1' => 'required|type:integer|min:-100|max:200']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData33(): void
    {
        $result = $this->check(['name1' => null], ['name1' => 'required|type:null']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData34()
    {
        $result = $this->check(['name1' => 0], ['name1' => 'required|type:null']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData35(): void
    {
        $result = $this->check(['name1' => ""], ['name1' => 'required|type:null']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData36(): void
    {
        $result = $this->check(['name1' => " "], ['name1' => 'required|type:null']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData37(): void
    {
        $result = $this->check(['name1' => []], ['name1' => 'required|type:null']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData38(): void
    {
        $result = $this->check(['name1' => new \ErrorException('test')], ['name1' => 'required|type:null']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData39(): void
    {
        $result = $this->check(['name1' => ''], ['name1' => 'required|type:void']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData40(): void
    {
        $result = $this->check(['name1' => '123'], ['name1' => 'required|type:void']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData41(): void
    {
        $result = $this->check(['name1' => null], ['name1' => 'required|type:void']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData42(): void
    {
        $result = $this->check(['name1' => []], ['name1' => 'required|type:void']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData43(): void
    {
        $result = $this->check(['name1' => []], ['name1' => 'required|type:array']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData44(): void
    {
        $result = $this->check(['name1' => []], ['name1' => ['name1' => 100]]);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData45(): void
    {
        $result = $this->check(['name1' => 0.5], ['name1' => 'required|type:float']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData46(): void
    {
        $result = $this->check(['name1' => 0.5], ['name1' => 'required|type:double']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData47()
    {
        $result = $this->check(['name1' => 0.5], ['name1' => 'required|type:double']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData48(): void
    {
        $result = $this->check(['name1' => 10], ['name1' => 'required|type:float']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData49(): void
    {
        $result = $this->check(['name1' => '10'], ['name1' => 'required|type:float']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData50()
    {
        $result = $this->check(['name1' => null], ['name1' => 'required|type:float']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData51(): void
    {
        $result = $this->check(['name1' => []], ['name1' => 'required|type:float']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData52(): void
    {
        $result = $this->check(['name1' => true], ['name1' => 'required|type:bool']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData53(): void
    {
        $result = $this->check(['name1' => false], ['name1' => 'required|type:bool']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData54(): void
    {
        $result = $this->check(['name1' => ''], ['name1' => 'required|type:bool']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData55(): void
    {
        $result = $this->check(['name1' => null], ['name1' => 'required|type:bool']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData56(): void
    {
        $result = $this->check(['name1' => true], ['name1' => 'required|type:boolean']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData57(): void
    {
        $result = $this->check(['name1' => false], ['name1' => 'required|type:boolean']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData58(): void
    {
        $result = $this->check(['name1' => null], ['name1' => 'required|type:boolean']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData59(): void
    {
        $result = $this->check(['name1' => 'test'], ['name1' => 'type:boolean']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData60(): void
    {
        $result = $this->check(['name1' => 12345], ['name1' => 'type:boolean']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке enum.
    public function testCheckData61(): void
    {
        $result = $this->check(['name1' => 'number 1'], ['name1' => 'required|enum:number 1,3,ok']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке enum.
    public function testCheckData62(): void
    {
        $result = $this->check(['name1' => '3'], ['name1' => 'required|enum:number 1,3,ok']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке enum.
    public function testCheckData63(): void
    {
        $result = $this->check(['name1' => 'ok'], ['name1' => 'required|enum:number 1,3,ok']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке enum.
    public function testCheckData64()
    {
        $result = $this->check(['name1' => 3], ['name1' => 'required|enum:number 1,3,ok']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке enum.
    public function testCheckData65(): void
    {
        $result = $this->check(['name1' => 5], ['name1' => 'required|enum:number 1,3,ok']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке enum.
    public function testCheckData66(): void
    {
        $result = $this->check(['name1' => '123456'], ['name1' => 'required|enum:number 1,3,ok']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке enum.
    public function testCheckData67()
    {
        $result = $this->check(['name1' => null], ['name1' => 'required|enum:number 1,3,ok']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке enum.
    public function testCheckData68(): void
    {
        $result = $this->check(['name1' => null], ['name1' => 'required|enum:1,null']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке enum.
    public function testCheckData69(): void
    {
        $result = $this->check(['name1' => ''], ['name1' => 'required|enum:1,,2']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод при проверке enum.
    public function testCheckData70(): void
    {
        $result = $this->check(['name1' => null], ['name1' => 'required|enum:1,,2']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод при проверке enum.
    public function testCheckData71(): void
    {
        $result = $this->check(['name1' => false], ['name1' => 'required|enum:,2']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод при проверке enum.
    public function testCheckData72(): void
    {
        $result = $this->check(['name1' => true], ['name1' => 'required|enum:1,2']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод при проверке regex.
    public function testCheckData73(): void
    {
        $result = $this->check(['name1' => 'abc'], ['name1' => 'required|regex:[a-z]+']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод при проверке regex.
    public function testCheckData74(): void
    {
        $result = $this->check(['name1' => 'abc2'], ['name1' => 'required|regex:[a-z]+']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод при проверке fullregex.
    public function testCheckData75()
    {
        $result = $this->check(['name1' => 'abcABC'], ['name1' => 'required|fullregex:/^[a-z]+$/i']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод при проверке fullregex.
    public function testCheckData76(): void
    {
        $result = $this->check(['name1' => 'abc2'], ['name1' => 'required|fullregex:/^[a-z]+$/i']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается exception при неправильном параметре.
    public function testCheckData77(): void
    {
        try {
            $result = $this->check(['name1' => 'abc'], ['name1' => 'qwerty123']);
        } catch (\Throwable $exception) {
            $this->assertTrue(true);
            return;
        }

        $this->assertTrue(false);
    }

    // Проверка, что возвращается exception при неправильном параметре.
    public function testCheckData78(): void
    {
        try {
        $result = $this->check(['name1' => 'abc'], ['name1' => 'type:qwerty123']);
        } catch (\Throwable $exception) {
            $this->assertTrue(true);
            return;
        }

        $this->assertTrue(false);
    }

    // Проверка, что возвращается exception при неправильном параметре.
    public function testCheckData79(): void
    {
        try {
            $result = $this->check(['name1' => 'abc'], ['name1' => 'test:qwerty123']);
        } catch (\Throwable $exception) {
            $this->assertTrue(true);
            return;
        }

        $this->assertTrue(false);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData80(): void
    {
        $result = $this->check(['name1' => '12345'], ['name1' => 'type:string,null,void|minlen:5']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData81(): void
    {
        $result = $this->check(['name1' => ''], ['name1' => 'type:string,null,void|minlen:5']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData82(): void
    {
        $result = $this->check(['name1' => null], ['name1' => 'type:string,null,void|minlen:5']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData83(): void
    {
        $result = $this->check(['name1' => '123'], ['name1' => 'type:string,null,void|minlen:5']);

        $this->assertFalse($result);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData84(): void
    {
        $result = $this->check(['name1' => 15], ['name1' => 'type:string,null,void,int|minlen:5|min:10']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData85(): void
    {
        $result = $this->check(['name1' => 5], ['name1' => 'type:string,null,void,int|minlen:5|min:10']);

        $this->assertFalse($result);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData86(): void
    {
        $result = $this->check(['name1' => 0], ['name1' => 'type:string,null,void,int|minlen:5|min:10']);

        $this->assertFalse($result);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData87(): void
    {
        $result = $this->check(['name1' => '123'], ['name1' => 'type:string,null,void,int|minlen:5|min:10']);

        $this->assertFalse($result);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData88(): void
    {
        $result = $this->check(['name1' => 50], ['name1' => 'type:string,null,void,int|minlen:5|min:10|max:100']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData89(): void
    {
        $result = $this->check(['name1' => 150], ['name1' => 'type:string,null,void,int|minlen:5|min:10|max:100']);

        $this->assertFalse($result);
    }

    // Проверка для пересечения разных параметров c enum.
    public function testCheckData90()
    {
        $result = $this->check(['name1' => 10], ['name1' => 'type:string,void|enum:,test,10']);

        $this->assertFalse($result);
    }

    // Проверка для пересечения разных параметров c enum.
    public function testCheckData91(): void
    {
        $result = $this->check(['name1' => '10'], ['name1' => 'type:string,void|enum:,test,10']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров c enum.
    public function testCheckData92(): void
    {
        $result = $this->check(['name1' => ''], ['name1' => 'type:string,void|enum:,test,10']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров c enum.
    public function testCheckData93(): void
    {
        $result = $this->check(['name1' => 'test'], ['name1' => 'type:string,void|enum:,test,10']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров c regex.
    public function testCheckData94(): void
    {
        $result = $this->check(['name1' => 50], ['name1' => 'type:string,null,void,int|minlen:5|min:10|max:100|regex:[0-9]+']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров c regex.
    public function testCheckData95(): void
    {
        $result = $this->check(['name1' => '123'], ['name1' => 'type:string,null,void,int|minlen:5|min:10|max:100|regex:[0-9]+']);

        $this->assertFalse($result);
    }

    // Проверка для пересечения разных параметров c regex.
    public function testCheckData96(): void
    {
        $result = $this->check(['name1' => '12345'], ['name1' => 'type:string,null,void,int|minlen:5|min:10|max:100|regex:[0-9]+']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров c regex.
    public function testCheckData97(): void
    {
        $result = $this->check(['name1' => null], ['name1' => 'type:string,null,void,int|minlen:5|min:10|max:100|regex:[0-9]+']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров c regex.
    public function testCheckData98(): void
    {
        $result = $this->check(['name1' => ''], ['name1' => 'type:string,null,void,int|minlen:5|min:10|max:100|fullregex:/[0-9]*/']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров c regex.
    public function testCheckData99(): void
    {
        $result = $this->check(['name1' => '10011101'], ['name1' => 'type:string,null,void,int|minlen:5|min:6|max:100|fullregex:/^[1|0]+$/']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров c regex.
    public function testCheckData100(): void
    {
        $result = $this->check(['name1' => '20022202'], ['name1' => 'type:string,null,void,int|minlen:5|min:6|max:100|fullregex:/^[1|0]+$/']);

        $this->assertFalse($result);
    }

    // Проверка вывода правильного названия поля.
    public function testCheckData101(): void
    {
        $result = $this->check(['name1' => 1], ['name1' => 'type:string'], 'prefix_');

        $this->assertTrue($this->getErrorCells()[0] === 'prefix_[name1]');
    }

    // Проверка вывода правильного названия поля.
    public function testCheckData102(): void
    {
        $result = $this->check(['name1' => 1], ['name1' => 'type:string']);

        $this->assertTrue($this->getErrorCells()[0] === 'name1');
    }

    // Проверка вывода правильного названия поля.
    public function testCheckData103(): void
    {
        $result = $this->check(['name1' => ['name2' => '123']], ['[name1][name2]' => 'required|type:string']);

        $this->assertTrue($result);
    }

    // Проверка вывода правильного названия поля.
    public function testCheckData104(): void
    {
        $result = $this->check(['name1' => ['name2' => 1]], ['[name1][name2]' => 'required|type:string']);

        $this->assertTrue($this->getErrorCells()[0] === '[name1][name2]');
    }

    // Проверка вывода правильного названия поля.
    public function testCheckData105(): void
    {
        $result = $this->check(['name1' => ['name2' => 1]], ['[name1][name2]' => 'required|type:string'], 'prefix_');

        $this->assertTrue($this->getErrorCells()[0] === 'prefix_[name1][name2]');
    }

    // Проверка вывода правильного названия поля.
    public function testCheckData106(): void
    {
        $result = $this->check(['name1' => ['name2' => ['name3' => '123']]], ['[name1][name2][name3]' => 'required|type:string']);

        $this->assertTrue($result);
    }

    // Проверка вывода правильного названия поля.
    public function testCheckData107(): void
    {
        $result = $this->check([], ['[name1][name2][name3]' => 'required|type:string']);

        $this->assertTrue($this->getErrorCells()[0] === '[name1][name2][name3]');
    }

    // Проверка на правильную обработку массива.
    public function testCheckData108(): void
    {
        $result = $this->check(['[name1][name2][name3]' => '123'], ['[name1][name2][name3]' => 'required|type:string']);

        $this->assertTrue($result);
    }

    // Проверка на правильную обработку массива.
    public function testCheckData109(): void
    {
        $result = $this->check(['[name1][name2][name3]' => '123'], ['[name1][name2][name3]' => 'required|type:string']);

        $this->assertTrue($result);
    }

    // Проверка на правильную обработку массива.
    public function testCheckData110(): void
    {
        $result = $this->check(['name1' => []], ['name1' => 'type:array']);

        $this->assertTrue($result);
    }

    // Проверка на правильную обработку массива.
    public function testCheckData111(): void
    {
        $result = $this->check(['users' => [['id' => 123, 'name' => '123']]], ['users' => ['required', ['id' => 'required|type:int', 'name' => 'required|type:string']]]);

        $this->assertTrue($result);
    }

    // Проверка на правильную обработку массива.
    public function testCheckData112(): void
    {
        $result = $this->check(['users' => [['id' => 123, 'name' => '123'], ['id' => 124, 'name' => '124']]], ['users' => ['required', ['id' => 'required|type:int', 'name' => 'required|type:string']]]);

        $this->assertTrue($result);
    }

    // Проверка на правильную обработку массива.
    public function testCheckData113(): void
    {
        $result = $this->check(['all' => [ 'users' => [['id' => 123, 'name' => '123'], ['id' => 124, 'name' => '124']]]], ['[all][users]' => ['required', ['id' => 'required|type:int', 'name' => 'required|type:string']]]);

        $this->assertTrue($result);
    }

    // Проверка на правильную обработку массива.
    public function testCheckData114(): void
    {
        $result = $this->check([], ['[all][users]' => ['id' => 'required|type:int', 'name' => 'required|type:string']]);

        $this->assertTrue($result);
    }

    // Проверка на правильную обработку массива.
    public function testCheckData115(): void
    {
        $result = $this->check(['all' => [ 'users' => [['id' => 123, 'name' => '123'], ['id' => 124]]]], ['[all][users]' => ['required', ['id' => 'required|type:int', 'name' => 'required|type:string']]]);

        $this->assertTrue($this->getErrorCells()[0] === '[all][users][1][name]');
    }

}