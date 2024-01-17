<?php
// Mengambil konfigurasi koneksi ke database dari file database.php di folder config CodeIgniter
include(APPPATH . 'config/database.php');

$host = $db['default']['hostname'];
$dbname = $db['default']['database'];
$username = $db['default']['username'];
$password = $db['default']['password'];

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($dsn, $username, $password, $options);

    // Query SQL untuk mengambil data dari tabel masukan
    $queryMasukan = "SELECT * FROM masukan";
    $stmtMasukan = $pdo->query($queryMasukan);

    // Inisialisasi nomor
    $nomor = 1;

} catch (PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}

// Proses delete data jika ada request untuk menghapus
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    try {
        $queryDelete = "DELETE FROM masukan WHERE id = ?";
        $stmtDelete = $pdo->prepare($queryDelete);
        $stmtDelete->execute([$deleteId]);

        // Menampilkan pesan kesuksesan delete
        echo '<div id="deleteSuccessMessage" style="background-color: #4CAF50; color: #fff; padding: 10px; margin-top: 10px; text-align: center;">Data berhasil dihapus. <span style="float: right; cursor: pointer;" onclick="closeDeleteSuccessMessage()">×</span></div>';

    } catch (PDOException $e) {
        echo "Error deleting record: " . $e->getMessage();
    }
}

// Ambil data setelah delete (refresh data)
$queryMasukan = "SELECT * FROM masukan";
$stmtMasukan = $pdo->query($queryMasukan);
?>

<div style="max-width: 800px; margin: 50px auto; padding: 20px; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <h2 style="text-align: center; font-family: 'Poppins', sans-serif; font-weight: 600; color: black;">Daftar Masukan</h2>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr>
                <th style="background-color: #E85B0C; color: #fff; border: 1px solid #ddd; padding: 12px; text-align: left;">No</th>
                <th style="background-color: #E85B0C; color: #fff; border: 1px solid #ddd; padding: 12px; text-align: left;">Nama Lengkap</th>
                <th style="background-color: #E85B0C; color: #fff; border: 1px solid #ddd; padding: 12px; text-align: left;">Masukan</th>
                <th style="background-color: #E85B0C; color: #fff; border: 1px solid #ddd; padding: 12px; text-align: left;">Tanggal</th>
                <th style="background-color: #E85B0C; color: #fff; border: 1px solid #ddd; padding: 12px; text-align: left;">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Isi tabel akan diisi melalui data dinamis dari database -->
            <?php while ($row = $stmtMasukan->fetch()): ?>
                <tr>
                    <td style="border: 1px solid #ddd; padding: 12px; text-align: left;"><?php echo $nomor; ?></td>
                    <td style="border: 1px solid #ddd; padding: 12px; text-align: left;"><?php echo $row['nama_lengkap']; ?></td>
                    <td style="border: 1px solid #ddd; padding: 12px; text-align: left;"><?php echo $row['masukan']; ?></td>
                    <td style="border: 1px solid #ddd; padding: 12px; text-align: left;"><?php echo date("Y-m-d", strtotime($row['tanggal'])); ?></td>
                    <td style="border: 1px solid #ddd; padding: 12px; text-align: left;">
                        <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id']; ?>)" class="btn btn-outline-danger">
                        <i class="fas fa-trash">Hapus</i>
                        </a>
                    </td>
                </tr>
                <?php $nomor++; // Increment nomor setiap kali mendapatkan satu baris data ?>
            <?php endwhile; ?>
            <!-- Tambahkan baris sesuai dengan data yang dimiliki -->
        </tbody>
    </table>
</div>

<script>
    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            window.location.href = '?delete_id=' + id;
        }
    }

    function closeDeleteSuccessMessage() {
        var deleteSuccessMessage = document.getElementById('deleteSuccessMessage');
        if (deleteSuccessMessage) {
            deleteSuccessMessage.style.display = 'none';
        }
    }
</script>

<?php
// Menutup koneksi ke database
$pdo = null;
?>
