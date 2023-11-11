<nav class="sidebar "> <!--close--> 
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../components/new-icon.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Numplay</span>
                    <span class="profession">Web developer</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links" style="padding-left: 0;">
                    <li class="nav-link">
                        <a href="index.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="games.php">
                          <i class='bx bx-joystick icon'></i>
                            <span class="text nav-text">Games</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-film icon' ></i>
                            <span class="text nav-text">Films-serials</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-cog icon' ></i>
                            <span class="text nav-text">applications</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bell icon' ></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="userlist.php">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">User list</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#" class="logout" >
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <script>
  const body = document.querySelector('body'),
    sidebar = body.querySelector('nav'),
    toggle = body.querySelector(".toggle"),
    searchBtn = body.querySelector(".search-box"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");

  // Funkcia na zapnutie dark modu
  function enableDarkMode() {
    body.classList.add("dark");
    modeText.innerText = "Light mode";
    localStorage.setItem('darkMode', 'enabled');
  }

  // Funkcia na vypnutie dark modu
  function disableDarkMode() {
    body.classList.remove("dark");
    modeText.innerText = "Dark mode";
    localStorage.setItem('darkMode', 'disabled');
  }

  // Funkcia na otvorenie navigačnej lišty
  function openSidebar() {
    sidebar.classList.remove("close");
    sessionStorage.setItem('sidebarOpen', 'true');
  }

  // Funkcia na zatvorenie navigačnej lišty
  function closeSidebar() {
    sidebar.classList.add("close");
    sessionStorage.setItem('sidebarOpen', 'false');
  }

  // Kontrola stavu dark modu pri načítaní stránky
  function checkDarkModeStatus() {
    const darkModeStatus = localStorage.getItem('darkMode');
    if (darkModeStatus === 'enabled') {
      enableDarkMode();
    } else {
      disableDarkMode();
    }
  }

  // Spustíme kontrolu pri načítaní stránky
  checkDarkModeStatus();

  // Kontrola stavu navigačnej lišty pri načítaní stránky
  function checkSidebarStatus() {
    const sidebarOpen = sessionStorage.getItem('sidebarOpen');
    if (sidebarOpen === 'true') {
      openSidebar();
    } else {
      closeSidebar();
    }
  }

  // Spustíme kontrolu pri načítaní stránky
  checkSidebarStatus();

  toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if (sidebar.classList.contains("close")) {
      sessionStorage.setItem('sidebarOpen', 'false');
    } else {
      sessionStorage.setItem('sidebarOpen', 'true');
    }
  });

  modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark");
    
    if (body.classList.contains("dark")) {
      modeText.innerText = "Light mode";
      localStorage.setItem('darkMode', 'enabled');
    } else {
      modeText.innerText = "Dark mode";
      localStorage.setItem('darkMode', 'disabled');
    }
  });
</script>