<?php 
$page=basename($_SERVER['SCRIPT_NAME']);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      body {
        display: flex;
        min-height: 100vh;
        margin: 0;
      }

      .sidebar {
        width: 250px;
        min-height: 100vh;
      }

      .main-content {
        flex: 1;
        padding: 20px;
        background-color: #f8f9fa;
      }
      .bg_grandiant_primary {
    background: linear-gradient(45deg, #6a11cb, #2575fc);
    color: #fff !important;
    border-radius: 6px;
}

    </style>
  </head>
  <body>


<div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
    <h4 class="text-center mb-4">☰ Admin Panel</h4>
    <ul class="nav flex-column">
      <li class="nav-item mb-2">
        <a class="nav-link text-white <?= ($page=='index.php') ? 'active bg_grandiant_primary' :''?>" href="../admin/index.php">📊Dashboard</a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link text-white <?= ($page=='add_categories.php') ? 'active bg_grandiant_primary' :''?>" href="../admin/add_categories.php">Add Categories</a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link text-white <?= ($page=='category.php') ? 'active bg_grandiant_primary' :''?>" href="../admin/category.php">Category</a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link text-white" href="#">👤 Users</a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link text-white <?= ($page=='add_products.php') ? 'active bg_grandiant_primary' :''?>" href="add_products.php">📦Add_products</a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link text-white <?= ($page=='ALL_products.php') ? 'active bg_grandiant_primary' :''?>" href="ALL_products.php">📦All_products</a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link text-white <?= ($page=='order.php') ? 'active bg_grandiant_primary' :''?>" href="order.php">🛒 Orders</a>
      </li>
    </ul>
</div>

