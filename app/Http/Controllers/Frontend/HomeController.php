<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Document;

class HomeController extends Controller {
	public function getIndex() {
		$data = [
			'title' => 'Nhà sách online'
		];
		$lastestDoc = Document::take(8)->orderBy('created_at', 'desc')->get();

		if (count($lastestDoc) > 0) {
			$data['lastestDoc'] = $lastestDoc;
		}

		$highestDownload = Document::join('doc_meta', 'document.id', '=', 'doc_meta.doc_id')
									->orderBy('num_downloaded', 'desc')->take(8)->get();

		if (count($highestDownload) > 0) {
			$data['highestDownload'] = $highestDownload;
		}

		$hightestView = Document::join('doc_meta', 'document.id', '=', 'doc_meta.doc_id')
									->orderBy('num_viewed', 'desc')->take(8)->get();

		if (count($hightestView) > 0) {
			$data['hightestView'] = $hightestView;
		}
		
		return view('frontend.index', ['data' => $data]);
	}
} 