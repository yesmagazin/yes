<?php
class Language {
	private $default = 'en-gb';
	private $directory;
	private $data = array();

	public function __construct($directory = '') {
		$this->directory = $directory;
	}

	public function get($key) {
		return (isset($this->data[$key]) ? $this->data[$key] : $key);
	}
	
	public function set($key, $value) {
		$this->data[$key] = $value;
	}
	
	// Please dont use the below function i'm thinking getting rid of it.
	public function all() {
		return $this->data;
	}
	
	// Please dont use the below function i'm thinking getting rid of it.
	public function merge(&$data) {
		array_merge($this->data, $data);
	}
			
	public function load($filename, &$data = array()) {
		$_ = array();

		$file = DIR_LANGUAGE . 'english/' . $filename . '.php';
		
		// Compatibility code for old extension folders
		$old_file = DIR_LANGUAGE . 'english/' . str_replace('extension/', '', $filename) . '.php';
		
		if (is_file($file)) {
			require(modification($file));
		} elseif (is_file($old_file)) {
			require(modification($old_file));
		}

		$file = DIR_LANGUAGE . $this->default . '/' . $filename . '.php';

		// Compatibility code for old extension folders
		$old_file = DIR_LANGUAGE . $this->default . '/' . str_replace('extension/', '', $filename) . '.php';
		
		if (is_file($file)) {
			require(modification($file));
		} elseif (is_file($old_file)) {
			require(modification($old_file));
		}

		$file = DIR_LANGUAGE . $this->directory . '/' . $filename . '.php';

		// Compatibility code for old extension folders
		$old_file = DIR_LANGUAGE . $this->directory . '/' . str_replace('extension/', '', $filename) . '.php';
		
		if (is_file($file)) {
			require(modification($file));
		} elseif (is_file($old_file)) {
			require(modification($old_file));
		}

		$this->data = array_merge($this->data, $_);

		return $this->data;
	}

    function calcTrueEnd($params)
    {
        $chislo = (int)$params['n'];
        $n1 = $params['n1'];
        $n2 = $params['n2'];
        $n5 = $params['n5'];
        $ch = substr($chislo,-1);
        if ($ch==1)
        {
            if (strlen($chislo)>1)
                $result=substr($chislo,-2,1)==1?$n5:$n1;
            else
                $result=$n1;
        }
        elseif($ch>1&&$ch<5)
        {
            if (strlen($chislo)>1)
                $result=substr($chislo,-2,1)==1?$n5:$n2;
            else
                $result=$n2;
        }
        else
            $result=$n5;

        return $result;
    }
}
