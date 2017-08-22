<?php

namespace IdeHelper\Test\TestCase\Shell;

use Cake\Console\ConsoleIo;
use IdeHelper\Shell\AnnotationsShell;
use Tools\TestSuite\ConsoleOutput;
use Tools\TestSuite\TestCase;

class AnnotationsShellTest extends TestCase {

	/**
	 * @var array
	 */
	public $fixtures = [
		'plugin.ide_helper.cars',
		'plugin.ide_helper.wheels',
	];

	/**
	 * @var \IdeHelper\Shell\AnnotationsShell|\PHPUnit_Framework_MockObject_MockObject
	 */
	protected $Shell;

	/**
	 * @var \Tools\TestSuite\ConsoleOutput
	 */
	protected $out;

	/**
	 * @var \Tools\TestSuite\ConsoleOutput
	 */
	protected $err;

	/**
	 * @return void
	 */
	public function setUp() {
		parent::setUp();

		if (!is_dir(LOGS)) {
			mkdir(LOGS, 0770, true);
		}

		$this->out = new ConsoleOutput();
		$this->err = new ConsoleOutput();
		$io = new ConsoleIo($this->out, $this->err);

		$this->Shell = $this->getMockBuilder(AnnotationsShell::class)
			->setMethods(['in', '_stop', '_storeFile'])
			->setConstructorArgs([$io])
			->getMock();
	}

	/**
	 * @return void
	 */
	public function tearDown() {
		parent::tearDown();
		unset($this->Shell);
	}

	/**
	 * @return void
	 */
	public function _testModels() {
		$this->Shell->runCommand(['models', '-d', '-v', '-r']);

		$output = $this->out->output();
		$this->assertTextContains('   -> 2 annotations added', $output);
	}

	/**
	 * @return void
	 */
	public function testView() {
		$this->Shell->runCommand(['view', '-d', '-v', '-r']);

		$output = $this->out->output();
		$this->assertTextContains('   -> 2 annotations added', $output);
	}

	/**
	 * @return void
	 */
	public function testHelpers() {
		$this->Shell->runCommand(['helpers', '-d', '-v', '-r']);

		$output = $this->out->output();
		$this->assertTextContains(' annotations added', $output);
	}

	/**
	 * @return void
	 */
	public function testComponents() {
		$this->Shell->runCommand(['components', '-d', '-v', '-r']);

		$output = $this->out->output();
		$this->assertTextContains(' annotations added', $output);
	}

	/**
	 * @return void
	 */
	public function testShells() {
		$this->Shell->runCommand(['shells', '-d', '-v', '-r']);

		$output = $this->out->output();
		$this->assertTextContains(' annotations added', $output);
	}

	/**
	 * @return void
	 */
	public function testTemplates() {
		$this->Shell->runCommand(['templates', '-d', '-v', '-r']);

		$output = $this->out->output();
		$this->assertTextContains('   -> 2 annotations added', $output);
	}

	/**
	 * @return void
	 */
	public function testControllers() {
		$this->Shell->runCommand(['controllers', '-d', '-v', '-r']);
		$output = (string)$this->out->output();

		$this->assertTextContains('BarController', $output);
		$this->assertTextContains('   -> 4 annotations added', $output);
		$this->assertTextContains('FooController', $output);
		$this->assertTextContains('   -> 1 annotations added', $output);
	}

	/**
	 * @return void
	 */
	public function testAll() {
		$result = $this->Shell->runCommand(['all', '-d', '-v', '-r']);
		$this->assertTrue($result);

		$output = (string)$this->out->output();

		$this->assertTextContains('[Models]', $output);
		$this->assertTextContains('[Controllers]', $output);
		$this->assertTextContains('[View]', $output);
		$this->assertTextContains('[Templates]', $output);
		$this->assertTextContains('[Shells]', $output);
		$this->assertTextContains('[Components]', $output);
		$this->assertTextContains('[Helpers]', $output);
	}

	/**
	 * @return void
	 */
	public function testAllCiMode() {
		$result = $this->Shell->runCommand(['all', '-d', '-v', '-r', '--ci']);
		$this->assertFalse($result);
	}

}
