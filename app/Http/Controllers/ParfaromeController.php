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


	public function getRegister(){
		$province = $this->province_pub;
		$profile = $this->profile_pub;
		return view('register')->with(compact('province','profile'));
	}

	public function getRegisterBahasa(){
		$province = $this->province_pub;
		$profile = $this->profile_pub;
		return view('registerBahasa')->with(compact('province','profile'));
	}



	public function postRegister(RegisterRequest $request){
		$name = $request->get('fullname');
		$email = $request->get('email');
		$address = $request->get('address');
		$phone = $request->get('phone');
		$profile = $request->get('profile');
		$province = $request->get('province');
		$feedback = $request->get('feedback');

		$time = Carbon::now();
		$created_at = $time->toDateTimeString();
		$view = view('reports.log',compact('name','email','address','phone','profile','province','feedback','created_at'))->render();
		$file = public_path().'/resources/report/report.xml';

		if(\File::exists($file)){
			$xml = simplexml_load_file($file);
			$row = $xml->addChild('row');
			$row->addChild('name',$name);
			$row->addChild('email',$email);
			$row->addChild('address',$address);
			$row->addChild('phone',$phone);
			$row->addChild('profile',$profile);
			$row->addChild('province',$province);
			$row->addChild('feedback',$feedback);
			$row->addChild('created',$created_at);

			$xml->saveXML($file);
		}else{

		}

		$client = new Client(['base_uri'=>'http://api.gibaroma.com/api/lead/createnewlead']);
		$result = $client->get('http://api.gibaroma.com/api/lead/createnewlead',[
			'query'=>['campaign'=>'parfarome','fullname'=>$name,'email'=>$email,'address'=>$address,'province'=>$province,'country'=>'Indonesia','phone'=>$phone,'profile'=>$profile,'message'=>$feedback]
		]);

		Session::flash('status', 'done');
		Session::flash('email', $email);



		return redirect()->route('thankyou');
	}

	public function getRegisterTaylor(){
		return view('register');
	}

	public function postRegisterTaylor(RegisterRequest $request){
		$name = $request->get('fullname');
		$email = $request->get('email');
		$address = $request->get('address');
		$phone = $request->get('phone');
		$feedback = $request->get('feedback');

		$client = new Client(['base_uri'=>'http://api.gibaroma.com/api/lead/createnewlead']);
		$result = $client->get('http://api.gibaroma.com/api/lead/createnewlead',[
			'query'=>['campaign'=>'parfarome-taylor','fullname'=>$name,'email'=>$email,'address'=>$address,'province'=>'null','country'=>'Indonesia','phone'=>$phone,'profile'=>'null','message'=>$feedback]
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
		// return public_path();
		$file = public_path().'/resources/report/report.xml';
		$xml = simplexml_load_file($file);
		return view('report')->with(compact('xml'));
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
