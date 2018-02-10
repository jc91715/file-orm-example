<?php namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
	protected $fileName;

	public function __construct()
	{
		parent::__construct();

		$this->fileName = $_GET['page']??'index';
	}

	public function create()
	{
		$filePath = ROOT_PATH.'/theme/pages/'.$this->fileName.'.htm';
		if($this->filesystem->exists($filePath)){
			echo $this->fileName.'.htm'.'已创建'.'<br>';
			$page = Page::find($this->fileName);


		}else{
			$page = Page::create([
			    'fileName' => $this->fileName,
			    'title' => $this->fileName.'文件标题',
			    'markup' => "<h1> hello world  &nbsp;{$this->fileName}</h1>",
			    'code'   => "echo '{$filePath}中的php代码运行成功';" 
			]);
			echo $this->fileName.'.htm'.'文件创建成功'.'<br>';

		}
		$this->getFileContents($filePath);
		$this->runHtmlCode($page);
		$this->runPhpCode();
		
		
		
	}

	public function getFileContents($filePath)
	{
		echo '<h1>文件内容：</h1>';
		highlight_file($filePath);

	}


	public function runHtmlCode($page)
	{

		echo '<h1>文件中的HTML运行结果</h1>'.$page->markup.'<br>';

	}



	public function runPhpCode()
	{
		echo '<h1>文件中的php代码运行结果</h1>';
		include("phpCode://{$this->fileName}");
	}

}