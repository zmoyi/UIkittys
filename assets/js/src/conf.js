import Cookies from 'js-cookie';

let btn = document.getElementById('lights');
let bodys = document.getElementById('theme');


btn.addEventListener('click',function (){
    if (bodys.className === 'uk-light')
    {
        bodys.className = 'uk-dark';
        btn.setAttribute('uk-icon','sunset');
        Cookies.set('className', 'uk-dark');
        Cookies.set('icon','sunset');
    }else if (bodys.className === 'uk-dark'){
        bodys.className = 'uk-light';
        btn.setAttribute('uk-icon','sunrise');
        Cookies.set('className', 'uk-light');
        Cookies.set('icon','sunrise');
    }
});
window.onload = function () {
    let d  = document.querySelector('.loader-1')
    if (d)
        d.remove();
}
let autodark = () =>{

    if (Cookies.get('className')===null||Cookies.get('icon')===null){
        if (new Date().getHours() > 22 || new Date().getHours() < 6){
            bodys.className = 'uk-light';
            btn.setAttribute('uk-icon','sunrise');
        }else {
            bodys.className = 'uk-dark';
            btn.setAttribute('uk-icon','sunset');
        }
    }else {
        if (Cookies.get('className')==="uk-light"){
            bodys.className = 'uk-light';
            btn.setAttribute('uk-icon','sunrise');
        }else if (Cookies.get('className')==="uk-dark"){
            bodys.className = 'uk-dark';
            btn.setAttribute('uk-icon','sunset');
        }


    }

}
autodark();
