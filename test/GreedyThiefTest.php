<?php

use Haka002\GreedyThief\GreedyThief;

class GreedyThiefTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var GreedyThief
	 */
	private $greedyThief;

	public function setUp()
	{
		parent::setUp();

		$this->greedyThief = new GreedyThief();
	}

	/**
	 * @param array $itemList
	 * @param int   $maximumWeight
	 *
	 * @dataProvider invalidInputProvider
	 *
	 * @expectedException InvalidArgumentException
	 */
	public function testInvalidInput(array $itemList, $maximumWeight)
	{
		$this->greedyThief->greedyThief($itemList, $maximumWeight);
	}

	public function invalidInputProvider()
	{
		return [
			[[], 'almafa']
		];
	}
}
