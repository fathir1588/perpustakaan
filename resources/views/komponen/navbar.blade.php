        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button" id="timeIconContainer">
                        <div id="timeIcon">
                            <span id="timeContainer"></span>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>

        <script>
            function updateTime() {
                const now = new Date();
                const options = {
                    timeZone: 'Asia/Jakarta',
                    hour12: false,
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                };
                const timeString = now.toLocaleTimeString('en-US', options);
                document.getElementById('timeContainer').textContent = ' ' + timeString + ' WIB';
            }
            setInterval(updateTime, 1000);
        </script>
