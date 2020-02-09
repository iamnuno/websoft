<?php 

class Database {
	
	private $db = null;

	public function __construct($dsn) {
        try {
			$this->db = new PDO($dsn["dsn"], $dsn["user"], $dsn["password"]);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

		} catch (Exception $e) {
			echo "Something failed: " . $e->getMessage();
		}
	}

    public function search($input) {
    	$sql = "SELECT * FROM tech WHERE id = ? OR label LIKE ? OR type LIKE ?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute([$input, "%$input%", "%$input%"]);
		return $stmt->fetchAll();
    }

    public function create($label, $type) {
    	$sql = "INSERT INTO tech (label, type) VALUES (?, ?)";
    	$stmt = $this->db->prepare($sql);
    	$stmt->execute([$label, $type]);
    }  

    public function update($label, $type, $id) {
		$sql = "UPDATE tech SET label = ?, type = ? WHERE id = ?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute([$label, $type, $id]);
    } 

    public function delete($id) {
    	$sql = "DELETE FROM tech WHERE id = ?";
    	$stmt = $this->db->prepare($sql);
    	$stmt->execute([$id]);
    } 

    public function read() {
    	$sql = "SELECT * FROM tech";
    	$stmt = $this->db->prepare($sql);
    	$stmt->execute();
    	return $stmt->fetchAll();
    } 
}