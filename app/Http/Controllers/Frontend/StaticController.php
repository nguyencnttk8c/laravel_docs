<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Articles, App\Models\Taxonomy;

class StaticController extends Controller {
	public function getArticleList($slug) {
		$query = Taxonomy::where('slug', $slug)->first();

		if (count($query) > 0) {
			$data = [
				'title' => $query->tax_name,
				'siderbar' => $query->slug
			];

			$data['content'] = Articles::where('category', $query->id)->where('status', 1)->get();
			return view('frontend.static', ['data' => $data]);
		}
	}

	public function getArticleDetail($slug) {
		$query = Articles::where('slug', $slug)->first();

		if (count($query) > 0) {
			$data = [
				'title' => $query->title
			];

			$taxonomy = Taxonomy::find($query->category);

			$data['siderbar'] = $taxonomy->slug;

			// Tin liên quan

			$data['related_news'] = Articles::where('category', $query->category)->where('id', '!=', $query->id)->get();

			$data['content'] = $query;

			return view('frontend.static_detail', ['data' => $data]);
		}
	}
}