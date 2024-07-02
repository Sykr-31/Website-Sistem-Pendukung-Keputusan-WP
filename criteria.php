<?php
// File: criteria.php

// Koneksi ke database
$connection = new mysqli("localhost", "root", "", "spk_kemal");

// Fungsi untuk mendapatkan data kriteria berdasarkan id
function getCriteria($id)
{
    global $connection;

    $query = "SELECT * FROM criteria WHERE id = $id";
    $result = $connection->query($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    }

    return null;
}

// Fungsi Create
function createCriteria($name, $weight, $type)
{
    global $connection;
    $query = "INSERT INTO criteria (name, weight, type) VALUES ('$name', $weight, '$type')";
    $result = $connection->query($query);
    return $result;
}

// Fungsi Read
function getCriterias()
{
    global $connection;
    $query = "SELECT * FROM criteria";
    $result = $connection->query($query);
    $criterias = [];
    while ($row = $result->fetch_assoc()) {
        $criterias[] = $row;
    }
    return $criterias;
}

// Fungsi Update
function updateCriteria($id, $name, $weight, $type)
{
    global $connection;
    $query = "UPDATE criteria SET name='$name', weight=$weight, type='$type' WHERE id=$id";
    $result = $connection->query($query);
    return $result;
}

// Fungsi Delete
function deleteCriteria($id)
{
    global $connection;
    $query = "DELETE FROM criteria WHERE id=$id";
    $result = $connection->query($query);
    return $result;
}
