<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API REST Documentation and Testing</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f9;
        }

        .content-wrapper {
            margin-top: 20px;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 500;
        }

        .form-group label {
            font-size: 0.9rem;
        }

        .form-control {
            border-radius: 5px;
            font-size: 0.85rem;
        }

        .btn {
            font-size: 0.85rem;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .api-section {
            margin-bottom: 20px;
        }

        .api-section h2 {
            font-size: 1.1rem;
        }

        .api-section .btn-primary,
        .api-section .btn-info,
        .api-section .btn-warning,
        .api-section .btn-danger {
            margin-right: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <h1 class="text-center mb-4">API REST Documentation and Testing</h1>

                        <!-- Create (POST) -->
                        <div class="card card-primary api-section">
                            <div class="card-header">
                                <h2 class="card-title">Create (POST)</h2>
                            </div>
                            <div class="card-body">
                                <form id="createRecordForm" method="POST" action="api.php">
                                    <div class="form-group">
                                        <label for="createValor">Valor:</label>
                                        <input type="text" name="valor" id="createValor" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Create Record" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Read (GET) -->
                        <div class="card card-info api-section">
                            <div class="card-header">
                                <h2 class="card-title">Read (GET)</h2>
                            </div>
                            <div class="card-body">
                                <form id="getRecordForm">
                                    <div class="form-group">
                                        <label for="getId">Enter ID:</label>
                                        <input type="number" id="getId" class="form-control" placeholder="Enter ID to retrieve">
                                    </div>
                                    <button type="button" id="getByIdBtn" class="btn btn-primary">Get Record by ID</button>
                                    <a href="api.php" class="btn btn-info">Get All Records</a>
                                </form>
                            </div>
                        </div>

                        <!-- Update (PUT) -->
                        <div class="card card-warning api-section">
                            <div class="card-header">
                                <h2 class="card-title">Update (PUT)</h2>
                            </div>
                            <div class="card-body">
                                <form id="updateRecordForm" method="POST" action="update.php">
                                    <div class="form-group">
                                        <label for="updateId">ID:</label>
                                        <input type="number" name="id" id="updateId" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="updateValor">New Valor:</label>
                                        <input type="text" name="valor" id="updateValor" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Update Record" class="btn btn-warning">
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Delete (DELETE) -->
                        <div class="card card-danger api-section">
                            <div class="card-header">
                                <h2 class="card-title">Delete (DELETE)</h2>
                            </div>
                            <div class="card-body">
                                <form id="deleteRecordForm" method="POST" action="delete.php">
                                    <div class="form-group">
                                        <label for="deleteId">ID:</label>
                                        <input type="number" name="id" id="deleteId" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Delete Record" class="btn btn-danger">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- AdminLTE -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <!-- SweetAlert Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            // Validate 'valor' fields to accept only decimal values
            function validateDecimal(event) {
                const input = event.target;
                const value = input.value;
                const isValid = /^-?\d*(\.\d+)?$/.test(value);
                if (!isValid) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Input',
                        text: 'Please enter a valid decimal number.',
                    });
                    input.value = '';
                    event.preventDefault();
                }
            }

            // Ensure only integers are allowed in 'id' fields
            function validateInteger(event) {
                const input = event.target;
                const value = input.value;
                const isValid = /^\d+$/.test(value);
                if (!isValid) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Input',
                        text: 'Please enter a valid integer number.',
                    });
                    input.value = '';
                    event.preventDefault();
                }
            }

            // Attach validation to forms
            $('#createRecordForm').on('submit', function(event) {
                const valor = $('#createValor').val();
                if (!valor) {
                    event.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please fill in all required fields!',
                    });
                } else {
                    validateDecimal({ target: document.getElementById('createValor') });
                }
            });

            $('#updateRecordForm').on('submit', function(event) {
                const id = $('#updateId').val();
                const valor = $('#updateValor').val();
                if (!id || !valor) {
                    event.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please fill in all required fields!',
                    });
                } else {
                    validateInteger({ target: document.getElementById('updateId') });
                    validateDecimal({ target: document.getElementById('updateValor') });
                }
            });

            $('#deleteRecordForm').on('submit', function(event) {
                const id = $('#deleteId').val();
                if (!id) {
                    event.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please enter an ID!',
                    });
                } else {
                    validateInteger({ target: document.getElementById('deleteId') });
                }
            });

            $('#getByIdBtn').on('click', function() {
                const id = $('#getId').val();
                if (id) {
                    window.location.href = 'api.php?id=' + id;
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please enter an ID to retrieve!',
                    });
                }
            });

            // Attach validation for 'valor' fields
            $('input[name="valor"]').on('input', validateDecimal);
        });
    </script>
</body>

</html>
