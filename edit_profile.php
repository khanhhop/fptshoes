<?php
session_start();
require('./db/conn.php'); // Kết nối tới cơ sở dữ liệu
$is_homepage = false;

// Lấy ID của người dùng từ session
$id_kh = $_SESSION['user']['id_kh'];

// Truy vấn thông tin người dùng từ cơ sở dữ liệu
$sql = "SELECT * FROM khach_hang WHERE id_kh = $id_kh";
$result = mysqli_query($conn, $sql);

// Kiểm tra xem có tìm thấy người dùng hay không
if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);

    $message = ""; // Biến lưu trữ thông báo
    $errors = array(); // Mảng lưu trữ các lỗi

    if (isset($_POST['btnUpdate'])) {
        // Nếu nút Cập nhật được nhấn
        $ho_ten = $_POST['ho_ten'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $dia_chi = $_POST['dia_chi'];
        $mat_khau = $_POST['mat_khau']; // Mật khẩu mới (có thể trống)

        // Thêm kiểm tra dữ liệu đầu vào ở đây (ví dụ: kiểm tra các trường bắt buộc, định dạng email, số điện thoại,...)
        if (empty($ho_ten)) {
            $errors[] = "Vui lòng nhập họ tên.";
        }
        if (empty($email)) {
            $errors[] = "Vui lòng nhập email.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email không hợp lệ.";
        }
        if (empty($sdt)) {
            $errors[] = "Vui lòng nhập số điện thoại.";
        }
        if (empty($dia_chi)) {
            $errors[] = "Vui lòng nhập địa chỉ.";
        }

        // Nếu không có lỗi, tiến hành cập nhật thông tin người dùng vào cơ sở dữ liệu
        if (empty($errors)) {
            // Câu lệnh cập nhật thông tin người dùng (KHÔNG SỬ DỤNG mysqli_real_escape_string)
            // CỰC KỲ KHÔNG AN TOÀN, DỄ BỊ TẤN CÔNG SQL INJECTION
            $sql_update = "UPDATE `khach_hang` 
                        SET 
                            `ho_ten` = '$ho_ten',
                            `sdt` = '$sdt',
                            `dia_chi` = '$dia_chi', 
                            `email` = '$email' 
                        WHERE `id_kh` = $id_kh";

            if (mysqli_query($conn, $sql_update)) {
                $message = "<div class='alert alert-success'>Cập nhật thông tin thành công!</div>";

                // Cập nhật thông tin người dùng trong session
                $_SESSION['user']['ho_ten'] = $ho_ten;
                $_SESSION['user']['email'] = $email;
                $_SESSION['user']['sdt'] = $sdt;
                $_SESSION['user']['dia_chi'] = $dia_chi;
            } else {
                $message = "<div class='alert alert-danger'>Lỗi khi cập nhật thông tin: " . mysqli_error($conn) . "</div>";
            }
        } else {
            // Hiển thị các lỗi nếu có
            $message = "<div class='alert alert-danger'>";
            foreach ($errors as $error) {
                $message .= $error . "<br>";
            }
            $message .= "</div>";
        }
    }

    // Nếu mật khẩu mới được cung cấp, cập nhật mật khẩu
    if (!empty($mat_khau_moi)) {
        // Câu lệnh cập nhật mật khẩu (KHÔNG AN TOÀN, KHÔNG NÊN SỬ DỤNG TRONG MÔI TRƯỜNG PRODUCTION)
        $sql_update_password = "UPDATE `khach_hang` SET `mat_khau` = '$mat_khau' WHERE `id_kh` = $id_kh";

        if (mysqli_query($conn, $sql_update_password)) {
            $message = "<div class='alert alert-success'>Cập nhật thông tin và mật khẩu thành công!</div>";
        } else {
            $message .= "<div class='alert alert-danger'>Lỗi khi cập nhật mật khẩu: " . mysqli_error($conn) . "</div>";
        }
    }
} else {
    // Xử lý trường hợp không tìm thấy người dùng
    echo "Không tìm thấy thông tin người dùng.";
    exit();
}
require_once ('./component/header.php');
?>



    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Chỉnh sửa thông tin tài khoản</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang chủ</a>
                            <span>Chỉnh sửa thông tin tài khoản</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <?php if (!empty($message)) { echo $message; } ?>

                        <form class="user" method="post" action="">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="shoping__cart__item">Họ và tên</td>
                                        <td class="shoping__cart__price">
                                            <input type="text" class="form-control" name="ho_ten" value="<?= $user['ho_ten'] ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="shoping__cart__item">Email</td>
                                        <td class="shoping__cart__price">
                                            <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="shoping__cart__item">Số điện thoại</td>
                                        <td class="shoping__cart__price">
                                            <input type="text" class="form-control" name="sdt" value="<?= $user['sdt'] ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="shoping__cart__item">Địa chỉ</td>
                                        <td class="shoping__cart__price">
                                            <input type="text" class="form-control" name="dia_chi" value="<?= $user['dia_chi'] ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="shoping__cart__item">Mật khẩu mới</td>
                                        <td class="shoping__cart__price">
                                            <input type="password" class="form-control" name="mat_khau" placeholder="Nhập mật khẩu mới (để trống nếu không đổi)">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="shoping__cart__btns">
                                        <button type="submit" class="primary-btn cart-btn cart-btn-right" name="btnUpdate">
                                            Cập nhật thông tin
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    require_once ('./component/footer.php');
?>