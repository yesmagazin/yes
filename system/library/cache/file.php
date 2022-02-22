<?php
namespace Cache;
class File {
	private $expire;

	public function __construct($expire = 3600) {
		$this->expire = $expire;

		$files = glob(DIR_CACHE . 'cache.*');

		if ($files) {
			foreach ($files as $file) {
				$time = substr(strrchr($file, '.'), 1);

				if ($time < time()) {
					if (file_exists($file)) {
						unlink($file);
					}
				}
			}
		}
	}

	public function get($key) {
		$files = glob(DIR_CACHE . 'cache.' . preg_replace('/[^A-Z0-9\._-]/i', '', $key) . '.*');

		if ($files) {
			$handle = fopen($files[0], 'r');

			flock($handle, LOCK_SH);

			$data = fread($handle, filesize($files[0]));

			flock($handle, LOCK_UN);

			fclose($handle);

			return json_decode($data, true);
		}

		return false;
	}

	public function set($key, $value, $expire = false ) {
		$this->delete($key);

		$file = DIR_CACHE . 'cache.' . preg_replace('/[^A-Z0-9\._-]/i', '', $key) . '.' . (time() + ($expire ? $expire : $this->expire));

		$handle = fopen($file, 'w');

		flock($handle, LOCK_EX);

		fwrite($handle, json_encode($value));

		fflush($handle);

		flock($handle, LOCK_UN);

		fclose($handle);
	}

	public function delete($key) {
		$files = glob(DIR_CACHE . 'cache.' . preg_replace('/[^A-Z0-9\._-]/i', '', $key) . '.*');

		if ($files) {
			foreach ($files as $file) {
				if (file_exists($file)) {
					unlink($file);
				}
			}
		}
	}

    public function clear($keys, $dir = false) {
        $cachedir = $dir && is_string($dir) ? $dir : DIR_CACHE;
        if (is_string($keys)) {
            $this->clearKey($keys,$cachedir);
        } elseif ($keys && is_array($keys)){
            foreach($keys as $key){
                $this->clearKey($key,$cachedir);
            }
        }
    }

    public function clearKey($key, $cachedir){
        if ($files = glob($cachedir . 'cache.' . preg_replace('/[^A-Z0-9\._-]/i', '', $key) . '.*')) {
            foreach ($files as $file) {
                if (file_exists($file)) {
                    unlink($file);
                }
            }
        }
    }
}