// Abrir menu ao inicializar a página
var a = 1;
// Evento para abrir e fechar menu
document.querySelector("header .abrir-menu").addEventListener("click", () => {
  if (a == 0) {
    document.querySelector("header nav").classList.add("active");
    document.querySelector("header nav .menu-lateral").classList.add("active");
    document.querySelector(".abrir-menu i").classList.add("active");
    document.querySelector(".principal").classList.remove("active");
    document.querySelector(".principal .resumo").classList.remove("active");
    document.querySelector(".lista-container").classList.remove("active");
    a = 1;
  }else{
    document.querySelector("header nav").classList.remove("active");
    document.querySelector("header nav .menu-lateral").classList.remove("active");
    document.querySelector(".abrir-menu i").classList.remove("active");
    document.querySelector(".lista-container").classList.add("active");
    document.querySelector(".principal .resumo").classList.add("active");
    document.querySelector(".principal").classList.add("active");
    a = 0;
  }
});


// editar perfil

document.querySelector("nav .menu-lateral .menu-dados i").addEventListener("click", () => {
  document.querySelector("nav .sub-menu-editar").classList.add("active");
  document.querySelector("nav .sub-menu-editar form").classList.add("active")
  // document.querySelector("nav .menu-lateral").classList.remove("active");
});
document.querySelector("nav .sub-menu-editar i").addEventListener("click", () => {
  document.querySelector("nav .sub-menu-editar").classList.remove("active");
  document.querySelector("nav .sub-menu-editar form").classList.remove("active")
});
document.querySelector("nav .mini-menu-lateral ul li:nth-child(1)").addEventListener("click", () => {
  document.querySelector("nav .sub-menu-editar").classList.add("active");
  document.querySelector("nav .sub-menu-editar form").classList.add("active")
});
document.querySelector("nav .mini-menu-lateral ul li:nth-child(3)").addEventListener("click", () => {
  document.querySelector("nav .sub-menu-editar").classList.add("active");
  document.querySelector("nav .sub-menu-editar form").classList.add("active")
});

var attr = "";
$(".menu-acessos ul li").on("click", function(){
  attr = $(this).attr("data-id");
    $("main").empty();
  $("main").load("./"+ attr +"/view/index.php");
  $(".menu-lateral .menu-acessos ul li i").removeClass("active");
  $(".menu-lateral .menu-acessos ul li a").removeClass("active");
  if (attr == "biblioteca") {
      $(".menu-lateral .menu-acessos .bibli i").addClass("active");
      $(".menu-lateral .menu-acessos .bibli a").addClass("active");
  }else  if (attr == "acessorios"){
    $(".menu-lateral .menu-acessos .acess i").addClass("active");
    $(".menu-lateral .menu-acessos .acess a").addClass("active");
    listarResumoAcessorios();
  }
});
