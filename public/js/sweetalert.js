//alert 
let verArchivo = document.querySelectorAll('.verArchivo');
let alertEdit = document.querySelectorAll('.alertEdit');
let alert = document.querySelectorAll('.alertDelete');

verArchivo.forEach(function(element) {
    element.addEventListener('click', function() {
        let url = element.getAttribute('url');
        window.location.href = url;
    });
});

alertEdit.forEach(function(element) {
    element.addEventListener('click', function() {
        let url = element.getAttribute('url');
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
    });
});

alert.forEach(function(element) {
        element.addEventListener('click', function() {
            let url = element.getAttribute('url');
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
        });
});
