document.querySelector('#login-container .login form').addEventListener("submit", (e) => {
   e.preventDefault();
   document.querySelector('#login-container .login form').style.transition = "0s";
   document.querySelector('#login-container .login form').classList.add('progress');
   setTimeout(() => {
      document.querySelector('#login-container .login form').classList.remove('progress');
   }, 4000);

   // login();

});
window.onload = () => {
   document.querySelector('.login').classList.add('active');
   document.querySelector('.login form').classList.add('active');
   document.querySelector('footer .rodape').classList.add('active');
}
var duploClickLogin = 0;
function login() {
   if (duploClickLogin == 0) {
      duploClickLogin = 1;
      var pageUrl = "./control/usuariosList.php";
      var form = document.querySelector('#login-container .login form');
      var formdata = new FormData(form);
      formdata.append("ACAO", "EFETUAR LOGIN");
      $.ajax({
         url: pageUrl,
         type: 'POST',
         data: formdata,
         contentType: false,
         processData: false,
         cache: false,
         dataType: 'json',
         error: () => {
            Materialize.toast("Error ao efetuar login", 3000, 'green');
            duploClickLogin = 0;
         },
         success: (response) => {
            if (response.status == 0) {
               Materialize.toast(response.mensagem, 3000, 'green');
               setTimeout(() => {
                  window.location.href = "./admin/componentes/index.php";
               }, 2000);
               duploClickLogin = 0;
            }else{
               Materialize.toast(response.mensagem, 3000, 'green');
               duploClickLogin = 0;
            }
         }
      });
   }
}
var a = 0;
$(document).on("click", ".fa-eye", ()  => {
   if (a == 0) {
      $("#pass").prop('type', 'text');
      a = 1;
   }else{
      $("#pass").prop('type', 'password');
      a = 0;
   }
   
});