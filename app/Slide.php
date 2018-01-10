<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
   protected $table = 'slider';//modelis shesabamisi table moment mravlobidshi rom yofiliyo tabli da modelis saxeli igive ogond mxolobitshi ar dagvchirdeboda tavisit mixvdeboda
   protected $fillable = ['img','date','title']; //chasawerad xelmisawvdomi velebi
   //protected $quarded [] ra velebis shevseba ar sheidzleba
}
