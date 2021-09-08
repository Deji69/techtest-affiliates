<?php
namespace Tests\Unit\Models;

use App\Models\Affiliate;
use Tests\TestCase;

class AffiliateTest extends TestCase {
	/**
	 * A basic unit test example.
	 *
	 * @return void
	 */
	public function test_get_all()
	{
		$affiliates = Affiliate::getAll();

		$this->assertNotEmpty($affiliates);

		foreach ($affiliates as $affiliate) {
			$this->assertTrue($affiliate instanceof Affiliate);
		}
	}
}
