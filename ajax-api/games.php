<?php
require_once '../system/db.ini.php';
$games = new Games($db);
$games->setCurrentItems($_POST['current_items']);
$games->setCategory($_POST['category']);
$games->setSearch($_POST['search']);
echo $games->generateReturnJson();

class Games {


    private string $tableName = 'hry';      // název tabulky v db pro hry
    private int $addItems = 20;             // počet položek, kolik se má přídat při zmáčknutí "přidat více"

    private ?int $currentItems = null;
    private string $category = 'All';
    private string $search = '';
    private mysqli $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function setCurrentItems(int $items): void {
        $this->currentItems = $items;
    }

    public function setCategory(string $category): void {
        $this->category = $category;
    }

    public function setSearch(string $search): void {
        $this->search = "%" . $search . "%";
    }

    public function generateReturnJson() {
        header('Content-type: text/json');
        $items = $this->preGenerateItems();
        return json_encode(['current_items' => $this->currentItems+count($items), 'nextButton' => $this->nextButton(), 'items' => $items]);
    }

    private function preGenerateItems(): array
    {
        if($this->category == 'All') {
            $sql = "SELECT * FROM " . $this->tableName . " WHERE title LIKE ? LIMIT " . $this->addItems . " OFFSET " . $this->currentItems;
        } else {
            $sql = "SELECT * FROM " . $this->tableName . " WHERE category = ? AND title LIKE ? LIMIT " . $this->addItems . " OFFSET " . $this->currentItems;
        }

        $stmt = $this->db->prepare($sql);

        if($this->category !== 'All') {
            $stmt->bind_param('ss', $this->category, $this->search);
        } else {
            $stmt->bind_param('s', $this->search);
        }

        $stmt->execute();
        $items = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $items;
    }

    private function nextButton(): bool {
        if(($this->currentItems + $this->addItems) >= $this->getCountAllItems()) {
            return false;
        }
        return true;
    }

    private function getCountAllItems(): int {
        if($this->category == 'All') {
            $sql = "SELECT COUNT(*) as countOfItems FROM " . $this->tableName . " WHERE title LIKE ?";
        } else {
            $sql = "SELECT COUNT(*) as countOfItems FROM " . $this->tableName . " WHERE category = ? AND title LIKE ?";
        }

        $stmt = $this->db->prepare($sql);

        if($this->category !== 'All') {
            $stmt->bind_param('ss', $this->category, $this->search);
        } else {
            $stmt->bind_param('s', $this->search);
        }

        $stmt->execute();
        $countOfItems = $stmt->get_result()->fetch_assoc()['countOfItems'];
        $stmt->close();
        return $countOfItems;
    }




}
