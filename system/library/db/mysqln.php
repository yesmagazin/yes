<?php

class DBN
{
	private $conn;
	private $stats;
	private $emode;
	private $exname;
	private $stat = 1000;
	private $stat_yes = false;
    public $debug_out;
    public $debug = false;
    public static $instance = [];
    public static $_server = [];
    public static $id_server = 'main';
	private $defaults = [
		'host'      => 'localhost',
		'user'      => '',
		'pass'      => '',
		'db'        => '',
		'port'      => NULL,
		'socket'    => NULL,
		'connect'  => true,
		'pconnect'  => false,
		'charset'   => 'utf8',
		'errmode'   => 'die', //or exception or die or error
		'exception' => 'Exception', //Exception class name
	];

	const RESULT_ASSOC = MYSQLI_ASSOC;
	const RESULT_NUM   = MYSQLI_NUM;

	function __construct($opt = [])
	{
        setlocale(LC_NUMERIC, 'en_US');
		$opt = array_merge($this->defaults,$opt);
		$this->emode  = $opt['errmode'];
		$this->die  = $opt['errmode'];
		$this->exname = $opt['exception'];
		if ($opt['pconnect'])
		{
			$opt['host'] = "p:".$opt['host'];
		}
        if ($opt['connect']) {
            $this->connect($opt);
        }
		unset($opt);
	}

	public function setEmode($mode = ''){
	    if(!$mode) return false;
        ini_set('display_errors',1);
        error_reporting(E_ALL);
        $this->emode  = $mode;
        $this->die  = $mode;
        return true;
    }
    public function __destruct()
    {
        if ($this->conn) {
            $this->close();
        }
    }

    public function connect($opt){
        @$this->conn = mysqli_connect($opt['host'], $opt['user'], $opt['pass'], $opt['db'], $opt['port'], $opt['socket']);
        if ( !$this->conn )
        {
            $this->error(mysqli_connect_errno()." ".mysqli_connect_error());
        }
        mysqli_set_charset($this->conn, $opt['charset']) or $this->error(mysqli_error($this->conn));
    }

    public static function isUFO(){
        return isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR']=='79.135.197.165';
    }

    public static function getInstance($id_server = 'main', $opts = [])
    {
        if (!isset(self::$_server[$id_server]))
        {
            if($id_server=='main') {
                if(self::isUFO()){
                    ini_set('display_errors',1);
                    error_reporting(E_ALL);
                    self::$_server[$id_server] = [
                        'user'    => DB_USERNAME,
                        'pass'    => DB_PASSWORD,
                        'db'      => DB_DATABASE,
                        'errmode' => 'exception'
                    ];
                }else{
                    self::$_server[$id_server] = [
                        'user' => DB_USERNAME,
                        'pass' => DB_PASSWORD,
                        'db'   => DB_DATABASE
                    ];
                }
            }
            elseif($opts && is_array($opts)){
                self::$_server[$id_server] = $opts;
            }
        }
        if (!isset(self::$instance[$id_server])) {
            self::$instance[$id_server] = new DBN( self::$_server[$id_server] );
        }
        return self::$instance[$id_server];
    }

    public static function I($id_server = 'main', $opts = [])
    {
        if (!isset(self::$_server[$id_server]))
        {
            if($id_server=='main') {
                if(self::isUFO()){
                    ini_set('display_errors',1);
                    error_reporting(E_ALL);
                    self::$_server[$id_server] = [
                        'user'    => DB_USERNAME,
                        'pass'    => DB_PASSWORD,
                        'db'      => DB_DATABASE,
                        'errmode' => 'exception'
                    ];
                }else{
                    self::$_server[$id_server] = [
                        'user' => DB_USERNAME,
                        'pass' => DB_PASSWORD,
                        'db'   => DB_DATABASE
                    ];
                }
            }
            elseif($opts && is_array($opts)){
                self::$_server[$id_server] = $opts;
            }
        }
        if (!isset(self::$instance[$id_server])) {
            self::$instance[$id_server] = new DBN( self::$_server[$id_server] );
        }
        return self::$instance[$id_server];
    }

