<form action="/register" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
    <input type="text" name="phone" placeholder="Phone (optional)">
    <select name="role" required>
        <option value="student">Student</option>
        <option value="teacher">Teacher</option>
    </select>
    <button type="submit">Register</button>
</form>