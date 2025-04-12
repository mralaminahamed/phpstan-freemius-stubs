<?php
/**
 * Tests for Freemius constants stubs
 */

namespace FreemiusStubs\Tests;

use PHPUnit\Framework\TestCase;

class ConstantsTest extends TestCase
{
    /**
     * Test that SDK version constant exists
     */
    public function testSdkVersionConstant()
    {
        $this->assertTrue(defined('WP_FS__SDK_VERSION'));
    }

    /**
     * Test that minimum SDK version constant exists
     */
    public function testMinSdkVersionConstant()
    {
        $this->assertTrue(defined('WP_FS__MIN_SDK_VERSION'));
    }

    /**
     * Test that endpoint constants exist
     */
    public function testEndpointConstants()
    {
        $this->assertTrue(defined('WP_FS__ADDRESS'));
        $this->assertTrue(defined('WP_FS__ACCOUNTS_ADDRESS'));
    }
} 