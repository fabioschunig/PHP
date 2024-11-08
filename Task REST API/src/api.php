<?php

include 'db.php';

// query params (page and limit)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;  // default is 1
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 15;  // results per page, default is 15

// offset (where the query begins)
$offset = ($page - 1) * $limit;

// query date with pagination
$query = "SELECT id, description, tags, status FROM task LIMIT :limit OFFSET :offset";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

// return data in assoc array
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

// get records total to calculate the number of pages
$countQuery = "SELECT COUNT(1) FROM task";
$countStmt = $pdo->query($countQuery);
$totalRecords = $countStmt->fetchColumn();
$totalPages = ceil($totalRecords / $limit);

// API response in JSON
header('Content-Type: application/json');
echo json_encode([
    'tasks' => $tasks,
    'totalRecords' => $totalRecords,
    'totalPages' => $totalPages,
    'currentPage' => $page,
]);
