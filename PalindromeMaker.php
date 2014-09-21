<?php

/*
 * PalindromeMaker.php
 *
 * Generate palindromes randomly from English word list
 */

/* Load word list from text file into array */
$words = file('WordsList.txt');
/* clean up words */
$words = array_map('strtolower', $words);
$words = array_map('trim', $words);

/* Settings */
$ATTEMPTS = 1000000;
$WORDS_IN_SENTENCE = 2;
$PROGRESS_INTERVAL = 1000;

$start_time = time();
for ($i = 1; $i <= $ATTEMPTS; $i++) {

	/* Show progress at regular intervals */
	if ($i % $PROGRESS_INTERVAL == 0) {
		$elapsed_time = round( (time() - $start_time) / 60, 1);
		echo "(" . $i . " attempts after " . $elapsed_time . " minutes)\n";
	}

	/* Build palindrome from N randomly-selected words */
	$sentence = "";
	$deblanked_sentence = "";
	for ($j = 1; $j <= $WORDS_IN_SENTENCE; $j++) {
		$word = $words[array_rand($words)];
		$sentence .= $word . " ";
		$deblanked_sentence .= $word;
	}

	/* Check for palindrome and show if so */
	if (strrev($deblanked_sentence) == $deblanked_sentence) echo $sentence . "\n";
}

?>
