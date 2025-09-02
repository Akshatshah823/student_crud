<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Course Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6a11cb;
            --secondary: #2575fc;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --info: #17a2b8;
            --light: #f8f9fa;
            --dark: #343a40;
        }

        body {
            /* background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); */
            color: #333;
            padding: 20px;
            min-height: 100vh;
        }

        .container-fluid {
            max-width: 1400px;
        }

        .header-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border: none;
        }

        .page-title {
            color: var(--dark);
            font-weight: 700;
            margin-bottom: 0;
        }

        .gradient-text {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 24px;
        }

        .card-header {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white;
            border-radius: 12px 12px 0 0 !important;
            padding: 15px 20px;
            font-weight: 600;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #5a0db9, #1c67e0);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .table th {
            border-top: none;
            font-weight: 600;
            background-color: #f8f9fa;
        }

        .status-badge {
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
            text-align: center;
            min-width: 100px;
        }

        .status-open {
            background-color: #e8f6ef;
            color: #28a745;
        }

        .status-closed {
            background-color: #feecea;
            color: #dc3545;
        }

        .status-waiting {
            background-color: #fef9e7;
            color: #ffc107;
        }

        .rating {
            color: #ffc107;
            font-weight: 600;
        }

        .action-buttons .btn-group {
            width: 120px;
        }

        .course-badge {
            font-size: 0.85em;
        }

        .search-card .form-control {
            border-radius: 8px;
        }

        .export-buttons .btn {
            border-radius: 8px;
        }

        .pagination .page-link {
            border-radius: 8px;
            margin: 0 3px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: white;
            font-size: 1rem;
            padding: 20px;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .action-buttons .btn-group {
                width: 100%;
                margin-bottom: 10px;
            }

            .header-buttons .btn {
                margin-bottom: 10px;
                width: 100%;
            }

            .card-header {
                padding: 12px 15px;
            }

            .table-responsive {
                border-radius: 0 0 12px 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid py-4">

        <div class="card">
            <div class="card-header">
                <i class="fas fa-list"></i> Courses List (8 records)
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Department</th>
                                <th>Credits</th>
                                <th>Status</th>
                                <th>Rating</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>CS101</code></td>
                                <td>Introduction to Programming</td>
                                <td><span class="badge bg-info course-badge">Computer Science</span></td>
                                <td>4</td>
                                <td><span class="status-badge status-open">Open</span></td>
                                <td class="rating">4.5 <i class="fas fa-star"></i></td>
                                <td class="action-buttons">
                                    <div class="btn-group btn-group-sm">
                                        <a href="#" class="btn btn-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>



                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center p-3">
                    <div>
                        Showing 1 to 8 of 8 entries
                    </div>
                    <div>
                        <nav>
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>© 2023 University Course Management System | <a href="#">View All Courses</a> | <a href="#">Contact Administrator</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
