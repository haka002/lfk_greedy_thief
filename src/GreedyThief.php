<?php

namespace Haka002\GreedyThief;

use InvalidArgumentException;

class GreedyThief
{
	/**
	 * @param array $items The items what the thief could stealth.
	 * @param int   $n     How many kg space is in the bag.
	 *
	 * @return array
	 *
	 * @throws InvalidArgumentException In case of invalid input.
	 */
	public function greedyThief(array $items, $n)
	{
		if (!is_integer($n))
		{
			throw new InvalidArgumentException('The first argument must be an array and the second one must be an integer, please fix it!');
		}

		$capacityDesc       = $n;
		$collectedBagByDesc = $this->collectItemsByRatio($items, $capacityDesc);
		$capacityAsc        = $n;
		$collectedBagByAsc  = $this->collectItemsByRatio($items, $capacityAsc, false);

		return $capacityAsc < $capacityDesc
			? $collectedBagByAsc
			: $collectedBagByDesc;
	}

	/**
	 * @param array $items
	 * @param bool  $orderedByDesc
	 *
	 * @return array
	 */
	private function sortByRatio(array &$items, $orderedByDesc = true)
	{
		if ($orderedByDesc)
		{
			usort(
				$items,
				function ($item1, $item2)
				{
					if ($item1["price"] / $item1["weight"] == $item2['price'] / $item2["weight"])
					{
						return $item1["price"] < $item2['price']
							? -1
							: 1;
					}

					return $item1["price"] / $item1["weight"] < $item2['price'] / $item2["weight"]
						? -1
						: 1;
				}
			);
		}
		else{
			usort(
				$items,
				function ($item1, $item2)
				{
					if ($item1["price"] / $item1["weight"] == $item2['price'] / $item2["weight"])
					{
						return $item1["price"] > $item2['price']
							? -1
							: 1;
					}

					return $item1["price"] / $item1["weight"] < $item2['price'] / $item2["weight"]
						? -1
						: 1;
				}
			);
		}
	}

	/**
	 * Collect the items in the bag ordered by the highest ratio and if them equals order by price.
	 *
	 * @param array $items
	 * @param int   $capacity
	 * @param bool  $orderByDesc The secondary order direction.
	 *
	 * @return array
	 */
	private function collectItemsByRatio(array $items, &$capacity, $orderByDesc = true)
	{
		$this->sortByRatio($items, $orderByDesc);
		$bag   = [];

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
}
