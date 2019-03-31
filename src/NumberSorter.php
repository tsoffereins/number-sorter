<?php namespace NumberSorter;

use NumberToWords\NumberToWords;
use NumberToWords\NumberTransformer\NumberTransformer;
use TypeError;

class NumberSorter
{
	/** @var NumberTransformer */
	private $numberTransformer;

	/**
	 * @param string $language
	 */
	public function __construct($language = 'en')
	{
		$this->numberTransformer = (new NumberToWords())->getNumberTransformer($language);
	}

	/**
	 * @param array $list
	 * @return array
	 */
	public function sort(array $list)
	{
		$clonedList = $list;

		usort(
			$clonedList,
			/**
			 * @param mixed $a
			 * @param mixed $b
			 * @return int
			 */
			function($a, $b) {
				$a = $this->stringify($a);
				$b = $this->stringify($b);

				return $a === $b ? 0 : $a < $b ? -1 : 1;
			}
		);

		return $clonedList;
	}

	/**
	 * @param mixed $input
	 * @return string
	 */
	private function stringify($input)
	{
		if (is_numeric($input) === false) {
			throw new TypeError("Expected an array of numeric values, non numeric entry found");
		}

		$number = floatval($input);
		$natural = (int) floor($number);
		$decimal = (int) substr((string) ($number - $natural), 2);

		$string = $this->numberTransformer->toWords($natural);

		if ($decimal > 0) {
			$string .= $this->numberTransformer->toWords($decimal);
		}

		return $string;
	}
}
