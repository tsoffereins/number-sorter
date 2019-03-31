<?php namespace NumberSorter\Test;

use PHPUnit\Framework\TestCase;
use NumberSorter\NumberSorter;
use TypeError;

class NumberSorterTest extends TestCase
{
	/**
	 * @test
	 */
	public function shouldThrowTypeErrorWhenTheGivenListContainsANonNumericValue()
	{
		$sorter = new NumberSorter('en');

		$this->expectException(TypeError::class);

		$sorter->sort([1, 2, 'foo']);
	}

	/**
	 * @test
	 */
	public function shouldSortIntegersAlphabetically()
	{
		$sorter = new NumberSorter('en');

		$result = $sorter->sort([104, 3, 5, 2000000, 6, 12, 2000]);

		$this->assertEquals([5, 104, 6, 3, 12, 2000000, 2000], $result);
	}

	/**
	 * @test
	 */
	public function shouldSortFloatsAlphabetically()
	{
		$sorter = new NumberSorter('en');

		$result = $sorter->sort([0.45, 1.76, 3.65, 3.68, 3.4]);

		$this->assertEquals([1.76, 3.4, 3.68, 3.65, 0.45], $result);
	}

	/**
	 * @test
	 */
	public function shouldSortNumericalStringsAlphabetically()
	{
		$sorter = new NumberSorter('en');

		$result = $sorter->sort(['0.45', '1', '7055508312', '3.68', '54']);

		$this->assertEquals(['54', '1', '7055508312', '3.68', '0.45'], $result);
	}

	/**
	 * @test
	 */
	public function shouldSortNumbersInOtherLanguageAlphabetically()
	{
		$sorter = new NumberSorter('nl');

		$result = $sorter->sort([104, 3, 5, 2000000, 6, 12, 2000]);

		$this->assertEquals([3, 104, 12, 2000000, 2000, 5, 6], $result);
	}

	/**
	 * @test
	 */
	public function shouldNotMutateInputArrayWhenSorting()
	{
		$input = [1, 2, 3];

		$sorter = new NumberSorter('nl');

		$sorter->sort($input);

		$this->assertEquals([1, 2, 3], $input);
	}
}
