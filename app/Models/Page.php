<?php namespace App\Models;


class Page extends Model
{
	protected $fillable = [
        'markup',
        'title',
        'code'
    ];

    protected $dirName = 'pages';

}