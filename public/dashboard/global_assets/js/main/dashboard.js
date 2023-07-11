$(".datatable-basic").DataTable({
    autoWidth: false,
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    language: {
        search: "<span>Filter:</span> _INPUT_",
        lengthMenu: "<span>Show:</span> _MENU_",
        paginate: { first: "First", last: "Last", next: "→", previous: "←" },
    },
});

// Font style only toolbar
$("#summernote").summernote({
    toolbar: [
        //[groupname, [button list]]

        ["style", ["bold", "italic", "underline", "clear"]],
        ["font", ["strikethrough", "superscript", "subscript"]],
        ["fontsize", ["fontsize"]],
        ["color", ["color"]],
        ["para", ["ul", "ol", "paragraph"]],
        ["height", ["height"]],
    ],
});

// Override Noty defaults
Noty.overrideDefaults({
    theme: "limitless",
    layout: "topRight",
    type: "alert",
    timeout: 2500,
});


confirmationModal = function (message, formId) {
    var notyConfirm = new Noty({
        text: '<h4 class="mb-3 text-bold text-center">'+message+'</h4><p class="text-center">Faites votre choix</p>',
        timeout: false,
        modal: true,
        layout: "center",
        closeWith: "button",
        type: "confirm",
        buttons: [
            Noty.button('NON <i class="icon-bell-cross ml-1"></i>', "btn btn-danger", function () {
                notyConfirm.close();
            }),

            Noty.button(
                'OUI <i class="icon-thumbs-up2 ml-2"></i>',
                "btn bg-green ml-1",
                function () {
                    document.getElementById(formId).submit();
                    notyConfirm.close();
                },
                { id: "button1", "data-status": "ok" }
            ),
        ],
    }).show();
};