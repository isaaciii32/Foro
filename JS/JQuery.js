$("#respuesta").click(function main() {

	
	var user_id = $("#user_id").val();
	var tema_id = $("#tema_id").val();
	var content = $("#textareaComentario").val();
	var val = validar_topic_newcomment();

	if (val) {inResp(user_id,tema_id,content);}

	location.reload();

});

function inResp(user_id,tema_id,content) {
	$.ajax({
		type: "post",
		url: "./resp.php",
		data: "user_id="+user_id+"& tema_id="+tema_id+"& content="+content,
		success: function(datos){
		}
	});
}

function validar_topic_newcomment(){
    var comentario = document.getElementById("textareaComentario").value.trim();
    var input = document.getElementById("textareaComentario");

    if (comentario.length >= 5 && comentario.length <= 1000) {
        input.className = "form-control is-valid";
        return true;
    } else {
        if (!comentario.length >= 5 || !comentario.length <= 1000) {
            input.className = "form-control is-invalid";
            input.value = "";
            input.placeholder = "Debe ser entre 5 y 1000 caracteres";
            return false;
        }
    }
}

