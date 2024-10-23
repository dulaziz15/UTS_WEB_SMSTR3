<?php
include('../componen/header.php');
?>
<main class="main-content">
    <div class="card-table">
        <h2 class="title-content">Data User</h2>
        <form action="../../routes/route.php?action=updateuser&id=<?= $_GET['id'] ?>" method="post">
            <input type="text" name="email" id="email">
            <input type="text" name="password" id="password">
            <input type="number" name="type" id="type">
            <input type="text" name="username" id="username">
            <input type="submit" value="Update" id="update">
        </form>
    </div>
</main>
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
<?php
include('../componen/footer.php');
?>