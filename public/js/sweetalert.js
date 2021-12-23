$(document).ready(function () {
    $('#myTable').DataTable({
        responsive: true,
        autoWidth: false,
        //para optimizar la web
        deferRender: true,
        retrieve: true,
        processing: true,
        language: {
            // "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json",
        }
    });
});


let alertaGasto = document.querySelector("#myTable > #tbody_gastos");

alertaGasto.addEventListener("click", function (e) {
    // e.preventDefault();
    if (e.target.getAttribute('vergasto') || e.target.parentNode.getAttribute('vergasto')) {
        let url;
        if (e.target.getAttribute('vergasto')) {
            url = e.target.getAttribute('url');
        } else {
            url = e.target.parentNode.getAttribute('url')
        }

        window.location.href = url;
    }

    if (e.target.getAttribute('editartgasto') || e.target.parentNode.getAttribute('editartgasto')) {

        let url;
        if (e.target.getAttribute('editartgasto')) {
            url = e.target.getAttribute('url');
        } else {
            url = e.target.parentNode.getAttribute('url')
        }

        Swal.fire({
            title: 'esta seguro?',
            text: "que desea modificar los datos",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'si, modificare'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        })
    }

    if (e.target.getAttribute('eliminargasto') || e.target.parentNode.getAttribute('eliminargasto')) {

        let url;
        if (e.target.getAttribute('eliminargasto')) {
            url = e.target.getAttribute('url');
        } else {
            url = e.target.parentNode.getAttribute('url')
        }

        Swal.fire({
            title: 'esta seguro?',
            text: "no se puede revertir el proceso",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'si, eliminalo'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        })
    }
})

