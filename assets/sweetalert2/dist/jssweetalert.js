const flashDataSuccess = $('.flash-data-success').val();
const flashDataError = $('.flash-data-error').val();

if (flashDataSuccess) {
    console.log(flashDataSuccess);
    Swal.fire({
        title: 'Data Kasir',
        text: 'Berhasil' + flashDataSuccess,
        icon: 'success',
    });
} else {
    console.log(flashDataSuccess);
}

if (flashDataError) {
    console.log(flashDataError);
    Swal.fire({
        title: 'Data Kasir',
        text: 'Gagal' + flashDataError,
        icon: 'error',
    });
} else {
    console.log(flashDataError);
}