<?php
/**
 * Basic tests for Freemius stubs
 */

namespace FreemiusStubs\Tests;

use PHPUnit\Framework\TestCase;

class FreemiusTest extends TestCase
{
    /**
     * Test that the Freemius class exists in the stubs
     */
    public function testFreemiusClassExists()
    {
        $this->assertTrue(class_exists('Freemius'));
    }

    /**
     * Test that constant definitions exist
     */
    public function testConstantsExist()
    {
        $this->assertTrue(defined('WP_FS__SDK_VERSION'));
        $this->assertTrue(defined('WP_FS__DEV_MODE'));
    }

    /**
     * Test Freemius API interface
     */
    public function testFreemiusApiInterface()
    {
        $this->assertTrue(interface_exists('Freemius_Api_Interface'));
    }
} 