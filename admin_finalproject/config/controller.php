<?php

// ==== SELECT QUERY ==== //
function select($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
// ==== END SELECT QUERY ==== //

// ==== SHORT TEXT ===== //
function short_text($text, $maxLength = 100)
{
    if (strlen($text) > $maxLength) {
        $shortText = substr($text, 0, $maxLength) . '...';
        return $shortText;
    } else {
        return $text;
    }
}
// ==== END SHORT TEXT ===== //

// ==== ACTOR CONTROLLER ==== //
// ACTOR CREATE
function add_actor($post)
{
    // Koneksi database
    global $koneksi;

    $name   = mysqli_real_escape_string($koneksi, $post['name']);
    $birth  = mysqli_real_escape_string($koneksi, $post['birth']);
    $bio    = mysqli_real_escape_string($koneksi, $post['bio']);
    $img    = upload_file_actor();

    // Validasi Upload File
    if (!$img) {
        return false;
    }

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "INSERT INTO actor (name, birth, bio, img) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $name, $birth, $bio, $img);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
}


// ACTOR UPDATE
function edit_actor($post)
{
    global $koneksi;

    $id     = $post['id_actor'];
    // var_dump($id);
    // die();

    $name   = mysqli_real_escape_string($koneksi, $post['name']);
    $birth  = mysqli_real_escape_string($koneksi, $post['birth']);
    $bio    = mysqli_real_escape_string($koneksi, $post['bio']);
    $img    = upload_file_actor($id);

    // Validasi Upload File
    if (!$img) {
        return false;
    }

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "UPDATE actor SET name = ?, birth = ?, bio = ?, img = ? WHERE id_actor = ?");
    mysqli_stmt_bind_param($stmt, "ssssi", $name, $birth, $bio, $img, $id);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;

}


// ACTOR DELETE
function delete_actor($id)
{
    global $koneksi;

    // Mengambil path file foto dari database berdasarkan id_actor
    $query = "SELECT img FROM actor WHERE id_actor = '$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        // Query error handling
        echo "<script>
                alert('Terjadi kesalahan saat mengambil data dari database');
                window.location.href = 'index.php?page=actor';
                </script>";
        die();
    }

    // Mendapatkan path file foto sebelumnya (misalnya dari database)
    $row = mysqli_fetch_assoc($result);
    $img = $row['img'];

    if ($img) {
        // Menghapus file foto sebelumnya (jika ada)
        if (file_exists($img)) {
            unlink($img);
        }
    }

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "DELETE FROM actor WHERE id_actor = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
}

// UPLOAD FILE ACTOR
function upload_file_actor($id = NULL)
{
    // Kondisi jika terdapat ID maka file sebelumnya akan dihapus
    if ($id) {
        global $koneksi;

        // Mengambil path file foto sebelumnya dari database berdasarkan id_actor
        $query = "SELECT img FROM actor WHERE id_actor = '$id'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            // Query error handling
            echo "<script>
                alert('Terjadi kesalahan saat mengambil data dari database');
                window.location.href = 'index.php?page=actor';
                </script>";
            die();
        }

        // Mendapatkan path file foto sebelumnya (misalnya dari database)
        $row = mysqli_fetch_assoc($result);
        $previousFile = $row['img'];

        // Menghapus file foto sebelumnya (jika ada)
        if (file_exists($previousFile)) {
            unlink($previousFile);
        }
    }

    // Tangkap name
    $fileName        = $_FILES['img']['name'];
    $fileSize        = $_FILES['img']['size'];
    $fileError       = $_FILES['img']['error'];
    $fileTmp         = $_FILES['img']['tmp_name'];

    // Cek Upload File
    $extension_valid = ['jpg', 'jpeg', 'png'];
    $extension       = pathinfo($fileName, PATHINFO_EXTENSION);
    $extension       = strtolower($extension);

    // Validasi Ekstensi File Upload
    if (!in_array($extension, $extension_valid)) {
        echo "<script>
            alert('Format File Tidak Valid');
            window.location.href = 'index.php?page=actor';
            </script>";
        die();
    }

    // Validasi Ukuran File Upload > 2 MB
    if ($fileSize > 2048000) {
        echo "<script>
            alert('Ukuran File Max: 2 MB');
            window.location.href = 'index.php?page=actor';
            </script>";
        die();
    }

    // Generate New File
    $newFile = 'img/' . uniqid('', true) . '.' . $extension;

    // Pindahkan File Ke Local Storage
    if (move_uploaded_file($fileTmp, $newFile)) {
        return $newFile;
    } else {
        echo "<script>
            alert('Gagal mengunggah file');
            window.location.href = 'index.php?page=actor';
            </script>";
        die();
    }
}