	/**
	 * Conventional function to run a query with placeholders. A mysqli_query wrapper with placeholders support
	 *
	 * Examples:
	 * $db->query("DELETE FROM table WHERE id=?i", $id);
	 *
	 * @param string $query - an SQL query with placeholders
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the query
	 * @return resource|FALSE whatever mysqli_query returns
	 */
	public function close()
	{
        if ($this->conn && is_object($this->conn))
            mysqli_close($this->conn);
	}

    public function query()
	{
        if ($this->debug) $this->debug_out[] = debug_backtrace();
		return $this->rawQuery($this->prepareQuery(func_get_args()));
	}

	/**
	 * Conventional function to fetch single row.
	 *
	 * @param resource $result - myqli result
	 * @param int $mode - optional fetch mode, RESULT_ASSOC|RESULT_NUM, default RESULT_ASSOC
	 * @return array|FALSE whatever mysqli_fetch_array returns
	 */
	public function fetch($result,$mode=self::RESULT_ASSOC)
	{
		return mysqli_fetch_array($result, $mode);
	}

	/**
	 * Conventional function to get number of affected rows.
	 *
	 * @return int whatever mysqli_affected_rows returns
	 */
	public function affectedRows()
	{
        if ($this->debug) $this->debug_out[] = debug_backtrace();
		return mysqli_affected_rows ($this->conn);
	}

	/**
	 * Conventional function to get last insert id.
	 *
	 * @return int whatever mysqli_insert_id returns
	 */
	public function insertId()
	{
        if ($this->debug) $this->debug_out[] = debug_backtrace();
		return mysqli_insert_id($this->conn);
	}

	/**
	 * Conventional function to get number of rows in the resultset.
	 *
	 * @param resource $result - myqli result
	 * @return int whatever mysqli_num_rows returns
	 */
	public function numRows($result)
	{
		return mysqli_num_rows($result);
	}

	/**
	 * Conventional function to free the resultset.
	 */
	public function free($result)
	{
		mysqli_free_result($result);
	}

	/**
	 * Helper function to get scalar value right out of query and optional arguments
	 *
	 * Examples:
	 * $name = $db->getOne("SELECT name FROM table WHERE id=1");
	 * $name = $db->getOne("SELECT name FROM table WHERE id=?i", $id);
	 *
	 * @param string $query - an SQL query with placeholders
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the query
	 * @return string|FALSE either first column of the first row of resultset or FALSE if none found
	 */
	public function getOne()
	{
		$query = $this->prepareQuery(func_get_args());
		if ($res = $this->rawQuery($query))
		{
			$row = $this->fetch($res);
			if (is_array($row)) {
				return reset($row);
			}
			$this->free($res);
		}
        if ($this->debug) $this->debug_out[] = debug_backtrace();
		return FALSE;
	}

	/**
	 * Helper function to get single row right out of query and optional arguments
	 *
	 * Examples:
	 * $data = $db->getRow("SELECT * FROM table WHERE id=1");
	 * $data = $db->getOne("SELECT * FROM table WHERE id=?i", $id);
	 *
	 * @param string $query - an SQL query with placeholders
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the query
	 * @return array|FALSE either associative array contains first row of resultset or FALSE if none found
	 */
	public function getRow()
	{
		$query = $this->prepareQuery(func_get_args());
		if ($res = $this->rawQuery($query)) {
			$ret = $this->fetch($res);
			$this->free($res);
			return $ret;
		}
        if ($this->debug) $this->debug_out[] = debug_backtrace();
		return FALSE;
	}

    public function getRowObj()
	{
		if ($res = $this->rawQuery($this->prepareQuery(func_get_args()))) {
			$ret = $this->fetch($res);
			$this->free($res);
			return (object)$ret;
		}
        if ($this->debug) $this->debug_out[] = debug_backtrace();
		return FALSE;
	}

