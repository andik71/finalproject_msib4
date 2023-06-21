<?php

// Base URL
function base_url()
{
    //$_SERVER['SERVER_NAME'] : alamat website, misalkan websitemu.com
    // $_SERVER['SCRIPT_NAME'] : directory website, websitemu.com/blog/ $_SERVER['SCRIPT_NAME'] : blog
    $url_dasar  = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']);
    return $url_dasar;
}
// End. Base URL

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

// ==== DURATION QUERY ==== //
function format_duration($minutes)
{
    $hours = floor($minutes / 60);
    $minutes = $minutes % 60;
    $seconds = $minutes * 60;

    return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
}

// ==== END DURATION QUERY ==== //

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

    $name       = mysqli_real_escape_string($koneksi, strip_tags($post['name']));
    $birth      = mysqli_real_escape_string($koneksi, strip_tags($post['birth']));
    $bio        = $post['bio'];
    $occupation = 'Actor';
    $country    = mysqli_real_escape_string($koneksi, strip_tags($post['country']));
    $img        = upload_file_actor();

    // Validasi Upload File
    if (!$img) {
        return false;
    }

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "INSERT INTO actor (name, birth, bio, occupation, country,img) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $birth, $bio, $occupation, $country, $img);

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

    $id         = $post['id_actor'];

    $name       = mysqli_real_escape_string($koneksi, strip_tags($post['name']));
    $birth      = mysqli_real_escape_string($koneksi, strip_tags($post['birth']));
    $bio        = $post['bio'];
    $occupation = 'Actor';
    $country    = mysqli_real_escape_string($koneksi, strip_tags($post['country']));
    $img        = upload_file_actor($id);

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "UPDATE actor SET name = ?, birth = ?, bio = ?, occupation = ?, country = ?, img = ? WHERE id_actor = ?");
    mysqli_stmt_bind_param($stmt, "ssssssi", $name, $birth, $bio, $occupation, $country, $img, $id);

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
    global $koneksi;

    // Tangkap name
    $fileName  = isset($_FILES['img']) ? $_FILES['img']['name'] : '';
    $fileSize  = isset($_FILES['img']) ? $_FILES['img']['size'] : '';
    $fileError = isset($_FILES['img']) ? $_FILES['img']['error'] : '';
    $fileTmp   = isset($_FILES['img']) ? $_FILES['img']['tmp_name'] : '';

    // Cek apakah ada file yang diunggah
    if (empty($fileName)) {
        // Mendapatkan path file foto sebelumnya dari database berdasarkan id_actor
        $query  = "SELECT img FROM actor WHERE id_actor = '$id'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            // Query error handling
            echo "
                <script>
                    alert('Terjadi kesalahan saat mengambil data dari database');
                    window.location.href = 'index.php?page=actor';
                </script>";
            die();
        }

        // Mendapatkan path file foto sebelumnya (misalnya dari database)
        $row          = mysqli_fetch_assoc($result);
        $previousFile = $row['img'];

        return $previousFile; // Mengembalikan path file foto sebelumnya
    } else {
        // Kondisi jika terdapat ID maka file sebelumnya akan dihapus
        if ($id) {
            // Mendapatkan path file foto sebelumnya dari database berdasarkan id_actor
            $query  = "SELECT img FROM actor WHERE id_actor = '$id'";
            $result = mysqli_query($koneksi, $query);

            if (!$result) {
                // Query error handling
                echo "
                    <script>
                        alert('Terjadi kesalahan saat mengambil data dari database');
                        window.location.href = 'index.php?page=actor';
                    </script>";
                die();
            }

            // Mendapatkan path file foto sebelumnya (misalnya dari database)
            $row          = mysqli_fetch_assoc($result);
            $previousFile = $row['img'];

            // Menghapus file foto sebelumnya (jika ada)
            if (file_exists($previousFile)) {
                unlink($previousFile);
            }
        }
    }

    // Cek Upload File
    if (!empty($fileName)) {
        $extension_valid = ['jpg', 'jpeg', 'png'];
        $extension       = pathinfo($fileName, PATHINFO_EXTENSION);
        $extension       = strtolower($extension);

        // Validasi Ekstensi File Upload
        if (!in_array($extension, $extension_valid)) {
            echo "
                <script>
                    alert('Format File Tidak Valid');
                    window.location.href = 'index.php?page=actor';
                </script>";
            die();
        }

        // Validasi Ukuran File Upload > 2 MB
        if ($fileSize > 2048000) {
            echo "
                <script>
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
            echo "
                <script>
                    alert('Gagal mengunggah file');
                    window.location.href = 'index.php?page=actor';
                </script>";
            die();
        }
    }

    return NULL; // Mengembalikan NULL jika tidak ada file yang diunggah
}

