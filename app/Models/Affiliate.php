<?php
namespace App\Models;

use App\Services\Geo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class Affiliate {
	/** @var int */
	public $id;
	/** @var string */
	public $name;
	/** @var string */
	public $latitude;
	/** @var string */
	public $longitude;

	/**
	 * Get distance from office in km.
	 *
	 * @return float
	 */
	public function getDistanceFromOffice(): float
	{
		$officeLat = config('office.lat');
		$officeLng = config('office.lng');
		return Geo::calculateDistanceBetween($officeLat, $officeLng, $this->latitude, $this->longitude) / 1000;
	}

	/**
	 * @return Collection|Affiliate[]
	 */
	public static function getAll(): Collection
	{
		$entries = collect(explode("\n", Storage::get('affiliates.txt')))->map(function ($entry) {
			return \json_decode($entry);
		});
		$affiliates = [];

		if (!empty($entries)) {
			foreach ($entries as $entry) {
				$affiliates[] = Affiliate::fromJson($entry);
			}
		}

		return collect($affiliates);
	}

	public static function fromJson(object $data)
	{
		$affiliate = new Affiliate();
		$affiliate->id = $data->affiliate_id;
		$affiliate->name = $data->name;
		$affiliate->latitude = $data->latitude;
		$affiliate->longitude = $data->longitude;
		return $affiliate;
	}
}
