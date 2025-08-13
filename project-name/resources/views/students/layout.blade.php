<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة الطلاب</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        :root {
            --sidebar-width: 220px;
            --main-bg: #181824;
            --sidebar-bg: #23263a;
            --primary: #4f8cff;
            --primary-hover: #2d98ff;
            --secondary: #44475a;
            --danger: #e74c3c;
            --success: #27ae60;
            --info: #39b3e6;
            --gray: #bcbcbc;
            --card-bg: #23263a;
            --text: #edf2fb;
            --radius: 13px;
            --shadow: 0 2px 16px 0 rgba(44, 62, 80, 0.12);
            --transition: 0.17s cubic-bezier(.4,0,.2,1);
        }
        html, body {
            height: 100%;
            margin: 0; padding: 0;
            font-family: 'Cairo', Tahoma, Arial, sans-serif;
            background: var(--main-bg);
            color: var(--text);
        }
        body {min-height: 100vh; display: flex;}
        .sidebar {
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            color: var(--text);
            min-height: 100vh;
            padding-top: 32px;
            position: fixed;
            top: 0; right: 0; bottom: 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
        }
        .sidebar h2 {
            letter-spacing: 1px;
            margin-bottom: 18px;
            text-align: center;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary);
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
            flex: 1;
        }
        .sidebar ul li {
            margin: 0 0 12px 0;
        }
        .sidebar ul li a {
            display: block;
            color: var(--text);
            text-decoration: none;
            padding: 13px 20px;
            border-radius: var(--radius);
            transition: background var(--transition), color var(--transition);
            font-size: 1.1rem;
        }
        .sidebar ul li a.active,
        .sidebar ul li a:hover {
            background: var(--primary);
            color: #fff;
        }
        .sidebar .logout {
            margin: 30px 0 0 0;
            text-align: center;
        }
        .sidebar .logout a {
            color: var(--danger);
            font-size: 1rem;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: var(--radius);
            display: inline-block;
            background: rgba(231,76,60,0.11);
            transition: background var(--transition), color var(--transition);
        }
        .sidebar .logout a:hover {
            color: #fff;
            background: var(--danger);
        }

        .main-content {
            margin-right: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            min-height: 100vh;
            background: var(--main-bg);
            transition: margin var(--transition);
        }
        .navbar {
            background: var(--sidebar-bg);
            color: var(--primary);
            padding: 18px 32px;
            font-size: 1.18rem;
            font-weight: 800;
            border-radius: 0 0 var(--radius) var(--radius);
            box-shadow: var(--shadow);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .navbar .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--primary);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.1rem;
            box-shadow: 0 1px 5px 0 rgba(44,62,80,.17);
        }
        .container {
            max-width: 930px;
            margin: 0 auto;
            background: var(--card-bg);
            padding: 32px 24px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            margin-top: 32px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0;
            background: var(--card-bg);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
        }
        .table th, .table td {
            padding: 12px 10px;
            border-bottom: 1px solid #292c3b;
            text-align: right;
            color: var(--text);
        }
        .table th {
            background: var(--sidebar-bg);
            color: var(--primary);
            font-weight: 600;
            font-size: 1.09rem;
        }
        .table tr:last-child td { border-bottom: none; }
        .btn {
            border: none;
            padding: 8px 20px;
            border-radius: var(--radius);
            font-size: 1rem;
            cursor: pointer;
            margin: 2px 0;
            transition: background var(--transition), color var(--transition);
            text-decoration: none;
            display: inline-block;
        }
        .btn-success { background: var(--success); color: #fff; }
        .btn-success:hover { background: #219150; }
        .btn-danger { background: var(--danger); color: #fff; }
        .btn-danger:hover { background: #c0392b; }
        .btn-primary { background: var(--primary); color: #fff; }
        .btn-primary:hover { background: var(--primary-hover); }
        .btn-secondary { background: var(--secondary); color: #fff; }
        .btn-secondary:hover { background: #383a4a; }
        .btn-info { background: var(--info); color: #fff; }
        .btn-info:hover { background: #217dbb; }
        .btn-sm { font-size: 0.95rem; padding: 6px 14px; }
        .mb-3 { margin-bottom: 18px; }
        .mb-4 { margin-bottom: 24px; }
        .mt-5 { margin-top: 48px; }
        .card {
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            background: var(--card-bg);
            padding: 18px 24px;
            margin-top: 18px;
        }
        .card-title { font-weight: bold; font-size: 1.18rem; color: var(--primary);}
        .form-control {
            width: 100%;
            padding: 8px 12px;
            border: 1.4px solid #31344a;
            border-radius: var(--radius);
            font-size: 1rem;
            background: #23263a;
            color: var(--text);
            margin-top: 4px;
            margin-bottom: 10px;
            transition: border var(--transition), box-shadow var(--transition);
        }
        .form-control:focus {
            border: 1.4px solid var(--primary);
            outline: none;
            background: #21243a;
            box-shadow: 0 0 0 2px #283d6d;
            color: var(--text);
        }
        label { font-weight: 500; color: var(--primary);}
        .alert {
            border-radius: var(--radius);
            padding: 11px 22px;
            margin-bottom: 13px;
            font-size: 1.05rem;
        }
        .alert-success { background: #252d19; color: #b9ffb3; border: 1px solid #27ae60;}
        /* Responsive */
        @media (max-width: 821px) {
            .container { padding: 16px 4vw; }
            .main-content { width: 100%; margin-right: var(--sidebar-width);}
            .navbar { padding: 12px 12px; font-size: 1rem; }
        }
        @media (max-width: 600px) {
            :root { --sidebar-width: 60px; }
            .sidebar { padding-top: 14px; }
            .sidebar h2 { display: none; }
            .sidebar ul li a {
                padding: 10px 8px;
                font-size: 0.97rem;
                text-align: center;
            }
            .main-content { margin-right: var(--sidebar-width);}
            .container { padding: 10px 1vw; margin-top: 10px; }
            .navbar { padding: 10px 4px; }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <h2>لوحة التحكم</h2>
        <ul>
            <li>
                <a href="{{ route('students.index') }}"
                   class="{{ Request::routeIs('students.index') ? 'active' : '' }}">الطلاب</a>
            </li>
            <li>
                <a href="{{ route('students.create') }}"
                   class="{{ Request::routeIs('students.create') ? 'active' : '' }}">إضافة طالب</a>
            </li>
        </ul>
        <div class="logout">
            <a href="{{ url('/') }}">تسجيل خروج</a>
        </div>
    </aside>
    <div class="main-content">
        <nav class="navbar">
            <span>لوحة إدارة الطلاب</span>
            <span class="avatar">👤</span>
        </nav>
        @yield('content')
    </div>
</body>
</html>