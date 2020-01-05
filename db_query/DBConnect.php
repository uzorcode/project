  <?php
class ConnectionDB  {
	private $host = 'localhost';
	private $dbname = 'emrforhospitals';
	private $user = 'root';
	private $pass = '';
	protected $conn;

	public function __construct() {
		try {
			$dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;

			$this->conn = new PDO($dsn, $this->user, $this->pass);
            echo "Connected Successfully";
		} catch (Exception $e) {
			echo "DB Connection Error: " . $e->getMessage();
		}
	}
}
?>
