<?php


namespace App\Users;

class Model {
    
      private $table_name = 'users';
      
    public function __construct() {
        \App\App::$db->createTable($this->table_name);
    }
    
     public function insert(User $user) {
        return \App\App::$db->insertRow($this->table_name, $user->getData());
    }

     public function get($conditions = []) {
        $users = [];
        $rows = \App\App::$db->getRowsWhere($this->table_name, $conditions);
        foreach ($rows as $row) {
            $row['id'] = $row['row_id'];
            $users[] = new User($row);
        }
        return $users;
    }
    
    public function update(User $user): bool {
        return \App\App::$db->updateRow($this->table_name, $user->getID(), $user->getData());
    }

    public function delete(User $user): bool {
        return \App\App::$db->deleteRow($this->table_name, $user->getID());
    }

    public function deleteAll(): bool {
        return \App\App::$db->truncateTable($this->table_name);
    } 
    
    
}