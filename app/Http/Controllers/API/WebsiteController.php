<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
	/**
	 * List all the websites
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index(Request $request)
	{
		$websites = Website::all();
		return response()->json($websites);
	}

	/**
	 * Get a specific website using the user domain input
	 *
	 * @TODO: Write some code here so users can retrieve URLs following the instructions
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function search(Request $request)
	{
		// The domain sent from the input
		$domain = $request->domain;

		if (empty($domain)) {
			return response()->json(['error' => 'Invalid domain']);
		}

		// If no results
		if (empty($results)) {
			return response()->json(['error' => 'No URL found'], 404);
		}
    }
}
