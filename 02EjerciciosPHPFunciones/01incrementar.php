<?php

$contador = 0;

function incrementar()
{
    global $contador;
    return ++$contador;
}
function incrementarGlobal()
{
    return ++$GLOBALS["contador"];
}
function incrementarParam($contador)
{
    return ++$contador;
}

echo incrementar();
echo "\n";
echo $contador;
echo "\n===============\n";
echo incrementarGlobal();
echo "\n";
echo $contador;
echo "\n===============\n";
echo incrementarParam($contador);
echo "\n";
echo $contador;
