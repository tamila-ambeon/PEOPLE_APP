const allowedTime = 5 * 60 * 1000

const testLastActive = localStorage.getItem('lastActive')
if (testLastActive !== null) {
  //console.log('Дані знайдено:', data);
} else {
  //console.log('Дані відсутні');
  blurSite()
}

let isBlured = true

// Функція для розмиття контейнера
function blurSite() {
    document.body.style.filter = 'blur(7px)';
}

// Функція для зняття розмиття
function unblurSite() {
    document.body.style.filter = 'none';
    //enableSelects()
}

function checkBlur() 
{
    let lastActive = parseInt(localStorage.getItem('lastActive'));
    let timePassed = Date.now() - lastActive

    if (timePassed > allowedTime) { // 5 хвилин в мілісекундах
        blurNow()
    } else {
       // console.log('time left', miliToTime(allowedTime - timePassed), timePassed, allowedTime)
       $("#timer-lock").text(miliToTime(allowedTime - timePassed))
        unblurSite()
        allowSelection()
        isBlured = false
    }
}

function blurNow()
{
    blurSite()
    blockSelection()
    isBlured = true
   // disableSelects()
}


// Ініціалізація таймера для розмиття
checkBlur()
setInterval(checkBlur, 1000); // Кожні 5 хвилин (300000 мілісекунд)

// Зберігаємо натиснуті цифри в масив
let pressedNumbers = [];

document.addEventListener('keydown', (event) => {

      // Функція для перевірки послідовності цифр
      const checkSequence = () => {
         // console.log('pressedNumbers', pressedNumbers)
        if (pressedNumbers.join('') === '5214') {
          unblurSite();
          localStorage.setItem('lastActive', Date.now());
          isBlured = false
          pressedNumbers = []
        }
      };
  
      // Додаємо натиснуту цифру в масив
      if (event.key >= '0' && event.key <= '9') {
        //console.log("jj", event.key)
        pressedNumbers.push(event.key);
        // Перевіряємо послідовність після кожної натиснутої цифри
        checkSequence();
      } else {
        // Якщо натиснута не цифра, очищаємо масив
        pressedNumbers.length = 0;
      }
    
});

// При кожній активності користувача оновлюємо час останньої активності
document.addEventListener('mousemove', () => {
    if(!isBlured) {
        localStorage.setItem('lastActive', Date.now());
    }
});

document.addEventListener('click', (event) => {
    if(isBlured) {
        event.preventDefault()
    }
});

document.addEventListener('contextmenu', (event) => {
    if(isBlured) {
        event.preventDefault();
    }
});

window.addEventListener("wheel", (e) => {
    if(isBlured) {
        e.preventDefault()
    }
}, { passive:false })

function disableSelects() {
    // Знайти всі селекти на сторінці
    const selects = document.querySelectorAll('select');

    // Додати обробник події на кожен селект
    selects.forEach(select => {
        $(select).prop('disabled', true)
    });
}

function enableSelects() {
    // Знайти всі селекти на сторінці
    const selects = document.querySelectorAll('select');

    // Додати обробник події на кожен селект
    selects.forEach(select => {
        $(select).prop('disabled', false)
    });
}


function blockSelection() {
    document.body.style.userSelect = 'none';
    document.onselectstart = function() { return false; };
    document.oncopy = function() { return false; };
    document.oncut = function() { return false;   
   };
}
  
function allowSelection() {
    document.body.style.userSelect = 'auto';
    document.onselectstart = null;
    document.oncopy = null;
    document.oncut = null;
}

function miliToTime(milliseconds) {
    // Обчислюємо кількість секунд
    const seconds = Math.floor(milliseconds / 1000);
    // Обчислюємо кількість хвилин і секунд
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;
  
    // Формуємо рядок з результатом, використовуючи padStart() для додавання провідних нулів
    return `${minutes.toString().padStart(2, '0')}:${remainingSeconds.toString().padStart(2, '0')}`;
}


$(document).ready(function() {
    $("#global-timer").click(function() {
        // Створимо новий об'єкт Date
        const today = new Date();
        // Встановимо дату на один день раніше
        today.setDate(today.getDate() - 1);
        localStorage.setItem('lastActive', today.getTime())
        blurNow()
    });
});