// ==== END ACTOR CONTROLLER ==== //
// ==== DIRECTOR CONTROLLER ==== //

// DIRECTOR CREATE
function add_director($post)
{
    // Koneksi database
    global $koneksi;

    $name       = mysqli_real_escape_string($koneksi, strip_tags($post['name']));
    $birth      = mysqli_real_escape_string($koneksi, strip_tags($post['birth']));
    $bio        = $post['bio'];
    $occupation = 'Director';
    $country    = mysqli_real_escape_string($koneksi, strip_tags($post['country']));
    $img        = upload_file_director();

    // Validasi Upload File
    if (!$img) {
        return false;
    }

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "INSERT INTO director (name, birth, bio, occupation, country,img) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $birth, $bio, $occupation, $country, $img);

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

    $id         = $post['id_director'];

    $name       = mysqli_real_escape_string($koneksi, strip_tags($post['name']));
    $birth      = mysqli_real_escape_string($koneksi, strip_tags($post['birth']));
    $bio        = $post['bio'];
    $occupation = 'Director';
    $country    = mysqli_real_escape_string($koneksi, strip_tags($post['country']));
    $img        = upload_file_director($id);

    // Validasi Upload File
    if (!$img) {
        return false;
    }

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "UPDATE director SET name = ?, birth = ?, bio = ?, occupation = ?, country = ?, img = ? WHERE id_director = ?");
    mysqli_stmt_bind_param($stmt, "ssssssi", $name, $birth, $bio, $occupation, $country, $img, $id);

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
    global $koneksi;

    // Tangkap name
    $fileName  = isset($_FILES['img']) ? $_FILES['img']['name'] : '';
    $fileSize  = isset($_FILES['img']) ? $_FILES['img']['size'] : '';
    $fileError = isset($_FILES['img']) ? $_FILES['img']['error'] : '';
    $fileTmp   = isset($_FILES['img']) ? $_FILES['img']['tmp_name'] : '';

    // Cek apakah ada file yang diunggah
    if (empty($fileName)) {
        // Mendapatkan path file foto sebelumnya dari database berdasarkan id_director
        $query  = "SELECT img FROM director WHERE id_director = '$id'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            // Query error handling
            echo "
                <script>
                    alert('Terjadi kesalahan saat mengambil data dari database');
                    window.location.href = 'index.php?page=director';
                </script>";
            die();
        }

        // Mendapatkan path file foto sebelumnya (misalnya dari database)
        $row          = mysqli_fetch_assoc($result);
        $previousFile = $row['img'];

        return $previousFile; // Mengembalikan path file foto sebelumnya
    } else {
        // Kondisi jika terdapat ID maka file sebelumnya akan dihapus
        if ($id) {
            // Mendapatkan path file foto sebelumnya dari database berdasarkan id_director
            $query  = "SELECT img FROM director WHERE id_director = '$id'";
            $result = mysqli_query($koneksi, $query);

            if (!$result) {
                // Query error handling
                echo "
                    <script>
                        alert('Terjadi kesalahan saat mengambil data dari database');
                        window.location.href = 'index.php?page=director';
                    </script>";
                die();
            }

            // Mendapatkan path file foto sebelumnya (misalnya dari database)
            $row          = mysqli_fetch_assoc($result);
            $previousFile = $row['img'];

            // Menghapus file foto sebelumnya (jika ada)
            if (file_exists($previousFile)) {
                unlink($previousFile);
            }
        }
    }

    // Cek Upload File
    if (!empty($fileName)) {
        $extension_valid = ['jpg', 'jpeg', 'png'];
        $extension       = pathinfo($fileName, PATHINFO_EXTENSION);
        $extension       = strtolower($extension);

        // Validasi Ekstensi File Upload
        if (!in_array($extension, $extension_valid)) {
            echo "
                <script>
                    alert('Format File Tidak Valid');
                    window.location.href = 'index.php?page=director';
                </script>";
            die();
        }

        // Validasi Ukuran File Upload > 2 MB
        if ($fileSize > 2048000) {
            echo "
                <script>
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
            echo "
                <script>
                    alert('Gagal mengunggah file');
                    window.location.href = 'index.php?page=director';
                </script>";
            die();
        }
    }

    return NULL; // Mengembalikan NULL jika tidak ada file yang diunggah
}

