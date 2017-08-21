<?php
	namespace LinkSpace\Http\Controllers;

	use LinkSpace\Http\Controllers\Controller;
	use LinkSpace\Link;
	use Illuminate\Http\Request;
	use Illuminate\Database\QueryException;
	use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

	class LinkController extends Controller{
		const HTTP_OR_HTTPS_REGEXP = "/^(http)(s)?:\/\//";
		const URL_REGEXP = "/^(http)(s)?:\/\/([a-z]+\.)?[a-z]{1,}(\.[a-z]{2,}){1,2}(\/(.*))*$/";
		const ID_REGEXP = "/^([1-9]){1}([0-9])*$/";

		public function get($id){
			if (!preg_match($this::ID_REGEXP, $id)){
				return redirect('/')->with('errorMessage', 'This ID is not valid');
			}
			$linkObject = new Link;
			try{
				$link = $linkObject->findOrFail($id);
				$link->incrementRedirects();
				return redirect($link->url);
			}catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
				return redirect('/')->with('errorMessage', 'This url doesn\'t exists');				
			}
		}

		public function main(){
			$link = new Link;
			return view('main')->with('links', $link->all()->take(20)->sortByDesc('id'));
		}

		public function getLastLinks(){
			$link = new Link;
			return $link->all()->take(10);
		}

		public function random(){
			$link = Link::inRandomOrder()->get()->take(1)[0];
			$link->redirects++;
			$link->save();
			return redirect($link->url);
		}

		public function save(Request $request){
			$url = $request->input('url');
			$name = $request->input('name');
			
			if (!preg_match($this::HTTP_OR_HTTPS_REGEXP, $url)){
				$url = "http://" . $url;
			}

			if (!preg_match($this::URL_REGEXP, $url)){
				return redirect('/')->with('errorMessage', 'This URL is not valid');
			}
			try {
				$linkObject = new Link;
				$linkObject->name = $name;
				$linkObject->url = $url;
				$linkObject->save();
				return redirect('/')->withInput();
			} catch (\Illuminate\Database\QueryException $e) {
				return redirect('/')->with('errorMessage', 'This URL already exists');
			}
		}
	}