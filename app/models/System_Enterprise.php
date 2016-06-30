<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 企业信息
 * @package App\Models
 */
class System_Enterprise extends Model
{


    protected $table = 'System_Enterprise';//表名
    protected $primaryKey = "id";//主键

    protected $fillable = ['name', 'short_name', 'logo', 'legal_person', 'found_time', 'phone', 'fax', 'address', 'slogan', 'abstract'];

    public function __construct()
    {

    }

    /**
     * 获取应用到请求的验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|min:2',
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
            'name.required' => '企业全称为必填项',
        ];
    }


    /**
     * 所有用户
     */
    public function users()
    {
        return $this->hasMany('App\Models\System_User');
    }

}
