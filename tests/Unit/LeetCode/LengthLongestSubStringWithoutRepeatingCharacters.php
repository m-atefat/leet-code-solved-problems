<?php

namespace Tests\Unit\LeetCode;

use Tests\TestCase;

class LengthLongestSubStringWithoutRepeatingCharacters extends TestCase
{
    public function lengthLongestSubStringWithoutRepeatingCharacters(string $s): int
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
        $this->assertSame(2, $this->lengthLongestSubStringWithoutRepeatingCharacters('au'));
        $this->assertSame(3, $this->lengthLongestSubStringWithoutRepeatingCharacters('dvdfd'));
        $this->assertSame(6, $this->lengthLongestSubStringWithoutRepeatingCharacters('ohvhjdml'));
        $this->assertSame(3, $this->lengthLongestSubStringWithoutRepeatingCharacters('ohvh'));
        $this->assertSame(5, $this->lengthLongestSubStringWithoutRepeatingCharacters('audderib'));
        $this->assertSame(5, $this->lengthLongestSubStringWithoutRepeatingCharacters('deribbud'));
        $this->assertSame(3, $this->lengthLongestSubStringWithoutRepeatingCharacters('abcabcbb'));
        $this->assertSame(3, $this->lengthLongestSubStringWithoutRepeatingCharacters('abc'));
        $this->assertSame(1, $this->lengthLongestSubStringWithoutRepeatingCharacters('bbbbb'));
        $this->assertSame(3, $this->lengthLongestSubStringWithoutRepeatingCharacters('pwwkew'));
    }
}