// ==== END DIRECTOR CONTROLLER ==== //
// ==== TAG CONTROLLER ==== //

// TAG CREATE
function add_tag($post)
{
    global $koneksi;

    $tags   = mysqli_real_escape_string($koneksi, strip_tags($post['tags']));

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
    $tags   = mysqli_real_escape_string($koneksi, strip_tags($post['tags']));

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

    $genre   = mysqli_real_escape_string($koneksi, strip_tags($post['genre']));

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
    $genre   = mysqli_real_escape_string($koneksi, strip_tags($post['genre']));

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

    $genre_id   = mysqli_real_escape_string($koneksi, strip_tags($post['id_genre']));
    $tag_id   = mysqli_real_escape_string($koneksi, strip_tags($post['id_tag']));

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
    $genre_id   = mysqli_real_escape_string($koneksi, strip_tags($post['id_genre']));
    $tag_id   = mysqli_real_escape_string($koneksi, strip_tags($post['id_tag']));

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

// REVIEWER CREATE
function add_reviewer($post)
{
    global $koneksi;

    $movie_id = mysqli_real_escape_string($koneksi, strip_tags($post['movie_id']));
    $user_id = mysqli_real_escape_string($koneksi, strip_tags($post['user_id']));
    $comment = mysqli_real_escape_string($koneksi, strip_tags($post['comment']));
    $date = date("Y-m-d h:i:s"); // Mengambil waktu sekarang
    $rating = mysqli_real_escape_string($koneksi, strip_tags($post['rating']));

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "INSERT INTO reviewer (movie_id, user_id, comment, date, rating) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssss", $movie_id, $user_id, $comment, $date, $rating);

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

    $title          = mysqli_real_escape_string($koneksi, strip_tags($post['title']));
    $synopsis       = $post['synopsis'];
    $release_date   = mysqli_real_escape_string($koneksi, strip_tags($post['release_date']));
    $duration       = mysqli_real_escape_string($koneksi, strip_tags($post['duration']));
    $production     = mysqli_real_escape_string($koneksi, strip_tags($post['production']));
    $video          = mysqli_real_escape_string($koneksi, strip_tags($post['video']));
    $country        = mysqli_real_escape_string($koneksi, strip_tags($post['country']));
    $category       = mysqli_real_escape_string($koneksi, strip_tags($post['id_category']));
    $director_name  = mysqli_real_escape_string($koneksi, strip_tags($post['id_director']));
    $actor_name     = mysqli_real_escape_string($koneksi, strip_tags($post['id_actor']));
    $img            = upload_file_movie();

    // Validasi Upload File
    if (!$img) {
        return false;
    }

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "INSERT INTO movie (title, synopsis, img, release_date, duration, production, video, country, category_id, director_id, actor_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssssssssss", $title, $synopsis, $img, $release_date, $duration, $production, $video, $country, $category, $director_name, $actor_name);


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

    $id             = $post['id_movie'];

    $title          = mysqli_real_escape_string($koneksi, strip_tags($post['title']));
    $synopsis       = $post['synopsis'];
    $release_date   = mysqli_real_escape_string($koneksi, strip_tags($post['release_date']));
    $duration       = mysqli_real_escape_string($koneksi, strip_tags($post['duration']));
    $production     = mysqli_real_escape_string($koneksi, strip_tags($post['production']));
    $video          = mysqli_real_escape_string($koneksi, strip_tags($post['video']));
    $country        = mysqli_real_escape_string($koneksi, strip_tags($post['country']));
    $category       = mysqli_real_escape_string($koneksi, strip_tags($post['id_category']));
    $director_name  = mysqli_real_escape_string($koneksi, strip_tags($post['id_director']));
    $actor_name     = mysqli_real_escape_string($koneksi, strip_tags($post['id_actor']));
    $img            = upload_file_movie($id);

    // Validasi Upload File
    if (!$img) {
        return false;
    }

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "UPDATE movie SET title = ?, synopsis = ?, img = ?, release_date = ?, duration = ?, production = ?, video = ?, country = ?, category_id = ?, director_id = ?, actor_id = ? WHERE id_movie = ?");
    mysqli_stmt_bind_param($stmt, "sssssssssssi", $title, $synopsis, $img, $release_date, $duration, $production, $video, $country, $category, $director_name, $actor_name, $id);

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
    global $koneksi;

    // Tangkap name
    $fileName  = isset($_FILES['img']) ? $_FILES['img']['name'] : '';
    $fileSize  = isset($_FILES['img']) ? $_FILES['img']['size'] : '';
    $fileError = isset($_FILES['img']) ? $_FILES['img']['error'] : '';
    $fileTmp   = isset($_FILES['img']) ? $_FILES['img']['tmp_name'] : '';

    // Cek apakah ada file yang diunggah
    if (empty($fileName)) {
        // Mendapatkan path file foto sebelumnya dari database berdasarkan id_movie
        $query  = "SELECT img FROM movie WHERE id_movie = '$id'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            // Query error handling
            echo "
                <script>
                    alert('Terjadi kesalahan saat mengambil data dari database');
                    window.location.href = 'index.php?page=movie';
                </script>";
            die();
        }

        // Mendapatkan path file foto sebelumnya (misalnya dari database)
        $row          = mysqli_fetch_assoc($result);
        $previousFile = $row['img'];

        return $previousFile; // Mengembalikan path file foto sebelumnya
    } else {
        // Kondisi jika terdapat ID maka file sebelumnya akan dihapus
        if ($id) {
            // Mendapatkan path file foto sebelumnya dari database berdasarkan id_movie
            $query  = "SELECT img FROM movie WHERE id_movie = '$id'";
            $result = mysqli_query($koneksi, $query);

            if (!$result) {
                // Query error handling
                echo "
                    <script>
                        alert('Terjadi kesalahan saat mengambil data dari database');
                        window.location.href = 'index.php?page=movie';
                    </script>";
                die();
            }

            // Mendapatkan path file foto sebelumnya (misalnya dari database)
            $row          = mysqli_fetch_assoc($result);
            $previousFile = $row['img'];

            // Menghapus file foto sebelumnya (jika ada)
            if (file_exists($previousFile)) {
                unlink($previousFile);
            }
        }
    }

    // Cek Upload File
    if (!empty($fileName)) {
        $extension_valid = ['jpg', 'jpeg', 'png'];
        $extension       = pathinfo($fileName, PATHINFO_EXTENSION);
        $extension       = strtolower($extension);

        // Validasi Ekstensi File Upload
        if (!in_array($extension, $extension_valid)) {
            echo "
                <script>
                    alert('Format File Tidak Valid');
                    window.location.href = 'index.php?page=movie';
                </script>";
            die();
        }

        // Validasi Ukuran File Upload > 2 MB
        if ($fileSize > 2048000) {
            echo "
                <script>
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
            echo "
                <script>
                    alert('Gagal mengunggah file');
                    window.location.href = 'index.php?page=movie';
                </script>";
            die();
        }
    }

    return NULL; // Mengembalikan NULL jika tidak ada file yang diunggah
}

