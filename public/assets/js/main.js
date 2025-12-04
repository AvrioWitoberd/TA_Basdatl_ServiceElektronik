// =============================================
// Fade-out alert / notifikasi
// =============================================
document.addEventListener("DOMContentLoaded", () => {
    const alert = document.querySelector(".alert");
    if (alert) {
        setTimeout(() => {
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500);
        }, 2500);
    }
});

// =============================================
// Konfirmasi sebelum delete
// Tambahkan class="btn-delete" di tombol hapus
// =============================================
document.addEventListener("click", function (e) {
    if (e.target.classList.contains("btn-delete")) {
        if (!confirm("Yakin ingin menghapus data ini?")) {
            e.preventDefault();
        }
    }
});

// =============================================
// Preview gambar upload
// Tambahkan <input type="file" id="upload" />
// dan <img id="preview">
// =============================================
function previewImage(inputId = "upload", previewId = "preview") {
    const input = document.getElementById(inputId);
    const preview = document.getElementById(previewId);

    if (!input || !preview) return;

    input.addEventListener("change", function () {
        const file = this.files[0];
        if (!file) return;
        preview.src = URL.createObjectURL(file);
        preview.style.display = "block";
    });
}

// =============================================
// Loader ketika submit form
// Tambahkan div class="loader" di footer
// =============================================
function addLoader() {
    const loader = document.createElement("div");
    loader.className = "loading-overlay";
    loader.innerHTML = `
        <div class="spinner"></div>
    `;
    document.body.appendChild(loader);
}

document.addEventListener("submit", function () {
    addLoader();
});

// =============================================
// Auto-format angka (Rupiah style)
// Tambahkan class="rupiah" pada input
// =============================================
document.querySelectorAll("input.rupiah").forEach(input => {
    input.addEventListener("input", function () {
        this.value = this.value
            .replace(/[^\d]/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    });
});
