<?php

namespace App;

class App {

    /**
     * @var \Core\FileDB 
     */
    public static $db;

    public function __construct() {
        self::$db = new \Core\FileDB(DB_FILE);
    }

    public function update(Drink $drink): bool {
        return self::$db->updateRow($this->table_name, $drink->getID(), $drink->getData());
    }
    
    
    
}

