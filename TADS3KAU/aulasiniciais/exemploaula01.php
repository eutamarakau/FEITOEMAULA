<?php
    $saldo = 100;
    function consultarSaldo($saldo){
        echo "<p>Seu saldo eh R$ " . $saldo;
    }

    function realizarSaque($saldo){
        return $saldo - 50; 
    }

    function efetuarDeposito($saldo){
        return $saldo + 200;
    }

    consultarSaldo($saldo);
    $saldo = realizarSaque($saldo);
    consultarSaldo($saldo);
    $saldo = efetuarDeposito($saldo);
    consultarSaldo($saldo);
?>