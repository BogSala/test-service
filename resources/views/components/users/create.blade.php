<div class="userForm">
    <h3>Create a user</h3>
    <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
        @csrf
        <label>Token:</label>
        <input type="text" id="token" name="token">
        <label>Name:</label>
        <input type="text" id="user-name" name="name">
        <label>Email:</label>
        <input type="text" id="user-email" name="email">
        <label>Password:</label>
        <input type="text" id="user-password" name="password">
        <label>Image:</label>
        <input type="file" id="user-image" name="image">
        <button>Submit</button>
    </form>
</div>
