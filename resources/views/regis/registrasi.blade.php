<!-- resources/views/auth/register.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pengguna</title>
</head>
<body>
    <h2>Registrasi Pengguna Baru</h2>

    <!-- Formulir Registrasi -->
    <form method="POST" action="{{ route('registerr') }}">
        @csrf

        <!-- Username -->
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"  required autofocus>
        </div>

        <!-- Email -->
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <!-- Password -->
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <!-- Role -->
        <div>
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
                <option value="peminjam">Peminjam</option>
            </select>
        </div>

        <!-- Tombol Registrasi -->
        <div>
            <button type="submit">Registrasi</button>
        </div>
    </form>
</body>
</html>
