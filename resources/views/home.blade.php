<!DOCTYPE html>
<html>
<head>
    <title>Inventory System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
        }

        .header {
            background-color: #1f2937;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            font-size: 28px;
        }

        .main {
            max-width: 900px;
            margin: 60px auto;
            padding: 20px;
            text-align: center;
        }

        .main p {
            color: #555;
            margin-bottom: 40px;
            font-size: 18px;
        }

        .card-container {
            display: flex;
            justify-content: center;
            gap: 40px;
        }

        .card {
            background: white;
            width: 280px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .card h3 {
            margin-bottom: 15px;
            color: #1f2937;
        }

        .card p {
            font-size: 14px;
            margin-bottom: 25px;
            color: #777;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            background-color: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: #1e40af;
        }

        footer {
            text-align: center;
            margin-top: 80px;
            padding: 20px;
            color: #888;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .card-container {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Inventory Management System</h1>
    </div>

    <div class="main">
        <p>Manage your products and categories efficiently with this system.</p>

        <div class="card-container">

            <div class="card">
                <h3>📂 Categories</h3>
                <p>Create and manage product categories easily.</p>
                <a href="{{ route('categories.index') }}" class="btn">
                    Manage Categories
                </a>
            </div>

            <div class="card">
                <h3>📦 Products</h3>
                <p>Add, update, and track product inventory.</p>
                <a href="{{ route('products.index') }}" class="btn">
                    Manage Products
                </a>
            </div>

        </div>
    </div>

    

</body>
</html>