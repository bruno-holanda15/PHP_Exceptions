<?php

function funcao1()
{
    echo 'Entrei na função 1' . PHP_EOL;
    try {
        funcao2();
    } catch (RuntimeException | DivisionByZeroError $erro) {
        echo $erro->getMessage() . PHP_EOL;
        echo $erro->getLine() . PHP_EOL;
        echo $erro->getTraceAsString() . PHP_EOL;

        throw new RuntimeException(
            "Execução foi tratada!",
             1,
            $erro
        );    
    }
    echo 'Saindo da função 1' . PHP_EOL;
}

function funcao2()
{
    echo 'Entrei na função 2' . PHP_EOL;
    throw new RuntimeException('Função 2 com exception');
    echo 'Saindo da função 2' . PHP_EOL;
}

echo 'Iniciando o programa principal' . PHP_EOL;
try {
    funcao1();
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
echo 'Finalizando o programa principal' . PHP_EOL;
