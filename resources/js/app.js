$(document).ready(function () {
    $("a.btn-delete").click(function (e) {
        e.preventDefault();
        //confirm before delete
        let confirm_delete = confirm("Are you sure you want to delete this?");
        if (confirm_delete) $(this).closest("form").submit();
        return;
    });
    $(".select2").select2();
});
