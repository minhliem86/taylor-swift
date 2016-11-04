<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'fullname'=>'required|max:25',
			'email' => 'required|email',
			// 'profile' =>'required',
			'phone' => 'required|digits_between:7,20',
			// 'province' => 'required',
			'feedback'=>'max:100',
			'captcha' => 'required|captcha'

		];
	}

	public function messages(){
		return[
			'captcha.required' => 'Please fill the captcha code',
			'captcha.captcha' => 'Wrong captcha code',
		];
	}

}
