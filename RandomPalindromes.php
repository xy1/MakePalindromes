<?php

/*
 * RandomPalindromes.php
 *
 * Generate palindromes randomly from English word list
 */

/* Settings */
define('MAX_WORD_LENGTH', 3);
define('ATTEMPTS', 10000000);
define('WORDS_IN_SENTENCE', 3);

/* Load word list from text file into array */
$words = file('WordsList.txt');

/* clean up words */
$word_count = count($words);
for ($i = 0; $i < $word_count; $i++) {
        $words[$i] = trim(strtolower($words[$i]));  // trim and convert to lower case
        if (strlen($words[$i]) <= constant('MAX_WORD_LENGTH') && $words[$i])  // remove lengthy words to improve performance
                $temp_words[] = $words[$i];
}
$words = $temp_words;

for ($i = 1; $i <= constant('ATTEMPTS'); $i++) {  // iterate defined number of attempts

        /* Build sentence from N randomly-selected words */
        $sentence = "";
        $deblanked_sentence = "";
        for ($j = 1; $j <= constant('WORDS_IN_SENTENCE'); $j++) {
                $word = $words[array_rand($words)];
                $sentence .= $word . " ";
                $deblanked_sentence .= $word;
        }

        /* Check for palindrome and show if so */
        if (strrev($deblanked_sentence) == $deblanked_sentence) echo $sentence . "\n";
}

?>
