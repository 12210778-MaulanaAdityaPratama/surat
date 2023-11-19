$(document).ready(function() {
    // Fungsi untuk menanggapi perubahan pada input pencarian
    $('#searchInput').on('input', function() {
        // Ambil nilai input pencarian
        var query = $(this).val();

        // Lakukan permintaan Ajax untuk mencari surat masuk
        $.ajax({
            url: '{{ url("/suratmasuk") }}',
            method: 'GET',
            data: { search: query },
            success: function(response) {
                // Perbarui bagian tampilan dengan hasil pencarian
                $('#suratmasukContainer').html(response);
            },
            error: function(error) {
                console.error('Error searching:', error);
            }
        });
    });
});