<?php

/*
 * All3WordPalindromes.php
 *
 * Generate all 3-word palindromes from English word list
 */

/* Settings */
define('MAX_WORD_LENGTH', 4);

/* Load word list from text file into array */
$words = file('WordsList.txt');

/* clean up words */
$word_count = count($words);
for ($i = 0; $i < $word_count; $i++) {
        $words[$i] = trim(strtolower($words[$i]));
        if (strlen($words[$i]) <= constant('MAX_WORD_LENGTH') && $words[$i]) $temp_words[] = $words[$i];
}
$words = $temp_words;
$word_count = count($words);

for ($i = 0; $i < $word_count; $i++) {  // iterate word list for 1st word
        $this_word = $words[$i];

        for ($j = 0; $j < $word_count; $j++) {  // iterate word list for 2nd word
                $second_word = $words[$j];
                $search_for_words = strrev($this_word . $second_word);
                if (in_array($search_for_words, $words))  // look for 3rd word that matches first 2
                        echo $this_word . " " . $second_word . " " . $search_for_words . "\n";  // show if found
        }
}

?>
