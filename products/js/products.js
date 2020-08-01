$('#FormProduct').submit(function (e) { 
    e.preventDefault();

    let data = $('#FormProduct').serialize();

    $.ajax({
        type: "post",
        url: "./ap/save",
        data,
        dataType: "json",
        success: (response) => {
            let title = response.msg, typeAlert = 'error';

            if(!response.error)
                typeAlert = 'success';
                

            Swal.fire({
                title: title,
                type: typeAlert,
            });

            window.location.href = '/products';
        },
        error: (error) => {
            Swal.fire({
                title: 'Hubo un error intentalo más tarde.',
                type: 'error'
            })
        }
    });
});

$('#FormProductUpdate').submit(function (e) { 
    e.preventDefault();

    let data = $('#FormProductUpdate').serialize();

    $.ajax({
        type: "post",
        url: "./ap/update",
        data,
        dataType: "json",
        success: (response) => {
            let title = response.msg, typeAlert = 'error';

            if(!response.error)
                typeAlert = 'success';
                

            Swal.fire({
                title: title,
                type: typeAlert,
            });

            window.location.href = '/products';
        },
        error: (error) => {
            Swal.fire({
                title: 'Hubo un error intentalo más tarde.',
                type: 'error'
            })
        }
    });
});

function deleteProduct(product_id) {
    if(!product_id)
        return Swal.fire({ title: 'El identificador del producto no esta definido.', type: 'error' });

    $.ajax({
        type: "get",
        url: `./ap/delete?product_id=${product_id}`,
        dataType: "json",
        success: (response) => {
            let title = response.msg, typeAlert = 'error';

            if(!response.error)
                typeAlert = 'success';
                

            Swal.fire({
                title: title,
                type: typeAlert,
            });

            window.location.href = '/products';
        },
        error: (error) => {
            Swal.fire({ title: 'Hubo un error intentalo más tarde.', type: 'error' });
        }
    });
}