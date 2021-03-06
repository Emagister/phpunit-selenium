<?php
/**
 * PHPUnit
 *
 * Copyright (c) 2010-2012, Sebastian Bergmann <sb@sebastian-bergmann.de>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Sebastian Bergmann nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package    PHPUnit_Selenium
 * @author     Giorgio Sironi <giorgio.sironi@asp-poli.it>
 * @copyright  2010-2012 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       http://www.phpunit.de/
 * @since      File available since Release ?.?.?
 */

require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

/**
 * Tests for PHPUnit_Extensions_SeleniumTestCase::suite().
 *
 * @package    PHPUnit_Selenium
 * @author     Giorgio Sironi <giorgio.sironi@asp-poli.it>
 * @copyright  2010-2012 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @version    Release: @package_version@
 * @link       http://www.phpunit.de/
 * @since      Class available since Release ?.?.?
 */
class Extensions_SeleniumSuiteBuildingTest extends PHPUnit_Framework_TestCase
{
    public function testSampleTestCaseBuildsAFullSuiteContainingAllItsTests()
    {
        $suite = Extensions_SeleniumTestCaseSample::suite('Extensions_SeleniumTestCaseSample');
        $this->assertInstanceOf('PHPUnit_Framework_TestSuite', $suite);
        $this->assertEquals(2, count($suite->tests()));
    }

    public function testAMultipleBrowsersTestCaseBuildsACopyOfEachTestForEachBrowser()
    {
        $suite = Extensions_SeleniumMultipleBrowsersTestCaseSample::suite('Extensions_SeleniumMultipleBrowsersTestCaseSample');
        $this->assertInstanceOf('PHPUnit_Framework_TestSuite', $suite);
        $this->assertEquals(2, count($suite->tests()));
    }
}

class Extensions_SeleniumTestCaseSample extends PHPUnit_Extensions_SeleniumTestCase
{
    public function testFirst() {}
    public function testSecond() {}
}

class Extensions_SeleniumMultipleBrowsersTestCaseSample extends PHPUnit_Extensions_SeleniumTestCase
{
    public static $browsers = array(
        array(
            'name'    => 'Firefox on Linux',
            'browser' => '*firefox',
            'host'    => 'localhost',
            'port'    => 4444,
            'timeout' => 30000,
        ),
        array(
            'name'    => 'Safari on MacOS X',
            'browser' => '*safari',
            'host'    => 'localhost',
            'port'    => 4444,
            'timeout' => 30000,
        ),
    );

    public function testSingle() {}
}
