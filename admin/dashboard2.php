<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* General Styling */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            display: flex;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #A66914;
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            font-size: 22px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
            transition: background 0.3s;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            display: block;
        }

        .sidebar ul li:hover,
        .sidebar ul li.active {
            background-color: #8A5410;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 250px;
            padding: 30px;
            background: #ffffff;
            min-height: 100vh;
            flex-grow: 1;
            overflow: auto;
        }

        .main-content h1 {
            color: #A66914;
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* Logout Button */
        .logout {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .logout:hover {
            background: #c0392b;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>

    <!-- Main Content Area -->
    <div class="main-content" id="content">
        <h1>Welcome to Admin Dashboard</h1>
    </div>

    <!-- JavaScript to Load Content Dynamically -->
    <script>
        function loadContent(page, event) {
            event.preventDefault(); // Prevent default link behavior

            const contentDiv = document.getElementById('content');

            // Remove active class from all menu items
            document.querySelectorAll('#menu li').forEach(item => item.classList.remove('active'));

            // Add active class to the clicked item
            event.currentTarget.parentNode.classList.add('active');

            // Fetch the new page content
            fetch(page)
                .then(response => response.text())
                .then(data => {
                    contentDiv.innerHTML = data;
                })
                .catch(error => {
                    contentDiv.innerHTML = `<h1>Error Loading Page</h1><p>${error.message}</p>`;
                });
        }

        // Logout function
        function logout() {
            if (confirm('Are you sure you want to logout?')) {
                sessionStorage.clear();
                window.location.href = 'login.php';
            }
        }
    </script>

</body>
</html>
