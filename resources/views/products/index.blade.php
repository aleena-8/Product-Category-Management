<!DOCTYPE html>
<html>

<head>
    <title>Products</title>

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

        .container {
            max-width: 1200px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .top-actions {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 20px;
            gap: 10px;
        }

        .btn {
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background-color: #1e40af;
        }

        .btn-success {
            background-color: #16a34a;
            color: white;
        }

        .btn-success:hover {
            background-color: #15803d;
        }

        .alert-success {
            background-color: #dcfce7;
            color: #166534;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        /* Filter form */
        .filter-form {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .filter-form select {
            padding: 6px 10px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            font-size: 14px;
        }

        .filter-form button {
            padding: 7px 14px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        .filter-form button:hover {
            background-color: #1e40af;
        }

        /* Product table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background-color: #f3f4f6;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        table tr:hover {
            background-color: #f9fafb;
        }

        .status-available {
            color: #16a34a;
            font-weight: bold;
        }

        .status-out {
            color: #dc2626;
            font-weight: bold;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .action-buttons form {
            margin: 0;
        }

        /* Category Product Count */
        .category-count {
            margin-bottom: 20px;
        }

        .category-count ul {
            padding-left: 18px;
            margin-top: 6px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Product Management</h1>
    </div>

    <div class="container">

        <div class="top-actions">
            <a href="{{ url('/') }}" class="btn btn-primary">🏠 Back to Home</a>
            <a href="{{ route('products.create') }}" class="btn btn-success">➕ Add Product</a>
        </div>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <!-- Category Product Count -->
        <div class="category-count">
            <h3>Category Product Count</h3>
            <ul>
                
                    <table border="1">
                       
                            <tr>
                                <th>Category Name</th>
                                <th>Number of Products</th>
                            </tr>
                       
                        
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->products_count }}</td>
                                </tr>
                            @endforeach
                        
                    </table>
                
            </ul>
        </div>

        <!-- Filter by Category -->
        <form class="filter-form" method="GET" action="{{ route('products.index') }}">
            <select name="category_id">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit">Filter</button>
        </form>

        <!-- Product Table -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Total Value</th>
                    <th>Status</th>
                    <th width="180">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name ?? 'No Category' }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->price * $product->stock }}</td>
                        <td>
                            @if ($product->stock == 0)
                                <span class="status-out">Out of Stock</span>
                            @else
                                <span class="status-available">Available</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>

</html>
