<?php
    require_once 'src/models/travel.php';
    $travel = new Travel();
    $allTravels = $travel->getAll();
    $limit = 10;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page -1) * $limit;
    $totalTravels = count($allTravels);
    $totalPages = ceil($totalTravels / $limit);
    $currentTravels = array_slice($allTravels, $offset, $limit);
    $range = 5;
    $startPage = max(1, $page - floor($range / 2));
    $endPage = min($totalPages, $startPage + $range - 1);
    require_once 'index.php';
?>