<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Member_User extends Authenticatable
{

    protected $table = 'Member_User';//表名

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'eid', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 获取应用到请求的验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:Member_User|max:255|min:2',
            'email' => 'required',
        ];
    }

    /**
     * 获取应用到请求的验证规则
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '用户名称为必填项',
            'email.required' => '用户邮箱为必填项',
        ];
    }

}
