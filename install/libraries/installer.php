<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
* Installation Library inspired from PyroCMS
*/
class Installer {
    
    const REQUIRED_PHP_VERSION = '5.2';
    private $ci;

    public $mysql_server_version;
    public $mysql_client_version;

    public function __construct() {
        $this->ci =& get_instance();
    }

    public function check_php_version() {
        return version_compare(PHP_VERSION, self::REQUIRED_PHP_VERSION, '>=');
    }

    public function mysql_available() {
        return function_exists('mysql_connect');
    }

    public function mysql_acceptable($type = 'server') {
        // Server version
        if ( $type == 'server' ) {
            // Retrieve the database settings from the session
            $server = $this->ci->session->userdata('dbhost') . ':' . $this->ci->session->userdata('dbport');
            $user   = $this->ci->session->userdata('dbuser');
            $pass   = $this->ci->session->userdata('dbpass');

            // Connect to MySQL
            if ( $db = @mysql_connect($server, $user, $pass) ) {
                $this->mysql_server_version = @mysql_get_server_info($db);

                // Close the connection
                @mysql_close($db);

                // MySQL server version should be at least version 5
                return ($this->mysql_server_version >= 5);
            }

            @mysql_close($db);
            return false;
        }

        // Client version

        // Get the version
        $this->mysql_client_version = preg_replace('/[^0-9\.]/', '', mysql_get_client_info());

        // MySQL client version should be at least version 5
        return ($this->mysql_client_version >= 5);
    }

    public function test_db_connection() {
        $dbhost = $this->ci->session->userdata('dbhost');
        $dbport = $this->ci->session->userdata('dbport');
        $dbuser = $this->ci->session->userdata('dbuser');
        $dbpass = $this->ci->session->userdata('dbpass');

        return $this->mysql_available() && @mysql_connect("$dbhost:$dbport", $dbuser, $dbpass);
    }

    public function install($data) {
        // we are installing klick.
        $server     = $this->ci->session->userdata('dbhost') . ':' . $this->ci->session->userdata('dbport');
        $user       = $this->ci->session->userdata('dbuser');
        $pass       = $this->ci->session->userdata('dbpass');
        $dbname     = $this->ci->session->userdata('dbname');
        $dbtprefix  = $this->ci->session->userdata('dbtprefix');

        // supervisor
        $salt     = substr(md5(uniqid(rand(), true)), 0, 4); // biar gak hambar
        $username = $data['username'];
        $password = sha1($data['password'] . $salt);
        $email    = $data['email'];

        // Election info
        $election_name  = $data['elname'];
        $election_start = strtotime($data['start']);
        $election_end   = strtotime($data['end']);

        // create connection
        if ( ! $this->db = @mysql_connect($server, $user, $pass) ) {
            return array('status' => false, 'message' => 'We Cannot connect to your database, be sure you tell us right');
        }

        if ( $this->msyql_server_version >= '5.0.7' ) {
            @mysql_set_charset('utf8', $this->db);
        }

        // get the sql and parse it
        $sql_scheme = file_get_contents('assets/create.sql');
        $sql_scheme = str_replace('{PREFIX}', $dbtprefix, $sql_scheme);
        $sql_scheme = str_replace('{USERNAME}', mysql_real_escape_string($username, $this->db), $sql_scheme);
        $sql_scheme = str_replace('{PASSWORD}', mysql_real_escape_string($password, $this->db), $sql_scheme);
        $sql_scheme = str_replace('{EMAIL}', $email, $sql_scheme);
        $sql_scheme = str_replace('{SALT}', $salt, $sql_scheme);
        $sql_scheme = str_replace('{ELECTIONNAME}', mysql_real_escape_string($election_name, $this->db), $sql_scheme);
        $sql_scheme = str_replace('{STARTDATE}', $election_start, $sql_scheme);
        $sql_scheme = str_replace('{ENDDATE}', $election_end, $sql_scheme);

        if ( ! mysql_select_db($dbname, $this->db) ) {
            return array('status' => false, 'message' => 'select failed!');
        }

        // time to process the scheme
        if ( ! $this->_process_scheme($sql_scheme) ) {
            return array('status' => false, 'message' => 'scheme failed!');
        }

        mysql_close($this->db);

        // write the database configuration
        if ( ! $this->write_db_config() ) {
            return array('status' => false, 'message' => 'We Cannot write the database configuration file');
        }

        return array('status' => true);
    }

    private function _process_scheme($sql_file) {
        // parse the queries
        $queries = explode('-- slice here --', $sql_file);

        foreach ( $queries as $query ) {
            $query = rtrim( trim($query), "\n;");

            @mysql_query($query, $this->db);

            if ( mysql_errno($this->db) > 0 ) {
                return false;
            }
        }

        return true;
    }

    public function write_db_config() {
        // write the database.php on system/piston/config/
        $port = $this->ci->session->userdata('dbport');

        $replace = array(
            '__HOSTNAME__' => $this->ci->session->userdata('dbhost'),
            '__USERNAME__' => $this->ci->session->userdata('dbuser'),
            '__PASSWORD__' => $this->ci->session->userdata('dbpass'),
            '__DATABASE__' => $this->ci->session->userdata('dbname'),
            '__PREFIX__'   => $this->ci->session->userdata('dbtprefix'),
            '__PORT__'     => $port ? $port : 3306
        );

        return $this->_write_file_vars('../system/piston/config/database.php', 'assets/database.php', $replace);
    }

    // from installer_lib on pyrocms
    private function _write_file_vars($destination, $template, $replacements) {
        return (file_put_contents($destination, str_replace(array_keys($replacements), $replacements, file_get_contents($template))) !== false);
    }
}