// ==== END ACTOR CONTROLLER ==== //
// ==== DIRECTOR CONTROLLER ==== //

// DIRECTOR CREATE
function add_director($post)
{
    global $koneksi;

    $name   = mysqli_real_escape_string($koneksi, $post['name']);
    $birth  = mysqli_real_escape_string($koneksi, $post['birth']);
    $bio    = mysqli_real_escape_string($koneksi, $post['bio']);
    $img    = upload_file_director();

    // Validasi Upload File
    if (!$img) {
        return false;
    }

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "INSERT INTO director (name, birth, bio, img) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $name, $birth, $bio, $img);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
}

// DIRECTOR UPDATE
function edit_director($post)
{
    global $koneksi;

    $id     = $post['id_director'];
    $name   = mysqli_real_escape_string($koneksi, $post['name']);
    $birth  = mysqli_real_escape_string($koneksi, $post['birth']);
    $bio    = mysqli_real_escape_string($koneksi, $post['bio']);
    $img    = upload_file_director($id);

    // Validasi Upload File
    if (!$img) {
        return false;
    }

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "UPDATE director SET name = ?, birth = ?, bio = ?, img = ? WHERE id_director = ?");
    mysqli_stmt_bind_param($stmt, "ssssi", $name, $birth, $bio, $img, $id);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
}

// DIRECTOR DELETE
function delete_director($id)
{
    global $koneksi;

    // Mengambil path file foto dari database berdasarkan id_director
    $query = "SELECT img FROM director WHERE id_director = '$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        // Query error handling
        echo "<script>
                alert('Terjadi kesalahan saat mengambil data dari database');
                window.location.href = 'index.php?page=director';
                </script>";
        die();
    }

    // Mendapatkan path file foto sebelumnya (misalnya dari database)
    $row = mysqli_fetch_assoc($result);
    $img = $row['img'];

    if ($img) {
        // Menghapus file foto sebelumnya (jika ada)
        if (file_exists($img)) {
            unlink($img);
        }
    }

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "DELETE FROM director WHERE id_director = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
}

// UPLOAD FILE DIRECTOR
function upload_file_director($id = NULL)
{
    // Kondisi jika terdapat ID maka file sebelumnya akan dihapus
    if ($id) {
        global $koneksi;

        // Mengambil path file foto sebelumnya dari database berdasarkan id_director
        $query = "SELECT img FROM director WHERE id_director = '$id'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            // Query error handling
            echo "<script>
                alert('Terjadi kesalahan saat mengambil data dari database');
                window.location.href = 'index.php?page=director';
                </script>";
            die();
        }

        // Mendapatkan path file foto sebelumnya (misalnya dari database)
        $row = mysqli_fetch_assoc($result);
        $previousFile = $row['img'];

        // Menghapus file foto sebelumnya (jika ada)
        if (file_exists($previousFile)) {
            unlink($previousFile);
        }
    }

    // Tangkap name
    $fileName        = $_FILES['img']['name'];
    $fileSize        = $_FILES['img']['size'];
    $fileError       = $_FILES['img']['error'];
    $fileTmp         = $_FILES['img']['tmp_name'];

    // Cek Upload File
    $extension_valid = ['jpg', 'jpeg', 'png'];
    $extension       = pathinfo($fileName, PATHINFO_EXTENSION);
    $extension       = strtolower($extension);

    // Validasi Ekstensi File Upload
    if (!in_array($extension, $extension_valid)) {
        echo "<script>
            alert('Format File Tidak Valid');
            window.location.href = 'index.php?page=director';
            </script>";
        die();
    }

    // Validasi Ukuran File Upload > 2 MB
    if ($fileSize > 2048000) {
        echo "<script>
            alert('Ukuran File Max: 2 MB');
            window.location.href = 'index.php?page=director';
            </script>";
        die();
    }

    // Generate New File
    $newFile = 'img/' . uniqid('', true) . '.' . $extension;

    // Pindahkan File Ke Local Storage
    if (move_uploaded_file($fileTmp, $newFile)) {
        return $newFile;
    } else {
        echo "<script>
            alert('Gagal mengunggah file');
            window.location.href = 'index.php?page=director';
            </script>";
        die();
    }
}

// ==== END DIRECTOR CONTROLLER ==== //
// ==== TAG CONTROLLER ==== //

// TAG CREATE
function add_tag($post)
{
    global $koneksi;

    $tags   = mysqli_real_escape_string($koneksi, $post['tags']);

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "INSERT INTO tag (tags) VALUES (?)");
    mysqli_stmt_bind_param($stmt, "s", $tags);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
}

