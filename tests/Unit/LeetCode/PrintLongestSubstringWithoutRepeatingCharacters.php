<?php

namespace LeetCode;

use Tests\TestCase;

class PrintLongestSubstringWithoutRepeatingCharacters extends TestCase
{
    public function printLongestSubStringWithoutRepeatingCharacters(string $s): string
    {
        $string = '';
        $lenOfString = strlen($s);

        if ($lenOfString === 0) return $string;
        if ($lenOfString === 1) return $s;

        $maxLen = 0;
        $start = 0;
        $currentSubStrStart = 0;
        $currentNonRepeatingCharacters = [];

        for ($index = 0; $index < $lenOfString; $index++) {
            $char = $s[$index];

            if (array_key_exists($char, $currentNonRepeatingCharacters) && $currentNonRepeatingCharacters[$char] >= $currentSubStrStart) {
                $curLength = $index - $currentSubStrStart;

                if ($curLength > $maxLen) {
                    $maxLen = $curLength;
                    $start = $currentSubStrStart;
                }

                $currentSubStrStart = $currentNonRepeatingCharacters[$char] + 1;
            }

            $currentNonRepeatingCharacters[$char] = $index;
        }

        $lastLength = $index - $currentSubStrStart;
        if ($maxLen < $lastLength) {
            $maxLen = $lastLength;
            $start = $currentSubStrStart;
        }

        return substr($s, $start, $maxLen);
    }

    public function test_print_longest_substring_without_repeating_characters(): void
    {
        $this->assertSame('EKSFORG', $this->printLongestSubStringWithoutRepeatingCharacters('GEEKSFORGEEKS'));
        $this->assertSame('ABDEFG', $this->printLongestSubStringWithoutRepeatingCharacters('ABDEFGABEF'));
        $this->assertSame('au', $this->printLongestSubStringWithoutRepeatingCharacters('au'));
        $this->assertSame('vdf', $this->printLongestSubStringWithoutRepeatingCharacters('dvdf'));
        $this->assertSame('vdf', $this->printLongestSubStringWithoutRepeatingCharacters('dvdfd'));
        $this->assertSame('vhjdml', $this->printLongestSubStringWithoutRepeatingCharacters('ohvhjdml'));
        $this->assertSame('ohv', $this->printLongestSubStringWithoutRepeatingCharacters('ohvh'));
        $this->assertSame('derib', $this->printLongestSubStringWithoutRepeatingCharacters('audderib'));
        $this->assertSame('derib', $this->printLongestSubStringWithoutRepeatingCharacters('deribbud'));
        $this->assertSame('abc', $this->printLongestSubStringWithoutRepeatingCharacters('abcabcbb'));
        $this->assertSame('abc', $this->printLongestSubStringWithoutRepeatingCharacters('abc'));
        $this->assertSame('b', $this->printLongestSubStringWithoutRepeatingCharacters('bbbbb'));
        $this->assertSame('wke', $this->printLongestSubStringWithoutRepeatingCharacters('pwwkew'));
    }
}