	/**
	 * Helper function to get single column right out of query and optional arguments
	 *
	 * Examples:
	 * $ids = $db->getCol("SELECT id FROM table WHERE cat=1");
	 * $ids = $db->getCol("SELECT id FROM tags WHERE tagname = ?s", $tag);
	 *
	 * @param string $query - an SQL query with placeholders
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the query
	 * @return array|FALSE either enumerated array of first fields of all rows of resultset or FALSE if none found
	 */
	public function getCol()
	{
		$ret   = [];
		$query = $this->prepareQuery(func_get_args());
		if ( $res = $this->rawQuery($query) )
		{
			while($row = $this->fetch($res))
			{
				$ret[] = reset($row);
			}
			$this->free($res);
		}
        if ($this->debug) $this->debug_out[] = debug_backtrace();
		return $ret;
	}

	/**
	 * Helper function to get all the rows of resultset right out of query and optional arguments
	 *
	 * Examples:
	 * $data = $db->getAll("SELECT * FROM table");
	 * $data = $db->getAll("SELECT * FROM table LIMIT ?i,?i", $start, $rows);
	 *
	 * @param string $query - an SQL query with placeholders
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the query
	 * @return array enumerated 2d array contains the resultset. Empty if no rows found.
	 */
	public function getAll()
	{
		$ret   = [];
		$query = $this->prepareQuery(func_get_args());
        //echo $query;
		if ( $res = $this->rawQuery($query) )
		{
			while($row = $this->fetch($res))
			{
				$ret[] = $row;
			}
			$this->free($res);
		}
        if ($this->debug) $this->debug_out[] = debug_backtrace();
		return $ret;
	}

	/**
	 * Helper function to get all the rows of resultset into indexed array right out of query and optional arguments
	 *
	 * Examples:
	 * $data = $db->getInd("id", "SELECT * FROM table");
	 * $data = $db->getInd("id", "SELECT * FROM table LIMIT ?i,?i", $start, $rows);
	 *
	 * @param string $index - name of the field which value is used to index resulting array
	 * @param string $query - an SQL query with placeholders
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the query
	 * @return array - associative 2d array contains the resultset. Empty if no rows found.
	 */
	public function getInd()
	{
		$args  = func_get_args();
		$index = array_shift($args);
		$query = $this->prepareQuery($args);

		$ret = [];
		if ( $res = $this->rawQuery($query) )
		{
			while($row = $this->fetch($res))
			{
				$ret[$row[$index]] = $row;
			}
			$this->free($res);
		}
        if ($this->debug) $this->debug_out[] = debug_backtrace();
		return $ret;
	}

    public function getIndOne()
    {
        $args  = func_get_args();
        $index = array_shift($args);
        $query = $this->prepareQuery($args);

        $ret = [];
        if ( $res = $this->rawQuery($query) )
        {
            while($row = $this->fetch($res))
            {
                $ret[] = $row[$index];
            }
            $this->free($res);
        }
        if ($this->debug) $this->debug_out[] = debug_backtrace();
        return $ret;
    }

    public function getIndOneInt()
    {
        $args  = func_get_args();
        $index = array_shift($args);
        $query = $this->prepareQuery($args);

        $ret = [];
        if ( $res = $this->rawQuery($query) )
        {
            while($row = $this->fetch($res))
            {
                $ret[] = (int)$row[$index];
            }
            $this->free($res);
        }
        if ($this->debug) $this->debug_out[] = debug_backtrace();
        return $ret;
    }

	/**
	 * Helper function to get a dictionary-style array right out of query and optional arguments
	 *
	 * Examples:
	 * $data = $db->getIndCol("name", "SELECT name, id FROM cities");
	 *
	 * @param string $index - name of the field which value is used to index resulting array
	 * @param string $query - an SQL query with placeholders
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the query
	 * @return array - associative array contains key=value pairs out of resultset. Empty if no rows found.
	 */
	public function getIndCol()
	{
		$args  = func_get_args();
		$index = array_shift($args);
		$query = $this->prepareQuery($args);

		$ret = [];
		if ( $res = $this->rawQuery($query) )
		{
			while($row = $this->fetch($res))
			{
				$key = $row[$index];
				unset($row[$index]);
				$ret[$key] = reset($row);
			}
			$this->free($res);
		}
        if ($this->debug) $this->debug_out[] = debug_backtrace();
		return $ret;
	}

