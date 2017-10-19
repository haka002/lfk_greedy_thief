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
	 * @covers Haka002\GreedyThief\GreedyThief
	 *
	 * @dataProvider invalidInputProvider
	 *
	 * @expectedException InvalidArgumentException
	 */
	public function testInvalidInput(array $itemList, $maximumWeight)
	{
		$this->greedyThief->greedyThief($itemList, $maximumWeight);
	}

	/**
	 * @param array $expected
	 * @param int   $maximumWeight
	 * @param array $itemList
	 *
	 * @covers Haka002\GreedyThief\GreedyThief
	 *
	 * @dataProvider validInputProvider
	 */
	public function testValidInput(array $expected, $maximumWeight, array $itemList)
	{
		$thiefBag = $this->greedyThief->greedyThief($itemList, $maximumWeight);

		$this->assertEquals(
			ksort($expected),
			ksort($thiefBag)
		);
	}

	/**
	 * @return array
	 */
	public function invalidInputProvider()
	{
		return [
			[[], 'almafa'],
		];
	}

	/**
	 * @return array
	 */
	public function validInputProvider()
	{
		return [
			[
				[
					['weight' => 2, 'price' => 6],
					['weight' => 2, 'price' => 3],
					['weight' => 4, 'price' => 6],
				],
				10,
				[
					['weight' => 2, 'price' => 6],
					['weight' => 4, 'price' => 6],

					['weight' => 2, 'price' => 3],
					['weight' => 6, 'price' => 5],
					['weight' => 5, 'price' => 4],
				]
			],
			[
				[
					['weight' => 9, 'price' => 5]
				],
				10,
				[
					['weight' => 9, 'price' => 1],
					['weight' => 9, 'price' => 2],
					['weight' => 9, 'price' => 3],
					['weight' => 9, 'price' => 4],
					['weight' => 9, 'price' => 5],
				]
			],
			[
				[
					['weight' => 2, 'price' => 2],
					['weight' => 3, 'price' => 3],
					['weight' => 4, 'price' => 5]
				],
				10,
				[
					['weight' => 1, 'price' => 1],
					['weight' => 2, 'price' => 2],
					['weight' => 3, 'price' => 3],
					['weight' => 4, 'price' => 4],
					['weight' => 5, 'price' => 5],
				]
			],
			[
				[
					['weight' => 10, 'price' => 10]
				],
				10,
				[
					['weight' => 2, 'price' => 2],
					['weight' => 2, 'price' => 2],
					['weight' => 2, 'price' => 2],
					['weight' => 2, 'price' => 2],
					['weight' => 2, 'price' => 2],
					['weight' => 10, 'price' => 5],
					['weight' => 5, 'price' => 5],
				]
			],
			[
				[
					[]
				],
				8,
				[
					['weight' => 9, 'price' => 1],
					['weight' => 9, 'price' => 2],
					['weight' => 9, 'price' => 3],
					['weight' => 9, 'price' => 4],
					['weight' => 9, 'price' => 5]
				]
			],

		];
	}
}
