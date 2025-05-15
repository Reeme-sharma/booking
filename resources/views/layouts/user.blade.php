<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Appointment</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
     <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
 
     @vite(['resources/css/app.css', 'resources/js/app.js'])
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   
   <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            position: fixed;
            left: 0;
            top:10;
            width: 220px;
            height: 100vh;
            background: #ffffff;
            padding: 15px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            transform: translateX(0);
            transition: transform 0.3s ease-in-out;
        }
        .sidebar.hidden {
            transform: translateX(-100%);
        }
        .content {
            margin-left: 220px;
            padding: 20px;
            transition: margin-left 0.3s ease-in-out;
            padding-top:50px; /* To avoid going behind header */
        }
      
      .header {
         position: sticky;
         top:0;
         left: 0;
         width: 100%;
         z-index: 40;
         background-color: #0d6efd;
       }

        .toggle-indicator {
            position: fixed;
            top: 50%;
            left: 220px;
            transform: translateX(-100%);
            z-index: 1100;
            background: #007bff;
            color: white;
            border: none;
            padding: 40px 5px;
            cursor: pointer;
            border-radius: 10px 0 0 10px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.2);
            font-size: 12px;
            transition: left 0.3s ease-in-out;
            writing-mode: vertical-rl;
            text-align: center;
        }
        .sidebar.hidden + .toggle-indicator {
            left: 0;
             background: gray;
             transform: translateX(-0%);
             border-radius: 0 10px 10px 0;
        }
           .firm-card {
            margin-top: 30px;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out;
        }
        .firm-card:hover {
            transform: scale(1.03);
        }
        .firm-card h5 {
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }
        .firm-card p {
            color: #666;
        }
        .book-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }
        .book-btn:hover {
            background: #0056b3;
        }

    </style>
     
</head>
<body>
    <div id="navlogo">
    @include('layouts.navigation')
    </div>
    <header class="header bg-primary text-white text-center py-3">
        <h2>Booking Appointment System</h2>
    </header>

    @yield('usersidebar')
    
    <div class="container-fluid">
     
            @yield('content')

    </div>
   
    <script>
        document.querySelectorAll('.book-btn').forEach(button => {
            button.addEventListener('click', function() {
                alert('Appointment booked successfully!');
            });
        });

        window.addEventListener('scroll', function () {
        const scrollTop = window.scrollY || document.documentElement.scrollTop;  //we can use either of these, scrollY or scrollTop both are same to define vertical scroll position
        
        if (scrollTop > 0) {
            sidebar.style.top = '75px';
        } else {
            sidebar.style.top = '140px';
 }
    });

        const toggleTab = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');

        toggleTab.addEventListener('click', function() {
            sidebar.classList.toggle('hidden');
            content.classList.toggle('expanded');
            if (sidebar.classList.contains('hidden')) {
                toggleTab.innerHTML = 'Open';
            } else {
                toggleTab.innerHTML = 'Close';
            }
        });
    </script>
    
</body>
</html>