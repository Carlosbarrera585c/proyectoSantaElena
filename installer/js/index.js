function paginador(objeto, url) {
    window.location.href = url+ '?page=' + $(objeto).val();
}

function eliminar(id, variable, url) {
    $.ajax({
        url: url,
        data: variable + '=' + id,
        dataType: 'json',
        type: 'POST', //GET POST DELETE PUT
        success: function (data) {
            location.reload();
        }
    });
}
function eliminarMasivo() {
    $('#myModalDeleteMass').modal('toggle');
}

$(document).ready(function () {
    $('#chkAll').click(function () {
        $('input[name="chk[]"]').each(function (index, element) {
            if ($('#chkAll').is(':checked') == true && $(element).is(':checked') == false) {
                $(element).prop('checked', true);
            } else if ($('#chkAll').is(':checked') == false && $(element).is(':checked') == true) {
                $(element).prop('checked', false);
            }
        });
    });
});