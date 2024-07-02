<?php
// File: alternatives.php

// Koneksi ke database
$connection = new mysqli("localhost", "root", "", "spk_kemal");

// Memeriksa koneksi ke database
if ($connection->connect_error) {
    die("Koneksi ke database gagal: " . $connection->connect_error);
}

// Fungsi Create
function createAlternative($name, $values)
{
    global $connection;
    $name = $connection->real_escape_string($name);
    $value1 = $connection->real_escape_string($values[0]);
    $value2 = $connection->real_escape_string($values[1]);
    $value3 = $connection->real_escape_string($values[2]);
    $value4 = $connection->real_escape_string($values[3]);
    $value5 = $connection->real_escape_string($values[4]);

    $query = "INSERT INTO alternatives (name, value1, value2, value3, value4, value5) VALUES ('$name', '$value1', '$value2', '$value3', '$value4', '$value5')";
    $result = $connection->query($query);
    return $result;
}

// Fungsi Read All
function getAlternatives()
{
    global $connection;
    $query = "SELECT * FROM alternatives";
    $result = $connection->query($query);
    $alternatives = array();
    while ($row = $result->fetch_assoc()) {
        $alternatives[] = $row;
    }
    return $alternatives;
}

// Fungsi Update
function updateAlternative($id, $name, $values)
{
    global $connection;
    $name = $connection->real_escape_string($name);
    $value1 = $connection->real_escape_string($values[0]);
    $value2 = $connection->real_escape_string($values[1]);
    $value3 = $connection->real_escape_string($values[2]);
    $value4 = $connection->real_escape_string($values[3]);
    $value5 = $connection->real_escape_string($values[4]);

    $query = "UPDATE alternatives SET name='$name', value1='$value1', value2='$value2', value3='$value3', value4='$value4', value5='$value5' WHERE id=$id";
    $result = $connection->query($query);
    return $result;
}

// Fungsi Delete
function deleteAlternative($id)
{
    global $connection;
    $query = "DELETE FROM alternatives WHERE id=$id";
    $result = $connection->query($query);
    return $result;
}

// Fungsi Read by ID
function getAlternative($id)
{
    global $connection;
    $query = "SELECT * FROM alternatives WHERE id=$id";
    $result = $connection->query($query);
    $alternative = $result->fetch_assoc();
    return $alternative;
}

// Fungsi mendapatkan nama alternatif berdasarkan ID
function getAlternativeName($id)
{
    $alternative = getAlternative($id);
    if ($alternative) {
        return $alternative['name'];
    } else {
        return 'Alternatif tidak ditemukan';
    }
}
