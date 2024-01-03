
// Получаю ссылку элемента по его идентификатору 
let login = document.getElementById("login");
let register = document.getElementById("register");

//Прячу или показываю форму логина при клике
login.addEventListener('click', function(){
    $("#validation-User").show();
    $("#register-form").hide();
});

//Прячу или показываю форму регистрации при клике
register.addEventListener('click', function(){
    $("#validation-User").hide();
    $("#register-form").show();
});



// Получение данных из формы 
function getData(obj_form){
    var formData = {};
    $('input', obj_form).each(function(){
        if(this.name && this.name != ''){
            formData[this.name] = this.value;
        }
    });
    return formData;
};



//Находим и навешиваем обработчик событий на кнопку входа
const validationUser = document.getElementById("loginNow")
validationUser.addEventListener('click', () => validation());


// АВТОРИЗАЦИЯ ПОЛЬЗОВАТЕЛЯ
function validation(){
    var postData = getData('#validation-User');
    $.ajax({
        url: 'index.php/?controller=login&action=verification',
        method: 'post',
        dataType: 'json',
        data: postData,
        success: function(data){
            if(data['success']){
                alert(data['message']);
                    window.location = `index.php/?controller=account&action=account&userId=${data['userId']}`
            } else {
                alert(data['message']);
            }
           
        }
    });
}



//Находим и навешиваем обработчик событий на кнопку регистрации
const registration = document.getElementById("registration")
registration.addEventListener('click', () => registrationUser());

//РЕГИСТРАЦИЯ НОВОГО ПОЛЬЗОВАТЕЛЯ
function registrationUser(){
    var postData = getData('#register-form');
    $.ajax({
        url: 'index.php/?controller=registration&action=registration',
        method: 'post',
        dataType: 'json',
        data: postData,
        success: function(data){
            if(data['success']){
                alert(data['message']);
                    window.location = `index.php/?controller=account&action=account&userId=${data['userId']}`
            } else {
                alert(data['message']);
            }   
        }
    });
}
