<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// 1. pobranie parametrów
$x = $_REQUEST ['x']; //kwota
$y = $_REQUEST ['y']; //na ile lat
$z = $_REQUEST ['z']; //oprocentowanie

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku
if (! (isset($x) && isset($y) && isset($z))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ( $x == "") {
	$messages [] = 'Nie podano liczby 1';
}
if ( $y == "") {
	$messages [] = 'Nie podano liczby 2';
}
if ($z == ""){
	$messages [] = "Nie podano liczby 3";
}

if (empty( $messages )) {
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $x )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	if (! is_numeric( $y )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}
	if (! is_numeric( $z )) {
		$messages [] = 'Trzecia wartość nie jest liczbą całkowitą';
	}
}

// 3. wykonaj zadanie jeśli wszystko w porządku
if (empty ( $messages )) { 

	//konwersja parametrów na int
	$x = intval($x);
	$y = intval($y);
	$z = intval($z);

	//wynik: (kwota +kwota *oproc)/(12*lata)
	$result = ($x + $x * $z)/(12*$y);
	
}

// 4. Wywołanie widoku z przekazaniem zmiennych
include 'calc_view.php';