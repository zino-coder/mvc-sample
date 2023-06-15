<?php

class Task extends Connection
{
    public function getAllTask() {
        $sql = '
        SELECT tasks.*,
       CASE
           WHEN ts.id = 1 THEN CONCAT(\'<span class="btn btn-outline-primary disabled">\', ts.name, \'</span>\')
           WHEN ts.id = 2 THEN CONCAT(\'<span class="btn btn-outline-primary disabled">\', ts.name, \'</span>\')
           WHEN ts.id = 3 THEN CONCAT(\'<span class="btn btn-outline-success disabled">\', ts.name, \'</span>\')
           WHEN ts.id = 4 THEN CONCAT(\'<span class="btn btn-outline-success disabled">\', ts.name, \'</span>\')
           WHEN ts.id = 5 THEN CONCAT(\'<span class="btn btn-outline-danger disabled">\', ts.name, \'</span>\')
           END
           AS statusName
FROM tasks
         INNER JOIN task_status ts ON tasks.status = ts.id
        ';
        $query = $this->getBdd()->query($sql);

        return $query->fetchAll();
    }
}