// ==== END MOVIE CONTROLLER ==== //

// ==== USER CONTROLLER ==== //

// ADD USER
function add_user($post)
{
    // Koneksi database
    global $koneksi;

    $username   = mysqli_real_escape_string($koneksi, strip_tags($post['username']));
    $name       = mysqli_real_escape_string($koneksi, strip_tags($post['fullname']));
    $email      = mysqli_real_escape_string($koneksi, strip_tags($post['email']));
    $password   = mysqli_real_escape_string($koneksi, strip_tags($post['password']));
    $user_role  = 'viewer';
    $img        = 'img/default_user.jpg';

    // Password Encryptor
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "INSERT INTO user (username, name, email, password, img, user_role) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssssss", $username, $name, $email, $password, $img, $user_role);

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

function edit_user($post)
{
    global $koneksi;
    $id         = $post['id_user'];

    $username   = mysqli_real_escape_string($koneksi, strip_tags($post['username']));
    $name       = mysqli_real_escape_string($koneksi, strip_tags($post['name']));
    $email      = mysqli_real_escape_string($koneksi, strip_tags($post['email']));
    $password   = mysqli_real_escape_string($koneksi, strip_tags($post['password']));
    $user_role  = mysqli_real_escape_string($koneksi, strip_tags($post['user_role']));
    $img        = upload_file_user($id);

    // Validasi Upload File
    if (!$img) {
        return false;
    }

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "UPDATE user SET username = ?, name = ?, email = ?, password = ?, img = ?, user_role = ? WHERE id_user = ?");
    mysqli_stmt_bind_param($stmt, "ssssssi", $username, $name, $email, $password, $img, $user_role, $id);

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

