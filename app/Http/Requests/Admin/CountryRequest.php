<?php
/**
 * LaraClassified - Geo Classified Ads CMS
 * Copyright (c) Mayeul Akpovi. All Rights Reserved
 *
 * Email: mayeul.a@larapen.com
 * Website: http://larapen.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from Codecanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Http\Requests\Admin;

use Backpack\CRUD\app\Http\Requests\CrudRequest as BackpackCrudRequest;

class CountryRequest extends BackpackCrudRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|min:2|max:2',
            'name' => 'required|min:3|max:255',
            'asciiname' => 'required',
            'continent_code' => 'required',
            'currency_code' => 'required',
            'phone' => 'required',
            'languages' => 'required',
			'c_latitude' => 'required',
			'c_longitude' => 'required',
        ];
    }
}
