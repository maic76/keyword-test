<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$urls = [
			'https://www.nytimes.com/wirecutter/reviews/best-pubic-hair-trimmer/',
			'https://www.instash.com/best-pubic-hair-trimmers/',
			'https://www.hairclippersclub.com/6-best-pubic-hair-trimmers-for-men-women/',
			'https://care.ladieshaircaring.com/pubic-hair-trimmer/',
		];
		foreach ($urls as $url) {
			DB::table('websites')->insert([
				'url' => $url,
				'created_at' => now(),
				'updated_at' => now(),
			]);
		}
	}
}
