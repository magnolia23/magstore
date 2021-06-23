/*=============================================
IMPRIMIR FACTURA
=============================================*/

$(document).on("click", ".btn-vender", function () { 
	var total = $(this).attr("total");
	window.open("extensiones/tcpdf/pdf/factura.php?total="+total, "_blank");

})