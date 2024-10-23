<script>
    $.ajax({
        type: 'GET',
        url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getDestinasiAllUser', // Ensure this path is correct
        success: function(data) {
            // console.log(data);
            if (Array.isArray(data)) {
                let tableContent = '';
                data.forEach(destinasi => {
                    tableContent += `
                    <div class="destinasi">
                        <div class="card" id="card">
                            <div class="card-image">
                            <img src="./img/${destinasi.img}" alt="">
                            <div class="overlay">
                                <a onClick="createPesanan(${destinasi.destinasi_id})">Booking</a>
                            </div>
                            </div>
                            <div class="card-details">
                            <h3>${destinasi.nama_destinasi}</h3>
                            <p><i class="fas fa-map-marker-alt"></i>${destinasi.daerah}</p>
                            </div>
                        </div>
                    </div>
                    `;
                });
                $('.container-pesanan').append(tableContent);
            } else {
                console.error("Expected an array but received:", data);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX request failed:", status, error);
        }
    });

    function createPesanan(id) {
        // console.log(id);
        $('.destinasi').css('display', 'none');
        $('.form-pesanan').css('display', 'block');
        $('#pesanan-form').append(`<input type="number" name="destinasi" value="${id}" id="" hidden>`);
        $.ajax({
            type: 'GET',
            url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getTransportasiUser&id=' + id, // Ensure this path is correct
            success: function(data) {
                console.log(data);
                if (Array.isArray(data)) {
                    let tableContent = '';
                    data.forEach(transportasi => {
                        tableContent += `
                        <option value=${transportasi.transportasi_id}>${transportasi.jenis}</option>
                        `;
                    });
                    $('#transportasi').html(tableContent);
                } else {
                    console.error("Expected an array but received:", data);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX request failed:", status, error);
            }
        });
    }
    $.ajax({
        type: 'GET',
        url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getPesananUser&id=<?= $_SESSION['login_id'] ?>', // Ensure this path is correct
        success: function(data) {
            // console.log(data);
            if (Array.isArray(data)) {
                let tableContent = '';
                data.forEach(pesanan => {
                    tableContent += `
                        <tr>
                        <td>${pesanan.nama_destinasi}</td>
                        <td>${pesanan.jenis}</td>
                        <td>${pesanan.quantity}</td>
                        <td>${pesanan[8]}</td>
                        <td><p>${pesanan.status == 1 ? 'Booking' : pesanan.status == 2 ? 'Perjalanan' : 'Selesai'}</p></td>
                        <td>
                            ${
                            pesanan.status == 3 ? 
                            '<button class=""><a onclick="false">Status telah Selesai !</a></button>' : 
                            '<button class=""><a onclick="false">Selesaikan Untuk Hapus !</a></button></td>'
                            }
                        </td>
                        <td>
                            ${
                            pesanan.status == 3 ? 
                            '<button class=""><a href="routes/route.php?action=deletePesananUser&id=' + pesanan.pesanan_id + '">Hapus</a></button>' : 
                            '<button class="" onClick="updatePesanan(' + pesanan.pesanan_id + ')"><a>Edit</a></button>'
                            }
                        </td>
                        </tr>
                    `;
                });
                $('#data-pesanan-user').html(tableContent);
            } else {
                console.error("Expected an array but received:", data);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX request failed:", status, error);
        }
    });

    function backDestinasi() {
        $('.destinasi').css('display', 'block');
        $('.form-pesanan').css('display', 'none');
    }

    function updatePesanan(id) {
        // console.log(id);
        $('#pesanan').css('display', 'none');
        $('.form-pesanan-update').css('display', 'block');
        $.ajax({
            type: 'GET',
            url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=editPesananUser&id=' + id, // Ensure this path is correct
            success: function(data) {
                // console.log(data.jenis);
                $('#quantity-update').val(data.quantity);
                $('#transportasi-update').html(`<option value="${data.transportasi_id}">${data.jenis}</option>`);
                $.ajax({
                    type: 'GET',
                    url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getTransportasiByDestinasiUser&id=' + data.destinasi_id, 
                    success: function(data) {
                        console.log(data);
                        if (Array.isArray(data)) {
                            if (data.length > 0) {
                                let tableContent = '';
                                data.forEach(transportasi => {
                                    tableContent += `
                                        <option value="${transportasi.transportasi_id}">${transportasi.jenis}</option>
                                    `;
                                });
                                $('#transportasi-update').append(tableContent);
                            } else {
                                $('#transportasi').html();
                            }
                        } else {
                            $('#transportasi-update').append();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX request failed:", status, error);
                        $('#transportasi').html('<option value="kosong">Error fetching transportasi</option>');
                    }
                });
                
                $('#update-pesanan-form').attr("action", `routes/route.php?action=updatePesananUser&id=${id}`);
            },
            error: function(xhr, status, error) {
                console.error("AJAX request failed:", status, error);
            }
        });
    }
</script>