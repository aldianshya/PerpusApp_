// Fungsi untuk menampilkan pop-up
function showPopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "block";
  
    // Menutup pop-up secara otomatis setelah 1,5 detik (1500 milidetik)
    setTimeout(function() {
      popup.style.display = "none";
    }, 15000);
  }
  