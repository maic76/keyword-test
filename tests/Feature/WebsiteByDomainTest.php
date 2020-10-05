<?php

namespace Tests\Feature;

use Tests\TestCase;

class WebsiteByDomainTest extends TestCase
{
	/**
	 * Test for www urls
	 *
	 * @return void
	 */
	public function testWithWww()
	{
		// Make sure we get results when searching for domains with www
		$this->postJson('/api/websites/search', ['domain' => 'www.nytimes.com'])
			->assertJsonFragment(['url' => 'https://www.nytimes.com/wirecutter/reviews/best-pubic-hair-trimmer/']);
		$this->postJson('/api/websites/search', ['domain' => 'www.hairclippersclub.com'])
			->assertJsonFragment(['url' => 'https://www.hairclippersclub.com/6-best-pubic-hair-trimmers-for-men-women/']);
		$this->postJson('/api/websites/search', ['domain' => 'www.instash.com'])
			->assertJsonFragment(['url' => 'https://www.instash.com/best-pubic-hair-trimmers/']);

		// Test with wrong data
		$this->postJson('/api/websites/search', ['domain' => 'www.hairclipperscub.com'])
			->assertStatus(404)
			->assertJson(['error' => 'No URL found']);
		$this->postJson('/api/websites/search', ['domain' => 'www.hairclippersclub.com.uk'])
			->assertStatus(404)
			->assertJson(['error' => 'No URL found']);
	}

	/**
	 * Test for results with simple domain.com
	 *
	 * @return void
	 */
	public function testWithOnlyDomain()
	{
		// Test with simple domains
		$this->postJson('/api/websites/search', ['domain' => 'ladieshaircaring.com'])
			->assertJsonFragment(['url' => 'https://care.ladieshaircaring.com/pubic-hair-trimmer/']);
		$this->postJson('/api/websites/search', ['domain' => 'instash.com'])
			->assertJsonFragment(['url' => 'https://www.instash.com/best-pubic-hair-trimmers/']);
		$this->postJson('/api/websites/search', ['domain' => 'nytimes.com'])
			->assertJsonFragment(['url' => 'https://www.nytimes.com/wirecutter/reviews/best-pubic-hair-trimmer/']);

		// Test with wrong data
		$this->postJson('/api/websites/search', ['domain' => 'google.com'])
			->assertStatus(404);
		$this->postJson('/api/websites/search', ['domain' => 'instash.com.co'])
			->assertStatus(404);
	}

	/**
	 * Assert that the code returns URLs with sub-domain
	 *
	 * @return void
	 */
	public function testWithSubdomain()
	{
		// Test for urls with subdomain
		$this->postJson('/api/websites/search', ['domain' => 'care.ladieshaircaring.com'])
			->assertJsonFragment(['url' => 'https://care.ladieshaircaring.com/pubic-hair-trimmer/']);

		// Test with wrong data
		$this->postJson('/api/websites/search', ['domain' => 'fake.ladieshaircaring.com'])
			->assertStatus(404)
			->assertJson(['error' => 'No URL found']);
		$this->postJson('/api/websites/search', ['domain' => 'www.ladieshaircaring.com'])
			->assertStatus(404)
			->assertJson(['error' => 'No URL found']);
	}

	/**
	 * Test for URLs with slug
	 *
	 * @return void
	 */
	public function testWithSlug()
	{
		// Search with slug
		$this->postJson('/api/websites/search', ['domain' => 'ladieshaircaring.com/pubic-hair-trimmer/'])
			->assertJsonFragment(['url' => 'https://care.ladieshaircaring.com/pubic-hair-trimmer/']);
		// Test with wrong data
		$this->postJson('/api/websites/search', ['domain' => 'ladieshaircaring.com/fake-slug/'])
			->assertStatus(404)
			->assertJson(['error' => 'No URL found']);
	}

	/**
	 * Test for sub-domain and slug
	 *
	 * @return void
	 */
	public function testBySubdomainAndSlug()
	{
		// Test for URLs with both subdomain and slug
		$this->postJson('/api/websites/search', ['domain' => 'care.ladieshaircaring.com/pubic-hair-trimmer/'])
			->assertJsonFragment(['url' => 'https://care.ladieshaircaring.com/pubic-hair-trimmer/']);

		// Test with wrong data
		$this->postJson('/api/websites/search', ['domain' => 'care.ladieshaircaring.com/fake-slug/'])
			->assertStatus(404)
			->assertJson(['error' => 'No URL found']);
		$this->postJson('/api/websites/search', ['domain' => 'fake.ladieshaircaring.com/fake-slug/'])
			->assertStatus(404)
			->assertJson(['error' => 'No URL found']);
	}

	/**
	 * Use the complete or partial URL
	 *
	 * @return void
	 */
	public function testByUrl()
	{
		// Test with full url
		$this->postJson('/api/websites/search', ['domain' => 'https://www.nytimes.com/wirecutter/reviews/best-pubic-hair-trimmer/'])
			->assertJsonFragment(['url' => 'https://care.ladieshaircaring.com/pubic-hair-trimmer/']);
		// Test with URL and trailing slash
		$this->postJson('/api/websites/search', ['domain' => 'https://www.nytimes.com/'])
			->assertJsonFragment(['url' => 'https://care.ladieshaircaring.com/pubic-hair-trimmer/']);
		// Test with URL and no trailing slash
		$this->postJson('/api/websites/search', ['domain' => 'https://www.nytimes.com'])
			->assertJsonFragment(['url' => 'https://care.ladieshaircaring.com/pubic-hair-trimmer/']);
	}
}
