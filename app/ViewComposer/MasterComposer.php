<?php
namespace App\ViewComposer;
use Illuminate\View\View;
use App\Models\Setting;
use Request;

class MasterComposer {

	public function __construct() {

	}
	public function compose(View $view) {
		$dashboard=Setting::first();
		// dd($dashboard);

		$data = $view->getData();
		// dd($data);
		if(!isset($data['og']))
		{
			$og = array('title'=>'','description'=>'','keywords'=>'');

	                $og['title'] = $dashboard->page_title ??'';
	                $og['description'] = $dashboard->meta_description??'';
	                $og['keywords'] = $dashboard->keyword??'';
	                $og['image'] = '';
					// dd($og);

		    $view->with(['og'=>$og]);
		}

	}
}