// TAG UPDATE
function edit_tag($post)
{
    global $koneksi;

    $id     = $post['id_tag'];
    $tags   = mysqli_real_escape_string($koneksi, $post['tags']);

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "UPDATE tag SET tags = ? WHERE id_tag = ?");
    mysqli_stmt_bind_param($stmt, "si", $tags, $id);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
}

// TAG DELETE
function delete_tag($id)
{
    global $koneksi;

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "DELETE FROM tag WHERE id_tag = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
}

// ==== END TAG CONTROLLER ==== //
// ==== GENRE CONTROLLER ==== //

// GENRE CREATE
function add_genre($post)
{
    global $koneksi;

    $genre   = mysqli_real_escape_string($koneksi, $post['genre']);

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "INSERT INTO genre (genre) VALUES (?)");
    mysqli_stmt_bind_param($stmt, "s", $genre);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
}

// GENRE UPDATE
function edit_genre($post)
{
    global $koneksi;

    $id     = $post['id_genre'];
    $genre   = mysqli_real_escape_string($koneksi, $post['genre']);

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "UPDATE genre SET genre = ? WHERE id_genre = ?");
    mysqli_stmt_bind_param($stmt, "si", $genre, $id);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
}

// GENRE DELETE
function delete_genre($id)
{
    global $koneksi;

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "DELETE FROM genre WHERE id_genre = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
}

// ==== END GENRE CONTROLLER ==== //
// ==== CATEGORY CONTROLLER ==== //

// CATEGORY CREATE
function add_category($post)
{
    global $koneksi;

    $genre_id   = mysqli_real_escape_string($koneksi, $post['id_genre']);
    $tag_id   = mysqli_real_escape_string($koneksi, $post['id_tag']);

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "INSERT INTO category (genre_id, tag_id) VALUES (?,?)");
    mysqli_stmt_bind_param($stmt, "ss", $genre_id, $tag_id);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
}

// CATEGORY UPDATE
function edit_category($post)
{
    global $koneksi;

    $id     = $post['id_category'];
    $genre_id   = mysqli_real_escape_string($koneksi, $post['id_genre']);
    $tag_id   = mysqli_real_escape_string($koneksi, $post['id_tag']);

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "UPDATE category SET genre_id = ?, tag_id = ? WHERE id_category = ?");
    mysqli_stmt_bind_param($stmt, "ssi", $genre_id, $tag_id, $id);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
}


// CATEGORY DELETE
function delete_category($id)
{
    global $koneksi;

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "DELETE FROM category WHERE id_category = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
}

// ==== END CATEGORY CONTROLLER ==== //
// ==== REVIEWER CONTROLLER ==== //

// REVIEWER DELETE
function delete_reviewer($id)
{
    global $koneksi;

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "DELETE FROM reviewer WHERE id_reviewer = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
}

// ==== MOVIE CONTROLLER ==== //
// MOVIE CREATE
function add_movie($post)
{
    // Koneksi database
    global $koneksi;

    $title          = mysqli_real_escape_string($koneksi, $post['title']);
    $synopsis       = mysqli_real_escape_string($koneksi, $post['synopsis']);
    $release_date   = mysqli_real_escape_string($koneksi, $post['release_date']);
    $category       = mysqli_real_escape_string($koneksi, $post['id_category']);
    $director_name  = mysqli_real_escape_string($koneksi, $post['id_director']);
    $actor_name     = mysqli_real_escape_string($koneksi, $post['id_actor']);
    $rating         = mysqli_real_escape_string($koneksi, $post['id_reviewer']);
    $img            = upload_file_movie();

    // Validasi Upload File
    if (!$img) {
        return false;
    }
    
    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "INSERT INTO movie (title, synopsis, img, release_date, category_id, director_id, actor_id, reviewer_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssssssss", $title, $synopsis, $img, $release_date, $category, $director_name, $actor_name, $rating);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
}


