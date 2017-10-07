<?php

namespace Modules\Setting\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
  //  use Translatable;
protected $primaryKey="ID";
const CREATED_AT = 'IDATE';
const UPDATED_AT = 'UDATE';
    public $translatedAttributes = ['VALUE', 'DESCRIPTION'];
    protected $fillable = ['NAME', 'VALUE', 'DESCRIPTION', 'ISTRANSLATABLE', 'PLAINVALUE'];
    protected $table = 'settings';
}
