<?php

namespace App\Http\Controllers\Manage;

use App\Models\System_Enterprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

class SystemEnterpriseController extends BaseController
{
    /**
     * 主页
     */

    public function index(Request $request)
    {
        try {
            if ($input = $request->except(['id', '_token'])) {

                $enterprise = new System_Enterprise();
                $input = $request->except(['id', '_token']);
                $validator = Validator::make($input, $enterprise->rules(), $enterprise->messages());
                if ($validator->fails()) {
                    return redirect('/manage/system/enterprise/create')
                        ->withInput()
                        ->withErrors($validator);
                }

                $id = $request->input('id');
                if ($id != null) {
                    DB::table('System_Enterprise')->where('id', $id)->update($input);
                } else {
                    $enterprise->save();
                }
                return Redirect::back()->with('message','保存成功！');
            } else {
                $enterprise = System_Enterprise::all()->first();
                if ($enterprise == null) {
                    $enterprise = new System_Enterprise();
                }
            }

            return view('manage.system.enterprise.edit', compact("enterprise"), ['model' => 'system', 'menu' => 'enterprise']);
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('保存失败！' . $ex->getMessage());
        }
    }


}