	/**
	 * Function to parse placeholders either in the full query or a query part
	 * unlike native prepared statements, allows ANY query part to be parsed
	 *
	 * useful for debug
	 * and EXTREMELY useful for conditional query building
	 * like adding various query parts using loops, conditions, etc.
	 * already parsed parts have to be added via ?p placeholder
	 *
	 * Examples:
	 * $query = $db->parse("SELECT * FROM table WHERE foo=?s AND bar=?s", $foo, $bar);
	 * echo $query;
	 *
	 * if ($foo) {
	 *     $qpart = $db->parse(" AND foo=?s", $foo);
	 * }
	 * $data = $db->getAll("SELECT * FROM table WHERE bar=?s ?p", $bar, $qpart);
	 *
	 * @param string $query - whatever expression contains placeholders
	 * @param mixed  $arg,... unlimited number of arguments to match placeholders in the expression
	 * @return string - initial expression with placeholders substituted with data.
	 */
	public function parse()
	{
        if ($this->debug) $this->debug_out[] = debug_backtrace();
		return $this->prepareQuery(func_get_args());
	}

	/**
	 * function to implement whitelisting feature
	 * sometimes we can't allow a non-validated user-supplied data to the query even through placeholder
	 * especially if it comes down to SQL OPERATORS
	 *
	 * Example:
	 *
	 * $order = $db->whiteList($_GET['order'], ['name','price']);
	 * $dir   = $db->whiteList($_GET['dir'],   ['ASC','DESC']);
	 * if (!$order || !dir) {
	 *     throw new http404(); //non-expected values should cause 404 or similar response
	 * }
	 * $sql  = "SELECT * FROM table ORDER BY ?p ?p LIMIT ?i,?i"
	 * $data = $db->getArr($sql, $order, $dir, $start, $per_page);
	 *
	 * @param string $iinput   - field name to test
	 * @param  array  $allowed - an array with allowed variants
	 * @param  string $default - optional variable to set if no match found. Default to false.
	 * @return string|FALSE    - either sanitized value or FALSE
	 */
	public function whiteList($input,$allowed,$default=FALSE)
	{
		$found = array_search($input,$allowed);
		return ($found === FALSE) ? $default : $allowed[$found];
	}

	/**
	 * function to filter out arrays, for the whitelisting purposes
	 * useful to pass entire superglobal to the INSERT or UPDATE query
	 * OUGHT to be used for this purpose,
	 * as there could be fields to which user should have no access to.
	 *
	 * Example:
	 * $allowed = ['title','url','body','rating','term','type'];
	 * $data    = $db->filterArray($_POST,$allowed);
	 * $sql     = "INSERT INTO ?n SET ?u";
	 * $db->query($sql,$table,$data);
	 *
	 * @param  array $input   - source array
	 * @param  array $allowed - an array with allowed field names
	 * @return array filtered out source array
	 */
	public function filterArray($input,$allowed)
	{
		foreach(array_keys($input) as $key )
		{
			if ( !in_array($key,$allowed) )
			{
				unset($input[$key]);
			}
		}
		return $input;
	}

	/**
	 * Function to get last executed query.
	 *
	 * @return string|NULL either last executed query or NULL if were none
	 */
	public function lastQuery()
	{
        if($this->stat_yes && isset($this->stats) && is_array($this->stats)) {
            $last = end($this->stats);
            return $last['query'];
        }
        return false;
	}

	/**
	 * Function to get all query statistics.
	 *
	 * @return array contains all executed queries with timings and errors
	 */
	public function getStats()
	{
		return $this->stat_yes ? $this->stats : false;
	}

