<?php
include('../componen/header.php');
?>
<main class="main-content">
    <div class="card-table">
        <h2 class="title-content">Data User</h2>
        <form action="../../routes/route.php?action=updateuser&id=<?= $_GET['id'] ?>" method="post" class="form">
            <div class="form-container">
                <div class="form-input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email">
                </div>
                <div class="form-input">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password">
                </div>
                <div class="form-input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="form-input input-select">
                    <label for="type">Type (Role)</label>
                    <select name="type" id="type">
                        <option value="2">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
            </div>
            <div class="form-input-submit">
                <input type="submit" value="Update" name="update" id="update">
            </div>
        </form>
    </div>
</main>
<?php
include('../componen/footer.php');
?>
<script>
    $.ajax({
        type: 'GET',
        url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getone&id=<?= $_GET['id'] ?>', // Ensure this path is correct
        success: function(data) {
            console.log("AJAX request successful");
            console.log("Response data:", data);
            $('#email').val(data.email);
            $('#password').val(data.password);
            $('#type').val(data.type);
            $('#username').val(data.username);
        },
        error: function(xhr, status, error) {
            console.error("AJAX request failed:", status, error);
        }
    });
</script>