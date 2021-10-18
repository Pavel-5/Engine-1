<?php
function add($a, $b)
{
	return $a + $b;
}

function div($a, $b)
{
	return ($b === 0) ? "На ноль делить нельзя!!!" : $a / $b;
}

function mult($a, $b)
{
	return $a * $b;
}

function sub($a, $b)
{
	return $a - $b;
}

function getCalculator($arg1, $arg2, $operation)
{
	$result = 0;
	if (!is_null($operation)) $result = $operation((int)$arg1, (int)$arg2);

	return ["arg1" => $arg1, "arg2" => $arg2, "operation" => $operation, "result" => $result];
}
