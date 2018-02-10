<?php namespace App\Http\Controllers;

use October\Rain\Halcyon\Model;
use October\Rain\Filesystem\Filesystem;
use October\Rain\Halcyon\Datasource\FileDatasource;
use October\Rain\Halcyon\Datasource\Resolver;

class Controller
{

	protected $filesystem;

	public function __construct()
	{
		stream_wrapper_register("phpCode", "App\Stream\PhpCodeStream");
		$this->filesystem = new Filesystem;
		$datasource = new FileDatasource(ROOT_PATH.'/theme', new Filesystem);
		$resolver = new Resolver(['theme1' => $datasource]);
		$resolver->setDefaultDatasource('theme1');
		Model::setDatasourceResolver($resolver);
	}
}