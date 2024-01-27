<?php

namespace App\Handler;

if (file_exists('../database/connection.php')) {
    require_once '../database/connection.php';
    require_once '../database/models/book.php';
}

if (!file_exists('../database/connection.php')) {
    require_once '../app/database/connection.php';
    require_once '../app/database/models/book.php';
}

use App\Database\Connection;
use App\Database\Models\Book as BookModel;
use Exception;

class Book
{
    private $conn;

    public function __construct()
    {
        $connection = new Connection();
        $this->conn = $connection->getConnection();
    }

    public function getBooks()
    {
        $sql = $this->queryBuilder(BookModel::TABLE, BookModel::COLUMNS, 'view');
        $query = $this->conn->query($sql);
        if ($query->num_rows == 0) {
            return [];
        }

        // use key
        while ($row = $query->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function getBookById(string $id)
    {
        $sql = $this->queryBuilder(BookModel::TABLE, BookModel::COLUMNS, 'searchbyid', ['id' => $id]);

        $query = $this->conn->query($sql);
        if ($query->num_rows == 0) {
            return [];
        }

        return $query->fetch_assoc();
    }

    public function addBook(string $name, int $borrowers, string $genre)
    {
        $sql = $this->queryBuilder(BookModel::TABLE, BookModel::COLUMNS, "insert", [
            'name' => $name,
            'borrowers' => $borrowers,
            'genre' => $genre
        ]);

        try {
            $this->conn->begin_transaction();

            // do query
            $query = $this->conn->query($sql);
            if ($query != TRUE) {
                die($this->conn->error);
            }

            $this->conn->commit();
            return $query;
        } catch (Exception $exception) {
            $this->conn->rollback();
            die($exception->getMessage());
        }

        return false;
    }

    public function editBook(string $name, int $borrowers, string $genre, string $id)
    {
        $sql = $this->queryBuilder(BookModel::TABLE, BookModel::COLUMNS, "update", [
            'id' => $id,
            'name' => $name,
            'amount' => $borrowers,
            'genre' => $genre
        ]);

        try {
            $this->conn->begin_transaction();

            // do query
            $query = $this->conn->query($sql);
            if ($query != TRUE) {
                die($this->conn->error);
            }

            $this->conn->commit();
            return $query;
        } catch (Exception $exception) {
            $this->conn->rollback();
            die($exception->getMessage());
        }

        return false;
    }

    public function deleteBook(string $id)
    {
        $sql = $this->queryBuilder(BookModel::TABLE, BookModel::COLUMNS, 'delete', ['id' => $id]);

        $query = $this->conn->query($sql);
        return $query;
    }

    private function queryBuilder(string $table, array $columns, string $type, $params = [])
    {
        $type = strtolower($type);
        $sql = null;
        $currentTime = date("Y-m-d H:i:s");

        switch ($type) {
            case 'view':
                $sql = "SELECT * FROM $table";
                break;

            case 'searchbyid':
                $sql = "SELECT * FROM $table WHERE id = '$params[id]'";
                break;

            case 'insert':
                $sql = "INSERT INTO $table 
                        ($columns[name], $columns[amount], $columns[genre], $columns[createdTime]) 
                        VALUES ('$params[name]', '$params[borrowers]', '$params[genre]', '$currentTime')
                    ";
                break;

            case 'update':
                $sql = "UPDATE $table 
                        SET name = '$params[name]', borrowers = '$params[amount]', genre = '$params[genre]' 
                        WHERE id = '$params[id]'
                    ";
                break;

            case 'delete':
                $sql = "DELETE FROM $table WHERE id = '$params[id]'";
                break;

            default:
                die("Type not found. Choose one of these (view, viewById, insert, update, delete)");
                break;
        }

        return $sql;
    }
}
