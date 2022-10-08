<?php

// Start  phpunit vendor/phphleb/api-tests/unit/ApiRequestDataManagerTraitTest.php

use PHPUnit\Framework\TestCase;

class ApiRequestDataManagerTraitTest extends TestCase
{
    use \Phphleb\ApiMultitool\Src\ApiRequestDataManagerTrait;

    // Проверка, что возвращается правильный результат.
    public function testCheckData01()
    {
        $result = $this->check(['name1' => 100], ['name1' => 'required']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный результат при required.
    public function testCheckData02()
    {
        $result = $this->check([], ['name1' => 'required']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный результат без required.
    public function testCheckData03()
    {
        $result = $this->check([], ['name1' => 'type:string']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный результат type.
    public function testCheckData04()
    {
        $result = $this->check(['name1' => 'text'], ['name1' => 'type:string']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный результат type.
    public function testCheckData05()
    {
        $result = $this->check(['name1' => 100], ['name1' => 'type:string']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильная ошибка поля с type.
    public function testCheckData06()
    {
        $result = $this->check(['name1' => 100], ['name1' => 'type:string']);

        $this->assertTrue(count($this->getErrorCells()) === 1 && $this->getErrorCells()[0] === 'name1');
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData07()
    {
        $result = $this->check(['name1' => "1234567890"], ['name1' => 'required|type:string|minlen:5']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData08()
    {
        $result = $this->check(['name1' => "1234"], ['name1' => 'required|type:string|minlen:5']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData09()
    {
        $result = $this->check(['name1' => "1234567890"], ['name1' => 'required|type:string|minlength:5']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData10()
    {
        $result = $this->check(['name1' => "1234"], ['name1' => 'required|type:string|minlength:5']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData11()
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
    public function testCheckData13()
    {
        $result = $this->check(['name1' => "1234567890"], ['name1' => 'required|type:string|maxlen:5']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData14()
    {
        $result = $this->check(['name1' => "12345"], ['name1' => 'required|type:string|maxlen:5']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData15()
    {
        $result = $this->check(['name1' => "123"], ['name1' => 'required|type:string|maxlen:5|minlen:2']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData16()
    {
        $result = $this->check(['name1' => "1"], ['name1' => 'required|type:string|maxlen:5|minlen:2']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный результат проверки type и длины строки.
    public function testCheckData17()
    {
        $result = $this->check(['name1' => "1234567890"], ['name1' => 'required|type:string|maxlen:5|minlen:2']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и длине строки.
    public function testCheckData18()
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
    public function testCheckData20()
    {
        $result = $this->check(['name1' => 1234567890], ['name1' => 'required|type:integer']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData21()
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
    public function testCheckData23()
    {
        $result = $this->check(['name1' => 1234567890], ['name1' => 'required|type:integer|min:100500']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допуску.
    public function testCheckData24()
    {
        $result = $this->check(['name1' => 100], ['name1' => 'required|type:integer|min:100500']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допуску.
    public function testCheckData25()
    {
        $result = $this->check(['name1' => 0], ['name1' => 'required|type:integer|min:100500']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допуску.
    public function testCheckData26()
    {
        $result = $this->check(['name1' => -100500], ['name1' => 'required|type:integer|min:100500']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допуску.
    public function testCheckData27()
    {
        $result = $this->check(['name1' => -100], ['name1' => 'required|type:integer|min:-100500']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допускам.
    public function testCheckData28()
    {
        $result = $this->check(['name1' => 150], ['name1' => 'required|type:integer|min:100|max:200']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допускам.
    public function testCheckData29()
    {
        $result = $this->check(['name1' => 90], ['name1' => 'required|type:integer|min:100|max:200']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допускам.
    public function testCheckData30()
    {
        $result = $this->check(['name1' => 220], ['name1' => 'required|type:integer|min:100|max:200']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допускам.
    public function testCheckData31()
    {
        $result = $this->check(['name1' => 0], ['name1' => 'required|type:integer|min:100|max:200']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type и допускам.
    public function testCheckData32()
    {
        $result = $this->check(['name1' => null], ['name1' => 'required|type:integer|min:-100|max:200']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData33()
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
    public function testCheckData35()
    {
        $result = $this->check(['name1' => ""], ['name1' => 'required|type:null']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData36()
    {
        $result = $this->check(['name1' => " "], ['name1' => 'required|type:null']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData37()
    {
        $result = $this->check(['name1' => []], ['name1' => 'required|type:null']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData38()
    {
        $result = $this->check(['name1' => new \ErrorException('test')], ['name1' => 'required|type:null']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData39()
    {
        $result = $this->check(['name1' => ''], ['name1' => 'required|type:void']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData40()
    {
        $result = $this->check(['name1' => '123'], ['name1' => 'required|type:void']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData41()
    {
        $result = $this->check(['name1' => null], ['name1' => 'required|type:void']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData42()
    {
        $result = $this->check(['name1' => []], ['name1' => 'required|type:void']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData43()
    {
        $result = $this->check(['name1' => []], ['name1' => 'required|type:array']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData44()
    {
        $result = $this->check(['name1' => []], ['name1' => ['name1' => 100]]);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData45()
    {
        $result = $this->check(['name1' => 0.5], ['name1' => 'required|type:float']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData46()
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
    public function testCheckData48()
    {
        $result = $this->check(['name1' => 10], ['name1' => 'required|type:float']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData49()
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
    public function testCheckData51()
    {
        $result = $this->check(['name1' => []], ['name1' => 'required|type:float']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData52()
    {
        $result = $this->check(['name1' => true], ['name1' => 'required|type:bool']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData53()
    {
        $result = $this->check(['name1' => false], ['name1' => 'required|type:bool']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData54()
    {
        $result = $this->check(['name1' => ''], ['name1' => 'required|type:bool']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData55()
    {
        $result = $this->check(['name1' => null], ['name1' => 'required|type:bool']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData56()
    {
        $result = $this->check(['name1' => true], ['name1' => 'required|type:boolean']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData57()
    {
        $result = $this->check(['name1' => false], ['name1' => 'required|type:boolean']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData58()
    {
        $result = $this->check(['name1' => null], ['name1' => 'required|type:boolean']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData59()
    {
        $result = $this->check(['name1' => 'test'], ['name1' => 'type:boolean']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке type.
    public function testCheckData60()
    {
        $result = $this->check(['name1' => 12345], ['name1' => 'type:boolean']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке enum.
    public function testCheckData61()
    {
        $result = $this->check(['name1' => 'number 1'], ['name1' => 'required|enum:number 1,3,ok']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке enum.
    public function testCheckData62()
    {
        $result = $this->check(['name1' => '3'], ['name1' => 'required|enum:number 1,3,ok']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке enum.
    public function testCheckData63()
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
    public function testCheckData65()
    {
        $result = $this->check(['name1' => 5], ['name1' => 'required|enum:number 1,3,ok']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке enum.
    public function testCheckData66()
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
    public function testCheckData68()
    {
        $result = $this->check(['name1' => null], ['name1' => 'required|enum:1,null']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается правильный вывод ошибки при проверке enum.
    public function testCheckData69()
    {
        $result = $this->check(['name1' => ''], ['name1' => 'required|enum:1,,2']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод при проверке enum.
    public function testCheckData70()
    {
        $result = $this->check(['name1' => null], ['name1' => 'required|enum:1,,2']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод при проверке enum.
    public function testCheckData71()
    {
        $result = $this->check(['name1' => false], ['name1' => 'required|enum:,2']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод при проверке enum.
    public function testCheckData72()
    {
        $result = $this->check(['name1' => true], ['name1' => 'required|enum:1,2']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод при проверке regex.
    public function testCheckData73()
    {
        $result = $this->check(['name1' => 'abc'], ['name1' => 'required|regex:[a-z]+']);

        $this->assertTrue($result);
    }

    // Проверка, что возвращается правильный вывод при проверке regex.
    public function testCheckData74()
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
    public function testCheckData76()
    {
        $result = $this->check(['name1' => 'abc2'], ['name1' => 'required|fullregex:/^[a-z]+$/i']);

        $this->assertFalse($result);
    }

    // Проверка, что возвращается exception при неправильном параметре.
    public function testCheckData77()
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
    public function testCheckData78()
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
    public function testCheckData79()
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
    public function testCheckData80()
    {
        $result = $this->check(['name1' => '12345'], ['name1' => 'type:string,null,void|minlen:5']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData81()
    {
        $result = $this->check(['name1' => ''], ['name1' => 'type:string,null,void|minlen:5']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData82()
    {
        $result = $this->check(['name1' => null], ['name1' => 'type:string,null,void|minlen:5']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData83()
    {
        $result = $this->check(['name1' => '123'], ['name1' => 'type:string,null,void|minlen:5']);

        $this->assertFalse($result);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData84()
    {
        $result = $this->check(['name1' => 15], ['name1' => 'type:string,null,void,int|minlen:5|min:10']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData85()
    {
        $result = $this->check(['name1' => 5], ['name1' => 'type:string,null,void,int|minlen:5|min:10']);

        $this->assertFalse($result);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData86()
    {
        $result = $this->check(['name1' => 0], ['name1' => 'type:string,null,void,int|minlen:5|min:10']);

        $this->assertFalse($result);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData87()
    {
        $result = $this->check(['name1' => '123'], ['name1' => 'type:string,null,void,int|minlen:5|min:10']);

        $this->assertFalse($result);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData88()
    {
        $result = $this->check(['name1' => 50], ['name1' => 'type:string,null,void,int|minlen:5|min:10|max:100']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров.
    public function testCheckData89()
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
    public function testCheckData91()
    {
        $result = $this->check(['name1' => '10'], ['name1' => 'type:string,void|enum:,test,10']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров c enum.
    public function testCheckData92()
    {
        $result = $this->check(['name1' => ''], ['name1' => 'type:string,void|enum:,test,10']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров c enum.
    public function testCheckData93()
    {
        $result = $this->check(['name1' => 'test'], ['name1' => 'type:string,void|enum:,test,10']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров c regex.
    public function testCheckData94()
    {
        $result = $this->check(['name1' => 50], ['name1' => 'type:string,null,void,int|minlen:5|min:10|max:100|regex:[0-9]+']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров c regex.
    public function testCheckData95()
    {
        $result = $this->check(['name1' => '123'], ['name1' => 'type:string,null,void,int|minlen:5|min:10|max:100|regex:[0-9]+']);

        $this->assertFalse($result);
    }

    // Проверка для пересечения разных параметров c regex.
    public function testCheckData96()
    {
        $result = $this->check(['name1' => '12345'], ['name1' => 'type:string,null,void,int|minlen:5|min:10|max:100|regex:[0-9]+']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров c regex.
    public function testCheckData97()
    {
        $result = $this->check(['name1' => null], ['name1' => 'type:string,null,void,int|minlen:5|min:10|max:100|regex:[0-9]+']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров c regex.
    public function testCheckData98()
    {
        $result = $this->check(['name1' => ''], ['name1' => 'type:string,null,void,int|minlen:5|min:10|max:100|fullregex:/[0-9]*/']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров c regex.
    public function testCheckData99()
    {
        $result = $this->check(['name1' => '10011101'], ['name1' => 'type:string,null,void,int|minlen:5|min:6|max:100|fullregex:/^[1|0]+$/']);

        $this->assertTrue($result);
    }

    // Проверка для пересечения разных параметров c regex.
    public function testCheckData100()
    {
        $result = $this->check(['name1' => '20022202'], ['name1' => 'type:string,null,void,int|minlen:5|min:6|max:100|fullregex:/^[1|0]+$/']);

        $this->assertFalse($result);
    }

    // Проверка вывода правильного названия поля.
    public function testCheckData101()
    {
        $result = $this->check(['name1' => 1], ['name1' => 'type:string'], 'prefix_');

        $this->assertTrue($this->getErrorCells()[0] === 'prefix_[name1]');
    }

    // Проверка вывода правильного названия поля.
    public function testCheckData102()
    {
        $result = $this->check(['name1' => 1], ['name1' => 'type:string']);

        $this->assertTrue($this->getErrorCells()[0] === 'name1');
    }

    // Проверка вывода правильного названия поля.
    public function testCheckData103()
    {
        $result = $this->check(['name1' => ['name2' => '123']], ['[name1][name2]' => 'required|type:string']);

        $this->assertTrue($result);
    }

    // Проверка вывода правильного названия поля.
    public function testCheckData104()
    {
        $result = $this->check(['name1' => ['name2' => 1]], ['[name1][name2]' => 'required|type:string']);

        $this->assertTrue($this->getErrorCells()[0] === '[name1][name2]');
    }

    // Проверка вывода правильного названия поля.
    public function testCheckData105()
    {
        $result = $this->check(['name1' => ['name2' => 1]], ['[name1][name2]' => 'required|type:string'], 'prefix_');

        $this->assertTrue($this->getErrorCells()[0] === 'prefix_[name1][name2]');
    }

    // Проверка вывода правильного названия поля.
    public function testCheckData106()
    {
        $result = $this->check(['name1' => ['name2' => ['name3' => '123']]], ['[name1][name2][name3]' => 'required|type:string']);

        $this->assertTrue($result);
    }

    // Проверка вывода правильного названия поля.
    public function testCheckData107()
    {
        $result = $this->check([], ['[name1][name2][name3]' => 'required|type:string']);

        $this->assertTrue($this->getErrorCells()[0] === '[name1][name2][name3]');
    }

    // Проверка на правильную обработку массива.
    public function testCheckData108()
    {
        $result = $this->check(['[name1][name2][name3]' => '123'], ['[name1][name2][name3]' => 'required|type:string']);

        $this->assertTrue($result);
    }

    // Проверка на правильную обработку массива.
    public function testCheckData109()
    {
        $result = $this->check(['[name1][name2][name3]' => '123'], ['[name1][name2][name3]' => 'required|type:string']);

        $this->assertTrue($result);
    }

    // Проверка на правильную обработку массива.
    public function testCheckData110()
    {
        $result = $this->check(['name1' => []], ['name1' => 'type:array']);

        $this->assertTrue($result);
    }

    // Проверка на правильную обработку массива.
    public function testCheckData111()
    {
        $result = $this->check(['users' => [['id' => 123, 'name' => '123']]], ['users' => ['required', ['id' => 'required|type:int', 'name' => 'required|type:string']]]);

        $this->assertTrue($result);
    }

    // Проверка на правильную обработку массива.
    public function testCheckData112()
    {
        $result = $this->check(['users' => [['id' => 123, 'name' => '123'], ['id' => 124, 'name' => '124']]], ['users' => ['required', ['id' => 'required|type:int', 'name' => 'required|type:string']]]);

        $this->assertTrue($result);
    }

    // Проверка на правильную обработку массива.
    public function testCheckData113()
    {
        $result = $this->check(['all' => [ 'users' => [['id' => 123, 'name' => '123'], ['id' => 124, 'name' => '124']]]], ['[all][users]' => ['required', ['id' => 'required|type:int', 'name' => 'required|type:string']]]);

        $this->assertTrue($result);
    }

    // Проверка на правильную обработку массива.
    public function testCheckData114()
    {
        $result = $this->check([], ['[all][users]' => ['id' => 'required|type:int', 'name' => 'required|type:string']]);

        $this->assertTrue($result);
    }

    // Проверка на правильную обработку массива.
    public function testCheckData115()
    {
        $result = $this->check(['all' => [ 'users' => [['id' => 123, 'name' => '123'], ['id' => 124]]]], ['[all][users]' => ['required', ['id' => 'required|type:int', 'name' => 'required|type:string']]]);

        $this->assertTrue($this->getErrorCells()[0] === '[all][users][1][name]');
    }

}