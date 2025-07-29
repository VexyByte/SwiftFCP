<?php

$host = 'localhost';
$db = 'test';
$user = 'root';
$pass = '';
$limit = 10; // Number of rows per page

// Connect to database
$conn = new mysqli($host, $user, $pass, $db);

// Get current page number from URL (default = 1)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Fetch total records
$result = $conn->query("SELECT COUNT(*) AS total FROM tbl_received_payments");
$total = $result->fetch_assoc()['total'];
$pages = ceil($total / $limit);

// Fetch limited records
$sql = "SELECT * FROM tbl_received_payments LIMIT $start, $limit";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Paginated Users</title>
  <style>
    table { border-collapse: collapse; width: 100%; }
    th, td { padding: 8px 12px; border: 1px solid #ccc; }
    .pagination a {
      margin: 0 5px;
      padding: 6px 10px;
      border: 1px solid #ccc;
      text-decoration: none;
      color: #333;
    }
    .pagination a.active {
      background-color: #007bff;
      color: white;
      border-color: #007bff;
    }
  </style>
</head>
<body>

<h2>User List</h2>
<table>
  <thead>
    <tr><th>No</th><th>Receipt_No</th><th>Date</th><th>Received_From</th><th>Amount</th></tr>
  </thead>
  <tbody>
    <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['No'] ?></td>
        <td><?= $row['Receipt_No'] ?></td>
        <td><?= $row['Date'] ?></td>
        <td><?= $row['Received_From'] ?></td>
        <td><?= $row['Amount'] ?></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<!-- Pagination -->
<div class="pagination">
  <?php for ($i = 1; $i <= $pages; $i++): ?>
    <a href="?page=<?= $i ?>" class="<?= ($i == $page) ? 'active' : '' ?>">
      <?= $i ?>
    </a>
  <?php endfor; ?>
</div>

</body>
</html>
