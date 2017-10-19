<?php

namespace Haka002\GreedyThief;

use InvalidArgumentException;

class GreedyThief
{
	/**
	 * @param array $items
	 * @param int   $maximumWeight
	 *
	 * @return array
	 *
	 * @throws InvalidArgumentException In case of invalid input.
	 */
	public function greedyThief(array $items, $maximumWeight)
	{
		if (!is_integer($maximumWeight))
		{
			throw new InvalidArgumentException('The first argument must be an array and the second one must be an integer, please fix it!');
		}

		return [];
	}
}
