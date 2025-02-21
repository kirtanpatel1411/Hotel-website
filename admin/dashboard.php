<?php 
include 'sidebar.php';
?>

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
            /* background-color: #f4f6f9; */
            display: flex;
        }

        /* Sidebar Styles
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
 */
        /* Main Content Styles */
        .main-content {
            margin-left: 250px;
            padding: 30px;
            /* background: #ffffff; */
            min-height: 100vh;
            flex-grow: 1;
            overflow: auto;
        }

        .main-content {
            min-height: 100vh;
            /* Prevents shifting */
            transition: all 0.3s ease-in-out;
            /* Smooth layout transition */
        }


        .main-content h1 {
            color: #A66914;
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* Stats Cards Styling */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .card {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            color: #A66914;
        }

        .card h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .card a {
            text-decoration: none;
            color: inherit;
        }

        .card a:hover h3 {
            color: #8A5410;
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
    
    <div class="main-content" id="content">
        <h1>Welcome to Admin Dashboard</h1>
        <div class="stats-cards">
            <div class="card"><a href="manage_users.php">
                    <h3>Active Users</h3>
                </a></div>
            <div class="card"><a href="manage_order.php">
                    <h3>Orders</h3>
                </a></div>
            <div class="card"><a href="manage_table.php">
                    <h3>Tables Booked</h3>
                </a></div>
            <div class="card"><a href="view_item.php">
                    <h3>Menu Items</h3>
                </a></div>
        </div>
        <button class="logout" onclick="logout()">Logout</button>
    </div>



    <!-- <script>
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

            // Execute any JavaScript present in the loaded page
            const scripts = contentDiv.getElementsByTagName('script');
            for (let script of scripts) {
                eval(script.innerText);
            }
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
    </script> -->
</body>

</html>