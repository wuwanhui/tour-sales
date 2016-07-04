<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 站点参数
 * @package App\Models
 */
class WebSite_Config extends Model
{
    protected $table = 'WebSite_Config';//表名
    protected $primaryKey = "Id";//主键
    protected $fillable = [
        'Id', 'SiteName', 'S', 'AppID', 'AppSecret', 'Token', 'MchId', 'PayKey', 'EncodingAESKey', 'AdminOpenId', 'Welcom'
    ];

}
