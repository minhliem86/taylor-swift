<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Session;
use Event;
use App\Events\SendEmail;
use Mail;
use Excel;
use Carbon\Carbon;
use GuzzleHttp\Client;
use SoapBox\Formatter\Formatter;
use File;

class ParfaromeController extends Controller {

	public $province_pub = array(
		'Special Region of Aceh'=> 'Special Region of Aceh',
		'Bali'=>'Bali',
		'Bangka–Belitung Islands'=>'Bangka–Belitung Islands',
		'Banten'=>'Banten',
		'Bengkulu'=>'Bengkulu',
		'Central Java'=>'Central Java',
		'Central Kalimantan'=>'Central Kalimantan',
		'Central Sulawesi'=>'Central Sulawesi',
		'East Java'=>'East Java',
		'East Kalimantan' =>'East Kalimantan',
		'East Nusa Tenggara'=>'East Nusa Tenggara',
		'Gorontalo'=>'Gorontalo',
		'Jakarta Special Capital Region'=>'Jakarta Special Capital Region',
		'Jambi'=>'Jambi',
		'Lampung'=>'Lampung',
		'Maluku'=>'Maluku',
		'North Kalimantan'=>'North Kalimantan',
		'North Maluku'=>'North Maluku',
		'North Sulawesi'=>'North Sulawesi',
		'North Sumatra'=>'North Sumatra',
		'Special Region of Papua'=>'Special Region of Papua',
		'Riau'=>'Riau',
		'Riau Islands'=>'Riau Islands',
		'Southeast Sulawesi'=>'Southeast Sulawesi',
		'South Kalimantan'=>'South Kalimantan',
		'South Sulawesi'=>'South Sulawesi',
		'South Sumatra'=>'South Sumatra',
		'West Java'=>'West Java',
		'West Kalimantan'=>'West Kalimantan',
		'West Nusa Tenggara'=>'West Nusa Tenggara',
		'Special Region of West Papua'=>'Special Region of West Papua',
		'West Sulawesi'=>'West Sulawesi',
		'West Sumatra'=>'West Sumatra',
		'Special Region of Yogyakarta'=>'Special Region of Yogyakarta'
	);

	public $profile_pub = array(
		'Distributor'=>'Distributor',
		'Retailer'=>'Retailer',
		'Sales Agent'=>'Sales Agent',
		'Other'=>'Other',
	);

	public function filexml(){
		return base_path("resources/files/listClient.xml");
	}

	public $listCity = array();

	public function getListCity(){
		$file = base_path('resources/files/listcity.xls');
		if($file){
			Excel::load($file,function($reader){
				$reader->each(function($sheet){
						$this->listCity[$sheet->toArray()['idcity']] = $sheet->toArray()['city'];
				});
			});
			return $this->listCity;

		}else{
			return 'File not found';
		}
	}
	public function buildXMLClient(){
		$file = base_path('resources/files/listclient.xls');
		if($file){
			if(File::exists($this->filexml())){

				Excel::load($file,function($reader){
					$reader->each(function($sheet){
						$xml = simplexml_load_file($this->filexml());
						$row = $xml->addChild('row');
						$row->addChild('client',$sheet->toArray()['client']);
						$row->addChild('address',$sheet->toArray()['address']);
						$row->addChild('idcity',$sheet->toArray()['idcity']);
						$xml->saveXML($this->filexml());
					});
				});
			}else{
				$viewxml = view('reports.listClient')->render();
				File::put($filexml,$viewxml);
			}
		}else{
			return 'File not found';
		}

		return "Done";
	}

	public function getListClient(Request $request){
		if($request->ajax()){
			$xml = simplexml_load_file($this->filexml());
			$formatter = Formatter::make($xml, Formatter::XML);
			$data = $formatter->toArray();
			$arr_data = [];
			foreach($data['row'] as $row){
				if(in_array($request->idcity, $row)){
					array_push($arr_data,$row);
				}
			}
			$view = view('client',compact('arr_data'))->render();
			return response()->json(['mes'=>$view]);
		}else{
			abort(404);
		}

	}

	public function getRegisterTaylor(){
		$arr_city = $this->getListCity();
		return view('register',compact('arr_city'));
	}

	public function postRegisterTaylor(RegisterRequest $request){
		$name = $request->get('fullname');
		$email = $request->get('email');
		$phone = $request->get('phone');
		$city = $request->get('city');
		$shop = $request->get('shop');
		$feedback = $request->get('feedback');

		$client = new Client(['base_uri'=>'http://api.gibaroma.com/api/lead/createnewlead']);
		$result = $client->get('http://api.gibaroma.com/api/lead/createnewlead',[
			'query'=>['campaign'=>'parfarome-taylor','fullname'=>$name,'email'=>$email,'address'=>'','province'=>$city,'country'=>'Indonesia','phone'=>$phone,'profile'=>$shop,'message'=>$feedback]
		]);

		Session::flash('status', 'done');
		Session::flash('email', $email);

		return redirect()->route('thankyou');
	}

	public function thankyou(){
		if(Session::has('status')){
			Event::fire(new SendEmail(Session::get('email')));
			return view('thankyou');
		}else{
			return redirect()->route('getRegisterTaylor');
		}
	}

	public function refreshcaptcha(){
		return captcha_img();
	}

	public function getReport(){
		$client = new Client(['base_uri'=>'http://api.gibaroma.com/api/lead']);
		$response = $client->get('http://api.gibaroma.com/api/lead');
		$body = $response->getBody();
		$data = json_decode($body->getContents());
		dd($data);
		return view('report',compact('data'));
	}

	public function getDownloadReport(){
		$file = public_path().'/resources/report/report.xml';
		$xml = simplexml_load_file($file);
		$formatter = Formatter::make($xml, Formatter::XML);
		$data = $formatter->toArray();

		$dataplus = array(array('Name','Email','Address','phone','profile','province','feedback','created at'));
		foreach($data['row'] as $val){
			$dataplus []= array($val['name'],$val['email'],$val['address'],$val['phone'],$val['profile'],$val['province'],$val['feedback'],$val['created']);
		};


		$now = Carbon::now();
		Excel::create('report-'.$now,function($excel) use ($dataplus){
			 $excel->setTitle('Report Parfarome');
			 $excel->sheet('Sheet 1',function($sheet) use ($dataplus){
			 	$sheet->cells('A1:H1',function($cell){
			 		$cell->setBackground('#6abbed');
			 	});

			 // 	$datahead = array(
				// 	array('Name','Email','Address','phone','profile','province','feedback','created at'),
				// );

				// array_push($datahead, $dataplus);

			 	$sheet->fromArray($dataplus,null,'A1',false,false);
			 });
		})->download('xls');
	}



}
