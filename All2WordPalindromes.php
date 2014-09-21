<?php

/*
 * All2WordPalindromes.php
 *
 * Generate all 2-word palindromes from English word list
 */

/* Settings */
define('MAX_WORD_LENGTH', 6);

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

for ($i = 0; $i < $word_count; $i++) {  // iterate word list
        $this_word = $words[$i];

        $search_for_word = strrev($this_word);
        $search_for_shortened_word = substr(strrev($this_word),1);

        /* search for exact word in reverse */
        if ($this_word != $search_for_word && in_array($search_for_word, $words) )
                echo $this_word . " " . $search_for_word . "\n";  // show if found

        /* search for shortened form of word in reverse */
        else if (in_array($search_for_shortened_word, $words))
                echo $this_word . " " . $search_for_shortened_word . "\n";  // show if found

        /* search for lengthened forms of word in reverse */
        for ($j = 97; $j < 122; $j++) {  // iterate alphabet
                $search_for_lengthened_word = chr($j) . $search_for_word;  // construct word variation
                if (in_array($search_for_lengthened_word, $words))
                        echo $this_word . " " . $search_for_lengthened_word . "\n";  // show if found
        }
}

?>
