<?php

class Task extends Connection
{
    private $perPage = 3;

    public function getLastPage() {
        $query = $this->getBdd()->query('SELECT COUNT(*) AS total FROM tasks');

        $total = $query->fetch()->total;

        return ceil($total / $this->perPage);
    }

    public function getAllTask($page)
    {
        $offset = ($page - 1) * $this->perPage;
        $sql = '
        SELECT tasks.*, ROW_NUMBER() OVER (ORDER BY id) AS row_id,
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
         LIMIT :offset, :perPage
        ';
        $query = $this->getBdd()->prepare($sql);
        $query->bindValue(':perPage', $this->perPage, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll();
    }

    public function getAllTaskStatus()
    {
        $query = $this->getBdd()->query('SELECT * FROM task_status');

        return $query->fetchAll();
    }

    public function create($params = []) {
        $query = $this->getBdd()->prepare('INSERT INTO tasks (title, description, status) VALUES (:title, :description, :status)');
        $query->execute([
            'title' => $params['title'],
            'description' => $params['description'],
            'status' => $params['status'],
        ]);

        return $query->fetch();
    }

    public function getTaskById($id) {
        $query = $this->getBdd()->prepare('SELECT * from tasks where id = :id');

        $query->execute([
            'id' => $id
        ]);

        return $query->fetch();
    }

    public function update($params = []) {
        $query = $this->getBdd()->prepare('UPDATE tasks SET title=:title, description=:description, status=:status where id =:id');
        $query->execute([
            'title' => $params['title'],
            'description' => $params['description'],
            'status' => $params['status'],
            'id' => $params['id'],
        ]);

        return $query->fetch();
    }

    public function deleteTaskById($id) {
        $query = $this->getBdd()->prepare('DELETE FROM tasks WHERE id = :id');

        $query->execute([
            'id' => $id,
        ]);

        return true;
    }
}
