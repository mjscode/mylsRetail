<?php
class Db {
    //ensures that a new db can't be created.
    private $db;
    private static $instance;

    private function __construct() {
        // the password and username are in a different file this was necassary as the code is public on github
        $root = $_SERVER['DOCUMENT_ROOT'];
        $settings=parse_ini_file("./dbSettings.ini");
        $cs = "mysql:host=localhost;dbname=retailDatab";
        $user = $settings['user'];
        $password = $settings['password'];
        try {
            echo 'trying';
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $this->db = new PDO($cs, $user, $password, $options);
        } catch (PDOException $e) {
            $error = "Something went wrong " . $e->getMessage();
            echo $error;
        }
    }
    //ensures that db can't be cloned
    private function __clone() {}
        //checks if there is already an instance if not a new one will be created otherwise the old one will be used.
    public static function getDb() {
        if(empty(Db::$instance)) {
            Db::$instance = new Db();
        }
        return Db::$instance;
    }
    //the old fashioned prepare statement necessary as db is private.
    public function prepare($query) {
        return $this->db->prepare($query);
    }
}
?>

