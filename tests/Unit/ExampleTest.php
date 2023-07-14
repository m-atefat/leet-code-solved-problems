<?php

namespace Tests\Unit;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $string = 'asa';
        $this->assertTrue($this->check($string));
    }

    private function check(string $string): bool
    {
        $reverseString = '';

        for ($i = strlen($string) - 1; $i >= 0; $i--) {
            $reverseString .= $string[$i];
        }

        if ($reverseString === $string)
            return true;

        return false;
    }
}
