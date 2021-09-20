$(document).ready(function () {
    $().ready(function () {

        $('.datepicker').datetimepicker({
            format: 'DD/MM/YYYY',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });

        $(".form-control").keyup(function () {
            $(this).val($(this).val().toUpperCase());
        });

        if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;
        } else {
            $('body').addClass('sidebar-mini');
            md.misc.sidebar_mini_active = true;
        }
        var simulateWindowResize = setInterval(function () {
            window.dispatchEvent(new Event('resize'));
        }, 180);
        setTimeout(function () {
            clearInterval(simulateWindowResize);
        }, 1000);

        $('[data-toggle="tooltip"]').tooltip();
        $('.table').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [20, 30, 50, -1],
                [20, 30, 50, "Todos"]
            ],
            responsive: true,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"
            },
        });
    });
});

$(document).ready(function () {
    md.checkFullPageBackgroundImage();
    setTimeout(function () {
        $('.card').removeClass('card-hidden');
    }, 700);
});