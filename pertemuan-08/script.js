function kirimBukuTamu() {
    let nama = document.getElementById("nama").value;
    let email = document.getElementById("email").value;
    let noHp = document.getElementById("noHp").value;
    let pesan = document.getElementById("pesan").value;

    if(nama == ""){
        alert("Nama lengkap harus diisi");
        return false;
    }
    if(email === "") {
        alert("Email harus diisi");
        return false;
    }
    if(noHp === "") {
        alert("Nomor HP harus diisi");
        return false;
    }
    if(pesan === "") {
        alert("Pesan harus diisi");
        return false;
    }

    let daftarTamu = document.getElementById("daftar-tamu");
    daftarTamu.innerHTML += `
    <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
    <b>${nama}</b> ${email}, ${noHp}<br> ${pesan}

      </div>
      `;

    alert("Terima kasih telah mengisi buku tamu, Pesan kamu sudah kekirim ke Dapur Manis 07");
    return false;
    }