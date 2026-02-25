<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>

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
            max-width: 600px;
            margin: 60px auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .back-link {
            display: inline-block;
            margin-bottom: 25px;
            text-decoration: none;
            color: #2563eb;
            font-weight: 500;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #374151;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn {
            background-color: #2563eb;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: #1e40af;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Edit Category</h1>
    </div>

    <div class="container">

        <a href="{{ route('categories.index') }}" class="back-link">
            ⬅ Back to Categories
        </a>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" 
                       value="{{ $category->name }}" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description">
{{ $category->description }}
                </textarea>
            </div>

            <button type="submit" class="btn">
                Update Category
            </button>

        </form>

    </div>

</body>
</html>