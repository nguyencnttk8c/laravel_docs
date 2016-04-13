<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Document, Request, App\Models\Taxonomy;

class DocByTaxonomyController extends Controller {
	public function getList(Request $request, $slug) {
		$data = [
			'title' => 'Nhà sách online'
		];

		$allTaxonomy = Taxonomy::all();

		$category = Taxonomy::where('slug', $slug)->first();

		if ($category) {
            $listID = array($category->id);

            foreach ($allTaxonomy as $item) {
                if (in_array($item->parent, $listID)) {
                    $listID[] = $item->id;
                }
            }
            
            $allDocs = Document::whereIn('tax_id', $listID)->orderBy('id', 'desc')->paginate(16);
            $appends = \FuncCommon::appendToPaginate(array('trang'));
		    $allDocs->setPath('/danh-muc/'.$slug);
		    $allDocs->appends($appends);
		    $data['results'] = $allDocs;
		    $data['category'] = $category->tax_name;
		}
		return view('frontend.category', ['data' => $data]);
	}
}