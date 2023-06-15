function confirmDelete() {
    return new Promise((resolve, reject) => {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                resolve(true);
            } else {
                reject(false);
            }
        });
    });
}
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(() => {
    $(document).on("click", ".btn-delete", function (e) {
        e.preventDefault();
        let id = $(this).data("id");
        confirmDelete()
            .then(function () {
                $(`#form-delete${id}`).submit();
            })
            .catch();
    });
});
