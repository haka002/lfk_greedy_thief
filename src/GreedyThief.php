<?php

namespace Haka002\GreedyThief;

use InvalidArgumentException;

class GreedyThief
{
	/**
	 * @param array $items    The items what the thief could stealth.
	 * @param int   $capacity How many kg space is in the bag.
	 *
	 * @return array
	 *
	 * @throws InvalidArgumentException In case of invalid input.
	 */
	public function greedyThief(array $items, $capacity)
	{
		if (!is_integer($capacity))
		{
			throw new InvalidArgumentException('The first argument must be an array and the second one must be an integer, please fix it!');
		}

		$bag   = [];
		$items = $this->sortByPrice($items);

		while (
			$capacity !== 0
			&& count($items) > 0
		) {
			$item = array_pop($items);

			if ($capacity >= $item['weight'])
			{
				$bag[]     = $item;
				$capacity -= $item['weight'];
			}
		}

		return $bag;
	}

	/**
	 * @param array $items
	 *
	 * @return array
	 */
	private function sortByPrice(array $items)
	{
		usort(
			$items,
			function ($item1, $item2)
			{
				return $item1["price"] < $item2['price']
					? -1
					: 1;
			}
		);

		return $items;
	}
}