// UPLOAD FILE MOVIE
function upload_file_user($id = NULL)
{
    global $koneksi;

    // Tangkap name
    $fileName  = isset($_FILES['img']) ? $_FILES['img']['name'] : '';
    $fileSize  = isset($_FILES['img']) ? $_FILES['img']['size'] : '';
    $fileError = isset($_FILES['img']) ? $_FILES['img']['error'] : '';
    $fileTmp   = isset($_FILES['img']) ? $_FILES['img']['tmp_name'] : '';

    // Cek apakah ada file yang diunggah
    if (empty($fileName)) {
        // Mendapatkan path file foto sebelumnya dari database berdasarkan id_user
        $query  = "SELECT img FROM user WHERE id_user = '$id'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            // Query error handling
            echo "
                <script>
                    alert('Terjadi kesalahan saat mengambil data dari database');
                    window.location.href = 'index.php?page=user';
                </script>";
            die();
        }

        // Mendapatkan path file foto sebelumnya (misalnya dari database)
        $row          = mysqli_fetch_assoc($result);
        $previousFile = $row['img'];

        return $previousFile; // Mengembalikan path file foto sebelumnya
    } else {
        // Kondisi jika terdapat ID maka file sebelumnya akan dihapus
        if ($id) {
            // Mendapatkan path file foto sebelumnya dari database berdasarkan id_user
            $query  = "SELECT img FROM user WHERE id_user = '$id'";
            $result = mysqli_query($koneksi, $query);

            if (!$result) {
                // Query error handling
                echo "
                    <script>
                        alert('Terjadi kesalahan saat mengambil data dari database');
                        window.location.href = 'index.php?page=user';
                    </script>";
                die();
            }

            // Mendapatkan path file foto sebelumnya (misalnya dari database)
            $row          = mysqli_fetch_assoc($result);
            $previousFile = $row['img'];

            // Menghapus file foto sebelumnya (jika ada)
            if (file_exists($previousFile)) {
                unlink($previousFile);
            }
        }
    }

    // Cek Upload File
    if (!empty($fileName)) {
        $extension_valid = ['jpg', 'jpeg', 'png'];
        $extension       = pathinfo($fileName, PATHINFO_EXTENSION);
        $extension       = strtolower($extension);

        // Validasi Ekstensi File Upload
        if (!in_array($extension, $extension_valid)) {
            echo "
                <script>
                    alert('Format File Tidak Valid');
                    window.location.href = 'index.php?page=user';
                </script>";
            die();
        }

        // Validasi Ukuran File Upload > 2 MB
        if ($fileSize > 2048000) {
            echo "
                <script>
                    alert('Ukuran File Max: 2 MB');
                    window.location.href = 'index.php?page=user';
                </script>";
            die();
        }

        // Generate New File
        $newFile = 'img/' . uniqid('', true) . '.' . $extension;

        // Pindahkan File Ke Local Storage
        if (move_uploaded_file($fileTmp, $newFile)) {
            return $newFile;
        } else {
            echo "
                <script>
                    alert('Gagal mengunggah file');
                    window.location.href = 'index.php?page=user';
                </script>";
            die();
        }
    }

    return NULL; // Mengembalikan NULL jika tidak ada file yang diunggah
}


function profile_update($post)
{
    global $koneksi;
    $id         = $post['id_user'];

    $username   = mysqli_real_escape_string($koneksi, strip_tags($post['username']));
    $name       = mysqli_real_escape_string($koneksi, strip_tags($post['name']));
    $email      = mysqli_real_escape_string($koneksi, strip_tags($post['email']));
    $password   = mysqli_real_escape_string($koneksi, strip_tags($post['password']));
    $user_role  = mysqli_real_escape_string($koneksi, strip_tags($post['user_role']));
    $img        = upload_file_user($id);

    // Validasi Upload File
    if (!$img) {
        return false;
    }

    // Prepare statement
    $stmt = mysqli_prepare($koneksi, "UPDATE user SET username = ?, name = ?, email = ?, password = ?, img = ?, user_role = ? WHERE id_user = ?");
    mysqli_stmt_bind_param($stmt, "ssssssi", $username, $name, $email, $password, $img, $user_role, $id);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    exit;

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
