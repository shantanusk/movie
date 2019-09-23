<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$data['result'] = $this->call_api();
		$this->load->view('welcome_message');
	}

	function call_api(){
		$movie = $this->input->post('movie');
		$url = "http://www.omdbapi.com/?s=".$movie."&apikey=138127be"; 
        $ch = curl_init($url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        $curl_scraped_page = curl_exec($ch); 
        curl_close($ch); 
		//echo $curl_scraped_page;
		//echo "<pre>";
		//return json_decode($curl_scraped_page, true);
		//print_r($result);
		$result =  json_decode($curl_scraped_page, true);
		if(is_array($result) && count($result)>0){
			if(array_key_exists('Error',  $result)){
				echo '<div class="col-12">Movies List Is Too Large To View!</div>';
			}else{
				foreach($result['Search'] as $movie){
					//print_r($movie);
					echo '<div class="col-4">
							<img class="thumb" src="'.(($movie['Poster'] == 'N/A') ? 'assets/image/noimage.jpg': $movie['Poster']).'" /><h2 align="center">'.$movie['Title'].'<br />'.$movie['Year'].'</h2></div>';
				}
			}
			
		}else{
			echo '<div class="col-12">No Movies Found!</div>';
		}
		//echo "test";
	}
}
