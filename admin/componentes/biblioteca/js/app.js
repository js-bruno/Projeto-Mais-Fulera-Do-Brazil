
// Abrir e fechar (novo livro)
$(document).on("click", ".principal .resumo button", () => {
  $("#barraLateral").addClass("active");
  $("#barraLateral .overlay").addClass("active");
  $("#barraLateral .novoLivro form").addClass("active");
  $("#barraLateral .novoLivro form i").addClass("active");
  $("#barraLateral .novoLivro form .conteudo-form").addClass("active");
});
$(document).on("click", "#barraLateral .novoLivro form i", () => {
  $("#barraLateral").removeClass("active");
  $("#barraLateral .overlay").removeClass("active");
  $("#barraLateral .novoLivro form").removeClass("active");
  $("#barraLateral .novoLivro form i").removeClass("active");
  $("#barraLateral .novoLivro form .conteudo-form").removeClass("active");
});



// abrir e fechar (editar livro)
$(document).on("click", ".principal .lista-container .editar-livro", () => {
  $("#barraLateral").addClass("active");
  $("#barraLateral .overlay").addClass("active");
  $("#barraLateral .livroEdicao form").addClass("active");
  $("#barraLateral .livroEdicao form i").addClass("active");
  $("#barraLateral .livroEdicao form .conteudo-form").addClass("active");
});

$(document).on("click", "#barraLateral .livroEdicao form i", () => {
  $("#barraLateral").removeClass("active");
  $("#barraLateral .overlay").removeClass("active");
  $("#barraLateral .livroEdicao form").removeClass("active");
  $("#barraLateral .livroEdicao form i").removeClass("active");
  $("#barraLateral .livroEdicao form .conteudo-form").removeClass("active");
});


// abrir e fechar (alugarLivro livro)
$(document).on("click", ".principal .lista-container .alugar-livro", () => {
  $("#barraLateral").addClass("active");
  $("#barraLateral .overlay").addClass("active");
  $("#barraLateral .alugarLivro form").addClass("active");
  $("#barraLateral .alugarLivro form i").addClass("active");
  $("#barraLateral .alugarLivro form .conteudo-form").addClass("active");
});

$(document).on("click", "#barraLateral .alugarLivro form i", () => {
  $("#barraLateral").removeClass("active");
  $("#barraLateral .overlay").removeClass("active");
  $("#barraLateral .alugarLivro form").removeClass("active");
  $("#barraLateral .alugarLivro form i").removeClass("active");
  $("#barraLateral .alugarLivro form .conteudo-form").removeClass("active");
});




// Fechar formulários através do overlay
$(document).on("click", "#barraLateral .overlay", () => {
  $("#barraLateral").removeClass("active");
  $("#barraLateral .overlay").removeClass("active");

  // Fechar (adicionar livro)
  $("#barraLateral .novoLivro form").removeClass("active");
  $("#barraLateral .novoLivro form i").removeClass("active");
  $("#barraLateral .novoLivro form .conteudo-form").removeClass("active");
  // Fechar (editar livro)
  $("#barraLateral .livroEdicao form").removeClass("active");
  $("#barraLateral .livroEdicao form i").removeClass("active");
  $("#barraLateral .livroEdicao form .conteudo-form").removeClass("active");
});


$(document).on("click",".principal .lista-container .deletar-genero",function(){
    confirm("Deseja realmente apagar?");
});
$(document).on("click",".principal .lista-container .deletar-autor",function(){
  confirm("Deseja realmente apagar?");
});
$(document).on("click",".principal .lista-container .deletar-livro",function(){
  confirm("Deseja realmente apagar?");
});
