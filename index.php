<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Task Manager</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to right, #4facfe, #00f2fe);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
      max-width: 600px;
      margin: 60px auto;
      background: #ffffffdd;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    h1 {
      text-align: center;
      margin-bottom: 25px;
      font-weight: bold;
      color: #343a40;
    }

    .task {
      background-color: #f8f9fa;
      border-radius: 10px;
      padding: 12px 20px;
      margin-bottom: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: 0.3s;
    }

    .task:hover {
      background-color: #e2e6ea;
    }

    .task a {
      color: #dc3545;
      text-decoration: none;
    }

    .task a:hover {
      color: #bd2130;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>📝 Task Manager</h1>

    <form action="add.php" method="POST" class="d-flex mb-4">
      <input type="text" name="task" class="form-control me-2" placeholder="Add a new task..." required>
      <button class="btn btn-primary">Add</button>
    </form>

    <?php
    $result = $conn->query("SELECT * FROM tasks ORDER BY id DESC");
    while ($row = $result->fetch_assoc()):
    ?>
      <div class="task">
        <span><?php echo htmlspecialchars($row['task']); ?></span>
        <a href="delete.php?id=<?php echo $row['id']; ?>">🗑️</a>
      </div>
    <?php endwhile; ?>
  </div>

</body>
</html>
