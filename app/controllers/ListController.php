<?php
require_once '../abstracts/AbstractComponent.php';

class ListController extends AbstractComponent {
    private $templateFile = '../templates/list.php';

    function __construct() {
        parent::__construct();

        switch ($this->data['_method']) {
            case 'post':
                $this->addItem();
                break;
            case 'put':
                $this->toggleItemStatus();
                break;
            case 'delete':
                $this->deleteItem();
                break;
        }
    }

    private function addItem() {
        if(isset($this->data['value'], $this->data['value']['text'])) {
            $text = $this->db->real_escape_string($this->data['value']['text']);
            
            $sql = "INSERT INTO tasks (task, done) VALUES (\"$text\", 0);";
            if (!mysqli_query($this->db, $sql)) {
                echo "Error adding value: " . mysqli_error($this->db);
            }
        }
    }

    private function toggleItemStatus() {
        if(isset($this->data['value'], $this->data['value']['id'])) {
            $id = (int) $this->data['value']['id'];
            
            $sql = "UPDATE tasks SET done = !done WHERE id = $id;";

            if (!mysqli_query($this->db, $sql)) {
                echo "Error updating value: " . mysqli_error($this->db);
            }
        }
    }

    private function deleteItem() {
        if(isset($this->data['value'], $this->data['value']['id'])) {
            $id = (int) $this->data['value']['id'];
            
            $sql = "DELETE FROM tasks WHERE id = $id;";

            if (!mysqli_query($this->db, $sql)) {
                echo "Error deleting value: " . mysqli_error($this->db);
            }
        }
    }

    private function getItems() {
        $sql = "SELECT * FROM tasks ORDER BY done, id ASC";
        $result = mysqli_query($this->db, $sql); 
        $rows = [];

        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
        }
        
        return $rows;
    }

    function getView() {
        $items = $this->getItems();
        ob_start();
        include($this->templateFile);
        return ob_get_clean();
    }
}