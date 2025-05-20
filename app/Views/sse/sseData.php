<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Live Presensi Stream</title>


    <!-- First, include jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Then, include Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- Add FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />


    <style>
        /* Basic Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }

        input,
        select,
        button {
            margin: 5px;
            padding: 8px 12px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        #limit {
            width: 80px;
            /* Set a shorter width for the "Limit" input box */
        }

        /* Basic Status Styling */
        /* Status container and general styles */
        .status {
            padding: 15px;
            margin: 10px 0;
            border-radius: 4px;
            font-weight: bold;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            /* Space between icon and text */
        }

        /* Connected Status Styling */
        .status.connected {
            background-color: #dff0d8;
            /* Light green background */
            color: #3c763d;
            /* Dark green text */
        }

        /* Disconnected Status Styling */
        .status.disconnected {
            background-color: #f2dede;
            /* Light red background */
            color: #a94442;
            /* Dark red text */
        }

        /* Loading Status Styling */
        .status.loading {
            background-color: #d9edf7;
            /* Light blue background */
            color: #31708f;
            /* Blue text */
        }

        /* Hover Effect for Status Icon */
        .status-icon:hover {
            cursor: pointer;
            opacity: 0.8;
            /* Slight transparency on hover */
        }

        /* Status text color and background styles */
        #connectionStatus {
            font-size: 18px;
            margin-left: 10px;
        }

        /* Status text and icon color changes for different states */
        #connectionStatus.connected {
            color: #3c763d;
            /* Green color for connected */
        }

        #connectionStatus.disconnected {
            color: #a94442;
            /* Red color for disconnected */
        }

        #connectionStatus.loading {
            color: #31708f;
            /* Blue color for loading */
        }

        /* Icon color changes based on connection status */
        #connectionIcon.connected {
            color: #3c763d;
            /* Green color for connected icon */
        }

        #connectionIcon.disconnected {
            color: #a94442;
            /* Red color for disconnected icon */
        }

        #connectionIcon.loading {
            color: #31708f;
            /* Blue color for loading icon */
        }



        /* Optional: Styling for the badge */
        #badgeCount {
            background-color: #007bff;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
        }

        select {
            width: 250px;
            /* Limit the width of the select dropdown */
        }

        button {
            background-color: #4CAF50;
            /* Green by default */
            color: white;
            border: none;
            cursor: pointer;
            min-width: 100px;
            transition: background-color 0.3s, opacity 0.3s;
            /* Add transition effect */
        }

        button:hover {
            opacity: 0.9;
            background-color: #45a049;
            /* Darker shade for hover */
        }

        button:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }

        /* Action buttons with distinct colors */
        #applyFilters {
            background-color: #007bff;
            /* Blue for applying filters */
        }

        #applyFilters:hover {
            background-color: #0056b3;
        }

        #clearFilters {
            background-color: #f0f0f0;
            /* Neutral gray for reset */
            color: #555;
        }

        #clearFilters:hover {
            background-color: #e0e0e0;
        }




        button.danger {
            background-color: #f44336;
            /* Red button for danger actions */
        }

        /* Success button when connected */
        button.success {
            background-color: #28a745;
            /* Green */
        }

        /* Optional: Hover effect */
        button:hover {
            opacity: 0.9;
        }

        /* Table and Result Display */
        pre,
        table {
            background: #f5f5f5;
            padding: 10px;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
            width: 100%;
        }

        table {
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px 16px;
            /* More padding for readability */
            border: 1px solid #ddd;
            text-align: center;
            /* Center-align table content */
        }

        thead {
            background-color: #d3d3d3;
            /* Light grey background */
            color: #333;
            /* Dark text color for contrast */
            font-weight: bold;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
            /* Light gray row on hover */
        }

        #resultsTable tbody tr.highlight {
            background-color: #e0ffe0;
            /* Highlight row in light green */
        }


        /* Modal Styles for Image Preview */
        #imagePreviewModal,
        #mapPreviewModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        #modalContent {
            background: white;
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            max-width: 80%;
            /* Ensures the modal doesn’t stretch too wide */
            max-height: 80%;
            /* Prevent the modal from overflowing */
            overflow-y: auto;
        }

        #closeModal {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 30px;
            color: red;
            cursor: pointer;
        }

        /* Pagination and Navigation Controls */
        .connection-controls {
            display: flex;
            gap: 10px;
            margin: 15px 0;
            align-items: center;
        }

        #prevBtn,
        #nextBtn {
            background-color: #007bff;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
        }

        #prevBtn:disabled,
        #nextBtn:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }

        #prevBtn:hover,
        #nextBtn:hover {
            background-color: #0056b3;
        }

        /* Badge for record count */
        .badge {
            background-color: #007bff;
            color: white;
            border-radius: 10px;
            padding: 2px 8px;
            margin-left: 4px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            select {
                width: 100%;
                /* Make select box full width on small screens */
            }

            button {
                min-width: auto;
                /* Let buttons take up only necessary space */
            }

            table {
                font-size: 12px;
                /* Adjust font size for small screens */
            }

            .connection-controls {
                flex-direction: column;
                /* Stack controls vertically on small screens */
                align-items: flex-start;
            }

            .connection-controls button {
                margin-bottom: 10px;
            }

            #date-time-container {
                font-size: 14px;
                text-align: left;
                /* Ensures that date-time is aligned left on small screens */
            }

            .status-icon {
                font-size: 18px;
                /* Smaller icons on smaller screens */
            }

            .status {
                font-size: 14px;
                /* Smaller text on smaller screens */
            }

            #badgeCount {
                font-size: 12px;
                /* Adjust badge size on smaller screens */
                padding: 2px 6px;
            }
        }

        /* Flexbox layout to align content on the same line */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
            color: #333;
            font-weight: bold;
        }

        /* Title Styling */
        h2.header {
            font-size: 32px;
            /* Larger font size for the title */
            font-weight: bold;
            /* Bold text */
            color: #333;
            /* Dark text color */
            display: flex;
            justify-content: space-between;
            /* Align content on both sides */
            align-items: center;
            /* Align vertically to the center */
            margin-top: 0;
            /* No top margin to push the content higher */
            /* Remove the default margin-top */
            margin-bottom: 15px;
            /* Space below the title */
            text-align: left;
            /* Align text to the left */
            border-bottom: 2px solid #007bff;
            /* Optional: underline for emphasis */
            padding-bottom: 10px;
            /* Space between the title and underline */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);

        }

        .status-container {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-left: auto;
            /* Automatically aligns this section to the right */
        }

        /* Date-Time Container styling (on the right side of the header) */
        #date-time-container {
            font-size: 16px;
            font-weight: bold;
            color: #007bff;
            /* Blue color for the date-time */
            text-align: right;
            /* Align to the right */

        }

        img {
            vertical-align: middle;
            /* Align logo with text */
        }



        footer {
            position: fixed;
            bottom: 15px;
            right: 15px;
            font-size: 14px;
            color: #fff;
            background-color: #333;
            padding: 8px 12px;
            border-radius: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            text-align: left;
            z-index: 1000;
            display: flex;
            align-items: center;
            font-weight: bold;
            font-family: Arial, sans-serif;
            opacity: 0.95;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }

        footer img {
            width: 18px;
            height: 18px;
            margin-right: 8px;
            filter: brightness(0) invert(1);
        }

        footer a {
            color: white;
            /* Ensures the link is white */
            text-decoration: none;
            /* Removes underline */
            font-weight: bold;
            /* Makes the link text bold */
        }

        footer a:hover {
            text-decoration: underline;
            /* Adds underline on hover for better user interaction */
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        /* Action Button Styling */
        button.action {
            background-color: #007bff;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        button.action:hover {
            background-color: #0056b3;
            opacity: 0.9;
        }
    </style>

</head>

<body>
    <h2 class="header">
        <span style="display: flex; align-items: center; gap: 10px;">
            <!-- Logo Image -->
            <img src="<?php base_url(); ?>/assets/icon.png" alt="Logo" style="width: 50px; height: 60px; vertical-align: middle;">

            <!-- Title Text -->
            <span>
                Live Presensi Stream <span class="badge" id="badgeCount" style="margin-left: 10px;">0</span>
                <br>
                <!-- Subtitle -->
                <span style="font-size: 20px; color: #555;">Subtitle for the live presensi stream</span>
            </span>
        </span>

        <!-- Status with icon -->
        <div class="status-container" style="display: inline-flex; align-items: center; gap: 10px; margin-left: auto;">
            <!-- Connection Icon -->
            <span class="status-icon" id="connectionIcon" style="font-size: 20px;"></span>
            <!-- Connection Status Text -->
            <span class="status" id="connectionStatus">Disconnected</span>
        </div>

        <!-- Date and time aligned to the right -->
        <div id="date-time-container" style="display: inline-block; margin-left: 20px; font-weight: bold;">
            <span id="current-day"></span>, <span id="current-date"></span> | <span id="current-time"></span>
        </div>
    </h2>

    <div>
        <!-- Dropdown for Nama OPD -->
        <label for="nama_opd">OPD:</label>
        <select id="nama_opd">
            <option value="">Select All OPD</option>
            <!-- Options will be populated dynamically -->
        </select>

        <!-- Dropdown for Nama Pegawai (Filtered by OPD) -->
        <label for="nama_pegawai">Pegawai:</label>
        <select id="nama_pegawai">
            <option value="">Select All Pegawai</option>
            <!-- Options will be populated dynamically after OPD selection -->
        </select>

        <label>Limit: <input type="number" id="limit" value="10" min="1"></label>
        <label>Date: <input type="date" id="filter_date"></label>
        <label>Search: <input type="text" id="searchInput" placeholder="Search Nama/NIP..."></label>
    </div>

    <div class="connection-controls">
        <button id="applyFilters">Apply Filters</button>
        <button id="clearFilters">Clear Filters</button>

        <button id="prevBtn" disabled>Previous</button>
        <span id="pageLabel">Page: 1</span>
        <button id="nextBtn">Next</button>
        <button id="forceReconnect">Force Reconnect</button>
        <button id="exportCSV">Export CSV</button>
        <button id="exportExcel">Export Excel</button>
        <button id="exportPDF">Export PDF</button>
    </div>

    <div id="loading" class="status loading" style="display:none">Loading...</div>
    <div id="emptyState" class="status" style="display:none">No data available.</div>
    <!-- Modal for Action -->
    <div id="actionModal" class="modal" style="display: none;">
        <div id="modalContent">
            <span id="closeModal" style="cursor:pointer;">&times;</span>
            <h3>Action Modal</h3>
            <div id="modalDetails">
                <!-- Dynamic content will be inserted here -->
            </div>
        </div>
    </div>

    <!-- Modal for Image Preview -->
    <div id="imagePreviewModal" style="display:none;">
        <div id="modalContent">
            <span id="closeModal" style="cursor:pointer;">&times;</span>
            <img id="previewImage" src="" alt="Image Preview"
                style="max-width:100%; max-height:100%; margin: 20px auto; display:block;">
        </div>
    </div>

    <!-- Modal for Google Map Preview -->
    <div id="mapPreviewModal" style="display:none;">
        <div id="modalContent">
            <span id="closeModal" style="cursor:pointer;">&times;</span>
            <h3>Google Maps Location</h3>
            <iframe id="googleMap" width="600" height="400" frameborder="0" style="border:0;" allowfullscreen=""
                aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>


    <table id="resultsTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Hari</th> <!-- New column for Hari -->
                <th>Tanggal</th> <!-- New column for Tanggal -->
                <th>Jam Masuk</th>
                <th>Keterangan Masuk</th>
                <!-- <th>Foto Masuk</th> -->
                <th>Jam Siang</th>
                <th>Keterangan Siang</th>
                <!-- <th>Foto Siang</th> -->
                <th>Jam Pulang</th>
                <th>Keterangan Pulang</th>
                <!-- <th>Foto Pulang</th> -->
                <th>Action</th>
            </tr>
        </thead>

        <tbody></tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.16/jspdf.plugin.autotable.min.js"></script>

    <script>
        function updateDateTime() {
            const dateTimeContainer = document.getElementById("date-time-container");

            // Get current date and time
            const currentDate = new Date();

            // Day of the week (in Indonesian)
            const daysOfWeek = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const dayOfWeek = daysOfWeek[currentDate.getDay()];

            // Date in DD/MM/YYYY format
            const day = currentDate.getDate();
            const month = currentDate.getMonth() + 1; // Months are 0-indexed
            const year = currentDate.getFullYear();
            const formattedDate = `${day < 10 ? '0' + day : day}/${month < 10 ? '0' + month : month}/${year}`;

            // Time with 24-hour format (HH:MM:SS)
            const timeString = currentDate.toLocaleTimeString([], {
                hour12: false
            }); // 24-hour format

            // Update the day, date, and time on the page
            document.getElementById("current-day").textContent = dayOfWeek;
            document.getElementById("current-date").textContent = formattedDate;
            document.getElementById("current-time").textContent = timeString;
        }

        // Update the date, day, and time every second
        setInterval(updateDateTime, 1000);

        // Call once to display immediately
        updateDateTime();

        const CONFIG = {
            RECONNECT_DELAY: 3000,
            MAX_RETRIES: 5,
            HEARTBEAT_TIMEOUT: 15000
        };

        let state = {
            page: 1,
            limit: 10,
            eventSource: null,
            isConnected: false,
            retryCount: 0,
            lastHeartbeat: null,
            heartbeatCheck: null,
            fullData: [],
            totalRecords: 0,
            totalPages: 0
        };

        const elements = {
            status: document.getElementById('connectionStatus'),
            tableBody: document.querySelector('#resultsTable tbody'),
            badgeCount: document.getElementById('badgeCount'),
            prevBtn: document.getElementById('prevBtn'),
            nextBtn: document.getElementById('nextBtn'),
            pageLabel: document.getElementById('pageLabel'),

            loading: document.getElementById('loading'),
            emptyState: document.getElementById('emptyState'),
            limitSelect: document.getElementById('limit'),
            searchInput: document.getElementById('searchInput')
        };

        function updateStatus(connected) {
            const statusElement = document.getElementById('connectionStatus');
            const statusIcon = document.getElementById('connectionIcon');

            // Clear all previous status and icon classes
            statusElement.classList.remove('connected', 'disconnected', 'loading');
            statusIcon.classList.remove('connected', 'disconnected', 'loading');
            statusIcon.classList.remove('fas', 'fa-check-circle', 'fa-times-circle'); // Remove all FontAwesome icons

            // Check connection status and update the element accordingly
            if (connected) {
                // Set status text to 'Connected'
                statusElement.textContent = 'Connected';

                // Add connected status and icon
                statusElement.classList.add('connected');
                statusIcon.classList.add('fas', 'fa-check-circle', 'connected'); // Add the check-circle icon for connected

                // Optionally, remove the disconnected class if it's present
                statusElement.classList.remove('disconnected');
            } else {
                // Set status text to 'Disconnected'
                statusElement.textContent = 'Disconnected';

                // Add disconnected status and icon
                statusElement.classList.add('disconnected');
                statusIcon.classList.add('fas', 'fa-times-circle', 'disconnected'); // Add the times-circle icon for disconnected

                // Optionally, remove the connected class if it's present
                statusElement.classList.remove('connected');
            }
        }

        // Call this function to set status based on connection status
        // Example:
        updateStatus(true); // Call this for connected status
        // updateStatus(false);  // Call this for disconnected status

        $(document).ready(function() {
            // Initialize Select2 for 'nama_opd' and 'nama_pegawai'
            $('#nama_opd').select2({
                placeholder: "Select Nama OPD",
                allowClear: true // This enables the "X" button to clear the selection
            });

            $('#nama_pegawai').select2({
                placeholder: "Pilih Semua Pegawai",
                allowClear: true,
                disabled: true // Initially disable Nama Pegawai until OPD is selected
            });

            // Fetch OPD list and populate the dropdown
            fetch('http://localhost:3000/api/v1/stream/opd-list') // Fetch from backend
                .then(response => response.json())
                .then(data => {
                    const opdSelect = document.getElementById('nama_opd');
                    data.forEach(opd => {
                        const option = document.createElement('option');
                        option.value = opd.id_opd; // Use id_opd as value
                        option.textContent = opd.nama_opd; // Display nama_opd in dropdown
                        opdSelect.appendChild(option);
                    });
                    // Reinitialize select2 after populating options
                    $('#nama_opd').select2();
                })
                .catch(error => console.error('Error fetching OPD list:', error));

            // Fetch Pegawai list when OPD is selected or when no OPD is selected
            $('#nama_opd').on('change', function() {
                const idOpd = $(this).val(); // Get the selected id_opd
                const pegawaiSelect = document.getElementById('nama_pegawai');

                // Clear previous options and reset the selection
                pegawaiSelect.innerHTML = '';

                // Add "Pilih Semua Pegawai" option at the top of the dropdown
                const selectOption = document.createElement('option');
                selectOption.value = '';
                selectOption.textContent = 'Pilih Semua Pegawai'; // Change option text
                pegawaiSelect.appendChild(selectOption);

                // If no OPD is selected, fetch all Pegawai and enable the dropdown
                if (!idOpd) {
                    // Fetch all Pegawai if no OPD is selected
                    fetch('http://localhost:3000/api/v1/stream/pegawai-list') // Fetch all Pegawai
                        .then(response => response.json())
                        .then(data => {
                            // Populate the pegawai dropdown with all Pegawai names
                            data.forEach(pegawai => {
                                const option = document.createElement('option');
                                option.value = pegawai.id_pegawai; // Use id_pegawai as value
                                option.textContent = pegawai.nama_pegawai; // Display only nama_pegawai
                                pegawaiSelect.appendChild(option);
                            });

                            // Reinitialize select2 after appending the options
                            $('#nama_pegawai').select2({
                                placeholder: "Pilih Semua Pegawai",
                                allowClear: true
                            });

                            // Enable the pegawai dropdown
                            $('#nama_pegawai').prop('disabled', false); // Enable the dropdown

                            // Automatically open the dropdown when populated
                            // $('#nama_pegawai').select2('open'); // Open the dropdown immediately
                        })
                        .catch(error => console.error('Error fetching Pegawai list:', error));
                } else {
                    // Fetch Pegawai list based on selected OPD
                    fetch(`http://localhost:3000/api/v1/stream/pegawai-list?id_opd=${idOpd}`)
                        .then(response => response.json())
                        .then(data => {
                            // Populate the pegawai dropdown based on selected OPD
                            data.forEach(pegawai => {
                                const option = document.createElement('option');
                                option.value = pegawai.id_pegawai; // Use id_pegawai as value
                                option.textContent = pegawai.nama_pegawai; // Display only nama_pegawai
                                pegawaiSelect.appendChild(option);
                            });

                            // Reinitialize select2 after appending the options
                            $('#nama_pegawai').select2({
                                placeholder: "Pilih Semua Pegawai",
                                allowClear: true
                            });

                            // Enable the pegawai dropdown
                            $('#nama_pegawai').prop('disabled', false); // Enable the dropdown

                            // Automatically open the dropdown when populated
                            $('#nama_pegawai').select2('open'); // Open the dropdown immediately
                        })
                        .catch(error => console.error('Error fetching Pegawai list for selected OPD:', error));
                }
            });

            // Trigger a change event when the page loads to populate the Nama Pegawai dropdown correctly
            $('#nama_opd').trigger('change');
        });


        // Function to build the SSE URL for streaming the data with pagination
        function buildSSEUrl() {
            const {
                id_opd,
                id_pegawai,
                nip_pegawai,
                limit,
                date,
                search
            } = getFilters();
            let url = `http://localhost:3000/api/v1/stream/presensi?page=${state.page}&limit=${limit}&_=${Date.now()}`;
            if (id_opd) url += `&id_opd=${id_opd}`;
            if (nip_pegawai) url += `&nip_pegawai=${nip_pegawai}`;
            if (id_pegawai) url += `&id_pegawai=${id_pegawai}`;
            if (date) url += `&date=${encodeURIComponent(date)}`;
            if (search) url += `&search=${encodeURIComponent(search)}`;
            return url;
        }

        // Get filters from input fields
        function getFilters() {
            return {
                id_opd: document.getElementById("nama_opd") ? document.getElementById("nama_opd").value : "",
                id_pegawai: document.getElementById("nama_pegawai") ? document.getElementById("nama_pegawai").value : "", // Fetch id_pegawai
                limit: elements.limitSelect.value || 10,
                date: document.getElementById("filter_date").value,
                search: elements.searchInput.value
            };
        }

        function formatTime(dateTimeStr) {
            if (!dateTimeStr) {
                return 'Belum Presensi'; // Return "Belum Presensi" if dateTimeStr is null, undefined, or falsy
            }

            const time = new Date(dateTimeStr);

            // Check if the date is valid
            if (isNaN(time)) {
                return 'Belum Presensi'; // Return "Belum Presensi" if the date is invalid
            }

            // Format the time as a string in 24-hour format
            return time.toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false // This will format the time in 24-hour format
            });
        }
        // Function to get the day of the week (Hari)
        function getDayOfWeek(dateStr) {
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const date = new Date(dateStr);
            return days[date.getDay()]; // Returns the day of the week (e.g., Senin, Selasa)
        }

        // Function to format the date (Tanggal)
        function formatDate(dateStr) {
            const date = new Date(dateStr);
            const day = date.getDate();
            const month = date.getMonth() + 1; // Months are zero-indexed
            const year = date.getFullYear();
            return `${day}/${month}/${year}`; // Returns in the format: 2/5/2025
        }

        function getExistingRow(id_presensi) {
            const rows = elements.tableBody.getElementsByTagName('tr');
            for (let row of rows) {
                const idColumn = row.cells[0].textContent.trim();
                if (idColumn == id_presensi) {
                    return row;
                }
            }
            return null;
        }

        // Update the table row when data is updated
        function updateTableRow(row, data) {
            row.cells[2].textContent = getDayOfWeek(data.jam_masuk) || 'N/A'; // Hari
            row.cells[3].textContent = formatDate(data.jam_masuk) || 'N/A'; // Tanggal
            row.cells[4].textContent = formatTime(data.jam_masuk) || 'N/A';
            row.cells[5].textContent = data.ket_masuk || 'N/A';
            row.cells[6].querySelector('img').src = data.foto_masuk || '#';

            if (data.jam_siang) {
                row.cells[7].textContent = formatTime(data.jam_siang);
                row.cells[8].textContent = data.ket_siang || 'N/A';
                row.cells[9].querySelector('img').src = data.foto_siang || '#';
            }

            if (data.jam_pulang) {
                row.cells[10].textContent = formatTime(data.jam_pulang);
                row.cells[11].textContent = data.ket_pulang || 'N/A';
                row.cells[12].querySelector('img').src = data.foto_pulang || '#';
            }
        }

        // Function to create the link in Keterangan column if coordinates exist
        function createKeteranganLink(ketData) {
            if (ketData.coordinates) {
                return `${ketData.tag} <a href="https://www.google.com/maps/place/${ketData.coordinates}" target="_blank">View on Google Maps</a>; ${ketData.message}`;
            }
            return ketData.message || 'N/A';
        }

        // Function to parse the Keterangan data and extract coordinates
        function parseKeterangan(keterangan) {
            // Check if keterangan is not null, undefined, or an empty string
            if (!keterangan) {
                return {
                    tag: 'N/A',
                    coordinates: '',
                    message: ''
                };
            }

            const parts = keterangan.split(';');
            const tag = parts[0] || 'N/A';
            const coordinates = parts[1] && parts[1].includes('HyperlinkMaps') ? parts[1].replace('HyperlinkMaps{', '')
                .replace('}', '') : '';
            const message = parts[2] || '';

            return {
                tag,
                coordinates,
                message
            };
        }


        function createMapLink(coordinates) {
            // Ensure coordinates are properly formatted as latitude,longitude
            const formattedCoordinates = coordinates ? encodeURIComponent(coordinates.trim()) : '';

            if (formattedCoordinates) {
                // Google Maps direct link
                const googleMapsLink = `https://www.google.com/maps/place/${formattedCoordinates}`;

                return `<a href="${googleMapsLink}" target="_blank">${formattedCoordinates}</a>`;
            } else {
                return '';
            }
        }

        function addNewRow(row, rowIndex) {
            const tr = document.createElement('tr');

            // Safely parse Keterangan data (split by ';')
            const masukData = row.ket_masuk ? row.ket_masuk.split(';') : ['Belum Presensi', '', ''];
            const siangData = row.ket_siang ? row.ket_siang.split(';') : ['Belum Presensi', '', ''];
            const pulangData = row.ket_pulang ? row.ket_pulang.split(';') : ['Belum Presensi', '', ''];

            // Usage in addNewRow function
            const masukMapLink = createMapLink(masukData[1]); // Example: "-5.3443309,105.0042604"
            const siangMapLink = createMapLink(siangData[1]); // Example: "-5.3443309,105.0042604"
            const pulangMapLink = createMapLink(pulangData[1]); // Example: "-5.3443309,105.0042604"

            // Combine Foto and Keterangan into one column
            const masukCell = `
        <div>
            <img src="${row.foto_masuk || '#'}" alt="" width="50" style="cursor: pointer;" onclick="showImagePreview('${row.foto_masuk}')">
            <div>${masukData[0]}</div>
            <div>${masukMapLink}</div>
            <div>${masukData[2]}</div>
        </div>
    `;

            const siangCell = `
        <div>
            <img src="${row.foto_siang || '#'}" alt="" width="50" style="cursor: pointer;" onclick="showImagePreview('${row.foto_siang}')">
            <div>${siangData[0]}</div>
            <div>${siangMapLink}</div>
            <div>${siangData[2]}</div>
        </div>
    `;

            const pulangCell = `
        <div>
            <img src="${row.foto_pulang || '#'}" alt="" width="50" style="cursor: pointer;" onclick="showImagePreview('${row.foto_pulang}')">
            <div>${pulangData[0]}</div>
            <div>${pulangMapLink}</div>
            <div>${pulangData[2]}</div>
        </div>
    `;

            tr.innerHTML = `
        <td>${rowIndex}</td> <!-- Show sequential number -->
        <td>${row.nama_pegawai || 'N/A'}</td>
        <td>${getDayOfWeek(row.jam_masuk) || 'N/A'}</td> <!-- Hari column -->
        <td>${formatDate(row.jam_masuk) || 'N/A'}</td> <!-- Tanggal column -->
        <td>${formatTime(row.jam_masuk) || 'N/A'}</td>
        <td>${masukCell}</td> <!-- Combined Foto and Keterangan Masuk -->
        <td>${formatTime(row.jam_siang) || 'N/A'}</td>
        <td>${siangCell}</td> <!-- Combined Foto and Keterangan Siang -->
        <td>${formatTime(row.jam_pulang) || 'N/A'}</td>
        <td>${pulangCell}</td> <!-- Combined Foto and Keterangan Pulang -->
         <td><button class="action" data-row='${JSON.stringify(row)}'>Details</button></td>

    `;
            elements.tableBody.appendChild(tr);

        }



        function handleMapLinkClick(event) {
            // Check if the clicked element is an <a> tag
            if (event.target.tagName === 'A') {
                event.preventDefault(); // Prevent the default action (open in new tab)

                // Prevent the event from bubbling up and triggering the modal
                event.stopPropagation();

                // Open the map in a new tab
                const coordinates = event.target.textContent.split(' ')[2]; // Get coordinates
                const googleMapsLink = `https://www.google.com/maps/place/${coordinates}`;

                window.open(googleMapsLink, '_blank'); // Open the link in a new tab
            }
        }


        // Close the modal when clicking the close button
        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('mapPreviewModal').style.display = 'none';
            document.getElementById('googleMap').src = ''; // Clear the map URL
        });

        // Attach event listener to the table to handle map link clicks
        document.querySelector('#resultsTable tbody').addEventListener('click', handleMapLinkClick);


        function renderTable(data) {
            // Save current scroll position
            const currentScrollPosition = elements.tableBody.scrollTop;

            // Clear the table before rendering new data
            elements.tableBody.innerHTML = '';
            // Calculate the starting rowIndex for the current page
            const rowIndexStart = (state.page - 1) * state.limit + 1; // Calculate start based on page and limit
            let rowIndex = rowIndexStart; // Start from this rowIndex

            if (data.length === 0) {
                elements.emptyState.style.display = 'block'; // Show empty state if Belum Presensi
            } else {
                elements.emptyState.style.display = 'none'; // Hide empty state if data is available

                data.forEach(row => {
                    const existingRow = getExistingRow(row.id_presensi);

                    if (existingRow) {
                        updateTableRow(existingRow, row);
                    } else {
                        // Add new row with the correct index
                        addNewRow(row, rowIndex);
                        rowIndex++; // Increment row index for the next row
                    }
                });
            }

            // Restore scroll position after data is updated
            elements.tableBody.scrollTop = currentScrollPosition;

            // Update pagination UI
            elements.badgeCount.textContent = state.totalRecords; // Display total record count
            elements.pageLabel.textContent = `Page: ${state.page} of ${state.totalPages}`; // Display page information
            elements.prevBtn.disabled = state.page === 1; // Disable "Previous" button if on first page
            elements.nextBtn.disabled = state.page === state.totalPages; // Disable "Next" button if on last page
        }

        // Handle the data received from the server
        function handleData(message) {
            try {
                const result = JSON.parse(message.data);
                const data = Array.isArray(result.data) ? result.data : [result.data];

                // Update total records and pages from backend response
                state.totalRecords = result.totalRecords || 0;
                state.totalPages = result.totalPages || 0;

                // Update the total record count
                elements.badgeCount.textContent = state.totalRecords;

                // Render the data on the table
                renderTable(data);

                // Update the page label and pagination buttons
                elements.pageLabel.textContent = `Page: ${state.page} of ${state.totalPages}`;
                elements.prevBtn.disabled = state.page === 1; // Disable previous button on first page
                elements.nextBtn.disabled = state.page === state.totalPages; // Disable next button on last page

                elements.loading.style.display = 'none'; // Hide the loading indicator
                state.lastHeartbeat = Date.now();
            } catch (e) {
                console.error("Data parsing error:", e);
                renderTable([]); // Clear table if there's a parsing error
            }
        }
        // Function to handle errors
        function handleError() {
            updateStatus(false); // Update connection status
            if (state.retryCount < CONFIG.MAX_RETRIES) {
                setTimeout(connectSSE, CONFIG.RECONNECT_DELAY); // Retry connecting after delay
                state.retryCount++;
            }
        }
        // Function to initialize the EventSource for data streaming
        function connectSSE() {
            if (state.eventSource) state.eventSource.close(); // Close the existing connection
            clearInterval(state.heartbeatCheck);
            updateStatus(false);
            elements.loading.style.display = 'block'; // Show the loading indicator

            try {
                const url = buildSSEUrl(); // Build the URL with the current page
                state.eventSource = new EventSource(url); // Open a new connection

                // Handle successful connection
                state.eventSource.addEventListener('open', () => {
                    updateStatus(true); // Update the connection status
                    state.lastHeartbeat = Date.now();
                    state.heartbeatCheck = setInterval(() => {
                        if (Date.now() - state.lastHeartbeat > CONFIG.HEARTBEAT_TIMEOUT) {
                            handleError(); // Trigger error if no heartbeat is received
                        }
                    }, 1000);
                });

                // Handle incoming messages (data)
                state.eventSource.addEventListener('message', handleData);

                // Handle errors
                state.eventSource.addEventListener('error', handleError);
            } catch (e) {
                console.error("SSE error:", e);
            }
        }

        function disconnectSSE() {
            if (state.eventSource) state.eventSource.close();
            clearInterval(state.heartbeatCheck);
            updateStatus(false);
        }

        // Apply filters
        document.getElementById("applyFilters").onclick = () => {
            state.page = 1; // Reset to page 1 for new filters
            elements.tableBody.innerHTML = ''; // Clear existing table data
            connectSSE(); // Re-fetch data
        };
        document.getElementById("clearFilters").onclick = function() {
            // Reset filter fields to their default state
            document.getElementById("nama_opd").value = '';
            document.getElementById("nama_pegawai").value = '';
            document.getElementById("filter_date").value = '';
            document.getElementById("searchInput").value = '';
            document.getElementById("limit").value = 10;

            // Clear the Select2 dropdowns
            $('#nama_opd').trigger('change');
            $('#nama_pegawai').trigger('change');

            // Reset the page number to 1 (important for pagination)
            state.page = 1;

            // Re-fetch data with cleared filters
            connectSSE(); // Re-fetch data with the reset filters
        };


        // Function to handle the "Next" button click
        document.getElementById("nextBtn").onclick = () => {
            if (state.page < state.totalPages) {
                state.page++; // Increment to the next page
                connectSSE(); // Re-fetch data for the new page
            }
        };

        // Function to handle the "Previous" button click
        document.getElementById("prevBtn").onclick = () => {
            if (state.page > 1) {
                state.page--; // Decrement to the previous page
                connectSSE(); // Re-fetch data for the new page
            }
        };

        document.getElementById("forceReconnect").onclick = connectSSE;

        let debounceTimeout;

        document.getElementById("searchInput").oninput = function() {
            clearTimeout(debounceTimeout); // Clear the previous timeout if input changes
            debounceTimeout = setTimeout(function() {
                state.page = 1; // Reset to page 1 when search is applied
                connectSSE(); // Re-fetch data with the search filter applied
            }, 500); // 500ms debounce time
        };

        document.getElementById("filter_date").onchange = function() {
            const date = new Date(this.value);
            const utcDate = new Date(Date.UTC(date.getFullYear(), date.getMonth(), date.getDate()));
            document.getElementById("filter_date").value = utcDate.toISOString().split('T')[0]; // Set the value in ISO format
        };

        connectSSE();

        window.addEventListener('beforeunload', disconnectSSE);

        document.getElementById("exportCSV").onclick = function() {
            const rows = [];
            const headers = ['ID', 'Nama', 'Jam Masuk', 'Keterangan Masuk', 'Foto Masuk', 'Jam Siang',
                'Keterangan Siang', 'Foto Siang', 'Jam Pulang', 'Keterangan Pulang', 'Foto Pulang'
            ];

            // Push headers to the rows
            rows.push(headers);

            // Collect table rows (only visible rows)
            const tableRows = document.querySelectorAll('#resultsTable tbody tr');
            tableRows.forEach(row => {
                const rowData = [];
                row.querySelectorAll('td').forEach(cell => rowData.push(cell.textContent.trim()));
                rows.push(rowData);
            });

            // Convert to a sheet and export as CSV
            const ws = XLSX.utils.aoa_to_sheet(rows);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Presensi");

            // Trigger CSV download
            XLSX.writeFile(wb, 'presensi.csv');
        };


        document.getElementById("exportExcel").onclick = function() {
            const rows = [];
            const headers = ['ID', 'Nama', 'Jam Masuk', 'Keterangan Masuk', 'Foto Masuk', 'Jam Siang',
                'Keterangan Siang', 'Foto Siang', 'Jam Pulang', 'Keterangan Pulang', 'Foto Pulang'
            ];

            // Push headers to the rows
            rows.push(headers);

            // Collect table rows (only visible rows)
            const tableRows = document.querySelectorAll('#resultsTable tbody tr');
            tableRows.forEach(row => {
                const rowData = [];
                row.querySelectorAll('td').forEach(cell => rowData.push(cell.textContent.trim()));
                rows.push(rowData);
            });

            // Convert to a sheet and export as Excel
            const ws = XLSX.utils.aoa_to_sheet(rows);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Presensi");

            // Trigger Excel download
            XLSX.writeFile(wb, 'presensi.xlsx');
        };


        document.getElementById("exportPDF").onclick = function() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF('landscape'); // Landscape mode for wide tables

            doc.setFont("helvetica", "normal");

            // Column headers (including Keterangan columns)
            const columns = ['ID', 'Nama', 'Hari', 'Tanggal', 'Jam Masuk', 'Keterangan Masuk', 'Jam Siang', 'Keterangan Siang', 'Jam Pulang', 'Keterangan Pulang'];
            const rows = [];

            // Collect table rows (including Keterangan columns)
            const tableRows = document.querySelectorAll('#resultsTable tbody tr');
            tableRows.forEach(row => {
                const rowData = [];
                row.querySelectorAll('td').forEach((cell, index) => {
                    if (index !== 4 && index !== 7 && index !== 10) { // Exclude Foto columns
                        rowData.push(cell.textContent.trim());
                    }
                });
                rows.push(rowData);
            });

            // Set up AutoTable for better design and table formatting
            doc.autoTable({
                head: [columns],
                body: rows,
                startY: 20, // Start table a bit lower for better positioning
                theme: 'grid', // Grid style for a clean design
                headStyles: {
                    fillColor: [0, 45, 105], // Dark blue header
                    textColor: 255, // White text
                    fontStyle: 'bold', // Bold font for headers
                    halign: 'center' // Center align header text
                },
                bodyStyles: {
                    fillColor: [242, 242, 242], // Light gray background for rows
                    textColor: [0, 0, 0], // Black text
                    halign: 'center', // Center align body text
                    fontSize: 10,
                    cellPadding: 4
                },
                columnStyles: {
                    0: {
                        cellWidth: 20
                    }, // ID column width
                    1: {
                        cellWidth: 40
                    }, // Nama column width
                    2: {
                        cellWidth: 30
                    }, // Jam Masuk column width
                    3: {
                        cellWidth: 40
                    }, // Keterangan Masuk column width
                    4: {
                        cellWidth: 30
                    }, // Jam Siang column width
                    5: {
                        cellWidth: 40
                    }, // Keterangan Siang column width
                    6: {
                        cellWidth: 30
                    }, // Jam Pulang column width
                    7: {
                        cellWidth: 40
                    } // Keterangan Pulang column width
                },
                margin: {
                    top: 20,
                    bottom: 20,
                    left: 10,
                    right: 10
                },
                styles: {
                    cellPadding: 6,
                    fontSize: 11,
                    overflow: 'linebreak'
                },
                pageBreak: 'auto', // Allow page break if table is too long
                showHead: 'everyPage', // Display the header on each page if it spans multiple pages
            });

            // Save the PDF as a file
            doc.save('presensi.pdf');
        };


        // Function to show the image preview modal
        function showImagePreview(imageSrc) {
            const modal = document.getElementById('imagePreviewModal');
            const previewImage = document.getElementById('previewImage');

            // Set the source of the preview image to the clicked image's source
            previewImage.src = imageSrc;

            // Display the modal
            modal.style.display = 'flex';
        }

        // Function to close the image preview modal
        function closeImagePreview() {
            const modal = document.getElementById('imagePreviewModal');
            modal.style.display = 'none';
        }

        // Use event delegation for dynamically added rows (images)
        document.querySelector('#resultsTable tbody').addEventListener('click', function(event) {
            // Check if the clicked element is an image inside the "Foto Masuk", "Foto Siang", or "Foto Pulang" columns
            if (event.target.tagName === 'IMG') {
                const imageSrc = event.target.src;

                // Check if the image has a valid source
                if (imageSrc && imageSrc !== '#') {
                    showImagePreview(imageSrc);
                } else {
                    alert('No image available for preview.');
                }
            }
        });

        // Close modal when the close button is clicked
        document.getElementById('closeModal').addEventListener('click', closeImagePreview);

        // Close modal when the background is clicked
        document.getElementById('imagePreviewModal').addEventListener('click', (event) => {
            if (event.target === event.currentTarget) {
                closeImagePreview();
            }
        });

        // Add event listener for dynamically generated action buttons
        document.querySelector('#resultsTable tbody').addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('action')) {
                // Get the row data from the data-row attribute
                const rowData = JSON.parse(event.target.getAttribute('data-row'));

                // Open the modal and display the row data
                openModal(rowData);
            }
        });

        // Function to open the modal and display the details in a table format
        function openModal(row) {
            const modal = document.getElementById('actionModal');
            const modalContent = document.getElementById('modalContent');

            // Populate the modal with row details in a table format
            modalContent.innerHTML = `
        <span id="closeModal" style="cursor:pointer; font-size: 24px; color: #555; position: absolute; top: 10px; right: 10px;">&times;</span>
        <h3 style="color: #333; font-size: 24px; margin-bottom: 20px; text-align: center;">Details for ID: ${row.id_pegawai}-${row.id_presensi}</h3>
        
        <table style="width: 100%; border-collapse: collapse; font-size: 16px; color: #555;">
            <thead style="background-color: #f0f0f0;">
                <tr>
                    <th style="padding: 10px; border: 1px solid #ddd; ">Field</th>
                    <th style="padding: 10px; border: 1px solid #ddd; ">Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: left;">Nama Pegawai</td>
                    <td style="padding: 10px; border: 1px solid #ddd;text-align: left;">${row.nama_pegawai || 'N/A'}</td>
                </tr>
                 <tr>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: left;">NIP</td>
                    <td style="padding: 10px; border: 1px solid #ddd;text-align: left;">${row.nip_pegawai || 'N/A'}</td>
                </tr>
                 <tr>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: left;">OPD</td>
                    <td style="padding: 10px; border: 1px solid #ddd;text-align: left;">${row.nama_opd}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: left;">Hari/Tanggal</td>
                    <td style="padding: 10px; border: 1px solid #ddd;text-align: left;">${getDayOfWeek(row.jam_masuk) || 'N/A'}, ${formatDate(row.jam_masuk) || 'N/A'} </td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: left;">Jam Masuk</td>
                    <td style="padding: 10px; border: 1px solid #ddd;text-align: left;">${formatTime(row.jam_masuk) || 'N/A'}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: left;">Ket. Masuk</td>
                    <td style="padding: 10px; border: 1px solid #ddd;text-align: left;">${row.ket_masuk || 'N/A'}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: left;">Foto Masuk</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">${row.foto_masuk ? `<img src="${row.foto_masuk}" alt="Foto Masuk" width="100" style="border-radius: 8px;">` : 'N/A'}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: left;">Jam Siang</td>
                    <td style="padding: 10px; border: 1px solid #ddd;text-align: left;">${formatTime(row.jam_siang) || 'Belum Presensi'}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: left;">Ket. Siang</td>
                    <td style="padding: 10px; border: 1px solid #ddd;text-align: left;">${row.ket_siang || 'Belum Presensi'}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: left;">Foto Siang</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">${row.foto_siang ? `<img src="${row.foto_siang}" alt="Foto Siang" width="100" style="border-radius: 8px;">` : 'Belum Presensi'}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: left;">Jam Pulang</td>
                    <td style="padding: 10px; border: 1px solid #ddd;text-align: left;">${formatTime(row.jam_pulang) || 'Belum Presensi'}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: left;">Ket. Pulang</td>
                    <td style="padding: 10px; border: 1px solid #ddd;text-align: left;">${row.ket_pulang || 'Belum Presensi'}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: left;">Foto Pulang</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">${row.foto_pulang ? `<img src="${row.foto_pulang}" alt="Foto Pulang" width="100" style="border-radius: 8px;">` : 'Belum Presensi'}</td>
                </tr>
            </tbody>
        </table>
    `;

            // Show the modal
            modal.style.display = 'flex';

            // Add close event listener to the close button
            document.getElementById('closeModal').addEventListener('click', function() {
                modal.style.display = 'none';
            });
        }


        // Close the modal
        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('actionModal').style.display = 'none';
        });


        // Close the modal when clicking the background area
        document.getElementById('actionModal').addEventListener('click', function(event) {
            if (event.target === this) {
                this.style.display = 'none';
            }
        });
    </script>
    <footer>
        <img src="<?php base_url(); ?>/assets/icon-kominfo.png" alt="Logo" />
        <p><a href="https://diskominfo.pringsewukab.go.id/" target="_blank" style="color: white; text-decoration: none;">Supported by DISKOMINFO</a></p>
    </footer>


</body>

</html>