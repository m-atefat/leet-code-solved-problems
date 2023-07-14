<?php

namespace Tests\Unit\LeetCode;

use Tests\TestCase;

class LongestSubstringWithoutRepeatingCharacters extends TestCase
{
    public function longestSubstringWithoutRepeatingCharacters(string $s): int
    {
        $lenOfString = strlen($s);
        if ($lenOfString === 0 || $lenOfString === 1) return $lenOfString;

        $currentNonRepeatingCharacters = [];
        $maxLen = 0;
        $start = 0;

        $nonRepeatingSubstr = '';
        for ($index = 0; $index < $lenOfString; $index++) {
            $char = $s[$index];

            if (array_key_exists($char, $currentNonRepeatingCharacters) &&
                $currentNonRepeatingCharacters[$s[$index]] >= $start) {
                $start = $currentNonRepeatingCharacters[$char] + 1;
                $nonRepeatingSubstr = $s[$start];
            }

            if ($index - $start === $maxLen) {
                $maxLen++;
            }

            $nonRepeatingSubstr = $nonRepeatingSubstr . $s[$index];
            $currentNonRepeatingCharacters[$s[$index]] = $index;
        }

        return $maxLen;
    }

    public function test_longest_substring_without_repeating_characters()
    {
        $this->assertSame(2, $this->longestSubstringWithoutRepeatingCharacters('au'));
        $this->assertSame(3, $this->longestSubstringWithoutRepeatingCharacters('dvdfd'));
        $this->assertSame(6, $this->longestSubstringWithoutRepeatingCharacters('ohvhjdml'));
        $this->assertSame(3, $this->longestSubstringWithoutRepeatingCharacters('ohvh'));
        $this->assertSame(5, $this->longestSubstringWithoutRepeatingCharacters('audderib'));
        $this->assertSame(5, $this->longestSubstringWithoutRepeatingCharacters('deribbud'));
        $this->assertSame(3, $this->longestSubstringWithoutRepeatingCharacters('abcabcbb'));
        $this->assertSame(3, $this->longestSubstringWithoutRepeatingCharacters('abc'));
        $this->assertSame(1, $this->longestSubstringWithoutRepeatingCharacters('bbbbb'));
        $this->assertSame(3, $this->longestSubstringWithoutRepeatingCharacters('pwwkew'));
    }
}
