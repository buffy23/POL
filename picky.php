-- DATABASE (MySQL)

CREATE DATABASE poultry_db;
USE poultry_db;

CREATE TABLE poultry (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(255),
    quantity INT,
    date_added DATE
);

CREATE TABLE eggs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    quantity INT,
    date_collected DATE
);

CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item VARCHAR(255),
    quantity INT,
    amount DECIMAL(10,2),
    date_sold DATE
);

CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255),
    amount DECIMAL(10,2),
    date_incurred DATE
);

CREATE TABLE feed (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(255),
    quantity INT,
    date_received DATE
);

-- PHP BACKEND (in backend/api/)

// db.php
<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "poultry_db";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

// add_poultry.php
<?php
require 'db.php';
$data = json_decode(file_get_contents("php://input"));
$sql = "INSERT INTO poultry (type, quantity, date_added) VALUES ('$data->type', '$data->quantity', '$data->date')";
$conn->query($sql);
echo json_encode(["message" => "Poultry record added"]);
?>

// add_eggs.php
<?php
require 'db.php';
$data = json_decode(file_get_contents("php://input"));
$sql = "INSERT INTO eggs (quantity, date_collected) VALUES ('$data->quantity', '$data->date')";
$conn->query($sql);
echo json_encode(["message" => "Egg record added"]);
?>

// add_sales.php
<?php
require 'db.php';
$data = json_decode(file_get_contents("php://input"));
$sql = "INSERT INTO sales (item, quantity, amount, date_sold) VALUES ('$data->item', '$data->quantity', '$data->amount', '$data->date')";
$conn->query($sql);
echo json_encode(["message" => "Sales record added"]);
?>

// add_expense.php
<?php
require 'db.php';
$data = json_decode(file_get_contents("php://input"));
$sql = "INSERT INTO expenses (description, amount, date_incurred) VALUES ('$data->description', '$data->amount', '$data->date')";
$conn->query($sql);
echo json_encode(["message" => "Expense record added"]);
?>

// add_feed.php
<?php
require 'db.php';
$data = json_decode(file_get_contents("php://input"));
$sql = "INSERT INTO feed (type, quantity, date_received) VALUES ('$data->type', '$data->quantity', '$data->date')";
$conn->query($sql);
echo json_encode(["message" => "Feed record added"]);
?>

-- FRONTEND (React)

// index.js
import React from 'react';
import ReactDOM from 'react
