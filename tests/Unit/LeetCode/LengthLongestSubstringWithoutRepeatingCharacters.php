<?php

namespace Tests\Unit\LeetCode;

use Tests\TestCase;

class LengthLongestSubstringWithoutRepeatingCharacters extends TestCase
{
    public function lengthLongestSubstringWithoutRepeatingCharacters(string $s): int
    {
        $lenOfString = strlen($s);
        if ($lenOfString === 0 || $lenOfString === 1) return $lenOfString;

        $currentNonRepeatingCharacters = [];
        $maxLen = 0;
        $start = 0;

        for ($index = 0; $index < $lenOfString; $index++) {
            $char = $s[$index];

            if (array_key_exists($char, $currentNonRepeatingCharacters) && $currentNonRepeatingCharacters[$char] >= $start) {
                $start = $currentNonRepeatingCharacters[$char] + 1;
            }

            if ($index - $start === $maxLen) {
                $maxLen++;
            }

            $currentNonRepeatingCharacters[$char] = $index;
        }

        return $maxLen;
    }

    public function test_length_longest_substring_without_repeating_characters(): void
    {
        $this->assertSame(2, $this->lengthLongestSubstringWithoutRepeatingCharacters('au'));
        $this->assertSame(3, $this->lengthLongestSubstringWithoutRepeatingCharacters('dvdfd'));
        $this->assertSame(6, $this->lengthLongestSubstringWithoutRepeatingCharacters('ohvhjdml'));
        $this->assertSame(3, $this->lengthLongestSubstringWithoutRepeatingCharacters('ohvh'));
        $this->assertSame(5, $this->lengthLongestSubstringWithoutRepeatingCharacters('audderib'));
        $this->assertSame(5, $this->lengthLongestSubstringWithoutRepeatingCharacters('deribbud'));
        $this->assertSame(3, $this->lengthLongestSubstringWithoutRepeatingCharacters('abcabcbb'));
        $this->assertSame(3, $this->lengthLongestSubstringWithoutRepeatingCharacters('abc'));
        $this->assertSame(1, $this->lengthLongestSubstringWithoutRepeatingCharacters('bbbbb'));
        $this->assertSame(3, $this->lengthLongestSubstringWithoutRepeatingCharacters('pwwkew'));
    }
}