    public function paramsQuery($params){
        if(!$params || is_null($params)) return false;
        $what = $where = $sql = '';
        $good = ['getOne','getInd','getAll','getCol','getRow','getIndOne','getIndCol'];
        if (!in_array($params['func'],$good)) return false;
        if (is_array($params['fields'])){
            foreach ($params['fields'] as $field)
                $what[] = $this->escapeIdent($field);
            $what = implode(',',$what);
        }
        elseif ($params['fields']=='*')
            $what = $params['fields'];
        elseif (is_string($params['fields']))
            $what[] = $this->escapeIdent($params['fields']);
        if(!$what || is_null($what)) return false;
        $sql = 'SELECT '.(isset($params['dist'])?'DISTINCT ':'').$what.' FROM '.$this->escapeIdent($params['table']).' WHERE ';
        foreach ($params['where'] as $k=>$v)
            $where .= (isset($v['con'])?' '.$v['con'].' ':'').$this->escapeIdent($k).' '.$v['act'].' '.$this->switcher($v).' ';
        if(!$where || is_null($where)) return false;
        $sql .= trim($where);
        return call_user_func_array([$this,$params['func']],[$sql]);
    }
	/**
	 * private function which actually runs a query against Mysql server.
	 * also logs some stats like profiling info and error message
	 *
	 * @param string $query - a regular SQL query
	 * @return mysqli result resource or FALSE on error
	 */
	private function rawQuery($query)
	{
		$start = microtime(TRUE);
		$res   = mysqli_query($this->conn, $query);
		$timer = microtime(TRUE) - $start;

        if ($this->stat_yes)
            $this->stats[] = [
                'query' => $query,
                'start' => $start,
                'timer' => $timer,
            ];
		if (!$res)
		{
			$error = mysqli_error($this->conn);
            if ($this->stat_yes) {
                end($this->stats);
                $key = key($this->stats);
                $this->stats[$key]['error'] = $error;
                if ($this->debug) $this->cutStats();
            }

			$this->error("$error. Full query: [$query]");
		}
        if ($this->debug) $this->cutStats();
		return $res;
	}

    private function switcher($arr){
        $part = '';
        switch ($arr['type'])
        {
            case '?n':
                $part = $this->escapeIdent($arr['val']);
                break;
            case '?s':
                $part = $this->escapeString($arr['val']);
                break;
            case '?i':
                $part = $this->escapeInt($arr['val']);
                break;
            case '?f':
                $part = $this->escapeFloat($arr['val']);
                break;
            case '?a':
                $part = $this->createIN($arr['val']);
                break;
            case '?u':
                $part = $this->createSET($arr['val']);
                break;
            case '?p':
                $part = $arr['val'];
                break;
        }
        return $part;
    }

	private function prepareQuery($args)
	{
		$query = '';
		$raw   = array_shift($args);
		$array = preg_split('~(\?[nsifuap])~u',$raw,null,PREG_SPLIT_DELIM_CAPTURE);
		$anum  = count($args);
		$pnum  = floor(count($array) / 2);
		if ( $pnum != $anum )
		{
			$this->error("Number of args ($anum) doesn't match number of placeholders ($pnum) in [$raw]");
		}

		foreach ($array as $i => $part)
		{
			if ( ($i % 2) == 0 )
			{
				$query .= $part;
				continue;
			}

			$value = array_shift($args);
			switch ($part)
			{
				case '?n':
					$part = $this->escapeIdent($value);
					break;
				case '?s':
					$part = $this->escapeString($value);
					break;
				case '?i':
					$part = $this->escapeInt($value);
					break;
                case '?f':
					$part = $this->escapeFloat($value);
					break;
				case '?a':
					$part = $this->createIN($value);
					break;
				case '?u':
					$part = $this->createSET($value);
					break;
				case '?p':
					$part = $value;
					break;
			}
			$query .= $part;
		}
		return $query;
	}

