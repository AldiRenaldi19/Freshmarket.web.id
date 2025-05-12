<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - Fresh Market</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <link rel="stylesheet" href="../css/styles.css" />
  </head>
  <body>
    <div class="admin-container">
      <div class="admin-sidebar">
        <div
          class="admin-logo"
          onclick="goToHomePage()"
          style="cursor: pointer"
        >
          <img src="/assets/images/logo.png" alt="Fresh Market Logo" />
          <h2>Fresh Market</h2>
        </div>
        <ul class="admin-menu">
          <li class="active">
            <a href="/dashboard"
              ><i class="fas fa-tachometer-alt"></i> Dashboard</a
            >
          </li>
          <li>
            <a href="/pages/admin/products"><i class="fas fa-box"></i> Produk</a>
          </li>
          <li>
            <a href="/pages/admin/orders"
              ><i class="fas fa-shopping-cart"></i> Pesanan</a
            >
          </li>
          <li>
            <a href="/pages/admin/users"><i class="fas fa-users"></i> Pengguna</a>
          </li>
          <li>
            <a href="/pages/admin/reports"><i class="fas fa-chart-bar"></i> Laporan</a>
          </li>
          <li>
            <a href="#" onclick="logout()"
              ><i class="fas fa-sign-out-alt"></i> Keluar</a
            >
          </li>
        </ul>
      </div>

      <div class="admin-content">
        <div class="admin-header">
          <div class="header-actions">
            <button class="mobile-menu-btn" onclick="toggleSidebar()">
              <i class="fas fa-bars"></i>
            </button>
            <a href="/" class="home-btn">
              <i class="fas fa-home"></i> Beranda Utama
            </a>
            <span class="admin-title">
              <i class="fas fa-user-shield"></i> Admin Panel
            </span>
          </div>
        </div>

        <div class="dashboard-stats">
          <div class="stat-card">
            <i class="fas fa-shopping-cart"></i>
            <div class="stat-info">
              <h3>Total Pesanan</h3>
              <p id="totalOrders">0</p>
            </div>
          </div>
          <div class="stat-card">
            <i class="fas fa-money-bill-wave"></i>
            <div class="stat-info">
              <h3>Pendapatan</h3>
              <p id="totalRevenue">Rp 0</p>
            </div>
          </div>
          <div class="stat-card">
            <i class="fas fa-users"></i>
            <div class="stat-info">
              <h3>Total Pengguna</h3>
              <p id="totalUsers">0</p>
            </div>
          </div>
          <div class="stat-card">
            <i class="fas fa-box"></i>
            <div class="stat-info">
              <h3>Total Produk</h3>
              <p id="totalProducts">0</p>
            </div>
          </div>
        </div>

        <div class="dashboard-content">
          <div class="recent-orders">
            <div class="section-header">
              <h2>Pesanan Terbaru</h2>
              <a href="/orders" class="view-all">Lihat Semua</a>
            </div>
            <div class="orders-list" id="recentOrders">
              <!-- Pesanan akan ditampilkan di sini -->
            </div>
          </div>

          <div class="recent-activities">
            <div class="section-header">
              <h2>Aktivitas Terbaru</h2>
              <div class="activity-filter">
                <input
                  type="text"
                  id="searchActivity"
                  placeholder="Cari aktivitas..."
                />
              </div>
            </div>
            <div class="activities-list" id="recentActivities">
              <!-- Aktivitas akan ditampilkan di sini -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="sidebar-overlay" onclick="toggleSidebar()"></div>

    <style>
      .admin-container {
        display: flex;
        min-height: 100vh;
      }

      .admin-sidebar {
        width: 250px;
        background: #1b5e20;
        color: white;
        padding: 20px;
      }

      .admin-logo {
        display: flex;
        align-items: center;
        gap: 10px;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      }

      .admin-logo img {
        width: 40px;
        height: 40px;
      }

      .admin-menu {
        list-style: none;
        padding: 0;
        margin: 20px 0;
      }

      .admin-menu li a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: all 0.3s;
      }

      .admin-menu li.active a,
      .admin-menu li a:hover {
        background: rgba(255, 255, 255, 0.1);
      }

      .admin-content {
        flex: 1;
        padding: 20px;
        background: #f5f5f5;
      }

      .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
      }

      .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
      }

      .stat-card {
        background: white;
        padding: 20px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 15px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
      }

      .stat-icon.orders {
        background: #e3f2fd;
        color: #1976d2;
      }
      .stat-icon.revenue {
        background: #e8f5e9;
        color: #2e7d32;
      }
      .stat-icon.users {
        background: #fff3e0;
        color: #f57c00;
      }
      .stat-icon.products {
        background: #f3e5f5;
        color: #7b1fa2;
      }

      .recent-activities {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 20px;
      }

      .activity-section {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      @media (max-width: 768px) {
        .admin-container {
          flex-direction: column;
        }

        .admin-sidebar {
          width: 100%;
        }

        .recent-activities {
          grid-template-columns: 1fr;
        }
      }

      /* Tambahkan CSS untuk tombol */
      .action-buttons {
        display: flex;
        gap: 10px;
        margin-top: 10px;
      }

      .update-status-btn,
      .view-details-btn {
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 0.9em;
      }

      .update-status-btn {
        background: #2e7d32;
        color: white;
      }

      .view-details-btn {
        background: #1976d2;
        color: white;
      }

      .update-status-btn:hover {
        background: #1b5e20;
      }

      .view-details-btn:hover {
        background: #1565c0;
      }

      .activity-item {
        cursor: pointer;
        transition: background-color 0.2s;
      }

      .activity-item:hover {
        background-color: #f5f5f5;
      }

      .status {
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.9em;
        display: inline-block;
      }

      .status.pending {
        background: #fff3cd;
        color: #856404;
      }
      .status.processing {
        background: #cce5ff;
        color: #004085;
      }
      .status.shipping {
        background: #d1ecf1;
        color: #0c5460;
      }
      .status.completed {
        background: #d4edda;
        color: #155724;
      }
      .status.cancelled {
        background: #f8d7da;
        color: #721c24;
      }

      .header-actions {
        display: flex;
        align-items: center;
        gap: 20px;
      }

      .home-btn {
        padding: 8px 15px;
        background: #2e7d32;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        transition: all 0.3s ease;
      }

      .home-btn:hover {
        background: #1b5e20;
      }

      .admin-title {
        font-size: 1.2em;
        font-weight: 500;
        color: #333;
        display: flex;
        align-items: center;
        gap: 8px;
      }
    </style>

    <script src="../js/init.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        if (!checkAdminAccess()) return;
        loadDashboardData();
      });

      function loadDashboardData() {
        // Ambil data dari localStorage
        const orders = JSON.parse(localStorage.getItem("orders")) || [];
        const users = JSON.parse(localStorage.getItem("registeredUsers")) || [];
        const products = JSON.parse(localStorage.getItem("products")) || [];
        const activities = JSON.parse(localStorage.getItem("activities")) || [];

        // Update statistik
        document.getElementById("totalOrders").textContent = orders.length;
        document.getElementById("totalUsers").textContent = users.length;
        document.getElementById("totalProducts").textContent = products.length;

        // Hitung total pendapatan
        const totalRevenue = orders
          .filter((order) => order.status === "completed")
          .reduce((sum, order) => sum + order.total, 0);
        document.getElementById(
          "totalRevenue"
        ).textContent = `Rp ${totalRevenue.toLocaleString()}`;

        // Tampilkan pesanan terbaru
        displayRecentOrders(orders);

        // Tampilkan aktivitas terbaru
        displayActivities(activities);
      }

      function displayRecentOrders(orders) {
        const recentOrders = orders.slice(-5).reverse();
        const ordersContainer = document.getElementById("recentOrders");
        ordersContainer.innerHTML = recentOrders
          .map(
            (order) => `
          <div class="order-item">
              <div class="order-info">
                  <h4>Order #${order.id}</h4>
                  <p>Pelanggan: ${order.customerName || "Tidak ada nama"}</p>
                  <p>Total: Rp ${order.total?.toLocaleString() || "0"}</p>
              </div>
              <div class="order-status">
                  <span class="status ${order.status || "pending"}">${
              order.status || "pending"
            }</span>
                  <div class="action-buttons">
                      <button onclick="updateOrderStatus('${
                        order.id
                      }')" class="update-status-btn">
                          <i class="fas fa-sync-alt"></i> Update Status
                      </button>
                      <button onclick="viewOrderDetails('${
                        order.id
                      }')" class="view-details-btn">
                          <i class="fas fa-eye"></i> Lihat Detail
                      </button>
                  </div>
              </div>
          </div>
      `
          )
          .join("");
      }

      function displayActivities(activities) {
        const searchTerm = document
          .getElementById("searchActivity")
          .value.toLowerCase();
        const filteredActivities = activities
          .filter((activity) =>
            activity.description.toLowerCase().includes(searchTerm)
          )
          .slice(-10)
          .reverse();

        const activitiesContainer = document.getElementById("recentActivities");
        activitiesContainer.innerHTML = filteredActivities
          .map(
            (activity) => `
              <div class="activity-item">
                  <div class="activity-info">
                      <span class="activity-time">${formatTime(
                        activity.timestamp
                      )}</span>
                      <p>${activity.description}</p>
                  </div>
                  <span class="activity-type ${activity.type}">${
              activity.type
            }</span>
              </div>
          `
          )
          .join("");
      }

      function updateOrderStatus(orderId) {
        const orders = JSON.parse(localStorage.getItem("orders")) || [];
        const order = orders.find((o) => o.id === orderId);

        if (order) {
          const statuses = [
            "pending",
            "processing",
            "shipping",
            "completed",
            "cancelled",
          ];
          const currentIndex = statuses.indexOf(order.status || "pending");
          const nextStatus = statuses[(currentIndex + 1) % statuses.length];

          order.status = nextStatus;
          localStorage.setItem("orders", JSON.stringify(orders));

          // Tambah aktivitas
          addActivity(
            "order",
            `Status pesanan #${orderId} diubah ke ${nextStatus}`
          );

          // Reload data
          loadDashboardData();
          alert(`Status pesanan berhasil diubah ke ${nextStatus}`);
        }
      }

      function viewOrderDetails(orderId) {
        window.location.href = `orders?id=${orderId}`;
      }

      function addActivity(type, description) {
        const activities = JSON.parse(localStorage.getItem("activities")) || [];
        activities.unshift({
          type,
          description,
          timestamp: new Date().getTime(),
        });

        // Batasi jumlah aktivitas yang disimpan (misalnya 50 aktivitas terakhir)
        if (activities.length > 50) {
          activities.pop();
        }

        localStorage.setItem("activities", JSON.stringify(activities));
      }

      function formatTime(timestamp) {
        const date = new Date(timestamp);
        return date.toLocaleDateString("id-ID", {
          day: "numeric",
          month: "short",
          year: "numeric",
          hour: "2-digit",
          minute: "2-digit",
        });
      }

      document.querySelectorAll(".admin-menu a").forEach((link) => {
        link.addEventListener("click", function (e) {
          if (this.getAttribute("href") === "#") {
            e.preventDefault();
            if (this.textContent.includes("Keluar")) {
              if (confirm("Apakah Anda yakin ingin keluar?")) {
                logout();
              }
            }
          }
        });
      });

      const searchActivity = document.getElementById("searchActivity");
      if (searchActivity) {
        searchActivity.addEventListener("input", function () {
          const activities =
            JSON.parse(localStorage.getItem("activities")) || [];
          displayActivities(activities);
        });
      }

      function logout() {
        localStorage.removeItem("user");
        window.location.href = "/login";
      }
    </script>
  </body>
</html>
