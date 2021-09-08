<?php
namespace App\Services;

class Geo {
	/**
	 * See: https://stackoverflow.com/a/10054282/1202953
	 *
	 * @param float $latFrom
	 * @param float $lngFrom
	 * @param float $latTo
	 * @param float $lngTo
	 * @return float
	 */
	public static function calculateDistanceBetween($latFrom, $lngFrom, $latTo, $lngTo): float
	{
		$latFrom = deg2rad($latFrom);
		$lngFrom = deg2rad($lngFrom);
		$latTo = deg2rad($latTo);
		$lngTo = deg2rad($lngTo);

		$latDelta = $latTo - $latFrom;
		$lonDelta = $lngTo - $lngFrom;

		$angle = 2 * asin(
			sqrt(
				pow(sin($latDelta / 2), 2)
				+ cos($latFrom)
				* cos($latTo)
				* pow(sin($lonDelta / 2), 2)
			)
		);
		return $angle * 6371000;
	}
}
