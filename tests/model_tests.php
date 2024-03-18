<?php

require "../vendor/autoload.php";

function testLoginAccount(){
    require_once "../model/account_login.php";

    $normal_test = loginAccount('00000000','teste');
    PHPUnit\Framework\Assert::assertEquals(true, $normal_test[0]);
    
    $accountNotExist = loginAccount('99999999','teste');
    PHPUnit\Framework\Assert::assertEquals(false, $accountNotExist[0]);
    PHPUnit\Framework\Assert::assertEquals('Conta nao encontrada', $accountNotExist[1]);
    
    $incorrectPassword = loginAccount('11111111','errada');
    PHPUnit\Framework\Assert::assertEquals(false, $incorrectPassword[0]);
    PHPUnit\Framework\Assert::assertEquals('Senha incorreta', $incorrectPassword[1]);
}