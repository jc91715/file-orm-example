<?php namespace App\Stream;

use App\Models\Page;

class PhpCodeStream {
	private $position;
    private $code;
  
    function stream_open($path, $mode, $options, &$opened_path)
    {
        $url = parse_url($path);
        $fileName = $url["host"];
        $this->position = 0;
        $this->code = '<?php '.Page::find($fileName)->code.' ?>';
       
        return true;
    }

    function stream_read($count)
    {
        $ret = substr($this->code, $this->position, $count);
        $this->position += strlen($ret);
        return $ret;
    }

    public function stream_eof(){}
    public function stream_stat() {}

}