// MOVIE UPDATE
function edit_movie($post)
{
    global $koneksi;

    $id     = $post['id_movie'];

    $title          = mysqli_real_escape_string($koneksi, $post['title']);
    $synopsis       = mysqli_real_escape_string($koneksi, $post['synopsis']);
    $release_date   = mysqli_real_escape_string($koneksi, $post['release_date']);
    $category       = mysqli_real_escape_string($koneksi, $post['id_category']);
    $director_name  = mysqli_real_escape_string($koneksi, $post['id_director']);
    $actor_name     = mysqli_real_escape_string($koneksi, $post['id_actor']);
    $rating         = mysqli_real_escape_string($koneksi, $post['id_reviewer']);
    $img            = upload_file_movie($id);

    // Validasi Upload File
    if (!$img) {
        return false;
    }

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "UPDATE movie SET title = ?, synopsis = ?, img = ?, release_date = ?, category_id = ?, director_id = ?, actor_id = ?, reviewer_id = ?  WHERE id_movie = ?");
    mysqli_stmt_bind_param($stmt, "ssssssssi", $title, $synopsis, $img, $release_date, $category, $director_name, $actor_name, $rating, $id);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
    // return $risoles;
}


// MOVIE DELETE
function delete_movie($id)
{
    global $koneksi;

    // Mengambil path file foto dari database berdasarkan id_movie
    $query = "SELECT img FROM movie WHERE id_movie = '$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        // Query error handling
        echo "<script>
                alert('Terjadi kesalahan saat mengambil data dari database');
                window.location.href = 'index.php?page=movie';
                </script>";
        die();
    }

    // Mendapatkan path file foto sebelumnya (misalnya dari database)
    $row = mysqli_fetch_assoc($result);
    $img = $row['img'];

    if ($img) {
        // Menghapus file foto sebelumnya (jika ada)
        if (file_exists($img)) {
            unlink($img);
        }
    }

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "DELETE FROM movie WHERE id_movie = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
}

// UPLOAD FILE MOVIE
function upload_file_movie($id = NULL)
{
    // Kondisi jika terdapat ID maka file sebelumnya akan dihapus
    if ($id) {
        global $koneksi;

        // Mengambil path file foto sebelumnya dari database berdasarkan id_movie
        $query = "SELECT img FROM movie WHERE id_movie = '$id'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            // Query error handling
            echo "<script>
                alert('Terjadi kesalahan saat mengambil data dari database');
                window.location.href = 'index.php?page=movie';
                </script>";
            die();
        }

        // Mendapatkan path file foto sebelumnya (misalnya dari database)
        $row = mysqli_fetch_assoc($result);
        $previousFile = $row['img'];

        // Menghapus file foto sebelumnya (jika ada)
        if (file_exists($previousFile)) {
            unlink($previousFile);
        }
    }

    // Tangkap name
    $fileName        = $_FILES['img']['name'];
    $fileSize        = $_FILES['img']['size'];
    $fileError       = $_FILES['img']['error'];
    $fileTmp         = $_FILES['img']['tmp_name'];

    // Cek Upload File
    $extension_valid = ['jpg', 'jpeg', 'png'];
    $extension       = pathinfo($fileName, PATHINFO_EXTENSION);
    $extension       = strtolower($extension);

    // Validasi Ekstensi File Upload
    if (!in_array($extension, $extension_valid)) {
        echo "<script>
            alert('Format File Tidak Valid');
            window.location.href = 'index.php?page=movie';
            </script>";
        die();
    }

    // Validasi Ukuran File Upload > 2 MB
    if ($fileSize > 2048000) {
        echo "<script>
            alert('Ukuran File Max: 2 MB');
            window.location.href = 'index.php?page=movie';
            </script>";
        die();
    }

    // Generate New File
    $newFile = 'img/' . uniqid('', true) . '.' . $extension;

    // Pindahkan File Ke Local Storage
    if (move_uploaded_file($fileTmp, $newFile)) {
        return $newFile;
    } else {
        echo "<script>
            alert('Gagal mengunggah file');
            window.location.href = 'index.php?page=movie';
            </script>";
        die();
    }
}

// ==== END MOVIE CONTROLLER ==== //

// ==== USER CONTROLLER ==== //
// USER DELETE
function delete_user($id)
{
    global $koneksi;

    // Mengambil path file foto dari database berdasarkan id_user
    $query = "SELECT img FROM user WHERE id_user = '$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        // Query error handling
        echo "<script>
                alert('Terjadi kesalahan saat mengambil data dari database');
                window.location.href = 'index.php?page=user';
                </script>";
        die();
    }

    // Mendapatkan path file foto sebelumnya (misalnya dari database)
    $row = mysqli_fetch_assoc($result);
    $img = $row['img'];

    if ($img) {
        // Menghapus file foto sebelumnya (jika ada)
        if (file_exists($img)) {
            unlink($img);
        }
    }

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "DELETE FROM user WHERE id_user = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($result === false) {
        echo "Error in SQL query: " . mysqli_error($koneksi);
        return false;
    }

    // Get the number of affected rows
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    return $affectedRows;
}
// ==== END USER CONTROLLER ==== //
