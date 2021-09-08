<?php
namespace App\Http\Controllers;

use App\Models\Affiliate;

class AffiliateController extends Controller
{
	public function index()
	{
		$affiliates = Affiliate::getAll()->sortBy('id')->filter(function(Affiliate $affiliate) {
			return $affiliate->getDistanceFromOffice() < 100;
		});
		return view('affiliates', ['affiliates' => $affiliates]);
	}
}