	private function escapeInt($value)
	{
		if ($value === NULL)
		{
			return 'NULL';
		}
		if(!is_numeric($value))
		{
			$this->error("Integer (?i) placeholder expects numeric value, ".gettype($value)." given");
			return FALSE;
		}
		if (is_float($value))
		{
			$value = number_format($value, 2, '.', ''); // may lose precision on big numbers
		}
		return intval($value);
	}

	private function escapeFloat($value)
	{
		if ($value === NULL)
		{
			return 'NULL';
		}
        $value = str_replace(',','.',$value);
        $value = (float)$value;
		if(!is_float($value))
		{
			$this->error("Float (?f) placeholder expects float value, ".gettype($value)." given");
			return FALSE;
		}
		return $value;
	}

	private function escapeString($value)
	{
		if ($value === NULL)
		{
			return 'NULL';
		}
		return	"'".mysqli_real_escape_string($this->conn,$value)."'";
	}

	private function escapeIdent($value)
	{
		if ($value)
		{
			return "`".str_replace("`","``",$value)."`";
		} else {
			$this->error("Empty value for identifier (?n) placeholder");
		}
	}

	private function createIN($data)
	{
		if (!is_array($data))
		{
			$this->error("Value for IN (?a) placeholder should be array");
			return;
		}
		if (!$data)
		{
			return 'NULL';
		}
		$query = $comma = '';
		foreach ($data as $value)
		{
			$query .= $comma.$this->escapeString($value);
			$comma  = ",";
		}
		return $query;
	}

	private function createSET($data)
	{
		if (!is_array($data))
		{
			$this->error("SET (?u) placeholder expects array, ".gettype($data)." given");
			return;
		}
		if (!$data)
		{
			$this->error("Empty array for SET (?u) placeholder");
			return;
		}
		$query = $comma = '';
		foreach ($data as $key => $value)
		{
			$query .= $comma.$this->escapeIdent($key).'='.$this->escapeString($value);
			$comma  = ",";
		}
		return $query;
	}

    public function handleError($errno, $errstring, $errfile, $errline, $errcontext) {
        if (error_reporting() & $errno) {
            // only process when included in error_reporting
            return $this->handleException(new \Exception($errstring, $errno));
        }
        return true;
    }

    public function handleException($exception){
        // Here, you do whatever you want with the generated
        // exceptions. You can store them in a file or database,
        // output them in a debug section of your page or do
        // pretty much anything else with it, as if it's a
        // normal variable
        switch ($exception->getCode()) {
            case E_ERROR:
            case E_CORE_ERROR:
            case E_USER_ERROR:
                // Make sure script exits here
                exit(1);
            default:
                // Let script continue
                return true;
        }
    }

	private function error($err)
	{
		$err  = __CLASS__.": ".$err;

        if ( $this->emode == 'error' ){
            //set_error_handler([$this, 'handleError']);
            $err .= ". Error initiated in ".$this->caller().", thrown";
            trigger_error($err,E_USER_ERROR);
        }
        elseif ($this->emode == 'exception') {
            throw new $this->exname($err);
        }
        elseif ($this->emode == 'die') {
            die('<div style="padding:25px;font-size:15px;font-weight:700;">Что-то пошло не так! Это не ваша вина! Мы уже знаем об этом и наши Админы работают над этой проблемой! Попробуйте, пожалуйста, позднее. Спасибо.</div>');
        }
	}

	private function caller()
	{
		$trace  = debug_backtrace();
		$caller = '';
		foreach ($trace as $t)
		{
			if ( isset($t['class']) && $t['class'] == __CLASS__ )
			{
				$caller = $t['file']." on line ".$t['line'];
			} else {
				break;
			}
		}
		return $caller;
	}

	/**
	 * On a long run we can eat up too much memory with mere statsistics
	 * Let's keep it at reasonable size, leaving only last 100 entries.
	 */
	private function cutStats()
	{
		if ( count($this->stats) > $this->stat )
		{
			reset($this->stats);
			$first = key($this->stats);
			unset($this->stats[$first]);
		}
	}
}
