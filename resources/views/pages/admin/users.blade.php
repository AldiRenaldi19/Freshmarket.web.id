<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Pengguna - Admin Fresh Market</title>
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
        <div class="admin-logo">
          <img src="../assets/images/logo.png" alt="Fresh Market Logo" />
          <h2>Admin Panel</h2>
        </div>
        <ul class="admin-menu">
          <li>
            <a href="dashboard.html"
              ><i class="fas fa-tachometer-alt"></i> Dashboard</a
            >
          </li>
          <li>
            <a href="/products"><i class="fas fa-box"></i> Produk</a>
          </li>
          <li>
            <a href="/orders"
              ><i class="fas fa-shopping-cart"></i> Pesanan</a
            >
          </li>
          <li class="active">
            <a href="users.html"><i class="fas fa-users"></i> Pengguna</a>
          </li>
          <li>
            <a href="/reports"><i class="fas fa-chart-bar"></i> Laporan</a>
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
          <h1>Kelola Pengguna</h1>
          <div class="user-filter">
            <input type="text" id="searchUser" placeholder="Cari pengguna..." />
            <select id="roleFilter">
              <option value="">Semua Role</option>
              <option value="admin">Admin</option>
              <option value="customer">Customer</option>
            </select>
          </div>
        </div>

        <div class="users-list" id="usersList">
          <!-- Daftar pengguna akan ditampilkan di sini -->
        </div>
      </div>
    </div>

    <script src="../js/init.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Cek autentikasi admin
        const user = JSON.parse(localStorage.getItem("user"));
        if (!user || !user.isAdmin) {
          alert("Anda tidak memiliki akses ke halaman admin!");
          window.location.href = "/login";
          return;
        }

        loadUsers();

        // Event listeners
        document
          .getElementById("searchUser")
          .addEventListener("input", loadUsers);
        document
          .getElementById("roleFilter")
          .addEventListener("change", loadUsers);
      });

      function loadUsers() {
        const users = JSON.parse(localStorage.getItem("registeredUsers")) || [];
        const searchTerm = document
          .getElementById("searchUser")
          .value.toLowerCase();
        const selectedRole = document.getElementById("roleFilter").value;

        const filteredUsers = users.filter((user) => {
          const matchSearch =
            user.name.toLowerCase().includes(searchTerm) ||
            user.email.toLowerCase().includes(searchTerm);
          const matchRole =
            !selectedRole ||
            (selectedRole === "admin" && user.isAdmin) ||
            (selectedRole === "customer" && !user.isAdmin);
          return matchSearch && matchRole;
        });

        const container = document.getElementById("usersList");
        container.innerHTML = filteredUsers
          .map(
            (user) => `
            <div class="user-card">
                <div class="user-info">
                    <div class="user-header">
                        <i class="fas fa-user-circle"></i>
                        <div>
                            <h3>${user.name}</h3>
                            <p>${user.email}</p>
                        </div>
                    </div>
                    <div class="user-details">
                        <p><strong>Role:</strong> ${
                          user.isAdmin ? "Admin" : "Customer"
                        }</p>
                        <p><strong>Telepon:</strong> ${user.phone || "-"}</p>
                        <p><strong>Bergabung:</strong> ${new Date(
                          user.createdAt || Date.now()
                        ).toLocaleDateString()}</p>
                    </div>
                </div>
                <div class="user-actions">
                    ${
                      !user.isAdmin
                        ? `
                        <button onclick="toggleUserStatus('${user.email}')" class="status-btn">
                            <i class="fas fa-ban"></i> Blokir
                        </button>
                    `
                        : ""
                    }
                    <button onclick="deleteUser('${
                      user.email
                    }')" class="delete-btn">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </div>
            </div>
        `
          )
          .join("");
      }

      function toggleUserStatus(email) {
        const users = JSON.parse(localStorage.getItem("registeredUsers")) || [];
        const user = users.find((u) => u.email === email);

        if (user && !user.isAdmin) {
          user.isBlocked = !user.isBlocked;
          localStorage.setItem("registeredUsers", JSON.stringify(users));

          addActivity(
            "user",
            `Status pengguna ${email} telah ${
              user.isBlocked ? "diblokir" : "diaktifkan"
            }`
          );
          loadUsers();
          alert(`Pengguna ${user.isBlocked ? "diblokir" : "diaktifkan"}`);
        }
      }

      function deleteUser(email) {
        if (confirm("Apakah Anda yakin ingin menghapus pengguna ini?")) {
          const users =
            JSON.parse(localStorage.getItem("registeredUsers")) || [];
          const updatedUsers = users.filter((u) => u.email !== email);
          localStorage.setItem("registeredUsers", JSON.stringify(updatedUsers));

          addActivity("user", `Pengguna ${email} telah dihapus`);
          loadUsers();
          alert("Pengguna berhasil dihapus");
        }
      }

      function addActivity(type, description) {
        const activities = JSON.parse(localStorage.getItem("activities")) || [];
        activities.unshift({
          type,
          description,
          timestamp: new Date().getTime(),
        });

        if (activities.length > 50) activities.pop();
        localStorage.setItem("activities", JSON.stringify(activities));
      }

      function logout() {
        localStorage.removeItem("user");
        window.location.href = "/login";
      }
    </script>

    <style>
      .user-filter {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
      }

      .user-filter input,
      .user-filter select {
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
      }

      .user-card {
        background: white;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .user-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 10px;
      }

      .user-header i {
        font-size: 2.5em;
        color: #2e7d32;
      }

      .user-details {
        color: #666;
        font-size: 0.9em;
      }

      .user-actions {
        display: flex;
        gap: 10px;
      }

      .status-btn,
      .delete-btn {
        padding: 8px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 5px;
      }

      .status-btn {
        background: #f0ad4e;
        color: white;
      }

      .delete-btn {
        background: #dc3545;
        color: white;
      }

      .status-btn:hover {
        background: #ec971f;
      }

      .delete-btn:hover {
        background: #c82333;
      }
    </style>
  </body>
</html>
