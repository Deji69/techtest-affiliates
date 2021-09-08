<?php
namespace Tests\Unit\Services;

use App\Services\Geo;
use Tests\TestCase;

class GeoTest extends TestCase
{
	/**
	 * A basic unit test example.
	 *
	 * @dataProvider cases_calculate_distance_between
	 */
	public function test_calculate_distance_from($latFrom, $lngFrom, $latTo, $lngTo, $est)
	{
		$dist = Geo::calculateDistanceBetween($latFrom, $lngFrom, $latTo, $lngTo);
		$this->assertEqualsWithDelta($est, $dist, 0.01);
	}

	public function cases_calculate_distance_between()
	{
		return [
			[53.747940, -20.051538, 53.748051, -20.049703, 121.28],
			[53.747940, -20.051538, 35.816651, -39.124193, 2481428.87],
		];
	}
}
