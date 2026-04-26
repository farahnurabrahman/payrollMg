<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../../import/assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../../../import/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../../import/assets/datatables/dataTables.bootstrap4.min.js" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">PM system</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="/home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Interface
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Administration</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/companies">Company</a>
                        <a class="collapse-item" href="/departments">Departments</a>
                        <a class="collapse-item" href="/employees">Employees</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Finance</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/payrollRecords">Payroll</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </li>

                    </ul>
                </nav>
                <div class="container-fluid">
                    @if(session('success') || session('info') || $errors->has('msg') || session('error'))
                    <div id="alert-container">
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('info'))
                        <div class="alert alert-info">{{ session('info') }}</div>
                        @endif

                        @if($errors->has('msg'))
                        <div class="alert alert-danger">{{ $errors->first('msg') }}</div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Stop!</strong> {{ session('error') }}
                        </div>
                        @endif
                    </div>
                    @endif
                    @yield('content')
                </div>

            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../import/assets/jquery/jquery.min.js"></script>
    <script src="../../../import/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../import/assets/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../../import/assets/css/sb-admin-2.min.css"></script>
    <script src="../../../import/assets/chart.js/Chart.min.js"></script>
    <script src="../../../import/assets/js/sb-admin-2.min.js"></script>
    <script src="../../../import/assets/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../import/assets/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../../../import/assets/js/demo/datatables-demo.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const alertBox = document.getElementById('alert-container');

        if (alertBox) {
            setTimeout(() => {
                // Option A: Simple hide
                alertBox.style.display = 'none';

                // Option B: Smooth fade out (nicer)
                alertBox.style.transition = "opacity 0.5s ease";
                alertBox.style.opacity = "0";
                setTimeout(() => alertBox.remove(), 500);
            }, 5000); // 5000ms = 5 seconds
        }
    });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Now $ (jQuery) is guaranteed to be ready
        $('#myTable').DataTable();
    });
    </script>
    <script>
    // List all your IDs in an array
    const fields = ['allowance', 'basic_salary', 'hourly_rate'];

    fields.forEach(id => {
        const input = document.getElementById(id);

        if (input) {
            input.addEventListener('change', function() {
                if (this.value !== "") {
                    // Force 2 decimal places on change
                    this.value = parseFloat(this.value).toFixed(2);
                }
            });
        }
    });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const yearSelect = document.getElementById('year_select');
        const monthSelect = document.getElementById('month_select');

        const monthNames = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        function updateMonths() {
            const selectedYear = parseInt(yearSelect.value);
            const currentYear = new Date().getFullYear();
            const currentMonth = new Date().getMonth() + 1; // 1-12

            // Simpan nilai bulan yang dipilih sebelum ni (optional)
            const previousValue = monthSelect.value;

            // Kosongkan dropdown bulan
            monthSelect.innerHTML = '<option value="">-- Pilih Bulan --</option>';

            // Tentukan berapa banyak bulan nak tunjuk
            // Jika tahun sekarang, hadkan. Jika tahun lepas, tunjuk 12.
            let limit = (selectedYear === currentYear) ? currentMonth : 12;

            for (let i = 1; i <= limit; i++) {
                let option = document.createElement('option');
                option.value = i;
                option.text = monthNames[i - 1];

                if (i == previousValue) option.selected = true;
                monthSelect.appendChild(option);
            }
        }

        // Jalankan setiap kali tukar tahun
        yearSelect.addEventListener('change', updateMonths);

        // Jalankan sekali masa page mula-mula load
        updateMonths();
    });
    </script>

</body>